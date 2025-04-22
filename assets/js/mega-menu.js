jQuery(document).ready(function ($) {
  $(".mega-menu > li").hover(
    function () {
      $(this).find(".mega-menu-dropdown").addClass("active");
      $("body").addClass("scroll-lock"); // Lock scrolling
    },
    function () {
      $(this).find(".mega-menu-dropdown").removeClass("active");
      $("body").removeClass("scroll-lock"); // Unlock scrolling
    }
  );
});
