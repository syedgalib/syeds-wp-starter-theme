<?php
  namespace App\Get;

  /**
   * Time
   */
  class Time
  {
    public static function prepared()
    {
      echo get_the_time('F j,Y') .' @'. get_the_time('g:i A');
    }
  }