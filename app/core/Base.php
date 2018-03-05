<?php
  namespace App;

  /**
   * Base
   */
  class Base
  {
    public static $view;

    function __construct()
    {
      $path = get_template_directory() . '/app/views/';
    }
  }
