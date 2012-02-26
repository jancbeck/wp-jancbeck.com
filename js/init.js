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
	
	// throttling scroll event
	// http://ejohn.org/blog/learning-from-twitter/
	
	var didScroll = false,
		$window = $(window),
		$sections = $('.section'),
		$navItems = $('#menu-main-navigation a');
	
	// wait until section elements have their final height	
	$sections.ready(function() {
		
		// cache offset values 
		$sections.each(function() {
			this.sectionTop = $(this).offset().top - 100;
			this.sectionBottom = $(this).offset().top + $(this).outerHeight() - 100;
		});
	
	})
	
	$(window).scroll(function() {
	    didScroll = true;
	});
	
	function highlightCurrentNavItem() {
	
		var windowScrollTop = $window.scrollTop();
			        	        
		$sections.each(function() {
		    
		    // in which section are we
			if (this.sectionTop <= windowScrollTop && this.sectionBottom >= windowScrollTop) {
				
				var sectionID = $(this).attr('id'),
					$currentNavItem = $('#menu-main-navigation a.current');
				
				// if current section is already highlighted in menu	        			        		
				if ($currentNavItem.attr('href') != '#' + sectionID) {
				
					$currentNavItem.removeClass('current');
					$navItems.filter('a[href=#' + sectionID + ']').addClass('current');
				}	        			
			}
		})
	}
	
	setInterval(function() {
	
	    if (didScroll) {
	        didScroll = false;
	        
	        highlightCurrentNavItem();
	    }
	}, 500);
    
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



