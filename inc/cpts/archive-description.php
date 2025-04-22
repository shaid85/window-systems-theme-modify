<?php

/**
 * Add “CPT Archive Descriptions” admin page
 */
function cp_register_cpt_desc_page()
{
    add_menu_page(
        __('CPT Archive Descriptions', 'langu-sistemos'),
        __('CPT Descriptions', 'langu-sistemos'),
        'manage_options',
        'cp-cpt-archive-descriptions',
        'cp_render_cpt_desc_page',
        'dashicons-text-page',
        30
    );
}
add_action('admin_menu', 'cp_register_cpt_desc_page');

function cp_render_cpt_desc_page()
{
    if (isset($_POST['cp_cpt_desc_nonce'])) {
        if (wp_verify_nonce($_POST['cp_cpt_desc_nonce'], 'cp_save_cpt_desc')) {
            $data = array_map('wp_kses_post', $_POST['cpt_desc']);
            $result = update_option('cp_cpt_archive_descriptions', $data);

            if ($result === false) {
                error_log('Error updating cp_cpt_archive_descriptions option.');
                echo '<div class="error"><p>' . esc_html__('An error occurred while saving. Please try again.', 'langu-sistemos') . '</p></div>';
            } else {
                echo '<div class="updated"><p>' . esc_html__('Saved successfully.', 'langu-sistemos') . '</p></div>';
            }
        } else {
            echo '<div class="error"><p>' . esc_html__('Security check failed. Please try again.', 'langu-sistemos') . '</p></div>';
        }
    }

    $saved = get_option('cp_cpt_archive_descriptions', []);

    $args = [
        'show_ui' => true,
        '_builtin' => false
    ];
    $cpts = get_post_types($args, 'objects');
    $exits = false;
    foreach ($cpts as $post_type => $obj) {
        if ($post_type === 'post') {
            $exits = true;
            break;
        }
    }
    if( !$exits ) {
        $cpts['post'] = get_post_type_object('post');
    }

    $exclude_labels = array('Field Groups', 'Post Types', 'Taxonomies');
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('CPT Archive Descriptions', 'langu-sistemos'); ?></h1>
        <style>
            .cpt-col {
                width: 48%;
                float: left;
                margin-right: 2%;
                box-sizing: border-box;
                margin-bottom: 20px;
            }

            .cpt-col:nth-child(2n) {
                margin-right: 0;
            }

            .cpt-clear {
                clear: both;
            }
        </style>
        <form method="post">
            <?php wp_nonce_field('cp_save_cpt_desc', 'cp_cpt_desc_nonce'); ?>
            <?php foreach ($cpts as $post_type => $obj): ?>
                <?php
                if (in_array($obj->labels->name, $exclude_labels, true)) {
                    continue;
                }
                ?>
                <div class="cpt-col">
                    <h2 style="font-size: 24px;"><?php echo esc_html($obj->labels->name); ?></h2>
                    <?php
                    wp_editor(
                        $saved[$post_type] ?? '',
                        'cpt_desc_' . esc_attr($post_type),
                        [
                            'textarea_name' => "cpt_desc[" . esc_attr($post_type) . "]",
                            'media_buttons' => true,
                            'teeny' => false,
                            'quicktags' => true,
                            'textarea_rows' => 10
                        ]
                    );
                    ?>
                </div>
            <?php endforeach; ?>
            <div class="cpt-clear"></div>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
?>