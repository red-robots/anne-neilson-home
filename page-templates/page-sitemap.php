<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

	<div id="primary" class="full-content">
		<div id="content"  class="site-content">

			<h1 class="page-title"><?php the_title(); ?></h1>
			
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="postthumb"><?php the_post_thumbnail(); ?></div>
			<?php }  ?>
		
 			<div class="entry-content">  
            
            <?php the_content(); ?> 
                 		
				<div class="sitemap">
                <h2>Pages</h2>
				<?php wp_nav_menu( array( 
					'theme_location' => 'sitemap',
				) ); ?>
                </div><!-- sitemap -->
                
                <div class="sitemapshop">
                 <h2>Shop</h2>
                <?php wp_nav_menu( array( 
					'theme_location' => 'sitemapshop', 
				) ); ?>
                </div><!-- sitemapshop -->
                         
                   
      		</div><!-- entry content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>