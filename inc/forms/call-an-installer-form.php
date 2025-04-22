<?php

/**
 * Create a new CF7 form for "Išsikviesti matuotoja"
 */
function create_cf7_issikviesti_matuotoja_form()
{
    if (! class_exists('WPCF7')) {
        return;
    }

    $form_title = 'Išsikviesti matuotoja';

    // Check if this form already exists
    $existing_form = get_posts([
        'post_type'   => 'wpcf7_contact_form',
        'title'       => $form_title,
        'numberposts' => 1,
    ]);
    if (! empty($existing_form)) {
        return; // Already exists
    }

    $form_content = '
<label>Jūsų vardas [text* cp_ism_name]</label>

<div class="cf7-row">
  <label class="cf7-col">El. paštas [email* cp_ism_email]</label>
  <label class="cf7-col">Telefono numeris [tel cp_ism_phone]</label>
</div>

<label>Objekto adresas [text* cp_ism_address placeholder "Gatvė, namo nr, miestas"]</label>
<label>Komentaras [textarea cp_ism_comment]</label>

<div class="cf7-row cf7-checkbox-group">
  <fieldset class="cf7-col">
    <legend>Pažymėkite dominančius gaminius</legend>
    [checkbox cp_ism_products use_label_element
      "Plastikiniai langai"
      "Mediniai langai"
      "Aliuminio langai"
      "Aliuminio balkonų stiklinimo sistema"
      "Plastikinė balkonų stiklinimo sistema"
    ]
  </fieldset>
  <fieldset class="cf7-col">
    <legend>&nbsp;</legend>
    [checkbox cp_ism_products use_label_element
      "Durys daugiabučio laiptinei"
      "Šarvuotos buto durys"
      "Šarvuotos lauko durys"
    ]
  </fieldset>
</div>

[submit "Siųsti užklausą"]
<p class="font-bold response-time">Įprastai atsakome per 24 val.</p>

';




    // Create the form if user can edit posts
    if (current_user_can('edit_posts')) {
        $form_id = wp_insert_post([
            'post_title'   => $form_title,
            'post_content' => $form_content,
            'post_status'  => 'publish',
            'post_type'    => 'wpcf7_contact_form',
        ]);
        if ($form_id && ! is_wp_error($form_id)) {
            clean_post_cache($form_id);
            update_post_meta($form_id, '_wpcf7', $form_id);

            // Set additional properties
            $contact_form = WPCF7_ContactForm::get_instance($form_id);
            if ($contact_form) {
                $props         = $contact_form->get_properties();
                $props['form'] = $form_content;

                // Example: disable mail if you don't want to send actual emails
                $props['mail'] = [
                    'active'             => false,
                    'recipient'          => '',
                    'subject'            => '',
                    'body'               => '',
                    'additional_headers' => '',
                    'attachments'        => '',
                    'use_html'           => false,
                ];

                $contact_form->set_properties($props);
                $contact_form->save();
            }

            // Store the new form ID
            update_option('cf7_issikviesti_matuotoja_form_id', $form_id);
        }
    }
}
add_action('after_switch_theme', 'create_cf7_issikviesti_matuotoja_form');

function run_on_plugin_activation_issikviesti($plugin)
{
    if ($plugin === 'contact-form-7/wp-contact-form-7.php') {
        create_cf7_issikviesti_matuotoja_form();
    }
}
add_action('activated_plugin', 'run_on_plugin_activation_issikviesti');

/**
 * Skip mail for the "Išsikviesti matuotoja" form
 */
function skip_mail_for_issikviesti_matuotoja($skip_mail, $contact_form)
{
    $target_form_id = get_option('cf7_issikviesti_matuotoja_form_id');
    if ($target_form_id && $contact_form->id() == $target_form_id) {
        return true; // Skip email
    }
    return $skip_mail;
}
add_filter('wpcf7_skip_mail', 'skip_mail_for_issikviesti_matuotoja', 10, 2);

/**
 * Save form submissions to the CPT
 */
function save_cf7_issikviesti_matuotoja($contact_form) {
    $target_form_id = get_option('cf7_issikviesti_matuotoja_form_id');
    if ($target_form_id != $contact_form->id()) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $data = $submission->get_posted_data();

        $name     = sanitize_text_field($data['cp_ism_name'] ?? '');
        $email    = sanitize_email($data['cp_ism_email'] ?? '');
        $phone    = sanitize_text_field($data['cp_ism_phone'] ?? '');
        $address  = sanitize_text_field($data['cp_ism_address'] ?? '');
        $comment  = sanitize_textarea_field($data['cp_ism_comment'] ?? '');
        $products = $data['cp_ism_products'] ?? [];

        if (is_array($products)) {
            $products_string = implode(', ', $products);
        } else {
            $products_string = sanitize_text_field($products);
        }

        // Create a new CPT post
        $post_id = wp_insert_post([
            'post_title'  => $name,
            'post_type'   => 'matuotoja',
            'post_status' => 'publish',
        ]);

        if ($post_id && !is_wp_error($post_id)) {
            // Save custom fields
            update_post_meta($post_id, 'cp_ism_name', $name);
            update_post_meta($post_id, 'cp_ism_email', $email);
            update_post_meta($post_id, 'cp_ism_phone', $phone);
            update_post_meta($post_id, 'cp_ism_address', $address);
            update_post_meta($post_id, 'cp_ism_comment', $comment);
            update_post_meta($post_id, 'cp_ism_products', $products_string);
        }
    }
}
add_action('wpcf7_before_send_mail', 'save_cf7_issikviesti_matuotoja');

add_action('wpcf7_mail_sent', 'save_cf7_issikviesti_matuotoja');
