<?php
 // Enqueueing all the java script in a no conflict mode
 function ineedmyjava() {
	if (!is_admin()) {
 
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3', true);
		wp_enqueue_script('jquery');
		
		// Custom Theme scripts...
		wp_register_script(
			'custom',
			get_bloginfo('template_directory') . '/js/custom.js',
			array('jquery') );
		wp_localize_script( 'custom', 'myajaxurl', array(
            'url' => admin_url( 'admin-ajax.php' )
        ));
		wp_enqueue_script('custom');

		// Equal Heights Divs
		wp_register_script(
			'blocks',
			get_bloginfo('template_directory') . '/js/blocks.js',
			array('jquery'), 1.0 );
		wp_enqueue_script('blocks');
		
		
		// Homepage slider 'flexslider' scripts...
		wp_register_script(
			'flexslider',
			get_bloginfo('template_directory') . '/js/flexslider.js',
			array('jquery') );
		wp_enqueue_script('flexslider');
		
		// Add more
		wp_register_script(
			'googlemap',
			get_bloginfo('template_directory') . '/js/googlemaps.js',
			array('jquery') );
		wp_enqueue_script('googlemap');
		
		// Colorbox
		wp_register_script(
			'colorbox',
			get_bloginfo('template_directory') . '/js/colorbox.js',
			array('jquery') );
		wp_enqueue_script('colorbox');
		
		
		
		// between here
		
	}
}
 
add_action('wp_enqueue_scripts', 'ineedmyjava');
