<article <?php post_class();?>>
  <div class="card" style="margin-bottom: 30px;">
    <div class="card-body">
      <h1><?php the_title(); ?></h1>
      <div class="card-text"><?php the_excerpt(); ?></div>
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">View</a>
    </div>
  </div>
</article>
