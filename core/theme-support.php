<?php

/**
 * [Enable themes support: Title tag, automatic feed links, post thumbnails, custom backgrounds, logo]
 * @return [type] [description]
 */
function bpress_setup()
{
  load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support('menus');
  add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));
  
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;

  /**
   * [Options array for add custom background theme]
   * @var array
   */
  $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
    );
  add_theme_support( 'custom-background', $defaults );
}
add_action('after_setup_theme', 'bpress_setup');

/**
 * [bpress_enqueue_comment_reply_script enqueue comments reply]
 * @return [type] [description]
 */
function bpress_enqueue_comment_reply_script()
{
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'comment_form_before', 'bpress_enqueue_comment_reply_script' );

/**
 * [bpress_title halt de title post from database is null]
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function bpress_title( $title ) {
  if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}
add_filter( 'the_title', 'bpress_title' );

/**
 * [bpress_filter_wp_title the title of page]
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function bpress_filter_wp_title( $title )
{
  return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'wp_title', 'bpress_filter_wp_title' );

/**
 * [bpress_custom_pings get the ping comments]
 * @param  [type] $comment [description]
 * @return [type]          [description]
 */
function bpress_custom_pings( $comment )
{
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}

/**
 * [bpress_add_editor_styles Optional for asign custom style for tynced editor]
 * @return [type] [description]
 */
function bpress_add_editor_styles() {
  add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'bpress_add_editor_styles' );