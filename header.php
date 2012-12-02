<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" class="no-js">
<head>

	<meta charset="utf-8" />
	<meta name="author" content="<?php echo get_userdata(1)->nickname; ?>">
	<meta name="language" content="<?php bloginfo('language'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="generator" content="WordPress" />

	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Mono|PT+Serif:400,700,400italic,700italic" rel="stylesheet">

	<link rel="shortcut icon" href="<?php echo get_theme_mod('favicon_ico') ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo get_theme_mod('favicon_png') ?>" type="image/png">
	<link rel="apple-touch-icon" href="<?php echo get_theme_mod('favicon_apple') ?>"/>

	<?php wp_head(); ?>

	<title><?php wp_title('|', true, 'right'); ?></title>
</head>

<body <?php body_class(); ?> id="top">

<header role="banner">
	<a href="<?php echo home_url(); ?>"><?php echo get_theme_mod('header_text') ?></a>
</header>
<nav role="navigation">
	<?php wp_nav_menu( array(
		'theme_location' => 'navigation',
		'container' => '',
		'menu_class' => 'navigation'	
	)); ?>
</nav>