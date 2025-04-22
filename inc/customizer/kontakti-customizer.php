<?php
function contact_customize_register( $wp_customize ) {
    $wp_customize->add_section('contact_settings', [
        'title'    => __('Contact Us ','langu-sistemos'),
        'priority' => 70,
    ]);

    $fields = [
        'company_name'    => 'UAB „Langų sistemos“',
        'company_code'    => '302323852',
        'vat_code'        => 'LT100004622115',
        'account_number'  => 'LT56 7044 0600 0686 6399',
        'bank_name'       => 'AB „SEB bankas“',
        'bank_code'       => '70440',
        'manager_name'    => 'Vardenis Pavardenis',
        'manager_phone'   => '+370 616 55 133',
        'manager_email'   => 'direktorius@langu-sistemos.lt',
    ];

    foreach ( $fields as $key => $default ) {
        $wp_customize->add_setting( $key, [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control( $key, [
            'label'   => ucwords(str_replace('_', ' ', $key)),
            'section' => 'contact_settings',
            'type'    => 'text',
        ]);
    }
}
add_action('customize_register', 'contact_customize_register');

function contact_set_default_customizer_values() {
    $defaults = [
        'company_name'    => 'UAB „Langų sistemos“',
        'company_code'    => '302323852',
        'vat_code'        => 'LT100004622115',
        'account_number'  => 'LT56 7044 0600 0686 6399',
        'bank_name'       => 'AB „SEB bankas“',
        'bank_code'       => '70440',
        'manager_name'    => 'Vardenis Pavardenis',
        'manager_phone'   => '+370 616 55 133',
        'manager_email'   => 'direktorius@langu-sistemos.lt',
    ];

    foreach ( $defaults as $key => $value ) {
        if ( get_theme_mod( $key ) === false ) {
            set_theme_mod( $key, $value );
        }
    }
}
add_action('after_switch_theme', 'contact_set_default_customizer_values');
?>
