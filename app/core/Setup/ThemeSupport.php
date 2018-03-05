<?php
  namespace App\Setup;

  /**
   * Adding Theme Support
   */
  class ThemeSupport
  {

    public function register()
    {
      add_action('init', array($this, 'initial_theme_support'));
      add_action('after_setup_theme', array($this, 'after_setup_theme_support'));
    }

    // Initial Theme Support
    public function initial_theme_support()
    {
      // Load Theme Textdomain
      load_theme_textdomain('syeds-wp-starter-theme');
      
      /*
       * Let WordPress manage the document title.
       * By adding theme support, we declare that this theme does not use a
       * hard-coded <title> tag in the document head, and expect WordPress to
       * provide it for us.
       */
      add_theme_support('title-tag');

      // Add default posts and comments RSS feed links to head.
      add_theme_support('automatic-feed-links');

      /*
       * This theme styles the visual editor to resemble the theme style,
       * specifically font, colors, icons, and column width.
       */
      add_editor_style(array('asset/css/editor-style.css'));

      add_theme_support('html5');
      add_theme_support('menus');
      add_theme_support('custom-header');
      add_theme_support('custom-background');
      add_theme_support('post-thumbnails');
      add_theme_support(
        'post-formats', array('aside','image','gallery','video','link')
      );

      // Register Nav Menu
      register_nav_menu('primary-navigation', 'Primary Navigation Menu');

      // Set Content Width
      if ( ! isset( $content_width ) ) {
        $content_width = 1140;
      }
    }

    // After Setup Theme Support
    public function after_setup_theme_support()
    {
      // Add Theme Support for Custom Logo
      $defaults = array(
        'height'      => 200,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
      );
      add_theme_support( 'custom-logo', $defaults );

      
    }
  }
