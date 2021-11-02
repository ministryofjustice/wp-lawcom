 <?php
    do_action('get_header');
    get_header();
?>

  <div id="content" class="wrap container" role="document">
    <div class="content row">
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
      <main class="main" role="main"
        <?php
          if (trim(get_the_title()) == "Cymraeg") {
            echo 'lang="cy-GB"';
          }
        ?>
      >
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

 <?php get_footer(); ?>
