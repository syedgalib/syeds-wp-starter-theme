
<!--==================================-->
<!-- Footer -->
<!--==================================-->
<?php if (is_active_sidebar( 'footer-sidebar' )): ?>
<section class="footer-section">
  <div class="container">
    <div id="footer-sidebar" class="widget-area footer-sidebar-widget-area">
      <div class="row">
        <?php dynamic_sidebar('footer-sidebar'); ?>
      </div>
    </div>
  </div>
</section>
<?php endif ?>

<div class="copyright-section">
  <p class="mb-0">
    &copy <?php echo date('Y'); ?> <span class="copyright-span"><?php bloginfo('name'); ?></span>. All rights reserved
  </p>
</div>

<input type="hidden" id="wp-ajax-submit" value="<?php echo admin_url('admin-ajax.php');  ?>">

<?php wp_footer(); ?>
</body>
</html>
