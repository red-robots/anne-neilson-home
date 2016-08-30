<?php
add_image_size('slider', 1400, 731, array('center','center')); 

// Filter to return certain sizes for the Single Product Pages
add_filter( 'single_product_large_thumbnail_size', 'my_single_product_large_size', 25, 1 );
function my_single_product_large_size( $size ) {
    $size = 'large';
    return $size;
}
add_filter( 'single_product_small_thumbnail_size', 'my_single_product_small_thumbnail_size', 25, 1 );
function my_single_product_small_thumbnail_size( $size ) {
    $size = 'thumbnail';
    return $size;
}
/*---------------------------------------------------
	Add Classes to first and last navigation items.
-----------------------------------------------------*/
function ac_first_and_last_menu_class($items) {
	foreach($items as $k => $v){
		$parent[$v->menu_item_parent][] = $v;
	}
	foreach($parent as $k => $v){
		$v[0]->classes[] = 'first';
		$v[count($v)-1]->classes[] = 'last';
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');
/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 292px 51px;
  	width: 292px;
  	height: 51px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

