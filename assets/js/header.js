document.addEventListener('DOMContentLoaded', () => {
  const siteHeader = document.getElementById('site-header');
  function updateHeaderHeight() {
    document.documentElement.style.setProperty('--header-height', siteHeader.offsetHeight + 'px');
  }
  updateHeaderHeight();
  window.addEventListener('resize', updateHeaderHeight);
  if (window.innerWidth < 768) return;
  let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    if (currentScroll <= 0) {
      siteHeader.classList.remove('sticky', 'hide');
      updateHeaderHeight();
    } else if (currentScroll > lastScrollTop) {
      if (siteHeader.classList.contains('sticky')) {
        siteHeader.classList.add('hide');
      }
    } else {
      siteHeader.classList.add('sticky');
      siteHeader.classList.remove('hide');
    }
    lastScrollTop = currentScroll;
  });
});
