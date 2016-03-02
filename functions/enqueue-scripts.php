<?php 

function shiftpress_enqueue_scripts()
{
	/**
	 * Removemos cualquier version de jquery
	 */
	wp_deregister_script('jquery');

	/**
	 * Css
	 */
	wp_enqueue_style('site-css', get_template_directory_uri() . '/dist/css/main.css', array(), '', 'all');

	/**
	 * Scripts base
	 */
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/dist/js/jquery.min.js', array(), '', true );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/dist/js/foundation.min.js', array(), '', true );
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/js/main.js', array(), '', true );
}
add_action('wp_enqueue_scripts', 'shiftpress_enqueue_scripts', 999);