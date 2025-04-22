<?php


include "cal-cpt.php";

// 1) Enqueue jQuery (if not already)
add_action('wp_enqueue_scripts', 'calc_form_enqueue_scripts');
function calc_form_enqueue_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('calc-accordian', LANGU_THEME_URI . "/assets/js/calc-accordian.js", ["jquery"], time());
}

// 2) "calc_submissions" CPT for storing form entries
add_action('init', 'register_calc_submissions_cpt');
function register_calc_submissions_cpt()
{
  register_post_type('calc_submissions', [
    'labels' => [
      'name' => 'Calc Submissions',
      'singular_name' => 'Calc Submission'
    ],
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-feedback',
    'supports' => ['title'],
  ]);
}

add_action('add_meta_boxes', 'calc_submissions_add_meta_box');
function calc_submissions_add_meta_box()
{
  // Only add this meta box to the "calc_submissions" CPT
  add_meta_box(
    'calc_submitted_data_box',
    'Submitted Data (Structured)',
    'render_calc_submitted_data_box',
    'calc_submissions',
    'normal',
    'default'
  );
}

function render_calc_submitted_data_box($post)
{
  // 1) Raw data
  $data_raw = get_post_meta($post->ID, 'calc_submitted_data', true);
  // 2) Label + user_input data
  $data_labelled = get_post_meta($post->ID, 'calc_submitted_data_labelled', true);

  echo '<div style="font-family:monospace;">';

  // -- SHOW RAW 
  if (empty($data_raw) || !is_array($data_raw)) {
    echo "<p>No raw submission data found.</p>";
  }

  // -- SHOW LABELLED 
  if (empty($data_labelled) || !is_array($data_labelled)) {
    echo "<p>No labelled data found.</p>";
    echo '</div>';
    return;
  }

  // --------------------------------------------------------------------------------
  // --- Calculators
  // --------------------------------------------------------------------------------
  echo '<h4>Calculators</h4>';
  if (!empty($data_labelled['calculators']) && is_array($data_labelled['calculators'])) {
    foreach ($data_labelled['calculators'] as $calcIndex => $calcData) {
      // Title of the calculator
      $calcTitle = $calcData['title'] ?? ("Calculator #" . ($calcIndex + 1));

      echo '<div style="border:1px solid #ccc; margin:10px 0; padding:10px;">';
      // calculator title
      echo '<strong style="font-size:1.1em;">' . esc_html($calcTitle) . '</strong><br>';

      // Groups
      $groups = $calcData['groups'] ?? [];
      if (empty($groups)) {
        echo '<em>No field groups found in this calculator.</em>';
      } else {
        foreach ($groups as $gIndex => $grpData) {
          $grpTitle = $grpData['title'] ?? ("Group #" . ($gIndex + 1));
          echo '<div style="border:1px dashed #999; margin:5px 0; padding:5px;">';
          // Field group title
          echo '<strong>' . esc_html($grpTitle) . '</strong><br>';

          $fields = $grpData['fields'] ?? [];
          if (empty($fields)) {
            echo '<em>No fields in this group.</em>';
          } else {
            foreach ($fields as $fIndex => $fieldInfo) {
              // Show "label" + "user_input"
              $flabel = $fieldInfo['label'] ?? 'Field';
              $fval = $fieldInfo['user_input'] ?? '[empty]';

              echo '- <strong>' . esc_html($flabel) . '</strong>: ' . esc_html($fval) . '<br>';
            }
          }
          echo '</div>'; // end group
        }
      }

      echo '</div>'; // end calculator
    }
  } else {
    echo '<p>No calculator data found.</p>';
  }

  // --------------------------------------------------------------------------------
  // --- Forms
  // --------------------------------------------------------------------------------
  echo '<h4>Forms</h4>';
  if (!empty($data_labelled['forms']) && is_array($data_labelled['forms'])) {
    foreach ($data_labelled['forms'] as $fIndex => $formData) {
      // Each item is a top-level "FormGroup" => { form_title, fields_group:[ ... ] }
      $fTitle = $formData['form_title'] ?? ("FormGroup #" . ($fIndex + 1));

      echo '<div style="border:1px solid #ccc; margin:10px 0; padding:10px;">';
      // form group title
      echo '<strong style="font-size:1.1em;">' . esc_html($fTitle) . '</strong><br>';

      // fields_group => array of FieldGroups
      $fgroups = $formData['fields_group'] ?? [];
      if (empty($fgroups)) {
        echo '<em>No field groups in this form group.</em>';
      } else {
        foreach ($fgroups as $gIndex => $grpData) {
          $grpTitle = $grpData['group_title'] ?? ("Group #" . ($gIndex + 1));
          echo '<div style="border:1px dashed #999; margin:5px 0; padding:5px;">';
          // Field group title
          echo '<strong>' . esc_html($grpTitle) . '</strong><br>';

          $fields = $grpData['fields'] ?? [];
          if (empty($fields)) {
            echo '<em>No fields in this group.</em>';
          } else {
            foreach ($fields as $fldIndex => $fieldInfo) {
              $flabel = $fieldInfo['label'] ?? 'Field';
              $fval = $fieldInfo['user_input'] ?? '[empty]';

              echo '- <strong>' . esc_html($flabel) . '</strong>: ' . esc_html($fval) . '<br>';
            }
          }
          echo '</div>'; // end group
        }
      }
      echo '</div>'; // end form group
    }
  } else {
    echo '<p>No forms data found.</p>';
  }

  echo '</div>'; // end container
}



/*
----------------------------------------------------------------
3) Shortcode [calc_form post_id="123"]
   - Step1 => ALL calculators
   - Next steps => each item in "forms" => 1 step per form group
   - "thank_message" shown after successful submission
----------------------------------------------------------------
*/
add_shortcode('calc_form', 'calc_form_shortcode');
function calc_form_shortcode($atts)
{
  // Parse atts
  $atts = shortcode_atts(['post_id' => 0], $atts);
  $calc_id = intval($atts['post_id']);
  if ($calc_id <= 0) {
    return "<p><strong>[calc_form error: Missing or invalid post_id]</strong></p>";
  }

  // Load "calc_data" from the "calculators" CPT
  $data = get_post_meta($calc_id, 'calc_data', true);
  if (!is_array($data)) {
    return "<p>No calc_data found for post #$calc_id.</p>";
  }

  $calculators = $data['calculators'] ?? [];

  $forms = $data['forms'] ?? [];
  $thank_message = $data['thank_message'] ?? '';

  /*
    We'll define steps as follows:

    Step #1 => All calculators

    Step #2 => forms[0]
    Step #3 => forms[1]
    ...
    Step #(formsCount+1) => forms[ formsCount-1 ]

    Then the final step has the "Submit" button.
    totalSteps = 1 (calculators) + formsCount
  */
  $formsCount = count($forms);
  $totalSteps = 1 + $formsCount;

  // Security nonce
  $ajax_nonce = wp_create_nonce('calc_multistep_nonce');
  $ajax_url = admin_url('admin-ajax.php');

  ob_start();
  ?>
  <div id="calc-multistep-container">
    <form id="calc-multistep-form">

      <!-- Step #1 => All calculators in a single step -->
      <div class="calc-step" data-step="1" style="">
        <?php
        echo my_render_all_calculators($calculators);
        ?>
        <div class="form-actions" style="margin-top:1em;">
          <?php if ($totalSteps > 1) { ?>
            <button type="button" class="next-step button button-primary">Toliau</button>
          <?php } else { ?>
            <!-- If no forms, show Submit? -->
            <button type="submit" class="button button-primary">Skaičiuoti sąmatą</button>
          <?php } ?>
        </div>
      </div>

      <?php
      // Step #2..#(formsCount+1) => each forms[i]
      for ($i = 0; $i < $formsCount; $i++) {
        $stepNum = $i + 2; // step #2 => forms[0], step #3 => forms[1], ...
        $isLast = $stepNum === $totalSteps; // final step
        $style = 'display:none;';
        echo '<div class="calc-step" data-step="' . $stepNum . '" style="' . $style . '">';

        $groupData = $forms[$i]; // "FormGroup" => { title, fields_group: FieldGroup[] }
        echo my_render_formgroup_step($groupData, $i);

        // Step nav
        echo '<div class="form-actions" style="margin-top:1em;">';
        // Always a "Back" button if stepNum>1
        echo '<button type="button" class="prev-step button">Atgal</button> ';

        if ($isLast) {
          // final => submit
          echo '<button type="submit" class="button button-primary">Skaičiuoti sąmatą</button>';
        } else {
          // not last => next
          echo '<button type="button" class="next-step button button-primary">Toliau </button>';
        }
        echo '</div>';

        echo '</div>';
      }
      ?>

      <input type="hidden" name="action" value="calc_multistep_submit" />
      <input type="hidden" name="security" value="<?php echo esc_attr($ajax_nonce); ?>" />
      <input type="hidden" name="calc_id" value="<?php echo esc_attr($calc_id); ?>" />
    </form>

    <div id="calc-multistep-message" style="margin-top:1em;"></div>

  </div>

  <!-- Step logic -->
  <script>
    (function ($) {
      var currentStep = 1;
      var totalSteps = <?php echo (int) $totalSteps; ?>;

      function updateProgressBar() {
        var percentage = Math.round(((currentStep - 1) / totalSteps) * 100);
        $('#form-progress')
          .val(percentage)
          .css('background', 'linear-gradient(to right, #027AFF ' + percentage + '%, white ' + percentage + '%)');
        $('#form-progress').next().text(percentage + '%');
      }

      function showStep(step) {
        $('.calc-step').hide();
        $('.calc-step[data-step="' + step + '"]').show();
        updateProgressBar();
        scrollToCurrentStep();
      }

      // Next
      $(document).on('click', '.next-step', function () {
        if (currentStep < totalSteps) {
          currentStep++;
          showStep(currentStep);
        }
      });
      // Back
      $(document).on('click', '.prev-step', function () {
        if (currentStep > 1) {
          currentStep--;
          showStep(currentStep);
        }
      });

      // On submit => AJAX
      $('#calc-multistep-form').on('submit', function (e) {
        e.preventDefault();
        var $form = $(this);
        var formData = $form.serialize();

        showLoaderOn("#calc-multistep-container-wrap");

        $.ajax({
          url: '<?php echo $ajax_url; ?>',
          method: 'POST',
          data: formData,
          dataType: 'json',
          success: function (response) {
            if (response.success) {
              // $('#calc-multistep-message').html('<span style="color:green;">' + response.data + '</span>');
              $form[0].reset();
              currentStep = totalSteps + 1;
              showStep(currentStep);

              $('#calc-thankyou').removeClass("hidden");
              $('#calc-multistep-container-wrap').addClass("hidden");

              hideLoaderFrom("#calc-multistep-container-wrap");
            } else {
              var msg = response.data ? response.data : 'Unknown error.';
              $('#calc-multistep-message').html('<span style="color:red;">Error: ' + msg + '</span>');
              hideLoaderFrom("#calc-multistep-container-wrap");
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Log full error details in the console
            console.error("AJAX error:", textStatus, errorThrown);
            console.log("Response Text:", jqXHR.responseText);

            // Display the error message on the page using actual error text
            $('#calc-multistep-message').html('<span style="color:red;">Error: ' + (errorThrown || textStatus) + '</span>');
            hideLoaderFrom("#calc-multistep-container-wrap");
          }
        });
      });

      // Initialize step #1
      showStep(currentStep);

      function scrollToCurrentStep () {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'  // Change to 'auto' for an immediate jump
        });
      }
    })(jQuery);
  </script>
  <?php
  return ob_get_clean();
}

/*
----------------------------------------------------------------
Helper #1: Render ALL calculators in a single step
----------------------------------------------------------------
*/
function my_render_all_calculators($calculators)
{
  ob_start();

  if (empty($calculators)) {
    ?>
    <p>No calculators found.</p>
    <?php
    return ob_get_clean();
  }

  foreach ($calculators as $cIndex => $calc) {
    $title = esc_attr($calc['title'] ?? 'Calculator');
    $main_count = esc_attr($calc['main_count'] ?? 0);
    $featured_image = esc_attr($calc['featured_image'] ?? '');

    ?>
    <div style="margin-bottom: 32px; border-bottom: 1px solid #BBBBBB; padding-bottom: 20px;" class="calculator">
      <div style=" margin:5px 0; padding:5px;" class="cursor-pointer calc-header" data-calc-header="<?php echo $cIndex; ?>">
        <div class="grid items-center grid-cols-12">
          <div
            class="flex items-center justify-center col-span-2 calc-featured-img-wrap img-wrap bg-[#f7f7f7] rounded-[12px] overflow-hidden p-[4px] md:p-[16px] w-[104px] md:w-[160px] h-[104px] md:h-[160px]">
            <img src="<?php echo $featured_image; ?>" class="" />
          </div>
          <div class="col-span-10 flex flex-col gap-[16px] justify-center pl-[64px] md:pl-[24px]">
            <h3 class="!font-degular-text-bold calc-title !text-[18px]"><?php echo $title; ?></h3>
            <div class="flex items-center gap-[8px] w-[86%] md:w-full">
              <div>
                <div data-onlick-handler="decrement"
                  class="calc-increment-btn no-toggle cursor-pointer bg-yellow rounded-[16px] p-[16px] w-[60px] text-[20px] text-center">-
                </div>
              </div>
              <div>
                <input data-main-counter="" min="0" type="number" name="main_count_<?php echo $cIndex; ?>"
                  id="main_count_<?php echo $cIndex; ?>" value="<?php echo $main_count; ?>"
                  class="main-count px-12 text-center no-toggle rounded-[16px] py-[16px] !h-[56px]" />
              </div>
              <div>
                <div data-onlick-handler="increment"
                  class="calc-decrement-btn no-toggle cursor-pointer bg-yellow rounded-[16px] p-[16px] w-[60px] text-[20px] text-center">+
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div id="calc-multistep-form-<?php echo $cIndex; ?>"
        class="calc-multistep-form flex gap-[16px] calc-content hidden transition-all overflow-hidden mt-[24px]"
        data-calc-value="<?php echo $cIndex; ?>">
        <?php $groups = $calc['fields_group'] ?? []; ?>

        <div class="first-column flex-[48%]">
          <?php
          if (count($groups)) {

            // Render the first group in the first column (taking 50% width)
            $grp = $groups[0];
            $gTitle = esc_html($grp['title'] ?? 'Group');
            echo '<div class="group-fields group-item">';
            echo '<div class="!font-degular-text-bold"><strong>' . $gTitle . '</strong></div>';
            if (!empty($grp['fields']) && is_array($grp['fields'])) {
              foreach ($grp['fields'] as $fIndex => $field) {
                my_render_one_field($field, "calculators[$cIndex][fields_group][0][fields][$fIndex]");
              }
            }
            echo '</div>';
          }
          ?>
        </div>

        <div class="second-column flex-[48%]">
          <?php
          // Render the second and third groups inside the second column
          for ($gIndex = 1; $gIndex <= 2 && count($groups) >= 2; $gIndex++) {
            $grp = $groups[$gIndex];
            $gTitle = esc_html($grp['title'] ?? '');
            echo '<div class="group-fields group-item">';
            echo '<div><strong>' . $gTitle . '</strong></div>';
            if (!empty($grp['fields']) && is_array($grp['fields'])) {
              foreach ($grp['fields'] as $fIndex => $field) {
                my_render_one_field($field, "calculators[$cIndex][fields_group][$gIndex][fields][$fIndex]");
              }
            }
            echo '</div>';
          }
          ?>
        </div>

        <div class="w-full">
          <?php
          // Render the second and third groups inside the second column
          for ($gIndex = 3; $gIndex < count($groups); $gIndex++) {
            $grp = $groups[$gIndex];
            $gTitle = esc_html($grp['title'] ?? 'Group');
            echo '<div class="w-full group-fields">';
            echo '<div><strong>' . $gTitle . '</strong></div>';
            if (!empty($grp['fields']) && is_array($grp['fields'])) {
              foreach ($grp['fields'] as $fIndex => $field) {
                my_render_one_field($field, "calculators[$cIndex][fields_group][$gIndex][fields][$fIndex]");
              }
            }
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
    <?php
  }

  return ob_get_clean();
}

/*
----------------------------------------------------------------
Helper #2: Render one "FormGroup" step
   A FormGroup => { title, fields_group: FieldGroup[] }
----------------------------------------------------------------
*/
function my_render_formgroup_step($formGroup, $fgIndex)
{
  ob_start();

  $fTitle = esc_html($formGroup['title'] ?? '');
  echo '<h3>' . $fTitle . '</h3>';

  $fGroups = $formGroup['fields_group'] ?? [];
  foreach ($fGroups as $gIndex => $grp) {
    $grpTitle = esc_html($grp['title'] ?? 'Group');
    $groupName = trim($grpTitle);
    echo '<div class="group-fields" style="border-bottom: 1px solid #ccc; margin:8px 0; padding:8px;">';
    echo '<strong>' . $grpTitle . '</strong><br>';

    if (!empty($grp['fields']) && is_array($grp['fields'])) {
      foreach ($grp['fields'] as $fIndex => $field) {
        my_render_one_field($field, "forms[$fgIndex][fields_group][$gIndex][fields][$fIndex]", $groupName);
      }
    }
    echo '</div>';
  }

  return ob_get_clean();
}

/*
----------------------------------------------------------------
Helper #3: Render a single Field => label + input
Store user input in "[user_input]"
group name only valid of input type radio
----------------------------------------------------------------
*/
function my_render_one_field($fieldData, $fieldNamePrefix, $groupName = "")
{
  $label = esc_html($fieldData['label'] ?? 'Field');
  $defVal = esc_attr($fieldData['default_value'] ?? '');
  $ph = esc_attr($fieldData['placeholder'] ?? '');
  $type = esc_attr($fieldData['type'] ?? 'text');
  $cls = esc_attr($fieldData['class'] ?? '');
  $isChecked = ($defVal === 'on' || $defVal === '1') ? 'checked' : '';
  ?>

  <div style="margin: 12px 0;" class="<?php echo $cls; ?> input-wrap">
    <label class="input-label input-<?php echo $type; ?>">
      <div><?php echo $label; ?></div>
      <?php if ($type === 'radio') { ?>
        <input type="radio" name="<?php echo $fieldNamePrefix; ?>[user_input]" value="<?php echo $label; ?>"
          class="<?php echo $cls; ?>">
      <?php } elseif ($type === 'checkbox') { ?>
        <input type="checkbox" name="<?php echo $fieldNamePrefix; ?>[user_input]" value="1" class="<?php echo $cls; ?>"
          <?php echo $isChecked; ?> />
      <?php } elseif ($type === 'textarea') { ?>
        <textarea name="<?php echo $fieldNamePrefix; ?>[user_input]" class="<?php echo $cls; ?>" <?php if ($ph) { ?>
            placeholder="<?php echo $ph; ?>" <?php } ?>><?php echo $defVal; ?></textarea>
      <?php } else { ?>
        <input type="<?php echo $type; ?>" name="<?php echo $fieldNamePrefix; ?>[user_input]" value="<?php echo $defVal; ?>"
          <?php if ($ph) { ?> placeholder="<?php echo $ph; ?>" <?php } ?>     <?php if ($cls) { ?> class="<?php echo $cls; ?>"
          <?php } ?> />
      <?php } ?>
    </label>
  </div>

  <?php
}



/*
----------------------------------------------------------------
4) AJAX => store final submission => "calc_submissions"
----------------------------------------------------------------
*/
/**
 * AJAX => store final submission => "calc_submissions"
 * We now ALSO store "calc_submitted_data_labelled" with both label + user input
 */
add_action('wp_ajax_nopriv_calc_multistep_submit', 'calc_multistep_ajax_new_schema');
add_action('wp_ajax_calc_multistep_submit', 'calc_multistep_ajax_new_schema');
function calc_multistep_ajax_new_schema()
{
  // Check nonce
  if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'calc_multistep_nonce')) {
    wp_send_json_error('Invalid security token');
  }
  langu_print_log($_POST);
  // 1) Create a new "calc_submissions" post
  $title = 'Submission ' . gmdate('Y-m-d H:i:s');
  $post_id = wp_insert_post([
    'post_type' => 'calc_submissions',
    'post_title' => $title,
    'post_status' => 'publish'
  ]);

  if (is_wp_error($post_id) || !$post_id) {
    wp_send_json_error('Could not create submission');
  }

  // 2) As before, store the entire $_POST for backward compatibility
  $raw = wp_unslash($_POST);
  update_post_meta($post_id, 'calc_submitted_data', $raw);

  // 3) Also build a second, more structured array merging labels + user_input
  //    We'll call it "calc_submitted_data_labelled"
  $calc_id = isset($raw['calc_id']) ? intval($raw['calc_id']) : 0;
  $labelledData = [
    'calculators' => [],
    'forms' => []
  ];

  // Attempt to load the "calc_data" from the "calculators" CPT to get labels
  if ($calc_id > 0) {
    $schema = get_post_meta($calc_id, 'calc_data', true);
    // langu_print_log($schema);
    if (is_array($schema)) {
      // 3a) Merge "calculators" => read each field's "label" from the schema, find the user_input in $_POST
      if (!empty($schema['calculators']) && is_array($schema['calculators'])) {
        foreach ($schema['calculators'] as $calcIndex => $calcObj) {
          $calcLabelled = [
            'title' => $calcObj['title'] ?? '',
            'groups' => []
          ];
          // Each group
          if (!empty($calcObj['fields_group']) && is_array($calcObj['fields_group'])) {
            foreach ($calcObj['fields_group'] as $gIndex => $grpObj) {
              $grpLabelled = [
                'title' => $grpObj['title'] ?? '',
                'fields' => []
              ];
              if (!empty($grpObj['fields']) && is_array($grpObj['fields'])) {
                foreach ($grpObj['fields'] as $fIndex => $field) {
                  // The label from the schema
                  $theLabel = $field['label'] ?? 'Field';
                  // The user input from $_POST => calculators[$calcIndex][fields_group][$gIndex][fields][$fIndex][user_input]
                  $inputPath = "calculators[$calcIndex][fields_group][$gIndex][fields][$fIndex][user_input]";
                  // We'll retrieve it from $raw
                  $userVal = null;
                  // We'll do a small helper to safely look up array keys from bracket notation
                  $userVal = fetch_post_value($raw, [
                    'calculators',
                    (string) $calcIndex,
                    'fields_group',
                    (string) $gIndex,
                    'fields',
                    (string) $fIndex,
                    'user_input'
                  ]);
                  $grpLabelled['fields'][] = [
                    'label' => $theLabel,
                    'user_input' => $userVal
                  ];
                }
              }
              $calcLabelled['groups'][] = $grpLabelled;
            }
          }
          $labelledData['calculators'][] = $calcLabelled;
        }
      }

      // 3b) Merge "forms" => each FormGroup => fields_group => fields
      if (!empty($schema['forms']) && is_array($schema['forms'])) {
        foreach ($schema['forms'] as $fIndex => $formGroup) {
          $formLabelled = [
            'title' => $formGroup['title'] ?? '',
            'fields_group' => []
          ];
          if (!empty($formGroup['fields_group']) && is_array($formGroup['fields_group'])) {
            foreach ($formGroup['fields_group'] as $gIndex => $innerFG) {
              $groupLabelled = [
                'title' => $innerFG['title'] ?? '',
                'fields' => []
              ];
              if (!empty($innerFG['fields']) && is_array($innerFG['fields'])) {
                foreach ($innerFG['fields'] as $fldIdx => $field) {
                  $theLabel = $field['label'] ?? 'Field';
                  // The user input path => forms[$fIndex][fields_group][$gIndex][fields][$fldIdx][user_input]
                  $userVal = fetch_post_value($raw, [
                    'forms',
                    (string) $fIndex,
                    'fields_group',
                    (string) $gIndex,
                    'fields',
                    (string) $fldIdx,
                    'user_input'
                  ]);
                  $groupLabelled['fields'][] = [
                    'label' => $theLabel,
                    'user_input' => $userVal
                  ];
                }
              }
              $formLabelled['fields_group'][] = $groupLabelled;
            }
          }
          $labelledData['forms'][] = $formLabelled;
        }
      }
    }
  }

  // 4) Store that new array
  update_post_meta($post_id, 'calc_submitted_data_labelled', $labelledData);
  // 5) Done
  wp_send_json_success('Submission saved (ID: ' . $post_id . ')');
}

/**
 * Helper to safely fetch nested $_POST array keys
 * For example: fetch_post_value($_POST, ['calculators','0','fields_group','0','fields','0','user_input'])
 * returns the user input or null if not set
 */
function fetch_post_value(array $source, array $path)
{
  $ref = $source;
  foreach ($path as $key) {
    if (!is_array($ref) || !array_key_exists($key, $ref)) {
      return null;
    }
    $ref = $ref[$key];
  }
  return $ref;
}


