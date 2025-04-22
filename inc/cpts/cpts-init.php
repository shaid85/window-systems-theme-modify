<?php
/**
 * Register Custom Post Types with Dashicons,
 * Add Meta Boxes, and Admin CSS for Better UI
 */

/**************************************************************
 * 1. Register Custom Post Types (with Dashicons)             *
 **************************************************************/
function cp_register_custom_post_types()
{
    register_post_type('produkcija', array(
        'labels' => array('name' => __('Produkcija'), 'singular_name' => __('Produkcija')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'produkcija', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));

    register_post_type('paslaugos', array(
        'labels' => array('name' => __('Paslaugos'), 'singular_name' => __('Paslaugos')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'paslaugos', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor'),
    ));

    register_post_type('atsiliepimai', array(
        'labels' => array('name' => __('Atsiliepimai'), 'singular_name' => __('Atsiliepimai')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'atsiliepimai', 'with_front' => false, 'pages' => true, ),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title'),
    ));

    register_post_type('pasiekimai', array(
        'labels' => array('name' => __('Pasiekimai'), 'singular_name' => __('Pasiekimai')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'pasiekimai', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-awards',
        'supports' => array('title'),
    ));

    register_post_type('atlikti_darbai', array(
        'labels' => array('name' => __('Atlikti darbai'), 'singular_name' => __('Atlikti darbai')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'atlikti-darbai', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor'),
    ));

    register_post_type('padaliniai', array(
        'labels' => array('name' => __('Padaliniai'), 'singular_name' => __('Padaliniai')),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'padaliniai', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'editor'),
    ));

    register_post_type('faq', array(
        'labels' => array('name' => __('FAQ'), 'singular_name' => __('FAQ')),
        'public' => true,
        'has_archive' => 'dažnai-užduodami-klausimai',
        'rewrite' => array('slug' => 'faq', 'with_front' => false),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array('title', 'editor'),
    ));

    register_post_type('gauti_pasiulyma', array(
        'labels' => array('name' => __('Gauti pasiūlymą'), 'singular_name' => __('Gauti pasiūlymą')),
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-tag',
        'supports' => array('title', 'editor'),
    ));

        register_post_type('matuotoja', array(
            'labels' => array('name' => __('Išsikviesti matuotoja'), 'singular_name' => __('Išsikviesti matuotoja')),
            'public' => false,
            'has_archive' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-hammer',
            'supports' => array('title', 'editor'),
        ));
    }
    add_action('init', 'cp_register_custom_post_types');


/***************************************************
 * 2. Register Taxonomies (Example for Produkcija) *
 ***************************************************/

/** refer taxonomies folder */

    /***********************************************************
     * 3. Add Meta Boxes for Each Post Type                    *
     ***********************************************************/
    function cp_add_meta_boxes()
    {
        add_meta_box('produkcija_meta', 'Produkcija Details', 'cp_produkcija_meta_callback', 'produkcija', 'normal', 'high');
        add_meta_box('paslaugos_meta', 'Paslaugos Details', 'cp_paslaugos_meta_callback', 'paslaugos', 'normal', 'high');
        add_meta_box('atsiliepimai_meta', 'Atsiliepimai Details', 'cp_atsiliepimai_meta_callback', 'atsiliepimai', 'normal', 'high');
        add_meta_box('pasiekimai_meta', 'Pasiekimai Details', 'cp_pasiekimai_meta_callback', 'pasiekimai', 'normal', 'high');
        add_meta_box('atlikti_darbai_meta', 'Atlikti darbai Details', 'cp_atlikti_darbai_meta_callback', 'atlikti_darbai', 'normal', 'high');
        add_meta_box('padaliniai_meta', 'Padaliniai Details', 'cp_padaliniai_meta_callback', 'padaliniai', 'normal', 'high');
        add_meta_box('faq_meta', 'cp_faq_meta_callback', 'faq', 'normal', 'high');
        add_meta_box('gauti_pasiulyma_meta', 'Gauti pasiūlymą Details', 'cp_gauti_pasiulyma_meta_callback', 'gauti_pasiulyma', 'normal', 'high');
        add_meta_box('matuotoja_meta', 'Išsikviesti matuotoja Details','cp_matuotoja_meta_callback', 'matuotoja', 'normal', 'high');
    }
    add_action('add_meta_boxes', 'cp_add_meta_boxes');


/********************************************************
 * 4. Meta Box Callbacks (Wrapped with cp-custom-metabox *
 ********************************************************/

// PRODUKCIJA Meta Box
function cp_produkcija_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <style>
        /* Custom styling for the meta box */
        .cp-custom-metabox {
            border: 1px solid #ddd;
            padding: 15px;
            background: #fff;
            font-family: Arial, sans-serif;
        }

        .cp-custom-metabox h4 {
            border-bottom: 2px solid #0073aa;
            padding-bottom: 5px;
            margin-top: 20px;
            color: #0073aa;
        }

        .cp-custom-metabox .form-table {
            width: 100%;
            margin-bottom: 15px;
        }

        .cp-custom-metabox .form-table th {
            text-align: left;
            width: 20%;
            vertical-align: top;
            padding-top: 10px;
        }

        .cp-custom-metabox .form-table td {
            width: 80%;
            padding-top: 10px;
        }

        .cp-custom-metabox table {
            border: 1px solid #eee;
            margin-bottom: 10px;
            width: 100%;
        }

        .cp-custom-metabox table td,
        .cp-custom-metabox table th {
            padding: 8px;
        }

        .feature_item,
        .technical_data_item,
        .additional_item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
            background: #f9f9f9;
        }

        .delete_item {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 3px 8px;
            cursor: pointer;
        }

        .upload_gallery_button,
        .upload_image_button {
            margin-left: 5px;
            cursor: pointer;
        }

        button#add_feature_item,
        button#add_technical_data_item,
        button#add_additional_item {
            margin-top: 10px;
            padding: 5px 10px;
            background: #0073aa;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>

    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Image Post Gallery</label></th>
                <td>
                    <input type="text" name="cp_image_post_gallery"
                        value="<?php echo esc_attr($meta['cp_image_post_gallery'][0] ?? ''); ?>" style="width:80%;" />
                    <button type="button" class="upload_gallery_button">Upload Gallery</button>
                </td>
            </tr>
            <tr>
                <th><label>Main Gallery</label></th>
                <td>
                    <input type="text" name="cp_main_gallery"
                        value="<?php echo esc_attr($meta['cp_main_gallery'][0] ?? ''); ?>" style="width:80%;" />
                    <button type="button" class="upload_gallery_button">Upload Gallery</button>
                </td>
            </tr>
            <tr>
                <th><label>Features Description</label></th>
                <td>
                    <textarea name="cp_features_description"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_features_description'][0] ?? ''); ?></textarea>
                </td>
            </tr>
        </table>

        <h4>Features Items</h4>
        <div id="features_items">
            <?php
            $features_items = maybe_unserialize($meta['cp_features_items'][0] ?? '');
            if (!empty($features_items)) {
                foreach ($features_items as $index => $item) {
                    ?>
                    <div class="feature_item">
                        <button type="button" class="delete_item">Delete</button>
                        <table class="form-table">
                            <tr>
                                <th><label>Title</label></th>
                                <td><input type="text" name="cp_features_items[<?php echo $index; ?>][title]"
                                        value="<?php echo esc_attr($item['title']); ?>" /></td>
                            </tr>
                            <tr>
                                <th><label>Icon</label></th>
                                <td>
                                    <input type="text" name="cp_features_items[<?php echo $index; ?>][icon]"
                                        value="<?php echo esc_attr($item['icon']); ?>" style="width:70%;" />
                                    <button type="button" class="upload_image_button">Upload Icon</button>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Description</label></th>
                                <td>
                                    <textarea name="cp_features_items[<?php echo $index; ?>][description]"
                                        style="width:70%;"><?php echo esc_textarea($item['description']); ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <button type="button" id="add_feature_item">Add Feature Item</button>

        <h4>Technical Data</h4>
        <table class="form-table">
            <tr>
                <th><label>Technical Data Description</label></th>
                <td>
                    <textarea name="cp_technical_data_description"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_technical_data_description'][0] ?? ''); ?></textarea>
                </td>
            </tr>
        </table>
        <div id="technical_data_items">
            <h4>Data Items</h4>
            <?php
            $technical_data_items = maybe_unserialize($meta['cp_technical_data_items'][0] ?? '');
            if (!empty($technical_data_items)) {
                foreach ($technical_data_items as $index => $item) {
                    ?>
                    <div class="technical_data_item">
                        <button type="button" class="delete_item">Delete</button>
                        <table class="form-table">
                            <tr>
                                <th><label>Text</label></th>
                                <td><input type="text" name="cp_technical_data_items[<?php echo $index; ?>][text]"
                                        value="<?php echo esc_attr($item['text']); ?>" /></td>
                            </tr>
                            <tr>
                                <th><label>Value</label></th>
                                <td><input type="text" name="cp_technical_data_items[<?php echo $index; ?>][value]"
                                        value="<?php echo esc_attr($item['value']); ?>" /></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <button type="button" id="add_technical_data_item">Add Technical Data Item</button>

        <h4>Spalvos</h4>
        <table class="form-table">
            <tr>
                <th><label>Spalvos Description</label></th>
                <td>
                    <textarea name="cp_spalvos_description"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_spalvos_description'][0] ?? ''); ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label>Image Gallery</label></th>
                <td>
                    <input type="text" name="cp_spalvos_image_gallery"
                        value="<?php echo esc_attr($meta['cp_spalvos_image_gallery'][0] ?? ''); ?>" style="width:80%;" />
                    <button type="button" class="upload_gallery_button">Upload Gallery</button>
                </td>
            </tr>
        </table>

        <h4>Additional Information</h4>
        <table class="form-table">
            <tr>
                <th><label>Image</label></th>
                <td>
                    <input type="text" name="cp_additional_information_image"
                        value="<?php echo esc_attr($meta['cp_additional_information_image'][0] ?? ''); ?>"
                        style="width:80%;" />
                    <button type="button" class="upload_image_button">Upload Image</button>
                </td>
            </tr>
        </table>
        <div id="additional_information_items">
            <h4>Items</h4>
            <?php
            $additional_items = maybe_unserialize($meta['cp_additional_information_items'][0] ?? '');
            if (!empty($additional_items)) {
                foreach ($additional_items as $index => $item) {
                    ?>
                    <div class="additional_item">
                        <button type="button" class="delete_item">Delete</button>
                        <table class="form-table">
                            <tr>
                                <th><label>Title</label></th>
                                <td><input type="text" name="cp_additional_information_items[<?php echo $index; ?>][title]"
                                        value="<?php echo esc_attr($item['title']); ?>" /></td>
                            </tr>
                            <tr>
                                <th><label>Description</label></th>
                                <td>
                                    <textarea name="cp_additional_information_items[<?php echo $index; ?>][description]"
                                        style="width:70%;"><?php echo esc_textarea($item['description']); ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <button type="button" id="add_additional_item">Add Additional Item</button>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            let cpMediaFrame;

            $(document).on('click', '.upload_image_button, .upload_gallery_button', function (e) {
                e.preventDefault();
                var button = $(this);

                // If the frame already exists, re-open it:
                if (cpMediaFrame) {
                    cpMediaFrame.open();
                    return;
                }

                // Otherwise, create a new media frame
                cpMediaFrame = wp.media({
                    title: 'Select or Upload Media',
                    button: { text: 'Use this file' },
                    multiple: false
                });

                cpMediaFrame.on('select', function () {
                    var attachment = cpMediaFrame.state().get('selection').first().toJSON();
                    button.prev('input').val(attachment.url);
                });

                cpMediaFrame.open();
            });


            // Add new Feature Item
            $('#add_feature_item').on('click', function () {
                var index = $('#features_items .feature_item').length;
                var newItem = '<div class="feature_item">' +
                    '<button type="button" class="delete_item">Delete</button>' +
                    '<table class="form-table">' +
                    '<tr>' +
                    '<th><label>Title</label></th>' +
                    '<td><input type="text" name="cp_features_items[' + index + '][title]" /></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th><label>Icon</label></th>' +
                    '<td><input type="text" name="cp_features_items[' + index + '][icon]" style="width:70%;" />' +
                    '<button type="button" class="upload_image_button">Upload Icon</button></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th><label>Description</label></th>' +
                    '<td><textarea name="cp_features_items[' + index + '][description]" style="width:70%;"></textarea></td>' +
                    '</tr>' +
                    '</table>' +
                    '</div>';
                $('#features_items').append(newItem);
            });

            // Add new Technical Data Item
            $('#add_technical_data_item').on('click', function () {
                var index = $('#technical_data_items .technical_data_item').length;
                var newItem = '<div class="technical_data_item">' +
                    '<button type="button" class="delete_item">Delete</button>' +
                    '<table class="form-table">' +
                    '<tr>' +
                    '<th><label>Text</label></th>' +
                    '<td><input type="text" name="cp_technical_data_items[' + index + '][text]" /></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th><label>Value</label></th>' +
                    '<td><input type="text" name="cp_technical_data_items[' + index + '][value]" /></td>' +
                    '</tr>' +
                    '</table>' +
                    '</div>';
                $('#technical_data_items').append(newItem);
            });

            // Add new Additional Item
            $('#add_additional_item').on('click', function () {
                var index = $('#additional_information_items .additional_item').length;
                var newItem = '<div class="additional_item">' +
                    '<button type="button" class="delete_item">Delete</button>' +
                    '<table class="form-table">' +
                    '<tr>' +
                    '<th><label>Title</label></th>' +
                    '<td><input type="text" name="cp_additional_information_items[' + index + '][title]" /></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th><label>Description</label></th>' +
                    '<td><textarea name="cp_additional_information_items[' + index + '][description]" style="width:70%;"></textarea></td>' +
                    '</tr>' +
                    '</table>' +
                    '</div>';
                $('#additional_information_items').append(newItem);
            });

            // Delete an item block when delete button is clicked
            $(document).on('click', '.delete_item', function () {
                if (confirm('Are you sure you want to delete this item?')) {
                    $(this).closest('.feature_item, .technical_data_item, .additional_item').remove();
                }
            });
        });
    </script>

    <?php
}

// PASLAUGOS Meta Box 

function cp_paslaugos_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    $images = maybe_unserialize($meta['cp_paslaugos_images'][0] ?? []);
    $icon = esc_attr($meta['cp_paslaugos_icon'][0] ?? '');
    $cp_paslaugos_call_an_installer_button = esc_attr($meta['cp_paslaugos_call_an_installer_button'][0] ?? '');
    ?>
    <div id="paslaugos_images">
        <h4>Images (exactly 2)</h4>
        <?php foreach ($images as $i => $url): ?>
            <div class="paslaugos_image">
                <input type="text" name="cp_paslaugos_images[]" value="<?php echo esc_attr($url) ?>" style="width:70%">
                <button class="upload_image_button">Upload</button>
                <button class="remove_image_button">Remove</button>
                <hr>
            </div>
        <?php endforeach ?>
    </div>
    <button type="button" id="add_paslaugos_image">Add Image</button>

    <hr>

    <h4>Icon</h4>
    <div>
        <input type="text" id="cp_paslaugos_icon" name="cp_paslaugos_icon" value="<?php echo $icon ?>" style="width:70%">
        <button class="upload_image_button">Upload Icon</button>
    </div>


    <div style="padding: 12px 4px;">
        <input type="checkbox" id="cp_paslaugos_call_an_installer_button" name="cp_paslaugos_call_an_installer_button"
            value="1" <?php checked($cp_paslaugos_call_an_installer_button, '1'); ?>>
        <span>Montuotojo iškvietimas Button</span>
    </div>

    <script>
        jQuery(function ($) {
            let frame, current;

            function openMedia() {
                if (frame) { frame.open(); return; }
                frame = wp.media({ title: 'Select', button: { text: 'Use' }, multiple: false })
                    .on('select', () => {
                        let attachment = frame.state().get('selection').first().toJSON();
                        current.prev('input').val(attachment.url);
                    });
                frame.open();
            }

            $(document).on('click', '.upload_image_button', function (e) {
                e.preventDefault();
                current = $(this);
                openMedia();
            });

            $('#add_paslaugos_image').click(function () {
                if ($('#paslaugos_images .paslaugos_image').length < 2) {
                    $('#paslaugos_images').append(`
                        <div class="paslaugos_image">
                            <input type="text" name="cp_paslaugos_images[]" style="width:70%">
                            <button class="upload_image_button">Upload</button>
                            <button class="remove_image_button">Remove</button><hr>
                        </div>
                    `);
                }
                $(this).prop('disabled', $('#paslaugos_images .paslaugos_image').length >= 2);
            });

            $('#paslaugos_images').on('click', '.remove_image_button', function () {
                $(this).closest('.paslaugos_image').remove();
                $('#add_paslaugos_image').prop('disabled', $('#paslaugos_images .paslaugos_image').length >= 2);
            });
        });
    </script>
    <?php
}

add_action('save_post', function ($post_id) {
    if (!isset($_POST['cp_meta_nonce']) || !wp_verify_nonce($_POST['cp_meta_nonce'], 'cp_save_meta'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    $imgs = array_filter(array_map('esc_url_raw', (array) ($_POST['cp_paslaugos_images'] ?? [])));
    if (count($imgs) === 2) {
        update_post_meta($post_id, 'cp_paslaugos_images', serialize($imgs));
    } else {
        delete_post_meta($post_id, 'cp_paslaugos_images');
    }

    if (!empty($_POST['cp_paslaugos_icon'])) {
        update_post_meta($post_id, 'cp_paslaugos_icon', esc_url_raw($_POST['cp_paslaugos_icon']));
    } else {
        delete_post_meta($post_id, 'cp_paslaugos_icon');
    }

    if (isset($_POST['cp_paslaugos_call_an_installer_button'])) {
        update_post_meta($post_id, 'cp_paslaugos_call_an_installer_button', '1');
    } else {
        delete_post_meta($post_id, 'cp_paslaugos_call_an_installer_button');
    }

});

// ATSILIEPIMAI Meta Box
function cp_atsiliepimai_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Name</label></th>
                <td><input type="text" name="cp_atsiliepimai_name"
                        value="<?php echo esc_attr($meta['cp_atsiliepimai_name'][0] ?? ''); ?>" style="width:80%;" /></td>
            </tr>
            <tr>
                <th><label>Email</label></th>
                <td><input type="email" name="cp_atsiliepimai_email"
                        value="<?php echo esc_attr($meta['cp_atsiliepimai_email'][0] ?? ''); ?>" style="width:80%;" /></td>
            </tr>
            <tr>
                <th><label>Feedback</label></th>
                <td><textarea name="cp_atsiliepimai_feedback"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_atsiliepimai_feedback'][0] ?? ''); ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label>Rating (1-5)</label></th>
                <td><input type="number" name="cp_atsiliepimai_rating" min="1" max="5"
                        value="<?php echo esc_attr($meta['cp_atsiliepimai_rating'][0] ?? ''); ?>" style="width:80%;" /></td>
            </tr>
        </table>
    </div>
    <?php
}

// PASIEKIMAI Meta Box
function cp_pasiekimai_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Image</label></th>
                <td>
                    <input type="text" name="cp_pasiekimai_image"
                        value="<?php echo esc_attr($meta['cp_pasiekimai_image'][0] ?? ''); ?>" style="width:80%;" />
                    <button type="button" class="upload_image_button">Upload Image</button>
                </td>
            </tr>
            <tr>
                <th><label for="cp_pasiekimai_show_footer">Add to Footer</label></th>
                <td>
                    <?php $show_footer = $meta['cp_pasiekimai_show_footer'][0] ?? ''; ?>
                    <input type="checkbox" id="cp_pasiekimai_show_footer" name="cp_pasiekimai_show_footer" value="1" <?php checked($show_footer, '1'); ?> />
                </td>
            </tr>

        </table>
    </div>
    <script>
        jQuery(function ($) {
            var frame;

            $('.upload_image_button').on('click', function (e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Select or Upload Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $(e.currentTarget).siblings('input[name="cp_pasiekimai_image"]').val(attachment.url);
                });

                frame.open();
            });
        });

    </script>
    <?php
}

// ATLIKTI DARBAI Meta Box
function cp_atlikti_darbai_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');

    // Retrieve saved images as an array of arrays
    $images = get_post_meta($post->ID, 'cp_atlikti_darbai_images', true);
    if (!is_array($images)) {
        $images = array();
    }
    ?>
    <div class="cp-custom-metabox">
        <h4>Images (max 20)</h4>
        <div id="cp_images_container">
            <?php foreach ($images as $index => $image): ?>
                <div class="cp_image_field">
                    <input type="text" name="cp_atlikti_darbai_images[<?php echo $index; ?>][url]"
                        value="<?php echo esc_attr($image['url'] ?? ''); ?>" style="width:80%;" />
                    <button style="margin: 0;" class="upload_image_button">Upload Image</button>
                    <br />
                    <input type="text" name="cp_atlikti_darbai_images[<?php echo $index; ?>][subtitle]"
                        value="<?php echo esc_attr($image['subtitle'] ?? ''); ?>" style="width:80%;" placeholder="Sub-title" />
                    <button class="remove_image_button">Remove</button>

                    <br>
                    <br>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add_atlikti_darbai_image">Add Image</button>
    </div>
    <style>
        .cp-custom-metabox {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        }

        .cp-custom-metabox h4 {
            margin-top: 0;
            font-size: 1.2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            color: #333;
        }

        #cp_images_container {
            margin-top: 15px;
        }

        .cp_image_field {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px dashed #ccc;
            border-radius: 4px;
            background-color: #fafafa;
        }

        .upload_image_button {
            margin-left: 4px;
        }

        .cp_image_field input[type="text"] {
            width: calc(100% - 16px);

            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .cp_image_field button,
        #add_atlikti_darbai_image {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .cp_image_field button {
            background-color: #0073aa;
            color: #fff;
        }

        .cp_image_field button:hover {
            background-color: #005177;
        }

        #add_atlikti_darbai_image {
            background-color: #46b450;
            color: #fff;
            margin-top: 10px;
        }

        #add_atlikti_darbai_image:hover {
            background-color: #3a8d3b;
        }
    </style>

    <script>
        jQuery(document).ready(function ($) {
            // Add new image field
            $('#add_atlikti_darbai_image').on('click', function (e) {
                e.preventDefault();
                if ($('.cp_image_field').length < 20) {
                    var field_html = '<div class="cp_image_field">' +
                        '<input type="text" name="cp_atlikti_darbai_images[][url]" value="" style="width:80%;" />' +
                        '<button class="upload_image_button">Upload Image</button>' +
                        '<br /><input type="text" name="cp_atlikti_darbai_images[][subtitle]" value="" style="width:80%;" placeholder="Sub-title" />' +
                        '<button class="remove_image_button">Remove</button>' +
                        '</div>';
                    $('#cp_images_container').append(field_html);
                } else {
                    alert("Max 20 images allowed");
                }
            });

            // Remove image field
            $('#cp_images_container').on('click', '.remove_image_button', function (e) {
                e.preventDefault();
                $(this).closest('.cp_image_field').remove();
            });

            // Media uploader for image selection
            $('#cp_images_container').on('click', '.upload_image_button', function (e) {
                e.preventDefault();
                var button = $(this);
                // Get the input field that holds the URL; use prevAll to ensure it gets the correct input
                var inputField = button.prevAll('input[type="text"]').last();
                var custom_uploader = wp.media({
                    title: 'Select Image',
                    button: { text: 'Use this image' },
                    multiple: false
                }).on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    inputField.val(attachment.url);
                }).open();
            });
        });
    </script>
    <?php
}


// PADALINIAI Meta Box
function cp_padaliniai_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Phone</label></th>
                <td><input type="text" name="cp_padaliniai_phone"
                        value="<?php echo esc_attr($meta['cp_padaliniai_phone'][0] ?? ''); ?>" style="width:80%;" /></td>
            </tr>
            <tr>
                <th><label>Email</label></th>
                <td><input type="email" name="cp_padaliniai_email"
                        value="<?php echo esc_attr($meta['cp_padaliniai_email'][0] ?? ''); ?>" style="width:80%;" /></td>
            </tr>
            <tr>
                <th><label>Address</label></th>
                <td><textarea name="cp_padaliniai_address"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_padaliniai_address'][0] ?? ''); ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label>Availability (Enter commo (,) time if multiple timings)</label></th>
                <td><input type="text" name="cp_padaliniai_availability"
                        value="<?php echo esc_attr($meta['cp_padaliniai_availability'][0] ?? ''); ?>" style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Google Map URL</label></th>
                <td>
                    <input type="url" name="cp_padaliniai_google_map_url"
                        value="<?php echo esc_attr($meta['cp_padaliniai_google_map_url'][0] ?? ''); ?>"
                        style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Google Map URL Embed</label></th>
                <td>
                    <textarea style="width:80%;" name="cp_padaliniai_google_map_url_embed"
                        id="cp_padaliniai_google_map_url_embed"><?php echo esc_textarea($meta['cp_padaliniai_google_map_url_embed'][0] ?? ''); ?></textarea>

                </td>
            </tr>
        </table>
        <h4>Images (minimum 2, maximum 2)</h4>
        <div id="padaliniai_images">
            <?php
            $images = maybe_unserialize($meta['cp_padaliniai_images'][0] ?? []);
            foreach ($images as $i => $url): ?>
                <div class="padaliniai_image">
                    <input type="text" name="cp_padaliniai_images[<?php echo $i ?>]" value="<?php echo esc_attr($url) ?>"
                        style="width:70%;" />
                    <button class="upload_image_button">Upload Image</button>
                    <button type="button" class="remove_padaliniai_image">Remove</button>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add_padaliniai_image">Add Image</button>
        <script>
            jQuery(function ($) {
                let cpMediaFrame, cpCurrent;

                function refresh() {
                    $('#add_padaliniai_image').prop('disabled', $('#padaliniai_images .padaliniai_image').length >= 2);
                }

                $('#add_padaliniai_image').click(function () {
                    if ($('#padaliniai_images .padaliniai_image').length < 2) {
                        const idx = $('#padaliniai_images .padaliniai_image').length;
                        $('#padaliniai_images').append(`
                            <div class="padaliniai_image">
                                <input type="text" name="cp_padaliniai_images[${idx}]" style="width:70%;" />
                                <button class="upload_image_button">Upload Image</button>
                                <button type="button" class="remove_padaliniai_image">Remove</button><hr>
                            </div>
                        `);
                    }
                    refresh();
                });

                $('#padaliniai_images').on('click', '.remove_padaliniai_image', function () {
                    $(this).closest('.padaliniai_image').remove();
                    refresh();
                });

                $(document).on('click', '.upload_image_button', function (e) {
                    e.preventDefault();
                    cpCurrent = $(this);
                    if (cpMediaFrame) { cpMediaFrame.open(); return; }
                    cpMediaFrame = wp.media({ title: 'Select Image', button: { text: 'Use this image' }, multiple: false });
                    cpMediaFrame.on('select', function () {
                        const attachment = cpMediaFrame.state().get('selection').first().toJSON();
                        cpCurrent.prev('input').val(attachment.url);
                    });
                    cpMediaFrame.open();
                });

                refresh();
            });
        </script>
    </div>

    <style>
        .cp-custom-metabox {
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ccd0d4;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
            margin-bottom: 20px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
        }

        .cp-custom-metabox table.form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .cp-custom-metabox table.form-table th {
            padding: 8px;
            text-align: left;
            vertical-align: top;
            font-weight: 600;
            width: 25%;
            border-bottom: 1px solid #e5e5e5;
        }

        .cp-custom-metabox table.form-table td {
            padding: 8px;
            border-bottom: 1px solid #e5e5e5;
        }

        .cp-custom-metabox input[type="text"],
        .cp-custom-metabox input[type="email"],
        .cp-custom-metabox input[type="url"],
        .cp-custom-metabox textarea {
            border: 1px solid #ccd0d4;
            border-radius: 3px;
            padding: 6px 10px;
            width: 100%;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #fff;
        }

        .cp-custom-metabox h4 {
            margin-top: 20px;
            font-size: 16px;
            border-bottom: 1px solid #ccd0d4;
            padding-bottom: 5px;
        }

        .cp-custom-metabox .padaliniai_image {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .cp-custom-metabox .padaliniai_image input {
            width: calc(70% - 10px);
            margin-right: 10px;
            display: inline-block;
        }

        .cp-custom-metabox button.upload_image_button,
        .cp-custom-metabox button.remove_padaliniai_image,
        .cp-custom-metabox button#add_padaliniai_image {
            background-color: #0073aa;
            border: none;
            color: #fff;
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }

        .cp-custom-metabox button.upload_image_button:hover,
        .cp-custom-metabox button.remove_padaliniai_image:hover,
        .cp-custom-metabox button#add_padaliniai_image:hover {
            background-color: #006799;
        }

        .cp-custom-metabox hr {
            border: 0;
            border-top: 1px solid #ccd0d4;
            margin: 10px 0;
        }
    </style>

    <?php
}

// FAQ Meta Box
function cp_faq_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <!-- <div class="cp-custom-metabox">
        <table class="form-table">
           
        </table>
    </div> -->
    <?php
}

// Gauti pasiūlymą Meta Box
function cp_gauti_pasiulyma_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Jūsų vardas</label></th>
                <td>
                    <input type="text" name="cp_gauti_name" value="<?php echo esc_attr($meta['cp_gauti_name'][0] ?? ''); ?>"
                        style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>El. paštas</label></th>
                <td>
                    <input type="email" name="cp_gauti_email"
                        value="<?php echo esc_attr($meta['cp_gauti_email'][0] ?? ''); ?>" style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Telefono numeris</label></th>
                <td>
                    <input type="text" name="cp_gauti_phone"
                        value="<?php echo esc_attr($meta['cp_gauti_phone'][0] ?? ''); ?>" style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Užklausos tekstas</label></th>
                <td>
                    <textarea name="cp_gauti_message"
                        style="width:80%;"><?php echo esc_textarea($meta['cp_gauti_message'][0] ?? ''); ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label>Produktai / Paslaugos</label></th>
                <td>
                    <input type="text" name="cp_gauti_products"
                        value="<?php echo esc_attr($meta['cp_gauti_products'][0] ?? ''); ?>" style="width:80%;" />
                    <p class="description">Jeigu pasirinkote kelis, atskirkite kableliu.</p>
                </td>
            </tr>
            <tr>
                <th><label>Prisegtas failas</label></th>
                <td>
                    <?php
                    global $post;

                    $attach_id = $meta['cp_gauti_file'][0] ?? '';

                    $file_url = '';
                    if (!empty($attach_id)) {
                        $file_url = wp_get_attachment_url($attach_id);

                    }
                    ?>
                    <input type="hidden" id="cp_gauti_file" name="cp_gauti_file"
                        value="<?php echo esc_attr($attach_id); ?>">
                    <button type="button" id="upload-button">Choose File</button>
                    <span id="file-url">
                        <?php
                        if ($attach_id && is_numeric($attach_id)) {
                            if (wp_attachment_is_image($attach_id)) {
                                echo wp_get_attachment_image(
                                    $attach_id,
                                    'medium',
                                    false,
                                    ['style' => 'max-width:200px;height:auto;']
                                );
                            } else {
                                $file_url = esc_url(wp_get_attachment_url($attach_id));
                                $filename = esc_html(basename(get_attached_file($attach_id)));
                                echo '<a href="' . $file_url . '" target="_blank">' . $filename . '</a>';
                            }
                        } else {
                            echo 'No file chosen';
                        }
                        ?>
                    </span>
                </td>
            </tr>



        </table>
    </div>
    <script>
        jQuery(function ($) {
            let fileFrame;

            $('#upload-button').on('click', function (e) {
                e.preventDefault();

                // Re‑use existing frame if already opened
                if (fileFrame) {
                    fileFrame.open();
                    return;
                }

                fileFrame = wp.media({
                    title: 'Select or Upload File',
                    button: { text: 'Use this file' },
                    library: { type: ['application/pdf', 'image/png', 'image/jpeg'] },
                    multiple: false
                });

                fileFrame.on('select', function () {
                    const attachment = fileFrame.state().get('selection').first().toJSON();
                    $('#cp_gauti_file').val(attachment.id);
                    $('#file-url').html(
                        `<a href="${attachment.url}" target="_blank">${attachment.filename}</a>`
                    );
                });

                fileFrame.open();
            });
        });
    </script>

    <?php
}

// Išsikviesti matuotoja Meta Box
function cp_matuotoja_meta_callback($post)
{
    wp_nonce_field('cp_save_meta', 'cp_meta_nonce');
    $meta = get_post_meta($post->ID);
    ?>
    <div class="cp-custom-metabox">
        <table class="form-table">
            <tr>
                <th><label>Jūsų vardas</label></th>
                <td>
                    <input type="text" name="cp_ism_name" value="<?php echo esc_attr($meta['cp_ism_name'][0] ?? ''); ?>"
                        style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>El. paštas</label></th>
                <td>
                    <input type="email" name="cp_ism_email" value="<?php echo esc_attr($meta['cp_ism_email'][0] ?? ''); ?>"
                        style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Telefono numeris</label></th>
                <td>
                    <input type="text" name="cp_ism_phone" value="<?php echo esc_attr($meta['cp_ism_phone'][0] ?? ''); ?>"
                        style="width:80%;" />
                </td>
            </tr>
            <tr>
                <th><label>Objekto adresas</label></th>
                <td>
                    <input type="text" name="cp_ism_address"
                        value="<?php echo esc_attr($meta['cp_ism_address'][0] ?? ''); ?>" style="width:80%;"
                        placeholder="Gatvė, namo nr, miestas" />
                </td>
            </tr>
            <tr>
                <th><label>Komentaras</label></th>
                <td>
                    <textarea name="cp_ism_comment" style="width:80%;"><?php
                    echo esc_textarea($meta['cp_ism_comment'][0] ?? '');
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label>Dominantys gaminiai</label></th>
                <td>
                    <input type="text" name="cp_ism_products"
                        value="<?php echo esc_attr($meta['cp_ism_products'][0] ?? ''); ?>" style="width:80%;" />
                    <p class="description">Jei keli, atskirkite kableliu (pvz. Plastikiniai langai, Mediniai langai).</p>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

/************************************************************
 * 5. Save Meta Box Data (Same as Original, Just Cleaned Up)*
 ************************************************************/
function cp_save_meta_data($post_id)
{
    if (!isset($_POST['cp_meta_nonce']) || !wp_verify_nonce($_POST['cp_meta_nonce'], 'cp_save_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // PRODUKCIJA
    if (isset($_POST['cp_image_post_gallery']))
        update_post_meta($post_id, 'cp_image_post_gallery', sanitize_meta_array($_POST['cp_image_post_gallery']));
    ;
    if (isset($_POST['cp_main_gallery']))
        update_post_meta($post_id, 'cp_main_gallery', sanitize_text_field($_POST['cp_main_gallery']));
    if (isset($_POST['cp_features_description']))
        update_post_meta($post_id, 'cp_features_description', sanitize_textarea_field($_POST['cp_features_description']));
    if (isset($_POST['cp_features_items']))
        update_post_meta($post_id, 'cp_features_items', sanitize_meta_array($_POST['cp_features_items']));
    if (isset($_POST['cp_technical_data_description']))
        update_post_meta($post_id, 'cp_technical_data_description', sanitize_textarea_field($_POST['cp_technical_data_description']));
    if (isset($_POST['cp_technical_data_items']))
        update_post_meta($post_id, 'cp_technical_data_items', sanitize_meta_array($_POST['cp_technical_data_items']));
    if (isset($_POST['cp_spalvos_description']))
        update_post_meta($post_id, 'cp_spalvos_description', sanitize_textarea_field($_POST['cp_spalvos_description']));
    if (isset($_POST['cp_spalvos_image_gallery']))
        update_post_meta($post_id, 'cp_spalvos_image_gallery', sanitize_text_field($_POST['cp_spalvos_image_gallery']));
    if (isset($_POST['cp_additional_information_image']))
        update_post_meta($post_id, 'cp_additional_information_image', sanitize_text_field($_POST['cp_additional_information_image']));
    if (isset($_POST['cp_additional_information_items']))
        update_post_meta($post_id, 'cp_additional_information_items', sanitize_meta_array($_POST['cp_additional_information_items']));

    // PASLAUGOS
    if (isset($_POST['cp_paslaugos_images'])) {
        $images = array_filter($_POST['cp_paslaugos_images']);
        if (count($images) < 1 || count($images) > 2) {
            add_filter('redirect_post_location', function ($location) {
                return add_query_arg('cp_error', 'paslaugos_must_have_one_or_two', $location);
            });
            return;
        }
        update_post_meta($post_id, 'cp_paslaugos_images', sanitize_meta_array($_POST['cp_paslaugos_images']));
    }

    if (isset($_POST['cp_paslaugos_icon'])) {
        update_post_meta($post_id, 'cp_paslaugos_icon', sanitize_text_field($_POST['cp_paslaugos_icon']));
    }




    // ATSILIEPIMAI
    if (isset($_POST['cp_atsiliepimai_name']))
        update_post_meta($post_id, 'cp_atsiliepimai_name', sanitize_text_field($_POST['cp_atsiliepimai_name']));
    if (isset($_POST['cp_atsiliepimai_email']))
        update_post_meta($post_id, 'cp_atsiliepimai_email', sanitize_email($_POST['cp_atsiliepimai_email']));
    if (isset($_POST['cp_atsiliepimai_feedback']))
        update_post_meta($post_id, 'cp_atsiliepimai_feedback', sanitize_textarea_field($_POST['cp_atsiliepimai_feedback']));
    if (isset($_POST['cp_atsiliepimai_rating']))
        update_post_meta($post_id, 'cp_atsiliepimai_rating', intval($_POST['cp_atsiliepimai_rating']));

    // PASIEKIMAI
    if (isset($_POST['cp_pasiekimai_image']))
        update_post_meta($post_id, 'cp_pasiekimai_image', sanitize_text_field($_POST['cp_pasiekimai_image']));
    if (isset($_POST['cp_pasiekimai_show_footer'])) {
        update_post_meta($post_id, 'cp_pasiekimai_show_footer', 1);
    } else {
        update_post_meta($post_id, 'cp_pasiekimai_show_footer', 0);
    }


    // ATLIKTI DARBAI
    // Save the repeater field data
    if (isset($_POST['cp_atlikti_darbai_images']) && is_array($_POST['cp_atlikti_darbai_images'])) {
        $images = array();
        foreach ($_POST['cp_atlikti_darbai_images'] as $image) {
            $url = isset($image['url']) ? sanitize_text_field($image['url']) : '';
            $subtitle = isset($image['subtitle']) ? sanitize_text_field($image['subtitle']) : '';
            // Only add if one of the fields is not empty
            if ($url || $subtitle) {
                $images[] = array(
                    'url' => $url,
                    'subtitle' => $subtitle,
                );
            }
        }
        update_post_meta($post_id, 'cp_atlikti_darbai_images', $images);
    }

    // PADALINIAI
    // if (isset($_POST['cp_padaliniai_phone']))
    //     update_post_meta($post_id, 'cp_padaliniai_phone', sanitize_text_field($_POST['cp_padaliniai_phone']));
    // if (isset($_POST['cp_padaliniai_email']))
    //     update_post_meta($post_id, 'cp_padaliniai_email', sanitize_email($_POST['cp_padaliniai_email']));
    // if (isset($_POST['cp_padaliniai_address']))
    //     update_post_meta($post_id, 'cp_padaliniai_address', sanitize_textarea_field($_POST['cp_padaliniai_address']));
    // if (isset($_POST['cp_padaliniai_availability']))
    //     update_post_meta($post_id, 'cp_padaliniai_availability', sanitize_text_field($_POST['cp_padaliniai_availability']));
    // if (isset($_POST['cp_padaliniai_images']))
    //      update_post_meta($post_id, 'cp_padaliniai_images', sanitize_meta_array($_POST['cp_padaliniai_images']));

    // if (!isset($_POST['cp_padaliniai_images']))
    //     delete_post_meta($post_id, 'cp_padaliniai_images', );

    // if (isset($_POST['cp_padaliniai_google_map_url_embed']))
    //     update_post_meta($post_id, 'cp_padaliniai_google_map_url_embed', $_POST['cp_padaliniai_google_map_url_embed']);
    // if (isset($_POST['cp_padaliniai_google_map_url']))
    //     update_post_meta($post_id, 'cp_padaliniai_google_map_url', esc_url_raw($_POST['cp_padaliniai_google_map_url']));

    // FAQ
    if (isset($_POST['cp_faq_description']))
        update_post_meta($post_id, 'cp_faq_description', sanitize_textarea_field($_POST['cp_faq_description']));

    // Gauti pasiūlymą Meta Box
    if (isset($_POST['cp_gauti_name']))
        update_post_meta($post_id, 'cp_gauti_name', sanitize_text_field($_POST['cp_gauti_name']));
    if (isset($_POST['cp_gauti_email']))
        update_post_meta($post_id, 'cp_gauti_email', sanitize_email($_POST['cp_gauti_email']));
    if (isset($_POST['cp_gauti_phone']))
        update_post_meta($post_id, 'cp_gauti_phone', sanitize_text_field($_POST['cp_gauti_phone']));
    if (isset($_POST['cp_gauti_message']))
        update_post_meta($post_id, 'cp_gauti_message', sanitize_textarea_field($_POST['cp_gauti_message']));
    if (isset($_POST['cp_gauti_products']))
        update_post_meta($post_id, 'cp_gauti_products', sanitize_text_field($_POST['cp_gauti_products']));
    if (isset($_POST['cp_gauti_file']))
        update_post_meta($post_id, 'cp_gauti_file', sanitize_text_field($_POST['cp_gauti_file']));

}

add_action('save_post', 'cp_save_meta_data');

function cp_save_padaliniai_meta($post_id)
{
    // Check if nonce is set
    if (!isset($_POST['cp_meta_nonce']) || !wp_verify_nonce($_POST['cp_meta_nonce'], 'cp_save_meta')) {
        return;
    }

    // Prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sanitize and save the Google Map URL Embed field
    if (isset($_POST['cp_padaliniai_google_map_url_embed'])) {
        update_post_meta($post_id, 'cp_padaliniai_google_map_url_embed', sanitize_textarea_field($_POST['cp_padaliniai_google_map_url_embed']));
    }

    // Save other fields
    if (isset($_POST['cp_padaliniai_phone'])) {
        update_post_meta($post_id, 'cp_padaliniai_phone', sanitize_text_field($_POST['cp_padaliniai_phone']));
    }

    if (isset($_POST['cp_padaliniai_email'])) {
        update_post_meta($post_id, 'cp_padaliniai_email', sanitize_email($_POST['cp_padaliniai_email']));
    }

    if (isset($_POST['cp_padaliniai_address'])) {
        update_post_meta($post_id, 'cp_padaliniai_address', sanitize_textarea_field($_POST['cp_padaliniai_address']));
    }

    if (isset($_POST['cp_padaliniai_availability'])) {
        update_post_meta($post_id, 'cp_padaliniai_availability', sanitize_text_field($_POST['cp_padaliniai_availability']));
    }

    if (isset($_POST['cp_padaliniai_google_map_url'])) {
        update_post_meta($post_id, 'cp_padaliniai_google_map_url', esc_url_raw($_POST['cp_padaliniai_google_map_url']));
    }

    langu_print_log($_POST);
    if (isset($_POST['cp_padaliniai_google_map_url_embed'])) {
        update_post_meta($post_id, 'cp_padaliniai_google_map_url_embed', $_POST['cp_padaliniai_google_map_url_embed']);
    }

    if (isset($_POST['cp_padaliniai_images'])) {
        update_post_meta($post_id, 'cp_padaliniai_images', array_map('sanitize_text_field', $_POST['cp_padaliniai_images']));
    }

    if (!isset($_POST['cp_padaliniai_images'])) {
        delete_post_meta($post_id, 'cp_padaliniai_images');
    }
}
add_action('save_post', 'cp_save_padaliniai_meta');


/*************************************************************
 * 6. Helper: Sanitize Meta Arrays                           *
 *************************************************************/
function sanitize_meta_array($array)
{
    if (!is_array($array))
        return sanitize_text_field($array);
    $sanitized = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $sanitized[$key] = sanitize_meta_array($value);
        } else {
            $sanitized[$key] = sanitize_text_field($value);
        }
    }
    return $sanitized;
}

/*************************************************************
 * 7. Custom Admin CSS for Better Meta Box Presentation      *
 *************************************************************/
function cp_custom_admin_css()
{
    // Optional: Only load on post edit screens
    $screen = get_current_screen();
    if ($screen && 'post' === $screen->base) {
        ?>
        <style>
            .cp-custom-metabox .form-table {
                border: 1px solid #ddd;
                padding: 1rem;
                margin-bottom: 1.5rem;
                background: #fafafa;
            }

            .cp-custom-metabox .form-table th {
                width: 20%;
                font-weight: 600;
            }

            .cp-custom-metabox .form-table td {
                vertical-align: top;
            }

            #features_items,
            #technical_data_items,
            #additional_information_items,
            #paslaugos_images,
            #atlikti_darbai_images,
            #padaliniai_images {
                margin: 1rem 0;
                border-left: 4px solid #007cba;
                padding-left: 1rem;
            }

            #add_feature_item,
            #add_technical_data_item,
            #add_additional_item,
            #add_paslaugos_image,
            #add_atlikti_darbai_image,
            #add_padaliniai_image {
                margin: 0.5rem 0;
                background-color: #007cba;
                color: #fff;
                border: none;
                padding: 0.4rem 0.8rem;
                cursor: pointer;
            }

            #add_feature_item:hover,
            #add_technical_data_item:hover,
            #add_additional_item:hover,
            #add_paslaugos_image:hover,
            #add_atlikti_darbai_image:hover,
            #add_padaliniai_image:hover {
                background-color: #005a88;
            }

            .upload_image_button,
            .upload_gallery_button {
                margin-left: 1rem;
            }
        </style>
        <?php
    }
}
add_action('admin_head', 'cp_custom_admin_css');
