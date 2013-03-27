$(function(){
	// Functions that can't wait.
	// Mobile menu trigger
	$('.mobileTrigger').click(function(e){
		e.preventDefault();
		$menu = $('.nav');

		$menu.toggleClass('opened');
	});

	// Flash message
	$('#flashMessage').click(function(e){
		$this = $(this);
		$this.slideUp();
	});

	// Scroll up
	function scrollUpBtn() {
		var didScroll = false;
		$scrollBtn = $('.scrollUpBtn');

		$scrollBtn.click(function(e) {
			e.preventDefault();
			$('body,html').animate({ scrollTop: '0' });
		});

		$(window).scroll(function() {
			didScroll = true;
		});

		setInterval(function() {
			if ( didScroll ) {
				didScroll = false;

				if ( $(window).scrollTop() > 200 ) {
					$scrollBtn.css('display', 'block');
				} else {
					$scrollBtn.css('display', 'none');
				}
			}
		}, 250);
	}
	scrollUpBtn();
});

$(document).ready(function(){
	// Functions that must wait for better performance.

	// jQuery plugin for stretching videos in article.
	$('.entry .media').fitVids();

	// Twitter plugin
	$('.tweetbox').pixTwitter({
		username: 'twitter',
		posts: 2
	});
});