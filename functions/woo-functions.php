<?php
/*		

	Woocommerce Functions
___________________________________
*/
/*		

	Specific Related Product
___________________________________
*/
// We actually remove them below in a filter, but we're going to do a specific one here.
function ac_add_specific_product( ) {
	global $post;
	$productID = $post->ID;
	
	if( $productID == '12392' ) {  // A-Z Scripture cards 
		// echo 'sadi';
	// specific post ID you want to pull
	$post = get_post(12681); 
	setup_postdata( $post ); ?>
		<div>
		<h2  class="related-product">Related Products</h2>
		<ul class="products">
			<li <?php post_class(); ?>>
				<?php
				/**
				 * woocommerce_before_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item' );

				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );

				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );

				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );

				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</li>
		</ul>
	</div><!-- related product -->

<?php
	wp_reset_postdata();
	}
}
add_filter('woocommerce_after_single_product','ac_add_specific_product', 1); 


// Remove orderby on Archive pages
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Remove Breadcrumbs
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove add to cart button on Archive pages
function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

// Removes tabs from their original loaction 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Inserts tabs under the main right product content 
function return_the_description(){
	return the_content();
}
add_action( 'woocommerce_single_product_summary', 'return_the_description', 6 );

// Disable Related Products
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		if(is_product_category('notecards')){
            return 2;
		}
		else {
            return 4; // 3 products per row
        }
	}
}
// Show another pic instead of featured iamges
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');

function change_image_shown( $args ) {
	if(get_field('alternate_featured_image')!="") {
		// Get field Name
        $image = get_field('alternate_featured_image'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
        $size = 'medium';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
    
        
        echo '<div class="image-wrapper"><img src="' . $thumb . '" /><div class="overlay">Quick View</div><!--.overlay--></div><!--.image-wrapper-->';
		
	} elseif ( has_post_thumbnail() ) {
        echo '<div class="image-wrapper">';
        the_post_thumbnail();
        echo '<div class="overlay">Quick View</div><!--.overlay--></div><!--.image-wrapper-->';
    }
}
add_filter('woocommerce_before_shop_loop_item_title','change_image_shown', 10); 

/*
		Remove shipping options if in certain categories
---------------------------------------------
*/
/*add_filter( 'woocommerce_available_shipping_methods', 'hide_shipping_based_on_tag' ,    10, 1 );

function check_cart_for_share() {

// load the contents of the cart into an array.
 $category_ID = array(
 	'6', // books
	'7', // prints
	'13', // candles
	'8', // note cards
	'9', // origonal art
 );
global $woocommerce;
$cart = $woocommerce->cart->cart_contents;

$found = false;

// loop through the array looking for the categories. Switch to true if the category is found.
  foreach ($woocommerce->cart->cart_contents as $key => $values ) {
        $terms = get_the_terms( $values['product_id'], 'product_cat' );
        foreach ($terms as $term) {
            if( in_array( $term->term_id, $category_ID ) ) {

        $found = true;
        break;
    }
  }
}

return $found;

}

function hide_shipping_based_on_tag( $available_methods ) {

// use the function above to check the cart for the tag.
if ( check_cart_for_share() ) {

    // remove the rate you want
    unset( $available_methods['local_pickup'] ); // Replace "flat_rate" with the shipping option that you want to remove.
}

// return the available methods without the one you unset.
return $available_methods;

}*/
/*-------------------------------------------------------------------------------
	Sortable Columns
-------------------------------------------------------------------------------*/

add_filter( 'manage_edit-book_signings_columns', 'my_edit_booksigning_columns' ) ;

function my_edit_booksigning_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Book Signing Location' ),
		'startdate' => __( 'Book Signing Date' ),
		//'courselocation' => __( 'Book Signing Location' ),
		//'date' => __( 'Date' )
	);

	return $columns;
}



add_action( 'manage_book_signings_posts_custom_column', 'my_manage_booksigning_columns', 10, 2 );

function my_manage_booksigning_columns( $column ) {
	global $post;

	
	if($column == 'startdate')
	{
		// Set some variables to set how to show the dates.
		$startdate = DateTime::createFromFormat('Ymd', get_field('date_of_signing'));
		
		echo $startdate->format('n - d') . " &raquo; " . $startdate->format('M d');
		//echo 'ho';
	}
	elseif($column == 'courselocation')
	{
		$location = get_field('location');
		echo $location;
	}
}


/*-------------------------------------------------------------------------------
	Sortable Columns
-------------------------------------------------------------------------------*/

function my_column_register_sortable( $columns )
{
	$columns['startdate'] = 'startdate';
	return $columns;
}

add_filter("manage_edit-book_signings_sortable_columns", "my_column_register_sortable" );


/* Only run our customization on the 'edit.php' page in the admin. */
add_action( 'load-edit.php', 'my_edit_booksigning_load' );

function my_edit_booksigning_load() {
	add_filter( 'request', 'my_sort_booksigning' );
}

/* Sorts the movies. */
function my_sort_booksigning( $vars ) {

	/* Check if we're viewing the 'movie' post type. */
	if ( isset( $vars['post_type'] ) && 'book_signings' == $vars['post_type'] ) {

		/* Check if 'orderby' is set to 'duration'. */
		if ( isset( $vars['orderby'] ) && 'startdate' == $vars['orderby'] ) {

			/* Merge the query vars with our custom variables. */
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'date_of_signing',
					'orderby' => 'meta_value_num'
				)
			);
		}
	}

	return $vars;
}

function my_popup_view( ){?>
    <div class="popup-view">
        <article class="popup-product">
            <div class="top-bar">
                <div class="close">X</div><!--.close-->
            </div><!--.top-bar-->
            <div id="product-<?php the_ID(); ?>" class="product">
                <div class="images">
                        <?php if(get_field('alternate_featured_image')!="") {
                            // Get field Name
                            $image = get_field('alternate_featured_image'); 
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];
                            $size = 'medium';
                            $thumb = $image['sizes'][ $size ];
                            $width = $image['sizes'][ $size . '-width' ];
                            $height = $image['sizes'][ $size . '-height' ];
                        
                            echo '<img src="' . $thumb . '" />';
                            
                        } elseif ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                        }?>
                    </div><!--.images-->
                <div class="summary entry-summary">
                    <?php
                        /**
                        * woocommerce_single_product_summary hook
                        *
                        * @hooked woocommerce_template_single_title - 5
                        * @hooked woocommerce_template_single_rating - 10
                        * @hooked woocommerce_template_single_price - 10
                        * @hooked woocommerce_template_single_excerpt - 20
                        * @hooked woocommerce_template_single_add_to_cart - 30
                        * @hooked woocommerce_template_single_meta - 40
                        * @hooked woocommerce_template_single_sharing - 50
                        */
                        do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div><!-- .summary -->
            </div><!-- #product-<?php the_ID(); ?> -->
        </article><!--.popup-product-->
    </div><!--.popup-view-->
<?php }
add_action('woocommerce_after_shop_loop_item' , 'my_popup_view');

add_action( 'wp_ajax_add_cart', 'my_ajax_add_cart' );
add_action( 'wp_ajax_nopriv_add_cart', 'my_ajax_add_cart' );
function my_ajax_add_cart() {
    if(isset($_POST['id'])&&isset($_POST['qty'])){
        $id = intval( $_POST['id'] );
        $qty = intval ( $_POST['qty']);
        if(WC()->cart->add_to_cart( $id , $qty)!==false){
            $status = 1;
        } else {
            $status = 0;
        }
    } else {
        $status = 0;
    }
    $response = array(
        'what'=>'cart',
        'action'=>'add_cart',
        'id'=>$status,
    );
    $xmlResponse = new WP_Ajax_Response($response);
    $xmlResponse->send();
    die(0);
}
add_action( 'wp_ajax_get_cart_count', 'my_ajax_get_cart_count' );
add_action( 'wp_ajax_nopriv_get_cart_count', 'my_ajax_get_cart_count' );
function my_ajax_get_cart_count() {
    $response = array(
        'what'=>'cart',
        'action'=>'get_cart_count',
        'id'=>$status,
        'data'=>WC()->cart->get_cart_contents_count(),
    );
    $xmlResponse = new WP_Ajax_Response($response);
    $xmlResponse->send();
    die(0);
}

add_action( 'wp_ajax_get_cart', 'my_ajax_get_cart' );
add_action( 'wp_ajax_nopriv_get_cart', 'my_ajax_get_cart' );
function my_ajax_get_cart() {
    $return = do_action( 'woocommerce_before_cart_contents' );
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
            $return.='<div class="product-box"><div class="product-thumbnail">';
            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
            if ( ! $_product->is_visible() ) {
                $return.=$thumbnail;
            } else {
                $return.=sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
            }
            $return.='</div><!--.product-thumbnail--><div class="product-info"><div class="product-name">';
            if ( ! $_product->is_visible() ) {
                $return.=apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
            } else {
                $return.=apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
            } 
            $return.='</div><!--.product-name--><div class="product-quantity">';
            $return.="Quantity: ".$cart_item['quantity'].'</div><!--.product-quantity--><div class="product-price">';
            $return.="Price: ".apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ).'</div><!--.product-price--></div><!--.product-info--></div><!--.product-box-->';
        }
    }
    $return.=do_action( 'woocommerce_cart_contents' );
    $return.=do_action( 'woocommerce_after_cart_contents' );
    $return.='<div class="subtotal">Subtotal - '.WC()->cart->get_cart_total().'</div><!--.subtotal-->';
    $return.='<div class="checkout button">Checkout<a class="surrounding" href="'.WC()->cart->get_checkout_url().'"></a></div><!--.checkout .button-->';
    $response = array(
        'what'=>'cart',
        'action'=>'get_cart',
        'id'=>'1',
        'data'=>$return
    );
    $xmlResponse = new WP_Ajax_Response($response);
    $xmlResponse->send();
    die(0);
}


add_action( 'wp_ajax_get_checkout_popup', 'my_ajax_get_checkout_popup' );
add_action( 'wp_ajax_nopriv_get_checkout_popup', 'my_ajax_get_checkout_popup' );
function my_ajax_get_checkout_popup() {
    if(isset($_POST['id'])){
        $id = intval( $_POST['id'] );
        $return = '<div class="popup-checkout"><div class="popup-checkout-overlay"><div class="top-bar"><div class="title">Item Added to Shopping Cart</div><div class="close">X</div><!--.close--></div><!--.top-bar-->'; 
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            if(intval($cart_item['product_id'])===$id){
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $return.='<div class="product-box"><div class="product-thumbnail">';
                    $thumbnail = get_the_post_thumbnail($_product->id);//apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    if ( ! $_product->is_visible() ) {
                        $return.=$thumbnail;
                    } else {
                        $return.=sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
                    }
                    $return.='</div><!--.product-thumbnail--><div class="product-info"><div class="product-name">';
                    if ( ! $_product->is_visible() ) {
                        $return.=apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                    } else {
                        $return.=apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
                    } 
                    $return.='</div><!--.product-name--><div class="product-quantity">';
                    $return.="Quantity: ".$cart_item['quantity'].'</div><!--.product-quantity--><div class="product-price">';
                    $return.="Price: ".apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ).'</div><!--.product-price-->';
                    $return.='<div class="buttons"><div class="continue button">Continue Shopping</div><!--.continue.button-->';
                    $return.='<div class="checkout button">Checkout<a class="surrounding" href="'.WC()->cart->get_checkout_url().'"></a></div><!--.checkout .button--></div><!--.buttons-->';
                    $return.='</div><!--.product-info--></div><!--.product-box-->';
                }
                break;
            }
        }
        $return.=do_action( 'woocommerce_cart_contents' );
        $return.=do_action( 'woocommerce_after_cart_contents' );
        $return.='<div class="bottom-bar">';
        $return.='<div class="quantity">'.WC()->cart->get_cart_contents_count().' Item';
        if(WC()->cart->get_cart_contents_count()>1){
            $return.='s';
        }
        $return.=' in Shopping Cart</div>';
        $return.='<div class="subtotal">Subtotal: '.WC()->cart->get_cart_total().'</div><!--.subtotal-->';
        $return .= '</div><!--.bottom-bar--></div><!--.popup-checkout-overlay--></div><!--.popup-checkout-->';
    } else {
        $return = "<p>Couldn't find cart item</p>";
    }
    $response = array(
        'what'=>'cart',
        'action'=>'add_cart',
        'id'=>1,
        'data'=>$return,
    );
    $xmlResponse = new WP_Ajax_Response($response);
    $xmlResponse->send();
    die(0);
}
