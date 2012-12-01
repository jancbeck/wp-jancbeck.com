<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" class="no-js">
<head>

	<meta charset="utf-8" />
	<meta name="author" content="<?php echo get_userdata(1)->nickname; ?>">
	<meta name="description" content="Jan Beck writes about what he learned and thinks about.">
	<meta name="country" content="DE">
	<meta name="language" content="<?php bloginfo('language'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="generator" content="WordPress" />

	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Mono|PT+Serif:400,700,400italic,700italic" rel="stylesheet">

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/png">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png"/>

	<?php wp_head(); ?>

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); echo(!is_front_page() ? '' : ' | '. get_bloginfo('description')) ?></title>
</head>

<body <?php body_class(); ?>>

<header role="banner">
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
</header>
<nav role="navigation">
	<?php wp_nav_menu( array(
		'theme_location' => 'navigation',
		'container' => '',
		'menu_class' => 'navigation'	
	)); ?>
</nav>