<?php
/**
 * Template Name: Kontaktai
 */

get_header();

$chevron_right_icon = file_get_contents(LANGU_THEME_URI . "/assets/icons/chevron-right.svg");
$place_svg_icon = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/place.svg");
$place_svg_main = file_get_contents(LANGU_THEME_URI . "/assets/icons/place.svg");
$svg_clock = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/clock.svg");
$svg_user = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/user.svg");
$svg_phone = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/user.svg");
$svg_message = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/message.svg");
?>

<div class="max-w-[1440px] w-full mt-5 md:mt-0 mx-auto">
  <div class="flex flex-col bg-[#FFFFFF] gap-6 md:gap-[56px] px-[16px] py-[40px] md:p-[80px]">
    <div class="flex gap-[24px] items-center">
      <img class="w-[20px] h-[48px]" src="<?php echo LANGU_THEME_URI ?>/assets/icons/Layer_1.png" alt="">
      <h1 class="font-Erbaum font-[400] text-[28px] md:text-[40px] leading-8 md:leading-[48px] text-[#000000]">Kontaktai</h1>
    </div>
    <div class="flex flex-col gap-4 md:gap-[24px]">
      <h2 class="text-[22px] md:text-[32px] font-[400] leading-6-7 md:leading-[40px] font-erbaum-regular text-[#000000]">Padaliniai</h2>
      <!-- Dynamic Grid Container for Padaliniai Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-[24px]">
        <?php
        $args = array(
          'post_type' => 'padaliniai',
          'posts_per_page' => -1,
        );
        $padaliniai_query = new WP_Query($args);
        if ($padaliniai_query->have_posts()):
          while ($padaliniai_query->have_posts()):
            $padaliniai_query->the_post();
            $title = get_the_title();
            $permalink = get_permalink();
            ?>
            <a href="<?php echo esc_url($permalink); ?>" class="block">
              <div class="flex items-center justify-between h-[96px] md:h-[112px] bg-[#F7F7F7] rounded-[16px] px-[16px] py-6 md:py-[32px]">
                <div class="flex items-center gap-[16px]">
                  <?php echo $place_svg_icon; ?>
                  <span
                    class="text-[18px] md:text-[24px] font-[400] leading-[32px] font-erbaum-regular text-[#000000]"><?php echo esc_html($title); ?></span>
                </div>
                <div class="flex bg-yellow items-center justify-center w-12 h-12 text-black !rounded-[16px]"
                  style="border-radius: 16px !important;">
                  <?php echo $chevron_right_icon; ?>
                </div>
              </div>
            </a>
            <?php
          endwhile;
          wp_reset_postdata();
        else:
          echo '<p>No padaliniai found.</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</div>

<div class="w-full mx-auto bg-[#F7F7F7]">
  <div class="max-w-[1440px] p-[40px] flex flex-col gap-[56px] px-[16px] py-[40px] md:p-[80px] mx-auto">
    <div class="flex flex-col md:flex-row gap-[24px]">
      <!-- Vilniaus logistikos centras -->
      <div class="flex flex-col gap-4 md:gap-[24px] md:p-[32px] bg-[#FFFFFF] p-[16px] rounded-[16px] flex-1">
        <h1 class="text-[24px] md:text-[32px] font-[400] text-[#000000] leading-7 md:leading-[40px] font-Erbaum">Vilniaus logistikos centras</h1>
        <div class="flex flex-col gap-2 md:gap-[24px]">
          <div class="flex items-start ">
            <?php echo $place_svg_main; ?>
            <p class="text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">Mokslininkų g. 20, LT-08412
              Vilnius</p>
          </div>
          <div class="flex items-start gap-[16px]">
            <?php echo $svg_clock; ?>
            <p class="text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">I – V: 08.00 –
              17.00<br>VI-VII: Nedirbame</p>
          </div>
        </div>
        <div class="rounded-[16px] overflow-hidden">

          <iframe class="w-full h-[300px] md:h-[450px] rounded-[16px]"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2302.548594096734!2d25.2595294!3d54.7527407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd90fd63428fa3%3A0x746cdd6c00225d7!2sMokslinink%C5%B3%20g.%2020%2C%20Vilnius%2C%2008412%20Vilniaus%20m.%20sav.%2C%20Lithuania!5e0!3m2!1sen!2sin!4v1743681027858!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <!-- Centrinė būveinė -->
      <div class="flex flex-col gap-[24px] md:p-[32px] bg-[#FFFFFF] p-[16px] rounded-[16px] flex-1">
        <h1 class="text-[24px] md:text-[32px] font-[400] text-[#000000] leading-7 md:leading-[40px] font-Erbaum">Centrinė buveinė</h1>
        <div class="flex flex-col gap-2 md:gap-[24px]">
          <div class="flex items-start gap-[16px]">
            <?php echo $place_svg_main; ?>
            <p class="text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">P. Žadeikos g. 20-9, LT-06321
              Vilnius</p>
          </div>
          <div class="flex items-start gap-[16px]">
            <?php echo $svg_clock; ?>
            <p class="text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">I – V: 08.00 –
              17.00<br>VI-VII: Nedirbame</p>
          </div>
        </div>
        <div class="rounded-[16px] overflow-hidden">
          <iframe class="w-full h-[300px] md:h-[450px] rounded-[16px]"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2305.728918228796!2d25.226803076509878!3d54.73637547289373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd941b2197f417%3A0x49bc8280a0c32d10!2sP.%20%C5%BDadeikos%20g.%2020%2C%20Vilnius%2006321!5e0!3m2!1slt!2slt!4v1711457993409!5m2!1slt!2slt"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-[24px]">
      <!-- Company Details -->
      <div class="flex flex-col gap-4 md:gap-[24px]">
        <h1 class="text-[32px] font-Erbaum">Įmonės rekvizitai</h1>
        <div class="flex flex-col gap-2 md:gap-[16px]">
          <p><?php echo esc_html(get_theme_mod('company_name')); ?></p>
          <p><?php echo esc_html(get_theme_mod('company_code')); ?></p>
          <p><?php echo esc_html(get_theme_mod('vat_code')); ?></p>
          <p><?php echo esc_html(get_theme_mod('account_number')); ?></p>
          <p><?php echo esc_html(get_theme_mod('bank_name')); ?></p>
          <p><?php echo esc_html(get_theme_mod('bank_code')); ?></p>
        </div>
      </div>

      <!-- Manager Contacts -->
      <div class="flex flex-col gap-4 md:gap-[24px]">
        <h1 class="text-[32px] font-Erbaum">Vadovo kontaktai</h1>
        <div class="flex flex-col gap-2 md:gap-[16px]">
          <div class="flex gap-[16px] items-center">
            <?php echo $svg_user; ?>
            <p><?php echo esc_html(get_theme_mod('manager_name')); ?></p>
          </div>
          <div class="flex gap-[16px] items-center">
            <?php echo $svg_phone; ?>
            <p><?php echo esc_html(get_theme_mod('manager_phone')); ?></p>
          </div>
          <div class="flex gap-[16px] items-center">
            <?php echo $svg_message; ?>
            <p><?php echo esc_html(get_theme_mod('manager_email')); ?></p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="hidden md:flex bg-[#f7f7f7]">
  <?php
  echo do_shortcode('[feedback_cta 
      title="Reikia konsultacijos ar patarimo?
      Klauskite!" 
      description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
      button_text="Susisiekti" 
      button_url="/gauti_pasiulyma"]');
  ?>
</div>

<style>
  .last-cta {
    padding-bottom: 60px !important;
  }
</style>

<?php
get_footer();
?>