<?php
  /*
    Template Name: Blank Page
  */
  get_header();
  global $shield;

  if (have_posts()) :
    while (have_posts()) : the_post();
      the_content();
    endwhile;
  endif;

  get_footer();
  ?>