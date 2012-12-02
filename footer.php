<footer role="contentinfo">
	<?php wp_nav_menu( array(
		'theme_location' => 'footer-links',
		'container' => '',
		'menu_class' => 'navigation'	
	)); ?>
	<a class="scroll-to-top" href="#top">↑</a>
</footer>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', <?php echo get_theme_mod('ga_code') ?>]);
  _gaq.push (['_gat._anonymizeIp']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_footer(); ?>

</body>
</html>