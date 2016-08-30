<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<div id="primary" class="content">
		<div id="content"  class="site-content">

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 10,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    
    <div class="blog-container">
    
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>	
 
 
<?php get_template_part('inc/blogpost-blog'); ?>
    
    
<?php endwhile;  ?>
</div><!-- blog container -->
<div class="clear"></div>
 
<?php 
// references pagination function in your functions.php file
	pagi_posts_nav(); ?>	
 
<?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>