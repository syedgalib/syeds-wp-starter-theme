<?php
  get_header();

  if (have_posts()) :
    while (have_posts()) : the_post();
      ?>
      <!--==================================-->
      <!-- Page Content -->
      <!--==================================-->
      <div class="jumbotron text-center">
        <h1 class="display-4"><?php the_title(); ?></h1>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-bottom: 30px;">
              <div class="card-body">
                <div class="card-text"><?php the_content(); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    endwhile;
  endif;
  ?>
  <section class="section-main"> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <?php dynamic_sidebar('secondery-sidebar'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  get_footer();
?>
