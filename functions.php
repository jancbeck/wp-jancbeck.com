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
*		3.4 Force compile less
* 		3.5 Remove More Jump
* 		3.6 Bootstrap_Walker_Nav_Menu
*		3.7 Attachment Carousel
*		3.8 Get first Category of post
*		3.9 Display Bootstrap Pagination
*		3.10 Has more
* 
***************************************************************/

define('WP_DEBUG', true);

/***************************************************************
* 1.1 ENQUEUE SCRIPTS
***************************************************************/
   
	function theme_ressources() {
				
		// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	
		wp_deregister_script('l10n');
		wp_enqueue_script('jquery'); 
		wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0', true ); 
	}
	add_action('wp_enqueue_scripts', 'theme_ressources');
	
	// wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	
	
	if ( !is_admin() )
		wp_enqueue_style( 'style', get_template_directory_uri() . '/less/jbm.less' ); 


/***************************************************************
* 1.2 General theme options
***************************************************************/
	
	add_theme_support( 'post-thumbnails' );
	add_editor_style( 'css/editor.css' );	
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
* 3.4 Force compile less
***************************************************************/

	function always_compile_less() {
		global $WPLessPlugin;
		$WPLessPlugin->processStylesheets(true);
	}
	add_action( 'wp', 'always_compile_less' );
	

/***************************************************************
* 3.5 Remove More Jump
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
* 3.7 Attachment Carousel 
***************************************************************/

	function get_attachment_carousel() {
		
		global $post;
		
		// gets attachments for the current post
		$args = array( 
			'post_type' => 'attachment', 
			'numberposts' => -1, 
			'post_status' => null, 
			'post_parent' => $post->ID 
		); 
		$attachments = get_posts( $args ); 
		$first = 0;
		$output = '';
			
		if ( $attachments ) {
			
			$output .= '
			<div id="stickies" class="carousel slide">
					<div class="carousel-inner">';
			
			foreach( $attachments as $attachment ) :
				
				$output .= '<div class="item'. ( $first++ == 0 ? ' active' : '') .'">'. wp_get_attachment_image( $attachment->ID, 'full' ) .'</div>';
				
			endforeach;
			
			$output .= '
					</div>
					<!-- Carousel nav -->
				<a class="carousel-control left" href="#stickies" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#stickies" data-slide="next">&rsaquo;</a>
			</div>';
			
		}
		return $output;
	}
	add_shortcode('attachment_carousel', 'get_attachment_carousel');

/***************************************************************
* 3.8 Get first Category of post
***************************************************************/

	function get_first_category( ) {
		$category = get_the_category(); 
		return $category[0]->cat_name;
	}

/***************************************************************
* 3.9 Display Pagination
***************************************************************/

	function pagination() {	
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		if ( $wp_query->max_num_pages < 2 )
			return;
		
		$output = '<div class="pagination">';
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
		$output .= '</div>';
		return $output;
	}
	
	
	
/***************************************************************
* 3.10 Has more
* http://wordpress.org/support/topic/conditional-tag-to-check-for-lt-more-gt
***************************************************************/

	function has_more( ) {
		global $post;
		return ( strstr( $post->post_content,'<!--more-->' ) ? true : false );
	}
	
/***************************************************************
* 3.11 Add custom image classes
***************************************************************/
	
	function add_custom_image_classes( $class, $id, $align, $size ) {
		$img = wp_get_attachment_image_src( $id, 'full' );
		$shadowless = get_field( 'shadowless', $id );
		$add = '';
		
		if ( $img[1] >= 992 )
			$add .= ' gte-992';
			
		if ( $shadowless )
			$add .= ' shadowless';
			
		return $class . $add;	
	}
	add_filter('get_image_tag_class', 'add_custom_image_classes', 0, 4);
	
	
/***************************************************************
* 3.12 Image captions with figure element
* https://github.com/eddiemachado/bones/issues/90
***************************************************************/

// HTML5: Use figure and figcaption for captions
function html5_caption($attr, $content = null) {
    $output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
    if ( $output != '' )
        return $output;

    extract( shortcode_atts ( array(
    'id' => '', 
    'align' => 'alignnone',
    'width'=> '',
    'caption' => ''
    ), $attr ) );

    if ( 1 > (int) $width || empty( $caption ) )
        return $content;

    if ( $id ) $id = 'id="' . $id . '" ';

    return '<figure ' . $id . 'class="wp-caption ' . $align . '" ><figcaption class="wp-caption-text">' . $caption . '</figcaption>'. do_shortcode( $content ) . '</figure>';
}

//add_filter('img_caption_shortcode', 'html5_caption',10,3);
add_shortcode( 'wp_caption', 'html5_caption' );
add_shortcode( 'caption', 'html5_caption' );

/***************************************************************
* X.X Code Template
***************************************************************/