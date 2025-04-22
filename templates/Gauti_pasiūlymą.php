<?php
/**
 * Template name: Gauti pasiūlymą
 */

get_header();

?>
<div class="bg-[#F7F7F7]">


    <!-- …all your HTML… -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('file-upload');
            const fileName = document.querySelector('.file-name');
            const defaultText = fileName.textContent;

            if (!fileInput) return;

            fileInput.addEventListener('change', function () {
                const file = this.files[0];
                if (!file) {
                    fileName.textContent = defaultText;
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    alert('Failo dydis viršija 5 MB.');
                    this.value = '';
                    fileName.textContent = defaultText;
                    return;
                }
                fileName.textContent = file.name;
            });
        });
    </script>

    <style>
        .custom-file-upload .file-input {
            position: absolute;
            width: 0;
            height: 0;
            opacity: 0;
            pointer-events: none;
        }

        .custom-file-upload .file-label {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            background-color: #fff;
            overflow: hidden;
            cursor: pointer;
        }

        .custom-file-upload .file-name {
            flex: 1;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            border: 1px solid #BEBEBE;
            border-radius: 12px;
            color: #6B6B6B;
        }

        .custom-file-upload .file-btn {
            padding: 0.75rem 1.5rem;
            background-color: #000;
            color: #fff;
            font-weight: 500;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            font-size: 16px;
            width: 165px;
            text-align: center;
            font-weight: 600;
        }

        .custom-file-upload .file-label:hover .file-btn {
            background-color: #333;
        }

        .file-label br,
        .custom-file-upload br {
            display: none;
        }
    </style>
    <section
        class="flex md:flex-row flex-col max-w-[1440px] w-full  mx-auto md:py-[56px] md:px-[80px] md:gap-[56px] px-[16px] py-[40px] gap-[24px] bg-[#F7F7F7]">
        <!-- left container -->
        <div class="flex gap-[48px] flex-col w-full md:w-[584px]">
            <div class="flex flex-col   gap-[16px]">
                <h1
                    class="md:text-[40px] text-[28px] md:leading-[48px] leading-[32px] font-[400] font-Erbaum text-[#000000]">
                    Gaukite geriausią pasiūlymą per 24 valandas!</h1>
                <?php
                $post_type = 'gauti_pasiulyma';
                $descs = get_option('cp_cpt_archive_descriptions', []);
                $full = $descs[$post_type] ?? '';
                ?>

                <?php if (!empty($full)): ?>
                    <p class="text-[18px] leading-[26px] font-[400] font-degular-var text-[#000000]">
                        <?php echo wp_kses_post($full); ?>
                    </p>
                <?php endif; ?>
            </div>
            <?php
            $args = array(
                'post_type' => 'atsiliepimai',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $testimonial_query = new WP_Query($args);

            if ($testimonial_query->have_posts()) {
                $testimonial_query->the_post();
                $meta = get_post_meta(get_the_ID());
                $name = $meta['cp_atsiliepimai_name'][0] ?? 'Olivia Gardens';
                $feedback = $meta['cp_atsiliepimai_feedback'][0] ?? 'Lorem ipsum dolor sit amet consectetur. Dui accumsan convallis viverra eu dignissim. Ut phasellus ut duis auctor. Nulla amet augue cursus ullamcorper enim. Eu urna quis tincidunt imperdiet fermentum.';
                $rating = intval($meta['cp_atsiliepimai_rating'][0] ?? 5);
                $trimmed_feedback = wp_trim_words($feedback, 5, '...');
                ?>
                <div class="md:flex hidden flex-col gap-[16px] p-[24px] rounded-[16px] bg-[#000000]">
                    <p class="text-[18px] leading-[26px] font-[400] font-degural-var text-[#ffffff]">
                        “<?php echo wp_kses_post($feedback); ?>”
                    </p>
                    <div class="flex gap-[16px] items-center">  
                        <div class="flex flex-col gap-[8px]">
                            <div class="flex flex-col gap-[1px]">
                                <h3 class="text-[16px] leading-[24px] text-[#ffffff] font-degural-bold">
                                    <?php echo esc_html($name); ?>
                                </h3>
                            </div>
                            <div class="flex gap-[8px]">
                                <?php
                                for ($i = 0; $i < $rating; $i++) { ?>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.9483 5.07866C13.8858 4.88649 13.7678 4.71712 13.6092 4.59188C13.4506 4.46665 13.2585 4.39116 13.0571 4.37491L9.36955 4.07741L7.9458 0.634288C7.86881 0.446674 7.73776 0.286193 7.56932 0.173249C7.40088 0.0603055 7.20267 0 6.99987 0C6.79707 0 6.59885 0.0603055 6.43041 0.173249C6.26197 0.286193 6.13093 0.446674 6.05393 0.634288L4.63143 4.07679L0.942054 4.37491C0.740289 4.39198 0.548047 4.4682 0.389413 4.59404C0.230778 4.71988 0.112807 4.88973 0.0502791 5.08232C-0.0122488 5.27491 -0.0165525 5.48167 0.0379073 5.67669C0.0923671 5.87172 0.203168 6.04633 0.356429 6.17866L3.16893 8.60554L2.31205 12.2343C2.26413 12.4314 2.27587 12.6384 2.34577 12.8288C2.41567 13.0193 2.54058 13.1847 2.70465 13.304C2.86873 13.4234 3.06456 13.4913 3.26729 13.4991C3.47002 13.5069 3.67051 13.4544 3.8433 13.348L6.99955 11.4055L10.1577 13.348C10.3305 13.4531 10.5306 13.5047 10.7327 13.4962C10.9348 13.4878 11.1299 13.4198 11.2934 13.3007C11.4569 13.1816 11.5816 13.0168 11.6516 12.8271C11.7217 12.6373 11.734 12.431 11.6871 12.2343L10.8271 8.60491L13.6396 6.17804C13.7941 6.04593 13.9059 5.87093 13.9608 5.67522C14.0158 5.47951 14.0114 5.27189 13.9483 5.07866Z"
                                            fill="#FFCC32" />
                                    </svg>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo '<div>No testimonial found.</div>';
            }
            wp_reset_postdata();
            ?>

        </div>
        <!-- right container -->
        <div>
            <?php
            $title = 'Gauti pasiūlymą';
            $form = new WP_Query([
                'post_type' => 'wpcf7_contact_form',
                'title' => $title,
                'posts_per_page' => 1
            ]);

            if ($form->have_posts()) {
                $form->the_post();
                echo do_shortcode('[contact-form-7 id="' . get_the_ID() . '" title="' . $title . '"]');
                wp_reset_postdata();
            }
            ?>

        </div>
        <div class="flex md:hidden flex-col md:gap-[24px] gap-[16px] md:p-[24px] p-[16px] rounded-[16px] bg-[#000000]">
            <p class="text-[18px] leading-[26px] font-[400] font-degular-var text-[#ffffff]">“Lorem ipsum dolor sit amet
                consectetur. Dui accumsan convallis viverra eu dignissim. Ut phasellus ut duis auctor. Nulla amet augue
                cursus ullamcorper enim. Eu urna quis tincidunt imperdiet fermentum.”</p>
            <div class="flex gap-[16px] items-center">
                <img class="rounded-[1000px] h-[56px] w-[56px] "
                    src="<?php echo LANGU_THEME_URI ?>/assets/images/Frame1214136332(2).png" alt="">
                <div class="flex flex-col gap-[8px]">
                    <div class="flex flex-col gap-[1px]">
                        <h3 class="text-[16px] leading-[24px] text-[#ffffff] font-degular-bold">Olivia Gardens</h3>
                        <p class="text-[16px] leading-[24px] font-[400] font-degular-var text-[#BEBEBE]">Lorem ipsum
                            dolor</p>
                    </div>
                    <div class="flex gap-[8px]">
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9483 5.07866C13.8858 4.88649 13.7678 4.71712 13.6092 4.59188C13.4506 4.46665 13.2585 4.39116 13.0571 4.37491L9.36955 4.07741L7.9458 0.634288C7.86881 0.446674 7.73776 0.286193 7.56932 0.173249C7.40088 0.0603055 7.20267 0 6.99987 0C6.79707 0 6.59885 0.0603055 6.43041 0.173249C6.26197 0.286193 6.13093 0.446674 6.05393 0.634288L4.63143 4.07679L0.942054 4.37491C0.740289 4.39198 0.548047 4.4682 0.389413 4.59404C0.230778 4.71988 0.112807 4.88973 0.0502791 5.08232C-0.0122488 5.27491 -0.0165525 5.48167 0.0379073 5.67669C0.0923671 5.87172 0.203168 6.04633 0.356429 6.17866L3.16893 8.60554L2.31205 12.2343C2.26413 12.4314 2.27587 12.6384 2.34577 12.8288C2.41567 13.0193 2.54058 13.1847 2.70465 13.304C2.86873 13.4234 3.06456 13.4913 3.26729 13.4991C3.47002 13.5069 3.67051 13.4544 3.8433 13.348L6.99955 11.4055L10.1577 13.348C10.3305 13.4531 10.5306 13.5047 10.7327 13.4962C10.9348 13.4878 11.1299 13.4198 11.2934 13.3007C11.4569 13.1816 11.5816 13.0168 11.6516 12.8271C11.7217 12.6373 11.734 12.431 11.6871 12.2343L10.8271 8.60491L13.6396 6.17804C13.7941 6.04593 13.9059 5.87093 13.9608 5.67522C14.0158 5.47951 14.0114 5.27189 13.9483 5.07866Z"
                                    fill="#FFCC32" />
                            </svg>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    input[type="checkbox"]:checked {
        accent-color: black;
    }

    input[type="checkbox"] {
        height: 24px !important;
        padding: 4px 8px !important;
        border-radius: 4px !important;
        display: inline-block;
        width: 24px;
    }

    .wpcf7-list-item-label {
        font-size: 16px !important;
    }

    form.wpcf7-form input[type="submit"] {
        font-family: 'DEGULARTEXT-BOLD';
    }
</style>
<?php
echo do_shortcode('[pasiekimai_section]');

get_footer();
?>