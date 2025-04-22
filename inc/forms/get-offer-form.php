<?php
/**
 * Creates a new CF7 form titled "Gauti pasiūlymą" (if it doesn't already exist)
 * and stores its ID in the option "cf7_gauti_form_id".
 */
function create_cf7_gauti_form() {
    if (!class_exists('WPCF7')) {
        return;
    }

    $form_title = 'Gauti pasiūlymą';

    // Check if a form with this title already exists
    $existing_form = get_posts(array(
        'post_type'   => 'wpcf7_contact_form',
        'title'       => $form_title,
        'numberposts' => 1,
    ));

    if (empty($existing_form)) {
        // Contact Form 7 markup with labels
        $form_content = '
<label>Jūsų vardas [text* cp_gauti_name]</label>

<div class="cf7-row">
  <label class="cf7-col">El. paštas [email* cp_gauti_email]</label>
  <label class="cf7-col">Telefono numeris [tel cp_gauti_phone]</label>
</div>

<label>Užklausos tekstas [textarea cp_gauti_message]</label>

<div class="custom-file-upload">
<label class="mb-[8px]">Prisegti projektą, nuotraukas ir kt.</label>
  [file cp_gauti_file id:file-upload class:file-input limit:5mb filetypes:pdf|jpg|png]
  <label for="file-upload" class="file-label">
    <span class="file-name">Prisegti failą (PDF, JPG, PNG, iki 5 MB)</span>
    <span class="file-btn">Rinktis failą</span>
  </label>
</div>

<div class="cf7-row cf7-checkbox-group">
  <fieldset class="cf7-col">
    <legend>Pažymėkite dominančius gaminius</legend>
    [checkbox cp_gauti_products use_label_element
      "Plastikiniai langai"
      "Mediniai langai"
      "Aliuminio langai"
      "Balkonų stiklinimas"
      "Šarvuotos durys"
      "Plastikinės durys"
    ]
  </fieldset>
  <fieldset class="cf7-col">
    <legend>&nbsp;</legend>
    [checkbox cp_gauti_products use_label_element
      "Stumdomos terasos durys"
      "Medinės durys"
      "Aliuminio durys"
      "Spynos"
      "Žaliuzės"
      "Roletai"
    ]
  </fieldset>
</div>

[submit "Siųsti užklausą"]
<p class="font-bold response-time">Įprastai atsakome per 24 val.</p>

';



        // Only create if user has permission
        if (current_user_can('edit_posts')) {
            $form_id = wp_insert_post(array(
                'post_title'   => $form_title,
                'post_content' => $form_content,
                'post_status'  => 'publish',
                'post_type'    => 'wpcf7_contact_form',
            ));

            if ($form_id && !is_wp_error($form_id)) {
                clean_post_cache($form_id);
                update_post_meta($form_id, '_wpcf7', $form_id);

                // Set form properties
                $contact_form = WPCF7_ContactForm::get_instance($form_id);
                if ($contact_form) {
                    $props = $contact_form->get_properties();

                    // Insert the same markup as post_content
                    $props['form'] = $form_content;

                    // Example: turn off mail if you don’t want to send actual emails
                    $props['mail'] = array(
                        'active'    => false,
                        'recipient' => '',
                        'subject'   => '',
                        'body'      => '',
                        'additional_headers' => '',
                        'attachments' => '',
                        'use_html'  => false,
                    );

                    $contact_form->set_properties($props);
                    $contact_form->save();
                }

                // Store the new form’s ID in an option
                update_option('cf7_gauti_form_id', $form_id);
            }
        }
    }
}
add_action('after_switch_theme', 'create_cf7_gauti_form');

function run_on_plugin_activation_gauti($plugin) {
    if ($plugin === 'contact-form-7/wp-contact-form-7.php') {
        create_cf7_gauti_form();
    }
}
add_action('activated_plugin', 'run_on_plugin_activation_gauti');

function skip_mail_for_gauti_form($skip_mail, $contact_form) {
    $target_form_id = get_option('cf7_gauti_form_id');
    if ($target_form_id && $contact_form->id() == $target_form_id) {
        return true; // Skip sending email
    }
    return $skip_mail;
}
add_filter('wpcf7_skip_mail', 'skip_mail_for_gauti_form', 10, 2);

function save_cf7_gauti_to_cpt( $contact_form ) {
    $target_form_id = get_option( 'cf7_gauti_form_id' );
    if ( $target_form_id != $contact_form->id() ) {
        return;
    }

    if ( ! ( $submission = WPCF7_Submission::get_instance() ) ) {
        return;
    }

    $data     = $submission->get_posted_data();
    $uploaded = $submission->uploaded_files();

    $post_id = wp_insert_post([
        'post_title'  => sanitize_text_field( $data['cp_gauti_name'] ?? '' ),
        'post_type'   => 'gauti_pasiulyma',
        'post_status' => 'publish',
    ]);

    if ( ! $post_id || is_wp_error($post_id) ) {
        error_log("CF7 Save: Failed to create CPT (wp_insert_post returned " . var_export($post_id, true) . ")");
        return;
    }

    update_post_meta( $post_id, 'cp_gauti_name', sanitize_text_field($data['cp_gauti_name'] ?? '') );
    update_post_meta( $post_id, 'cp_gauti_email', sanitize_email($data['cp_gauti_email'] ?? '') );
    update_post_meta( $post_id, 'cp_gauti_phone', sanitize_text_field($data['cp_gauti_phone'] ?? '') );
    update_post_meta( $post_id, 'cp_gauti_message', sanitize_textarea_field($data['cp_gauti_message'] ?? '') );
    update_post_meta( $post_id, 'cp_gauti_products', is_array($data['cp_gauti_products'] ?? '') ? implode(', ', $data['cp_gauti_products']) : sanitize_text_field($data['cp_gauti_products'] ?? '') );

    // CF7’s file field
    if ( ! empty( $uploaded['cp_gauti_file'] ) ) {
        $temp = $uploaded['cp_gauti_file'];
    } else {
        error_log("CF7 Save: No CF7-uploaded file (cp_gauti_file) found");
    }

    // Make sure we can use media_handle_sideload()
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    if ( ! empty( $uploaded['cp_gauti_file'][0] ) ) {
        $cf7_path = $uploaded['cp_gauti_file'][0];

        // Build a "sideload" array exactly like PHP's $_FILES expects
        $file = [
            'name'     => basename( $cf7_path ),
            'tmp_name' => $cf7_path,
        ];

        // This handles moving + attachment creation in one step
        $attach_id = media_handle_sideload( $file, $post_id );

        if ( is_wp_error( $attach_id ) ) {
            error_log( "CF7 Save: media_handle_sideload failed → " . $attach_id->get_error_message() );
        } else {
            update_post_meta( $post_id, 'cp_gauti_file', $attach_id );
        }
    } else {
        error_log( "CF7 Save: No CF7-uploaded file found" );
    }



}
add_action( 'wpcf7_mail_sent', 'save_cf7_gauti_to_cpt' );

