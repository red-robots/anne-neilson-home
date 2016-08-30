<?php
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slides'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slides'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No Slides found'),
    'not_found_in_trash' => __('No Slides found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('slides',$args); // name used in query
  
 
 
  // Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Appearances', 'post type general name'),
    'singular_name' => _x('Appearance', 'post type singular name'),
    'add_new' => _x('Add New', 'Appearance'),
    'add_new_item' => __('Add New Appearance'),
    'edit_item' => __('Edit Appearance'),
    'new_item' => __('New Appearance'),
    'view_item' => __('View Appearance'),
    'search_items' => __('Search Appearances'),
    'not_found' =>  __('No Appearances found'),
    'not_found_in_trash' => __('No Appearances found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Appearances'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('appearances',$args); // name used in query
  
  
    // Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Staff', 'post type general name'),
    'singular_name' => _x('Staff', 'post type singular name'),
    'add_new' => _x('Add New', 'Staff'),
    'add_new_item' => __('Add New Staff'),
    'edit_item' => __('Edit Staff'),
    'new_item' => __('New Staff'),
    'view_item' => __('View Staff'),
    'search_items' => __('Search Staff'),
    'not_found' =>  __('No Staff found'),
    'not_found_in_trash' => __('No Staff found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Staff'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('staff',$args); // name used in query
 
  
  } // close custom post type
  
     // Register the Press
  
     $labels = array(
	'name' => _x('Press', 'post type general name'),
    'singular_name' => _x('Press', 'post type singular name'),
    'add_new' => _x('Add New', 'Press'),
    'add_new_item' => __('Add New Press'),
    'edit_item' => __('Edit Press'),
    'new_item' => __('New Press'),
    'view_item' => __('View Press'),
    'search_items' => __('Search Press'),
    'not_found' =>  __('No Press found'),
    'not_found_in_trash' => __('No Press found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Press'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 6,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('press',$args); // name used in query
  
  /*
##############################################
	Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {

// Event Type for Events
/*    register_taxonomy( 'event_tag', 'events',
	 array( 
	'hierarchical' => false, // true = acts like categories false = acts like tags
	'label' => 'Event Type', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'event-type' ),
	'_builtin' => true
	) );*/
	
	// Press Type for Press
    register_taxonomy( 'press_type', 'press',
	 array( 
	'hierarchical' => false, // true = acts like categories false = acts like tags
	'label' => 'Event Type', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'press-type' ),
	'_builtin' => true
	) );
	
} // End build taxonomies