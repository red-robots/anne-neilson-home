<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

	<?php endif; ?>

	<?php //echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php //echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
    
    
    <?php 
	
	// Post Url
	$permalink = get_permalink();
	// Short Link for Twitter
	$shortlink = wp_get_shortlink();
	// Post title
	$title = get_the_title();
	// Description
	$excerpt = get_the_excerpt();
	// Featured Image
	$thumb_id = get_post_thumbnail_id();
	// Large Image
	$image_large_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
	$image_large_url = $image_large_url_array[0];
	// Thumb Image
	//$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
	//$thumb_url = $thumb_url_array[0];
	
	/* 
		Facebook
	______________________ */
	// Url of app created on Facebook
	$Furl = 'https://www.facebook.com/dialog/feed?app_id=375005459363918';
	// Picture
	$picture = '&picture=' . $image_large_url;
	// title
	$name = '&name=' . $title;
	// Description
	$desc = '&description=' . $excerpt;
	// Redirect uri
	$redirect = '&redirect_uri=' . $permalink;
	// All together now...
	$facebook = $Furl . $picture . $name . $desc . $redirect;
	/* 
		Twitter
	______________________ */
	// Tweet Url
	$Turl = 'https://twitter.com/intent/tweet?';
	// Text
	$text = 'text=' . get_the_title();
	$postLink = '&url=' . $shortlink;
	$referer = '&original_referer=' . $permalink;
	// All together now...
	$twitter = $Turl . $text . $postLink . $referer;
	/* 
		Pintrest
	______________________ */
	$Purl = 'http://pinterest.com/pin/create/button/?url=' . $permalink;
	// Picture
	$Ptitle = '&description=' . $title;
	$media = '&media=' . $image_large_url;
	// All together now...
	$pintrest = $Purl . $media . $Ptitle . ' - Anne Neilson Home';
	
	/*
        Email 
    _______________________*/
    $Eurl = "mailto:?";
    $subject = "subject=".$title.' - Anne Neilson Home';
    $body = '&body='.$permalink;
	$email = $Eurl.$subject.$body;
	?>
<div id="share">
    <ul>
        <li class="facebook"><a href="<?php echo $facebook; ?>">Share on Facebook</a></li>
        <li class="twitter"><a href="<?php echo $twitter; ?>" target="_blank" data-related="AERIN">Tweet on Twitter</a></li>
        <li class="pintrest"><a href="<?php echo $pintrest; ?>" target="_blank">Pin on Pintrest</a></li>
        <li class="email"><a href="<?php echo $email; ?>" target="_blank">Email</a></li>
    </ul>
</div><!-- share -->
