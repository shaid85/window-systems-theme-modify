<?php
/**
 * single.php
 */
get_header();
?>
<div class="blog-single">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <div class="w-full bg-black">

                <!-- Hero/Title Section -->
                <section
                    class="max-w-[1440px] mx-auto min-h-[456px] md:min-h-[626px] text-white bg-black md:px-[180px] pb-[40px] p-[16px] md:mt-0 mt-[12px] ">

                    <div class="gap-[8px] items-center cursor-pointer">
                        <div class="flex items-center gap-2" onclick="window.history.back()">
                            <?php echo file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/light-arrow-left.svg"); ?>
                            <span class="font-degular-text-bold text-[16px] leading-[24px]">Grįžti</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-[16px] md:gap-[24px] mt-[16px]">
                        <div>
                            <span class="post-date"><?php echo get_the_date("Y-m-d"); ?></span>
                        </div>
                        <!-- Category or any taxonomy if you want -->
                        <?php
                        // $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<p class="mb-2 text-sm tracking-widest text-gray-400 uppercase">' . esc_html($categories[0]->name) . '</p>';
                        }
                        ?>

                        <!-- Post Title -->
                        <h1 class="text-white text-[24px] md:text-[40px]">
                            <?php the_title(); ?>
                        </h1>

                        <!-- Author Info -->
                        <div class="flex author-meta">
                            <a class="flex items-center" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                <!-- Show the author's avatar -->
                                <img src="https://placehold.co/56x56?text=author" alt="<?php the_author(); ?> avatar"
                                    class="object-cover !w-[56px] h-[56px] !rounded-full self-center"
                                    style="margin: 0 !important" />
                                <div class="ml-3">
                                    <!-- Author name -->
                                    <p class="font-semibold text-white text-[16px]"><?php the_author(); ?></p>
                                    <!-- Keep your static subtitle or replace with dynamic data if needed -->
                                    <p class="text-[#7f7f7f] text-[16px]">Langų sistemų interjero ekspertė</p>
                                </div>
                            </a>


                        </div>
                    </div>
                </section>
            </div>

            <div class="max-w-[1440px] mx-auto p-[12px] md:px-[180px] md:pb-[68px]">

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()): ?>
                    <div class="mx-auto md:mb-[56px] -mt-[45%] md:-mt-[29%] ">
                        <?php the_post_thumbnail('large', [
                            'class' => 'max-w-[1440px] mx-auto w-full h-[256px] md:h-[560px] object-cover rounded-[16px]',
                            'alt' => get_the_title()
                        ]); ?>
                    </div>
                <?php endif; ?>

                <!-- Main Content -->
                <div class="blog-post-content">
                    <article class="prose prose-lg prose-stone max-w-none">
                        <?php the_content(); ?>
                    </article>
                </div>

                <div class="mt-[48px]">
                    <h3 class="text-center share-heading text-[18px] font-degular-bold !mb-[8px]">Dalintis</h3>
                    <div class="flex justify-center">
                        <div class="flex gap-[16px] share-icons-group">
                            <a class="border p-[16px] rounded-[16px] share-link"
                                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M22 12C22 6.47715 17.5229 2 12 2C6.47715 2 2 6.47715 2 12C2 16.9912 5.65684 21.1283 10.4375 21.8785V14.8906H7.89844V12H10.4375V9.79688C10.4375 7.29063 11.9305 5.90625 14.2147 5.90625C15.3084 5.90625 16.4531 6.10156 16.4531 6.10156V8.5625H15.1922C13.95 8.5625 13.5625 9.3334 13.5625 10.125V12H16.3359L15.8926 14.8906H13.5625V21.8785C18.3432 21.1283 22 16.9912 22 12Z"
                                        fill="black" />
                                </svg>
                            </a>
                            <a class="border p-[16px] rounded-[16px] share-link"
                                href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M16.9405 4H19.6548L13.7249 10.7774L20.7009 20H15.2388L10.9606 14.4066L6.06544 20H3.34954L9.6921 12.7508L3 4H8.60082L12.4679 9.11262L16.9405 4ZM15.9879 18.3754H17.4919L7.78359 5.53928H6.16964L15.9879 18.3754Z"
                                        fill="black" />
                                </svg>
                            </a>

                            <a class="border p-[16px] rounded-[16px] share-link"
                                href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21ZM18.5 18.5H15.8289V13.9505C15.8289 12.7032 15.3549 12.0061 14.3677 12.0061C13.2937 12.0061 12.7325 12.7315 12.7325 13.9505V18.5H10.1583V9.83333H12.7325V11.0007C12.7325 11.0007 13.5065 9.56855 15.3456 9.56855C17.1839 9.56855 18.5 10.6911 18.5 13.0128V18.5ZM7.08734 8.6985C6.21051 8.6985 5.5 7.98241 5.5 7.09925C5.5 6.21609 6.21051 5.5 7.08734 5.5C7.96416 5.5 8.67425 6.21609 8.67425 7.09925C8.67425 7.98241 7.96416 8.6985 7.08734 8.6985ZM5.75814 18.5H8.44235V9.83333H5.75814V18.5Z"
                                        fill="#0A0C0D" />
                                </svg>
                            </a>

                            <a class="border p-[16px] rounded-[16px] share-link"
                                href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M15.5309 8.46975C15.6006 8.53941 15.6559 8.62213 15.6937 8.71317C15.7314 8.80422 15.7509 8.90182 15.7509 9.00038C15.7509 9.09894 15.7314 9.19654 15.6937 9.28758C15.6559 9.37863 15.6006 9.46135 15.5309 9.531L9.53089 15.531C9.46121 15.6007 9.37848 15.656 9.28744 15.6937C9.19639 15.7314 9.09881 15.7508 9.00027 15.7508C8.90172 15.7508 8.80414 15.7314 8.7131 15.6937C8.62205 15.656 8.53932 15.6007 8.46964 15.531C8.39996 15.4613 8.34469 15.3786 8.30697 15.2876C8.26926 15.1965 8.24985 15.0989 8.24985 15.0004C8.24985 14.9018 8.26926 14.8043 8.30697 14.7132C8.34469 14.6222 8.39996 14.5394 8.46964 14.4698L14.4696 8.46975C14.5393 8.40002 14.622 8.3447 14.7131 8.30696C14.8041 8.26922 14.9017 8.24979 15.0003 8.24979C15.0988 8.24979 15.1964 8.26922 15.2875 8.30696C15.3785 8.3447 15.4612 8.40002 15.5309 8.46975ZM20.2128 3.78788C19.7253 3.30031 19.1465 2.91355 18.5095 2.64968C17.8725 2.38581 17.1898 2.25 16.5003 2.25C15.8108 2.25 15.128 2.38581 14.4911 2.64968C13.8541 2.91355 13.2753 3.30031 12.7878 3.78788L9.96964 6.60507C9.82891 6.7458 9.74985 6.93667 9.74985 7.13569C9.74985 7.33471 9.82891 7.52559 9.96964 7.66632C10.1104 7.80705 10.3012 7.88611 10.5003 7.88611C10.6993 7.88611 10.8902 7.80705 11.0309 7.66632L13.849 4.85382C14.5548 4.16349 15.5044 3.77936 16.4917 3.7848C17.479 3.79024 18.4243 4.1848 19.1225 4.88286C19.8207 5.58092 20.2154 6.52615 20.221 7.51343C20.2266 8.50071 19.8427 9.45037 19.1525 10.1563L16.3334 12.9744C16.1927 13.115 16.1136 13.3058 16.1135 13.5047C16.1134 13.7037 16.1923 13.8945 16.3329 14.0352C16.4735 14.176 16.6643 14.2551 16.8632 14.2552C17.0622 14.2552 17.253 14.1763 17.3937 14.0357L20.2128 11.2129C20.7003 10.7254 21.0871 10.1466 21.351 9.50959C21.6148 8.8726 21.7506 8.18986 21.7506 7.50038C21.7506 6.81089 21.6148 6.12816 21.351 5.49117C21.0871 4.85417 20.7003 4.27539 20.2128 3.78788ZM12.9696 16.3335L10.1515 19.1516C9.80472 19.5062 9.39102 19.7885 8.93438 19.9821C8.47774 20.1757 7.98722 20.2768 7.49124 20.2795C6.99526 20.2823 6.50367 20.1866 6.04492 19.998C5.58617 19.8094 5.16939 19.5317 4.81871 19.181C4.46802 18.8302 4.1904 18.4134 4.00192 17.9546C3.81343 17.4959 3.71783 17.0042 3.72065 16.5083C3.72347 16.0123 3.82465 15.5218 4.01834 15.0652C4.21203 14.6086 4.49437 14.1949 4.84902 13.8482L7.6662 11.031C7.80694 10.8903 7.886 10.6994 7.886 10.5004C7.886 10.3014 7.80694 10.1105 7.6662 9.96975C7.52547 9.82902 7.3346 9.74996 7.13558 9.74996C6.93656 9.74996 6.74569 9.82902 6.60496 9.96975L3.78777 12.7879C2.80315 13.7725 2.25 15.1079 2.25 16.5004C2.25 17.8928 2.80315 19.2283 3.78777 20.2129C4.77238 21.1975 6.10781 21.7506 7.50027 21.7506C8.89273 21.7506 10.2282 21.1975 11.2128 20.2129L14.0309 17.3938C14.1715 17.2531 14.2504 17.0623 14.2504 16.8633C14.2503 16.6644 14.1712 16.4736 14.0304 16.333C13.8897 16.1924 13.6989 16.1135 13.4999 16.1136C13.301 16.1137 13.1102 16.1928 12.9696 16.3335Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


    <!-- related posts -->
    <div class="max-w-[1440px] mx-auto p-[12px] pt-[28px] pb-[80px] md:p-[80px]">
        <h2 class="related-posts-heading">Panašūs straipsniai</h2>
        <?php
        // Get current post categories
        $categories = get_the_category();
        if ($categories) {
            $category_ids = array_map(function ($category) {
                return $category->term_id;
            }, $categories);

            $args = [
                'category__in' => $category_ids, // Filter by categories
                'post__not_in' => [get_the_ID()], // Exclude the current post
                'posts_per_page' => 3, // Limit to 3 related posts
                'orderby' => 'date',
                'order' => 'DESC'
            ];

            $related_posts = new WP_Query($args);
            ?>

            <?php if ($related_posts->have_posts()): ?>
                <div class="grid grid-cols-1 gap-[24px] md:grid-cols-2 lg:grid-cols-3 related-posts">
                    <?php while ($related_posts->have_posts()):
                        $related_posts->the_post(); ?>
                        <article class="overflow-hidden transition duration-300 bg-[#f7f7f7] rounded-[16px] hover:shadow-lg">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                        class="md:min-h-[320px] object-cover w-full h-[200px] md:h-48">
                                <?php endif; ?>
                                <div class="p-[16px] pb-[24px]">
                                    <div class="flex flex-wrap gap-2">
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

                                    <h2 class="text-[20px] font-semibold text-gray-900 related-post-title my-[16px]">
                                        <?php the_title(); ?>
                                    </h2>

                                    <a href="<?php the_permalink(); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M20.7806 12.5306L14.0306 19.2806C13.8899 19.4213 13.699 19.5003 13.5 19.5003C13.301 19.5003 13.1101 19.4213 12.9694 19.2806C12.8286 19.1398 12.7496 18.949 12.7496 18.7499C12.7496 18.5509 12.8286 18.36 12.9694 18.2193L18.4397 12.7499H3.75C3.55109 12.7499 3.36032 12.6709 3.21967 12.5303C3.07902 12.3896 3 12.1988 3 11.9999C3 11.801 3.07902 11.6103 3.21967 11.4696C3.36032 11.3289 3.55109 11.2499 3.75 11.2499H18.4397L12.9694 5.78055C12.8286 5.63982 12.7496 5.44895 12.7496 5.24993C12.7496 5.05091 12.8286 4.86003 12.9694 4.7193C13.1101 4.57857 13.301 4.49951 13.5 4.49951C13.699 4.49951 13.8899 4.57857 14.0306 4.7193L20.7806 11.4693C20.8504 11.539 20.9057 11.6217 20.9434 11.7127C20.9812 11.8038 21.0006 11.9014 21.0006 11.9999C21.0006 12.0985 20.9812 12.1961 20.9434 12.2871C20.9057 12.3782 20.8504 12.4609 20.7806 12.5306Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </div>

                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php
        }
        ?>

    </div>
</div>
<style>
    .blog-single {
        font-size: 16px;
    }

    .blog-single h2.wp-block-heading {
        font-family: 'Erbaum-Regular';
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: 32px;
        margin-bottom: 16px;
    }

    .blog-single h2.wp-block-heading:not(:first-child) {
        margin-top: 40px;
    }

    .blog-single h3 {
        font-weight: normal;
        font-size: 22px;
        margin-bottom: 16px;
    }

    .blog-single .wp-block-table {
        border-radius: 16px;
        border: 1px solid #eeeeee;
        overflow: hidden;
        text-align: left !important;
    }

    .blog-single .wp-block-table tr:first-child {
        text-transform: uppercase;
    }

    .blog-single figure.wp-block-table {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .blog-single table {
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
    }

    /* .blog-single table tr:first-child {
        border-top: 2px solid #eeeeee;
    }

    .blog-single table tr:last-child {
        border-bottom: 2px solid #eeeeee;
    }

    .blog-single table tr td:first-child,  .blog-single table tr th:first-child {
        border-left: 2px solid #eeeeee;
    }

    .blog-single table tr td:last-child, .blog-single table tr th:last-child {
        border-right: 2px solid #eeeeee;
    }
*/

    .blog-single table td,
    .blog-single table th {
        border: none;
        padding: 24px;
        text-align: left;
        vertical-align: middle;
    }

    .blog-single table tr:first-child {
        background-color: #FFCC32;
        color: black;
        font-weight: bold;
        font-family: 'Degular';
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: 18px;
        */
        /* 150% */
        /* text-transform: uppercase; */
    }

    .blog-single img {
        width: 100%;
        border-radius: 16px;
        margin: 16px auto;
        max-height: 560px;
        object-fit: cover;
    }

    @media (max-width: 450px) {
        .blog-single img {
            margin-top: 0;
            margin-bottom: 32px;
        }
    }

    .wp-post-image {
        margin-top: 0;
        margin-bottom: 32px;
        ;
    }

    .blog-single .blog-post-content {
        /* Body 16/Regular */
        font-family: "DegularVariable";
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
    }

    .related-posts img {
        margin: 0;
        border-radius: 0;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .blog-post-content img {
        margin-top: 40px;
    }

    .blog-single ul {
        list-style-type: disc;
        margin-left: 16px
    }

    .share-heading {
        text-align: center;

        /* Body 18/UPPERCASE */
        font-family: Degular;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: 26px;
        /* 144.444% */
        text-transform: uppercase;
    }

    .related-post-title {

        /* H7/Desktop */
        font-family: 'Erbaum-Regular';
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        /* 140% */

    }

    .share-heading {
        text-align: center;

        /* Body 18/UPPERCASE */
        font-family: Degular !important;
        font-size: 18px !important;
        font-style: normal !important;
        font-weight: 700 !important;
        line-height: 26px;
        /* 144.444% */
        text-transform: uppercase;
    }

    .wp-block-list li {
        font-family: DegularVariable !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        margin: 8px 0;
    }

    /* sub-heading  */

    .wp-block-heading strong {
        font-weight: 400;
    }

    @media (max-width: 450px) {

        .blog-single table td,
        .blog-single table th {
            border: none;
            border: none;
            padding: 8px;
        }

        .related-posts-heading {
            margin-bottom: 24px !important;
        }
    }
</style>


<!-- home page posts styles for related posts -->

<style>
    .author-meta p {
        font-family: "DegularVariable";
    }

    .post-date {
        color: #6B6B6B;
        font-family: 'Degular';
        font-size: 12px;
        font-weight: bold;
    }

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
        font-family: Erbaum;
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
        margin-left: -4px;
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

    .related-posts-heading {
        /* H5/Desktop */
        font-family: 'Erbaum-Regular';
        font-size: 32px;
        font-style: normal;
        font-weight: 400;
        line-height: 40px;
        margin-bottom: 56px;
        color: black;
    }
</style>

<script>
    jQuery(document).ready(function ($) {
        $("table").each(function () {
            if (!$(this).parent().hasClass("wp-block-table")) {
                $(this).wrap('<figure class="wp-block-table"></figure>');
            }
        });
    });

</script>
<?php get_footer(); ?>s