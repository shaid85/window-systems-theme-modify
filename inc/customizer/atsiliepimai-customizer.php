<?php
function atsiliepimai_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'atsiliepimai_settings', array(
        'title'    => __('Atsiliepimai', 'langu-sistemos'),
        'priority' => 60,
    ) );

    $fields = array(
        'atsiliepimai_text'   => '“Lorem ipsum dolor sit amet consectetur. Dui accumsan convallis viverra eu dignissim. Ut phasellus ut duis auctor. Nulla amet augue cursus ullamcorper enim. Eu urna quis tincidunt imperdiet fermentum.”',
        'atsiliepimai_author' => 'Olivia Gardens',
    );

    foreach ( $fields as $key => $default ) {
        $wp_customize->add_setting( $key, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $control_type = ( $key === 'atsiliepimai_text' ) ? 'textarea' : 'text';

        $wp_customize->add_control( $key, array(
            'label'   => ucwords( str_replace( '_', ' ', $key ) ),
            'section' => 'atsiliepimai_settings',
            'type'    => $control_type,
        ) );
    }
}
add_action( 'customize_register', 'atsiliepimai_customize_register' );

function atsiliepimai_set_default_customizer_values() {
    $defaults = array(
        'atsiliepimai_text'   => '“Lorem ipsum dolor sit amet consectetur. Dui accumsan convallis viverra eu dignissim. Ut phasellus ut duis auctor. Nulla amet augue cursus ullamcorper enim. Eu urna quis tincidunt imperdiet fermentum.”',
        'atsiliepimai_author' => 'Olivia Gardens',
    );

    foreach ( $defaults as $key => $value ) {
        if ( get_theme_mod( $key ) === false ) {
            set_theme_mod( $key, $value );
        }
    }
}
add_action( 'after_switch_theme', 'atsiliepimai_set_default_customizer_values' );
?>
