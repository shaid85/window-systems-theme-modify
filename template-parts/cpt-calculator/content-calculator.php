<?php

defined("ABSPATH") || exit;

$thumbnail_url = get_the_post_thumbnail_url();


?>

<div class="bg-white p-[16px] pb-[32px] rounded-[16px] flex flex-col col-span-4 md:col-span-1 gap-[32px] min-h-[410px] max-h-[410px]">
  <div class="post-img-wrap bg-[#f7f7f7] p-[32px] rounded-[8px]  max-h-[280px] overflow-hidden">
    <img src="<?php echo esc_url($thumbnail_url); ?>" class="object-contain w-full h-full"/>
  </div>
  <h2 class="post-title text-[18px]"><?php echo the_title(); ?></h2>
  <a href="<?php echo esc_url(get_permalink()); ?>" class="text-center bg-yellow text-black font-degular-var p-[16px] rounded-[16px]">
    Skaičiuoti
  </a>
</div>