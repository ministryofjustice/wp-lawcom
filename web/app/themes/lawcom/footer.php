<footer class="content-info" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
        <div id="footer-links">
    <?php wp_nav_menu( array('menu' => 'Footer links' )); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
