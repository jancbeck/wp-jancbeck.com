<!doctype html>
<!--[if lt IE 7]> <html class="lte-ie9 lte-ie8 lte-ie7 lte-ie6 ie6 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 7]><html class="lte-ie9 lte-ie8 lte-ie7 ie7 no-js" lang="ende-DE> <![endif]-->
<!--[if IE 8]><html class="lte-ie9 lte-ie8 ie8 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="de-DE"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="de-DE"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement) /* removes no-js class */</script>
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="generator" content="WordPress" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Mono|PT+Serif:700' rel='stylesheet' type='text/css'>

	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
	
	<?php wp_head(); ?>
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
      <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('sitename'); ?></a>
      <div class="nav-collapse">
        <?php wp_nav_menu( array( 
					'theme_location' => 'main-nav', 
					'container' => '', 
					'menu_class' => 'nav', 
					'walker' => new Bootstrap_Walker_Nav_Menu()) 
				); ?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">

	<?php 
	
	if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<h1><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h1>
	
		<div class="post">
			<?php the_content( 'Weiterlesen »' ); ?>			
		</div>
		
	<?php endwhile;	?>
	<?php endif; ?>
		
</div>

<?php get_footer(); ?>

</body>
</html>