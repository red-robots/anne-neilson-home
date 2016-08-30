<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="primary" class="full-content">
	<div id="content"  class="site-content">

			<article id="post-0" class="post error404 no-results not-found">
				
				

				<div class="entry-content">
                
                <div class="sitemap">
                <h1 class="page-title"><?php _e( '404 page not found.', 'twentytwelve' ); ?></h1>
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'twentytwelve' ); ?></p>
					<?php //get_search_form(); ?>
                </div>
                    
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
                    
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>