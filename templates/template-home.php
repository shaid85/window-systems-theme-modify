<?php
/**
 * Template Name: Theme Home
 *
 */

get_header();
?>

<!--Hero section  -->

<section class="relative mx-auto w-full h-[500px] md:min-h-[720px] overflow-hidden top-[8px] md:top-0 p-[12px] md:mb-0 md:px-12 md:py-6 rounded-3xl">
  <div class="swiper mySwiper rounded-2xl">
    <div class="swiper-wrapper rounded-2xl">
      <?php
        $slides = json_decode(get_theme_mod('home_slider_images', '[]'), true) ?: [];
        if (empty($slides)) {
          $slides = [LANGU_THEME_URI . '/assets/images/home/default-slide.png'];
        }
        $heading = get_theme_mod('home_slider_heading');
        $color_heading = get_theme_mod('home_slider_color');
        $description = get_theme_mod('home_slider_description');
        foreach ($slides as $image_url): ?>
          <div class="swiper-slide relative min-h-[480px] md:min-h-[650px] bg-center bg-cover flex items-center justify-center rounded-[16px]" style="background-image:url('<?php echo esc_url($image_url); ?>')">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
            <div class="absolute z-10 px-[16px] text-white top-[8%] md:top-[36%] md:left-24 top-15">
              <h1 class="text-[28px] md:mb-[12px] mb-3 leading-8 md:text-[40px]">
                <span><?php echo esc_html($heading); ?></span>
                <span class="text-[#FFCC32]"><?php echo esc_html($color_heading); ?></span>
              </h1>
              <p class="mb-[32px] text-[18px] font-normal degular-light"><?php echo esc_html($description); ?></p>
              <div class="flex flex-col gap-4 text-center sm:flex-row">
                <a href="#" class="self-start w-full md:w-[180px] px-[16px] py-[12px] font-semibold text-black bg-white rounded-[16px] hover:bg-gray-200">Kainų skaičiuoklė</a>
                <a href="/gauti_pasiulyma" class="self-start w-full md:w-[180px] px-[16px] py-[12px] font-semibold text-black bg-yellow rounded-[16px] hover:bg-yellow-600">Gauti pasiūlymą</a>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
    <div class="hidden text-white swiper-button-next md:block"></div>
    <div class="hidden text-white swiper-button-prev md:block"></div>
    <div class="swiper-pagination top-[-10%]"></div>
  </div>
</section>  


<!--First section  -->
<section class="flex flex-col items-center justify-center gap-6 md:gap-10 px-6 py-10 md:py-20 pt-7 md:pt-10 ">
  <div class="">  
    <img src="<?php echo esc_url(LANGU_THEME_URI); ?>/assets/images/home/logo.png" alt="Icon"
      class="w-16 h-16 mx-auto" />
  </div>

  <p class="w-full md:w-[880px] text-[24px] leading-[28px] md:leading-[40px] text-center text-white md:text-[32px] font-[Erbaum] font-normal">
    <?php echo get_theme_mod('home_section2_text') ?>
    <span class="text-yellow">
      <?php echo get_theme_mod('home_section2_color_text') ?>
    </span>
  </p>

  <a href="/gauti_pasiulyma"
    class="w-full md:w-[220px] px-4 py-3 font-semibold text-center text-black transition bg-yellow-400 rounded-2xl hover:bg-yellow-600">
    Gauti pasiūlymą
  </a>
</section>


<!--second section-->
<div class="bg-[#F7F7F7] w-full">
  <section class="mx-auto max-w-[1440px] p-[40px] px-4 pt-8 md:p-20 ">
    <div class="grid grid-cols-2 mb-10 md:p-0">
      <div class="col-span-2 mb-4 md:col-span-1 md:mb-0">
        <h2 class="text-[40px] text-black">Produkcija</h2>
      </div>
      <div class="col-span-2 text-black md:col-span-1">
       <p class="font-degular-var leading-[26px] font-[400] text-[18px]">
          <?php
            $descs = get_option( 'cp_cpt_archive_descriptions', [] );
            $full = $descs['produkcija'] ?? '';
          ?>
          <?php echo esc_html( $full ); ?>
        </p>

      </div>
    </div>

  <?php
    $categories = get_terms([
      'taxonomy'   => 'produkcija_category',
      'number'     => 6,
      'orderby'    => 'count',
      'order'      => 'DESC',
      'hide_empty' => false,
      'parent'     => 0,
    ]);

    if ( ! is_wp_error( $categories ) && $categories ) : ?>
      <div class="grid grid-cols-1 gap-4 md:gap-[24px] md:grid-cols-3 md:p-0 mx-auto w-full md:w-[95%]">
        <?php foreach ( $categories as $cat ) :
          $image_url = get_term_meta( $cat->term_id, 'produkcija_category_image', true );
          $link      = get_term_link( $cat );
          ?>
          <a href="<?php echo esc_url( $link ); ?>" class="flex items-center justify-between max-w-[100%] md:max-w-[410px] border-gray-200 rounded-[16px] bg-white p-[16px] md:pb-[32px] shadow-sm hover:shadow-md transition">
            <div class="flex w-full gap-4 md:flex-col productions md:gap-[24px]">
              <div class="rounded-[8px] flex justify-center items-center bg-[#f7f7f7] w-1/2 h-[96px] md:h-[180px] p-2 md:py-4 md:px-7 max-w-1/3 md:max-w-full md:w-full">
                <?php if ( $image_url ) : ?>
                  <img class="w-auto object-contain h-full" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>">
                <?php endif; ?>
              </div>
              <div class="flex items-center justify-between w-full">
                <h3 class="text-[18px] text-black" style="font-weight:400;"><?php echo esc_html( $cat->name ); ?></h3>
                <div class="flex items-center justify-center min-w-[48px] min-h-[48px] md:w-12 md:h-12 text-black rounded-[16px] bg-yellow">
                  <?php echo file_get_contents( LANGU_THEME_URI . "/assets/icons/arrow-right.svg" ); ?>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </section>
</div>


<!-- Paslaugos section -->
<div class="w-full bg-white">
  <section class="px-0 py-10 md:py-20 mx-auto max-w-[1440px] md:px-20">
    <div class="grid grid-cols-2 px-4 mb-2 md:mb-10 md:p-0">
      <div class="col-span-2 mb-4 md:col-span-1 md:mb-0">
        <h2 class="text-[40px] text-black">Paslaugos</h2>
      </div>
      <div class="col-span-2 text-black md:col-span-1">
        <div class="font-degular-var leading-[26px] font-[400] text-[18px]">
          <?php
            $descs = get_option( 'cp_cpt_archive_descriptions', [] );
            $full = $descs['paslaugos'] ?? '';
          ?>
          <?php echo wp_kses_post( $full ); ?>
        </div>
      </div>
    </div>

    <?php
      $args = [
        'post_type'      => 'paslaugos',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
      ];

      $query = new WP_Query( $args );

      if ( $query->have_posts() ) : ?>
        <div class="grid grid-cols-1 gap-4 md:gap-6 p-4 md:grid-cols-3 md:p-0 mx-auto  w-[95%]">
          <?php while ( $query->have_posts() ) : $query->the_post();
            $icon = esc_url( get_post_meta( get_the_ID(), 'cp_paslaugos_icon', true ) );
            $title = get_the_title();
            $url   = get_permalink();
          ?>
            <a href="<?php echo $url; ?>" class="flex items-center justify-between gap-4 border-gray-200 rounded-[16px] bg-[#F7F7F7] px-4 py-8 shadow-sm">
             <div class="flex items-center justify-start gap-4">
             <?php if ( $icon ) : ?>
                <img class="object-contain w-[12%] mx-[8px] m-auto md:w-8 h-8" src="<?php echo $icon; ?>" alt="<?php echo esc_attr( $title ); ?>">
              <?php endif; ?>
              <span class="font-medium text-black text-[16px] md:text-[18px] font-erbaum-regular"><?php echo esc_html( $title ); ?></span>
             </div>
              <div class="flex items-center justify-center min-w-[48px] min-h-[48px] w-12 h-12 text-black rounded-[16px] bg-yellow">
                <!-- Arrow SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M20.7806 12.531L14.0306 19.281C13.8899 19.4218 13.699 19.5008 13.5 19.5008C13.301 19.5008 13.1101 19.4218 12.9694 19.281C12.8286 19.1403 12.7496 18.9494 12.7496 18.7504C12.7496 18.5514 12.8286 18.3605 12.9694 18.2198L18.4397 12.7504H3.75C3.55109 12.7504 3.36032 12.6714 3.21967 12.5307C3.07902 12.3901 3 12.1993 3 12.0004C3 11.8015 3.07902 11.6107 3.21967 11.4701C3.36032 11.3294 3.55109 11.2504 3.75 11.2504H18.4397L12.9694 5.78104C12.8286 5.64031 12.7496 5.44944 12.7496 5.25042C12.7496 5.05139 12.8286 4.86052 12.9694 4.71979C13.1101 4.57906 13.301 4.5 13.5 4.5C13.699 4.5 13.8899 4.57906 14.0306 4.71979L20.7806 11.4698C20.8504 11.5394 20.9057 11.6222 20.9434 11.7132C20.9812 11.8043 21.0006 11.9019 21.0006 12.0004C21.0006 12.099 20.9812 12.1966 20.9434 12.2876C20.9057 12.3787 20.8504 12.4614 20.7806 12.531Z" fill="black"/>
                </svg>
              </div>
            </a>
          <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>


  </section>

</div>

<?php
function add_drutex_url( $text ) {
    return str_ireplace(
        'Drutex',
        '<a class="font-normal underline" href="https://www.drutex.eu/" target="_blank" rel="noopener noreferrer" style="font-family: \'DegularVariable\', sans-serif !important;">Drutex</a>',
        $text
    );
}
?>

<!--fourth section -->
<section class="relative px-4 py-10 md:p-20 overflow-hidden text-white bg-black">
  <div style="transform: rotateZ(60deg);" class="absolute block border-[#FFCC32] border-[5px] rounded-[32px] md:rounded-[45px] w-48 h-48 top-[0%] right-[-10%]
         md:w-64 md:h-64 md:top-[8%] md:right-[-2%]
         md:border-[7px] z-[99]"></div>

  <div class="relative grid grid-cols-1 gap-5 md:gap-12 px-0 mx-auto md:gap-16 max-w-[1440px] md:grid-cols-2">
    <div class="flex flex-col w-full md:w-[82%] gap-6 md:gap-8 max-w-[1440px] md:w-full justify-start order-2 md:order-1 degular">
      <h2 class="text-[28px] text-white md:text-[40px] font-erbaum-regular leading-8 leading-12">
        Kodėl verta rinktis mus?
      </h2>

      <?php
        $why_items = json_decode( get_theme_mod('home_why_items','[]'), true );
        $why_items = array_slice( (array) $why_items, 0, 4 );
        $why_items_sanitized = [];
        foreach ( $why_items as $item ) {
            $why_items_sanitized[] = [
                'heading'     => sanitize_text_field( $item['heading'] ?? '' ),
                'description' => sanitize_textarea_field( $item['description'] ?? '' ),
            ];
        }

        ?>
        <div class="space-y-6 leading-relaxed text-gray-200">

          <div class="flex flex-col gap-4 md:flex-row">
            <?php
            if ( ! empty( $why_items_sanitized[0]['heading'] ) || ! empty( $why_items_sanitized[0]['description'] ) ) : ?>
              <div class="w-full flex flex-col gap-1">
              <div class="flex items-center md:items-start md:flex-col justify-start gap-2 md:gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                    d="M27 8H22C22 6.4087 21.3679 4.88258 20.2426 3.75736C19.1174 2.63214 17.5913 2 16 2C14.4087 2 12.8826 2.63214 11.7574 3.75736C10.6321 4.88258 10 6.4087 10 8H5C4.46957 8 3.96086 8.21071 3.58579 8.58579C3.21071 8.96086 3 9.46957 3 10V25C3 25.5304 3.21071 26.0391 3.58579 26.4142C3.96086 26.7893 4.46957 27 5 27H27C27.5304 27 28.0391 26.7893 28.4142 26.4142C28.7893 26.0391 29 25.5304 29 25V10C29 9.46957 28.7893 8.96086 28.4142 8.58579C28.0391 8.21071 27.5304 8 27 8ZM16 4C17.0609 4 18.0783 4.42143 18.8284 5.17157C19.5786 5.92172 20 6.93913 20 8H12C12 6.93913 12.4214 5.92172 13.1716 5.17157C13.9217 4.42143 14.9391 4 16 4ZM27 25H5V10H10V12C10 12.2652 10.1054 12.5196 10.2929 12.7071C10.4804 12.8946 10.7348 13 11 13C11.2652 13 11.5196 12.8946 11.7071 12.7071C11.8946 12.5196 12 12.2652 12 12V10H20V12C20 12.2652 20.1054 12.5196 20.2929 12.7071C20.4804 12.8946 20.7348 13 21 13C21.2652 13 21.5196 12.8946 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12V10H27V25Z"
                    fill="white" />
                </svg>

                <?php if ( ! empty( $why_items_sanitized[0]['heading'] ) ) : ?>
                  <h3 class="text-white text-[16px] md:text-[18px] degular">
                    <?php echo esc_html( $why_items_sanitized[0]['heading'] ); ?>
                  </h3>
                <?php endif; ?>
                </div>

                <?php if ( ! empty( $why_items_sanitized[0]['description'] ) ) : ?>
                  <p class="font-degular-var text-[#BEBEBE] text-[18px] leading-[26px]">
                    <?php echo add_drutex_url( $why_items_sanitized[0]['description'] ); ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php
            if ( ! empty( $why_items_sanitized[1]['heading'] ) || ! empty( $why_items_sanitized[1]['description'] ) ) : ?>
              <div class="w-full flex flex-col gap-1">
              <div class="flex items-center md:items-start md:flex-col justify-start gap-2 md:gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                    d="M28.2325 12.8525C27.7612 12.36 27.2738 11.8525 27.09 11.4062C26.92 10.9975 26.91 10.32 26.9 9.66375C26.8813 8.44375 26.8612 7.06125 25.9 6.1C24.9387 5.13875 23.5562 5.11875 22.3363 5.1C21.68 5.09 21.0025 5.08 20.5938 4.91C20.1488 4.72625 19.64 4.23875 19.1475 3.7675C18.285 2.93875 17.305 2 16 2C14.695 2 13.7162 2.93875 12.8525 3.7675C12.36 4.23875 11.8525 4.72625 11.4062 4.91C11 5.08 10.32 5.09 9.66375 5.1C8.44375 5.11875 7.06125 5.13875 6.1 6.1C5.13875 7.06125 5.125 8.44375 5.1 9.66375C5.09 10.32 5.08 10.9975 4.91 11.4062C4.72625 11.8512 4.23875 12.36 3.7675 12.8525C2.93875 13.715 2 14.695 2 16C2 17.305 2.93875 18.2837 3.7675 19.1475C4.23875 19.64 4.72625 20.1475 4.91 20.5938C5.08 21.0025 5.09 21.68 5.1 22.3363C5.11875 23.5562 5.13875 24.9387 6.1 25.9C7.06125 26.8612 8.44375 26.8813 9.66375 26.9C10.32 26.91 10.9975 26.92 11.4062 27.09C11.8512 27.2738 12.36 27.7612 12.8525 28.2325C13.715 29.0613 14.695 30 16 30C17.305 30 18.2837 29.0613 19.1475 28.2325C19.64 27.7612 20.1475 27.2738 20.5938 27.09C21.0025 26.92 21.68 26.91 22.3363 26.9C23.5562 26.8813 24.9387 26.8612 25.9 25.9C26.8612 24.9387 26.8813 23.5562 26.9 22.3363C26.91 21.68 26.92 21.0025 27.09 20.5938C27.2738 20.1488 27.7612 19.64 28.2325 19.1475C29.0613 18.285 30 17.305 30 16C30 14.695 29.0613 13.7162 28.2325 12.8525ZM26.7887 17.7638C26.19 18.3888 25.57 19.035 25.2412 19.8288C24.9262 20.5913 24.9125 21.4625 24.9 22.3062C24.8875 23.1812 24.8738 24.0975 24.485 24.485C24.0963 24.8725 23.1862 24.8875 22.3062 24.9C21.4625 24.9125 20.5913 24.9262 19.8288 25.2412C19.035 25.57 18.3888 26.19 17.7638 26.7887C17.1388 27.3875 16.5 28 16 28C15.5 28 14.8562 27.385 14.2362 26.7887C13.6163 26.1925 12.965 25.57 12.1713 25.2412C11.4088 24.9262 10.5375 24.9125 9.69375 24.9C8.81875 24.8875 7.9025 24.8738 7.515 24.485C7.1275 24.0963 7.1125 23.1862 7.1 22.3062C7.0875 21.4625 7.07375 20.5913 6.75875 19.8288C6.43 19.035 5.81 18.3888 5.21125 17.7638C4.6125 17.1388 4 16.5 4 16C4 15.5 4.615 14.8562 5.21125 14.2362C5.8075 13.6163 6.43 12.965 6.75875 12.1713C7.07375 11.4088 7.0875 10.5375 7.1 9.69375C7.1125 8.81875 7.12625 7.9025 7.515 7.515C7.90375 7.1275 8.81375 7.1125 9.69375 7.1C10.5375 7.0875 11.4088 7.07375 12.1713 6.75875C12.965 6.43 13.6112 5.81 14.2362 5.21125C14.8612 4.6125 15.5 4 16 4C16.5 4 17.1438 4.615 17.7638 5.21125C18.3838 5.8075 19.035 6.43 19.8288 6.75875C20.5913 7.07375 21.4625 7.0875 22.3062 7.1C23.1812 7.1125 24.0975 7.12625 24.485 7.515C24.8725 7.90375 24.8875 8.81375 24.9 9.69375C24.9125 10.5375 24.9262 11.4088 25.2412 12.1713C25.57 12.965 26.19 13.6112 26.7887 14.2362C27.3875 14.8612 28 15.5 28 16C28 16.5 27.385 17.1438 26.7887 17.7638ZM21.7075 12.2925C21.8005 12.3854 21.8742 12.4957 21.9246 12.6171C21.9749 12.7385 22.0008 12.8686 22.0008 13C22.0008 13.1314 21.9749 13.2615 21.9246 13.3829C21.8742 13.5043 21.8005 13.6146 21.7075 13.7075L14.7075 20.7075C14.6146 20.8005 14.5043 20.8742 14.3829 20.9246C14.2615 20.9749 14.1314 21.0008 14 21.0008C13.8686 21.0008 13.7385 20.9749 13.6171 20.9246C13.4957 20.8742 13.3854 20.8005 13.2925 20.7075L10.2925 17.7075C10.1049 17.5199 9.99944 17.2654 9.99944 17C9.99944 16.7346 10.1049 16.4801 10.2925 16.2925C10.4801 16.1049 10.7346 15.9994 11 15.9994C11.2654 15.9994 11.5199 16.1049 11.7075 16.2925L14 18.5863L20.2925 12.2925C20.3854 12.1995 20.4957 12.1258 20.6171 12.0754C20.7385 12.0251 20.8686 11.9992 21 11.9992C21.1314 11.9992 21.2615 12.0251 21.3829 12.0754C21.5043 12.1258 21.6146 12.1995 21.7075 12.2925Z"
                    fill="white" />
                </svg>

                <?php if ( ! empty( $why_items_sanitized[1]['heading'] ) ) : ?>
                  <h3 class="text-white text-[16px] md:text-[18px] font-bold font-degular-var">
                    <?php echo esc_html( $why_items_sanitized[1]['heading'] ); ?>
                  </h3>
                <?php endif; ?>
                </div>
                <?php if ( ! empty( $why_items_sanitized[1]['description'] ) ) : ?>
                  <p class="font-degular-var text-[#BEBEBE] text-[18px] leading-[26px]">
                    <?php echo add_drutex_url( $why_items_sanitized[1]['description'] ); ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div><!-- /first row -->


          <div class="flex flex-col gap-4 md:flex-row">
            <?php
            // item 2
            if ( ! empty( $why_items_sanitized[2]['heading'] ) || ! empty( $why_items_sanitized[2]['description'] ) ) : ?>
              <div class="w-full flex flex-col gap-1 ">
              <div class="flex items-center md:items-start md:flex-col justify-start gap-2 md:gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                    d="M28.3467 8.62483C28.286 8.4749 28.1899 8.34192 28.0666 8.2373C27.9433 8.13268 27.7964 8.05953 27.6386 8.02413C27.4808 7.98873 27.3167 7.99214 27.1605 8.03406C27.0043 8.07599 26.8606 8.15517 26.7417 8.26483L21.7042 12.9136L19.5505 12.4511L19.088 10.2973L23.7367 5.25983C23.8464 5.14094 23.9255 4.99723 23.9675 4.84103C24.0094 4.68482 24.0128 4.52078 23.9774 4.36296C23.942 4.20515 23.8689 4.05828 23.7642 3.93494C23.6596 3.81161 23.5266 3.71549 23.3767 3.65483C22.0104 3.10212 20.5292 2.89343 19.0634 3.0471C17.5975 3.20077 16.1918 3.71209 14.9698 4.53614C13.7478 5.36019 12.7469 6.47174 12.055 7.77314C11.3631 9.07453 11.0014 10.5259 11.0017 11.9998C11.0001 13.2444 11.2554 14.476 11.7517 15.6173L4.22546 22.1248C4.20671 22.1398 4.18921 22.1573 4.17171 22.1736C3.42148 22.9238 3 23.9413 3 25.0023C3 25.5277 3.10347 26.0479 3.30452 26.5332C3.50556 27.0186 3.80023 27.4596 4.17171 27.8311C4.54318 28.2026 4.98419 28.4972 5.46955 28.6983C5.95491 28.8993 6.47511 29.0028 7.00046 29.0028C8.06144 29.0028 9.07898 28.5813 9.82921 27.8311C9.84546 27.8148 9.86296 27.7961 9.87796 27.7786L16.3842 20.2498C17.7547 20.8514 19.2537 21.1017 20.7453 20.9781C22.237 20.8544 23.6743 20.3607 24.927 19.5416C26.1797 18.7224 27.2084 17.6038 27.9199 16.287C28.6314 14.9701 29.0032 13.4966 29.0017 11.9998C29.0037 10.8431 28.7812 9.69689 28.3467 8.62483ZM20.0017 18.9998C18.818 18.9982 17.654 18.6972 16.618 18.1248C16.4172 18.0139 16.1845 17.9754 15.9587 18.0157C15.733 18.056 15.5279 18.1726 15.378 18.3461L8.39046 26.4386C8.01233 26.7978 7.50883 26.9951 6.98731 26.9885C6.46579 26.9818 5.9675 26.7716 5.5987 26.4028C5.2299 26.034 5.01975 25.5357 5.01308 25.0142C5.0064 24.4927 5.20372 23.9892 5.56296 23.6111L13.6492 16.6248C13.823 16.4748 13.9398 16.2695 13.9801 16.0435C14.0204 15.8174 13.9817 15.5844 13.8705 15.3836C13.233 14.2306 12.9338 12.9212 13.0074 11.6058C13.0809 10.2904 13.5242 9.02248 14.2862 7.94777C15.0482 6.87305 16.098 6.03519 17.3149 5.53051C18.5319 5.02583 19.8665 4.87481 21.1655 5.09483L17.2655 9.32108C17.1569 9.43879 17.0783 9.58084 17.0361 9.73528C16.9939 9.88972 16.9894 10.052 17.023 10.2086L17.7305 13.4998C17.7709 13.6881 17.8649 13.8606 18.001 13.9968C18.1372 14.1329 18.3097 14.2269 18.498 14.2673L21.7917 14.9748C21.9483 15.0084 22.1106 15.0039 22.265 14.9617C22.4194 14.9195 22.5615 14.8408 22.6792 14.7323L26.9055 10.8323C27.0739 11.8361 27.0218 12.8645 26.7525 13.846C26.4833 14.8276 26.0034 15.7387 25.3464 16.516C24.6894 17.2933 23.8709 17.9182 22.9479 18.3471C22.0249 18.7761 21.0195 18.9988 20.0017 18.9998Z"
                    fill="white" />
                </svg>

                <?php if ( ! empty( $why_items_sanitized[2]['heading'] ) ) : ?>
                  <h3 class="text-white mb-1 text-[16px] md:text-[18px] font-bold font-degular-var">
                    <?php echo esc_html( $why_items_sanitized[2]['heading'] ); ?>
                  </h3>
                <?php endif; ?>
                </div>
                <?php if ( ! empty( $why_items_sanitized[2]['description'] ) ) : ?>
                  <p class="font-degular-var text-[#BEBEBE] text-[18px]">
                    <?php echo add_drutex_url( $why_items_sanitized[2]['description'] ); ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php
            if ( ! empty( $why_items_sanitized[3]['heading'] ) || ! empty( $why_items_sanitized[3]['description'] ) ) : ?>
              <div class="w-full flex flex-col gap-1 ">
              <div class="flex items-center md:items-start md:flex-col justify-start gap-2 md:gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path
                    d="M29.8966 12.1573C29.7716 11.773 29.5356 11.4342 29.2184 11.1838C28.9012 10.9333 28.517 10.7823 28.1141 10.7498L20.7391 10.1548L17.8916 3.26858C17.7376 2.89335 17.4755 2.57239 17.1386 2.3465C16.8018 2.12061 16.4053 2 15.9997 2C15.5941 2 15.1977 2.12061 14.8608 2.3465C14.5239 2.57239 14.2619 2.89335 14.1079 3.26858L11.2629 10.1536L3.88411 10.7498C3.48058 10.784 3.09609 10.9364 2.77883 11.1881C2.46156 11.4398 2.22561 11.7795 2.10056 12.1646C1.9755 12.5498 1.9669 12.9633 2.07581 13.3534C2.18473 13.7434 2.40634 14.0927 2.71286 14.3573L8.33786 19.2111L6.62411 26.4686C6.52826 26.8629 6.55173 27.2767 6.69153 27.6577C6.83133 28.0386 7.08116 28.3694 7.40931 28.608C7.73745 28.8467 8.12911 28.9825 8.53458 28.9982C8.94004 29.0139 9.34102 28.9087 9.68661 28.6961L15.9991 24.8111L22.3154 28.6961C22.6611 28.9062 23.0612 29.0093 23.4654 28.9925C23.8696 28.9756 24.2598 28.8396 24.5869 28.6014C24.9139 28.3632 25.1631 28.0336 25.3032 27.6541C25.4433 27.2746 25.468 26.8621 25.3741 26.4686L23.6541 19.2098L29.2791 14.3561C29.5881 14.0919 29.8117 13.7419 29.9217 13.3504C30.0316 12.959 30.0229 12.5438 29.8966 12.1573ZM27.9791 12.8411L21.8916 18.0911C21.7528 18.2107 21.6495 18.3662 21.5931 18.5406C21.5366 18.715 21.5292 18.9015 21.5716 19.0798L23.4316 26.9298C23.4364 26.9406 23.4369 26.9529 23.4329 26.9641C23.429 26.9752 23.4209 26.9844 23.4104 26.9898C23.3879 27.0073 23.3816 27.0036 23.3629 26.9898L16.5229 22.7836C16.3653 22.6867 16.184 22.6355 15.9991 22.6355C15.8142 22.6355 15.6329 22.6867 15.4754 22.7836L8.63536 26.9923C8.61661 27.0036 8.61161 27.0073 8.58786 26.9923C8.57731 26.9869 8.56922 26.9777 8.56527 26.9666C8.56132 26.9554 8.5618 26.9431 8.56661 26.9323L10.4266 19.0823C10.469 18.904 10.4616 18.7175 10.4051 18.5431C10.3487 18.3687 10.2454 18.2132 10.1066 18.0936L4.01911 12.8436C4.00411 12.8311 3.99036 12.8198 4.00286 12.7811C4.01536 12.7423 4.02536 12.7473 4.04411 12.7448L12.0341 12.0998C12.2174 12.0841 12.3927 12.0181 12.5409 11.9092C12.6891 11.8003 12.8044 11.6526 12.8741 11.4823L15.9516 4.03108C15.9616 4.00983 15.9654 3.99983 15.9954 3.99983C16.0254 3.99983 16.0291 4.00983 16.0391 4.03108L19.1241 11.4823C19.1944 11.6526 19.3105 11.8002 19.4593 11.9087C19.6082 12.0172 19.7842 12.0825 19.9679 12.0973L27.9579 12.7423C27.9766 12.7423 27.9879 12.7423 27.9991 12.7786C28.0104 12.8148 27.9991 12.8286 27.9791 12.8411Z"
                    fill="white" />
                </svg>

                <?php if ( ! empty( $why_items_sanitized[3]['heading'] ) ) : ?>
                  <h3 class="text-white mb-1 text-[16px] md:text-[18px] font-bold font-degular-var">
                    <?php echo esc_html( $why_items_sanitized[3]['heading'] ); ?>
                  </h3>
                <?php endif; ?>
                </div>
                <?php if ( ! empty( $why_items_sanitized[3]['description'] ) ) : ?>
                  <p class="font-degular-var text-[#BEBEBE] md:text-[18px]">
                    <?php echo add_drutex_url( $why_items_sanitized[3]['description'] ); ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div><!-- /second row -->

        </div><!-- /outer container -->


      <div class="flex flex-col md:flex-row gap-4 mt-[-8px] md:mt-0">
        <a href="/produkcija-categories"
          class="block w-full md:w-[220px] text-center px-2 md:px-6 py-3 font-semibold text-black transition rounded-[16px] shadow bg-white">
          Žiūrėti produkciją
        </a>
        <a href="/kontaktai"
          class="block w-full md:w-[220px] text-center px-2 md:px-6 py-3 font-semibold text-black transition rounded-[16px] shadow bg-yellow">
          <!-- Susisiekti -->
          Susisiekti
        </a>
      </div>
    </div>

    <!-- Right Column: Image -->
    <div class="flex items-start justify-start order-1 md:order-2">
      <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/icons/girl.png'); ?>"
        alt="Woman installing blinds"
        class="object-cover w-full rounded-xl shadow-lg md:w-[560px] h-[440px] md:h-[660px]" />
    </div>
  </div>

</section>

 <section class="md:gap-12 gap-2 flex flex-col bg-white items-center py-10 px-4 md:p-20" >
    <div class="flex flex-col flex-grow text-black gap-2 md:gap-4">
      <h2 class="text-[28px] leading-8 md:leading-[48px] md:text-[40px] text-center">
      Pamatykite mūsų darbo kokybę iš arti.
      </h2>
      <p class="leading-6 md:leading-6.5 text-[16px] md:text-[18px] text-center">
        Peržiūrėkite mūsų atliktus projektus ir įsitikinkite aukšta kokybe bei profesionalumu.
      </p>
    </div>

  <div class="w-full flex flex-col items-center justify-end">
    <a
      href="/atlikti-darbai"
      class="px-4 py-3 bg-[#FFCC32] w-full md:w-[220px] w-full text-black text-center rounded-[16px] hover:bg-[#FFCC32]"
    >
    Atlikti darbai
    </a>
  </div>
 </section>

<!--Atsiliepimai section -->
<section class=" bg-[#F6F6F6] py-10 md:py-20 px-4 md:px-10">
  <div class="mx-auto max-w-[1440px]">
    <div class="text-center">
      <h2 class="text-4xl text-black font-erbaum-regular">
        Atsiliepimai
      </h2>
        <?php
          $descs = get_option( 'cp_cpt_archive_descriptions', [] );
          $full = $descs['atsiliepimai'] ?? '';
        ?>
        <div class="text-black text-base md:text-lg degular-light text-[18px] py-[12px]">
          <?php echo wp_kses_post( $full); ?>
        </div>
    </div>

    <div class="flex items-center justify-center gap-4 mb-8 md:space-y-0 md:space-x-2 flex-row">
      <div class="flex -space-x-4">
        <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white mr-0 object-cover"
          src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f4.jpeg'); ?>" alt="User 1" />
        <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
          src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f2.jpeg'); ?>" alt="User 2" />
        <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
          src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f3.jpeg'); ?>" alt="User 3" />
        <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover "
          src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f1.jpg'); ?>" alt="User 4" />
        <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
          src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f5.jpeg'); ?>" alt="User 5" />
      </div>

      <!-- Rating -->
      <div class="flex justify-center gap-2  ">
        <div class="flex items-center md:space-x-2 ">
          <!-- Star icon: replace with your own if desired -->
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path
              d="M29.8966 12.1573C29.7716 11.773 29.5356 11.4342 29.2184 11.1838C28.9012 10.9333 28.517 10.7823 28.1141 10.7498L20.7391 10.1548L17.8916 3.26858C17.7376 2.89335 17.4755 2.57239 17.1386 2.3465C16.8018 2.12061 16.4053 2 15.9997 2C15.5941 2 15.1977 2.12061 14.8608 2.3465C14.5239 2.57239 14.2619 2.89335 14.1079 3.26858L11.2629 10.1536L3.88411 10.7498C3.48058 10.784 3.09609 10.9364 2.77883 11.1881C2.46156 11.4398 2.22561 11.7795 2.10056 12.1646C1.9755 12.5498 1.9669 12.9633 2.07581 13.3534C2.18473 13.7434 2.40634 14.0927 2.71286 14.3573L8.33786 19.2111L6.62411 26.4686C6.52826 26.8629 6.55173 27.2767 6.69153 27.6577C6.83133 28.0386 7.08116 28.3694 7.40931 28.608C7.73745 28.8467 8.12912 28.9825 8.53458 28.9982C8.94004 29.0139 9.34102 28.9087 9.68661 28.6961L15.9991 24.8111L22.3154 28.6961C22.6611 28.9062 23.0612 29.0093 23.4654 28.9925C23.8696 28.9756 24.2598 28.8395 24.5869 28.6014C24.9139 28.3632 25.1631 28.0336 25.3032 27.6541C25.4433 27.2746 25.468 26.8621 25.3741 26.4686L23.6541 19.2098L29.2791 14.3561C29.5881 14.0919 29.8117 13.7419 29.9217 13.3504C30.0316 12.959 30.0229 12.5438 29.8966 12.1573Z"
              fill="#FFCC32" />
          </svg>
        </div>

        <!-- Rating Subtitle -->
        <div class="flex flex-col">
          <span class="text-[24px] text-black font-erbaum-regular"><?php echo esc_html(get_theme_mod('topbar_rating')); ?> IŠ 5</span>
          <p class="text-sm text-black degular">Klientų įvertinimas</p>
        </div>
      </div>
    </div>

    <!-- Testimonial Cards -->
    <?php
      $testimonials = new WP_Query([
        'post_type'      => 'atsiliepimai',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
      ]);

      if ( $testimonials->have_posts() ) : ?>
        <div class="md:w-[1280px] mx-auto grid grid-cols-1 gap-4 md:gap-6 md:grid-cols-3 degular-light">
          <?php while ( $testimonials->have_posts() ) : $testimonials->the_post();
            $feedback = get_post_meta( get_the_ID(), 'cp_atsiliepimai_feedback', true );
            $name     = get_post_meta( get_the_ID(), 'cp_atsiliepimai_name', true );
          ?>
            <div class="md:w-[410px] p-4 md:p-6 bg-white rounded-lg shadow-sm">
              <?php if ( $feedback ) : ?>
                <p class="text-black text-[14px] mb-4">
                  <?php echo esc_html( $feedback ); ?>
                </p>
              <?php endif; ?>

              <?php if ( $name ) : ?>
                <p class="text-black font-bold text-[14px]">
                  <?php echo esc_html( $name ); ?>
                </p>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>


    <!-- Button -->
    <div class="flex justify-center mt-8">
      <a href="/atsiliepimai" class="inline-block bg-black text-white rounded-[16px] px-8 py-3 font-semibold
                hover:bg-gray-800 transition-colors w-full md:w-[220px] text-center">
        Daugiau atsiliepimų
      </a>
    </div>
  </div>
</section>

<!--//last section-->
<section class="relative overflow-hidden bg-[#161515] text-white pt-10 md:pt-16 pb-6 md:pb-32 px-1 md:px-2">
  <?php
  $intro = (string) get_theme_mod( 'home_social_text', '' );;

  $fb  = get_theme_mod( 'home_social_facebook' );
  $insta = get_theme_mod( 'home_social_instagram' );
  ?>
  <div class="mx-auto max-w-[1440px]">
    <!-- 1) MOBILE LAYOUT (block by default, hidden on md+) -->
    <div class="block text-center md:hidden">
      <h2 class="text-[38px] mx-[8px] md:mx-auto mb-6 leading-[42px]">
      <?php echo wp_kses_post( nl2br( $intro ) ); ?>
      </h2>
      <div class="flex justify-center mb-14 space-x-2.5">
        <a href="<?php echo esc_url( $fb ); ?>"
          class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
          aria-label="Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
              d="M20 10.0801C20 4.55723 15.5229 0.0800781 10 0.0800781C4.47715 0.0800781 0 4.55723 0 10.0801C0 15.0713 3.65684 19.2084 8.4375 19.9586V12.9707H5.89844V10.0801H8.4375V7.87695C8.4375 5.3707 9.93047 3.98633 12.2147 3.98633C13.3084 3.98633 14.4531 4.18164 14.4531 4.18164V6.64258H13.1922C11.95 6.64258 11.5625 7.41348 11.5625 8.20508V10.0801H14.3359L13.8926 12.9707H11.5625V19.9586C16.3432 19.2084 20 15.0713 20 10.0801Z"
              fill="black" />
          </svg>
        </a>
        <a href="<?php echo esc_url( $insta ); ?>"
          class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
          aria-label="Instagram">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path
              d="M12.0059 3.88191C14.6793 3.88191 14.9959 3.89364 16.0473 3.94054C17.0244 3.98354 17.5521 4.1477 17.9038 4.28449C18.369 4.46429 18.7051 4.68317 19.053 5.03103C19.4047 5.38279 19.6197 5.71502 19.7995 6.18014C19.9363 6.53191 20.1004 7.06347 20.1434 8.03669C20.1903 9.092 20.2021 9.40859 20.2021 12.0781C20.2021 14.7516 20.1903 15.0682 20.1434 16.1196C20.1004 17.0967 19.9363 17.6243 19.7995 17.9761C19.6197 18.4412 19.4008 18.7774 19.053 19.1252C18.7012 19.477 18.369 19.692 17.9038 19.8718C17.5521 20.0086 17.0205 20.1727 16.0473 20.2157C14.992 20.2626 14.6754 20.2743 12.0059 20.2743C9.33242 20.2743 9.01583 20.2626 7.96443 20.2157C6.9873 20.1727 6.45964 20.0086 6.10788 19.8718C5.64276 19.692 5.30662 19.4731 4.95876 19.1252C4.607 18.7735 4.39203 18.4412 4.21223 17.9761C4.07543 17.6243 3.91128 17.0928 3.86828 16.1196C3.82138 15.0642 3.80965 14.7477 3.80965 12.0781C3.80965 9.40468 3.82138 9.08809 3.86828 8.03669C3.91128 7.05956 4.07543 6.53191 4.21223 6.18014C4.39203 5.71502 4.6109 5.37889 4.95876 5.03103C5.31053 4.67926 5.64276 4.46429 6.10788 4.28449C6.45964 4.1477 6.99121 3.98354 7.96443 3.94054C9.01583 3.89364 9.33242 3.88191 12.0059 3.88191ZM12.0059 2.08008C9.28943 2.08008 8.94938 2.0918 7.88235 2.13871C6.81923 2.18561 6.08833 2.35758 5.45515 2.60382C4.79461 2.86179 4.23569 3.20183 3.68067 3.76075C3.12175 4.31576 2.78171 4.87468 2.52374 5.53132C2.27751 6.16841 2.10553 6.8954 2.05863 7.95852C2.01173 9.02946 2 9.3695 2 12.0859C2 14.8024 2.01173 15.1424 2.05863 16.2094C2.10553 17.2726 2.27751 18.0035 2.52374 18.6367C2.78171 19.2972 3.12175 19.8561 3.68067 20.4111C4.23569 20.9661 4.79461 21.3101 5.45124 21.5641C6.08833 21.8104 6.81532 21.9824 7.87844 22.0293C8.94548 22.0762 9.28552 22.0879 12.002 22.0879C14.7184 22.0879 15.0584 22.0762 16.1255 22.0293C17.1886 21.9824 17.9195 21.8104 18.5527 21.5641C19.2093 21.3101 19.7682 20.9661 20.3232 20.4111C20.8782 19.8561 21.2222 19.2972 21.4763 18.6406C21.7225 18.0035 21.8945 17.2765 21.9414 16.2134C21.9883 15.1463 22 14.8063 22 12.0898C22 9.37341 21.9883 9.03337 21.9414 7.96634C21.8945 6.90322 21.7225 6.17232 21.4763 5.53914C21.23 4.87468 20.89 4.31576 20.3311 3.76075C19.776 3.20574 19.2171 2.86179 18.5605 2.60773C17.9234 2.36149 17.1964 2.18952 16.1333 2.14261C15.0623 2.0918 14.7223 2.08008 12.0059 2.08008Z"
              fill="black" />
            <path
              d="M12.0069 6.94531C9.16932 6.94531 6.86719 9.24744 6.86719 12.085C6.86719 14.9226 9.16932 17.2248 12.0069 17.2248C14.8445 17.2248 17.1466 14.9226 17.1466 12.085C17.1466 9.24744 14.8445 6.94531 12.0069 6.94531ZM12.0069 15.419C10.166 15.419 8.67293 13.926 8.67293 12.085C8.67293 10.2441 10.166 8.75106 12.0069 8.75106C13.8478 8.75106 15.3409 10.2441 15.3409 12.085C15.3409 13.926 13.8478 15.419 12.0069 15.419Z"
              fill="black" />
            <path
              d="M18.5483 6.74289C18.5483 7.40734 18.0089 7.94281 17.3484 7.94281C16.6839 7.94281 16.1484 7.40344 16.1484 6.74289C16.1484 6.07844 16.6878 5.54297 17.3484 5.54297C18.0089 5.54297 18.5483 6.08235 18.5483 6.74289Z"
              fill="black" />
          </svg>
        </a>
      </div>

      <div class="grid grid-cols-2 mb-5 md:mb-0 gap-4 place-items-center w-full max-w-[340px] mx-auto relative h-[350px]">
        <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136502.png'); ?>"
          alt="Window 1" class="absolute top-0 left-6 rounded-[16px] shadow-xl object-cover w-[156px] h-[191px]" />
        <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136504.png'); ?>"
          alt="Window 2"
          class="absolute top-1 right-2 self-end rounded-[16px] shadow-xl object-cover w-[130px] h-[137px]" />
        <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136505.png'); ?>"
          alt="Window 3"
          class="absolute bottom-5 left-0 self-start rounded-[16px] shadow-xl object-cover w-[137px] h-[119px]" />
        <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136503.png'); ?>"
          alt="Window 4" class="absolute bottom-1 right-10 rounded-[16px] shadow-xl object-cover w-[145px] h-[183px]" />
      </div>
    </div>

    <!-- 2) DESKTOP LAYOUT (hidden on mobile, visible on md+) -->
    <div class="items-center hidden grid-cols-3 text-center md:grid">
      <div class="relative min-h-[450px] left-[-40px]">
        <div class="absolute top-0 left-[50px]">
          <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136502.png'); ?>"
            alt="Window 1" class="object-cover w-56 rounded-lg shadow-xl" />
        </div>
        <div class="absolute bottom-[-7%] right-[10%]">
          <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136503.png'); ?>"
            alt="Window 2" class="object-cover rounded-lg shadow-xl w-52" />
        </div>
      </div>

      <!-- Middle: Heading + Social -->
      <div class="w-full md:w-[500px]">
        <h2 class="text-[48px] w-[500px] leading-[56px] mb-8 max-w-[600px] font-erbaum text-white">
         <?php echo wp_kses_post( nl2br( $intro ) ); ?> 
        </h2>
        <div class="flex justify-center mb-8 space-x-2">
          <!-- Facebook -->
          <a href="<?php echo esc_url( $fb ); ?>"
            class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
            aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path
                d="M20 10.0801C20 4.55723 15.5229 0.0800781 10 0.0800781C4.47715 0.0800781 0 4.55723 0 10.0801C0 15.0713 3.65684 19.2084 8.4375 19.9586V12.9707H5.89844V10.0801H8.4375V7.87695C8.4375 5.3707 9.93047 3.98633 12.2147 3.98633C13.3084 3.98633 14.4531 4.18164 14.4531 4.18164V6.64258H13.1922C11.95 6.64258 11.5625 7.41348 11.5625 8.20508V10.0801H14.3359L13.8926 12.9707H11.5625V19.9586C16.3432 19.2084 20 15.0713 20 10.0801Z"
                fill="black" />
            </svg>
          </a>
          <!-- Instagram -->
          <a href="<?php echo esc_url( $insta ); ?>"
            class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
            aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
              <path
                d="M12.0059 3.88191C14.6793 3.88191 14.9959 3.89364 16.0473 3.94054C17.0244 3.98354 17.5521 4.1477 17.9038 4.28449C18.369 4.46429 18.7051 4.68317 19.053 5.03103C19.4047 5.38279 19.6197 5.71502 19.7995 6.18014C19.9363 6.53191 20.1004 7.06347 20.1434 8.03669C20.1903 9.092 20.2021 9.40859 20.2021 12.0781C20.2021 14.7516 20.1903 15.0682 20.1434 16.1196C20.1004 17.0967 19.9363 17.6243 19.7995 17.9761C19.6197 18.4412 19.4008 18.7774 19.053 19.1252C18.7012 19.477 18.369 19.692 17.9038 19.8718C17.5521 20.0086 17.0205 20.1727 16.0473 20.2157C14.992 20.2626 14.6754 20.2743 12.0059 20.2743C9.33242 20.2743 9.01583 20.2626 7.96443 20.2157C6.9873 20.1727 6.45964 20.0086 6.10788 19.8718C5.64276 19.692 5.30662 19.4731 4.95876 19.1252C4.607 18.7735 4.39203 18.4412 4.21223 17.9761C4.07543 17.6243 3.91128 17.0928 3.86828 16.1196C3.82138 15.0642 3.80965 14.7477 3.80965 12.0781C3.80965 9.40468 3.82138 9.08809 3.86828 8.03669C3.91128 7.05956 4.07543 6.53191 4.21223 6.18014C4.39203 5.71502 4.6109 5.37889 4.95876 5.03103C5.31053 4.67926 5.64276 4.46429 6.10788 4.28449C6.45964 4.1477 6.99121 3.98354 7.96443 3.94054C9.01583 3.89364 9.33242 3.88191 12.0059 3.88191ZM12.0059 2.08008C9.28943 2.08008 8.94938 2.0918 7.88235 2.13871C6.81923 2.18561 6.08833 2.35758 5.45515 2.60382C4.79461 2.86179 4.23569 3.20183 3.68067 3.76075C3.12175 4.31576 2.78171 4.87468 2.52374 5.53132C2.27751 6.16841 2.10553 6.8954 2.05863 7.95852C2.01173 9.02946 2 9.3695 2 12.0859C2 14.8024 2.01173 15.1424 2.05863 16.2094C2.10553 17.2726 2.27751 18.0035 2.52374 18.6367C2.78171 19.2972 3.12175 19.8561 3.68067 20.4111C4.23569 20.9661 4.79461 21.3101 5.45124 21.5641C6.08833 21.8104 6.81532 21.9824 7.87844 22.0293C8.94548 22.0762 9.28552 22.0879 12.002 22.0879C14.7184 22.0879 15.0584 22.0762 16.1255 22.0293C17.1886 21.9824 17.9195 21.8104 18.5527 21.5641C19.2093 21.3101 19.7682 20.9661 20.3232 20.4111C20.8782 19.8561 21.2222 19.2972 21.4763 18.6406C21.7225 18.0035 21.8945 17.2765 21.9414 16.2134C21.9883 15.1463 22 14.8063 22 12.0898C22 9.37341 21.9883 9.03337 21.9414 7.96634C21.8945 6.90322 21.7225 6.17232 21.4763 5.53914C21.23 4.87468 20.89 4.31576 20.3311 3.76075C19.776 3.20574 19.2171 2.86179 18.5605 2.60773C17.9234 2.36149 17.1964 2.18952 16.1333 2.14261C15.0623 2.0918 14.7223 2.08008 12.0059 2.08008Z"
                fill="black" />
              <path
                d="M12.0069 6.94531C9.16932 6.94531 6.86719 9.24744 6.86719 12.085C6.86719 14.9226 9.16932 17.2248 12.0069 17.2248C14.8445 17.2248 17.1466 14.9226 17.1466 12.085C17.1466 9.24744 14.8445 6.94531 12.0069 6.94531ZM12.0069 15.419C10.166 15.419 8.67293 13.926 8.67293 12.085C8.67293 10.2441 10.166 8.75106 12.0069 8.75106C13.8478 8.75106 15.3409 10.2441 15.3409 12.085C15.3409 13.926 13.8478 15.419 12.0069 15.419Z"
                fill="black" />
              <path
                d="M18.5483 6.74289C18.5483 7.40734 18.0089 7.94281 17.3484 7.94281C16.6839 7.94281 16.1484 7.40344 16.1484 6.74289C16.1484 6.07844 16.6878 5.54297 17.3484 5.54297C18.0089 5.54297 18.5483 6.08235 18.5483 6.74289Z"
                fill="black" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Right Images -->
      <div class="relative min-h-[450px] right-[-14%]">
        <div class="absolute top-0 right-[70px]">
          <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136504.png'); ?>"
            alt="Window 3" class="object-cover rounded-lg shadow-xl w-52" />
        </div>
        <div class="absolute bottom-[-8%] left-[20%]">
          <img src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/Frame 1214136505.png'); ?>"
            alt="Window 4" class="object-cover rounded-lg shadow-xl w-44" />
        </div>
      </div>
    </div>
  </div>

  <!-- Decorative Shapes -->
  <!-- Remove "hidden md:block" so they appear on all devices -->
  <!-- Use smaller sizes/positions at base, then bigger at md+. Adjust as needed. -->
  <div style="transform: rotateZ(60deg);" class="absolute block border-[#FFCC32] border-[5px] rounded-[32px] md:rounded-[45px] w-32 h-32 top-[50%] left-[-10%]
         md:w-64 md:h-64 md:top-[42%] md:left-[-7%]
         md:border-[7px]"></div>

  <div style="transform: rotateZ(60deg);" class="absolute block border-[#FFCC32] border-[5px] rounded-[32px] md:rounded-[45px] w-32 h-32 bottom-[15%] right-[-10%]
         md:w-64 md:h-64 md:bottom-[24%] md:right-[-7%]
         md:border-[7px]"></div>

</section>

<?php
$args = array(
  'posts_per_page' => 4,
  'post_type' => 'faq', 
);
$query = new WP_Query( $args );
?>

<section class="w-full bg-[#F7F7F7] text-black mx-auto px-4 py-10 md:py-20">
  <div class="mb-8 text-center">
    <h2 class="text-[28px] md:text-[40px]">Dažnai užduodami klausimai</h2>
  </div>

  <?php if ( $query->have_posts() ) : ?>
    <div class="mx-auto max-w-[850px] space-y-2 md:space-y-4">
      <?php 
        $first = true;
        while ( $query->have_posts() ) : $query->the_post();
          $is_open     = $first;
          $aria_exp    = $is_open ? 'true' : 'false';
          $content_cls = $is_open ? '' : 'hidden';
      ?>
        <div class="faq-item border border-[#EEEEEE] rounded-[12px] bg-white p-4">
          <div class="flex justify-between items-center">
            <h3 class="degular text-[16px] md:text-[18px]"><?php the_title(); ?></h3>
            <button type="button"
                    class="faq-toggle text-[20px] p-0.5 md:p-2 rounded-full bg-amber-400"
                    aria-expanded="<?php echo $aria_exp; ?>"
                    aria-controls="faq-<?php the_ID(); ?>">
              <span class="plus <?php echo $is_open ? 'hidden' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                     xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
              </span>
              <span class="minus <?php echo $is_open ? '' : 'hidden'; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                     xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                  <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
              </span>
            </button>
          </div>
          <div id="faq-<?php the_ID(); ?>" class="mt-2 <?php echo $content_cls; ?>">
            <?php the_content(); ?>
          </div>
        </div>
      <?php 
        $first = false;
        endwhile;
      ?>
    </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
  <div class="flex align-center justify-center mt-6 md:mt-8">
    <a href="/dažnai-užduodami-klausimai/"
        class="bg-[#FFCC32] px-[14px] py-[12px] text-black text-center rounded-[16px] w-full md:w-[220px]">
        Peržiūrėti visus klausimus
    </a>
  </div>
</section>

<section class="w-full bg-[#FFCC32] gap-6 flex flex-col md:flex-row items-center justify-between text-black mx-auto py-10 px-4 md:p-20 ">
  <div class="text-center">
    <h2 class="text-[24px] md:text-[32px]">Paskambinkite mums: <span class="pb-1 border-b-[7px] border-white">+370 674 44 443</span></h2>
  </div>
  <div class="flex items-center justify-center">
    <a href="/kontaktai/"
        class="bg-[#000000] px-[16px] py-[12px] text-white text-center rounded-[16px] w-full md:w-[220px]">
        Kontaktai
    </a>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper('.mySwiper', {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        type: 'bullets',
      },
      speed: 800,
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      },
    });
  });

  document.querySelectorAll('.faq-toggle').forEach(button => {
  button.addEventListener('click', () => {
    const content = document.getElementById(button.getAttribute('aria-controls'));
    content.classList.toggle('hidden');

    button.querySelector('.plus').classList.toggle('hidden');
    button.querySelector('.minus').classList.toggle('hidden');

    button.setAttribute('aria-expanded', content.classList.contains('hidden') ? 'false' : 'true');
  });
});
</script>

<style>
  body {
    background-color: black;
    color: white;
  }

  .swiper-button-prev::after,
  .swiper-button-next::after {
    content: "";
  }

  /* Style the previous button with your custom arrow image */
  .swiper-button-prev {
    width: 40px;
    height: 40px;
    background: url('<?php echo LANGU_THEME_URI . '/assets/icons/arrow-left.png'; ?>') no-repeat center center;
    background-size: 20px 20px;
    border-radius: 50%;
    background-color: white;
    z-index: 5;
    left: -20px;
  }

  .swiper-button-next {
    width: 40px;
    height: 40px;
    background: url('<?php echo LANGU_THEME_URI . '/assets/icons/arrow-right.png'; ?>') no-repeat center center;
    background-size: 20px 20px;
    border-radius: 50%;
    background-color: white;
    z-index: 5;
    right: -20px;
  }

  .swiper {
    overflow: initial;
  }

   .swiper-pagination-bullet {
    width: 30px;
    height: 3px;
    background-color: #555;
    opacity: 0.6;
    border-radius: 2px;
    transition: all 0.3s ease;
  }

  .swiper-pagination-bullet-active {
    background-color: #fff;
    width: 40px;
    height: 3px;
    opacity: 1;
  }

  .swiper-pagination-bullet:only-child {
    display: block !important;
  }

  .swiper-pagination {
    display: flex;
    gap: 8px;
    bottom: 20px !important;
    justify-content: start;
    bottom: 20px !important;
    padding-left: 80px;
  }

  .bg-yellow {
    background-color: #FFCC32;
  }

  .text-yellow {
    color: #FFCC32;
  }

  .main-text {
    style="font-family: Erbaum;
    font-weight: 400;
    font-size: 32px;
    line-height: 40px;
    letter-spacing: 0%;
    text-align: center;
    vertical-align: middle;
  }


  @media (max-width: 450px) {

    .swiper-button-next,
    .swiper-button-prev {
      display: none;
    }

    .swiper-pagination {
      display: flex;
      justify-content: center;
      margin: 0 auto;
      padding-left: 0;
    }
  }
</style>

<?php get_footer(); ?>