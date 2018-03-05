<?php
  get_header();
  ?>
  <!--==================================-->
  <!-- Archive Page -->
  <!--==================================-->
  <section class="section-main">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
          if (have_posts()) :
            ?><h4 class="text-muted"><?php the_archive_title(); ?></h4><?php
            while(have_posts()) : the_post();
              get_template_part('template-parts/page/content', 'archive');
            endwhile;
              App\Get\Pagination::prepared();
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
