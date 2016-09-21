<div id="home-slider">


<div class="flexslider">
   <?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'slides',
    'posts_per_page' => -1,
    'order'=>'ASC',
    'orderby'=>'menu_order',
    'paged' => $paged,
));
    if ($wp_query->have_posts()) : ?>
    
     <ul class="slides">
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
    	<?php 
		// Get field Name
		$image = get_field('slide_new'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'slider';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
		
		
		$slidetitle = get_field('slide_title');
		$slidetext = get_field('slide_text');
		$havealink = get_field('slide_link');
		if($havealink=="Yes"){
            $internalorex = get_field('internal_or_external_link');
            $link = get_field('link');
            $externallink = get_field('external_link');	
            if($internalorex == 'Internal') {
                $finallink = $link;
            } else {
                $finallink = $externallink;	
            } 
        }?>
    	
        
        
  
    	   <li> 
            <div class="slide-wrapper">
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                <?php if($slidetitle != '') { ?>
                    <div class="slide-box">
                        <?php if($slidetitle != '') { ?><div class="slide-title"><?php echo $slidetitle; ?></div><?php } ?>
                        <?php if($slidetext != '') { ?><div class="slide-text"><?php echo $slidetext; ?></div><?php } ?>
                    </div><!-- slide box --> 
                <?php } ?>
                <?php if($havealink=="Yes"){ ?>
                    <a class="surrounding" href="<?php echo $finallink; ?>"></a>
                <?php } ?>
            </div><!--.slide-wrapper-->
          </li>
       
     
  <?php endwhile; ?>
  </ul><!-- slides -->
  <?php endif; ?>
  
</div><!-- .flexslider -->
<?php wp_reset_postdata(); ?>
</div><!-- home slider -->
