<footer role="contentinfo">
	<?php wp_nav_menu( array(
		'theme_location' => 'footer-links',
		'container' => '',
		'menu_class' => 'navigation'	
	)); ?>
<!--	<p><small><a href="http://creativecommons.org/licenses/by-sa/3.0/de/">CC-BY-SA 3.0</a> | <a href="<?php echo get_permalink(get_page_by_title('Impressum')) ?>">Impressum</a></small></p>-->
</div>

<?php wp_footer(); ?>

</body>
</html>