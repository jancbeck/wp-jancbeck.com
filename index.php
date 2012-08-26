<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<p class="post-category"><?php the_date() ?></p>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h2>
	
			<div class="post-content">
				<?php the_content( 'Weiterlesen »' ); ?>
			</div>
			
			<?php if ( is_single() ) { ?>
				
				<p class="post-info">
					Wenn du eine Kurz-URL benötigst, nimm diese: <a href="#">http://jancb.de/<?php the_ID(); ?></a>
				</p>
				
			<?php } ?>
			
			<?php comments_template(); ?> 

		</div>

	<?php endwhile;	?>
	
	<?php echo bootstrap_pagination(); ?>
	
	<?php else:	?>
		<div class="alert fade in">
            <h3 class="alert-heading">Oh nein! Nichts gefunden!</h3>
            <p>Das ist mir jetzt ein bisschen peinlich, aber das wonach du gesucht hast befindet sich offensichtlich nicht hier.</p>
            <p>Versuche es noch einmal mit der Suche oben links oder kehre zur <a href="<?php echo home_url(); ?>" title="Zur Startseite gehen">Startseite</a> zurück. Du kannst mich auch <a href="<?php echo get_permalink(get_page_by_title('Kontakt')); ?>">kontaktieren</a> und den Fehler melden.</p>
        </div>
	
	<?php endif; ?>
	
	
	
</div>

<?php get_footer(); ?>