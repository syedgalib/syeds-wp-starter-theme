<?php
  namespace App\Get;

  /**
   * Thumbnail
   */
  class Thumbnail
  {

    public static function prepared($args = array())
    {
      $thumbnail_args = [ 'url' => true, 'default' => false ];
      $thumbnail      = '';
      $default_avater = '';

      if (isset($args['url'])) {
        $thumbnail_args['url'] = $args['url'];
      }

      if (isset($args['default'])) {
        $thumbnail_args['default'] = $args['default'];
        $default_avater = self::get_default_avater($thumbnail_args['default']);
      }

      // If Post has thumbnail
      if (has_post_thumbnail()):
        // Echo Thumbnail url if "url" arg is true
        if ($thumbnail_args['url']) {
          $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'full');
          echo $thumbnail;
        } else {
          // Return Thumbnail if "url" arg is false
          the_post_thumbnail('medium_large', array(
            'class' => 'card-img-top img-fluid'
          ));
        }

      // If Post has no thumbnail but has default avater
      elseif ($default_avater):
        if ($thumbnail_args['url']) {
          echo $default_avater;
        } else { return $default_avater; }
        
      endif;
    }

    // Fetch Avater by Name
    public static function get_default_avater($name)
    {
      $avater_archive = self::default_avater();
      foreach ($avater_archive as $key => $value) {
        if ($key == $name) {
          return $value;
        }
      }
      return false;
    }

    // Storing Default Avater Path in Array
    public static function default_avater()
    {
      $path = get_template_directory_uri() . '/asset/images/';
      $default_avaters = [
        'default' => $path . 'default-avater.png',
      ];

      return $default_avaters;
    }
  }