<?php get_header(); ?>

<div class="container">

<h1 class="page-header">Jan Beck</h1>

<h2><a href="#">Über mich</a></h2>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<h2><a href="#">Portfolio</a></h2>

<?php $projects = get_posts( 'category_name=portfolio' ); 
	  $i = 0; ?>
	
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
  
  <?php	foreach( $projects as $project ) : ?>
    
    <div class="item<?php echo( $i++ ? '' : ' active'); ?>">
    	<?php echo get_the_post_thumbnail( $project->ID, 'full' ); ?>
		<div class="carousel-caption">
          <h4><?php echo $project->post_title?></h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
	</div>
    
  <?php endforeach; ?>
    
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
	
<h2><a href="#">Blog</a></h2>

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

	<div class="post">
	
		<p class="post-date"><?php the_date() ?></p>
		<h3><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h3>

		<div class="post-content">
		
			<?php the_content( '' ); ?>
			
			<?php if ( has_more() ) {
			
					if ( has_post_thumbnail() ) {
						echo '<p><a href="'. get_permalink() .'">'. get_the_post_thumbnail( ). '</a></p>';
					}
					echo '<p class="more-link"><a href="'. get_permalink() .'">'. __( 'Continue Reading' ) .'</a>';
				
				 } else {
				 
					if ( has_post_thumbnail() ) {
						echo '<p>'. get_the_post_thumbnail( ). '</p>';
					}
			 } ?>
		</div>

	</div>

	<?php endwhile;	?>
	
	<?php endif; ?>
	
<h2><a href="#">Contact</a></h2>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	
</div>

<?php get_footer(); ?>