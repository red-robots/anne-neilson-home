<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<div id="primary">
	<div id="content"  class="site-content">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
                
           <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('contact'); ?>
<?php get_footer(); ?>