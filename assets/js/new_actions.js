// Accordion inside form
document.addEventListener('DOMContentLoaded', function () {
    // See more toggle
    document.querySelectorAll('.see-more-btn').forEach(button => {
        button.addEventListener('click', () => {
            const inner = button.previousElementSibling;
            const outer = button.closest('.long-list');

            const isExpanded = inner.classList.toggle('expanded');
            button.textContent = isExpanded ? 'Rodyti mažiau' : 'Rodyti daugiau';

            // Adjust the outer container height after expanding/collapsing
            if (isExpanded) {
                outer.style.maxHeight = inner.scrollHeight + 40 + "px"; // Add padding or spacing if needed
            } else {
                outer.style.maxHeight = inner.offsetHeight + 40 + "px";
            }

        });
    });
});