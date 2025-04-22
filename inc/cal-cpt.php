<?php
/**
 * 1) CPT "calculators" with meta key "calc_data".
 * 2) "calc_data" structure:
 *    {
 *      calculators: [ { ... }, ... ],
 *      forms: [ { title, fields_group: [...] }, ... ],
 *      thank_message: "some string"
 *    }
 */
defined('ABSPATH') || exit;

/*
-----------------------------------------------------------
Register the "calculators" CPT
-----------------------------------------------------------
*/
add_action('init', 'register_calculators_cpt');
function register_calculators_cpt()
{
  register_post_type('calculators', [
    'labels' => [
      'name' => 'Calculators',
      'singular_name' => 'Calculator',
    ],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'], // WP Title => schema.title, Editor => schema.content
    'has_archive' => true,
    'menu_icon' => 'dashicons-calculator',
  ]);
}

/*
-----------------------------------------------------------
Add a single meta box to handle "calc_data"
-----------------------------------------------------------
*/
add_action('add_meta_boxes', 'calc_add_schema_metabox');
function calc_add_schema_metabox()
{
  add_meta_box(
    'calc_schema_box',
    'Calculators & Forms',
    'render_calc_schema_box',
    'calculators',
    'normal',
    'default'
  );
}

function render_calc_schema_box($post)
{
  wp_nonce_field('calc_schema_save', 'calc_schema_nonce');

  // Current stored data
  $existing = get_post_meta($post->ID, 'calc_data', true);
  if (!is_array($existing)) {
    $existing = [];
  }

  // Make sure arrays exist
  if (!isset($existing['calculators']) || !is_array($existing['calculators'])) {
    $existing['calculators'] = [];
  }
  if (!isset($existing['forms']) || !is_array($existing['forms'])) {
    $existing['forms'] = [];
  }
  // "thank_message" is a string
  if (!isset($existing['thank_message'])) {
    $existing['thank_message'] = '';
  }

  $json = wp_json_encode($existing);
  ?>
  <input type="hidden" id="calc-data-json" name="calc_data_json" value="<?php echo esc_attr($json); ?>" />
  <div id="calc-schema-app"></div>
 
  <?php

  // Print JS
  add_action('admin_print_footer_scripts', 'calc_schema_dynamic_js', 20);
}

function calc_schema_dynamic_js()
{
  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'calculators')
    return;
  ?>
  <script>
    (function () {
      const hiddenInput = document.getElementById('calc-data-json');
      if (!hiddenInput) return;

      let data;
      try {
        data = JSON.parse(hiddenInput.value);
      } catch (e) {
        data = { calculators: [], forms: [], thank_message: '' };
      }
      if (!data.calculators) data.calculators = [];
      if (!data.forms) data.forms = [];
      if (!data.thank_message) data.thank_message = '';

      const container = document.getElementById('calc-schema-app');

      function renderUI() {
        container.innerHTML = '';

        // --- Calculators Section ---
        const calcTitle = document.createElement('h2');
        calcTitle.textContent = 'Calculators';
        container.appendChild(calcTitle);

        const addCalcBtn = document.createElement('button');
        addCalcBtn.type = 'button';
        addCalcBtn.className = 'button button-primary';
        addCalcBtn.textContent = '+ Add Calculator';
        addCalcBtn.style.marginBottom = '10px';
        addCalcBtn.onclick = () => {
          data.calculators.push({
            title: '',
            featured_image: '',
            main_count: 0,
            group_count: 0,
            fields_group: []
          });
          sync(); renderUI();
        };
        container.appendChild(addCalcBtn);

        data.calculators.forEach((calc, cIdx) => {
          container.appendChild(renderOneCalculator(calc, cIdx));
        });

        // --- Forms Section ---
        const formsTitle = document.createElement('h2');
        formsTitle.textContent = 'Forms';
        container.appendChild(formsTitle);

        const addFormGroupBtn = document.createElement('button');
        addFormGroupBtn.type = 'button';
        addFormGroupBtn.className = 'button button-primary';
        addFormGroupBtn.textContent = 'Add Form';
        addFormGroupBtn.style.marginBottom = '10px';
        addFormGroupBtn.onclick = () => {
          data.forms.push({
            title: '',
            fields_group: []
          });
          sync(); renderUI();
        };
        container.appendChild(addFormGroupBtn);

        data.forms.forEach((fg, fgIdx) => {
          container.appendChild(renderOneFormGroup(fg, fgIdx));
        }); 
      }

      // Render a single Calculator
      function renderOneCalculator(calc, cIdx) {
        const wrap = document.createElement('div');
        wrap.style.border = '1px solid #ccc';
        wrap.style.padding = '10px';
        wrap.style.margin = '10px 0';

        const h4 = document.createElement('h4');
        h4.textContent = `Calculator #${cIdx + 1}`;
        wrap.appendChild(h4);

        // remove
        const rmBtn = document.createElement('button');
        rmBtn.type = 'button';
        rmBtn.className = 'button button-secondary';
        rmBtn.textContent = 'Remove Calculator';
        rmBtn.onclick = () => {
          data.calculators.splice(cIdx, 1);
          sync(); renderUI();
        };
        wrap.appendChild(rmBtn);

        wrap.appendChild(makeInputRow('Title', calc, 'title'));
        wrap.appendChild(makeInputRow('Featured Image URL', calc, 'featured_image'));
        wrap.appendChild(makeNumberRow('Main Count', calc, 'main_count'));
        wrap.appendChild(makeNumberRow('Group Count', calc, 'group_count'));

        // fields_group
        const groupsDiv = document.createElement('div');
        groupsDiv.style.marginTop = '10px';

        const addGBtn = document.createElement('button');
        addGBtn.type = 'button';
        addGBtn.className = 'button';
        addGBtn.textContent = '+ Add FieldGroup';
        addGBtn.onclick = () => {
          calc.fields_group.push({
            title: '',
            fields: []
          });
          sync(); renderUI();
        };
        groupsDiv.appendChild(addGBtn);

        calc.fields_group.forEach((grp, gIdx) => {
          groupsDiv.appendChild(renderOneFieldGroup(calc.fields_group, grp, gIdx, `Group #${gIdx + 1}`));
        });

        wrap.appendChild(groupsDiv);
        return wrap;
      }

      // Render a single FormGroup object in "data.forms"
      // each FormGroup => { title, fields_group: FieldGroup[] }
      function renderOneFormGroup(fg, fgIdx) {
        const wrap = document.createElement('div');
        wrap.style.border = '1px solid #ccc';
        wrap.style.padding = '10px';
        wrap.style.margin = '10px 0';

        const h4 = document.createElement('h4');
        h4.textContent = `Form #${fgIdx + 1}`;
        wrap.appendChild(h4);

        // remove
        const rmBtn = document.createElement('button');
        rmBtn.type = 'button';
        rmBtn.className = 'button button-secondary';
        rmBtn.textContent = 'Remove Form';
        rmBtn.onclick = () => {
          data.forms.splice(fgIdx, 1);
          sync(); renderUI();
        };
        wrap.appendChild(rmBtn);

        wrap.appendChild(makeInputRow('FormGroup Title', fg, 'title'));

        // fields_group array
        const fGroupsDiv = document.createElement('div');
        fGroupsDiv.style.marginTop = '10px';

        const addFGrpBtn = document.createElement('button');
        addFGrpBtn.type = 'button';
        addFGrpBtn.className = 'button';
        addFGrpBtn.textContent = '+ Add FieldGroup';
        addFGrpBtn.onclick = () => {
          fg.fields_group.push({
            title: '',
            fields: []
          });
          sync(); renderUI();
        };
        fGroupsDiv.appendChild(addFGrpBtn);

        if (fg.fields_group) {
          fg.fields_group.forEach((innerFG, ifgIdx) => {
            fGroupsDiv.appendChild(renderOneFieldGroup(fg.fields_group, innerFG, ifgIdx, `Inner FieldGroup #${ifgIdx + 1}`));
          });
        }

        wrap.appendChild(fGroupsDiv);
        return wrap;
      }

      // Reusable for FieldGroup => { title, fields[] }
      function renderOneFieldGroup(parentArray, group, idx, label) {
        const wrap = document.createElement('div');
        wrap.style.border = '1px dashed #999';
        wrap.style.padding = '8px';
        wrap.style.margin = '8px 0';

        const h5 = document.createElement('h5');
        h5.textContent = label;
        wrap.appendChild(h5);

        // remove group
        const rmBtn = document.createElement('button');
        rmBtn.type = 'button';
        rmBtn.className = 'button button-secondary';
        rmBtn.textContent = 'Remove This Group';
        rmBtn.onclick = () => {
          parentArray.splice(idx, 1);
          sync(); renderUI();
        };
        wrap.appendChild(rmBtn);

        // group.title
        wrap.appendChild(makeInputRow('Group Title', group, 'title'));

        // fields
        const fieldsDiv = document.createElement('div');
        fieldsDiv.style.marginTop = '10px';

        const addFieldBtn = document.createElement('button');
        addFieldBtn.type = 'button';
        addFieldBtn.className = 'button';
        addFieldBtn.textContent = '+ Add Field';
        addFieldBtn.onclick = () => {
          group.fields.push({
            label: '',
            default_value: '',
            placeholder: '',
            type: '',
            class: ''
          });
          sync(); renderUI();
        };
        fieldsDiv.appendChild(addFieldBtn);

        group.fields.forEach((fld, fIdx) => {
          fieldsDiv.appendChild(renderOneField(group.fields, fld, fIdx));
        });

        wrap.appendChild(fieldsDiv);
        return wrap;
      }

      // A single Field => label, default_value, placeholder, type, class
      function renderOneField(fieldsArr, fld, fIdx) {
        const fWrap = document.createElement('div');
        fWrap.style.border = '1px solid #eee';
        fWrap.style.padding = '5px';
        fWrap.style.margin = '5px 0';

        const strong = document.createElement('strong');
        strong.textContent = `Field #${fIdx + 1}`;
        fWrap.appendChild(strong);

        // remove
        const rmBtn = document.createElement('button');
        rmBtn.type = 'button';
        rmBtn.className = 'button button-small';
        rmBtn.style.float = 'right';
        rmBtn.textContent = 'Remove Field';
        rmBtn.onclick = () => {
          fieldsArr.splice(fIdx, 1);
          sync(); renderUI();
        };
        fWrap.appendChild(rmBtn);

        // 5 inputs
        fWrap.appendChild(makeInputRow('Label', fld, 'label'));
        fWrap.appendChild(makeInputRow('Default Value', fld, 'default_value'));
        fWrap.appendChild(makeInputRow('Placeholder', fld, 'placeholder'));
        fWrap.appendChild(makeInputRow('Type', fld, 'type'));
        fWrap.appendChild(makeInputRow('CSS Class', fld, 'class'));

        return fWrap;
      }

      // Helpers
      function makeInputRow(labelTxt, obj, key) {
        const row = document.createElement('div');
        row.style.margin = '6px 0';

        const labelEl = document.createElement('label');
        labelEl.textContent = labelTxt + ': ';
        labelEl.style.display = 'inline-block';
        labelEl.style.width = '130px';

        row.appendChild(labelEl);

        if (key === 'type') {
          const selectEl = document.createElement('select');
          selectEl.setAttribute("style", "width: 178px; ");
          const options = ['text', 'textarea', 'checkbox', 'number', "radio"];

          options.forEach(opt => {
            const optEl = document.createElement('option');
            optEl.value = opt;
            optEl.textContent = opt;
            if (obj[key] === opt) optEl.selected = true;
            selectEl.appendChild(optEl);
          });

          selectEl.onchange = () => {
            obj[key] = selectEl.value;
            sync();
          };

          row.appendChild(selectEl);
        } else {
          const inputEl = document.createElement('input');
          inputEl.type = 'text';
          inputEl.value = obj[key] || '';
          inputEl.oninput = () => {
            obj[key] = inputEl.value;
            sync()
          };
          row.appendChild(inputEl);
        }

        return row;
      }


      function makeNumberRow(labelTxt, obj, key) {
        const row = document.createElement('div');
        row.style.margin = '6px 0';

        const labelEl = document.createElement('label');
        labelEl.textContent = labelTxt + ': ';
        labelEl.style.display = 'inline-block';
        labelEl.style.width = '130px';

        const inputEl = document.createElement('input');
        inputEl.type = 'number';
        inputEl.value = obj[key] || 0;
        inputEl.oninput = () => {
          obj[key] = parseInt(inputEl.value, 10) || 0;
          sync();
        };

        row.appendChild(labelEl);
        row.appendChild(inputEl);
        return row;
      }

      function sync() {
        hiddenInput.value = JSON.stringify(data);
      }

      renderUI();
      sync();
    })();
  </script>
  <?php
}

/*
-----------------------------------------------------------
Finally, on SAVE, parse the JSON => build final shape => store in "calc_data"
-----------------------------------------------------------
*/
add_action('save_post_calculators', 'calc_schema_save');
function calc_schema_save($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!isset($_POST['calc_schema_nonce']) || !wp_verify_nonce($_POST['calc_schema_nonce'], 'calc_schema_save'))
    return;

  $raw = wp_unslash($_POST['calc_data_json'] ?? '');
  $parsed = json_decode($raw, true);
  
  if (json_last_error() !== JSON_ERROR_NONE || !is_array($parsed)) {
    return; // invalid JSON => skip
  }

  // We'll do minimal checking; you can do more advanced validation if you like.
  $final = [
    'calculators' => [],
    'forms' => [],
    'thank_message' => $parsed['thank_message'] ?? ''
  ];

  // parse calculators
  if (!empty($parsed['calculators']) && is_array($parsed['calculators'])) {
    foreach ($parsed['calculators'] as $calc) {
      $fgArray = is_array($calc['fields_group'] ?? null) ? $calc['fields_group'] : [];
      $finalCalc = [
        'title' => $calc['title'] ?? '',
        'featured_image' => $calc['featured_image'] ?? '',
        'main_count' => intval($calc['main_count'] ?? 0),
        'group_count' => intval($calc['group_count'] ?? 0),
        'fields_group' => []
      ];
      // each FieldGroup => { title, fields[] }
      foreach ($fgArray as $grp) {
        $fieldsArr = is_array($grp['fields'] ?? null) ? $grp['fields'] : [];
        $finalGrp = [
          'title' => $grp['title'] ?? '',
          'fields' => []
        ];
        foreach ($fieldsArr as $fld) {
          $finalGrp['fields'][] = [
            'label' => $fld['label'] ?? '',
            'default_value' => $fld['default_value'] ?? '',
            'placeholder' => $fld['placeholder'] ?? '',
            'type' => $fld['type'] ?? '',
            'class' => $fld['class'] ?? ''
          ];
        }
        $finalCalc['fields_group'][] = $finalGrp;
      }
      $final['calculators'][] = $finalCalc;
    }
  }

  // parse forms => array of { title, fields_group[] }
  if (!empty($parsed['forms']) && is_array($parsed['forms'])) {
    foreach ($parsed['forms'] as $fg) {
      $fGroupArr = is_array($fg['fields_group'] ?? null) ? $fg['fields_group'] : [];
      $oneFormGrp = [
        'title' => $fg['title'] ?? '',
        'fields_group' => []
      ];
      foreach ($fGroupArr as $innerFG) {
        $fieldsArr = is_array($innerFG['fields'] ?? null) ? $innerFG['fields'] : [];
        $innerFGfinal = [
          'title' => $innerFG['title'] ?? '',
          'fields' => []
        ];
        foreach ($fieldsArr as $ff) {
          $innerFGfinal['fields'][] = [
            'label' => $ff['label'] ?? '',
            'default_value' => $ff['default_value'] ?? '',
            'placeholder' => $ff['placeholder'] ?? '',
            'type' => $ff['type'] ?? '',
            'class' => $ff['class'] ?? ''
          ];
        }
        $oneFormGrp['fields_group'][] = $innerFGfinal;
      }
      $final['forms'][] = $oneFormGrp;
    }
  }

  update_post_meta($post_id, 'calc_data', $final);
}
