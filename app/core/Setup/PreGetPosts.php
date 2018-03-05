<?php
  namespace App\Setup;

  /**
   * PreGetPosts
   */
  class PreGetPosts
  {

    public function register()
    {
      add_action('pre_get_posts',array($this, 'search_filter'));
    }

    // search_filter
    public function search_filter($query) {
      if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_search) {
          $query->set('post_type', array( 'post' ) );
        }
      }
    }

  }
