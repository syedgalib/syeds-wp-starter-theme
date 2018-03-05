<article <?php post_class();?>>
  <div class="card" style="margin-bottom: 30px;">
    <img src="<?php App\Get\Thumbnail::prepared(); ?>" alt="" class="card-img-top img-fluid">

    <div class="card-body">
      <h1><?php the_title(); ?></h1>
      <div class="row">
        <div class="col-md-6">
          <span class="text-muted">
            <?php App\Get\Time::prepared(); ?>
          </span>
        </div>
        <div class="col-md-6 text-md-right">
          <?php edit_post_link(); ?>
        </div>
      </div>
      <div class="card-text"><?php the_content(); ?></div>
    </div>
    
    <div class="card-footer">
      <?php App\Get\Taxonomy::prepared(); ?>
    </div>
  </div>
</article>

