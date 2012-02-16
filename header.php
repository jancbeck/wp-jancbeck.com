<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8 no-js" lang="ende-DE> <![endif]-->
<!--[if IE 8]><html class="lt-ie9 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="de-DE"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="de-DE"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement) /* removes no-js class */</script>
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	
	<meta name="generator" content="WordPress" />
	
	<base href="<?php echo bloginfo('wpurl'); ?>" />
	
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="index" href="<?php echo bloginfo('wpurl'); ?>" />
	
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style.css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/flexslider.css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/layout.css" />
		
	<?php wp_head(); ?>
	
	<script src="http://use.typekit.com/nap1oaw.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?> id="home">

<div class="fix wrap header">

	<div class="site-head">
		<h1 class="site-logo" data-text="<?php echo bloginfo( 'name' ) ?>"><a href="<?php echo home_url(); ?>"><?php echo bloginfo( 'name' ) ?></a></h1>
		<p class="site-description"><?php echo bloginfo( 'description' ) ?></p>
	</div>	

	<div class="main-nav">
		<ul>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#portfolio">Referenzen</a></li>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#services">Leistungen</a></li>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#contact">Kontakt</a></li>
		</ul>
	</div>

</div>