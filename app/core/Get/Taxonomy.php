<?php
  namespace App\Get;
  use App\Base;

  /**
   * Taxonomy
   */
  class Taxonomy
  {
    public static function prepared()
    {

      $taxonomy = '';

      if (get_the_category()) {
        $taxonomy .= 'Category : ' . self::get_links(get_the_category()) . '<br />';
      }

      if (get_the_tags()) {
        $taxonomy .= 'Tags : ' . self::get_links(get_the_tags()) . '<br />';
      }
     
      $time = get_the_time('F j,Y') .' @'. get_the_time('g:i A');

      $data = array(
        'taxonomy'  => $taxonomy,
        'time'      => $time,
      );

      echo $taxonomy;
    }

    public static function get_links($links)
    {
      $output = '';

      if (!empty($links)) {

        $taxonomy  = ($links[0]->taxonomy == 'category') ? 'category' : 'tag';
        $class     = ($links[0]->taxonomy == 'category') ? 'category-links' : 'tag-links';
        $separator = ($links[0]->taxonomy == 'category') ? ', ' : '';
        $path      = esc_url(home_url('/')) . $taxonomy .'/';
        
        foreach ($links as $link) {
          $output .= "<a href=\"$path$link->slug\" class=\"$class\">$link->name</a>$separator";
        }

        $output = rtrim($output, ', ');
      }
      
      return $output;
    }
  }
