<?php
/**
 * Template Name: Appearances
 */

get_header(); ?>

	<div id="primary" class="full-content">
		<div id="content"  class="site-content">
        <?php 
			// Get the content before reseting the loop below. 
			$contentText = get_the_content();
			$image = get_field('photo'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'large';
			$thumb = $image['sizes'][ $size ];
		
		?>

			<h1 class="page-title"><?php the_title(); ?></h1>
            
           <div class="appearance-content entry-content"><?php the_content(); ?></div><!-- appearance content -->
			
			<?php if ( has_post_thumbnail() ) { ?>
					<div class="postthumb"><?php the_post_thumbnail(); ?></div>
			<?php }  ?>
				
<?php
	// current date
    $thedate = date("Ymd"); 
	
	// Set empty to start
	$month = "";
	$prevmonth = "";

	// Start query
	$wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'appearances',
    'posts_per_page' => -1,
    'paged' => $paged,
	 'meta_key' => 'date_of_signing',
	 'meta_type'=>'numeric',
     'meta_value' => $thedate,
     'meta_compare' => '>=',
     'orderby' => 'meta_value_num',
     'order' => 'ASC',
    //'meta_key'          => 'date_of_signing',
    //'orderby'           => 'meta_key',
    //'order'             => 'DESC'

    
));
    if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
    <?php 
		// Set some variables to set how to show the dates.
		$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_signing'));
		$endate = DateTime::createFromFormat('Ymd', get_field('end_date'));
		$month = $eventdate->format('F Y');
		$street = get_field('street_address'); 
		$city = get_field('city'); 
		$state = get_field('state'); 
 	?>
			<?php if ( $month != $prevmonth ) : ?>	
            	<div class="bookmonth"><?php echo $month; ?></div>
            <?php 
			$prevmonth = $month;
				endif; ?>	
			
            <div class="booksigning">
            <div class="entry-content">
            
            <h2 class="book"><?php the_title(); ?></h2>
            <div class="eventdate">
			<?php echo $eventdate->format('l, F j');
					if($endate != '') {echo ' - '.$endate->format('l, F j');}
			 ?>
            </div><!-- eventdate -->
             
             <div class="clear"></div>
            	<div class="eventtime"><?php the_field('time_of_event'); ?></div>
                
                <div class="eventaddress">
                <!--	<?php echo $street; ?><br>-->
                    <?php echo $city; ?>, <?php echo $state; ?>
                </div><!-- event address -->
                
                <div class="details"><a href="<?php the_permalink(); ?>">Details &raquo;</a></div>
              </div><!-- .entry-content -->  
            </div><!-- book signing -->		
                    
        <?php endwhile; ?>        
    <?php endif; ?>
    <h2 class="bookmonth past-appearances-title">Past Appearances</h2>
    <?php 
	// Set empty to start
	$month = "";
	$prevmonth = "";

	// Start query
	$wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'appearances',
    'posts_per_page' => -1,
    'paged' => $paged,
	 'meta_key' => 'date_of_signing',
	 'meta_type'=>'numeric',
     'meta_value' => $thedate,
     'meta_compare' => '<',
     'orderby' => 'meta_value_num',
     'order' => 'DESC',
//    'meta_key'          => 'date_of_signing',
  //  'orderby'           => 'meta_key',
    //'order'             => 'DESC'

    
));
    if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>
    
    <?php 
		// Set some variables to set how to show the dates.
		$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_signing'));
		$endate = DateTime::createFromFormat('Ymd', get_field('end_date'));
		$month = $eventdate->format('F Y');
		$street = get_field('street_address'); 
		$city = get_field('city'); 
		$state = get_field('state'); 
 	?>
			<?php if ( $month != $prevmonth ) : ?>	
            	<div class="bookmonth"><?php echo $month; ?></div>
            <?php 
			$prevmonth = $month;
				endif; ?>	
			
            <div class="booksigning">
            <div class="entry-content">
            
            <h2 class="book"><?php the_title(); ?></h2>
            <div class="eventdate">
			<?php echo $eventdate->format('l, F j');
					if($endate != '') {echo ' - '.$endate->format('l, F j');}
			 ?>
            </div><!-- eventdate -->
             
             <div class="clear"></div>
            	<div class="eventtime"><?php the_field('time_of_event'); ?></div>
                
                <div class="eventaddress">
                <!--	<?php echo $street; ?><br>-->
                    <?php echo $city; ?>, <?php echo $state; ?>
                </div><!-- event address -->
                
                <div class="details"><a href="<?php the_permalink(); ?>">Details &raquo;</a></div>
              </div><!-- .entry-content -->  
            </div><!-- book signing -->		
                    
        <?php endwhile; ?>
        <div class="clear"></div>
    		<?php pagi_posts_nav(); ?>
    <?php endif; ?>   
   </div><!-- #content -->
   
   	<div id="secondary" class="widget-area-appearances">
        <div class="widget">
        <div class="entry-content">
            <?php //echo $contentText; ?>
            <div class="clear"></div>
             <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
        </div><!-- entry-content -->
        </div><!-- widget -->
    </div><!-- secondary -->
   
</div><!-- #primary -->



<?php get_footer(); ?>
