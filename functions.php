<?php

/***************************************************************
* INDEX
* 	1.0 SETUP (concerns ADMIN + THEME)
* 		1.1 Enqueue Scripts
* 		1.2 General theme options
* 		1.3 Register Menus
* 	2.0 ADMIN
* 		2.1 Remove default screen metaboxes
* 		2.2 Cleanup Dashboard
* 		2.3 Customize Admin
* 		2.4 Hide Login Errors
* 	3.0 THEME
* 		3.1 Clean <head>
* 		3.2 Add Section Class
* 		3.3 has_attachments()
* 		3.4 Remove More Jump
*		3.5 Get first Category of post
*		3.6 Display Bootstrap Pagination
*		3.7 Has more
* 		3.8 Insert Images with Figure/figcaption
* 
***************************************************************/

define('WP_DEBUG', true);

require_once( 'libs/wp-less/wp-less.php' );

/***************************************************************
* 1.1 ENQUEUE SCRIPTS
***************************************************************/
   
	function theme_ressources() {
				
		// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	
		wp_deregister_script('l10n');
		wp_deregister_script('jquery');
		/*wp_enqueue_script('jquery'); 
		wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0', true );  */
	}
	add_action('wp_enqueue_scripts', 'theme_ressources');
	
	// wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	
	if ( !is_admin() )
		wp_enqueue_style( 'style', get_template_directory_uri() . '/less/jbm.less' ); 


/***************************************************************
* 1.2 General theme options
***************************************************************/
	
	add_theme_support( 'post-thumbnails' );
	add_editor_style( 'less/editor.less' );	
    load_theme_textdomain( 'jbm', get_template_directory() .'/languages' );
	
/***************************************************************
* 1.3 Register Menus
***************************************************************/ 

	register_nav_menus(array( 
		'navigation' => __('Navigation', 'jbm'),
		'footer-links' => __('Footer Links', 'jbm'),
	));


/***************************************************************
* 1.4 Echoes bloginfo as shortcode
***************************************************************/
	
	function bloginfo_shortcode( $atts ) {
	    extract(shortcode_atts(array(
	        'key' => '',
	    ), $atts));
	    return get_bloginfo($key);
	}
	add_shortcode('bloginfo', 'bloginfo_shortcode');


/***************************************************************
*  2.1 Remove default screen metaboxes
***************************************************************/

	function remove_default_screen_metaboxes() {
	
		// remove_default_post_screen_metaboxes
		remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
		remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
		remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
		remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
		 
		// remove_default_page_screen_metaboxes		 
		remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
		remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
		remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
		remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
	 }
	add_action( 'admin_menu', 'remove_default_screen_metaboxes' );
	
	
/***************************************************************
*  2.2 Cleanup Dashboard
***************************************************************/

	function clean_dashboard_widgets() {
		global $wp_meta_boxes;
		
		//Right Now - Comments, Posts, Pages at a glance
		//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		//Recent Comments
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		//Incoming Links
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		//Plugins - Popular, New and Recently updated Wordpress Plugins
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		//Wordpress Development Blog Feed
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		//Other Wordpress News Feed
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		//Quick Press Form
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		//Recent Drafts List
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	}  
	add_action('wp_dashboard_setup', 'clean_dashboard_widgets');


/***************************************************************
* 2.3 Customize Admin: Change admin interface and login page
* Source: http://snipplr.com/view.php?codeview&id=63771
***************************************************************/
	
	// add own css to admin
	function add_admin_css() {
	     wp_enqueue_style('admin', get_bloginfo('template_directory').'/css/admin.css');
	}
	add_action('admin_print_styles', 'add_admin_css');
	
	// add own js to admin	
	function add_admin_js() {
	     wp_enqueue_script('admin', get_bloginfo('template_directory').'/js/admin.js');
	}
	add_action('admin_print_scripts', 'add_admin_js');
	
	
	function remove_items_from_adminbar(){
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'comments' );
        $wp_admin_bar->remove_menu( 'backwpup' );
        $wp_admin_bar->remove_menu( 'wp-logo' );
		$wp_admin_bar->remove_menu( 'appearance' );
		$wp_admin_bar->remove_menu( 'my-account-with-avatar' );
	}
	add_action( 'wp_before_admin_bar_render', 'remove_items_from_adminbar' );
	

/***************************************************************
* 3.1 Clean <head>: Use Template instead.
***************************************************************/

	function remheadlink() {
		// Remove links to the extra feeds (e.g. category feeds)
		// remove_action( 'wp_head', 'feed_links_extra', 3 );
		// Remove links to the general feeds (e.g. posts and comments)
		// remove_action( 'wp_head', 'feed_links', 2 );
		// Remove link to the RSD service endpoint, EditURI link
		// remove_action( 'wp_head', 'rsd_link' );
		// Remove link to the Windows Live Writer manifest file
		// remove_action( 'wp_head', 'wlwmanifest_link' );
		// Remove index link
		// remove_action( 'wp_head', 'index_rel_link' );
		// Remove prev link
		// remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		// Remove start link
		// remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		// Display relational links for adjacent posts
		// remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		// Remove XHTML generator showing WP version
		remove_action( 'wp_head', 'wp_generator' );
	}
	add_action('init', 'remheadlink');
	
	
/***************************************************************
* 3.2 Add Section Class: Add the top level page to the body class for coloured sections
***************************************************************/

	function body_class_section( $classes ) {
	    global $wpdb, $post;
	    if (is_page()) {
	        if ($post->post_parent) {
	            $parent  = end(get_post_ancestors($current_page_id));
	        } else {
	            $parent = $post->ID;
	        }
	        $post_data = get_post($parent, ARRAY_A);
	        $classes[] = 'section-' . $post_data['post_name'];
	    }
	    return $classes;
	}
	add_filter( 'body_class', 'body_class_section' );
	
	
/***************************************************************
* 3.3 has_attachments(): returns true if post has attachments
* Description: 
***************************************************************/
	
	function has_attachments( $post_id = null ) {
		$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_status' => null,
			'post_parent' => $post_id
		);
		$attachments = get_posts($args);
		if ($attachments) 	
			return true;
		else
			return false;
	}
	

/***************************************************************
* 3.4 Remove More Jump
***************************************************************/

	function remove_more_jump_link($link) { 
		$offset = strpos($link, '#more-');
		
		if ($offset)
			$end = strpos($link, '"',$offset);

		if ($end)
			$link = substr_replace($link, '', $offset, $end-$offset);

		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');

/***************************************************************
* 3.5 Get first Category of post
***************************************************************/

	function get_first_category( ) {
		$category = get_the_category(); 
		return $category[0]->cat_name;
	}

/***************************************************************
* 3.6 Display Pagination
***************************************************************/

	function pagination() {	
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		if ( $wp_query->max_num_pages < 2 )
			return;
		
		$output = '<nav role="navigation">';
		$output .= paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 2,
			'prev_next' => true,
			'prev_text' => __('&laquo;'),
			'next_text' => __('&raquo;'),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type' => 'list'
		) );
		$output .= '</nav>';
		return $output;
	}
	
	
	
/***************************************************************
* 3.7 Has more
* http://wordpress.org/support/topic/conditional-tag-to-check-for-lt-more-gt
***************************************************************/

	function has_more( ) {
		global $post;
		return ( strstr( $post->post_content,'<!--more-->' ) ? true : false );
	}
	
/***************************************************************
* 3.8 Use shortcode for images
***************************************************************/

function insert_image_shortcode($html, $id, $caption, $title, $align, $url) {
  return "[image id='$id']";
}
add_filter( 'image_send_to_editor', 'insert_image_shortcode', 10, 9 );

function image_shortcode( $atts ) {
    extract(shortcode_atts(array(
        'id' => '',
    ), $atts));
    $caption = get_post_field('post_excerpt', $id);
    $title = get_post_field('post_title', $id);
    $image_src = wp_get_attachment_image_src($id, 'full');
    
    $output = '<figure>';
    
    if ($image_src[1] > 960)
    	$output .= '<a href="'.$image_src[0].'">'. wp_get_attachment_image($id, 'large') .'</a>';
    else
    	$output .= wp_get_attachment_image($id, 'full');    
    
    if ($caption)
    	$output .= "<figcaption><strong>$title:</strong> $caption</figcaption>";
    $output .= '</figure>';
    return $output;
}
add_shortcode('image', 'image_shortcode');

/***************************************************************
* 3.9 Customize Theme
***************************************************************/

	function theme_customize_register( $wp_customize ) {
	   $wp_customize->add_setting( 'highlight_color' , array(
	       'default' => '#08c',
	       'type'		=> 'theme_mod',
	       'capability'	=> 'edit_theme_options',
	       'transport' => 'postMessage'
	   ) );
	   $wp_customize->add_section( 'theme_colors' , array(
	       'title'      => __('Custom Colors', 'jbm'),
	       'priority'   => 30,
	   ) );
	   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'highlight_color', array(
	   	'label'        => __( 'Highlight Color', 'jbm' ),
	   	'section'    => 'theme_colors',
	   	'settings'   => 'highlight_color',
	   ) ) );
	}
	add_action( 'customize_register', 'theme_customize_register' );
	
	
	function custom_less_vars( $vars, $handle ) {
	    $vars[ 'highlight' ] = get_theme_mod('highlight_color');
	    return $vars;
	}
	add_filter( 'less_vars', 'custom_less_vars', 10, 2 );
	
/***************************************************************
* X.X Code Template
***************************************************************/