<?php
/**
 * Template Name: Bio
 *
 * 
 */

get_header(); ?>

<div id="primary" class="full-content">
	 <div id="content"  class="">

			<?php while ( have_posts() ) : the_post(); 

			// Get field Name
		$image = get_field('photo'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

		$video = get_field('video'); 
		$embed_code = wp_oembed_get($video);
		$content = get_field('page_content'); 



			?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="bio-left">
               	<div class="entry-content">
                    <?php echo $content?>
                </div><!-- .entry-content -->
               </div><!-- bio left -->

               <div class="bio-right">

               	<div class="bio-photo">
               		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
               	</div>
               	
               	<?php if($video != '') { ?>
               	<div class="bio-video">
               		<?php echo $embed_code; ?>
               	</div>
               	<?php } ?>
               	
               </div>

               
                
           <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>