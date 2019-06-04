<?php
/**
 * TAG template file
 *
 *
 * @link https://codex.wordpress.org/Tag_Templates
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

get_header();
?>

<main id="content">
  <header class="header">
    <h1 class="entry-title">
      <?php single_term_title(); ?>
    </h1>
    <div class="archive-meta">
      <?php if ( '' != the_archive_description() ) {
        echo esc_html( the_archive_description() );
      } ?>
    </div>
  </header>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/entry' ); ?>
  <?php endwhile; endif; ?>
    <?php get_template_part( 'template-parts/nav', 'below' ); ?>
</main>

<?php
get_footer();
