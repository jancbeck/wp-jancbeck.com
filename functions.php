<?php

// Add CSS to Visual Editor
add_theme_support('editor_style');
add_editor_style('css/style-editor.css'); 

// hide adminbar
add_filter('show_admin_bar', '__return_false');

// removes detailed login error information for security
add_filter('login_errors', create_function('$a', "return null;"));

// Extending Auto Logout Period   
function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );   


// Cleanup head
add_action('init', 'remheadlink');

function remheadlink() {
	// Remove links to the extra feeds (e.g. category feeds)
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove links to the general feeds (e.g. posts and comments)
	remove_action( 'wp_head', 'feed_links', 2 );
	// Remove link to the RSD service endpoint, EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove link to the Windows Live Writer manifest file
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove prev link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Display relational links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	// Remove XHTML generator showing WP version
	remove_action( 'wp_head', 'wp_generator' );
}
 
// loads jQuery from Google CDN or local fallback
// http://www.renaissance-design.net/2012/load-jquery-from-googles-cdn-with-local-fallback-in-wordpress/
   
function theme_scripts() {

	$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
	wp_deregister_script('jquery');
	if (get_transient('google_jquery') == true) {	    
		wp_register_script('jquery', $url, array(), null, true);
	} 
	else {
		$resp = wp_remote_head($url);
		if (!is_wp_error($resp) && 200 == $resp['response']['code']) {
			set_transient('google_jquery', true, 60 * 5);
			wp_register_script('jquery', $url, array(), null, true);
		} 
		else {
			set_transient('google_jquery', false, 60 * 5);
			$url = get_bloginfo('wpurl') . '/wp-includes/js/jquery/jquery.js';
			wp_register_script('jquery', $url, array(), '1.7.1', true);
		}
	}
	wp_enqueue_script('jquery');
	wp_deregister_script('l10n');
	//wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0', true );
	wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'theme_scripts');


   

