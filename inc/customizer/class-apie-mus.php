<?php

defined("ABSPATH") || exit;

class Langu_apie_mus_customizer
{

  private $about_us_default = [
    "sections" => [
      "section_hero" => [
      ],
      "section_our_values" => [
        "title" => "Mūsų vertybės",
        "description_first" => "Langų Sistemos – šešiolika metų sėkmingai veikianti įmonė, kuri užtikrina aukščiausią kokybę, inovacijas ir nepriekaištingą klientų aptarnavimą. Nuo pat veiklos pradžios mūsų tikslas buvo ne tik tiekti kokybiškus produktus, bet ir sukurti visapusiškai patogų klientų aptarnavimo procesą, teikti pilną servisą nuo užsakymo, montavimo iki garantiniės darbų priežiūros.
        
        Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placerat tempor cursus ut feugiat at sit nisi velit vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo. Amet scelerisque nunc libero enim eu. Enim tincidunt facilisi turpis et adipiscing faucibus interdum.
        
        Mūsų komanda – tai patyrę specialistai, kurie padeda kiekvienam klientui išsirinkti geriausiai jo poreikius atitinkantį produktą ir užtikrina, kad visas procesas – nuo konsultacijos iki montavimo – vyktų sklandžiai. Šiandien Langų Sistemos išsiskiria šešiomis pagrindinėmis vertybėmis:",
        "description_second" => "Džiuginti savo klientus kokybiškais ir novatoriškais gaminiais. Sukurti langus, įkūnijančius unikalų dizainą, ilgametę patirtį ir paveldą, didelę technologinę pažangą kartu su modernumu. Savo misiją laikome įsipareigojimu savo klientams.",
        "subtitle_heading" => "Langų Sistemos - kai kokybė ir patogumas susitinka su inovacijomis!"
      ],
      "section_work_quality" => [
        "title" => "Pamatykite mūsų darbo kokybę iš arti.",
        "description" => "Peržiūrėkite mūsų atliktus projektus ir įsitikinkite aukšta kokybe bei profesionalumu.",
        "button_text" => "Atlikti darbai"
      ],
      "section_history" => [
        "title" => "Istorija"
      ]
    ]
  ];
  public function __construct()
  {
    add_action("customize_controls_enqueue_scripts", [$this, "include_assets"]);
    add_action('customize_register', [$this, "register_customization"]);
  }

  public function include_assets()
  {
    wp_enqueue_script('about-us-customizer-repeater', LANGU_THEME_URI . '/assets/js/customizer/about-us-costomizer-repeater.js', ['jquery', 'customize-controls'], null, true);
    wp_enqueue_style('about-us-customizer-repeater-style', LANGU_THEME_URI . '/assets/css/customizer/about-us-costomizer-repeater.css');

    // our team member card
    wp_enqueue_script('about-us-customizer-repeater-member-card', LANGU_THEME_URI . '/assets/js/customizer/about-us-member-card-costomizer-repeater.js', ['jquery', 'customize-controls'], null, true);
  }
  public function register_customization($wp_customize)
  {
    // Panel for About Page
    $wp_customize->add_panel('about_us_panel', [
      'title' => __('Apie Mus', 'langu-sistemos'),
      'priority' => 30
    ]);

    // =============== REGISTERING ABOUT US SECTION =============
    $wp_customize->add_section('about_us_hero_section', [
      'title' => __('Hero Section', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    // Hero Title 1 - white
    $wp_customize->add_setting('about_hero_title_white', [
      'default' => 'Apie mus - faucibus at orci vel ac.',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_hero_title_white', [
      'label' => __('Hero title white', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'type' => 'text'
    ]);

    // Hero Title 2 - colored
    $wp_customize->add_setting('about_hero_title_colored', [
      'default' => 'Sollicite augue commodo.',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_hero_title_colored', [
      'label' => __('Hero Title Colored', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'type' => 'text'
    ]);

    // Hero Description
    $wp_customize->add_setting('about_hero_description_first', [
      'default' => '„Langų sistemos“ – tai daugiau nei 17 metų patirtį turinti įmonė, kuri specializuojasi aukštos kokybės langų, durų ir terasų gamyboje bei montavime. Mūsų tikslas – užtikrinti klientų namų jaukumą, saugumą ir energijos efektyvumą. Pasitelkdami pažangiausias technologijas bei aukščiausios kokybės medžiagas, siūlome sprendimus, kurie atitinka šiuolaikinius dizaino ir funkcionalumo standartus.',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_hero_description_first', [
      'label' => __('Hero Description First', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'type' => 'textarea'
    ]);

    // list items
    $wp_customize->add_setting('about_hero_section_list_items', [
      'default' => '10 metų garantija
Greitas ir kokybiškas aptarnavimas
17+ metų patirtis rinkoje',
      'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_hero_section_list_items', [
      'label' => __('List items (one per line)', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'type' => 'textarea'
    ]);

    $wp_customize->add_setting('about_hero_description_second', [
      'default' => 'Susisiekite su mumis ir sužinokite, kaip galime padėti įgyvendinti jūsų viziją!',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_hero_description_second', [
      'label' => __('Hero Description Second', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'type' => 'textarea'
    ]);

    // Hero Image
    $wp_customize->add_setting('about_hero_image', [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_hero_image', [
      'label' => __('Hero Image', 'langu-sistemos'),
      'section' => 'about_us_hero_section',
      'settings' => 'about_hero_image'
    ]));
    // =============== SECTION TRUST ==================

    $wp_customize->add_section('about_us_trust_section', [
      'title' => __('Section trust', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    // section title
    $wp_customize->add_setting('about_us_trust_section_title', [
      'default' => 'Mumis pasitiki šimtai klientų visame pasaulyje!',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_trust_section_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_trust_section',
      'type' => 'text'
    ]);

    // list items
    $wp_customize->add_setting('about_us_trust_section_list_items', [
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_us_trust_section_list_items', [
      'label' => __('List items (one per line)', 'langu-sistemos'),
      'section' => 'about_us_trust_section',
      'type' => 'textarea'
    ]);

    // button text
    $wp_customize->add_setting('about_us_trust_section_button_text', [
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_us_trust_section_button_text', [
      'label' => __('Contact button text', 'langu-sistemos'),
      'section' => 'about_us_trust_section',
      'type' => 'text'
    ]);

    // Hero Image
    $wp_customize->add_setting('about_us_trust_section_image', [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_trust_section_image', [
      'label' => __('Section image', 'langu-sistemos'),
      'section' => 'about_us_trust_section',
      'settings' => 'about_us_trust_section_image'
    ]));

    


    // =============== OUR VALUES ==================
    $wp_customize->add_section('about_us_our_values_section', [
      'title' => __('Our Values', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    // section title
    $wp_customize->add_setting('about_us_our_values_title', [
      'default' => $this->about_us_default["sections"]["section_our_values"]["title"],
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_our_values_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_our_values_section',
      'type' => 'text'
    ]);

    // section description first
    $wp_customize->add_setting('about_us_our_values_description_first', [
      'default' => $this->about_us_default["sections"]["section_our_values"]["description_first"],
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_our_values_description_first', [
      'label' => __('Section description first (Enter for new paragraph)', 'langu-sistemos'),
      'section' => 'about_us_our_values_section',
      'type' => 'textarea'
    ]);

    // repeater fields cards 

    $wp_customize->add_setting('about_us_card_repeater', [
      'default' => '',
      'sanitize_callback' => 'wp_kses_post'
    ]);

    $wp_customize->add_control(new WP_Customize_Card_Repeater_Control($wp_customize, 'about_us_card_repeater', [
      'label' => __('About Us Cards', 'langu-sistemos'),
      'section' => 'about_us_our_values_section',
      'settings' => 'about_us_card_repeater'
    ]));

    // section description second
    $wp_customize->add_setting('about_us_our_values_description_second', [
      'default' => __($this->about_us_default["sections"]["section_our_values"]["description_second"], 'langu-sistemos'),
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_our_values_description_second', [
      'label' => __('Section description second', 'langu-sistemos'),
      'section' => 'about_us_our_values_section',
      'type' => 'textarea'
    ]);


    // section description second
    $wp_customize->add_setting('about_us_our_values_subtitle', [
      'default' => __($this->about_us_default["sections"]["section_our_values"]["subtitle_heading"], 'langu-sistemos'),
      'sanitize_callback' => 'text'
    ]);

    $wp_customize->add_control('about_us_our_values_subtitle', [
      'label' => __('Sub-title', 'langu-sistemos'),
      'section' => 'about_us_our_values_section',
      'type' => 'text'
    ]);

    // ---------------- WORK QUANLITY SECTION --------------------
    $wp_customize->add_section('about_us_work_quality_section', [
      'title' => __('Work Quality', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    // section title
    $wp_customize->add_setting('about_us_work_quality_title', [
      'default' => $this->about_us_default["sections"]["section_work_quality"]["title"],
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_work_quality_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_work_quality_section',
      'type' => 'text'
    ]);

    // section desc
    $wp_customize->add_setting('about_us_work_quality_description', [
      'default' => $this->about_us_default["sections"]["section_work_quality"]["description"],
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_work_quality_description', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_work_quality_section',
      'type' => 'textarea'
    ]);

    // section button text
    $wp_customize->add_setting('about_us_work_quality_btn_text', [
      'default' => $this->about_us_default["sections"]["section_work_quality"]["button_text"],
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_work_quality_btn_text', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_work_quality_section',
      'type' => 'text'
    ]);

    // ---------------- HISTORY SECTION --------------------
    $wp_customize->add_section('about_us_history_section', [
      'title' => __('History', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    $wp_customize->add_setting('about_us_history_title', [
      'default' => $this->about_us_default["sections"]["section_history"]["title"],
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_history_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_history_section',
      'type' => 'text'
    ]);

    $wp_customize->add_setting('about_us_history_desk_img', [
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_history_desk_img', [
      'label' => __('Section Desktop Image', 'langu-sistemos'),
      'section' => 'about_us_history_section',
      'settings' => 'about_us_history_desk_img'
    ]));

    $wp_customize->add_setting('about_us_history_mobile_img', [
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_history_mobile_img', [
      'label' => __('Section Mobile Image', 'langu-sistemos'),
      'section' => 'about_us_history_section',
      'settings' => 'about_us_history_mobile_img'
    ]));

    // ---------------- OUR TEAM SECTION --------------------
    $wp_customize->add_section('about_us_our_team_section', [
      'title' => __('Our Team', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    $wp_customize->add_setting('about_our_team_title', [
      'default' => 'Mūsų komanda - profesionalumas ir rūpestis kiekvienu klientu',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_our_team_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_our_team_section',
      'type' => 'text'
    ]);

    $wp_customize->add_setting('about_us_our_team_member_card_repeater', [
      'default' => '',
      'sanitize_callback' => 'wp_kses_post'
    ]);

    $wp_customize->add_control(new WP_Customize_Member_Card_Repeater_Control($wp_customize, 'about_us_our_team_member_card_repeater', [
      'label' => __('Member Cards', 'langu-sistemos'),
      'section' => 'about_us_our_team_section',
      'settings' => 'about_us_our_team_member_card_repeater'
    ]));

    // ---------------- LOCATION SECTION --------------------
    $wp_customize->add_section('about_us_location_section', [
      'title' => __('Location', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    $wp_customize->add_setting('about_us_location_title', [
      'default' => 'Lorem ipsum dolor sit amet consectetur.',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_location_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'text'
    ]);

    $wp_customize->add_setting('about_us_location_description_first', [
      'default' => 'Lorem ipsum dolor sit amet consectetur. Id vitae lectus sodales elementum massa nunc. Eu ornare sem ut a blandit tempor. Adipiscing posuere nisl interdum scelerisque placerat pharetra. Hendrerit odio turpis ullamcorper auctor.',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_location_description_first', [
      'label' => __('Section description first', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'textarea'
    ]);

    // list items
    $wp_customize->add_setting('about_us_location_list_items', [
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_us_location_list_items', [
      'label' => __('List items (one per line)', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'textarea'
    ]);

    $wp_customize->add_setting('about_us_location_description_second1', [
      'default' => 'Lorem ipsum dolor sit amet consectetur. Id vitae lectus sodales elementum massa nunc. Eu ornare sem ut a blandit tempor. Adipiscing posuere nisl interdum scelerisque placerat pharetra. Hendrerit odio turpis ullamcorper auctor.',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_location_description_second1', [
      'label' => __('Section description second (before bold)', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'textarea'
    ]);

    $wp_customize->add_setting('about_us_location_description_second_bold', [
      'default' => 'Lorem ipsum dolor sit amet consectetur. Id vitae lectus sodales elementum massa nunc. Eu ornare sem ut a blandit tempor. Adipiscing posuere nisl interdum scelerisque placerat pharetra. Hendrerit odio turpis ullamcorper auctor.',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_location_description_second_bold', [
      'label' => __('Section description second bold text', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'textarea'
    ]);

    $wp_customize->add_setting('about_us_location_description_second2', [
      'default' => 'Lorem ipsum dolor sit amet consectetur. Id vitae lectus sodales elementum massa nunc. Eu ornare sem ut a blandit tempor. Adipiscing posuere nisl interdum scelerisque placerat pharetra. Hendrerit odio turpis ullamcorper auctor.',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_location_description_second2', [
      'label' => __('Section description second (after bold)', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'textarea'
    ]); 

    $wp_customize->add_setting('about_us_location_contact_btn_text', [
      'default' => 'Kontaktai',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_location_contact_btn_text', [
      'label' => __('Section contact button text', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'type' => 'text'
    ]);

    // Image map
    $wp_customize->add_setting('about_us_location_img_map', [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_location_img_map', [
      'label' => __('Image map', 'langu-sistemos'),
      'section' => 'about_us_location_section',
      'settings' => 'about_us_location_img_map'
    ]));

    // ================== REVIEWS SECTION ====================

    $wp_customize->add_section('about_us_reviews_section', [
      'title' => __('Section reviews', 'langu-sistemos'),
      'panel' => 'about_us_panel'
    ]);

    $wp_customize->add_setting('about_us_reviews_title', [
      'default' => 'Lorem ipsum dolor sit amet consectetur.',
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('about_us_reviews_title', [
      'label' => __('Section title', 'langu-sistemos'),
      'section' => 'about_us_reviews_section',
      'type' => 'text'
    ]);

    $wp_customize->add_setting('about_us_reviews_description', [
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('about_us_reviews_description', [
      'label' => __('Section description', 'langu-sistemos'),
      'section' => 'about_us_reviews_section',
      'type' => 'textarea'
    ]);

    $wp_customize->add_setting('about_us_reviews_images_repeater', [
      'default' => '',
      'sanitize_callback' => 'wp_kses_post'
    ]);

    $wp_customize->add_control(new WP_Customize_Reviews_Image_Repeater_Control($wp_customize, 'about_us_reviews_images_repeater', [
      'label' => __('Sponsor Images', 'langu-sistemos'),
      'section' => 'about_us_reviews_section',
      'settings' => 'about_us_reviews_images_repeater'
    ]));

  }
}

new Langu_apie_mus_customizer();

if (class_exists("WP_Customize_Control")) {
  class WP_Customize_Card_Repeater_Control extends WP_Customize_Control
  {
    public $type = 'repeater';

    public function render_content()
    {
      ?>
      <div class="customize-control card-icon-repeater">
        <label>
          <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        </label>

        <div class="repeater-cards"></div>

        <input type="hidden" class="repeater-hidden" <?php $this->link(); ?>
          value="<?php echo esc_attr($this->value()); ?>" />

        <button type="button" class="button repeater-add-card">Add Card</button>
      </div>
      <?php
    }
  }
}

if (class_exists("WP_Customize_Control")) {
  class WP_Customize_Member_Card_Repeater_Control extends WP_Customize_Control
  {
    public $type = 'repeater';

    public function render_content()
    {
      ?>
      <div class="customize-control member-card-repeater">
        <label>
          <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        </label>

        <div class="member-repeater-cards"></div>

        <input type="hidden" class="member-repeater-hidden" <?php $this->link(); ?>
          value="<?php echo esc_attr($this->value()); ?>" />

        <button type="button" class="button member-repeater-add-card">Add Member</button>
      </div>
      <?php
    }
  }
}

// image controller

if (class_exists('WP_Customize_Control')) {
  class WP_Customize_Reviews_Image_Repeater_Control extends WP_Customize_Control
  {
    public $type = 'repeater';

    public function render_content()
    {
      ?>
      <div class="customize-control reviews-image-repeater">
        <label>
          <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        </label>

        <div class="reviews-image-repeater-items"></div>

        <input type="hidden" class="reviews-image-repeater-hidden" <?php $this->link(); ?>
          value="<?php echo esc_attr($this->value()); ?>" />

        <button type="button" class="button reviews-image-repeater-add">Add Image</button>
      </div>

      <script>
        wp.customize.bind('ready', function () {
          jQuery(document).ready(function ($) {

            function updateImageRepeater(control) {
              const data = [];

              control.find('.reviews-image-repeater-item').each(function () {
                data.push({
                  image: $(this).find('.review-image-url').val()
                });
              });

              control.find('.reviews-image-repeater-hidden').val(JSON.stringify(data)).trigger('change');
            }

            function loadSavedImages(control) {
              const saved = control.find('.reviews-image-repeater-hidden').val();
              if (!saved) return;

              try {
                const data = JSON.parse(saved);

                data.forEach(item => {
                  const html = `
            <div class="reviews-image-repeater-item" style="margin-bottom: 10px; border: 1px solid #ccc; padding: 10px;">
              <div style="margin-bottom: 5px;">
                <img src="${item.image || ''}" class="review-image-preview" style="max-height: 60px; ${item.image ? '' : 'display:none;'}" />
              </div>
              <input type="text" class="review-image-url" value="${item.image || ''}" readonly style="width: 100%; margin-bottom: 5px;" />
              <button type="button" class="button upload-review-image">Upload Image</button>
              <button type="button" class="button remove-review-image" style="margin-top: 5px;">Remove</button>
            </div>
          `;
                  control.find('.reviews-image-repeater-items').append(html);
                });

              } catch (e) {
                console.error('Error parsing saved image data:', e);
              }
            }

            $('.customize-control.reviews-image-repeater').each(function () {
              loadSavedImages($(this));
            });

            $(document).on('click', '.reviews-image-repeater-add', function () {
              const container = $(this).siblings('.reviews-image-repeater-items');

              const html = `
        <div class="reviews-image-repeater-item" style="margin-bottom: 10px; border: 1px solid #ccc; padding: 10px;">
          <div style="margin-bottom: 5px;">
            <img src="" class="review-image-preview" style="max-height: 60px; display: none;" />
          </div>
          <input type="text" class="review-image-url" readonly style="width: 100%; margin-bottom: 5px;" />
          <button type="button" class="button upload-review-image">Upload Image</button>
          <button type="button" class="button remove-review-image" style="margin-top: 5px;">Remove</button>
        </div>
      `;
              container.append(html);
              updateImageRepeater(container.closest('.customize-control'));
            });

            $(document).on('click', '.remove-review-image', function () {
              const control = $(this).closest('.customize-control');
              $(this).closest('.reviews-image-repeater-item').remove();
              updateImageRepeater(control);
            });

            $(document).on('click', '.upload-review-image', function (e) {
              e.preventDefault();

              const button = $(this);
              const frame = wp.media({
                title: 'Select Review Image',
                library: { type: ['image'] },
                button: { text: 'Use this image' },
                multiple: false
              });

              frame.on('select', function () {
                const attachment = frame.state().get('selection').first().toJSON();
                const url = attachment.url;
                const wrapper = button.closest('.reviews-image-repeater-item');
                wrapper.find('.review-image-url').val(url);
                wrapper.find('.review-image-preview').attr('src', url).show();

                updateImageRepeater(wrapper.closest('.customize-control'));
              });

              frame.open();
            });

          });
        });

      </script>
      <?php
    }
  }
}
