<?php

defined("ABSPATH") || exit;

class Produkcija_texonomy
{
  public function __construct()
  {
    add_action('produkcija_category_edit_form_fields', [$this, "add_produkcija_category_term_fields"], 10, 2);

    // Hook to save the custom field values when the term is created or updated
    add_action('edited_produkcija_category', [$this, "save_produkcija_category_term_fields"], 10, 1);
    add_action('created_produkcija_category', [$this, "save_produkcija_category_term_fields"], 10, 1);
  }

  // Display the custom fields in the term edit form
  public function add_produkcija_category_term_fields($term)
  {
    // Retrieve the current values for the custom fields (if set)
    $term_order = get_term_meta($term->term_id, 'term_order', true);
    $produkcija_description = get_term_meta($term->term_id, 'produkcija_description', true);
    $produkcija_description_long_title = get_term_meta($term->term_id, 'produkcija_description_long_title', true);
    $produkcija_description_long = get_term_meta($term->term_id, 'produkcija_description_long', true);

    ?>
    <tr class="form-field term-order-wrap">
      <th scope="row"><label for="term_order"><?php _e('Term Order', 'langu-sistemos'); ?></label></th>
      <td>
        <input type="number" id="term_order" name="term_order" value="<?php echo esc_attr($term_order); ?>" />
        <p class="description"><?php _e('Set the order of this term.', 'langu-sistemos'); ?></p>
      </td>
    </tr>

    <tr class="form-field term-produkcija-description-wrap">
      <th scope="row"><label for="produkcija_description"><?php _e('Produkcija Description', 'langu-sistemos'); ?></label>
      </th>
      <td>
        <?php
        // Display the WordPress WYSIWYG editor for the description
        wp_editor($produkcija_description, 'produkcija_description', array(
          'textarea_name' => 'produkcija_description',
          'textarea_rows' => 5,
          'editor_class' => 'wp-editor-area',
          'editor_height' => 200
        ));
        ?>
        <p class="description"><?php _e('Add a description for this term', 'langu-sistemos'); ?></p>
      </td>
    </tr>

    <tr class="form-field term-order-wrap">
      <th scope="row"><label
          for="produkcija_description_long_title"><?php _e('Produkcija Description Long Title', 'langu-sistemos'); ?></label>
      </th>
      <td>
        <input type="text" id="produkcija_description_long_title" name="produkcija_description_long_title"
          value="<?php echo esc_attr($produkcija_description_long_title); ?>" />
        <p class="description"><?php _e('Set the order of this term.', 'langu-sistemos'); ?></p>
      </td>
    </tr>

    <tr class="form-field term-produkcija-description-wrap">
      <th scope="row"><label
          for="produkcija_description_long"><?php _e('Produkcija Description Long', 'langu-sistemos'); ?></label></th>
      <td>
        <?php
        // Display the WordPress WYSIWYG editor for the description
        wp_editor($produkcija_description_long, 'produkcija_description_long', array(
          'textarea_name' => 'produkcija_description_long',
          'textarea_rows' => 5,
          'editor_class' => 'wp-editor-area',
          'editor_height' => 300
        ));
        ?>
        <p class="description"><?php _e('Add a description long for this term', 'langu-sistemos'); ?></p>
      </td>
    </tr>


    <?php
  }

  // Save the custom fields when the term is created or updated
  public function save_produkcija_category_term_fields($term_id)
  {
    // Save the term order field
    if (isset($_POST['term_order'])) {
      $term_order = intval($_POST['term_order']);
      update_term_meta($term_id, 'term_order', $term_order);
    }

    // Save the "produkcija_description" field
    if (isset($_POST['produkcija_description'])) {
      $produkcija_description = $_POST['produkcija_description'];
      update_term_meta($term_id, 'produkcija_description', $produkcija_description);
    }

    if (isset($_POST['produkcija_description_long_title'])) {
      $produkcija_description_long_title = $_POST['produkcija_description_long_title'];
      update_term_meta($term_id, 'produkcija_description_long_title', $produkcija_description_long_title);
    }

    if (isset($_POST['produkcija_description_long'])) {
      $produkcija_description_long = $_POST['produkcija_description_long'];
      update_term_meta($term_id, 'produkcija_description_long', $produkcija_description_long);
    }
  }
}

// Instantiate the class to initialize the hooks
new Produkcija_texonomy();
