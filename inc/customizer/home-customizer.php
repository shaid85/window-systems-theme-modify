<?php
// Home Panel Customizer Settings
add_action('customize_register', function($wp_customize) {

  // Add Home Panel
  $wp_customize->add_panel('home_panel', [
    'title'    => __('Home Page','langu-sistemos'),
    'priority' => 30
  ]);

  // Home Slider Section
  $wp_customize->add_section('home_slider', [
    'title' => __('Slider','langu-sistemos'),
    'panel' => 'home_panel'
  ]);
  
  $wp_customize->add_setting('home_slider_heading', [
    'default'           => 'Default Heading',
    'sanitize_callback' => 'sanitize_text_field'
  ]);
  $wp_customize->add_control('home_slider_heading', [
    'label'   => __('Slider Heading','langu-sistemos'),
    'section' => 'home_slider',
    'type'    => 'text'
  ]);
  
  $wp_customize->add_setting('home_slider_color', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ]);
  $wp_customize->add_control('home_slider_color', [
    'label'   => __('Slider Color Heading','langu-sistemos'),
    'section' => 'home_slider',
    'type'    => 'text'
  ]);
  
  $wp_customize->add_setting('home_slider_description', [
    'default'           => 'Default description here.',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);
  $wp_customize->add_control('home_slider_description', [
    'label'   => __('Slider Description','langu-sistemos'),
    'section' => 'home_slider',
    'type'    => 'textarea'
  ]);
  
  $wp_customize->add_setting('home_slider_images', [
    'default' => json_encode([ get_template_directory_uri() . '/assets/images/home/default-slide.png' ]),
    'sanitize_callback' => function($input) {
      $arr = json_decode($input, true);
      return json_encode(is_array($arr) ? $arr : []);
    }
  ]);
  $wp_customize->add_control(new WP_Customize_Slider_Images_Control($wp_customize, 'home_slider_images', [
    'label'    => __('Slider Images','langu-sistemos'),
    'section'  => 'home_slider',
    'settings' => 'home_slider_images'
  ]));
  
  // Home Section 2
  $wp_customize->add_section('home_section2', [
    'title' => __('Section 2','langu-sistemos'),
    'panel' => 'home_panel'
  ]);

  $wp_customize->add_setting('home_section2_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);
  $wp_customize->add_control('home_section2_text', [
    'label'   => __('Paragraph','langu-sistemos'),
    'section' => 'home_section2',
    'type'    => 'textarea'
  ]);
  $wp_customize->add_setting('home_section2_color_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ]);
  $wp_customize->add_control('home_section2_color_text', [
    'label'   => __('Section 2 Color text','langu-sistemos'),
    'section' => 'home_section2',
    'type'    => 'text'
  ]);
  
  // "Kodėl verta rinktis mus" – Exactly 4 Items
  $wp_customize->add_section('home_why', [
    'title' => __('Kodėl verta rinktis mus','langu-sistemos'),
    'panel' => 'home_panel'
  ]);
  $wp_customize->add_setting('home_why_items', [
    'default' => json_encode(array_fill(0, 4, ['heading'=>'', 'description'=>''])),
    'sanitize_callback' => function($input){
      $arr = json_decode($input, true) ?: [];
      return json_encode(array_slice(array_pad($arr, 4, []), 0, 4));
    }
  ]);
  $wp_customize->add_control(new WP_Customize_Repeater_Control($wp_customize, 'home_why_items', [
    'label'    => __('4 Features','langu-sistemos'),
    'section'  => 'home_why',
    'settings' => 'home_why_items',
    'fields'   => [
      'heading'     => ['type'=>'text','label'=>__('Feature Title','langu-sistemos')],
      'description' => ['type'=>'textarea','label'=>__('Feature Description','langu-sistemos')]
    ]
  ]));
  
  // Social Media Section
  $wp_customize->add_section('home_social', [
    'title' => __('Social Media','langu-sistemos'),
    'panel' => 'home_panel'
  ]);
  $wp_customize->add_setting('home_social_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);
  $wp_customize->add_control('home_social_text', [
    'label'   => __('Intro Paragraph','langu-sistemos'),
    'section' => 'home_social',
    'type'    => 'textarea'
  ]);
  foreach(['facebook', 'instagram'] as $network) {
    $wp_customize->add_setting("home_social_{$network}", [
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control("home_social_{$network}", [
      'label'   => ucfirst($network).' URL',
      'section' => 'home_social',
      'type'    => 'url'
    ]);
  }
});

// Custom Control for Slider Images
if(class_exists('WP_Customize_Control')) {
  class WP_Customize_Slider_Images_Control extends WP_Customize_Control {
    public $type = 'slider_images';
    public function render_content() {
      $value = json_decode($this->value(), true);
      if(!is_array($value)) { $value = array(); }
      ?>
      <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
      <div class="slider-images-container">
        <?php foreach($value as $img): ?>
          <div class="slider-image">
            <img src="<?php echo esc_url($img); ?>" style="max-width:100px;" />
            <button type="button" class="remove-slider-image"><?php _e('Remove','langu-sistemos'); ?></button>
          </div>
        <?php endforeach; ?>
      </div>
      <button type="button" class="add-slider-image"><?php _e('Add Image','langu-sistemos'); ?></button>
      <input type="hidden" <?php $this->link(); ?> class="slider-images-input" value="<?php echo esc_attr($this->value()); ?>" />
      <script>
      (function($){
        function updateSliderImages(container) {
          var images = [];
          container.find('.slider-image img').each(function(){
            images.push($(this).attr('src'));
          });
          container.closest('.customize-control')
                  .find('.slider-images-input')
                  .val(JSON.stringify(images))
                  .trigger('change');
        }
        
        $(document).on('click', '.add-slider-image', function(e){
          e.preventDefault();
          var button = $(this);
          var control = button.closest('.customize-control');
          var frame = wp.media({
            title: '<?php _e("Select or Upload Image", "langu-sistemos"); ?>',
            button: { text: '<?php _e("Use this image", "langu-sistemos"); ?>' },
            multiple: false
          });
          frame.on('select', function(){
            var attachment = frame.state().get('selection').first().toJSON();
            var imageUrl = attachment.url;
            var newImage = $('<div class="slider-image"><img src="'+imageUrl+'" style="max-width:100px;" /><button type="button" class="remove-slider-image"><?php _e("Remove", "langu-sistemos"); ?></button></div>');
            button.siblings('.slider-images-container').append(newImage);
            updateSliderImages(control);
          });
          frame.open();
        });
        
        $(document).on('click', '.remove-slider-image', function(e){
          e.preventDefault();
          var control = $(this).closest('.customize-control');
          $(this).closest('.slider-image').remove();
          updateSliderImages(control);
        });
      })(jQuery);
      </script>

      <?php
    }
  }
  
  // Custom Control for Repeater
  class WP_Customize_Repeater_Control extends WP_Customize_Control {
    public $type = 'repeater';
    public $fields = array();
    public function __construct($manager, $id, $args = array()){
      parent::__construct($manager, $id, $args);
      if(isset($args['fields'])){
        $this->fields = $args['fields'];
      }
    }
    public function render_content(){
      $value = json_decode($this->value(), true);
      if(!is_array($value)) { $value = array(); }
      ?>
      <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
      <ul class="repeater-list">
        <?php if(!empty($value)) : ?>
          <?php foreach($value as $index => $item) : ?>
            <li class="repeater-item">
              <?php foreach($this->fields as $field_key => $field):
                $field_value = isset($item[$field_key]) ? $item[$field_key] : '';
              ?>
                <label><?php echo esc_html($field['label']); ?>
                <?php if('textarea' === $field['type']) : ?>
                  <textarea class="repeater-field" data-field="<?php echo esc_attr($field_key); ?>"><?php echo esc_textarea($field_value); ?></textarea>
                <?php else: ?>
                  <input type="text" class="repeater-field" data-field="<?php echo esc_attr($field_key); ?>" value="<?php echo esc_attr($field_value); ?>" />
                <?php endif; ?>
                </label><br/>
              <?php endforeach; ?>
              <button type="button" class="repeater-remove"><?php _e('Remove','langu-sistemos'); ?></button>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <button type="button" class="repeater-add"><?php _e('Add New','langu-sistemos'); ?></button>
      <input type="hidden" <?php $this->link(); ?> class="repeater-input" value="<?php echo esc_attr($this->value()); ?>" />
      <script>
      (function($){
        function updateRepeaterInput(container) {
          var items = [];
          container.find('.repeater-item').each(function(){
            var itemData = {};
            $(this).find('.repeater-field').each(function(){
              var field = $(this).data('field');
              if(field){
                itemData[field] = $(this).val();
              }
            });
            items.push(itemData);
          });
          container.find('.repeater-input').val(JSON.stringify(items)).trigger('change');
        }
        $(document).on('change', '.repeater-field', function(){
          var container = $(this).closest('.customize-control');
          updateRepeaterInput(container);
        });
        $(document).on('click', '.repeater-add', function(e){
          e.preventDefault();
          var control = $(this).closest('.customize-control');
          var newItem = $('<li class="repeater-item"></li>');
          <?php foreach($this->fields as $field_key => $field): ?>
          var fieldMarkup_<?php echo $field_key; ?> = '';
          <?php if($field['type'] === 'textarea'): ?>
          fieldMarkup_<?php echo $field_key; ?> = '<label><?php echo esc_js($field['label']); ?><br/><textarea class="repeater-field" data-field="<?php echo $field_key; ?>"></textarea></label><br/>';
          <?php else: ?>
          fieldMarkup_<?php echo $field_key; ?> = '<label><?php echo esc_js($field['label']); ?><br/><input type="text" class="repeater-field" data-field="<?php echo $field_key; ?>" value="" /></label><br/>';
          <?php endif; ?>
          newItem.append(fieldMarkup_<?php echo $field_key; ?>);
          <?php endforeach; ?>
          newItem.append('<button type="button" class="repeater-remove"><?php _e("Remove","langu-sistemos"); ?></button>');
          control.find('.repeater-list').append(newItem);
          updateRepeaterInput(control);
        });
        $(document).on('click', '.repeater-remove', function(e){
          e.preventDefault();
          var control = $(this).closest('.customize-control');
          $(this).closest('.repeater-item').remove();
          updateRepeaterInput(control);
        });
      })(jQuery);
      </script>
      <?php
    }
  }
}

// Set default values on theme activation for Home Panel settings
function home_panel_set_default_customizer_values() {
  if ( get_theme_mod('home_slider_heading') === false ) {
    set_theme_mod('home_slider_heading', 'Nes kokybė');
  }
  if ( get_theme_mod('home_slider_color') === false ) {
    set_theme_mod('home_slider_color', 'atsiperka!');
  }
  if ( get_theme_mod('home_slider_description') === false ) {
    set_theme_mod('home_slider_description', 'Langų ir durų ekspertai – lengvas įsigijimo procesas, aukščiausia kokybė.');
  }
  if ( get_theme_mod('home_slider_images') === false ) {
    set_theme_mod('home_slider_images', json_encode([ get_template_directory_uri() . '/assets/images/home/default-slide.png' ]));
  }
  
  // Home Section 2 Defaults
  if ( get_theme_mod('home_section2_text') === false ) {
    set_theme_mod('home_section2_text', 'Elegantiško dizaino, ilgaamžiai, dėmėsingi ekologijai sprendimai Jūsų namams, balkonui, terasai ar biurui! ');
  }
  if ( get_theme_mod('home_section2_color_text') === false ) {
    set_theme_mod('home_section2_color_text', 'Nes kokybė atsipeka.');
  }
  
  // Home Why Items Defaults with 4 default points
  if ( get_theme_mod('home_why_items') === false ) {
    $default_why_items = [
      [
        'heading'     => 'Lengvas įsigijimo procesas',
        'description' => 'Greita reakcija. Į užklausas atsakome nedelsdami. Ekspertinis parinkimas. Vadybininkas analizuoja poreikius, specialistas atvyksta, atlieka matavimus ir rekomenduoja sprendimus. Greitas įgyvendinimas. Nuo skambučio iki montavimo – vos 3 savaitės!'
      ],
      [
        'heading'     => 'Aukšta kokybė ir ilgaamžiškumas',
        'description' => 'Langai – svarbi namų dalis, todėl atsakingai renkamės gamintojus. Drutex – vienas moderniausių gamintojų Europoje. Šie PREMIUM klasės langai gaminami vienoje gamykloje: nuo profilių iki stiklo paketų. Drutex turi savo laboratorijas, nuolat investuoja į technologijas ir užtikrina nepriekaištingą kokybę bei ilgaamžiškumą.'
      ],
      [
        'heading'     => 'Pilnas darbų spektras',
        'description' => 'Teikiame visapusiškas paslaugas: nuo profesionalių matavimų, gamybos ir montavimo iki apdailos darbų. Sumontuojame priedus: palanges, tinklelius, apsaugines žaliuzes. Jums nereikės ieškoti papildomų specialistų – viskuo pasirūpinsime mes.'
      ],
      [
        'heading'     => 'Išskirtinis klientų aptarnavimas ir servisas',
        'description' => 'Vertiname kiekvieną klientą, užtikrinant aukštos kokybės aptarnavimą tiek prieš pirkimą, tiek po jo. Mūsų servisas pasiruošęs padėti ir išspręsti bet kokius klausimus net ir po darbų užbaigimo. Taip pat siūlome pratęstą garantiją iki 10 metų.'
      ]
    ];
    set_theme_mod('home_why_items', json_encode($default_why_items));
  }
  
  // Home Social Defaults
  if ( get_theme_mod('home_social_text') === false ) {
    set_theme_mod('home_social_text', 'Mūsų naujienos ir patys geriausi pasiūlymai');
  }
  if ( get_theme_mod('home_social_facebook') === false ) {
    set_theme_mod('home_social_facebook', 'https://facebook.com');
  }
  if ( get_theme_mod('home_social_instagram') === false ) {
    set_theme_mod('home_social_instagram', 'https://instagram.com');
  }
}
add_action('after_switch_theme', 'home_panel_set_default_customizer_values');
?>
