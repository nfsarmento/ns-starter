<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 * @link https://codex.wordpress.org/Function_Reference/post_password_required
*/
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
  <?php
    if ( have_comments() ) :
      global $comments_by_type;
      $comments_by_type = separate_comments( $comments );
      if ( ! empty( $comments_by_type['comment'] ) ) :
  ?>
  <section id="comments-list" class="comments">

    <h3 class="comments-title">
      <?php comments_number(); ?>
    </h3>

    <?php if ( get_comment_pages_count() > 1 ) : ?>
      <nav id="comments-nav-above" class="comments-navigation" role="navigation">
        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
      </nav>
    <?php endif; ?>

    <ul>
      <?php wp_list_comments( 'type=comment' ); ?>
    </ul>

    <?php if ( get_comment_pages_count() > 1 ) : ?>
      <nav id="comments-nav-below" class="comments-navigation" role="navigation">
        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
      </nav>
    <?php endif; ?>

  </section>
  <?php
    endif;
    if ( ! empty( $comments_by_type['pings'] ) ) :
      $ping_count = count( $comments_by_type['pings'] );
  ?>
  <section id="trackbacks-list" class="comments">
    <h3 class="comments-title">
      <?php echo '<span class="ping-count">' . esc_html( $ping_count ) . '</span> ' . esc_html( _nx( 'Trackback or Pingback', 'Trackbacks and Pingbacks', $ping_count, 'comments count', 'ns-starter' ) ); ?>
    </h3>

    <ul>
      <?php wp_list_comments( 'type=pings&callback=ns_theme_starter_custom_pings' ); ?>
    </ul>
  </section>
  <?php
    endif;
    endif;
    if ( comments_open() ) {
      comment_form();
    }
  ?>
</div>
