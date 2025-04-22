<?php

//adding checkbox list in the text editor

add_action('admin_init', function() {
    // Tell TinyMCE about our plugin JS file
    add_filter('mce_external_plugins', function($plugins) {
        $plugins['checkbox_list'] = LANGU_THEME_URI . '/assets/js/checkbox-list.js';
        return $plugins;
    });

    // Add our button to the first toolbar row
    add_filter('mce_buttons', function($buttons) {
        $buttons[] = 'checkbox_list';
        return $buttons;
    });
});

function langu_print_log($raw)
{
  error_log(print_r($raw, true));
}

//auto create pages for templates
function create_pages_for_templates_folder() {
    $files = glob( get_stylesheet_directory() . '/templates/*.php' );
    foreach ( (array) $files as $path ) {
        $template_name = get_file_data( $path, ['Template Name'=>'Template Name'] )['Template Name'] ?? '';
        if ( ! $template_name ) {
            continue;
        }

        $template_file = 'templates/' . basename( $path );
        $exists = get_posts([
            'post_type'      => 'page',
            'meta_key'       => '_wp_page_template',
            'meta_value'     => $template_file,
            'posts_per_page' => 1,
            'fields'         => 'ids',
        ]);

        if ( empty($exists) ) {
            $page_id = wp_insert_post([
                'post_title'  => $template_name,
                'post_name'   => sanitize_title( $template_name ),
                'post_type'   => 'page',
                'post_status' => 'publish',
            ]);

            if ( ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $template_file );
            }
        }
    }
}
add_action( 'after_switch_theme', 'create_pages_for_templates_folder' );