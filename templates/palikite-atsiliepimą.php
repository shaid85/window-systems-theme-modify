<?php
/**
 * Template name: Palikite atsiliepimą
 */
get_header();

?>
<section
    class="flex flex-col w-full  mx-auto md:pt-[56px] md:pb-[80px] md:px-[80px] md:gap-[56px] px-[16px] py-[40px] gap-[24px] bg-[#F7F7F7]">
    <div class="flex flex-col gap-[16px] max-w-[880px] m-auto">
        <h1
            class="md:text-[40px] text-center text-[28px] md:leading-[48px] leading-[32px] font-[400] font-Erbaum text-[#000000]">
            Palikite atsiliepimą</h1>
        <p class="text-[18px] leading-[26px] text-center font-[400] font-degular-var text-[#000000]">Lorem ipsum dolor
            sit amet consectetur. Nec orci est sed arcu a mauris eu. Nulla velit orci quam at ultricies quisque fames
            urna. Etiam odio malesuada volutpat quisque velit erat ipsum nibh.</p>
    </div>
    <div>
        <?php
        $title = 'Feedback';
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
    <style>
        .wpcf7-form {
            padding-bottom: 0;
        }
        .wpcf7-form > p  br {
            display: none !important;
        }

        .wpcf7-form > p {
            display: flex;
            gap: 16px;
        }

        .wpcf7-form .wpcf7-submit  {
            margin-top: 8px;
            border-radius: 16px;
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const feedback = document.querySelector('textarea[name="cp_atsiliepimai_feedback"]');
            const counter = document.getElementById('word-count');

            // Hide initially
            counter.style.display = 'none';

            feedback.addEventListener('input', () => {
                const len = feedback.value.length;

                if (len >= 360) {
                    feedback.value = feedback.value.slice(0, 360);
                    counter.textContent = 'Pasiekėte 360 simbolių ribą.';
                    counter.style.display = 'block';
                } else {
                    counter.style.display = 'none';
                }
            });
        });
    </script>



    <style>
        #word-count {
            display: none;
            color: #c00;
            font-size: .9rem;
            margin-top: .25rem;
        }

        #success-message {
            margin: auto;
            height: 526px;
        }

        .wpcf7-form input[type='submit'] {
            font-family: "DegularTextBold" !important;
            cursor: pointer;
            outline: none;
            border: none;
        }

        .wpcf7-response-output {
            display: none;
        }
    </style>
</section>


<?php
get_footer();
?>