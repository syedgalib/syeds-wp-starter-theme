<?php
  get_header();
  ?>
  <!--==================================-->
  <!-- Search Page -->
  <!--==================================-->
  <section class="section-main">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
            if (have_posts() && !empty(get_search_query())) :
              echo '<h3 class="text-muted">Showing search result for : ' . get_search_query() . '</h3><br>';
              while (have_posts()) : the_post();
                get_template_part('template-parts/page/content', 'search');
              endwhile;
                App\Get\Pagination::prepared();
            else:
              echo '<h3 class="text-muted">Nothing found</h3>';
            endif;
          ?>
        </div>

        <div class="col-md-4">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>
  <?php
  get_footer();
?>
