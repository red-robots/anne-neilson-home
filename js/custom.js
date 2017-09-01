/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

  $('.blocks').matchHeight();
  
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
    smoothHeight: true,
    sync: "#carousel"
  });
  
    //image hover for icons on category/archive pages
    (function(){
        $('.image-wrapper').hover(function(){
            $(this).find('.overlay').css("display","block");
        },function(){
            $(this).find('.overlay').css("display","none");
        });
    })();
    //hover for cart icon
    (function(){
        $('#socialheader ul li.cart').hover(function() {
            if($('.head-right .popup-cart').attr("data-timeout")!==undefined){
                clearTimeout(Number($('.head-right .popup-cart').attr("data-timeout")));
            }
            $('.head-right .popup-cart').css("display","block");
        }, function(){
            var timeout = setTimeout(function(){
                $('.head-right .popup-cart').css("display","none");
            },300);
            $('.head-right .popup-cart').attr("data-timeout",timeout);
        });
        $('.head-right .popup-cart').hover(function() {
            if($('.head-right .popup-cart').attr("data-timeout")!==undefined){
                clearTimeout(Number($('.head-right .popup-cart').attr("data-timeout")));
            }
            $('.head-right .popup-cart').css("display","block");
        }, function(){
            var timeout = setTimeout(function(){
                $('.head-right .popup-cart').css("display","none");
            },300);
            $('.head-right .popup-cart').attr("data-timeout",timeout);
        });
        
        $('.quickview').colorbox({
            rel:'gal',
            inline: true,
            width: '90%',
            maxWidth: '960px',
        });
    })();
    //function to add items to cart
    (function(){
        $('form.cart').find('button[type=submit]').on('click',function(e){
            e.preventDefault();
            var $form = $(this).parents('form.cart').eq(0);
            var id = $form.find('input[name="add-to-cart"]').attr('value');
            var qty = $form.find('input[name="quantity"]').attr('value');
            //add to cart
            jQuery.post(
                myajaxurl.url, 
                {
                    'action': 'add_cart',
                    'id': id,
                    'qty':qty,
                }, 
                function(response){
                    if(Number($(response).find("cart").attr("id"))===1){
                        //update cart popup
                        jQuery.post(
                            myajaxurl.url, 
                            {
                                'action': 'get_cart',
                                'data':'',
                            }, 
                            function(response){
                                if($(response).find("response_data").length>0){
                                    $text = $(response).find("response_data").eq(0).text();
                                    $('.popup-cart').html($text);
                            
                                }
                            }
                        );
                        //update cart popup
                        jQuery.post(
                            myajaxurl.url, 
                            {
                                'action': 'get_cart_count',
                                'data':'',
                            }, 
                            function(response){
                                if($(response).find("response_data").length>0){
                                    $text = $(response).find("response_data").eq(0).text();
                                    $('#socialheader ul li.cart a').html($text);
                            
                                }
                            }
                        );
                        //invoke checkout popup
                        jQuery.post(
                            myajaxurl.url, 
                            {
                                'action': 'get_checkout_popup',
                                'id':id,
                            }, 
                            function(response){
                                if($(response).find("response_data").length>0){
                                    $text = $(response).find("response_data").eq(0).text();
                                    $.colorbox({
                                        width: '90%',
                                        maxWidth: '600px',
                                        height: '120%',
                                        html:$text,
                                    });
                                    $('.popup-checkout .continue.button').on('click',function(e){
                                        e.preventDefault();
                                        $.colorbox.close();
                                    });
                                }
                            }
                        );
                    }
                }
            );
        });
    })();

    (function(){
        $('.product-tabs .top-bar .title').eq(0).addClass("active");
        $('.product-tabs .top-bar .title').on('click',function(){
            var $this = $(this);
            var type = $this.attr("data-type");
            $('.product-tabs .top-bar .title').filter(".active").removeClass("active");
            $this.addClass("active");
            $('.product-tabs .viewport .copy').each(function(){
                var $this = $(this);
                if($this.attr('data-type')===type){
                    $this.css("display","block");
                } else {
                    $this.css("display","none");
                }
            });
        });
    })();
    
    //remove Tooltips
    (function(){
        var saved_title;
        $('img').hover(function(){
            var $this = $(this);
            saved_title=$this.attr("title")===undefined?"":$this.attr("title");
            $this.attr("title","");
        },function(){
            var $this = $(this);
            $this.attr("title",saved_title);
        });
    })();

if($("#homepage-flag").length > 0) {	
 if (document.cookie.indexOf('visited=true') == -1) {
        var fifteenDays = 1000*60*60*24*15;
        var expires = new Date((new Date()).valueOf() + fifteenDays);
        document.cookie = "visited=true;expires=" + expires.toUTCString();

        
          var width = window.innerWidth*0.5 > 960 ? "960px" : "50%";
          width = window.innerWidth < 600 ? "95%": width;
        var cboxOptions = {
          width: width,
          // height: '95%',
          //maxWidth: '960px',
          // maxHeight: '960px',
          inline:true, 
          href:"#mc_embed_signup",
          opacity:.8,
        }


        $.colorbox(cboxOptions);

        $(window).resize(function(){
          var width = window.innerWidth*0.5 > 960 ? "960px" : "50%";
          width = window.innerWidth < 600 ? "95%": width;
          $.colorbox.resize({
            width: width,
 //           height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
          });
      });

        
    }
}

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
