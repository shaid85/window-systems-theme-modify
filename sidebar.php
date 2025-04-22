  
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
<aside id="secondary" class="widget-area bg-gray-100 p-4 rounded-lg shadow-lg">
    <?php dynamic_sidebar( 'main-sidebar' ); ?>
</aside>
<?php endif; ?>
