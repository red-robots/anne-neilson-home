<?php

/* Sets up theme
 *
 * Menus
 * Stylesheets
 * Threaded Comments
 * Custom Title
 * Widgets
*/
require( get_template_directory() . '/functions/theme-setup.php' );

/* Enqueue Scripts
*  
* jQuery
* Custom
* Flexslider
* Google Maps
*/
require( get_template_directory() . '/functions/scripts.php' );

/* Post types and Taxonomies
*
* Slides
* Book Signings
*

*/
require( get_template_directory() . '/functions/posttypes.php' );
/* Pagination */
require( get_template_directory() . '/functions/pagination.php' );
/* Woocommerce Specific Functions */
require( get_template_directory() . '/functions/theme-functions.php' );
/* Social Media */
require( get_template_directory() . '/functions/social.php' );
/* Woocommerce Specific Functions */
require( get_template_directory() . '/functions/woo-functions.php' );