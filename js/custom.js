/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

  $('.blocks').matchHeight();
  
    $('#socialheader ul li.cart').on('click',function() {
        $('.popup-cart').toggle();
    });
    $('.archive .product img').not('.popup-view img').on('click',function(e) {
        e.preventDefault();
        $(this).parents('.product').eq(0).find('.popup-view').toggle();
    });
    $('.archive .product .popup-view').on('click',function(){
        $(this).toggle();
    });
    $('.archive .product .popup-view .popup-product .close').on('click',function(){
        $(this).parents('.product').eq(0).find('.popup-view').toggle();
    });
    $('.archive .product .popup-view .popup-product').on('click',function(e){
        e.stopPropagation();
    });

if($("#homepage-flag").length > 0) {	
 if (document.cookie.indexOf('visited=true') == -1) {
        var fifteenDays = 1000*60*60*24*15;
        var expires = new Date((new Date()).valueOf() + fifteenDays);
        document.cookie = "visited=true;expires=" + expires.toUTCString();

        var cboxOptions = {
          width: '95%',
          // height: '95%',
          maxWidth: '960px',
          // maxHeight: '960px',
          inline:true, 
          href:"#mc_embed_signup",
          opacity:.8,
        }


        $.colorbox(cboxOptions);

        $(window).resize(function(){
          $.colorbox.resize({
            width: window.innerWidth > parseInt(cboxOptions.maxWidth) ? cboxOptions.maxWidth : cboxOptions.width,
            height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
          });
      });

        
    }
}






function size_angel(){
  var right_content_height = $('.right-content').height();
  // console.log(right_content_height);
  var porportion = ($('.angel img').width())/($('.angel img').height());
  var angel_height = porportion*right_content_height;
  $('.angel').width(angel_height);
}
// size_angel();
//size_angel();//call size angel
// 		Search Toggle 
//__________________________________________

$( '.search-icon' ).click(function() {
  $( 'input.search-field' ).toggle( 100, function() {
    // Animation complete.
	//$('input.search-field').animate({"width":"0px"}, 100);
  });
});


// 		front page slider 
// ________________________________________

	$('.flexslider').flexslider({
       animation: "slide",
    });
	
	/*$('.productslider').flexslider({
       animation: "slide",
	   controlNav: "thumbnails"
    });*/
    
// 		Single Product Page
// ________________________________________
	$('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 50,
    itemMargin: 5,
    asNavFor: '.productslider'
  });
 
  $('.productslider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
  
    // 		Newsletter Signup
// ________________________________________
  
  $(".newsletter").colorbox({
	  	inline:true, width:"60%"
	  });
	  
	  $(".devotional-pop").colorbox({
	  	inline:true, width:"100%"
	  });
  





});// END #####################################    END

// jQuery(window).on('load', function($) {
//       // 		Equal Heights Divs
// // ________________________________________
// // $('.blocks').matchHeight();

// });
