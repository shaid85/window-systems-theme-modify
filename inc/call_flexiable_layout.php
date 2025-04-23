<?php
// ACF Flexiable content - create file with layout
function flexLayout($attr)
{
    $flex_field = $attr['name'] ?? false;
    if (!$flex_field) return;

    if (have_rows($flex_field)) :
        while (have_rows($flex_field)) : the_row();

            $layout = get_row_layout();
            $layout_file = get_stylesheet_directory() . "/template-parts/flexible-sections/{$layout}.php";

            // Auto-create file if missing
            if (!file_exists($layout_file)) {
                $default_content = "<section id=\"{$layout}\">\n    <!-- Add HTML code for '{$layout}' here -->\n</section>";
                file_put_contents($layout_file, $default_content);
            }

            // Load the layout
            include $layout_file;

        endwhile;
    else :
        get_template_part('content', 'noflex');
    endif;
}
add_shortcode('flexlayout', 'flexLayout');



// Page builder style
add_action('admin_head', 'my_custom_acf_style');
function my_custom_acf_style()
{ ?>
    <style>
        div#Page_Builder .acf-label.acf-accordion-title {
            background-color: #e4f0f6;
        }

        .acf-image-uploader.has-value img,
        .acf-image-uploader.has-value .image-wrap {
            max-height: 80px !important;
        }

        .acf-gallery {
            height: 300px !important;
        }

        div#height_small .acf-gallery {
            height: 200px !important;
        }

        #fea_icon .acf-image-uploader.has-value img,
        #fea_icon .acf-image-uploader.has-value .image-wrap {
            max-height: 50px !important;
            min-width: auto;
            min-height: auto;
        }

        #sm_editor .acf-editor-wrap iframe {
            height: 160px !important;
            min-height: auto;
        }

        @media (min-width: 1200px) and (max-width: 1550px) {
            #Sl_Img .ui-sortable {
                display: flex;
                flex-wrap: wrap;
            }

            #Sl_Img .ui-sortable tr {
                flex: 0 0 24%;
            }
        }
    </style>
<?php }
