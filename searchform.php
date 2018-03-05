<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
  <div class="form-group">
    <div class="input-group">
      <input type="search" class="form-control" name="s" placeholder="Search..." value="<?php echo get_search_query();?>">

      <span class="input-group-append">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </div>
</form>