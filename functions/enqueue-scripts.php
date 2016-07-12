<?php 

function shiftpress_enqueue_scripts()
{
	// remove WP version from scripts
	function remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
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
add_action('wp_enqueue_scripts', 'shiftpress_enqueue_scripts', 999);

/**
 * Remove jquery Migrate for users
 */
add_action( 'wp_default_scripts', function( $scripts ) {
	if( ! current_user_can('administrator')) {	
	    if ( ! empty( $scripts->registered['jquery'] ) ) {
	        $jquery_dependencies = $scripts->registered['jquery']->deps;
	        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	    }
	}
});