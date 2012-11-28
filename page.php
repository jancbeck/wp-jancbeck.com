<?php get_header(); ?>

<main role="main">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<article role="article">
		
			<h2><?php the_title();?></h2>	
			<?php the_content(); ?>
							
		</article>

	<?php endwhile;	?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>