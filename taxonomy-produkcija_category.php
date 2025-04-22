<?php

/** taxonom-produkcija_category.php */
defined("ABSPATH") || exit;



/**
 * @description this pages behave like a archive for produkcija sub-categories and main categories with its children
 */

get_header();

// Get current category (term) data
$current_term = get_queried_object();
$term_name = $current_term->name;
// $term_description = term_description($current_term->term_id);
$term_description = get_term_meta($current_term->term_id, 'produkcija_description', true);;
$featured_image = get_term_meta($current_term->term_id, 'produkcija_category_image', true);
$parent = $current_term->parent == 0; /** main category that has not parent */

?>

<?php if ($parent): ?>
    <!-- view single and main category -->
    <div class="w-full bg-white">
        <div class="max-w-[1440px] md:px-[40px] px-4 pb-10 mx-auto h-auto md:h-[544px]">
          <div class="w-full flex md:flex-row flex-row-reverse items-start md:items-center min-h-auto md:min-h-[544px] py-16 pb-20 md:py-0 md:px-20">
            <!-- Image Container -->
            <div class="flex justify-end md:justify-center w-[130px] md:w-[40%] h-[112px] md:h-full md:w-2/6 absolute md:relative">
              <div class="relative w-full overflow-hidden aspect-video max-w-[250px] md:max-w-[650px]">
                <?php if ($featured_image): ?>
                  <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($current_term->name); ?>"
                    class="absolute inset-0 object-contain w-full h-full px-4 py-3 md:px-10">
                <?php endif; ?>
              </div> 
            </div>
            <!-- Content Section --> 
            <div class="w-full md:w-4/6 md:px-8 mt-4 md:mt-0 md:px-[60px]"
              style="font-family: 'Erbaum', sans-serif; font-weight: 400">
              <div class="h-[112px] md:h-full flex items-center pb-4 md:pb-0">
                <h2 class="inline-block mb-4 text-[24px] md:text-[32px] " >
                 <?php echo esc_attr($current_term->name); ?>
                  <span class="block border-t-4 border-[#FFD700] mt-1 w-full"></span>
                </h2>
              </div>

              <div class="grid grid-cols-1 text-[16px] md:text-[20px] sm:grid-cols-2 gap-y-4">
                <?php
                $child_terms = get_terms([
                  'taxonomy' => 'produkcija_category',
                  'hide_empty' => false,
                  'parent' => $current_term->term_id, // Sub-categories
                ]);
                if ($child_terms && !is_wp_error($child_terms)) {
                  foreach ($child_terms as $child_term) {
                    ?>
                    <p>
                      <a style="font-family: ErbaumRegular !important; font-weight: normal;" href="<?php echo esc_url(get_term_link($child_term)); ?>">
                        <?php echo esc_html($child_term->name); ?>
                      </a>
                    </p>
                    <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php endif; ?>

<!-- if current term has no parent then display his posts -->
<?php if (!$parent): ?>
    <!-- Whole container containing all sections -->
    <div class="bg-white">
        <!-- Container 1 -->
        <div class="bg-[#f7f7f7]">
        <div
            class="flex flex-col max-w-[1440px] w-full mx-auto px-[16px] md:px-[80px] pt-[24px] pb-[40px] md:pb-[80px] gap-[24px] md:gap-[56px] ">
            <!-- Back button -->
            <div class="gap-[8px] items-center cursor-pointer">
                <div class="flex items-center gap-2" onclick="widow.history.back()">
                    <img src="<?php echo LANGU_THEME_URI ?>/assets/icons/arrow-left.png" alt="" class="w-6 h-6">
                    <span class="font-degular-text-bold font-[700] text-[16px] leading-[24px]">Grįžti</span>
                </div>
            </div>

            <!-- Information Section -->
            <div class="flex flex-col md:flex-row gap-[16px] w-full">
                <!-- Icon column (desktop only) -->
                <div class="hidden md:block w-[20px] flex-shrink-0">
                    <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
                            fill="#FFCC32" />
                    </svg>
                </div>

                <!-- Text content -->
                <div class="flex flex-col gap-[24px]">
                    <!-- Heading for mobile -->
                    <div class="flex md:hidden block gap-[12px] items-center">
                        <div class="w-[13px] flex-shrink-0">
                            <svg width="13" height="32" viewBox="0 0 13 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.04132 32L0 29.8461L7.98623 21.4194C9.35905 19.9709 10.1111 18.05 10.1111 15.9969C10.1111 13.9437 9.35308 12.0228 7.98623 10.5806L0 2.15391L2.04132 0L10.0275 8.42669C11.9435 10.4483 13 13.1376 13 15.9969C13 18.8561 11.9435 21.5454 10.0275 23.567L2.04132 31.9937V32Z"
                                    fill="#FFCC32" />
                            </svg>
                        </div>
                        <h1 class="text-[#000000] text-[28px] font-[400] leading-[32px] font-erbaum-regular">
                            <?php echo esc_html($term_name); ?>
                        </h1>

                    </div>

                    <h1 class="hidden md:block text-[#000000] text-[40px] font-[400] leading-[48px] font-erbaum-regular">
                        <?php echo esc_html($term_name); ?>
                    </h1>
                    <div class="text-[#000000] text-[18px] leading-[26px] font-degular-var mb-[16px]">

                        <?php
                        $full = $term_description ?? '';
                        $short = wp_trim_words($full, 50, '');
                        ?>
                        <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
                            <div class="cpt-desc-short"><?php echo wp_kses_post($short); ?>…</div>
                            <div class="hidden cpt-desc-full"><?php echo wp_kses_post($full); ?></div>
                            <?php if (str_word_count(wp_strip_all_tags($full)) > 50): ?>
                            <div><button class="cpt-show-more mt-[16px] text-black text-[18px]">Daugiau informacijos</button></div>
                            <!-- <div><button class="cpt-show-more mt-[16px] text-black text-[18px]">Rodyti daugiau</button></div> -->
                            <?php endif; ?>
                        </div> 
                    </div>
                    <div class="flex flex-col md:flex-row gap-[8px] md:gap-[16px]">
                        <button
                            class="text-[18px] leading-[26px] self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#000000] text-[#ffffff]">
                            Kainų skaičiuoklė
                        </button>
                        <button
                            class="text-[18px] leading-[26px] self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#FFCC32] text-[#000000]">
                            Gauti pasiūlymą
                        </button>
                    </div>
                </div>

            </div>

        </div>
        </div>
        
        <!-- Container-2: Display posts dynamically -->
        <div
            class="flex flex-col max-w-[1440px] w-full mx-auto bg-[#ffffff] px-[16px] md:px-[80px] pt-[40px] pb-[56px] gap-[24px] md:gap-[32px] border-b-[1px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[32px]">
                <?php
                $args = [
                    'post_type' => 'produkcija',
                    'tax_query' => [
                        [
                            'taxonomy' => 'produkcija_category',
                            'field' => 'term_id',
                            'terms' => $current_term->term_id,
                        ],
                    ],
                    'posts_per_page' => 6,
                ];

                $posts_query = new WP_Query($args);

                if ($posts_query->have_posts()) {
                    while ($posts_query->have_posts()) {
                        $posts_query->the_post();
                        global $post;
                        $is_featured = get_post_meta($post->ID, "_is_featured", true); 
                        ?>
                        <div class="col-span-2 flex flex-col md:flex-row gap-[16px] md:gap-[48px] w-full">
                            <!-- Product Card -->
                            <div class="w-full md:w-[470px] h-[400px] rounded-[16px] border-[1px] border-[#EEEEEE] overflow-hidden relative flex items-center justify-center">
                                <?php if( $is_featured === "yes" ): ?>
                                <div
                                    class="flex items-center justify-center top-[16px] left-[16px] w-[178px] h-[34px] rounded-[1000px] px-[12px] py-[8px] gap-[8px] bg-[#027AFF] absolute">
                                    <p class="text-[12px] font-[700] leading-[18px] font-Degular text-[#ffffff]">Populiariausia
                                        prekė</p>
                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.625 4.0075C13.4842 3.84795 13.3111 3.72019 13.1171 3.63269C12.9231 3.54519 12.7128 3.49996 12.5 3.5H9V2.5C9 1.83696 8.73661 1.20107 8.26777 0.732233C7.79893 0.263392 7.16304 1.28189e-07 6.5 1.28189e-07C6.40711 -6.63752e-05 6.31604 0.0257445 6.237 0.0745385C6.15795 0.123333 6.09407 0.19318 6.0525 0.27625L3.69125 5H1C0.734784 5 0.48043 5.10536 0.292893 5.29289C0.105357 5.48043 0 5.73478 0 6V11.5C0 11.7652 0.105357 12.0196 0.292893 12.2071C0.48043 12.3946 0.734784 12.5 1 12.5H11.75C12.1154 12.5001 12.4684 12.3668 12.7425 12.1252C13.0166 11.8835 13.1931 11.5501 13.2388 11.1875L13.9888 5.1875C14.0153 4.97626 13.9966 4.76179 13.9339 4.55833C13.8712 4.35488 13.7659 4.16711 13.625 4.0075ZM1 6H3.5V11.5H1V6ZM12.9963 5.0625L12.2463 11.0625C12.231 11.1834 12.1722 11.2945 12.0808 11.3751C11.9895 11.4556 11.8718 11.5 11.75 11.5H4.5V5.61812L6.79437 1.02875C7.13443 1.09681 7.4404 1.2806 7.66021 1.54884C7.88002 1.81708 8.0001 2.1532 8 2.5V4C8 4.13261 8.05268 4.25979 8.14645 4.35355C8.24021 4.44732 8.36739 4.5 8.5 4.5H12.5C12.571 4.49998 12.6411 4.51505 12.7058 4.54423C12.7704 4.5734 12.8282 4.61601 12.8751 4.66922C12.9221 4.72242 12.9571 4.78501 12.978 4.85282C12.9989 4.92063 13.0051 4.9921 12.9963 5.0625Z"
                                            fill="white" />
                                    </svg>
                                </div>
                                <?php endif; ?>
                                
								  <?php if (has_post_thumbnail()) : ?>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('full', ['class' => 'max-w-[480px] w-full h-[415px] object-contain']); ?>
									</a>
								<?php else : ?>
									<a href="<?php the_permalink(); ?>">
										<img src="https://langai.urbanlabs.lt/wp-content/uploads/2025/03/592d78ed4cb7ee2bba7ffd2c0a71fae7.png"
											 alt="<?php the_title(); ?>"
											 class="max-w-[480px] w-full h-[400px] object-contain" />
									</a>
								<?php endif; ?>


                               
                            </div>
                            <!-- Product Details -->
                            <div class="flex flex-col gap-[16px] md:gap-[24px] justify-center">
                                <h1
                                    class="text-[#000000] text-[22px] leading-[24px] md:text-[32px] font-[400] md:leading-[40px] font-erbaum-regular">
                                    <?php the_title(); ?>
                                </h1>
                                <?php 
                                $technical_data_items = get_post_meta($post->ID, 'cp_technical_data_items', true);
                                $technical_data_items = !empty($technical_data_items) ? $technical_data_items : [];
                                
                                ?>
                                <div class="flex flex-col gap-[8px]">
                                    <?php foreach($technical_data_items as $data_item): ?>
                                        <div class="flex gap-[8px]">
                                            <p
                                                class="md:text-[18px] text-[14px] font-[700] md:leading-[26px] leading-[22px] font-degular-text-bold text-[#000000]">
                                                <?php echo esc_html($data_item['text']); ?>:
                                            </p>
                                            <p
                                                class="md:text-[18px] text-[14px] font-[400] md:leading-[26px] leading-[22px] font-degular-var text-[#000000]">
                                                <?php echo esc_html($data_item['value']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                    
                                </div>
                                <div class="flex flex-col md:flex-row gap-[16px]">
                                    <a href="<?php the_permalink(); ?>"
                                        class="text-[18px] leading-[26px] self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#ffffff] text-[#000000] border-[1px] border-[#BEBEBE]">
                                        Daugiau informacijos
                                    </a>
                                    <button
                                        class="text-[18px] leading-[26px] self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#FFCC32] text-[#000000]">
                                        Gauti pasiūlymą
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No products found in this category.</p>';
                }
                ?>
            </div>
        </div>


        <!-- other -->
         <?php
         
        $produkcija_description_long_title = get_term_meta($current_term->term_id, 'produkcija_description_long_title', true);
        $produkcija_description_long = get_term_meta($current_term->term_id, 'produkcija_description_long', true);
        
         ?>

        <div class="flex flex-col max-w-[1440px] w-full mx-auto bg-[#ffffff]
                px-[16px] md:p-[80px] py-[40px] gap-[56px]">
            <!-- Information Section -->
            <div class="flex flex-col md:flex-row gap-[16px] md:gap-[24px] w-full">
                <!-- Icon column (desktop only) -->
                <div class="hidden md:block w-[20px] flex-shrink-0">
                    <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
                            fill="#FFCC32" />
                    </svg>
                </div>

                <!-- Text content -->
                <div class="flex flex-col gap-[24px]">

                    <div class="flex flex-col gap-[16] md:gap-[32px]">
                        <div class="md:hidden flex items-center  gap-[12px] flex flex-shrink-0">
                            <div class="w-[13px] h-[32px]">

                                <svg width="13" height="33" viewBox="0 0 13 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.04132 32.1484L0 29.9945L7.98623 21.5678C9.35905 20.1193 10.1111 18.1984 10.1111 16.1453C10.1111 14.0921 9.35308 12.1713 7.98623 10.729L0 2.30234L2.04132 0.148438L10.0275 8.57512C11.9435 10.5968 13 13.286 13 16.1453C13 19.0046 11.9435 21.6938 10.0275 23.7155L2.04132 32.1421V32.1484Z"
                                        fill="#FFCC32" />
                                </svg>
                            </div>
                            <h2 class="text-[#000000] text-[28px] font-[400] leading-[32px] font-erbaum-regular mb-[16px]">
                                <?php echo esc_html($produkcija_description_long_title  ); ?>
                            </h2>
                        </div>

                        <h2
                            class="md:block hidden text-[#000000] text-[40px] font-[400] leading-[48px] font-erbaum-regular">
                            <?php echo esc_html($produkcija_description_long_title  ); ?>
                        </h2>

                        <div class="term-description-long">
                            <!-- display text editor content as it is. -->
                            <?php echo $produkcija_description_long; ?>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .term-description-long h2,  .term-description-long h3, .term-description-long h4 {
            font-size: 24px;
            margin-top: 32px;
            margin-bottom: 16px;
        }

        @media (max-width: 450px) {
            .term-description-long h2,  .term-description-long h3, .term-description-long h4 {
                font-size: 22px;
                margin-top: 32px;
                margin-bottom: 16px;
            }
        }
    </style>
    <script>
    document.addEventListener('click', function (e) {
      if (!e.target.matches('.cpt-show-more')) return;

      const container = e.target.closest('.cpt-desc-container');
      container.querySelector('.cpt-desc-short').classList.toggle('hidden');
      container.querySelector('.cpt-desc-full').classList.toggle('hidden');
      e.target.textContent = e.target.textContent === 'Rodyti daugiau' ? 'Daugiau informacijos' : 'Rodyti daugiau';
    });
  </script>
<?php endif; ?>
<?php get_footer(); ?>