<?php
  namespace App\Setup;

  /**
   * Enqueue Style and Script
   */
  class Enqueue
  {

    public function register()
    {
      add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
      add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }

    #===============================================
    # Enqueue Style and Scripts
    #===============================================
    public function enqueue_scripts()
    {
      /*========== CSS ==========*/
      // Bootstrap Styles
      wp_register_style('bootstrap', app_get_style('bootstrap-v4.min'), array(), '4.0.0');
      wp_enqueue_style('bootstrap');

      // Font Awesome
      wp_register_style('font-awesome', app_get_style('fontawesome-all.min'), array(), '5.0.6');
      wp_enqueue_style('font-awesome');

      // Custom Styles
      wp_register_style('main', app_get_style('main'), array(), '1.0.0');
      wp_enqueue_style('main');
      
      
      /*========== JS ==========*/
      // jQuery
      wp_dequeue_script('jquery');
      wp_dequeue_script('jquery-core');
      wp_dequeue_script('jquery-migrate');
      wp_enqueue_script('jquery', false, array(), false, true);
      wp_enqueue_script('jquery-core', false, array(), false, true);
      wp_enqueue_script('jquery-migrate', false, array(), false, true);

      // Enqueue Comment Reply Script
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
      }

      // Bootstrap Scripts
      wp_register_script('bootstrap', app_get_script('bootstrap-v4.min'), array(), '4.0.0', true);
      wp_enqueue_script('bootstrap');

      wp_register_script('popper', app_get_script('popper.min'), array(), true);
      wp_enqueue_script('popper');

      // Custom Scripts
      wp_register_script('ajax-form-handler', app_get_script('ajax-form-handler'), array(), '1.0.0', true);
      wp_enqueue_script('popper');

      wp_register_script('main', app_get_script('main'), array(), '1.0.0', true);
      wp_enqueue_script('main');

      wp_register_script('map', app_get_script('map'), array(), '1.0.0', true);
      wp_enqueue_script('map');
    }

    #===============================================
    # Enqueue Admin Style and Scripts
    #===============================================
    public function enqueue_admin_scripts($hook)
    {
      /*========== CSS ==========*/
      wp_register_style('admin', app_get_style('admin'), array(), '1.0.0');
      wp_enqueue_style('admin');

      /*========== JS ==========*/
      wp_register_script('admin', app_get_script('admin'), array(), '1.0.0', true);
      wp_enqueue_script('admin');
    }
  }
