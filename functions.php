<?php

// Add CSS to Visual Editor
add_theme_support('editor_style');
add_editor_style('css/style-editor.css');

// Add an excerpt box for pages
add_post_type_support( 'page', 'excerpt' );   

// Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
remove_filter('atom_service_url','atom_service_url_filter');

// hide adminbar
add_filter('show_admin_bar', '__return_false');

// removes detailed login error information for security
add_filter('login_errors', create_function('$a', "return null;"));

// Scripts
add_action('init', 'custom_scripts');

function custom_scripts() {
	if( !is_admin() ){
	   wp_dequeue_script('jquery');
	   wp_deregister_script('l10n');
	}
}

// Extending Auto Logout Period   
function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );   

// add the category name to body class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
	$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


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
   

   

