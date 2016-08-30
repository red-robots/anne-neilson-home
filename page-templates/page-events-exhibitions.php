<?php
/**
 * Template Name: Exhibitions
 */

get_header(); ?>

<div id="primary" class="content">
		<div id="content"  class="site-content">

<?php
	$thedate = date("Ymd");
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'exhibitions',
	'posts_per_page' => 10,
	'paged' => $paged,
	'meta_key' => 'date_of_event',
    //'meta_value' => $thedate,
    //'meta_compare' => '>=',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
));
	if ($wp_query->have_posts()) : ?>
<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); ?>	
 
 
		<?php //get_template_part('inc/blogpost-events'); ?>
        
        
        
        <?php 
// get the post type 
$posttype = get_post_type();
// check which one
if('post' == $posttype ) {
	$tax = 'category';
	$taxtag = 'Categorized: ';
	$date = get_the_date('M j, y');
} elseif('events' == $posttype || 'exhibitions' == $posttype) {
	$tax = 'event_tag';
	$taxtag = 'Tagged: ';
	$eventdate = DateTime::createFromFormat('Ymd', get_field('date_of_event'));
		if(get_field('finish_date')!="") { 
			$date = 'Event date: ' . $eventdate->format('M j');
			$eventdate2 = DateTime::createFromFormat('Ymd', get_field('finish_date'));
			$date2 = ' - ' . $eventdate2->format('j, Y');
		} else {
			$date = 'Event date: ' . $eventdate->format('M j, Y');
		}
} elseif('press' == $posttype) {
	$tax = 'press_type';
	$taxtag = 'Pressed: ';
	$date = get_the_date('M j, Y');
}
?>
<div class="post">
	<div class="entry-content">   
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <div class="blog-date">
			<?php echo $date; 
                    if(!$eventdate2 == "") { echo $date2; };
            ?>
        </div><!-- the-date -->
        
            <div class="post-contents">
  
            <?php // lets show the ful blog if it's a Press Release
					// otherwise, let's just show the excerpt
					
						the_content();
					
			?>
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
 
<?php 
// references pagination function in your functions.php file
	pagi_posts_nav(); ?>	
 
<?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
<?php get_sidebar('exhibitions'); ?>
<?php get_footer(); ?>