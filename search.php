  
<?php
/**
 * The template for displaying search results
 */

get_header(); // Include the header template
?>

<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            <?php
            printf(
                /* translators: %s: Search query. */
                esc_html__('Search Results for: %s', 'langu-sistemos'),
                '<span class="text-blue-600">' . get_search_query() . '</span>'
            );
            ?>
        </h1>

        <?php if (have_posts()) : ?>
            <div class="space-y-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-full h-64 bg-cover bg-center" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');"></div>
                        <?php endif; ?>

                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition duration-300">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="text-gray-600 mb-4">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="flex items-center text-sm text-gray-500">
                                <span class="mr-4">
                                    <?php echo esc_html(get_the_date()); ?>
                                </span>
                                <span>
                                    <?php echo esc_html(get_the_author()); ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('Previous', 'langu-sistemos'),
                    'next_text' => __('Next', 'langu-sistemos'),
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="text-center">
                <p class="text-xl text-gray-600">
                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'langu-sistemos'); ?>
                </p>
                <div class="mt-6">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer(); // Include the footer template
?>