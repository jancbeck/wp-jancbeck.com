<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

		<div class="post">
		
			<p class="post-date"><?php the_date() ?></p>
			<h1 class="post-title"><?php the_title();?></h1>
	
			<div class="post-content">
			
				<?php the_content(); ?>
				
			</div>
			
			<?php if ( comments_open() ) comments_template(); ?> 

		</div>

	<?php endwhile;	?>
	
	<?php echo bootstrap_pagination(); ?>
	
	<?php endif; ?>
	
	
	
</div>

<?php get_footer(); ?>