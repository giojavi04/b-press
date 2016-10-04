<?php 

function bpress_enqueue_scripts()
{	
	// remove WP version from css
	add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );

	/**
	 * Css
	 */
	wp_enqueue_style('site-css', get_template_directory_uri() . '/public/css/main.css', array(), '', 'all');

	/**
	 * Scripts base
	 */
	wp_enqueue_script('jquery', true);
    
	wp_enqueue_script('site-js', get_template_directory_uri() . '/public/js/main.js', array(), '', true );
}
add_action('wp_enqueue_scripts', 'bpress_enqueue_scripts', 999);