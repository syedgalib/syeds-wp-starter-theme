<?php
  get_header();
    ?>
    <!--======================================
    | Content | Single
    =======================================-->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <?php
              if (have_posts()) :
                while (have_posts()) : the_post();
                  get_template_part('template-parts/page/content', 'single');

                  ?>
                  <div class="row">
                    <div class="col-6"><?php previous_post_link('%link', 'Previous'); ?></div>
                    <div class="col-6 text-right"><?php next_post_link('%link', 'Next'); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <?php
                      if ( comments_open() || get_comments_number() ) :
                        comments_template();
                      endif;
                      ?>
                    </div>
                  </div>
                <?php
                endwhile;
              endif;
            ?>
          </div>
          
          <br>
          <div class="col-md-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
      </div>
    </section>
    <?php
  get_footer();
?>
