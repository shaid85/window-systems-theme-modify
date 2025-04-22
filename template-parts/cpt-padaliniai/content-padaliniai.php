<?php

$icon_black_arrow_left = '
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M20.9996 12.0004C20.9996 12.1993 20.9206 12.3901 20.7799 12.5307C20.6393 12.6714 20.4485 12.7504 20.2496 12.7504H5.55993L11.0302 18.2198C11.0999 18.2895 11.1552 18.3722 11.1929 18.4632C11.2306 18.5543 11.25 18.6519 11.25 18.7504C11.25 18.849 11.2306 18.9465 11.1929 19.0376C11.1552 19.1286 11.0999 19.2114 11.0302 19.281C10.9606 19.3507 10.8778 19.406 10.7868 19.4437C10.6957 19.4814 10.5982 19.5008 10.4996 19.5008C10.4011 19.5008 10.3035 19.4814 10.2124 19.4437C10.1214 19.406 10.0387 19.3507 9.96899 19.281L3.21899 12.531C3.14926 12.4614 3.09394 12.3787 3.05619 12.2876C3.01845 12.1966 2.99902 12.099 2.99902 12.0004C2.99902 11.9019 3.01845 11.8043 3.05619 11.7132C3.09394 11.6222 3.14926 11.5394 3.21899 11.4698L9.96899 4.71979C10.1097 4.57906 10.3006 4.5 10.4996 4.5C10.6986 4.5 10.8895 4.57906 11.0302 4.71979C11.171 4.86052 11.25 5.05139 11.25 5.25042C11.25 5.44944 11.171 5.64031 11.0302 5.78104L5.55993 11.2504H20.2496C20.4485 11.2504 20.6393 11.3294 20.7799 11.4701C20.9206 11.6107 20.9996 11.8015 20.9996 12.0004Z" fill="black"/>
  </svg>

  ';
$icon_yellow_message = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/message.svg");
$icon_yellow_phone = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/phone.svg");
$icon_yellow_clock = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/clock.svg");
$icon_yellow_address = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/yellow-place.svg");

// Get dynamic post data
$phone = get_post_meta(get_the_ID(), 'cp_padaliniai_phone', true);
$email = get_post_meta(get_the_ID(), 'cp_padaliniai_email', true);
$address = get_post_meta(get_the_ID(), 'cp_padaliniai_address', true);
$availability = get_post_meta(get_the_ID(), 'cp_padaliniai_availability', true);
$description = get_post_meta(get_the_ID(), 'cp_padaliniai_description', true);
$images = get_post_meta(get_the_ID(), 'cp_padaliniai_images', true);
$google_map_url = get_post_meta(get_the_ID(), 'cp_padaliniai_google_map_url', true);
$google_map_url_embed = get_post_meta(get_the_ID(), 'cp_padaliniai_google_map_url_embed', true);


?>
<div class="">
  <div
    class="relative max-w-[1440px] flex flex-col p-[16px] pb-6 md:pt-[32px] md:pb-[80px] md:pr-[80px] md:pl-[80px] gap-[24px] md:gap-[56px] mx-auto bg-[#ffffff]">
    <div class="text-[#000000]">
      <div class="gap-[8px] inline-block cursor-pointer" onclick="window.history.back();">
        <div class="flex gap-[8px] items-center">
          <?php echo $icon_black_arrow_left; ?>
          <p class="text-[16px] font-[700] text-[#000000] leading-[24px] font-degular-text-bold">Grįžti</p>
        </div>
      </div>
    </div>
    <!-- Flex container switches from column to row on medium screens -->
    <div class="flex flex-col md:flex-row gap-6 md:gap-[56px]">
      <!-- Container-1: Textual Content -->
      <div class="order-2 md:order-1 flex flex-col gap-[24px] md:gap-[32px] md:w-[50%]">
        <div class="flex flex-col gap-4 md:gap-[24px]">
          <h1 class="font-Erbaum font-[400] text-[28px] md:text-[40px] leading-8.5 leading-[48px] text-[#000000]">
            <?php the_title(); ?>
          </h1>
          <div class="flex flex-col gap-[16px]">
            <?php if ($phone): ?>
              <div class="flex gap-[16px] items-center">
                <?php echo $icon_yellow_phone; ?>
                <p class="text-[16px] md:text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">
                  <?php echo esc_html($phone); ?>
                </p>
              </div>
            <?php endif; ?>

            <?php if ($email): ?>
              <div class="flex gap-[16px] items-center">
                <?php echo $icon_yellow_message; ?>
                <p class="text-[16px] md:text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">
                  <?php echo esc_html($email); ?>
                </p>
              </div>
            <?php endif; ?>

            <?php if ($address): ?>
              <div class="flex gap-[16px] items-center">
                <?php echo $icon_yellow_address; ?>
                <p class="text-[16px] md:text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">
                  <?php echo esc_html($address); ?>
                </p>
              </div>
            <?php endif; ?>

            <?php if ($availability): ?>
              <div class="flex gap-[16px] items-center">
                <?php echo $icon_yellow_clock; ?>
                <p class="text-[16px] md:text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">
                  <?php echo esc_html($availability); ?>
                </p>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="">
          <a href="<?php echo esc_url_raw($google_map_url); ?>">
            <button
              class="flex gap-[10px] px-[32px] py-[16px] text-white bg-black rounded-[16px] w-full md:w-[320px] text-center justify-center items-center">
              <p class="text-[18px]">Atidaryti Google maps</p>
              <p>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.7504 6V15.75C18.7504 15.9489 18.6714 16.1397 18.5307 16.2803C18.3901 16.421 18.1993 16.5 18.0004 16.5C17.8015 16.5 17.6107 16.421 17.4701 16.2803C17.3294 16.1397 17.2504 15.9489 17.2504 15.75V7.81031L6.53104 18.5306C6.39031 18.6714 6.19944 18.7504 6.00042 18.7504C5.80139 18.7504 5.61052 18.6714 5.46979 18.5306C5.32906 18.3899 5.25 18.199 5.25 18C5.25 17.801 5.32906 17.6101 5.46979 17.4694L16.1901 6.75H8.25042C8.0515 6.75 7.86074 6.67098 7.72009 6.53033C7.57943 6.38968 7.50042 6.19891 7.50042 6C7.50042 5.80109 7.57943 5.61032 7.72009 5.46967C7.86074 5.32902 8.0515 5.25 8.25042 5.25H18.0004C18.1993 5.25 18.3901 5.32902 18.5307 5.46967C18.6714 5.61032 18.7504 5.80109 18.7504 6Z"
                    fill="white" />
                </svg>
              </p>
            </button>
          </a>
        </div>

        <div class="flex flex-col gap-0 md:gap-[24px]">
          <p class="text-[18px] font-[400] leading-[26px] text-[#000000] font-degular-var">
            <?php the_content(); ?>
          </p>
        </div>
      </div>

      <!-- Container-2: Images/Embed link -->
      <div class="order-1 md:order-2 flex flex-col gap-[16px] md:w-[50%]">
        <?php if (!empty($images) && is_array($images)): ?>
          <?php foreach ($images as $img_url): ?>
            <div>
              <img class="w-full h-[136px] md:w-[640px] md:h-[240px] rounded-[16px] object-cover"
                src="<?php echo esc_url($img_url); ?>" alt="">
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- container-2 -->
          <div class="google-map-embed h-[350px] md:h-[650px] overflow-hidden rounded-[16px]">
            <?php
            if (!empty($google_map_url_embed)) {
              echo $google_map_url_embed;
            }
            ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if (!empty($images) && is_array($images)): ?>
        <!-- Decorative Absolute Positioned Element -->
        <div class="absolute right-0 top-[175px] md:top-[225px]">
          <img class="w-[100px] h-[136px] md:w-full md:h-full"
            src="<?php echo LANGU_THEME_URI; ?>/assets/images/Vector (14).png" alt="">
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<div class="max-w-[1440px] mx-auto">
  <div class="">
    <?php
    echo do_shortcode('[feedback_cta 
      title="Reikia konsultacijos ar patarimo?
      Klauskite!" 
      description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
      button_text="Susisiekti" 
      button_url="/gauti_pasiulyma"]');
    ?>
  </div>
</div>

<style>
  .google-map-embed iframe {
    width: 100%;
    height: 650px;
    /* default desktop height */
    border-radius: 16px;
  }

  @media and (max-width: 550px) {
    .google-map-embed {
      max-height: 350px !important;
      height: 350px !important;
      overflow: hidden !important;
      border-radius: 16px !important;
    }

    .google-map-embed iframe {
      width: 340px;
      height: 340px;
    }
  }
</style>

<style>
  @media (max-width: 450px) {
    .last-cta {
      margin: auto !important;
      width: 96% !important;
      padding: 12px !important;
      padding-bottom: 40px !important;
    }
    
    .cta-main {
      padding: 0;
      display: block !important;
      background-color: #161515;
      border-radius: 16px;
    }

    .cta-main {
      overflow: hidden !important;
    }

    .cta-main div.relative div.absolute {
      display: block;
      width: 128px;
      right: 0;
      transform: rotate(65deg);
      top: 14px;
      right: -46px;
      overflow: hidden !important;
    }

    .cta-main div.text-white {
      padding: 16px;
      min-height: 210px;
    }

    .cta-main .grid {
      gap: 0;
    }
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Check if we're on a mobile device (or viewport width less than 350px)
    if (window.innerWidth < 350) {
      // Select the iframe inside the container
      var iframe = document.querySelector('.google-map-embed iframe');
      if (iframe) {
        // Set the new width and height attributes
        iframe.setAttribute("width", "340");
        iframe.setAttribute("height", "340");
      }
    }
  });
</script>