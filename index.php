<?php 
/* if ( !is_user_logged_in() ) {
	 get_template_part('maintenance/splashpage');
 } else {*/

get_header("home"); ?>

<!-- Used to only show popout newsletter on homepage -->
<span id="homepage-flag" style="display: none" ></span>

	<div id="primary-home" class="full-content">
		
        
        <?php get_template_part( 'inc/slider' ); ?>
        
        <div id="content"  class="">
            <?php $post = get_post(12870);
            setup_postdata($post);?>
            <div class="row-1">
                <div class="tile-1">
                    <?php if(get_field("image_2")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_2"),"full")[0];?>" alt="<?php echo get_post(get_field("image_2"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_2_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_2_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_2_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_2');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_2');
                        $link = get_field('link_2');
                        $externallink = get_field('external_link_2');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
                </div><!--.tile-1-->
                <div class="tile-2">
                    <?php if(get_field("image_3")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_3"),"full")[0];?>" alt="<?php echo get_post(get_field("image_3"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_3_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_3_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_3_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_3');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_3');
                        $link = get_field('link_3');
                        $externallink = get_field('external_link_3');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
            
                </div><!--.tile-2-->
                <div class="tile-3">
                    <?php if(get_field("image_4")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_4"),"full")[0];?>" alt="<?php echo get_post(get_field("image_4"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_4_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_4_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_4_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_4');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_4');
                        $link = get_field('link_4');
                        $externallink = get_field('external_link_4');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
            
                </div><!--.tile-3-->
            </div><!--.row-1-->
            <div class="row-2">
                <div class="tile-1">
                    <?php if(get_field("image_5")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_5"),"full")[0];?>" alt="<?php echo get_post(get_field("image_5"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_5_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_5_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_5_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_5');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_5');
                        $link = get_field('link_5');
                        $externallink = get_field('external_link_5');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
            
                </div><!--.tile-1-->
                <div class="tile-2">
                    <?php if(get_field("image_6")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_6"),"full")[0];?>" alt="<?php echo get_post(get_field("image_6"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_6_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_6_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_6_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_6');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_6');
                        $link = get_field('link_6');
                        $externallink = get_field('external_link_6');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
            
                </div><!--.tile-2-->
                <div class="tile-3">
                    <?php if(get_field("image_7")){ ?>
                        <img class="background" src="<?php echo wp_get_attachment_image_src(get_field("image_7"),"full")[0];?>" alt="<?php echo get_post(get_field("image_7"))->post_title;?>">
                    <?php } ?>
                    <?php if(get_field("image_7_hover")){ ?>
                        <img class="hover" src="<?php echo wp_get_attachment_image_src(get_field("image_7_hover"),"full")[0];?>" alt="<?php echo get_post(get_field("image_7_hover"))->post_title;?>">
                    <?php } ?>
                    <?php $havealink = get_field('slide_link_7');
                    if($havealink=="yes"){
                        $internalorex = get_field('internal_or_external_link_7');
                        $link = get_field('link_7');
                        $externallink = get_field('external_link_7');	
                        if($internalorex == 'internal') {
                            $finallink = $link;
                        } else {
                            $finallink = $externallink;	
                        }?>
                        <a class="surrounding" href="<?php echo $finallink?>" <?php if($internalorex=="internal") echo 'target="_blank"';?>></a>
                    <?php } ?>
            
                </div><!--.tile-3-->
            </div><!--.row-2-->
		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); 

 //} // end if logged in ?>
