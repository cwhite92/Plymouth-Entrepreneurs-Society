$(function(){
	// Functions that can't wait.

	// Mobile menu show/hide trigger btn
	$('.mobileMenuBtn').click(function(e) {
		e.preventDefault();
		$('.mobileMenu').slideToggle();
	});

	// Copying navigation
	function copyMainNav() {
		var data = $('.mainMenu').html();
		$('.mobileMenu').append(data);
	}
	copyMainNav();

	// Copying user dashboard
	function copyDashboard() {
		var data = $('.dashboardMain').html();
		$('.dashboardMobile').append(data);
	}
	copyDashboard();

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
	$('.article .media').fitVids();

	// Twitter plugin
	$('.tweetbox').pixTwitter({
		username: 'twitter',
		posts: 2
	});
});