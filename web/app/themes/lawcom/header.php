<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/ie7and8.css">
    <![endif]-->
</head>
<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
</div>
<![endif]-->

<header class="banner" role="banner">
    <div class="container navbar-expand-md navbar navbar-default navbar-static-top flex-wrap">
        <div id="branding" class="flex-fill">
            <a href="<?php echo home_url(); ?>">
                <img alt="Law Commissioners logo Logo" src="<?php bloginfo('template_directory'); ?>/assets/img/law-comm-logo.png" />
            </a>
        </div>

        <div id="search" class="align-self-start flex-fill flex-shrink-0">
            <?php get_search_form(); ?>
        </div>

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse"
                    aria-controls=".navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <nav class="collapse navbar-collapse col-sm-12" role="navigation">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
            endif;
            ?>
        </nav>
    </div>
</header>
<div class="container">
    <div class="feedback-banner">
        <h3>Website feedback</h3>
        <p>We are looking at improving this website and we need your feedback.</p>
        <a  class="feedback-banner-link" href="https://www.lawcom.gov.uk/">Give Feedback</a>
    </div>
</div>
