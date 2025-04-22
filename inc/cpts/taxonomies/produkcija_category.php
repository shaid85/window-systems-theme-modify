<?php

defined("ABSPATH") || exit;

class Produkcija_category
{
  public function __construct()
  {
    add_action('init', [$this, "cp_register_taxonomies"]);
    add_action('produkcija_category_add_form_fields', [$this, "add_produkcija_category_image_field"]);
    add_action('produkcija_category_edit_form_fields', [$this, "edit_produkcija_category_image_field"]);
    add_action('created_produkcija_category', [$this, "save_produkcija_category_image"]);
    add_action('edited_produkcija_category', [$this, "save_produkcija_category_image"]);
    add_action('admin_footer',  callback: [$this, "enqueue_media_uploader"]); // Enqueue media uploader
    add_action('admin_enqueue_scripts', function($hook){
      $screen = get_current_screen();
      if ($screen && $screen->taxonomy === 'produkcija_category') {
          wp_enqueue_script('jquery');
          wp_enqueue_media();
      }
  });
  
  add_action('admin_print_footer_scripts', function(){
      $screen = get_current_screen();
      if ($screen && $screen->taxonomy === 'produkcija_category') {
          if (! function_exists('wp_print_media_templates')) {
              require_once ABSPATH . 'wp-includes/media-template.php';
          }
          wp_print_media_templates();
          ?>
          <script>
          jQuery(function($){
            $('.upload_image_button').click(function(e){
              e.preventDefault();
              var button = $(this);
              var frame = wp.media({
                title: '<?php _e("Select Featured Image","langu-sistemos");?>',
                button: { text: '<?php _e("Use this image","langu-sistemos");?>' },
                library: { type: 'image' },
                multiple: false
              });
              frame.on('select', function(){
                button.prev('input').val(frame.state().get('selection').first().toJSON().url);
              });
              frame.open();
            });
          });
          </script>
          <?php
      }
  });
  }

  public function cp_register_taxonomies()
  {
    register_taxonomy('produkcija_category', 'produkcija', array(
      'labels' => array(
        'name' => __('Produkcija Categories', 'langu-sistemos'),
        'singular_name' => __('Produkcija Category', 'langu-sistemos'),
      ),
      'hierarchical' => true,
      'public' => true,
      'show_admin_column' => true,
    ));
  }

  public function add_produkcija_category_image_field()
  {
    ?>
    <div class="form-field term-group">
      <label for="produkcija_category_image"><?php _e('Featured Image', 'langu-sistemos'); ?></label>
      <input type="text" id="produkcija_category_image" name="produkcija_category_image" value="">
      <button  type="button" class="upload_image_button button"><?php _e('Upload Image', 'langu-sistemos'); ?></button>
    </div>
    <?php
  }

  public function edit_produkcija_category_image_field($term)
  {
    $image = get_term_meta($term->term_id, 'produkcija_category_image', true);
    ?>
    <tr class="form-field term-group-wrap">
      <th scope="row">
        <label for="produkcija_category_image"><?php _e('Featured Image', 'langu-sistemos'); ?></label>
      </th>
      <td>
        <input type="text" id="produkcija_category_image" name="produkcija_category_image"
          value="<?php echo esc_attr($image); ?>">
        <button  type="button" class="upload_image_button button"><?php _e('Upload Image', 'langu-sistemos'); ?></button>
        <?php if ($image): ?>
          <div style="margin-top: 10px;">
            <img src="<?php echo esc_url($image); ?>" alt="Featured Image" style="max-width: 100px; height: auto;">
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <?php
  }

  public function save_produkcija_category_image($term_id)
  {
    if (isset($_POST['produkcija_category_image'])) {
      update_term_meta($term_id, 'produkcija_category_image', esc_url($_POST['produkcija_category_image']));
    }
  }

  public function enqueue_media_uploader()
  {
    if ('edit-tags.php' === $GLOBALS['pagenow'] && isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'produkcija_category') {
      wp_enqueue_media(); 
    }
  }
}

new Produkcija_category();
