<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

get_header();
?>

<main id="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/entry' ); ?>
    <?php if ( comments_open() && ! post_password_required() ) {
        comments_template( '', true );
      }
    ?>
  <?php endwhile; endif; ?>
  <footer class="footer">
    <?php get_template_part( 'template-parts/nav', 'below-single' ); ?>
  </footer>
</main>

<?php
get_footer();
