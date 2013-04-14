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
	function scrollUpButton() {
		var didScroll = false;
		$scrollBtn = $('.scrollUpButton');

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
	scrollUpButton();

	// User dashboard
	$('.dashboard .settings').click(function(e){
		e.preventDefault();
		$this = $(this);
		$this.parent().find('ul').slideToggle(200);
	});
});

$(document).ready(function(){
	// Functions that must wait for better performance.

	// jQuery plugin for stretching videos in article.
	$('.article').fitVids();

	// Twitter plugin
	$('.tweetbox').pixTwitter({
		username: 'PlymouthES',
		posts: 2
	});

	// Delete profile picture functionality
	$('.removeProfilePic').on('click', function(e) {
		e.preventDefault();
		// Ask the user to confirm
		if(confirm('Are you sure you want to delete your profile picture?')) {
			// Send an AJAX request to delete the profile picture
			$.get('edit/deleteProfilePicture', function(response) {
				if(response.status == 'ok') {
					// Make style changes to give user feedback
					$('#profile-picture').attr('src', response.url);
					$('.avatar img').attr('src', response.url);
					$('.removeProfilePic').remove();
				}
			}, 'json');
		}
	});
});