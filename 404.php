<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */
get_header();
?>

<main id="content">
  <article id="post-0" class="post not-found">
    <header class="header">
      <h1 class="entry-title"><?php _e( 'Not Found', 'ns-starter' ); ?></h1>
    </header>
    <div class="entry-content">
      <p>
        <?php _e( 'Nothing found for the requested page. Try a search instead?', 'ns-starter' ); ?>
      </p>
      <?php get_search_form(); ?>
    </div>
  </article>
</main>

<?php
get_footer();
