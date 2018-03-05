<?php
  namespace App\Setup;

  /**
  * CustomNextPrevLinks
  */
  class CustomNextPrevLinks
  {
    public function register()
    {
      add_filter('next_post_link', array($this, 'posts_link_next_class'));
      add_filter('previous_post_link', array($this, 'posts_link_prev_class'));
    }
    
    public function posts_link_next_class($format){
       $format = str_replace('href=', 'class="btn btn-primary" href=', $format);
       return $format;
    }

    public function posts_link_prev_class($format) {
       $format = str_replace('href=', 'class="btn btn-primary" href=', $format);
       return $format;
    }
    
  }