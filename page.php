<?php get_header(); ?>

<main role="main">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		
		<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1><?php the_title();?></h1>	
			<?php the_content(); ?>
							
		</article>

	<?php endwhile;	?>
		
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>