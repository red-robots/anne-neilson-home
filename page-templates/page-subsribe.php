<?php
/**
 * Template Name: Subscribe
 *
 * 
 */

get_header(); ?>

<div id="primary" class="subscribe-content">
	 <div id="content"  class="">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
                
               <div class="entry-content">
                    <img src="<?php the_field('image'); ?>">
                </div><!-- .entry-content -->
                
           <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<div class="subscribe-side">
		<div class="entry-content">
            <?php the_content(); ?>








<!-- Begin MailChimp Signup Form -->
<!--<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">-->


<form action="//anneneilsonfineart.us3.list-manage.com/subscribe/post?u=33908336d7b67e6ca5c33dfc7&amp;id=37f8f6f238" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	
	<div class="subscribe-page">
	    <ul>
	        <li><input type="checkbox" value="1" name="group[6385][1]" id="mce-group[6385]-6385-0"><label for="mce-group[6385]-6385-0">Blog</label></li>
	        <li><input type="checkbox" value="2" name="group[6385][2]" id="mce-group[6385]-6385-1"><label for="mce-group[6385]-6385-1">Products + Promotions</label></li>
	    </ul>
	</div><!-- mc-field-group -->


	<input type="email" value="ENTER YOUR EMAIL ADDRESS" name="EMAIL" class="required email" id="mce-EMAIL">

	<div class="thelabel label-name">
		<label for="mce-EMAIL">EMAIL  <span class="asterisk">*</span></label>
	</div>

	

	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_33908336d7b67e6ca5c33dfc7_37f8f6f238" tabindex="-1" value=""></div>
 
    <div class="clear">
    	<input type="submit" value="Submit" name="subscribe" id="" class="subscribe-submit"></div>
    </div>
</form>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[2]='MMERGE2';ftypes[2]='radio';fnames[3]='MMERGE3';ftypes[3]='birthday';fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);
</script>

 









        </div><!-- .entry-content -->
	</div>

<?php get_footer(); ?>