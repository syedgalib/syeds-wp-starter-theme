<?php
  namespace App\Get;

  /**
   * SiteLogo
   */
  class SiteLogo
  {
    public static function prepared($echo = true)
    {
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $custom_logo    = wp_get_attachment_image_src( $custom_logo_id , 'full' );

      if ($echo) { echo $custom_logo[0]; } else { return $custom_logo[0]; }
    }
  }