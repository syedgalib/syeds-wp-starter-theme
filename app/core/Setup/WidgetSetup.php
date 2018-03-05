<?php
  namespace App\Setup;

  /**
   * WidgetSetup
   */
  class WidgetSetup
  {

    public function register()
    {
      add_action('widgets_init', array($this, 'widget_setup'));
    }

    public function widget_setup()
    {
      $default_sidebar = array(
        'name'          => 'Sidebar',
        'id'            => 'default-sidebar',
        'class'         => 'cstm-sidebar',
        'description'   => 'Standard Sidebar',
        'before_widget' => '<aside id="%1$s" class="sidebar-widget default-widget %2$s" >' . "\n\t",
        'after_widget'  => '</aside>'. "\n",
        'before_title'  => '<h4 class="widget-title">'. "\n",
        'after_title'   => '</h4>',
      );

      $secondery_sidebar = array(
        'name'          => 'Secondery Sidebar',
        'id'            => 'secondery-sidebar',
        'class'         => 'cstm-sidebar',
        'description'   => 'Secondery Sidebar',
        'before_widget' => '<div class="col-lg-4">'. "\n\t".'<aside id="%1$s" class="sidebar-widget default-widget %2$s" >' . "\n\t",
        'after_widget'  => "</aside>\n</div>". "\n",
        'before_title'  => '<h4 class="widget-title">'. "\n",
        'after_title'   => '</h4>',
      );

      $footer_sidebar = array(
        'name'          => 'Footer Widgets',
        'id'            => 'footer-sidebar',
        'class'         => 'cstm-sidebar footer-widget',
        'description'   => 'Sidebar for Footer Widgets',
        'before_widget' => '<div id="%1$s" class="col-md-4 sidebar-widget footer-widget %2$s" >' . "\n",
        'after_widget'  => '</div>'. "\n",
        'before_title'  => '<h4 class="widget-title">'. "\n",
        'after_title'   => '</h4>',
      );
      register_sidebar($default_sidebar);
      register_sidebar($secondery_sidebar);
      register_sidebar($footer_sidebar);
    }
  }
