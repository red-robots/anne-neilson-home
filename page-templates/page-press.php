<?php
/**
 * Template Name: Press
 */

get_header(); ?>

<div id="primary" class="content">
		<div id="content"  class="">

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'press',
	'posts_per_page' => 12,
	'paged' => $paged,
));

	if ($wp_query->have_posts()) : $count = 0; ?>
    
    <div class="blocks-container">
    
	<?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post();  $count++; ?>	
 
		<?php //get_template_part('inc/presspost'); ?>
        
        <?php 
        // Get field Name
        $image = get_field('image');
		 $presslink = get_field('press_link'); 
		 $weblink = get_field('website_link'); 
		 $pdf = get_field('pdf_file_upload'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
        $size = 'productslider';
		$largesize = 'large';
		// Thumb size
        $thumb = $image['sizes'][ $size ];
		// large size
		 $large = $image['sizes'][ $largesize ];
		
		//echo $presslink;
		
		//echo $count;
		if($count == 4) {
			$pressclass = 'pressthird';
			$count = 0;
		} else {
			$pressclass = 'presseven';	
		}
		
        ?>
        
    <div class="press-box blocks <?php echo $pressclass; ?>">
    	<?php 
		if ($presslink == 'none') {
			echo '<a class="group1" href="' . $large . '">';
		} elseif ($presslink == 'pdf_link') {
			echo '<a  href="' . $pdf . '">';
		} elseif ($presslink == 'website_link') {
			echo '<a  href="' . $weblink . '">';
		}
		
		?>
    	
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
           
         <div class="press-content">
            <h2 class="press"><?php the_title(); ?></h2>
            <div class="pressdate"><?php echo get_the_date(); ?></div>
         </div><!-- artists content -->
        </a>
    </div><!-- artist box -->
    
    
<?php endwhile;  


?>
</div><!--blocks container-->
<div class="clear"></div>
 
<?php pagi_posts_nav(); ?>	
 
<?php endif; // end of the loop. ?>
<div class="clear"></div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>