<?php get_header(); ?>

<main role="main">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

		<article role="article">
		
			<h2 class="post-title"><?php the_title(); ?></h2>
			<p class="post-date"><?php the_date(); ?></p>
	
			<?php the_content( '' ); ?>			

		</article>

	<?php endwhile;	?>
	<?php endif; ?>
	
</main>

<?php get_footer(); ?>