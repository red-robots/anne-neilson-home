<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	
		<div id="secondary" class="widget-area" role="complementary">
			<!--<div class="widget">
            <h3 class="widget-title">Subscribe to our Blog</h3>
				<?php //echo do_shortcode('[subscribe2 hide="unsubscribe"]'); ?>
            </div> widget -->

            <div class="widget">
            	<a href="<?php bloginfo('url'); ?>/subscribe">
            		<img src="<?php bloginfo('template_url'); ?>/images/subscribe-blog.jpg">
            	</a>
            </div>

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php endif; ?>
		</div><!-- #secondary -->
	