<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content-staff">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class("template-staff"); ?>>
                	<header>
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
                    <div class="entry-content">
                        <?php $picture = get_field("picture");
                        if($picture):?>
                            <img class="alignleft" src="<?php echo $picture['sizes']['medium'];?>" alt="<?php echo $picture['title'];?>">
                        <?php endif;?>
                        <?php if(get_field("bio")) echo wpautop(get_field("bio")); ?>
                    </div><!-- .entry-content -->
                        
                </article>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
