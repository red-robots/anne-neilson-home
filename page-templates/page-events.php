<?php
/**
 * Template Name: Events
 */

get_header(); ?>

<div id="primary" class="content">
	<div id="content"  class="site-content">

<?php
	//$thedate = date("Ymd");
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'events',
	'posts_per_page' => 10,
	'paged' => $paged,
	'meta_key' => 'date_of_event',
    //'meta_value' => $thedate,
    //'meta_compare' => '>=',
    'orderby' => 'meta_key',
    'order' => 'DESC'
));
	if ($wp_query->have_posts()) : ?>
<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); ?>	
<?php 
	$tax = 'event_tag';
	$taxtag = 'Tagged: ';
	$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_event'));
		if(get_field('finish_date')!="") { 
			$date = 'Event date: ' . $eventdate->format('M j');
			$eventdate2 = DateTime::createFromFormat('Ymd', get_field('finish_date'));
			$date2 = ' - ' . $eventdate2->format('j, Y');
		} elseif(get_field('date_of_event')!="")  {
			$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_event'));
			$newdate = $eventdate->format('M j, Y');
			$date = 'Event date: ' . $newdate;
		}
?>
<div class="post">
	<div class="entry-content">   
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <div class="blog-date">
			<?php if(!$eventdate == "") {echo $date;} 
                    if(!$eventdate2 == "") { echo $date2; }
            ?>
        </div><!-- the-date -->
        
            <div class="post-contents">
  				<?php the_content(); ?>
            </div><!-- post contents -->
        
        <?php $custom_tax = get_the_term_list( $post->ID, $tax, $taxtag  , ', ' ) ;
		
				if($custom_tax) {
		?>
            <div class="meta">
                <?php echo $custom_tax ?>
            </div><!-- meta -->
        <?php } ?>
        	
	</div><!-- entry content -->
</div><!-- post -->
    
    
<?php endwhile;  ?>
<div class="clear"></div>
 
<?php pagi_posts_nav(); ?>	
 
<?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
<?php get_sidebar('events'); ?>
<?php get_footer(); ?>