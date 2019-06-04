<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

get_header();
?>

<main id="content">
  <?php if ( have_posts() ) : ?>
  <header class="header">
    <h1 class="entry-title">
      <?php printf( esc_html__( 'Search Results for: %s', 'ns-starter' ), get_search_query() ); ?>
    </h1>
  </header>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/entry' ); ?>
  <?php endwhile; ?>
  <?php get_template_part( 'template-parts/nav', 'below' ); ?>
  <?php else : ?>
    <article id="post-0" class="post no-results not-found">
      <header class="header">
        <h1 class="entry-title">
          <?php esc_html_e( 'Nothing Found', 'ns-starter' ); ?>
        </h1>
      </header>
      <div class="entry-content">
        <p>
          <?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'ns-starter' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
    </article>
  <?php endif; ?>
</main>

<?php
get_footer();
