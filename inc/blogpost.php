<?php 
// get the post type 
$posttype = get_post_type();
// check which one
if('post' == $posttype ) {
	$tax = 'category';
	$taxtag = 'Categorized: ';
	$date = get_the_date('M j, y');
} elseif('events' == $posttype) {
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
        
        <div class="the-date">
			<?php echo $date; 
                    if(!$eventdate2 == "") { echo $date2; };
            ?>
        </div><!-- the-date -->
        
            <div class="post-contents">
            
            <?php if(!'press' == $posttype) : ?>
            <?php if ( has_post_thumbnail() ) { ?>
            	<div class="post-thumb">
					<?php the_post_thumbnail('medium'); ?>
                </div><!-- post thumb -->
			 <?php } ?>
            <?php endif; ?>
            <?php // lets show the ful blog if it's a Press Release
					// otherwise, let's just show the excerpt
					if('press' == $posttype) {
						the_content();
					} else {
						the_excerpt();	
					}
			?>
            </div><!-- post contents -->
        
        <div class="readmore"><a href="<?php the_permalink(); ?>">Read more &raquo;</a></div><!-- readmore -->
        
        <div class="meta">
            <?php $custom_tax = get_the_term_list( $post->ID, $tax, $taxtag  , ', ' ) ?>  
            <?php echo $custom_tax ?>
        </div><!-- meta -->
        	
	</div><!-- entry content -->
</div><!-- post -->