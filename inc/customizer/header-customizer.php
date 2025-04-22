<?php
// Top Bar Customizer Settings
function top_bar_register($wp_customize) {
    // Header Logo Setting and Control
    $wp_customize->add_setting('header_logo', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label'    => __('Upload Logo', 'mytheme'),
        'section'  => 'title_tagline',
        'settings' => 'header_logo',
    )));
    
    // Top Bar Section
    $wp_customize->add_section('header_topbar', [
        'title'    => __('Header Top Bar', 'langu-sistemos'),
        'priority' => 30,
    ]);

    // Top Bar Items Settings and Controls
    $items = [
        'topbar_item_1'   => '10 metų garantija',
        'topbar_item_2'   => 'Greitas aptarnavimas',
        'topbar_item_3'   => '20+ metų patirtis',
        'topbar_item_4'   => 'Klientų įvertinimas',
        'topbar_rating'   => '4.9',
        'total_user_rated'=> '120',
        'topbar_timing'   => 'Darbo laikas: I – V 8.00 – 17.00',
        'topbar_phone'    => '+37067444443',
        'topbar_email'    => 'info@langu-sistemos.lt'
    ];

    foreach ($items as $key => $default) {
        $wp_customize->add_setting($key, [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control($key, [
            'label'   => ucwords(str_replace('_', ' ', $key)),
            'section' => 'header_topbar',
            'type'    => 'text'
        ]);
    }
}
add_action('customize_register', 'top_bar_register');


// Footer Customizer Settings
function footer_customize_register($wp_customize) {
    // Footer Settings Section
    $wp_customize->add_section('footer_settings', [
        'title'    => __('Footer Settings', 'langu-sistemos'),
        'priority' => 160,
    ]);

    // Footer Description Setting and Control
    $wp_customize->add_setting('footer_title', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_title', [
        'label'   => __('Footer title', 'langu-sistemos'),
        'section' => 'footer_settings',
        'type'    => 'text',
    ]);

    // Footer Color Description Setting and Control
    $wp_customize->add_setting('footer_description', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('footer_description', [
        'label'   => __('Footer Description', 'langu-sistemos'),
        'section' => 'footer_settings',
        'type'    => 'textarea',
    ]);
}
add_action('customize_register', 'footer_customize_register');


// Initialize Default Values on Theme Activation for Top Bar and Footer
function set_default_customizer_values_topbar_footer() {
    // Header Logo default (if needed)
    if ( get_theme_mod('header_logo') === false ) {
        set_theme_mod('header_logo', LANGU_THEME_URI . '/assets/icons/svg/logo.svg');
    }
    
    // Top Bar Defaults
    $topbar_defaults = [
        'topbar_item_1'   => '10 metų garantija',
        'topbar_item_2'   => 'Greitas aptarnavimas',
        'topbar_item_3'   => '20+ metų patirtis',
        'topbar_item_4'   => 'Klientų įvertinimas',
        'topbar_rating'   => '4.9',
        'total_user_rated'=> '120',
        'topbar_timing'   => 'Darbo laikas: I – V 8.00 – 17.00',
        'topbar_phone'    => '+37067444443',
        'topbar_email'    => 'info@langu-sistemos.lt'
    ];
    foreach ($topbar_defaults as $key => $value) {
        if ( get_theme_mod($key) === false ) {
            set_theme_mod($key, $value);
        }
    }
    
    // Footer Defaults
    $footer_defaults = [
        'footer_description'       => 'Lorem ipsum dolor sit amet consectetur. Lobortis felis enim ac sit lacus aliquam egestas.',
        'footer_color_description' => 'In ultrices maecenas vestibulum cursus.'
    ];
    foreach ($footer_defaults as $key => $value) {
        if ( get_theme_mod($key) === false ) {
            set_theme_mod($key, $value);
        }
    }
}
add_action('after_switch_theme', 'set_default_customizer_values_topbar_footer');
?>
