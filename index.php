<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8 no-js" lang="ende-DE> <![endif]-->
<!--[if IE 8]><html class="lt-ie9 no-js" lang="de-DE"> <![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="de-DE"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="de-DE"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement) /* removes no-js class */</script>
	
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	
	<meta name="generator" content="WordPress" />
	
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

	<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container_class' => 'nav-main' ) ); ?>

</div>

<div class="wrap section portfolio" id="portfolio">

	<ul class="hero">
	
		<?php $projects = get_posts(array('post_type' => 'project')); 
			
		foreach ($projects as $project) : ?>
		
		<li class="project <?php echo $project->post_name; ?>">
			<div class="project-media"><?php echo get_the_post_thumbnail($project->ID, 'full'); ?></div>
			<div class="project-description">
				<h3><?php echo $project->post_title; ?></h3>
				<p class="project-intro"><?php echo $project->post_excerpt; ?> <a href="<?php echo get_field('href', $project->ID); ?>"><?php _e('Seite besuchen'); ?></a>
				</p>
			</div>
		</li>
				
		<?php endforeach; ?>
		
	</ul>

</div>

<div class="wrap fix catcher portfolio-catcher">

	<p><?php _e('Gestalterisches und technisches Know-how aus einer Hand geht nicht? Geht doch!'); ?></p>

</div>

<div class="wrap section" id="services">

	<h2 class="section-title"><?php _e('Leistungen'); ?></h2>
	
	<div class="fix cols cols-3">
		
		<?php $services = get_posts(array('post_parent' => 18, 'orderby' => 'menu_order', 'post_type' => 'page'));

		foreach ($services as $service) :  ?>
	
		<div class="col">
	
			<h3 id="<?php echo $service->post_name; ?>"><?php echo $service->post_title; ?></h3>
			
			<p><?php echo $service->post_content; ?></p>
		
		</div>
		
		<?php endforeach; ?>
				
	</div>
	
</div>

<div class="wrap catcher leistungen-catcher">

	<p><?php _e('Interesse geweckt? Nehmen Sie <a href="#contact">Kontakt</a> zu mir auf!'); ?></p>

</div>

<div class="section contact" id="contact">

	<div class="wrap">

		<h2 class="section-title"><?php _e('Kontakt'); ?></h2>
	
		<div class="fix cols cols-2-1">
		
			<div class="col col-1 first">
			
				<?php echo do_shortcode( '[contact-form-7 id="12" title="Kontaktformular 1"]' ); ?>
			
			</div>
			
			<div class="col col-2 last">
			
				<div class="contact-type">
			
					<h3>Online</h3>
					
					<dl>
						<dt>Google+</dt>
						<dd><a href="http://jancbeck.de/+">jancbeck.de/+</a></dd>
						
						<dt>Twitter</dt>
						<dd><a href="https://twitter.com/jancbeck">@jancbeck</a></dd>
		
						<dt>E-Mail</dt>
						<dd><a href="mailto:mail@jancbeck.de">mail@jancbeck.de</a></dd>
					</dl>
					
				</div>
				
				<div class="contact-type">
								
					<h3>Offline</h3>
					
					<dl>
						<dt>Name</dt>
						<dd>
							Jan Beck
						</dd>
						<dt><?php _e('Anschrift'); ?></dt>
						<dd>
							Brandenburger Straße 34<br/>
							95448 Bayreuth
						</dd>
						
						<dt>USt-IdNummer</dt>
						<dd>DE269614032</dd>
					</dl>
				
				</div>
				
				<ul class="web-profile">
					<!--<li class="flickr"><a title="My Photos on flickr" href="http://www.flickr.com/people/jancbeck/">Jan Beck's flickr Account</a></li>-->
					<li class="dribbble"><a title="Stuff on dribbble" href="http://dribbble.com/jancbeck">Jan Beck's dribbble Account</a></li>
					<li class="soundcloud"><a title="My Music on Soundcloud" href="http://soundcloud.com/janshi">Jan Beck's Soundcloud Account</a></li>
					<li class="github"><a title="Social Code on Github" href="http://github.com/jancbeck/">Jan Beck's Github Account</a></li>
				</ul>
			
			</div>
		
		</div>
		
		<ul class="footnote">
			<li><a href="http://www.iconsweets2.com/">iconSweets2</a> by <a href="http://www.yummygum.nl/">Yummygum</a></li>
			<li>Powered by <a href="http://wordpress.com/">Wordpress</a> and <a href="http://typekit.com/">Typekit</a></li>
		</ul>

	</div>
	
</div>

<?php wp_footer(); ?>

<script> 

	function loadScript() {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.googleapis.com/maps/api/js?sensor=true&callback=initializeMap";
		document.body.appendChild(script);
	}
	
	function initializeMap() {
		var latlng = new google.maps.LatLng(49.95396, 11.58974),
			poslng = new google.maps.LatLng(49.96596, 11.59774),
			myOptions = {
				zoom: 14,
				center: poslng,
				scrollwheel: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
		    },
		    MarkerImage = {
		    	url: '<?php bloginfo( 'template_directory' ); ?>/images/jbm_ico_map_bubble.png'
		    },
		    MarkerOptions = { 
		    	position: latlng,
		    	map: map,
		    	icon: MarkerImage,
		    	clickable: false
		    },
		    map = new google.maps.Map(document.getElementById("map"), myOptions),
		    marker = new google.maps.Marker(MarkerOptions);
		    marker.setMap(map);  
	}
	    
	window.onload = loadScript;
  
</script>

<script>
   var _gaq=[['_setAccount','UA-1225165-4'],['_trackPageview']];
   (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
   g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
   s.parentNode.insertBefore(g,s)}(document,'script'));
 </script>

</body>
</html>