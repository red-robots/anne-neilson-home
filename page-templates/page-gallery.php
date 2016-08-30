<?php
/**
 * Template Name: Gallery
 */

get_header(); ?>

<div id="primary">
		<div id="content"  class="full-content">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
                
            <?php endwhile; // end of the loop. ?>
            
            
<?php
			// Staff
			
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'staff',
	'posts_per_page' => -1,
	'orderby'   => 'menu_order',
              'order'     => 'ASC'
));
	if ($wp_query->have_posts()) : ?>
    <div class="entry-content">
    <h2>Staff</h2>
    <div class="blocks-container">
    <?php while ($wp_query->have_posts()) : ?>
     <?php $wp_query->the_post(); ?>
     
     <div class="staff-box blocks ">
     <a class="" href="<?php the_permalink(); ?>">
     <?php 
        // Get field Name
        $image = get_field('picture'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
        $size = 'thumbnail';
        $thumb = $image['sizes'][ $size ];
        ?>
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
     <div class="staff-content">
     	<h3 class="staff"><?php the_title(); ?></h3>
        <div class="staff_title"><?php the_field('staff_title'); ?></div>
        <!--<div class="staff-bio">
        	<?php //echo custom_field_excerpt(); ?>
        </div> staff bio -->
     </div><!-- staff content -->
     </a>
     </div><!-- staff box -->
    
    <?php endwhile;  ?>
    </div><!-- blocks container -->
     </div><!-- entry content -->
    <?php endif; // end of the loop.  ?>
    
    
    <?php wp_reset_postdata(); wp_reset_query(); ?>
    <div class="clear"></div>
    
    
    <div class="entry-content">
    
    <h2>THE GALLERY</h2>
    
    <div class="gallery-google-map">
    	<?php the_field('google_map'); ?>
    </div><!-- gallery google map -->
    
    
    	 <?php 
		 
		 
        // Get field Name
        $image = get_field('map');
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
        $size = 'thumbnail';
        $thumb = $image['sizes'][ $size ];
        ?>
      <!--  <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" class="alignleft" />-->
        
       <?php 
	   		$address = get_field('address'); 
		 echo '<div class="mapaddress">' . $address . '</div>';
		 ?>
         
         
    </div><!--entry content-->
            
            

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>