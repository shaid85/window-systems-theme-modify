<?php get_header(); ?>

<main class="container mx-auto my-6 w-screen">
    <div class="">
        <h1 class="text-4xl font-bold ml-4 text-gray-800 w-full  "><?php the_title(); ?></h1>
        
        <div class="content mt-6 text-lg text-gray-700">
            <?php 
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                echo '<p class="text-center">Sorry, no content found!</p>';
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
