<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" class="no-js">
<head>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement) /* removes no-js class */</script>

	<meta charset="utf-8" />
	<meta name="author" content="<?php echo get_userdata(1)->nickname; ?>">
	<meta name="description" content="Jan Beck about the web.">
	<meta name="country" content="DE">
	<meta name="language" content="<?php bloginfo('language'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="generator" content="WordPress" />

	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Mono|PT+Serif:400,700,400italic,700italic" rel="stylesheet">

	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">
	<!--
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	-->

	<?php wp_head(); ?>

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
</head>

<body>

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