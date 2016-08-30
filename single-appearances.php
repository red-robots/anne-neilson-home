<?php get_header(); ?>

	<div id="primary" class="full-content">
		
        
       
        
        <div id="content"  class="">

			<?php while ( have_posts() ) : the_post(); ?>

				
                
 <?php 
		// Set some variables to set how to show the dates.
		$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_signing'));
		$endate = DateTime::createFromFormat('Ymd', get_field('end_date'));
		$month = $eventdate->format('M');
		$street = get_field('street_address'); 
		$city = get_field('city'); 
		$state = get_field('state'); 

		$image = get_field('image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'large';
		$thumb = $image['sizes'][ $size ];

 	?>
                
            <div class="entry-content">
            
            <div class="singleeventleft">
            
            <h2 class="book"><?php the_title(); ?></h2>
            <div class="singleeventdate">
					<span class="singetoptitle">Date</span><br>
					<?php echo $eventdate->format('l, F j'); 
						if($endate != '') {echo ' - '.$endate->format('l, F j');}
					?>
            </div><!-- singleenventdate -->
             
            
            	<div class="singleeventtime">
                <span class="singetoptitle">Time</span><br>
				<?php the_field('time_of_event'); ?>
                </div><!-- eventtime -->


				<div class="singleeventaddress">
                <span class="singetoptitle">Address</span><br>
                	<?php echo $street; ?><br>
                    <?php echo $city; ?>, <?php echo $state; ?>
                </div><!-- event address -->
                
                <div class="sigining-details">
                <span class="singetoptitle">Details </span><br>
				<?php the_field('details'); ?>
                </div><!-- sigining-details -->
                
                
                </div><!-- singleeventleft -->
                

 <div class="googlemap">
 	<?php if( $image != '' ) { ?>
		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	<?php } ?>
   <?php 
	$location = get_field('google_map');
		if( !empty($location) ): ?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                <div class="markerinfo">
                <strong><?php echo $location['address']; ?></strong><br>
                	<a href="https://www.google.com/maps/search/<?php echo $location['address']; ?>" target="_blank">Get Directions</a>
                </div><!-- narker info -->
                </div><!-- marker -->
			</div><!-- acf map -->
		<?php endif; ?>
  </div><!-- google map -->
                
				
 			</div><!-- .entry-content -->  
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>