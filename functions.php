<?php

define("LANGU_THEME_DIR", get_template_directory());
define("LANGU_THEME_URI", get_template_directory_uri());

// Include essential files 
require_once LANGU_THEME_DIR . '/inc/theme-setup.php';
require_once LANGU_THEME_DIR . '/inc/class-produkcija-texonomy.php';
require_once LANGU_THEME_DIR . '/inc/plugin-activation.php';
require_once LANGU_THEME_DIR . '/inc/customizer/customizer.php';
require_once LANGU_THEME_DIR . '/inc/widgets.php';

require_once LANGU_THEME_DIR . '/inc/utils.php';
require_once LANGU_THEME_DIR . '/shortcodes/shortcodes.php';

require_once LANGU_THEME_DIR . '/inc/cpts/cpts-init.php';
require_once LANGU_THEME_DIR . '/inc/cpts/archive-description.php';
require_once LANGU_THEME_DIR . '/inc/forms/forms-init.php';
require_once LANGU_THEME_DIR . '/inc/cpts/taxonomies/produkcija_category.php';
require_once LANGU_THEME_DIR . '/inc/cpts/produkcija/class-metaboxes.php';
require_once LANGU_THEME_DIR . '/inc/calc-funx.php';
require_once LANGU_THEME_DIR . '/inc/cal-cpt.php';
require_once LANGU_THEME_DIR . "/inc/customizer/class-apie-mus.php";

// ews page builder
require_once LANGU_THEME_DIR . '/inc/call_flexiable_layout.php';





// ========================================= enqueued scripts and css ==============================================

class Langu_main
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, "wpct_supports_block_widgets"]);
        add_action('admin_enqueue_scripts', [$this, "include_admin_scripts"]);
        add_action('wp_enqueue_scripts', [$this, 'includes_assets']);
    }

    public function includes_assets()
    {
        wp_enqueue_style('global-style', LANGU_THEME_URI . "/assets/css/global.css", [], null);
        wp_enqueue_style('custom-fonts', LANGU_THEME_URI . '/assets/css/fonts.css');
        wp_enqueue_style('mega-menu', LANGU_THEME_URI . '/assets/css/mega-menu.css', ['global-style']);
        wp_enqueue_style('form-css', LANGU_THEME_URI . '/assets/css/wpcf7-form.css');
        wp_enqueue_style('header-css', LANGU_THEME_URI . '/assets/css/header.css');
        // wp_enqueue_style('custom-css', LANGU_THEME_URI . '/assets/css/custom.css');
        wp_enqueue_style('langu-loader-css', LANGU_THEME_URI . "/assets/css/ajax-loader.css");
        wp_enqueue_style('tailwind-build', LANGU_THEME_URI . "/dist/output.css");
        // ews_new_style
        wp_enqueue_style('modified_by_dev2-css', LANGU_THEME_URI . '/assets/css/modified_dev2.css');


        wp_enqueue_script('langu-loader-js', LANGU_THEME_URI . "/assets/js/langu-loader.js", ['jquery'], null, true);
        wp_enqueue_script('mega-menu-js', LANGU_THEME_URI . "/assets/js/mega-menu.js", ['jquery'], null, true);
        // swiper js
        wp_enqueue_style('swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.min.css');
        wp_enqueue_script('swiper-script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.min.js', array('jquery'), null, true);
        wp_enqueue_script('header-sticky', LANGU_THEME_URI . "/assets/js/header.js", ["jquery"], null, true);
        //ews new js
        wp_enqueue_script('new-actions', get_template_directory_uri() . '/assets/js/new_actions.js', array(), '2.0.0', 'true');
    }

    public function include_admin_scripts($hook)
    {
        if (in_array($hook, array('post.php', 'post-new.php'))) {
            wp_enqueue_media();
            wp_enqueue_script('cp-admin-script', LANGU_THEME_URI . '/assets/js/main.js', array('jquery'), '1.0', true);
        }
    }

    public function wpct_supports_block_widgets()
    {
        add_theme_support('widgets-block-editor');
    }
}

new Langu_main();

function public_assets()
{
    wp_enqueue_style('custom-style', LANGU_THEME_URI . '/assets/css/home.css', [], '1.0');
    wp_enqueue_script('custom-js', LANGU_THEME_URI . '/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'public_assets');

/** ----------------------TESTING ----------------------- */




//pagination flush rewrite rules

function add_atsiliepimai_rewrite_rules()
{
    add_rewrite_rule(
        '^atsiliepimai/page/([0-9]+)/?$',
        'index.php?post_type=atsiliepimai&paged=$matches[1]',
        'top'
    );
}
add_action('init', 'add_atsiliepimai_rewrite_rules');

function fix_atsiliepimai_query($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('atsiliepimai')) {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query->set('posts_per_page', 2);
        $query->set('paged', $paged);
    }
}
add_action('pre_get_posts', 'fix_atsiliepimai_query');

function flush_rewrite_rules_on_activation()
{
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_on_activation');


// svg upload support

function allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');
