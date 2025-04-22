<?php

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
  'posts_per_page' => 3,
  'paged' => $paged
];

$posts_query = new WP_Query($args);

?>

<div class="max-w-[1440px] container px-4 py-10 md:p-[40px] mx-auto">
  <!-- Blog Header -->
  <header class="flex items-start gap-[24px] mb-[56px] flex-start">

    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="48" viewBox="0 0 20 48" fill="none">
      <path
        d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
        fill="#FFCC32" />
    </svg>

    <div class="flex flex-col gap-[16px]">
      <h1 class="text-[40px] font-bold text-gray-900">
        <span>Blog</span>
      </h1>
      <div class="mt-4 text-gray-600 font-degular-regular blog-entry-content">
        Mediniai langai – puikus pasirinkimas ieškantiems išskirtinių ilgaamžių sprendimų bei vertinantiems natūralumą.
        Maksimalų komfortą užtikrinantys mediniai langai taps puikia investicija į jūsų gerbūvį, nes orui laidūs ir
        natūraliai kvėpuojantys rėmai kuria sveikatai palankią ekosistemą ir sumažina alergijos riziką.
      </div>
      <a href="#" class="flex gap-2 mt-4 font-semibold text-[18px] items-center">
        <span>Rodyti daugiau</span>
      </a>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="flex gap-[56px] mb-[56px] bg-[#f7f7f7] rounded-[16px] min-h-[560px]">
    <?php
    // Fetch only the most recent post
    $args = [
      'posts_per_page' => 1,
      'post_type' => 'post'
    ];
    $recent_post = new WP_Query($args);

    if ($recent_post->have_posts()):
      while ($recent_post->have_posts()):
        $recent_post->the_post();
        ?>
        <div class="flex flex-col justify-between w-1/2 rounded-l-[16px] p-[24px]">
          <h3 class="text-[#6B6B6B] text-[12px] font-semibold uppercase mb-2 min-h-[150px]">INTERJERO IDĖJOS</h3>
          <div class="my-[48px] flex flex-col gap-[16px]">
            <h2 class="mb-6 font-normal leading-tight md:text-[32px] font-erbaum-regular">
              <?php the_title(); ?>
            </h2>
            <div class="flex items-center mb-6">
              <div class="ml-3">
                <p class="font-semibold font-degular-regular"><?php the_author(); ?></p>
                <p class="text-[#7f7f7f] text-[12px] font-degular-regular">Langų sistemų interjero ekspertė</p>
              </div>
            </div>
          </div>
          <a href="<?php the_permalink(); ?>"
            class="w-[268px] mb-[32px] flex items-center justify-center p-[16px] text-black font-semibold bg-[#ffcc32] transition-colors rounded-[16px]">
            Skaityti straipsnį
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        <div class="w-1/2">
          <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>"
              class="rounded-r-[16px] w-full h-full object-cover" />
          <?php else: ?>
            <img src="https://placehold.co/600x400" alt="Placeholder" class="rounded-r-[16px] w-full h-full object-cover" />
          <?php endif; ?>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </section>

  <!-- Posts Loop -->
  <?php if ($posts_query->have_posts()): ?>
    <div class="grid grid-cols-1 gap-[24px] md:grid-cols-2 lg:grid-cols-3">
      <?php while ($posts_query->have_posts()):
        $posts_query->the_post(); ?>
        <article class="overflow-hidden transition duration-300 bg-[#f7f7f7] rounded-[16px] hover:shadow-lg">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                class="md:min-h-[320px] object-cover w-full h-[200px] md:h-48">
            <?php endif; ?>
            <div class="p-5 flex flex-col gap-[16px] pt-0">
              <div class="">
                <?php
                $categories = get_the_category();
                if ($categories) {
                  foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" 
                    class="category-term ">
                    ' . esc_html($category->name) . '
                  </a>';
                  }
                }
                ?>
              </div>

              <h2 class="text-[20px] font-semibold text-gray-900 blog-title"><?php the_title(); ?></h2>

              <a href="<?php the_permalink(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M20.7806 12.5306L14.0306 19.2806C13.8899 19.4213 13.699 19.5003 13.5 19.5003C13.301 19.5003 13.1101 19.4213 12.9694 19.2806C12.8286 19.1398 12.7496 18.949 12.7496 18.7499C12.7496 18.5509 12.8286 18.36 12.9694 18.2193L18.4397 12.7499H3.75C3.55109 12.7499 3.36032 12.6709 3.21967 12.5303C3.07902 12.3896 3 12.1988 3 11.9999C3 11.801 3.07902 11.6103 3.21967 11.4696C3.36032 11.3289 3.55109 11.2499 3.75 11.2499H18.4397L12.9694 5.78055C12.8286 5.63982 12.7496 5.44895 12.7496 5.24993C12.7496 5.05091 12.8286 4.86003 12.9694 4.7193C13.1101 4.57857 13.301 4.49951 13.5 4.49951C13.699 4.49951 13.8899 4.57857 14.0306 4.7193L20.7806 11.4693C20.8504 11.539 20.9057 11.6217 20.9434 11.7127C20.9812 11.8038 21.0006 11.9014 21.0006 11.9999C21.0006 12.0985 20.9812 12.1961 20.9434 12.2871C20.9057 12.3782 20.8504 12.4609 20.7806 12.5306Z" fill="black"/>
                </svg>
              </a>
            </div>
          </a>


        </article>
      <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center mt-10 space-x-2">
      <?php
      echo paginate_links([
        'mid_size' => 2,
        'prev_text' => '<span class="flex items-center justify-center gap-2 w-[48px] h-[48px] rounded-[16px] cursor-pointer p-[14px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 5l-7 7 7 7"></path>
            </svg>
        </span>',
        'next_text' => '<span class="flex items-center justify-center gap-2 w-[48px] h-[48px] rounded-[16px] cursor-pointer p-[14px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </span>',
        'before_page_number' => '<span class="inline-flex items-center justify-center w-[48px] h-[48px] rounded-[16px] cursor-pointer  text-sm font-medium p-[20px]">',
        'after_page_number' => '</span>',
        'screen_reader_text' => '',
        'total' => $posts_query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
      ]);
      ?>
    </div>
  <?php endif; ?>
</div>


<style>
  .categories {
    text-transform: uppercase;
    color: #6B6B6B;
  }

  .categories a {
    font-size: 12px;
    font-weight: bold;
    color: #6B6B6B;
    font-family: Erbaum;
  }

  .blog-title {
    font-family: 'ErbaumRegular';
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 28px;
  }

  .blogs .blog {
    display: flex;
    width: 410.667px;
    padding-bottom: 24px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 16px;
  }

  .nav-links {
    display: flex;
    gap: 16px;
  }

  .nav-links .page-numbers {
    display: flex;
    width: 48px;
    padding: 12px 16px;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }

  .page-numbers.current {
    color: black;
    background: #FFCC32;
    border-radius: 16px;
  }

  .category-term {
    color: #6B6B6B !important;
    /* Caption 12/UPPERCASE */
    font-family: Degular;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: 18px;
    /* 150% */
    text-transform: uppercase;
  }

  .blog-entry-content {
    font-family: "Degular Variable";
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: 26px;
    /* 144.444% */
  }
</style>




<?php get_footer(); ?>