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
	
	// cache DOM queries
		$window = $(window),
		$sections = $('.section'),
		$navItems = $('#menu-main-navigation').find('a'),
		$currentNavItem = $navItems.filter('.current');
	
	// wait until section elements have their final height	
	$sections.ready(getSectionsDimensions);
	
	function getSectionsDimensions() {
		
		// cache offset values 
		$sections.each(function() {
			this.sectionTop = $(this).offset().top - 100;
			this.sectionBottom = $(this).offset().top + $(this).outerHeight() - 100;
			this.sectionID = $(this).attr('id');
		});
		
	}
	
	$(window).scroll(function() {
	    didScroll = true;
	});
	
	function highlightCurrentNavItem() {
	
		var windowScrollTop = $window.scrollTop();
			        	        
		$sections.each(function() {
		    
		    // in which section are we
			if (this.sectionTop <= windowScrollTop && this.sectionBottom >= windowScrollTop) {
								
				// if current section is already highlighted in menu	        			        		
				if ($currentNavItem.attr('href') != '#' + this.sectionID) {
					$currentNavItem.removeClass('current');
					$currentNavItem = $navItems.filter('a[href=#' + this.sectionID + ']').addClass('current');
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
    	$('.project-description').fadeThenSlideToggle(null, null, getSectionsDimensions);
    	
    });     
    
    
    // Insert GoogleMaps markup
    $('#contact .wrap').after('<div id="map" />');
    
});

$(window).load(function() {
	
	$('.slider').flexslider({
		
		animation: "slide",             // String: Select your animation type, "fade" or "slide"
		directionNav: false,            // Boolean: Create navigation for previous/next navigation? (true/false)
		pauseOnHover: true,             // Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
		manualControls: "#slider-thumb-control",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
		start: function() {			
			$('.flex-control-nav').find('a').html(function(i, o) {
				return '<img src="' + $('[data-thumb]:eq(' + i + ')').attr('data-thumb') + '" alt="' + $('.project-titel:eq(' + i + ')').text() + '" />';
			});
		}
	});
	
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



