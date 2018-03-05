<?php
  namespace App;

  /**
   * Init
   */
  class Init
  {

    // Get Srvices
    public static function get_services()
    {
      $services = [
        // Setup
        Setup\Enqueue::class,
        Setup\RemoveVersion::class,
        Setup\ThemeSupport::class,
        Setup\WidgetSetup::class,
        Setup\PreGetPosts::class,
        Setup\CustomNextPrevLinks::class,
      ];

      return $services;
    }

    // Register Services
    public static function register_srvices()
    {
      foreach (self::get_services() as $class) {
        $service = self::instantiate($class);
        if (method_exists($service, 'register')) {
          $service->register();
        }
      }
    }

    // Instantiate Class
    private static function instantiate($class)
    {
      return new $class();
    }
    
  }
