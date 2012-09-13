<?php get_header(); ?>

<div class="container">

	<div class="page-section">
		
		<p class="intro">Hallo, ich bin Webdesigner und -entwickler. Ich mache Webseiten und dies ist meine.</p>
	
	</div>
	
	<div class="page-section">
	
		<h2 class="page-section-title"><a href="#">Projects</a></h2>
		
		<?php $projects = get_posts( 'category_name=portfolio' ); 
			  $i = 0; ?>
			
		<div id="projects-carousel" class="carousel slide">
		  <!-- Carousel items -->
		  <div class="carousel-inner">
		  
		  <?php	foreach( $projects as $project ) : ?>
		    
		    <a href="<?php echo get_permalink( $project->ID ); ?>" class="item<?php echo( $i++ ? '' : ' active'); ?>">
		    	<?php echo get_the_post_thumbnail( $project->ID, 'large', array('class'	=> "attachment-large shadowless") ); ?>
				<div class="carousel-caption">
		          <h4><?php echo $project->post_title; ?></h4>
		        </div>
			</a>
		    
		  <?php endforeach; ?>
		    
		  </div>	
		  <!-- Carousel nav -->
		  <a class="carousel-control left" href="#projects-carousel" data-slide="prev">&lsaquo;</a>
		  <a class="carousel-control right" href="#projects-carousel" data-slide="next">&rsaquo;</a>
		</div>
	
	</div>
	
	<div class="page-section page-section-blog">
		
		<h2 class="page-section-title"><a href="#">Blog</a></h2>
		
		<div class="row">
		
			<?php 
			$posts = get_posts( 'numberposts=3' );
			if ( $posts ) : foreach( $posts as $post ) : setup_postdata($post); ?>
			
			<div class="span4">
			
				<p class="post-date"><?php the_date() ?></p>
				<h4><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h4>
		
			</div>
	
			<?php endforeach; ?>
			<?php endif; ?>

		</div>
	</div>
	
	<div class="page-section">

		<h2 class="page-section-title"><a href="#">Contact</a></h2>
	
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
	</div>
	
</div>

<?php get_footer(); ?>