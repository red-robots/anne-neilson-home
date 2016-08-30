<?php
/**
 * Template Name: Giving Back
 */

get_header(); ?>

	<div id="primary" class="site-full">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
                
                
 <?php if( have_rows('giving_back') ): ?>
	<?php while ( have_rows('giving_back') ) : ?>
	<?php the_row(); ?>
 
	 <?php 
        // Get field Name
		$company = get_sub_field('company_name');
		$link = get_sub_field('website_link');
        $image = get_sub_field('logo'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     
        // size or custom size that will go
        // into the "thumb" variable.
        $size = 'medium';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        ?>
        
        <div class="giving-box">
        	<a href="<?php  echo $link; ?>" target="_blank">
                <div class="giving-box-over">
                    <span class="giving-title"><?php  echo $company; ?></span>	
                </div><!-- giving box over -->
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            </a>
        </div><!-- giving box -->
        
   <?php endwhile; ?>
<?php endif; ?>
                
                
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>