<?php
function create_cf7_feedback_form() {
    if (!class_exists('WPCF7')) {
        return;
    }
    $form_title = 'Feedback';
    $existing_form = get_posts(array(
        'post_type'   => 'wpcf7_contact_form',
        'title'       => $form_title,
        'numberposts' => 1,
    ));
    if (empty($existing_form)) {
        $form_content = '<label>Jūsų vardas [text* cp_atsiliepimai_name]</label>
        <label>El. paštas [email* cp_atsiliepimai_email]</label>
        <label>Atsiliepimas [textarea cp_atsiliepimai_feedback]</label>
        <div id="word-count">0/360 words</div>
        <label>Įvertinimas (nuo 1 iki 5) [number* cp_atsiliepimai_rating min:1 max:5]</label>
        [submit "Siųsti"]';
        
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
                $contact_form = WPCF7_ContactForm::get_instance($form_id);
                if ($contact_form) {
                    $props = $contact_form->get_properties();
                    $props['form'] = $form_content;
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
                update_option('cf7_feedback_form_id', $form_id);
            }
        }
    }
}
add_action('after_switch_theme', 'create_cf7_feedback_form');

function run_on_plugin_activation($plugin) {
    if ($plugin === 'contact-form-7/wp-contact-form-7.php') {
        create_cf7_feedback_form();
    }
}
add_action('activated_plugin', 'run_on_plugin_activation');

function skip_mail_for_feedback_form($skip_mail, $contact_form) {
    $target_form_id = get_option('cf7_feedback_form_id');
    if ($target_form_id && $contact_form->id() == $target_form_id) {
        return true;
    }
    return $skip_mail;
}
add_filter('wpcf7_skip_mail', 'skip_mail_for_feedback_form', 10, 2);

function save_cf7_feedback_to_cpt($contact_form) {
    $target_form_id = get_option('cf7_feedback_form_id');
    if ($target_form_id != $contact_form->id()) {
        return;
    }
    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $data = $submission->get_posted_data();
        $name = sanitize_text_field($data['cp_atsiliepimai_name'] ?? '');
        $email = sanitize_email($data['cp_atsiliepimai_email'] ?? '');
        $feedback = sanitize_textarea_field($data['cp_atsiliepimai_feedback'] ?? '');
        $rating = intval($data['cp_atsiliepimai_rating'] ?? 0);
        $post_id = wp_insert_post(array(
            'post_title'  => $name,
            'post_type'   => 'atsiliepimai',
            'post_status' => 'publish',
        ));
        if ($post_id) {
            update_post_meta($post_id, 'cp_atsiliepimai_name', $name);
            update_post_meta($post_id, 'cp_atsiliepimai_email', $email);
            update_post_meta($post_id, 'cp_atsiliepimai_feedback', $feedback);
            update_post_meta($post_id, 'cp_atsiliepimai_rating', $rating);
        }
    }
}
add_action('wpcf7_mail_sent', 'save_cf7_feedback_to_cpt');
