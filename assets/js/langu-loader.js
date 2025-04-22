/**
 *
 * @param {} elementSelector
 * @returns
 * @desc - add loading state with any element provider uniquer selector to that
 */

window.showLoaderOn = function showLoaderOn(elementSelector) {
  const $target = document.querySelector(elementSelector);
  if (!$target) return;

  // Make sure the target is relatively positioned
  $target.classList.add("relative");

  // Disable mouse events
  $target.style.pointerEvents = "none";

  // Clone loader template and append to target
  const loaderTemplate = document.getElementById("global-loader-template");
  const loader = loaderTemplate.cloneNode(true);
  loader.id = ""; // remove ID from clone
  loader.classList.remove("hidden");

  // Add a unique data attribute to track it
  loader.setAttribute("data-loader", "true");

  // Append to target
  $target.appendChild(loader);
};

window.hideLoaderFrom = function hideLoaderFrom(elementSelector) {
  const $target = document.querySelector(elementSelector);
  if (!$target) return;

  // Re-enable mouse events
  $target.style.pointerEvents = "auto";

  // Remove loader
  const loader = $target.querySelector('[data-loader="true"]');
  if (loader) loader.remove();
};
