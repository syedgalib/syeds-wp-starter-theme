<?php
  get_header();
  ?>
  <!--==================================-->
  <!-- Content -->
  <!--==================================-->
  <section class="section-main">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
          if (have_posts()) :
            while(have_posts()) : the_post();
              get_template_part('template-parts/post/content', get_post_format());
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
