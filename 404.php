<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); // Include the header template
?>

<section class="flex gap-6 md:gap-8 relative flex-col items-start pt-16 px-4 pb-64 md:px-40 md:pt-30 md:pb-68 w-full bg-neutral-900">
    <img 
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb6c3eaa3d3c8c77220b4ad2b6d6dc63bf7fc57456fcf07a1f97e749b5045e69?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
        alt="Error icon"
        class="object-contain z-0 w-10 md:w-14 aspect-square"
    />

    <div class="flex z-0 flex-col justify-center max-w-full text-white">
        <h1 class="erbaum-regular text-3xl md:text-4xl leading-tight">
            Ups! Šis puslapis nerastas...
        </h1>
        <p class="degular-variable mt-2 text-base md:text-lg">
            Atrodo, kažkas ne taip… Galbūt puslapis buvo perkeltas, ištrintas arba adresas įvestas neteisingai.
        </p>
    </div>

    <a 
        href="/"
        class="degular-regular z-0 gap-2.5 self-stretch px-4 py-3 text-sm font-bold text-center text-black bg-amber-400 rounded-2xl w-full md:w-[220px] inline-block"
    >
        Grįžti į pagrindinį
    </a>

    <svg
        width="106"
        height="238"
        viewBox="0 0 106 238"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        class="hidden md:block object-contain absolute bottom-10 z-0 max-w-full h-56 aspect-[1.02] left-[-4rem] stroke-[7px] stroke-amber-400 w-[228px]"
    >
        <path
            d="M87.806 163.112L87.8063 163.112C102.219 154.4 106.807 135.582 98.0769 121.268L98.0757 121.266L35.0785 18.1258L35.0783 18.1255C26.32 3.78907 7.42674 -0.796792 -6.9433 7.91075C-6.94389 7.91111 -6.94447 7.91146 -6.94505 7.91182L-117.792 74.902L-117.792 74.9022C-132.197 83.6101 -136.831 102.427 -128.06 116.75C-128.06 116.751 -128.059 116.751 -128.059 116.752L-65.064 219.889L-65.0639 219.889C-56.3014 234.232 -37.4075 238.773 -23.046 230.106L-23.0441 230.105L87.806 163.112Z"
            stroke="#FFCC32"
            stroke-width="7"
        />
    </svg>

    <!-- Right SVG loaded from theme folder -->
    <div class="hidden md:block object-contain absolute top-12 right-0 z-0 w-[235px] h-[350px]">
        <img 
            src="<?php echo LANGU_THEME_URI ?>/assets/icons/svg/404.svg" 
            alt="404 Error"
            class="w-full h-full transform scale-x-[-1] origin-right"
        />
    </div>
</section>

<?php
get_footer(); // Include the footer template
?>
