<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/asset/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!--==================================-->
  <!-- Header -->
  <!--==================================-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php bloginfo('name') ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
        wp_nav_menu([
         'menu'            => 'primary-navigation',
         'theme_location'  => 'primary-navigation',
         'container'       => 'div',
         'container_id'    => 'primary-navigation',
         'container_class' => 'collapse navbar-collapse',
         'menu_id'         => false,
         'menu_class'      => 'navbar-nav ml-auto',
         'depth'           => 2,
         'fallback_cb'     => 'bs4navwalker::fallback',
         'walker'          => new App\Setup\bs4navwalker()
       ]);
      ?>
  </nav>