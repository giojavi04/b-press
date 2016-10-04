<?php

/**
 * [blankslate_widgets_init register widgets for theme]
 * @return [type] [description]
 */
function bpress_widgets_init()
{
  register_sidebar( array (
    'name' => __( 'Sidebar Widget Area', 'bpress' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'bpress_widgets_init' );