<?php

defined("ABSPATH") || exit;

class Langue_Mega_Menu_Walker extends Walker_Nav_Menu
{
  public function start_lvl(&$output, $depth = 0, $args = null)
  {
    $args = (object) $args;

    // Get parent menu item title
    $parent_title = $this->get_parent_title();

    // Add container for dropdown with parent title
    $output .= '<div class="mega-menu-dropdown">';
    if ($depth === 0 && !empty($parent_title)) {
      $output .= '<h2 class="inline-block mx-4 text-[16px] md:text-[24px] text-black border-b-4 border-yellow-400 pb-[8px]">'
        . esc_html($parent_title) .
        '</h2>';
    }
    $output .= '<ul class="mega-menu-items">';
  }

  public function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</ul></div>';
  }

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $args = (object) $args;

    $class_names = join(' ', array_filter($item->classes));
    $output .= '<li class="' . esc_attr($class_names) . '">';

    // Build the link
    $output .= '<a href="' . esc_attr($item->url) . '">';
    $output .= $args->link_before . $item->title . $args->link_after;
    $output .= '</a>';

    // Store parent title for dropdown
    if ($depth === 0 && !empty($item->title)) {
      $this->current_parent_title = $item->title;
    }
  }

  public function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= '</li>';
  }

  private $current_parent_title = '';

  private function get_parent_title()
  {
    return $this->current_parent_title;
  }
}

class Langu_mega_menu_fallback
{
  public function __construct() {}

  public function display_menu()
  {
    ob_start();
    ?>
    <nav class="mega-menu-container">
      <ul class="mega-menu">
        <li class="menu-item"><a href="<?php echo esc_url(home_url('/')); ?> ">Home</a></li>
      </ul>
    </nav>
    <?php

    $output = ob_get_clean();
    return $output;
  }
}

$languag_fallback_menu = new Langu_mega_menu_fallback();