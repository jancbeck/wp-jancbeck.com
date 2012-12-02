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
* 		3.9 Customize Theme
* 		3.10 Make twitter embedd responsive
* 		3.11 Overwrite Notes Plugin
* 		3.12 Embedd Gist links
* 		3.13 Allow fullscreen video embeds
* 		3.14 Disable Jetpack Opengraph
* 
***************************************************************/

require_once( 'libs/wp-less/wp-less.php' );
require_once( 'libs/ChromePhp.php' );

function debug( $msg ) {
	return WP_DEBUG ? ChromePhp::log($msg) : false;
}

/***************************************************************
* 1.1 ENQUEUE SCRIPTS
***************************************************************/
   
	function theme_ressources() {
				
		// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	
		wp_deregister_script('l10n');
		wp_deregister_script('jquery');
		/*wp_enqueue_script('jquery'); 
		wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0', true );  */
		
		// wp_enqueue_style( $handle, $src, $deps, $ver, $media );
		
		if ( !is_admin() )
			wp_enqueue_style( 'style', get_template_directory_uri() . '/less/jbm.less' ); 
	}
	add_action('wp_enqueue_scripts', 'theme_ressources');
	
	


/***************************************************************
* 1.2 General theme options
***************************************************************/
	
	add_theme_support( 'post-thumbnails' );
	add_editor_style( 'less/editor.less' );	
    load_theme_textdomain( 'jbm', get_template_directory() .'/language' );

	
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
	     wp_enqueue_style('admin', get_template_directory_uri().'/css/admin.css');
	}
	add_action('admin_print_styles', 'add_admin_css');
	
	// add own js to admin	
	function add_admin_js() {
	     wp_enqueue_script('admin', get_template_directory_uri().'/js/admin.js');
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
* 3.4 Add post thumbnail to content
***************************************************************/

	function add_post_thumbnail_to_content( $content ) {
		
		global $post;
		
		// Do nothing if post has no thumbnail set
		if ( ! has_post_thumbnail( $post->ID ))
			return $content;
		
		$id = get_post_thumbnail_id( $post->ID );
		
		// attach thumbnail even if post has no more tag set
		if ( ! $pos = strpos( $post->post_content, '<!--more-->' ))
			return $content . "[image id='$id']";
			
		// on single post insert thumbnail into article flow
		return str_replace( '<p><span id="more-', '[image id="'. $id .'"]<p><span id="more-', $content );
	}
	add_filter( 'the_content', 'add_post_thumbnail_to_content' );
	
	
	function replace_more_link_with_post_thumbnail( $more_link, $more_link_text ) {

		global $post;

		if ( ! has_post_thumbnail($post->ID) )
			return '';
			
		$id = get_post_thumbnail_id($post->ID);
			
		return str_replace( $more_link_text, "[image id='$id']", $more_link );
	}
	add_filter( 'the_content_more_link', 'replace_more_link_with_post_thumbnail', 10, 2 );

/***************************************************************
* 3.5 Get first Category of post
***************************************************************/

	function get_first_category() {
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
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
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
		
		global $post;

	    extract(shortcode_atts(array(
	        'id' => '',
	        'class' => ''
	    ), $atts));
	    
	    if (empty($id))
	    	return '';
	    
	    $blog_list = get_blog_list( 0, 'all' );
	    $blog_id = 0;
		
		// Search for the site the image comes from
	    foreach ( $blog_list AS $blog ) {
	    	switch_to_blog( $blog['blog_id'] );
	    	if ( wp_get_attachment_image_src( $id, 'full') != '' ) break;
	    }
	    	    
	    $caption = get_post_field( 'post_excerpt', $id );
	    $title = get_post_field( 'post_title', $id );
	    $image_src = wp_get_attachment_image_src( $id, 'full' );
	    $image = wp_get_attachment_image($id, 'large');
	    	    
	    $output = '<figure class="media-'. $id .' '. $class .'">';
	    
	    if ($image_src[1] > 960) {
	    
	    	if (is_single())
	    		$link = $image_src[0];
	    	else
	    		$link = get_permalink($post->ID);
	    		
	    	$output .= '<a href="'. $link .'">'. $image .'</a>';
	    	
	    } else {
	    
	    	$output .= wp_get_attachment_image($id, 'full');    
	    }
	    if ($caption)
	    	$output .= "<figcaption><strong>$title:</strong> $caption</figcaption>";
	    $output .= '</figure>';
	    restore_current_blog();
	    return $output;
	}
	add_shortcode('image', 'image_shortcode');

/***************************************************************
* 3.9 Customize Theme
***************************************************************/

	function theme_customize_register( $wp_customize ) {
		
		// COLORS
		$wp_customize->add_section( 'theme_colors' , array(
		   'title'      => __('Custom Colors', 'jbm'),
		   'priority'   => 30,
		) );
		$wp_customize->add_setting( 'highlight_color' , array(
		   'default' 	=> '#08c',
		   'type'		=> 'theme_mod',
		   'transport' 	=> 'postMessage'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'highlight_color', array(
			'label'      => __( 'Highlight Color', 'jbm' ),
			'section'    => 'theme_colors',
			'settings'   => 'highlight_color',
		) ) );
		
		// LOGO
		$wp_customize->add_section( 'theme_text' , array(
		   'title'      => __('Logo', 'jbm'),
		   'priority'   => 30,
		) );
		$wp_customize->add_setting( 'logo_text' , array(
		   'default' 	=> get_bloginfo('name'),
		   'type'		=> 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_text', array(
			'label'      => __( 'Logo Text', 'jbm' ),
			'section'    => 'theme_text',
			'settings'   => 'logo_text',
		) ) );
		
		// FAVICONS
		$wp_customize->add_section( 'favicons' , array(
		   'title'      => __('Favicons', 'jbm'),
		   'priority'   => 30,
		) );
		$wp_customize->add_setting( 'favicon_ico' , array(
		   'type'		=> 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'favicon_ico', array(
			'label' 	 => __( 'Favicon (.ico)', 'jbm' ),
			'section'    => 'favicons',
			'settings'   => 'favicon_ico',
		) ) );
		$wp_customize->add_setting( 'favicon_png' , array(
		   'type'		=> 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'favicon_png', array(
			'label' 	 => __( 'Favicon (.png)', 'jbm' ),
			'section'    => 'favicons',
			'settings'   => 'favicon_png',
		) ) );
		$wp_customize->add_setting( 'favicon_apple' , array(
		   'type'		=> 'theme_mod'
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'favicon_apple', array(
			'label' 	 => __( 'Apple Touch Icon (.png)', 'jbm' ),
			'section'    => 'favicons',
			'settings'   => 'favicon_apple',
		) ) );
	}
	add_action( 'customize_register', 'theme_customize_register' );
	
	
	function addUploadMimes($mimes) {
	    $mimes = array_merge($mimes, array(
	        'ico' => 'image/x-icon'
	    ));
	 
	    return $mimes;
	}
	add_filter('upload_mimes', 'addUploadMimes');
	
	
	function custom_less_vars( $vars, $handle ) {
	    $vars[ 'highlight' ] = get_theme_mod('highlight_color');
	    return $vars;
	}
	add_filter( 'less_vars', 'custom_less_vars', 10, 2 );
	
/***************************************************************
* 3.10 Make twitter embedd responsive
***************************************************************/

	add_filter( 'embed_oembed_html', 'twitter_no_width', 10, 3 );
	
	function twitter_no_width($html, $url, $args) {
		if (false !== strpos($url, 'twitter.com')) {
			$html = str_replace('width="500"','',$html);
		}
		return $html;
	}

/***************************************************************
* 3.11 Overwrite Notes Plugin 
***************************************************************/

	add_filter( 'jbm_notes_title', 'translate_notes_title' );
	
	function translate_notes_title() {
		return __( 'Notes', 'jbm' );
	}
	
/***************************************************************
* 3.12 Embedd Gist links
***************************************************************/

	wp_embed_register_handler( 'gists', '/\s*gist.github.com?.+\/(\d+)/', 'wp_embed_handler_gists' );
	
	function wp_embed_handler_gists( $matches, $attr, $url, $rawattr ) {
		
		if (false !== strpos($url, 'github.com'))
			return '[gist id='. $matches[1] .']';
		else
			return $url;		
	}
	
/***************************************************************
* 3.13 Allow fullscreen video embeds
***************************************************************/

	add_filter( 'embed_oembed_html', 'video_in_figure', 10, 3 );
	
	function video_in_figure($html, $url, $args) {
		
		// follow aspect ratio
		$atts = array();
		preg_match_all('/(width|height|src)=("[^"]*")/i', $html, $atts);
		$height = trim( $atts[2][2], '"' );
		$width = trim( $atts[2][1], '"' );
		$padding = ( $height != 0 && $height != 0 ? $height / $width * 100 : 56.25);
				
		if (false !== strpos($url, 'vimeo.com') && ! empty($atts)) {
						
			$html = str_replace("<iframe", "<figure class='embed-vimeo' style='padding-bottom: $padding%'><iframe", $html);
			$html = str_replace("</iframe>", "</iframe></figure>", $html);
		}
		// not working:
		if (false !== strpos($url, 'youtube') && ! empty($atts)) {
			
			$html = str_replace('<span class="embed-youtube" style="text-align:center; display: block;">', "<figure class='embed-youtube' style='padding-bottom: $padding%'>", $html);
			$html = str_replace("</span>", "</figure>", $html);
		}
				
		return $html;
	}
	
/***************************************************************
* 3.14 Disable Jetpack Opengraph
***************************************************************/

	remove_action('wp_head','jetpack_og_tags');	

/***************************************************************
* X.X Code Template
***************************************************************/