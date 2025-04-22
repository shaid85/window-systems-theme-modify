<?php

function lang_feedback_cta_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title'        => 'Padėkite mums tobulėti – palikite atsiliepimą apie mūsų produkciją ir paslaugas',
        'description'  => 'Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį.',
        'button_text'  => 'Palikite atsiliepimą',
        'button_url'   => '#',
    ), $atts, 'feedback_cta' );

    ob_start(); ?>
    <div class="w-full last-cta">
      <div class="md:flex hidden max-w-[1440px] w-full px-[4px] md:px-[80px] mx-auto pb-[40px] cta-main">
        <div class="relative w-full">
          <div class="absolute right-0 hidden md:block">
            <img src="<?php echo esc_url( LANGU_THEME_URI . '/assets/images/Vector (2).png' ); ?>" alt="">
          </div>
          <div class="absolute bottom-0 hidden right-64 md:block">
            <img src="<?php echo esc_url( LANGU_THEME_URI . '/assets/images/Vector (3).png' ); ?>" alt="">
          </div>
            <div class="p-[48px] bg-[#161515] min-h-[282px] rounded-[16px] text-white">
            <div class="grid items-start grid-cols-1 gap-4 md:grid-cols-3">
              <div class="w-full md:w-[642px] flex flex-col items-start justify-between col-span-2">
                <h2 class="text-[18px] md:text-[24px] leading-6 md:leading-8 font-[500] mb-[16px] font-Erbaum">
                  <?php echo esc_html( $atts['title'] ); ?>
                </h2>
                <p class="text-[16px] mb-[24px] font-degular-var">
                  <?php echo esc_html( $atts['description'] ); ?>
                </p>
                <a href="<?php echo esc_url( $atts['button_url'] ); ?>" class="bg-[#FFCC32] text-[#000] font-[700] text-[18px] px-6 py-3 rounded-xl hover:bg-yellow-300 transition-colors w-full md:w-[260px] text-center sm:w-auto">
                  <?php echo esc_html( $atts['button_text'] ); ?>
                </a>
              </div>
              <div class="flex items-start justify-end col-span-1">
                <img src="<?php echo esc_url( LANGU_THEME_URI . '/assets/icons/svg/cta-logo.svg' ); ?>" alt="CTA Graphic" class="max-w-[200px] h-auto hidden md:block">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'feedback_cta', 'lang_feedback_cta_shortcode' );
