<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="p:domain_verify" content="7e74a1ce62ed3f8a1ba877c82ee861f1"/>
<meta name="google-site-verification" content="J9qH2tqfHzOukq6HiEHVVEg5-Rfgcw0Uzu0W4T7sb9o" />
	<script>(function() {
    var _fbq = window._fbq || (window._fbq = []);
    if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
    }
    _fbq.push(['addPixelId', '1020250604664889']);
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1020250604664889&amp;ev=PixelInitialized" /></noscript>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '375005459363918',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<div id="homepage" >


<!--

		Signup Form Devotional

-->
<div style="display:none" class="devotional-pop">

<div id="dev_embed_signup">
<form action="//anneneilsonfineart.us3.list-manage.com/subscribe/post?u=33908336d7b67e6ca5c33dfc7&amp;id=ef245c348a" method="post" id="mc-embedded-subscribe-form-devotional" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
    <div class="newscenter">
		<p>ENTER THE INFORMATION BELOW TO CONTINUE TO THE DOWNLOAD</p>
    </div>
<div class="mc-field-group">
	<div class="thelabel label-name"><label for="mce-LNAME">NAME <span class="asterisk">*</span></label></div>
	<input type="text" value="" name="LNAME" class="" id="mce-NAME">
</div>
<div class="mc-field-group">
	<div class="thelabel label-name"><label for="mce-EMAIL">EMAIL  <span class="asterisk">*</span>
</label></div>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_33908336d7b67e6ca5c33dfc7_ef245c348a" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe-devotional" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
</div>
<!--End mc_embed_signup-->


	<header id="masthead" class="site-header" role="banner">
    
    <!-- <div class="devotional"><a class="buttn devotional-pop" href="#dev_embed_signup">signup</a></div>  -->
    
		<?php if(is_home()) { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } else { ?>
            <div class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
        <?php } ?>
        
        
        <div class="head-right">
            <div id="socialheader">
                <ul>
                    <li class="cart"><a href="<?php bloginfo('url'); ?>/cart">Cart</a></li>
                </ul>
            </div><!-- social header -->
            <div id="sb-search" class="sb-search">
                    <?php get_search_form(); ?>
            </div><!-- search -->
        </div><!-- head right -->
        
        
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Navigation', 'twentytwelve' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
        
    </header><!-- #masthead -->

	<div id="main" class="wrapper">
