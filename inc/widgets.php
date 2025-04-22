<?php
function wpct_register_sidebar_widgets() {
    register_sidebar( array(
        'name'          => __( 'Custom Main Sidebar', 'wpct-theme' ),
        'id'            => 'main-sidebar',
        'description'   => __( 'Add widgets to the main sidebar.', 'wpct-theme' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpct_register_sidebar_widgets' );