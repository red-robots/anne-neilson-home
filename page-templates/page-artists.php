<?php
/**
 * Template Name: Artists
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
	// order by last name in functions file
	add_filter( 'posts_orderby' , 'posts_orderby_lastname' );

	// Start query
	$wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'artists',
    'posts_per_page' => -1,
	/* Ordering is done by last name in the filter above the query */
	
	));
    if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
   <?php 
        // Get field Name
        $image = get_field('featured_artists_image'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     	 $size = 'featured_thumbs';
        $thumb = $image['sizes'][ $size ];
        ?>
        
   <div class="artist-box">
    	<a  class="blocks" href="<?php the_permalink(); ?>">
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            <div class="artist-content">
            <h2 class="artist"><?php the_title(); ?></h2>
            </div><!-- artists content -->
        </a>
    </div><!-- artist box -->	
                    
    <?php endwhile; ?>
    <?php endif; ?>            
                    
    <?php remove_filter( 'posts_orderby' , 'posts_orderby_lastname' );       ?>        
                    
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>