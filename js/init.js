$(document).ready(function() {

	

	
	// JCAROUSEL:
	// Making preparations for the carousel
	// and creating thumbnails so the only appear when javascript is available
	
	function doLater() {
		
		$('.project-description, .portfolio-catcher p').hide();
		$('.hero').addClass('jcarousel-skin-jbm');
		$('.portfolio-catcher').addClass('portfolio-thumbs');
		$('.portfolio ul')
			.clone()
			.appendTo('.portfolio-catcher')
			.removeClass('jcarousel-skin-jbm');
		$('.portfolio-catcher').show();
		$('.portfolio-catcher .project-description').remove();
	
	}
    
    // jQuery fadeThenSlideToggle
    // http://stackoverflow.com/questions/734554/jquery-fadeout-then-slideup
    
    jQuery.fn.fadeThenSlideToggle = function(speed, easing, callback) {
		if (this.is(":hidden")) {
			return this.slideDown(speed, easing).fadeTo(speed, 1, easing, callback);
		} else {
			return this.fadeTo(speed, 0, easing).slideUp(speed, easing, callback);
		}
    };
    
    
    // Show description when the user clicks on slide
    
    $('.jcarousel-container .project-media').click(function() {
    	$('.project-description').fadeThenSlideToggle();
    });     
    
    // Insert GoogleMaps markup
    $('#contact .wrap').after('<div id="map">');
    
});


// match active navigation item to users position
// TODO: make this more performant

function navPosition() { 
	
	// store the current views offset 
	// to the top of the page
	var winTop = $(window).scrollTop(),
		offset = $('.header').outerHeight();

	$('.main-nav a[href*=#]').each(function(index) {		
		
		// gether all data we need about the target and the window offset
	    var href 	= $(this).attr('href'),
	    	target	= $(href.substr($('link[rel="index"]').attr('href').length+1)),
	    	targetTop = target.offset().top - offset-1,
	    	targetBottom = target.offset().top + target.outerHeight()- offset-1;
	   	    
	    // Check in what section of the page we are
	    if(winTop > targetTop && winTop < targetBottom) {
	    	$('.main-nav a').removeClass('active');
	    	$(this).addClass('active');
	    }
	});

};


// Fold contact form when message is sent

function wpcf7_on_sent_ok() { 
	window.location.href = '#contact';
	$('.wpcf7').append($('.wpcf7-mail-sent-ok'));
	$('.wpcf7-form').fadeThenSlideToggle();
}

