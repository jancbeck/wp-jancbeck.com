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
      <a class="brand" href="#">Project name</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">

	<h2>Hello, world!</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

</div>

<?php get_footer(); ?>

</body>
</html>