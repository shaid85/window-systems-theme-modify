<?php
require_once( get_template_directory() . '/inc/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'langu_sistemos_register_required_plugins' );
function langu_sistemos_register_required_plugins() {
    $plugins = array(
        array(
            'name'     => 'Advanced Custom Fields',
            'slug'     => 'advanced-custom-fields',
            'required' => true,
        ),
        array(
            'name'     => 'Contact Form 7',
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name'     => 'Classic Editor',
            'slug'     => 'classic-editor',
            'required' => true,
        ),
    );

    $config = array(
        'id'           => 'langu-sistemos',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );
}
