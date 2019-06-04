<footer class="entry-footer">
  <span class="cat-links">
    <?php esc_html_e( 'Categories: ', 'ns-starter' ); ?><?php the_category( ', ' ); ?>
  </span>
  <span class="tag-links">
    <?php the_tags(); ?>
  </span>
  <?php if ( comments_open() ) {
    echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'ns-starter' ) ) . '</a></span>';
  } ?>
</footer>
