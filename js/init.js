$(document).ready(function() {
	
	base = $('link[rel="index"]').attr('href');
	offset = $('.header').outerHeight(); 
	
	
	// JCAROUSEL:
	// Making preparations for the carousel
	// and creating thumbnails so the only appear when javascript is available
	
	$('.project-description, .portfolio-catcher p').hide();
	$('.hero').addClass('jcarousel-skin-jbm');
	$('.portfolio-catcher').addClass('portfolio-thumbs');
	$('.portfolio ul')
		.clone()
		.appendTo('.portfolio-catcher')
		.removeClass('jcarousel-skin-jbm');
	$('.portfolio-catcher').show();
	$('.portfolio-catcher .project-description').remove();
	
	
	// JCAROUSEL:
	// Initializes the carousel

    $('#portfolio .hero').jcarousel({
        auto: 7,
        wrap: 'both',
        scroll: 1,
        animation: 'slow',
        buttonNextHTML: '<div><span>Nächste project</span><span class="v">></span></div>',
        buttonPrevHTML: '<div><span>Vorherige project</span><span class="v"><</span></div>',
        
        // JCAROUSEL:
        // Adds active state to external control items 
        // Source: http://stackoverflow.com/questions/2369274/jcarousel-i-need-active-state-on-external-controls/4003753#4003753
        
        itemVisibleInCallback: {
                    onAfterAnimation: function(c, o, i, s) {
                    --i;
                      $('.portfolio-thumbs li').removeClass('active');
                      $('.portfolio-thumbs li:eq('+i+')').addClass('active');
                    }
                  },
        initCallback: function(jc, state) {
        	
        	// JCAROUSEL:
        	// Load CSS only when Javascript is enabled
        	$("head").append("<link>");
        		
    	    var css = $("head").children(":last");
    	    css.attr({
    	      rel:  "stylesheet",
    	      type: "text/css",
    	      href: base + "/wp-content/themes/jbm/css/skins/jbm/skin.css"
    	    });
        	
        	// JCAROUSEL:
        	// Use thumbnails for external controlling of the slider
        	$('.portfolio-thumbs img').each(function(index) {
        		$(this).bind( 'click', function() {
        			jc.scroll($.jcarousel.intval(index+1));
        			return false;
        		})
        	});
        	 
        	 
        	// JCAROUSEL: 
        	// Pause carousel scrolling when a user mouses overs 
        	// an item and restart the scrolling when they mouse out. 
        	// Written by cormac at finisco dot com 19/2/2009 
        	// based on work by Jeremy Mikola: 
        	// http://groups.google.com/group/jquery-en/browse_thread/thread/f550b94... 
			
			if (state == 'init') {
				
			jc.startAutoOrig = jc.startAuto; 
			jc.startAuto = function() { 
				if (!jc.paused) { 
				jc.startAutoOrig(); 
				} 
			} 
			jc.pause = function() { 
				jc.paused = true; 
				jc.stopAuto(); 
			}; 
			jc.play = function() { 
				jc.paused = false; 
				jc.startAuto(); 
			}; 
			$('.jcarousel-skin-jbm .jcarousel-item').mouseover(function() { 
				jc.pause(); 
			}); 
			$('.jcarousel-skin-jbm .jcarousel-item').mouseout(function() { 
				jc.play(); 
			}); 
			} 
				jc.play(); 
			} 
    });
    
	// LOCAL SCROLL	
	options = {
		stop: false,
		duration:1000,
		hash:false,
		easing: 'swing',
		offset: -offset
	}

	$.localScroll(options);
	//$.localScroll.hash(options); // Scroll initially if there's a hash (#something) in the url 
	
	
    // jQuery fadeThenSlideToggle
    // http://stackoverflow.com/questions/734554/jquery-fadeout-then-slideup
    
    jQuery.fn.fadeThenSlideToggle = function(speed, easing, callback) {
		if (this.is(":hidden")) {
			return this.slideDown(speed, easing).fadeTo(speed, 1, easing, callback);
		} else {
			return this.fadeTo(speed, 0, easing).slideUp(speed, easing, callback);
		}
    };
    
    
    // Show description when the user clicks on a slide
    
    $('.jcarousel-container .project-media').click(function() {
    	$('.project-description').fadeThenSlideToggle();
    });     
    
    // Insert GoogleMaps markup
    $('#contact .wrap').after('<div id="map">');
    
});


// match active navigation item to users position

window.onscroll = function() { 
	
	// store the current views offset 
	// to the top of the page
	var winTop = $(window).scrollTop();

	$('.main-nav a[href*=#]').each(function(index) {		
		
		// gether all data we need about the target and the window offset
	    var href 	= $(this).attr('href'),
	    	target	= $(href.substr(base.length+1)),
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

