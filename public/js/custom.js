(function ($) {

	new WOW().init();

	jQuery(window).load(function() { 
		jQuery("#preloader").delay(100).fadeOut("slow");
		jQuery("#load").delay(100).fadeOut("slow");
	});


	//jQuery to collapse the navbar on scroll
	$(window).scroll(function() {
		if ($(".navbar").offset().top > 50) {
			$(".navbar-fixed-top").addClass("top-nav-collapse");
		} else {
			$(".navbar-fixed-top").removeClass("top-nav-collapse");
		}
	});

	//jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$('.navbar-nav li a').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		$('.page-scroll a').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});

})(jQuery);

//nav-btn
$(document).on("click","#nav-btn-open",function (){
	if ($('#adap-nav-menu').is(':empty')){
		$("#adap-nav-menu").empty();
		$("#adap-nav-menu").append($('#nav_item0').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item1').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item2').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item3').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item4').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item5').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item6').clone())
		$("#adap-nav-menu").append('<br>')
		$("#adap-nav-menu").append($('#nav_item7').clone())
	}else{
		$("#adap-nav-menu").empty();
	}
})