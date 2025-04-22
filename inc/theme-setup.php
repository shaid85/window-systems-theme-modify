<?php
function langu_sistemos_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    add_theme_support('menus');

    register_nav_menus([
        'primary' => __('Primary Menu', 'langu-sistemos'),
        'footer'  => __('Footer Menu', 'langu-sistemos'),
        'mega_menu' => __('Mega Menu', 'langu-sistemos'),
    ]);
}
add_action('after_setup_theme', 'langu_sistemos_setup');

add_action('after_setup_theme', function() {
    register_nav_menus([
        'footer_col_1' => __('Footer Column 1', 'langu-sistemos'),
        'footer_col_2' => __('Footer Column 2', 'langu-sistemos'),
        'footer_col_3' => __('Footer Column 3', 'langu-sistemos'),
    ]);
});
