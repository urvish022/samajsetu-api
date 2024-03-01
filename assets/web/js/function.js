/* ----------------------------------------------------------------------------------------
* Author        : Awaiken
* Template Name : App Launch - App Landing Page HTML5 Template
* File          : Custom JS
* Version       : 1.0
* ---------------------------------------------------------------------------------------- */
(function ($) {
    "use strict";
	
	var $window = $(window); 
	
	/* Preloader Effect */
	$window.load(function() {
	    $(".preloader").fadeOut(600);
    });
	
	/* Parallax Effect */
	var $parallax=$('.parallax');
	if ($parallax.length){
		$parallax.parallax("50%", 0.5);
	}
	
	/* slick nav */
	$('#main-menu').slicknav({prependTo:'#responsive-menu',label:'', closeOnClick:true});
		
	/* Submenu */
	$('.nav li').hover(
		function(){
			$(this).children('ul').stop().slideDown(200);
		},
		function(){
			$(this).children('ul').stop().slideUp(200);
		}
	);
	
	/* Top Menu */
	$(document).on('click','#navigation ul li a, #responsive-menu ul li a',function(){
		var id = $(this).attr('href');
		var h = parseFloat($(id).offset().top);
		$('body,html').stop().animate({
			scrollTop: h - 65
		}, 800);
		return false;
	});
	
	/* Typed subtitle */
	var $typedtitle=$('.typed-title');
	if ($typedtitle.length){
		$typedtitle.typed({
			stringsElement: $('.typing-title'),
			backDelay: 2000,
			typeSpeed: 0,
			loop: true
		});
	}
		
	/* Init Counter */
    $('.counter').counterUp({ delay: 4, time: 1000 });
	
	/*OwlCarousels testimonial Start*/
	$('#testimonial-carousel').owlCarousel({
		loop: true,
		items: 1,
		margin: 10,
		responsiveClass: true,
		nav: true,
		navText: [ '<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	});
	
	/*OwlCarousels Latest post Start*/
	$('#latest-post-carousel').owlCarousel({
		loop: true,
		items: 1,
		margin: 10,
		responsiveClass: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplaySpeed: 1000,
	});
		
	/*OwlCarousels Header Start*/
	$('#header-slider-carousel').owlCarousel({
		loop: true,
		items: 1,
		margin: 10,
		responsiveClass: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplaySpeed: 1000,
	});
	
	/*OwlCarousels Screenshot Start*/
	$('#screenshot-slider-carousel').owlCarousel({
		loop: false,
		margin: 10,
		responsiveClass: true,
		responsive : {
			0 : {
				items: 1,
				nav: true,
				dots: false,
			},
			 
			768 : {
				items: 3,
				nav: true,
				dots: false,
			},
			
			960 : {
				items: 3
			},
			
			1024 : {
				items: 4
			}
		  },
		nav: false,
		navText: [ '<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		dots: true,
		autoplay: true,
		autoplaySpeed: 1000,
	});
		
	/* Sticky header */
	$window.scroll(function(){
    	if ($window.scrollTop() > 200) {
			$('.navbar').addClass('sticky-header');
		} else {
			$('.navbar').removeClass('sticky-header');
		}
	});
	
	/* Popup video */
	$('.popup-video').magnificPopup({
        type: 'iframe',
        preloader: true,
    });
	
	/* Zoom screenshot */
	$('.zoom-screenshot').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom',
		image: {
			verticalFit: true,
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
			  return element.find('img');
			}
		}
	});
	
	/* Popup page*/
	$('.has-popup').magnificPopup({
		type: 'inline',
		fixedContentPos: true,
        fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		mainClass: 'mfp-with-zoom',
		zoom: {
			enabled: true,
			duration: 300
		}
	});
	
	/* Contact form validation */
	var $contactform=$("#contactForm");
	$contactform.validator({focus: false}).on("submit", function (event) {
		if (!event.isDefaultPrevented()) {
			event.preventDefault();
			submitForm();
		}
	});

	function submitForm(){
		/* Initiate Variables With Form Content*/
		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();

		$.ajax({
			type: "POST",
			url: "form-process.php",
			data: "name=" + name + "&email=" + email + "&message=" + message,
			success : function(text){
				if (text == "success"){
					formSuccess();
				} else {
					submitMSG(false,text);
				}
			}
		});
	}

	function formSuccess(){
		$contactform[0].reset();
		submitMSG(true, "Message Sent Successfully!")
	}

	function submitMSG(valid, msg){
		if(valid){
			var msgClasses = "h3 text-center text-success";
		} else {
			var msgClasses = "h3 text-center text-danger";
		}
		$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
	}
	/* Contact form validation end */
	
	/* Animate with wow js */
    new WOW().init(); 
	
})(jQuery);