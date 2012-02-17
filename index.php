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

<div class="wrap portfolio" id="portfolio">

	<ul class="hero">
		<li class="project project-benni">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/benni.jpg" alt="Referenz 1" class="project-media media-benni" />
			<div class="project-description">
				<h3>Benjamin Messingschlager Mediendesign</h3>
				<p class="project-intro">Benjamin Messingschlager versteht sich als Handwerker mit Auge für Details und hohem Anspruch an Form und Inhalt. Entsprechend hoch waren auch die Erwartungen an die technische Realisation dieser Wordpress Umsetzung.  <a href="http://benjaminmessingschlager.de/">Seite besuchen</a>
				</p>
			</div>
		</li>
		<li class="project project-malte">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/malte.jpg" alt="Referenz 2" class="project-media media-malte" />
			<div class="project-description">
				<h3>Malte Pietschmann Portfolio</h3>
				<p class="project-intro">Die Fotografien von Malte Pietschmann sprechen für sich und verlangen eine Bühne zur Präsentation frei von Ablenkung und Hektik. Das schlichte und dennoch hochangepasste Template verfügt über Social Media Anbindung und genügend Optionen um bequem verwaltet zu werden. <a href="http://maltepietschmann.com/">Seite besuchen</a>
				</p>
			</div>
		</li>
		<li class="project project-illitheas">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/illitheas.jpg" alt="Referenz 3" class="project-media media-illitheas" />
			<div class="project-description">
				<h3>Illitheas – Trance &amp; Progressive</h3>
				<p class="project-intro">Bernie "Illitheas" Gums melodische elektronische Klänge haben es bis in die Sets von internationalen Top DJs geschafft. Seine Website bilden die Plattform für die Eigenpromotion, Kommunikation mit den Fans sowie die Veröffentlichung von neuen Stücken, Fotos und Videos. <a href="http://illitheas.de/">Seite besuchen</a>
				</p>
			</div>
		</li>
		<li class="project project-cintia">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/cintia.jpg" alt="Referenz 4" class="project-media media-cintia" />
			<div class="project-description">
				<h3>Cintia Barosso Studio</h3>
				<p class="project-intro">Vorbei sind die Zeiten in denen innovative Gestaltung, lebhafte Animationen und interaktive Benutzerführung Flashseiten vorenthalten waren. Dieses Fotoportfolio basiert auf jQuery und CSS3 und vereint die standardkonforme Webwelt mit der spannend gestalteten. <a href="http://www.cbastudio.de/fashion/">Seite besuchen</a>
				</p>
			</div>
		</li>
	</ul>

</div>

<div class="wrap fix catcher portfolio-catcher">

	<p>Gestalterisches und technisches Know-how aus einer Hand geht nicht? Geht doch!</p>

</div>

<div class="wrap" id="services">

	<h2 class="section-title">Leistungen</h2>
	
	<div class="fix cols cols-3">
	
		<div class="col first">
	
			<h3 id="webdesign">Webdesign</h3>
			
			<p>Webdesign ist für Sie bloß Print auf 1024 Pixeln Breite?  Dann fürchte ich bin ich der Falsche für Sie. Das Web ist ein funktionales, kein graphisches Medium. Es erfindet sich alle 5 Jahre selbst neu und will jedes mal wieder neugestaltet, -entwickelt und -verstanden werden. Dafür bin ich ihr Navigator. Lassen Sie uns gemeinsam die Grenzen des Machbaren erkunden.
			</p>
		
		</div>
		
		<div class="col">
		
			<h3 id="web-development">Webentwicklung</h3>
			
			<p>Damit Ihre Website nicht nur schön aussieht sondern auch mit Freude zu benutzen ist, kümmere ich mich um eine technisch einwandfreie Umsetzung nach modernen Standards. Ich folge dabei der Philosophie des <a href="http://de.wikipedia.org/wiki/Progressive_Verbesserung" title="Link zu Wikipedia Artikel 'Progressive Enhancement'">Progressive Enhancements</a> damit Ihre Nachricht das größtmögliche Publikum erreicht.
			</p>
			
		</div>
			
		<div class="col last">
			
			<h3 id="wordpress">WordPress</h3>
			
			<p>In den letzten 5 Jahren habe ich über 30 Projekte mit dem weltweit <a href="http://w3techs.com/technologies/overview/content_management/all" title="Link zu 'Usage of content management systems for websites'">beliebtesten</a> CMS realisiert. Ich behaupte: Jedes Layout ist mit Wordpress umsetzbar. Teilen Sie meine Begeisterung für Wordpress in dem Sie uns gemeinsam anspruchsvolle und dennoch intuitiv bedienbare Webprojekte realisieren lassen.
			</p>
		</div>
		
	</div>
	
</div>

<div class="wrap catcher leistungen-catcher">

	<p>Interesse geweckt? Nehmen Sie <a href="#contact">Kontakt</a> zu mir auf!</p>

</div>

<div id="contact">

	<div class="wrap">

		<h2 class="section-title">Kontakt</h2>
	
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
						<dt>Anschrift</dt>
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