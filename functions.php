<?php
/**
 * NS Theme Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ns-starter
 * @since 1.0.0
 */



 /**
  * Sets up theme defaults and registers support for various WordPress features.
  *
  * @link https://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
  *
  */
  add_action( 'after_setup_theme', 'ns_theme_starter_setup' );
  function ns_theme_starter_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on NS Theme Starter, use a find and replace
   * to change 'ns_theme_starter' to the name of your theme in all the template files.
  */
  load_theme_textdomain( 'ns-starter', get_template_directory() . '/languages' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
  */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  */
  add_theme_support( 'post-thumbnails' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
  */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
  */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 190,
      'width'       => 190,
      'flex-width'  => false,
      'flex-height' => false,
    )
  );

  // Add support for editor styles.
  add_theme_support( 'editor-styles' );

  /**
   * Add support custom header.
   *
   * @link https://codex.wordpress.org/Custom_Headers
  */
  $args = array(
  	'width'         => 980,
  	'height'        => 60,
  	'default-image' => '',
  );
  add_theme_support( 'custom-header', $args );

  /**
   * Add support custom background.
   *
   * @link https://codex.wordpress.org/Custom_Backgrounds
  */
  $args = array(
    'default-color' => 'ffffff',
    'default-image' => '',
  );
  add_theme_support( 'custom-background', $args );

  /**
   * Add support custom background.
   *
   * @link https://developer.wordpress.org/reference/functions/add_editor_style/
  */
  add_editor_style( 'assets/css/editor-style.css' );

  /**
   * Add support content width.
   *
   * @link https://codex.wordpress.org/Content_Width
  */
  global $content_width;
  if ( ! isset( $content_width ) ) {
    $content_width = 1920;
  }

  /**
   * Register nav menu.
   *
   * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
  */
  register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'ns-starter' ) ) );

}

/**
 * Enqueue scripts and styles.
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 *
 */
add_action( 'wp_enqueue_scripts', 'ns_theme_starter_load_scripts' );
function ns_theme_starter_load_scripts() {
  wp_enqueue_style( 'ns_theme_starter-style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
}

/**
 * Filters the separator for the document title.
 *
 * @link https://developer.wordpress.org/reference/hooks/document_title_separator/
 *
 */
add_filter( 'document_title_separator', 'ns_theme_starter_document_title_separator' );
function ns_theme_starter_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}


/**
 * Filters the Read More link text.
 *
 * @link https://developer.wordpress.org/reference/hooks/the_content_more_link/
 *
 */
add_filter( 'the_content_more_link', 'ns_theme_starter_read_more_link' );
function ns_theme_starter_read_more_link() {
  if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
  }
}

/**
 * Read more link
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_more
 *
 */
add_filter( 'excerpt_more', 'ns_theme_starter_excerpt_read_more_link' );
function ns_theme_starter_excerpt_read_more_link( $more ) {
  if ( ! is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
  }
}

/**
 * Filters the image sizes automatically generated when uploading an image.
 *
 * @link https://developer.wordpress.org/reference/hooks/intermediate_image_sizes_advanced/
 *
 */
add_filter( 'intermediate_image_sizes_advanced', 'ns_theme_starter_image_insert_override' );
function ns_theme_starter_image_insert_override( $sizes ) {
  unset( $sizes['medium_large'] );
  return $sizes;
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'ns_theme_starter_widgets_init' );
function ns_theme_starter_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'ns-starter' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}

/**
 * Pingbacks (also known as trackbacks) are a form of automated comment for a page or post, created when another WordPress blog links to that page or post.
 *
 * @link https://wordpress.org/support/article/introduction-to-blogging/
 *
 */
add_action( 'wp_head', 'ns_theme_starter_pingback_header' );
function ns_theme_starter_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}

/**
 * Including WordPress’s comment-reply.js
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
 *
 */
add_action( 'comment_form_before', 'ns_theme_starter_enqueue_comment_reply_script' );
function ns_theme_starter_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

function ns_theme_starter_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter( 'get_comments_number', 'ns_theme_starter_comment_count', 0 );
function ns_theme_starter_comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}
