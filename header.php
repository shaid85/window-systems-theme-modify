<?php
/*
Website HEADER part.
- Includes <head> section
- Top header section with logo and menus
*/

require_once "functions.php";
require_once LANGU_THEME_DIR . "/inc/class-mega-menu.php";
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
        .menu .page_item a {
            color: white;
        }
    </style>
</head>

<body class="" <?php body_class("bg-black"); ?>>

    <section class="site-header" id="site-header">
        <!-- Top Header -->
        <div class=" bg-[#161515] text-white py-[12px] px-[40px] flex justify-between hidden md:flex m-0 w-full">
            <div class="container text-[12px] flex flex-wrap justify-between items-center px-4 w-[55%]">
                <ul class="flex flex-wrap gap-4 text-sm sm:gap-6">
                    <li class="flex items-center gap-2">
                        <span
                            class="text-[12px] font-[500] leading-[22px]"><?php echo esc_html(get_theme_mod('topbar_item_1')); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                            <path
                                d="M11 0.5H1C0.734784 0.5 0.48043 0.605357 0.292893 0.792893C0.105357 0.98043 0 1.23478 0 1.5V5C0 8.295 1.595 10.2919 2.93313 11.3869C4.37437 12.5656 5.80813 12.9656 5.87063 12.9825C5.95656 13.0059 6.04719 13.0059 6.13313 12.9825C6.19563 12.9656 7.6275 12.5656 9.07063 11.3869C10.405 10.2919 12 8.295 12 5V1.5C12 1.23478 11.8946 0.98043 11.7071 0.792893C11.5196 0.605357 11.2652 0.5 11 0.5ZM11 5C11 7.31687 10.1462 9.1975 8.4625 10.5887C7.72955 11.1923 6.89597 11.662 6 11.9762C5.11576 11.6675 4.29247 11.2061 3.5675 10.6131C1.86375 9.21937 1 7.33125 1 5V1.5H11V5ZM3.14625 6.85375C3.05243 6.75993 2.99972 6.63268 2.99972 6.5C2.99972 6.36732 3.05243 6.24007 3.14625 6.14625C3.24007 6.05243 3.36732 5.99972 3.5 5.99972C3.63268 5.99972 3.75993 6.05243 3.85375 6.14625L5 7.29313L8.14625 4.14625C8.19271 4.09979 8.24786 4.06294 8.30855 4.0378C8.36925 4.01266 8.4343 3.99972 8.5 3.99972C8.5657 3.99972 8.63075 4.01266 8.69145 4.0378C8.75214 4.06294 8.80729 4.09979 8.85375 4.14625C8.90021 4.1927 8.93705 4.24786 8.9622 4.30855C8.98734 4.36925 9.00028 4.4343 9.00028 4.5C9.00028 4.5657 8.98734 4.63075 8.9622 4.69145C8.93705 4.75214 8.90021 4.8073 8.85375 4.85375L5.35375 8.35375C5.30731 8.40024 5.25217 8.43712 5.19147 8.46228C5.13077 8.48744 5.06571 8.50039 5 8.50039C4.93429 8.50039 4.86923 8.48744 4.80853 8.46228C4.74783 8.43712 4.69269 8.40024 4.64625 8.35375L3.14625 6.85375Z"
                                fill="#FFCC32" />
                        </svg>
                    </li>
                    <li class="flex items-center gap-2">
                        <span
                            class="text-[12px] font-[500] leading-[22px]"><?php echo esc_html(get_theme_mod('topbar_item_2')); ?></span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.354 4.85372L6.35403 12.8537C6.30759 12.9002 6.25245 12.9371 6.19175 12.9623C6.13105 12.9874 6.06599 13.0004 6.00028 13.0004C5.93457 13.0004 5.86951 12.9874 5.80881 12.9623C5.74811 12.9371 5.69296 12.9002 5.64653 12.8537L2.14653 9.35372C2.05271 9.2599 2 9.13265 2 8.99997C2 8.86729 2.05271 8.74004 2.14653 8.64622C2.24035 8.5524 2.3676 8.49969 2.50028 8.49969C2.63296 8.49969 2.76021 8.5524 2.85403 8.64622L6.00028 11.7931L13.6465 4.14622C13.7403 4.0524 13.8676 3.99969 14.0003 3.99969C14.133 3.99969 14.2602 4.0524 14.354 4.14622C14.4478 4.24004 14.5006 4.36729 14.5006 4.49997C14.5006 4.63265 14.4478 4.7599 14.354 4.85372Z"
                                fill="#FFCC32" />
                        </svg>
                    </li>
                    <li class="flex items-center gap-2">
                        <span
                            class="text-[12px] font-[500] leading-[22px]"><?php echo esc_html(get_theme_mod('topbar_item_3')); ?></span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1734 4.31247C14.143 4.23751 14.095 4.17102 14.0333 4.11871C13.9716 4.0664 13.8982 4.02983 13.8193 4.01213C13.7404 3.99443 13.6584 3.99613 13.5803 4.01709C13.5022 4.03805 13.4303 4.07765 13.3709 4.13247L10.8521 6.45685L9.77523 6.2256L9.54398 5.14872L11.8684 2.62997C11.9232 2.57053 11.9628 2.49868 11.9837 2.42057C12.0047 2.34247 12.0064 2.26045 11.9887 2.18154C11.971 2.10264 11.9344 2.0292 11.8821 1.96753C11.8298 1.90586 11.7633 1.8578 11.6884 1.82747C11.0052 1.55112 10.2646 1.44678 9.53168 1.52361C8.79875 1.60045 8.09591 1.85611 7.48491 2.26813C6.87391 2.68016 6.37345 3.23593 6.0275 3.88663C5.68155 4.53733 5.50071 5.26303 5.50085 5.99997C5.50004 6.62227 5.62771 7.23804 5.87585 7.80872L2.11273 11.0625C2.10335 11.07 2.0946 11.0787 2.08585 11.0868C1.71074 11.462 1.5 11.9707 1.5 12.5012C1.5 12.7639 1.55174 13.024 1.65226 13.2667C1.75278 13.5094 1.90012 13.7299 2.08585 13.9156C2.27159 14.1013 2.4921 14.2487 2.73477 14.3492C2.97745 14.4497 3.23755 14.5015 3.50023 14.5015C4.03072 14.5015 4.53949 14.2907 4.9146 13.9156C4.92273 13.9075 4.93148 13.8981 4.93898 13.8893L8.1921 10.125C8.87737 10.4258 9.62685 10.5509 10.3727 10.4891C11.1185 10.4273 11.8371 10.1804 12.4635 9.77084C13.0899 9.36128 13.6042 8.80197 13.96 8.14354C14.3157 7.48511 14.5016 6.74836 14.5009 5.99997C14.5018 5.42159 14.3906 4.84851 14.1734 4.31247ZM10.0009 9.49997C9.40902 9.49916 8.82701 9.34866 8.30898 9.06247C8.20862 9.00703 8.09225 8.98776 7.97937 9.0079C7.8665 9.02804 7.76397 9.08637 7.68898 9.1731L4.19523 13.2193C4.00617 13.399 3.75442 13.4976 3.49365 13.4943C3.23289 13.4909 2.98375 13.3859 2.79935 13.2015C2.61495 13.0171 2.50988 12.7679 2.50654 12.5072C2.5032 12.2464 2.60186 11.9947 2.78148 11.8056L6.8246 8.31247C6.91149 8.23745 6.9699 8.13481 6.99005 8.02179C7.01019 7.90878 6.99084 7.79228 6.93523 7.69185C6.6165 7.11537 6.46692 6.46066 6.50369 5.80296C6.54045 5.14527 6.76208 4.5113 7.14308 3.97394C7.52408 3.43659 8.04899 3.01766 8.65746 2.76532C9.26593 2.51298 9.93326 2.43747 10.5827 2.54747L8.63273 4.6606C8.57847 4.71946 8.53914 4.79048 8.51804 4.8677C8.49694 4.94492 8.49469 5.02608 8.51148 5.10435L8.86523 6.74997C8.88546 6.84409 8.93244 6.93037 9.00051 6.99844C9.06858 7.06652 9.15486 7.11349 9.24898 7.13372L10.8959 7.48747C10.9741 7.50426 11.0553 7.50201 11.1325 7.48091C11.2097 7.45981 11.2807 7.42048 11.3396 7.36622L13.4527 5.41622C13.537 5.9181 13.5109 6.43231 13.3763 6.92308C13.2416 7.41386 13.0017 7.86941 12.6732 8.25807C12.3447 8.64673 11.9354 8.95915 11.4739 9.17362C11.0124 9.3881 10.5098 9.49946 10.0009 9.49997Z"
                                fill="#FFCC32" />
                        </svg>
                    </li>
                    <li class="flex items-center gap-2">
                        <span
                            class="text-[12px] font-[500] leading-[22px]"><?php echo esc_html(get_theme_mod('topbar_item_4')); ?></span>
                        <div class="flex items-center">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.9483 6.07872C14.8858 5.88655 14.7678 5.71718 14.6092 5.59195C14.4506 5.46671 14.2585 5.39122 14.0571 5.37497L10.3696 5.07747L8.9458 1.63435C8.86881 1.44673 8.73776 1.28625 8.56932 1.17331C8.40088 1.06037 8.20267 1.00006 7.99987 1.00006C7.79707 1.00006 7.59885 1.06037 7.43041 1.17331C7.26197 1.28625 7.13093 1.44673 7.05393 1.63435L5.63143 5.07685L1.94205 5.37497C1.74029 5.39204 1.54805 5.46826 1.38941 5.5941C1.23078 5.71994 1.11281 5.8898 1.05028 6.08238C0.987751 6.27497 0.983448 6.48173 1.03791 6.67675C1.09237 6.87178 1.20317 7.04639 1.35643 7.17872L4.16893 9.6056L3.31205 13.2344C3.26413 13.4315 3.27587 13.6384 3.34577 13.8289C3.41567 14.0193 3.54058 14.1847 3.70465 14.3041C3.86873 14.4234 4.06456 14.4913 4.26729 14.4992C4.47002 14.507 4.67051 14.4544 4.8433 14.3481L7.99955 12.4056L11.1577 14.3481C11.3305 14.4532 11.5306 14.5047 11.7327 14.4963C11.9348 14.4879 12.1299 14.4198 12.2934 14.3008C12.4569 14.1817 12.5816 14.0169 12.6516 13.8271C12.7217 13.6374 12.734 13.4311 12.6871 13.2344L11.8271 9.60497L14.6396 7.1781C14.7941 7.04599 14.9059 6.871 14.9608 6.67529C15.0158 6.47958 15.0114 6.27195 14.9483 6.07872Z"
                                    fill="#FFCC32" />
                            </svg>
                            <span
                                class="text-[12px] font-[500] ml-2 leading-[22px]"><?php echo esc_html(get_theme_mod('topbar_rating')); ?></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="w-[45%] degular ">
                <div class="container flex items-center justify-end inline-block gap-6 px-4 md:flex">
                    <div class="flex items-center gap-2 text-[12px] font-[500] leading-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M8 1.5C6.71442 1.5 5.45772 1.88122 4.3888 2.59545C3.31988 3.30968 2.48676 4.32484 1.99479 5.51256C1.50282 6.70028 1.37409 8.00721 1.6249 9.26809C1.8757 10.529 2.49477 11.6872 3.40381 12.5962C4.31285 13.5052 5.47104 14.1243 6.73192 14.3751C7.99279 14.6259 9.29973 14.4972 10.4874 14.0052C11.6752 13.5132 12.6903 12.6801 13.4046 11.6112C14.1188 10.5423 14.5 9.28558 14.5 8C14.4982 6.27665 13.8128 4.62441 12.5942 3.40582C11.3756 2.18722 9.72335 1.50182 8 1.5ZM8 13.5C6.91221 13.5 5.84884 13.1774 4.94437 12.5731C4.0399 11.9687 3.33495 11.1098 2.91867 10.1048C2.50238 9.09977 2.39347 7.9939 2.60568 6.927C2.8179 5.86011 3.34173 4.8801 4.11092 4.11091C4.8801 3.34172 5.86011 2.8179 6.92701 2.60568C7.9939 2.39346 9.09977 2.50238 10.1048 2.91866C11.1098 3.33494 11.9687 4.03989 12.5731 4.94436C13.1774 5.84883 13.5 6.9122 13.5 8C13.4983 9.45818 12.9184 10.8562 11.8873 11.8873C10.8562 12.9184 9.45819 13.4983 8 13.5ZM12 8C12 8.13261 11.9473 8.25979 11.8536 8.35355C11.7598 8.44732 11.6326 8.5 11.5 8.5H8C7.86739 8.5 7.74022 8.44732 7.64645 8.35355C7.55268 8.25979 7.5 8.13261 7.5 8V4.5C7.5 4.36739 7.55268 4.24021 7.64645 4.14645C7.74022 4.05268 7.86739 4 8 4C8.13261 4 8.25979 4.05268 8.35356 4.14645C8.44732 4.24021 8.5 4.36739 8.5 4.5V7.5H11.5C11.6326 7.5 11.7598 7.55268 11.8536 7.64645C11.9473 7.74021 12 7.86739 12 8Z" fill="white"/>
                        </svg>
                        <?php echo esc_html(get_theme_mod('topbar_timing')); ?>
                    </div>
                    <div class="flex items-center gap-2 text-[12px] font-[500] leading-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 13 13" fill="none">
                            <path
                                d="M11.8981 8.90362L8.95376 7.58425L8.94563 7.5805C8.79278 7.51512 8.62603 7.48888 8.46049 7.50416C8.29494 7.51944 8.13581 7.57575 7.99751 7.668C7.98122 7.67875 7.96557 7.69044 7.95063 7.703L6.42938 8.99987C5.46563 8.53175 4.47063 7.54425 4.00251 6.593L5.30126 5.04862C5.31376 5.033 5.32563 5.01737 5.33688 5.0005C5.42715 4.86256 5.48192 4.70445 5.49631 4.54023C5.5107 4.37601 5.48428 4.21078 5.41938 4.05925V4.05175L4.09626 1.10237C4.01047 0.904414 3.86296 0.739508 3.67575 0.632273C3.48854 0.525037 3.27166 0.481224 3.05751 0.507374C2.21061 0.618815 1.43324 1.03473 0.870589 1.67743C0.307935 2.32014 -0.00152558 3.14568 5.6554e-06 3.99987C5.6554e-06 8.96237 4.03751 12.9999 9.00001 12.9999C9.8542 13.0014 10.6797 12.6919 11.3224 12.1293C11.9651 11.5666 12.3811 10.7893 12.4925 9.94237C12.5187 9.72829 12.475 9.51147 12.3679 9.32427C12.2607 9.13706 12.096 8.98951 11.8981 8.90362ZM9.00001 11.9999C6.87898 11.9976 4.8455 11.154 3.34571 9.65417C1.84592 8.15438 1.00232 6.12089 1.00001 3.99987C0.997654 3.38955 1.21754 2.79925 1.61859 2.33919C2.01964 1.87913 2.57444 1.58079 3.17938 1.49987C3.17913 1.50237 3.17913 1.50488 3.17938 1.50737L4.49188 4.44487L3.20001 5.99112C3.18689 6.00621 3.17498 6.0223 3.16438 6.03925C3.07033 6.18357 3.01515 6.34975 3.0042 6.52166C2.99325 6.69358 3.0269 6.86541 3.10188 7.0205C3.66813 8.17862 4.83501 9.33675 6.00563 9.90237C6.16186 9.97665 6.33468 10.0091 6.50722 9.99665C6.67976 9.98416 6.8461 9.92713 6.99001 9.83112C7.00605 9.82031 7.02149 9.80863 7.03626 9.79612L8.55563 8.49987L11.4931 9.8155C11.4931 9.8155 11.4981 9.8155 11.5 9.8155C11.4201 10.4213 11.1222 10.9772 10.662 11.3793C10.2019 11.7813 9.61104 12.0019 9.00001 11.9999Z"
                                fill="white" />
                        </svg>
                        <?php echo esc_html(get_theme_mod('topbar_phone')); ?>
                    </div>
                    <div class="flex items-center gap-2 text-[12px] font-[500] leading-[22px]">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.66667 2.66669H13.3333C14.0667 2.66669 14.6667 3.26669 14.6667 4.00002V12C14.6667 12.7334 14.0667 13.3334 13.3333 13.3334H2.66667C1.93333 13.3334 1.33333 12.7334 1.33333 12V4.00002C1.33333 3.26669 1.93333 2.66669 2.66667 2.66669Z"
                                stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.6667 4L8 8.66667L1.33333 4" stroke="white" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php echo esc_html(get_theme_mod('topbar_email')); ?>
                    </div>
                </div>
            </div>
        </div>


        <header class="bg-black shadow-md p-[16px] md:p-0 md:px-14 relative">
            <div class="flex items-center justify-between ">
                <!-- Logo -->

                <div class="text-xl font-bold text-white w-[72%] md:w-[15%]">
                    <a href="<?php echo home_url(); ?>">
                        <?php if (get_theme_mod('header_logo')): ?>
                            <img src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>"
                                class="h-auto w-[170px] object-cover">
                        <?php else: ?>
                            <?php bloginfo('name'); ?>
                        <?php endif; ?>
                    </a>
                </div>


                <!-- Navigation -->
                <div class="flex items-center gap-4 w-[85%] justify-end navigation">
                    <nav class="hidden md:flex ">
                        <?php
                        // wp_nav_menu([
                        //     'theme_location' => 'primary',
                        //     'container' => false,
                        //     'items_wrap' => '<ul class="flex text-white nav-menu">%3$s</ul>'/3
                        // ]);
                        
                        if (has_nav_menu('mega_menu')) {
                            wp_nav_menu([
                                'theme_location' => 'mega_menu',
                                'container' => 'nav',
                                'container_class' => 'mega-menu-container',
                                'menu_class' => 'mega-menu',
                                'depth' => 2,
                                'walker' => new Langue_Mega_Menu_Walker(),
                            ]);
                        } else {
                            echo $languag_fallback_menu->display_menu();
                        }
                        ?>
                    </nav>
                    <div class="hidden gap-4 md:flex">
                        <a href="/calculators"
                            class="bg-white px-[16px] py-[12px] text-black text-center rounded-[16px] w-[180px]">
                            Kainų skaičiuoklė
                        </a>
                        <a href="/gauti_pasiulyma"
                            class="bg-[#FFCC32] px-[16px] py-[12px] text-black text-center rounded-[16px] w-[180px]">
                            Gauti pasiūlymą
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="text-gray-700 md:hidden focus:outline-none">
                        <?php echo file_get_contents(LANGU_THEME_DIR . '/assets/icons/svg/menu.svg'); ?>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden left-0 pt-[20px] p-4 md:hidden absolute w-full min-h-[100vh] z-[9999] bg-white text-black"
                style="top: 76px">
                <?php
                if (has_nav_menu("mega_menu")) {
                    wp_nav_menu([
                        'theme_location' => 'mega_menu',
                        'container' => false,
                        'items_wrap' => '<ul class="">%3$s</ul>',
                        'walker' => new Custom_Collapsible_Walker()
                    ]);
                } else {
                    echo $languag_fallback_menu->display_menu();
                }

                ?>
            </div>

        </header>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle main menu
            const menuToggle = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            const closeIcon = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.281 18.2198C19.3507 18.2895 19.406 18.3722 19.4437 18.4632C19.4814 18.5543 19.5008 18.6519 19.5008 18.7504C19.5008 18.849 19.4814 18.9465 19.4437 19.0376C19.406 19.1286 19.3507 19.2114 19.281 19.281C19.2114 19.3507 19.1286 19.406 19.0376 19.4437C18.9465 19.4814 18.849 19.5008 18.7504 19.5008C18.6519 19.5008 18.5543 19.4814 18.4632 19.4437C18.3722 19.406 18.2895 19.3507 18.2198 19.281L12.0004 13.0607L5.78104 19.281C5.64031 19.4218 5.44944 19.5008 5.25042 19.5008C5.05139 19.5008 4.86052 19.4218 4.71979 19.281C4.57906 19.1403 4.5 18.9494 4.5 18.7504C4.5 18.5514 4.57906 18.3605 4.71979 18.2198L10.9401 12.0004L4.71979 5.78104C4.57906 5.64031 4.5 5.44944 4.5 5.25042C4.5 5.05139 4.57906 4.86052 4.71979 4.71979C4.86052 4.57906 5.05139 4.5 5.25042 4.5C5.44944 4.5 5.64031 4.57906 5.78104 4.71979L12.0004 10.9401L18.2198 4.71979C18.3605 4.57906 18.5514 4.5 18.7504 4.5C18.9494 4.5 19.1403 4.57906 19.281 4.71979C19.4218 4.86052 19.5008 5.05139 19.5008 5.25042C19.5008 5.44944 19.4218 5.64031 19.281 5.78104L13.0607 12.0004L19.281 18.2198Z" fill="white"/>
                </svg>

            `;

            const menuIcon = `
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                        <path
                            d="M18 7C18 7.19891 17.921 7.38968 17.7803 7.53033C17.6397 7.67098 17.4489 7.75 17.25 7.75H0.75C0.551088 7.75 0.360322 7.67098 0.21967 7.53033C0.0790178 7.38968 0 7.19891 0 7C0 6.80109 0.0790178 6.61032 0.21967 6.46967C0.360322 6.32902 0.551088 6.25 0.75 6.25H17.25C17.4489 6.25 17.6397 6.32902 17.7803 6.46967C17.921 6.61032 18 6.80109 18 7ZM0.75 1.75H17.25C17.4489 1.75 17.6397 1.67098 17.7803 1.53033C17.921 1.38968 18 1.19891 18 1C18 0.801088 17.921 0.610322 17.7803 0.46967C17.6397 0.329018 17.4489 0.25 17.25 0.25H0.75C0.551088 0.25 0.360322 0.329018 0.21967 0.46967C0.0790178 0.610322 0 0.801088 0 1C0 1.19891 0.0790178 1.38968 0.21967 1.53033C0.360322 1.67098 0.551088 1.75 0.75 1.75ZM17.25 12.25H0.75C0.551088 12.25 0.360322 12.329 0.21967 12.4697C0.0790178 12.6103 0 12.8011 0 13C0 13.1989 0.0790178 13.3897 0.21967 13.5303C0.360322 13.671 0.551088 13.75 0.75 13.75H17.25C17.4489 13.75 17.6397 13.671 17.7803 13.5303C17.921 13.3897 18 13.1989 18 13C18 12.8011 17.921 12.6103 17.7803 12.4697C17.6397 12.329 17.4489 12.25 17.25 12.25Z"
                            fill="white" />
                    </svg>
            `

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                if (!mobileMenu.classList.contains("hidden")) {
                    menuToggle.innerHTML = closeIcon;
                } else {
                    menuToggle.innerHTML = menuIcon;
                }
            });

            // Toggle sub-menus
            const subMenuToggles = document.querySelectorAll('.submenu-toggle');
            subMenuToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const submenu = toggle.nextElementSibling;
                    submenu.classList.toggle('hidden');
                    toggle.classList.toggle('rotate-90');
                });
            });
        });
    </script>


    <?php


    class Custom_Collapsible_Walker extends Walker_Nav_Menu
    {
        public function start_lvl(&$output, $depth = 0, $args = null)
        {
            $output .= '<ul class="hidden pl-2 ml-2 sub-menu">';
        }

        public function end_lvl(&$output, $depth = 0, $args = null)
        {
            $output .= '</ul>';
        }

        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $has_children = !empty($args->walker->has_children);

            $output .= '<li class="relative">';

            // Link or text
            $output .= '<a href="' . $item->url . '" class="block py-2 white ">';
            $output .= $item->title;
            $output .= '</a>';

            // Add toggle button for sub-menus
            if ($has_children) {
                $output .= '<button type="button" class="absolute right-0 transition-transform transform submenu-toggle top-2">';
                $output .= '<svg class="rotate-90" width="24" height="24" viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
<path d="M20.031 15.5302C19.9614 15.6 19.8787 15.6553 19.7876 15.693C19.6966 15.7308 19.599 15.7502 19.5004 15.7502C19.4019 15.7502 19.3043 15.7308 19.2132 15.693C19.1222 15.6553 19.0394 15.6 18.9698 15.5302L12.0004 8.55993L5.03104 15.5302C4.89031 15.671 4.69944 15.75 4.50042 15.75C4.30139 15.75 4.11052 15.671 3.96979 15.5302C3.82906 15.3895 3.75 15.1986 3.75 14.9996C3.75 14.8006 3.82906 14.6097 3.96979 14.469L11.4698 6.96899C11.5394 6.89926 11.6222 6.84394 11.7132 6.80619C11.8043 6.76845 11.9019 6.74902 12.0004 6.74902C12.099 6.74902 12.1966 6.76845 12.2876 6.80619C12.3787 6.84394 12.4614 6.89926 12.531 6.96899L20.031 14.469C20.1008 14.5386 20.1561 14.6214 20.1938 14.7124C20.2316 14.8035 20.251 14.9011 20.251 14.9996C20.251 15.0982 20.2316 15.1958 20.1938 15.2868C20.1561 15.3779 20.1008 15.4606 20.031 15.5302Z" fill="black"/>
</svg>
'; // Triangle icon
                $output .= '</button>';
            }
        }

        public function end_el(&$output, $item, $depth = 0, $args = null)
        {
            $output .= '</li>';
        }
    }

    ?>

    <div id="global-loader-template"
        class="absolute inset-0 z-50 flex items-center justify-center hidden element-loader bg-blue-500/40 backdrop-blur-sm rounded-[16px]">
        <div class="langu-loader"></div>
    </div>


    <style>
        .langu-loader {
            width: 50px;
            aspect-ratio: 1;
            --_c: no-repeat radial-gradient(farthest-side, #000000 92%, #0000);
            background: var(--_c) top, var(--_c) left, var(--_c) right, var(--_c) bottom;
            background-size: 12px 12px;
            animation: l7 1s infinite;
            background-color: white;
            border-radius: 8px;
            padding: 10px;
        }

        @keyframes l7 {
            to {
                transform: rotate(0.5turn);
            }
        }

        .element-loader {
            pointer-events: none;
        }

        @media (max-width: 450px) {
            .site-header header {
                border-bottom: 1px solid #6B6B6B;
            }
        }
    </style>