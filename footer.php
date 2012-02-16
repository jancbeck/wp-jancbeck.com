<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/init.js"></script>

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

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1225165-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>