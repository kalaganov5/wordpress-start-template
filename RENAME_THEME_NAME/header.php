<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" sizes="any" type="image/svg+xml" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.svg">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-touch-icon.png">
  <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/safari-pinned-tab.svg" color="#00a3de">
  <meta name="msapplication-TileColor" content="#00a3de">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/site.webmanifest">
  <?php wp_head(); ?>
</head>

<body <?php
      body_class(); ?>>
  <svg width="0" height="0" class="hidden">
  </svg>

  <?php
  wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#masthead"><?php
                                                              esc_html_e('Skip to content', 'ewc'); ?></a>
    <header id="masthead" class="header">
    </header><!-- #masthead -->