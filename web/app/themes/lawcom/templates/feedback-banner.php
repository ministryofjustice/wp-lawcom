<?php
  $banner_active = get_option('feedback_banner_active');

  if ($banner_active) {
    $banner_title = get_option('feedback_banner_title');
    $banner_text = get_option('feedback_banner_text');
    $banner_button_text = get_option('feedback_banner_button_text');
    $banner_link = get_option('feedback_banner_button_link');
  ?>

    <div class="container">
        <div class="feedback-banner">
            <?php
            ?>
            <h2 class="feedback-banner-title"><?php echo $banner_title; ?></h2>
            <p><?php echo $banner_text; ?></p>
            <a class="feedback-banner-link" href="<?php echo $banner_link; ?>"><?php echo $banner_button_text; ?></a>
        </div>
    </div>
<?php } ?>
