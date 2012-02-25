// jQuery fadeThenSlideToggle
// http://stackoverflow.com/questions/734554/jquery-fadeout-then-slideup

jQuery.fn.fadeThenSlideToggle = function(speed, easing, callback) {
	if (this.is(":hidden")) {
		return this.slideDown(speed, easing).fadeTo(speed, 1, easing, callback);
	} else {
		return this.fadeTo(speed, 0, easing).slideUp(speed, easing, callback);
	}
};

$(document).ready(function() {
    
    // Show description when the user clicks on slide
    
    $('.project-description').hide();
    $('.project-media').click(function() {
    	$('.project-description').fadeThenSlideToggle();
    });     
    
    // Insert GoogleMaps markup
    $('#contact .wrap').after('<div id="map" />');
    
});


// Animate Scrolling

$('.nav-main a').click(function(e) {
	
	e.preventDefault();
	
	var target = $($(this).attr('href')),
		offset = target.offset(),
		adjust = -100; // corrects for fixed header height
	
	$('html, body').animate({
		scrollTop : offset.top + adjust
	}, 'slow');		
});


// Fold contact form when message is sent

function wpcf7_on_sent_ok() { 
	window.location.href = '#contact';
	$('.wpcf7').append($('.wpcf7-mail-sent-ok'));
	$('.wpcf7-form').fadeThenSlideToggle();
}



