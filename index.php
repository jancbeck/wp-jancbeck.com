<?php get_header(); ?>

<main role="main">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

	<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="post-meta"><?php echo sprintf(__('By <strong>%1s</strong> on %2s', 'jbm'), get_the_author(), get_the_date()) ?></p>

		<?php the_content(); ?>			

	</article>

<?php endwhile;	?>

<?php echo pagination(); ?>

<?php else:	?>

        <h2><?php _e( 'Nothing found', 'jbm' ); ?></h2>

<?php endif; ?>
	
</main>

<?php get_footer(); ?>