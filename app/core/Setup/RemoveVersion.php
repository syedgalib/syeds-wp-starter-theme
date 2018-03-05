<?php
  namespace App\Setup;

  /**
   * Remove Version
   */
  class RemoveVersion
  {

    public function register()
    {
      add_action('style_loader_src', array($this, 'remove_version_string'));
      add_action('script_loader_src', array($this, 'remove_version_string'));
      add_action('the_generator', array($this, 'remove_meta_version'));
    }

    public function remove_version_string($src)
    {
      global $wp_version;
      parse_str( parse_url($src, PHP_URL_QUERY), $query );
      if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
      }
      return $src;
    }

    public function remove_meta_version()
    {
      return;
    }
  }
