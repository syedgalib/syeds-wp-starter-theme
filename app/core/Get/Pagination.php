<?php
  namespace App\Get;

  /**
   * Pagination
   */
  class Pagination
  {
    public static function prepared()
    {
      global $wp_query;
      $big = 999999999;
      $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'prev_next' => True,
        'prev_text' => '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>',
        'next_text' => '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>',
        'type' => 'list'
      ) );

      $paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination justify-content-center'>", $paginate_links );

      $paginate_links = str_replace( "<li>", "<li class='page-item'>", $paginate_links );

      $li_active_start = "<li class='page-item'><span aria-current='page' class='page-numbers current'>";
      $paginate_links = str_replace( $li_active_start, "<li class='page-item active'><span class='page-link'>", $paginate_links );

      $paginate_links = str_replace( "<a", "<a class='page-link' ", $paginate_links );

      $paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
      
      // Display the pagination if more than one page is found
      if ( $paginate_links ) {
        echo "<nav class=\"pagination-nav\" aria-label=\"Page Navigation\">\n\t" .$paginate_links. "\n\t</nav>";
      }
    }
  }