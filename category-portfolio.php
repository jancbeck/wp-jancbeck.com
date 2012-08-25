<?php get_header();
	
	// The number of posts that will appear in the carousel. 
	// Also offset for main query.
	$offset = 4;
	
	// gets $offset-number of posts for carousel
	$args = array(
		'numberposts' => $offset,
		'category' => get_query_var('cat')
	);
	$stickies = get_posts( $args ); 
	$first = 0;
?>

<div class="container">

<div id="stickies" class="carousel slide">
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php foreach( $stickies as $sticky ) : ?>
			
			<div class="item<?php echo ( $first++ == 0 ? ' active' : ''); ?>"><?php echo get_the_post_thumbnail( $sticky->ID ); ?></div>			
			
		<?php endforeach; ?>
	</div>
	<!-- Carousel nav -->
	<a class="carousel-control left" href="#stickies" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#stickies" data-slide="next">&rsaquo;</a>
</div>

<?php query_posts( 'offset=4' ); ?>

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h2>

		<div class="post">
			<?php the_content( 'Weiterlesen »' ); ?>
		</div>

	<?php endwhile;	?>
	<?php endif; ?>

</div>

<?php get_footer(); ?>