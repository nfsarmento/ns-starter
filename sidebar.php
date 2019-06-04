<?php
/**
 * The sidebar file
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */
?>
<aside id="sidebar">
  <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
  <div id="primary" class="widget-area">
    <ul class="xoxo">
      <?php dynamic_sidebar( 'primary-widget-area' ); ?>
    </ul>
  </div>
  <?php endif; ?>
</aside>
