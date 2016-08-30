<?php 
	// Taxonomy
	$tax = 'category';
	$taxtag = 'Categorized: ';
	$date = get_the_date('M j, y');

?>
<div class="post">
	<div class="entry-content">   
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <div class="blog-date">
			<?php echo $date; ?>
        </div><!-- the-date -->
        
            <div class="post-contents">
            
			 <?php if ( has_post_thumbnail() ) { ?>
            	<div class="post-thumb">
					<?php the_post_thumbnail('medium'); ?>
                </div><!-- post thumb -->
			 <?php } ?>
            
            <?php the_content(); ?>
            
            </div><!-- post contents -->
        
        
        <div class="meta">
            <?php $custom_tax = get_the_term_list( $post->ID, $tax, $taxtag  , ', ' ) ?>  
            <?php echo $custom_tax ?>
        </div><!-- meta -->
        	
	</div><!-- entry content -->
</div><!-- post -->