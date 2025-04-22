<?php
$section_title = get_sub_field('section_title');

$facebook_url = get_sub_field('facebook_url');
$instagram_url = get_sub_field('instagram_url');

$add_custom_class = get_sub_field('add_custom_class');
?>
<!--//last section-->
<section id="promo_box_geriausi_pasiulymai" class="<?php echo acf_esc_html($add_custom_class); ?> relative overflow-hidden bg-[#161515] text-white pt-10 md:pt-16 pb-6 md:pb-32 px-1 md:px-2">

    <div class="mx-auto max-w-[1440px]">
        <!-- 1) MOBILE LAYOUT (block by default, hidden on md+) -->
        <div class="block text-center md:hidden">
            <h2 class="text-[38px] mx-[8px] md:mx-auto mb-6 leading-[42px]">
                <?php echo esc_html($section_title); ?>
            </h2>
            <div class="flex justify-center mb-14 space-x-2.5">
                <?php if ($facebook_url): ?>
                    <a href="<?php echo esc_url($facebook_url); ?>"
                        class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
                        aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M20 10.0801C20 4.55723 15.5229 0.0800781 10 0.0800781C4.47715 0.0800781 0 4.55723 0 10.0801C0 15.0713 3.65684 19.2084 8.4375 19.9586V12.9707H5.89844V10.0801H8.4375V7.87695C8.4375 5.3707 9.93047 3.98633 12.2147 3.98633C13.3084 3.98633 14.4531 4.18164 14.4531 4.18164V6.64258H13.1922C11.95 6.64258 11.5625 7.41348 11.5625 8.20508V10.0801H14.3359L13.8926 12.9707H11.5625V19.9586C16.3432 19.2084 20 15.0713 20 10.0801Z"
                                fill="black" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if ($instagram_url): ?>
                    <a href="<?php echo esc_url($instagram_url); ?>"
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
                <?php endif; ?>
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
                    <?php echo esc_html($section_title); ?>
                </h2>
                <div class="flex justify-center mb-8 space-x-2">
                    <!-- Facebook -->
                    <?php if ($facebook_url): ?>
                        <a href="<?php echo esc_url($facebook_url); ?>"
                            class="w-14 h-14 rounded-[16px] bg-[#FFCC32] flex items-center justify-center shadow hover:bg-yellow-400 transition-colors"
                            aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path
                                    d="M20 10.0801C20 4.55723 15.5229 0.0800781 10 0.0800781C4.47715 0.0800781 0 4.55723 0 10.0801C0 15.0713 3.65684 19.2084 8.4375 19.9586V12.9707H5.89844V10.0801H8.4375V7.87695C8.4375 5.3707 9.93047 3.98633 12.2147 3.98633C13.3084 3.98633 14.4531 4.18164 14.4531 4.18164V6.64258H13.1922C11.95 6.64258 11.5625 7.41348 11.5625 8.20508V10.0801H14.3359L13.8926 12.9707H11.5625V19.9586C16.3432 19.2084 20 15.0713 20 10.0801Z"
                                    fill="black" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram_url): ?>
                        <a href="<?php echo esc_url($instagram_url); ?>"
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
                    <?php endif; ?>
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