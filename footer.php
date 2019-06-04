<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

?>
   </div>
    <footer id="footer">
      <div id="copyright">
        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'ns-starter' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
      </div>
    </footer>
   </div>
  <?php wp_footer(); ?>
 </body>
</html>
