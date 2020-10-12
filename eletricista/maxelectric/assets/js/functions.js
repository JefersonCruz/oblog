/*-------------------------------------
	Theme Name: Maxelectric
---------------------------------------*/
/*	
	## Functions
		- Responsive Caret
		- Expand Panel Resize
		- Sticky Menu
		- Portfolio Video With Texonomy
		- Portfolio Video With Single
		
	## Document Ready
		- Scrolling Navigation
		- Set Sticky Menu
		- Responsive Caret
		- Expand Panel
		- Collapse Panel
		- Switch Buttons
		- Calling Function
		- Select Box
		- Product Hover Overlay
		- Search
		- Image Popup
		- Portfolio Video Popup With Texonomy
	
	- Event: Window Scroll
		- Set Sticky Menu
	
	- Event: Window Resize
		- Portfolio Video With Texonomy
		- Portfolio Video With Single
	
	- Event: Window Load
		- Site Loader
		- Portfolio Video With Single
		- Portfolio Video With Single
		
*/


(function($) {

	"use strict"
	
	/* - Responsive Caret */
	function menu_dropdown_open(){
		var width = $(window).width();
		if($(".ownavigation .nav li.ddl-active").length ) {
			if( width > 991 ) {
				$(".ownavigation .nav > li").removeClass("ddl-active");
				$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
			}
		} else {
			$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
		
	/* - Expand Panel Resize */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header-section #slidepanel").length ) {
				$(".header-section #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* - Sticky Menu */
	function sticky_menu() {
		var menu_scroll = $('header[class*="header_s"]').offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".ownavigation").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".ownavigation").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
	
	/* - Portfolio Video With Texonomy */
	function portfolio_video_textonomy() {
		var width = $(window).width();
		var cnt_height = $("body.tax-maxelectric_portfolio_tax .col-md-4.gallery-section img").height();
		$("body.tax-maxelectric_portfolio_tax .col-md-4.gallery-section iframe").css("height", cnt_height);	
	}
	
	/* - Portfolio Video With Single */
	function portfolio_video_single() {
		var width = $(window).width();
		var cnt_height = $("body.single-maxele_portfolio .col-md-3 img").height();
		$("body.single-maxele_portfolio .col-md-3 iframe").css("height", cnt_height);	
	}
	
	/* ## Document Ready */
	$(document).on("ready",function() {

		/* - Scrolling Navigation */
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Set Sticky Menu */
		if( $(".ownavigation").length ) {
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});

		/* - Responsive Caret */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Expand Panel */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* - Collapse Panel */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* - Switch Buttons */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});	
		
		/* - Calling Function */	
		menu_dropdown_open();		
		panel_resize();
		
		/* - Portfolio Video With Texonomy */
		portfolio_video_textonomy();
		
		/* - Portfolio Video With Single */
		portfolio_video_single();
		
		/* - Select Box */
		$( "select" ).wrap( "<div class='select_box'></div>" );
		
		/* - Product Hover Overlay  */
		$( ".woocommerce ul.products .woocommerce-LoopProduct-link > img" ).wrap( "<div class='product_hover'></div>" );
		
		/* - Search */
		if($(".search-box > span").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box > span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		/* - Image Popup */
		if( $(".content-image-block").length ){
			$(".content-block-hover").magnificPopup({
				delegate: "a.zoom-in",
				type: "image",
				tLoading: "Loading image #%curr%...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: false,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});
		}
		
		/* - Portfolio Video Popup With Texonomy  */
		if($("body.tax-maxelectric_portfolio_tax").length ){
			$("body.tax-maxelectric_portfolio_tax .content-image-block a.popup-video").magnificPopup({
				disableOn: 700,
				type: "iframe",
				mainClass: "mfp-fade",
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});
		}
	});	/* - Document Ready /- */
	
	/* - Event: Window Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu */
		if( $(".ownavigation").length ) {
			sticky_menu();
		}
	});
	
	/* - Event: Window Resize */
	$( window ).on("resize",function() {
		
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		panel_resize();
		menu_dropdown_open();
		
		/* - Portfolio Video With Texonomy */
		portfolio_video_textonomy();
		
		/* - Portfolio Video With Single */
		portfolio_video_single();

	});
	
	/* - Event: Window Load */
	$(window).on("load",function() {
		
		/* - Site Loader */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		/* - Portfolio Video With Texonomy */
		portfolio_video_textonomy();
		
		/* - Portfolio Video With Single */
		portfolio_video_single();
	});

})(jQuery);