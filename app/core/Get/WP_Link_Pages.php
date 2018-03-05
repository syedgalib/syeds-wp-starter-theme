<?php
  namespace App\Get;


  /**
  * WP_Link_Pages
  */
  class WP_Link_Pages
  {
    
    public static function prepared($echo = 1)
    {
      $wp_link_pages = wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'syeds-wp-starter-theme' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'syeds-wp-starter-theme' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
        'echo'        => 0
      ) );

      if ($echo) { echo $wp_link_pages; } 
        else { return $wp_link_pages; }
    }

  }