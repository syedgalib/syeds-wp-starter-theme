<?php
  require get_template_directory() . '/vendor/autoload.php';
  require get_template_directory() . '/app/helper.php';

  // Initialize Shield
  global $shield;
  $app = new App\Init();
  $app->register_srvices();

