<?php
  /*
    =============================
    Helper Functions
    =============================
  */
  function app_get_style($name){
    $output = get_template_directory_uri() . '/asset/css/' . $name . '.css';
    return $output;
  }

  function app_get_script($name){
    $output = get_template_directory_uri() . '/asset/js/' . $name . '.js';
    return $output;
  }
