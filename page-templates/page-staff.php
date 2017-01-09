<?php
/**
 * Template Name: Staff
 */

get_header(); ?>

<div id="primary" class="full-content">
	<div id="content"  class="">

		<h1 class="page-title"><?php the_title(); ?></h1>
        
		<?php while(have_posts()) : the_post(); ?>	
			
            <div class="entry-content">
				<?php the_content(); ?>
            </div><!-- entry content -->
            
        <?php endwhile; wp_reset_query(); ?>

              
     				
<?php


	// Start query
	$wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'staff',
    'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order'   => 'ASC'
	
	));
    if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
   <?php 
        // Get field Name
        $image = get_field('picture'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     	 $size = 'large';
        $thumb = $image['sizes'][ $size ];
		
		$staffTitle = get_field('staff_title');
		$phone = get_field('phone');
		$phone_2 = get_field('phone_2');
		$email = get_field('email');
		$antiSpam = antispambot($email);
        ?>
        
<div class="staff-box blocks ">
  <!--   <a class="" href="#">-->
        <div class="staff-image-wrapper">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            <a class="surrounding" href="<?php echo get_the_permalink();?>"></a>
        </div>
     <div class="staff-content">
     	<a href="<?php echo get_the_permalink();?>"><h3 class="staff"><?php echo get_the_title(); ?></h3></a>
        <div class="staff_title"><?php echo '<a href="'.get_the_permalink().'">'.$staffTitle.'</a>'; ?></div>
        <?php if($phone != '') {echo '<div class="staff-item">'.$phone.'</div>';} ?>
        <?php if($phone_2 != '') {echo '<div class="staff-item">'.$phone_2.'</div>';} ?>
        <?php if($email != '') {
			echo '<div class="staff-item"><a href="mailto:'.$antiSpam.'">'.$antiSpam.'</a></div>';
			} ?>
        <!--<div class="staff-bio">
        	        </div> staff bio -->
     </div><!-- staff content -->
    <!-- </a>-->
</div><!-- staff box -->	
                    
    <?php endwhile; ?>
    <?php endif; ?>            
                       
                    
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
