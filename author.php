<?php
/**
 * The template for displaying author pages
 *
 * @link https://codex.wordpress.org/Author_Templates
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

get_header();
?>

<main id="content">
  <header class="header">
    <?php the_post(); ?>
    <h1 class="entry-title author">
      <?php the_author_link(); ?>
    </h1>
    <div class="archive-meta">
      <?php if ( '' != get_the_author_meta( 'user_description' ) ) {
        echo esc_html( get_the_author_meta( 'user_description' ) );
      } ?>
    </div>
    <?php rewind_posts(); ?>
  </header>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/entry' ); ?>
  <?php endwhile; ?>
  <?php get_template_part( 'template-parts/nav', 'below' ); ?>
</main>

<?php
get_footer();
