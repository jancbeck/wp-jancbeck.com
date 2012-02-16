<?php

// Add CSS to Visual Editor
add_theme_support('editor_style');
add_editor_style('css/style-editor.css');

// 3.1 Adminbar verstecken
add_filter('show_admin_bar', '__return_false');


// removes detailed login error information for security
add_filter('login_errors',create_function('$a', "return null;"));

// Revisionen auf 5 begrenzen
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 0);


// Scripte verknüofen
if( !is_admin()){
   wp_deregister_script('jquery');
   wp_deregister_script('l10n');
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"), false, '1.5.1');
   wp_register_script('init', get_bloginfo('template_directory') . '/js/init.js', array('jquery'), '1.0' );
   wp_register_script('jcarousel', get_bloginfo('template_directory') . '/js/jquery.jcarousel.min.js', array('jquery'), '1.0' );
   wp_register_script('scrollto', get_bloginfo('template_directory') . '/js/jquery.scrollTo-1.4.2-min.js', array('jquery'), '1.0' );
   wp_register_script('localscroll', get_bloginfo('template_directory') . '/js/jquery.localscroll-1.2.7-min.js', array('jquery'), '1.0' );
   wp_enqueue_script('jcarousel');
   wp_enqueue_script('scrollto');
   wp_enqueue_script('localscroll');
   wp_enqueue_script('init');
}


//  Text [post id=9]Verlinkter Blogartikel[/post] Text ... (http://playground.ebiene.de/2388/wordpress-shortcode-links/)
add_shortcode(
  'intlink',
  create_function(
    '$atts, $data',
    'return "<a href=\"" .get_permalink($atts[id]). "\" title=\"" .esc_attr(strip_tags(get_the_title($atts[id]))). "\">" .$data. "</a>";'
  )
);


// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
	return 'Read More &raquo;';
}
add_filter('excerpt_more', 'custom_excerpt_more');


// no more jumping for read more link
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');


// Kategorien in Body-Class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
	$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


// Header aufräumen
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


// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS
   function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
   }
   add_action('admin_menu', 'all_settings_link');

// custom pw form
function fb_the_password_form() {
	global $post;
	$label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
	$output = '<form action="' . get_option('siteurl') . '/wp-pass.php" method="post">
	<p>' . __("My post is password protected. Please ask me for a password:") . '</p>
	<p><label for="' . $label . '">' . __("Password") . ' <input name="post_password" value="'. $_GET['pw'] .'" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . esc_attr__("Submit") . '" /></p>
	</form>';
	return $output;
}
add_filter('the_password_form', 'fb_the_password_form');   
   
// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}
       
       
// REMOVE META BOXES FROM DEFAULT POSTS SCREEN
function remove_default_post_screen_metaboxes() {
	 remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	 remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	 remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	 remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');


// REMOVE META BOXES FROM DEFAULT PAGES SCREEN
function remove_default_page_screen_metaboxes() {
	remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
 }
add_action('admin_menu','remove_default_page_screen_metaboxes'); 

// Add an excerpt box for pages
if ( function_exists('add_post_type_support') ) 
{
    add_action('init', 'add_page_excerpts');
    function add_page_excerpts() 
    {        
        add_post_type_support( 'page', 'excerpt' );
    }
}

// Dashboard aufräumen
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 //Right Now - Comments, Posts, Pages at a glance
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
//Recent Comments
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
//Incoming Links
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
//Plugins - Popular, New and Recently updated Wordpress Plugins
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

//Wordpress Development Blog Feed
//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
//Other Wordpress News Feed
//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
//Quick Press Form
//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
//Recent Drafts List
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}      


// Remove Private and Protected Prefix
function the_title_trim($title) {
$title = attribute_escape($title);
$findthese = array(
    '#Protected:#',
    '#Private:#'
);
$replacewith = array(
    '', // What to replace "Protected:" with
    '' // What to replace "Private:" with
);
$title = preg_replace($findthese, $replacewith, $title);
return $title;
}
add_filter('the_title', 'the_title_trim');


// Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
remove_filter('atom_service_url','atom_service_url_filter');


// Enable GZIP output compression
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));

   
// Extending Auto Logout Period   
function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );   


/***************************************************************
* Function body_class_section
* Add the top level page to the body class for coloured sections
***************************************************************/

add_filter('body_class','body_class_section');

function body_class_section($classes) {
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


/**
 * Disable 'Comments' link if default status is _closed_
 */
function remove_comments() 
{
    $default_comment_status = get_option( 'default_comment_status' );

    if ( $default_comment_status == 'closed' ) 
    {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 50 );

        // optional solution using the WP_Admin_Bar class from /wp-includes/class-wp-admin-bar.php
        # global $wp_admin_bar;
        # $wp_admin_bar->remove_menu( 'comments' );
    }
    else 
    {
        return;
    }
}

/**resize on upload to the largest size in media setting */

function replace_uploaded_image($image_data) {
// if there is no large image : return
if (!isset($image_data['sizes']['large'])) return $image_data;

// path to the uploaded image and the large image
$upload_dir = wp_upload_dir();
$uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
$large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file'];

// delete the uploaded image
unlink($uploaded_image_location);

// rename the large image
rename($large_image_location,$uploaded_image_location);

// update image metadata and return them
$image_data['width'] = $image_data['sizes']['large']['width'];
$image_data['height'] = $image_data['sizes']['large']['height'];
unset($image_data['sizes']['large']);

return $image_data;
}
add_filter('wp_generate_attachment_metadata','replace_uploaded_image');

