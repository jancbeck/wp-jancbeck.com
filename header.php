<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6" dir="ltr" lang="de-DE"> <![endif]-->
<!--[if IE 7 ]>	<html class="ie7" dir="ltr" lang="de-DE"> <![endif]-->
<!--[if IE 8 ]>	<html class="ie8" dir="ltr" lang="de-DE"> <![endif]-->
<!--[if IE 9 ]>	<html class="ie9" dir="ltr" lang="de-DE"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" dir="ltr" lang="de-DE"> <!--<![endif]-->
<html dir="ltr" lang="de-DE">
<head>
	<title><?php if ( is_tag() ) {
			echo 'Tag Archive for &quot;'.$tag.'&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} else {
			echo wp_title( ' | ', false, right ); bloginfo( 'name' );
		} ?></title>
	
	<meta charset="UTF-8" />	
	<meta name="description" content="<?php bloginfo( 'name' ); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta name="generator" content="WordPress" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>apple-touch-icon.png" type="image/x-icon" /> <?php /* 129x129 */ ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="index" href="<?php echo bloginfo('wpurl'); ?>" />
	
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'template_url' ); ?>/style.css" />
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/lessframework.css" />
	
	<!--[if lte IE 8]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<?php wp_head(); ?>
	<script src="http://use.typekit.com/nap1oaw.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?> id="home">

<header class="fix wrap header">

	<div class="site-head">
		<h1 class="site-logo" data-text="<?php echo bloginfo( 'name' ) ?>"><a href="<?php echo home_url(); ?>"><?php echo bloginfo( 'name' ) ?></a></h1>
		<p class="site-description"><?php echo bloginfo( 'description' ) ?></p>
	</div>	

	<nav class="main-nav">
		<ul>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#portfolio">Referenzen</a></li>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#services">Leistungen</a></li>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#profile">Profil</a></li>
			<li><a href="<?php echo bloginfo('wpurl'); ?>/#contact">Kontakt</a></li>
		</ul>
	</nav>

</header>