<?php 
/**
 * Template Name: Privatumo Politika
 */
get_header();
?>

<div class="w-full">
    <div class="bg-[#FFCC32]">
        <!-- container-1 -->
        <div class="md:w-[1440px] w-full bg-[#FFCC32] md:py-[80px] md:px-[160px] mx-auto flex md:gap-[36px] py-[32px] px-[16px] gap-[24px]">
            <h1 class="md:text-[40px] md:leading-[48px] text-[28px] leading-[32px] font-[400] font-Erbaum text-[#000000]">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>

    <div class="bg-[#ffffff]">
        <!-- container-2 -->
        <div class="md:w-[1440px] w-full bg-[#ffffff] px-[16px] py-[40px] gap-[24px] md:pt-[80px] md:pb-[120px] md:px-[160px] mx-auto flex flex-col md:gap-[40px]">
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
