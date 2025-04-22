<footer class="flex flex-col items-center p-[12px] pb-10 md:px-10 md:py-6 text-white bg-black divide-y divide-[#6B6B6B80] footer">
  <!-- Top Footer Section -->
  <div class=" flex flex-col py-8 md:flex-row md:justify-between md:items-start ">
    <!-- Left Side: Logo, Description, and Button -->
    <div class="w-full md:w-[40%]  mb-8 md:mb-0">
      <div class="text-xl font-bold text-white">
        <a href="<?php echo home_url(); ?>">
          <?php if (get_theme_mod('header_logo')): ?>
            <img src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>"
              class="h-auto w-[180px] object-cover">
          <?php else: ?>
            <?php bloginfo('name'); ?>
          <?php endif; ?>
        </a>
      </div>
      <div class="mt-6 flex flex-col gap-[8px]">
        <?php if ( $desc = get_theme_mod('footer_title') ) : ?>
            <h2 class="font-erbaum-regular"><?php echo esc_html( $desc ); ?></h2>
        <?php endif; ?>

        <?php if ( $color_desc = get_theme_mod('footer_description') ) : ?>
            <p class="font-degular-var"><?php echo esc_html( $color_desc ); ?></p>
        <?php endif; ?>
      </div>

    <button 
        onclick="window.location.href='/gauti_pasiulyma/'" 
        class="bg-[#FFCC32] mt-6 px-[16px] py-[12px] text-black rounded-[16px] w-full md:w-[220px]"
    >
        Gauti pasiūlymą
    </button>

    </div>

    <!-- Right Side: Certificates/Images -->
    <div class="w-full md:w-[60%]">
  <div class="flex justify-center gap-4 md:justify-end">
    <?php
      $footer_pasiekimai = new WP_Query([
        'post_type'      => 'pasiekimai',
        'posts_per_page' => 4,
        'meta_key'       => 'cp_pasiekimai_show_footer',
        'meta_value'     => '1',
        'orderby'        => 'date',  
        'order'          => 'ASC', 
      ]);

      if ( $footer_pasiekimai->have_posts() ) {
        while ( $footer_pasiekimai->have_posts() ) {
          $footer_pasiekimai->the_post();
          $image_url = get_post_meta( get_the_ID(), 'cp_pasiekimai_image', true ) 
                       ?: get_the_post_thumbnail_url( get_the_ID(), 'full' );
          ?>
          <img 
            src="<?php echo esc_url( $image_url ); ?>" 
            alt="<?php echo esc_attr( get_the_title() ); ?>" 
            class="w-[78px] h-[78px] md:w-[144px] md:h-[144px] rounded-full object-cover"
          />

          <?php
        }
        wp_reset_postdata();
      }
    ?>
  </div>
</div>

</div>

  </div>

  <!-- Middle Footer: Links & Info -->
  <div class="w-full pt-8 pb-6 text-[18px]">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
      <!-- Column 1: About / Custom Links -->
      <div class="col-span-1">
        <?php
          wp_nav_menu([
            'theme_location' => 'footer_col_1',
            'container'      => false,
            'menu_class'     => 'space-y-2',
            'fallback_cb'    => false,
          ]);
        ?>
      </div>

      <div>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer_col_2',
            'container'      => false,
            'menu_class'     => 'space-y-2',
            'fallback_cb'    => false,
          ]);
        ?>
      </div>

      <div>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer_col_3',
            'container'      => false,
            'menu_class'     => 'space-y-2',
            'fallback_cb'    => false,
          ]);
        ?>
      </div>



      <!-- Column 4: Social Media -->
      <div class="degular ">
        <div class="space-y-2">
          <a href="<?php echo esc_url(get_theme_mod('home_social_instagram', 'https://instagram.com')); ?>"
            class="flex items-center gap-2 text-white transition duration-300 hover:text-white"><svg
              xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
              <path
                d="M10.507 2.30169C13.0701 2.30169 13.3736 2.31294 14.3816 2.3579C15.3184 2.39912 15.8243 2.55651 16.1616 2.68766C16.6075 2.86003 16.9297 3.06988 17.2632 3.40338C17.6005 3.74063 17.8066 4.05915 17.979 4.50507C18.1101 4.84232 18.2675 5.35194 18.3087 6.285C18.3537 7.29676 18.3649 7.60028 18.3649 10.1596C18.3649 12.7228 18.3537 13.0263 18.3087 14.0343C18.2675 14.9711 18.1101 15.477 17.979 15.8142C17.8066 16.2601 17.5968 16.5824 17.2632 16.9159C16.926 17.2532 16.6075 17.4593 16.1616 17.6316C15.8243 17.7628 15.3147 17.9202 14.3816 17.9614C13.3699 18.0064 13.0663 18.0176 10.507 18.0176C7.94388 18.0176 7.64035 18.0064 6.63234 17.9614C5.69553 17.9202 5.18966 17.7628 4.85241 17.6316C4.40649 17.4593 4.08422 17.2494 3.75072 16.9159C3.41347 16.5787 3.20737 16.2601 3.035 15.8142C2.90384 15.477 2.74646 14.9673 2.70524 14.0343C2.66027 13.0225 2.64903 12.719 2.64903 10.1596C2.64903 7.59654 2.66027 7.29301 2.70524 6.285C2.74646 5.3482 2.90384 4.84232 3.035 4.50507C3.20737 4.05915 3.41722 3.73689 3.75072 3.40338C4.08797 3.06613 4.40649 2.86003 4.85241 2.68766C5.18966 2.55651 5.69928 2.39912 6.63234 2.3579C7.64035 2.31294 7.94388 2.30169 10.507 2.30169ZM10.507 0.574219C7.90266 0.574219 7.57665 0.58546 6.55365 0.630427C5.5344 0.675394 4.83367 0.840272 4.22662 1.07635C3.59334 1.32367 3.05748 1.64968 2.52537 2.18553C1.98952 2.71764 1.66351 3.25349 1.41619 3.88303C1.18012 4.49383 1.01524 5.19081 0.970271 6.21006C0.925304 7.2368 0.914062 7.56281 0.914062 10.1671C0.914062 12.7715 0.925304 13.0975 0.970271 14.1205C1.01524 15.1397 1.18012 15.8405 1.41619 16.4475C1.66351 17.0808 1.98952 17.6166 2.52537 18.1488C3.05748 18.6809 3.59334 19.0106 4.22287 19.2542C4.83367 19.4903 5.53066 19.6551 6.5499 19.7001C7.5729 19.7451 7.89891 19.7563 10.5032 19.7563C13.1076 19.7563 13.4336 19.7451 14.4566 19.7001C15.4758 19.6551 16.1766 19.4903 16.7836 19.2542C17.4131 19.0106 17.949 18.6809 18.4811 18.1488C19.0132 17.6166 19.343 17.0808 19.5865 16.4513C19.8226 15.8405 19.9875 15.1435 20.0325 14.1242C20.0774 13.1012 20.0887 12.7752 20.0887 10.1709C20.0887 7.56656 20.0774 7.24055 20.0325 6.21755C19.9875 5.19831 19.8226 4.49757 19.5865 3.89052C19.3505 3.25349 19.0245 2.71764 18.4886 2.18553C17.9565 1.65342 17.4206 1.32367 16.7911 1.0801C16.1803 0.84402 15.4833 0.679141 14.4641 0.634175C13.4373 0.58546 13.1113 0.574219 10.507 0.574219Z"
                fill="white" />
              <path
                d="M10.5057 5.24023C7.78525 5.24023 5.57812 7.44736 5.57812 10.1678C5.57812 12.8883 7.78525 15.0955 10.5057 15.0955C13.2262 15.0955 15.4334 12.8883 15.4334 10.1678C15.4334 7.44736 13.2262 5.24023 10.5057 5.24023ZM10.5057 13.3642C8.74079 13.3642 7.30935 11.9328 7.30935 10.1678C7.30935 8.4029 8.74079 6.97146 10.5057 6.97146C12.2707 6.97146 13.7021 8.4029 13.7021 10.1678C13.7021 11.9328 12.2707 13.3642 10.5057 13.3642Z"
                fill="white" />
              <path
                d="M16.7774 5.04493C16.7774 5.68196 16.2602 6.19534 15.627 6.19534C14.9899 6.19534 14.4766 5.67822 14.4766 5.04493C14.4766 4.4079 14.9937 3.89453 15.627 3.89453C16.2602 3.89453 16.7774 4.41165 16.7774 5.04493Z"
                fill="white" />
            </svg> <span>Instagram</span></a>
          <a href="<?php echo esc_url(get_theme_mod('home_social_facebook', 'https://facebook.com')); ?>"
            class="flex items-center gap-2 text-white transition duration-300 hover:text-white"><svg
              xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24" fill="none">
              <path
                d="M21.0887 12.1615C21.0887 6.8666 16.7963 2.57422 11.5014 2.57422C6.20644 2.57422 1.91406 6.8666 1.91406 12.1615C1.91406 16.9467 5.41998 20.9131 10.0033 21.6324V14.9328H7.56907V12.1615H10.0033V10.0493C10.0033 7.6465 11.4347 6.31926 13.6246 6.31926C14.6732 6.31926 15.7707 6.50651 15.7707 6.50651V8.86588H14.5618C13.3709 8.86588 12.9994 9.60497 12.9994 10.3639V12.1615H15.6584L15.2333 14.9328H12.9994V21.6324C17.5827 20.9131 21.0887 16.9467 21.0887 12.1615Z"
                fill="white" />
            </svg> <span>Facebook</span></a>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div
      class="mt-8 md:mt-10 mb-[-5px] flex justify-start flex-col sm:flex-row sm:justify-start text-[12px] text-[#6B6B6B] gap-2 md:gap-8 degular">
      <p class="copyright"><?php echo esc_html('Copyright © ' . date('Y') . ' Langų Sistemos UAB'); ?>
      </p>
      <div class="flex gap-4 md:gap-6 " style="text-decoration: underline;">
        <a href="/privatumo-politika" class="copyright" style="font-family: DegularVariable !important;">Privatumo politika</a>
        <a href="/paslaugu-nformacija" class="copyright" style="font-family: DegularVariable !important;">Paslaugų informacija</a>
      </div>
    </div>
  </div>

  <!-- //cookies consent -->

  <?php if ( ! isset( $_COOKIE['cookie_consent'] ) ) : ?>
    <div 
      id="cookie-consent-overlay"
      class="fixed inset-0 z-50 flex items-end bg-black/60 backdrop-blur-sm"
    >
      <div 
        id="cookie-consent-popup"
        class="w-full p-6 bg-white shadow-xl rounded-t-2xl md:p-8 md:h-[280px]"
      >
        <div class="flex flex-col space-y-4 md:flex-row md:items-start md:space-y-0">
          
          <div class="flex-shrink-0 mr-[32px]">
                <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/svg/light-logo.svg" alt="<?php bloginfo('name'); ?>"
                  class="h-[36px] md:h-[64px] w-[114px] md:w-[204px] object-cover">
          </div>

          <!-- Text -->
          <div class="flex-grow text-black">
            <h2 class="text-[20px] mb-2">
              Šioje svetainėje naudojami slapukai.
            </h2>
            <p class="leading-[26px] text-[18px] mb-3">
              Siekdami pagerinti Jūsų naršymo kokybę, statistiniais ir rinkodaros tikslais
              šioje svetainėje naudojame slapukus. Pasirinkę arba patvirtinę visus, patvirtinate 
              savo sutikimą su slapukų įrašymu. Sutikimą bet kada galėsite atšaukti, 
              pakeisdami interneto naršyklės nustatymus ir ištrindami slapukus.<br>
            
              Daugiau apie slapukus ir jų atsisakymą skaitykite
              <a
                href="/privatumo-politika"
                class= "uppercase hover:text-gray-900"
              >
                Privatumo Politikoje
              </a>.
            </p>
          </div>

        </div>
        <div class="flex flex-col items-center justify-end mt-4 space-y-4 md:flex-row md:items-center md:space-y-0 md:space-x-4 md:mt-0">
          <button
            id="accept-essential"
            class="px-6 py-3 border border-[#bebebe] h-[58px] md:w-[220px] w-full rounded-[16px] text-black hover:bg-gray-100"
          >
            Priimti tik būtinus
          </button>
          <button
            id="accept-all"
            class="px-6 py-3 bg-[#FFCC32] h-[58px] md:w-[220px] w-full text-black rounded-[16px] hover:bg-[#FFCC32]"
          >
            Leisti visus slapukus
          </button>
        </div>
      </div>
    </div>

    <script>
      (function() {
        function setConsent(level) {
          document.cookie = 'cookie_consent=' + level + '; path=/; max-age=' + (365*24*60*60);
          document.getElementById('cookie-consent-overlay').remove();
        }
        document.getElementById('accept-essential').addEventListener('click', function() {
          setConsent('essential');
        });
        document.getElementById('accept-all').addEventListener('click', function() {
          setConsent('all');
        });
      })();
    </script>
    <?php endif; ?>

    <!-- chat widget --> 
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e5bc555a89cda5a1888bdbb/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
      })();
    </script> 

</footer>



<style>
  .footer .copyright {
    /* Caption 12/Regular */
    font-family: "DegularVariable";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
  }

</style>

<?php wp_footer(); ?>

</body>

</html>