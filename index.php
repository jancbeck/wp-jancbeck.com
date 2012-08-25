<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<p class="post-category"><?php echo get_first_category(); ?></p>
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h2>

		<div class="post">
			<?php the_content( 'Weiterlesen »' ); ?>
		</div>

	<?php endwhile;	?>
	<?php endif; ?>

</div>

<?php get_footer(); ?>