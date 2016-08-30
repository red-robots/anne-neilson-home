<?php
/**
 * The template for displaying all pages
 *
 * 
 */

get_header(); ?>

<div id="primary" class="full-content">
	 <div id="content"  class="">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
                
           <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>