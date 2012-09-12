<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" class="no-js">
<head>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement) /* removes no-js class */</script>

	<meta charset="utf-8" />
	<meta name="author" content="Jan Beck">
	<meta name="description" content="Jan Beck plaudert über Webdesign, Webdevelopment, eigene Projekte und Diesundas.">
	<meta name="country" content="DE">
	<meta name="language" content="<?php bloginfo('language'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="generator" content="WordPress" />

	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Mono|PT+Serif:700" rel="stylesheet">

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

<body <?php body_class(); ?>>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo home_url(); ?>">jB</a>
			<div class="nav-collapse">
				<?php wp_nav_menu( array(
					'theme_location' => 'main-nav',
					'container' => '',
					'menu_class' => 'nav',
					'walker' => new Bootstrap_Walker_Nav_Menu())
				); ?>
				<?php get_search_form(); ?>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>