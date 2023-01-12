require('./class-video-section');
require('./class-video-player');

;
(function ($) {


	// resize video
	var videoHeight = function() {
		var heroVideo = $('.hero-section .hero-video') ;
		var windowHeight = $(window).innerHeight() ;
		var orangeFramePadding = $('.hero-section').outerHeight() - $('.hero-section').height() ;
		var paperFramePadding = $('.hero-section .light-frame').outerHeight() - $('.hero-section .light-frame').height() ;
		// var titleMargin =  parseInt($('.hero-section .custom-heading').css('marginTop')) ;
		var titleHeight = $('.hero-section .custom-heading').height() ;
		var maxHeight = windowHeight - orangeFramePadding - paperFramePadding - (titleHeight + 16) ;

		heroVideo.css({ "height": maxHeight  });
	},
	didResize = false;

	$(window).resize(function() {
		didResize = true;
	});
	setInterval(function() {
		if(didResize) {
			didResize = false;
			videoHeight();
		}
	}, 150);


	// resize image
	var imageHeight = function() {
		var heroVideo = $('.resize-img .hero-image') ;
		var windowHeight = $(window).height() ;
		var orangeFramePadding = $('.resize-img').outerHeight() - $('.resize-img').height() ;
		var paperFramePadding = $('.resize-img .light-frame').outerHeight() - $('.resize-img .light-frame').height() ;
		var titleMargin = parseInt($('.resize-img .custom-heading').css('marginBottom')) ;
		var titleMarginTop = parseInt($('.resize-img .custom-heading').css('marginTop')) ;
		var titleHeight = $('.resize-img .custom-heading').height() ;
		var maxHeight = windowHeight - orangeFramePadding - paperFramePadding - titleHeight - titleMargin - titleMarginTop;

		heroVideo.css({"max-height": maxHeight, "height": maxHeight });
	},
	resizeImage = false;

	$(window).resize(function() {
		resizeImage = true;
	});
	setInterval(function() {
		if(resizeImage) {
			resizeImage = false;
			imageHeight();
		}
	}, 150);



	var minHeightVideoInfo = function() {
		var videoRow = $('.video-info .video-row') ;
		var relatedVideoHeight = $('.video-info .related-video').outerHeight() ;
		var videoTextHeight = $('.video-info .video-text').outerHeight() ;
		var maxHeight = Math.max(relatedVideoHeight,videoTextHeight) ;
		videoRow.css({"min-height": maxHeight});
	},
	resizeVideo = false;

	$(window).resize(function() {
		resizeVideo = true;
	});
	setInterval(function() {
		if(resizeVideo) {
			resizeVideo = false;
			minHeightVideoInfo();
		}
	}, 150);



	var height100vh = function() {
		var section = $('.height-100vh') ;
		let vh = window.innerHeight ;
		section.css({"min-height": vh+'px'});
	}



    // Scripts which runs after DOM load

    $(document).ready(function () {

    	videoHeight() ;
    	imageHeight() ;
    	minHeightVideoInfo() ;
    	height100vh() ;


    	var timedelay = 1;
    	var _delay = setInterval(delayCheck, 500);
    	var showOnMove = $('.show-on-move');

    	$(document).on('mousemove', showAllEvent);

    	function delayCheck() {
    		if (timedelay == 4) {
    			showOnMove.fadeOut();
    			timedelay = 1;
    		}
    		timedelay = timedelay + 1;
    	}

    	function showAllEvent() {
    		showOnMove.fadeIn();
    		timedelay = 1;
    		clearInterval(_delay);
    		_delay = setInterval(delayCheck, 500);
    	}

    	if ($('#file').length > 0) {
    		const file = document.querySelector('#file');
    		file.addEventListener('change', (e) => {
  				// Get the selected file
  				const [file] = e.target.files;
  				// Get the file name and size
  				const { name: fileName, size } = file;
  				// Convert size in bytes to kilo bytes
  				const fileSize = (size / 1000).toFixed(2);
  				// Set the text content
  				const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  				document.querySelector('.file-name').textContent = fileNameAndSize;
  			}) ;
    	}

    	$('.wpcf7-form select').selectric();



    	$('#nav-icon2').click(function (e) {
    		e.preventDefault();
    		$(this).toggleClass('open');
    		$('.top-bar').slideToggle();
    	});


    	$('.menu-list-item').on('click', function (e) {
    		e.preventDefault();
    		var textID = $(this).data('id') ;
    		var thisText = $('#list-item-text-id-'+textID) ;
    		$('.menu-list-item').not(this).removeClass('active') ;
    		if ($(this).hasClass('active')) {
    			$(this).removeClass('active');
    		} else {
    			$(this).toggleClass('active');
    		}
    		$('.list-item-text').not(thisText).hide();
    		$('#list-item-text-id-'+textID).show();
    	});



    	$('.show-related-video').click(function (e) {
    		e.preventDefault();
    		var textStart = $(this).data('text-1') ;
    		var textChange = $(this).data('text-2') ;
    		$(this).text(function(i, text){
    			return text === textStart ? textChange : textStart;
    		})
    		$('.video-text').toggleClass('hidden');
    		$('.related-video').toggleClass('active');
    	});

    	$('.mobile-show-video-info').click(function (e) {
    		e.preventDefault();
    		$('.mobile-show-related-video').removeClass('active');
    		$(this).addClass('active');
    		$('.video-text').slideDown();
    		$('.related-video').slideUp();
    	});


    	$('.mobile-hide-video-info').click(function (e) {
    		e.preventDefault();
    		$('.video-text').slideUp();
    		$('.mobile-show-video-info').removeClass('active');
    	});

    	$(document)
    	.on('mouseover','.video-list-item-content', function (e) {
    		var $this = $(e.currentTarget);
    		$this.find("video")[0].play();
    		$this.find('img').stop().fadeOut() ;
    	})
    	.on('mouseleave', '.video-list-item-content', function (e) {
    		var $this = $(e.currentTarget);
    		var el = $this.find("video")[0];
    		el.pause();
    		$this.find('img').stop().fadeIn() ;
    	});


    	$(document)
    	.on('click', '.video-list-item-content', function (e) {
    		if (!($(window).width() < 768) || $(this).hasClass('is-mobile-hovered'))  return;

    		e.preventDefault();
    		$(this).addClass('is-mobile-hovered');
    	})
    	.on('blur', '.video-list-item-content', function() {
    		$(this).removeClass('is-mobile-hovered');
    	});



    	$('.mobile-show-related-video').click(function (e) {
    		e.preventDefault();
    		$('.mobile-show-video-info').removeClass('active');
    		$(this).addClass('active');
    		$('.video-text').slideUp();
    		$('.related-video').slideDown().addClass('clearfix');
    	});

    	$('.mobile-hide-related-video').click(function (e) {
    		e.preventDefault();
    		$('.related-video').slideUp();
    		$('.mobile-show-related-video').removeClass('active');
    		$('.mobile-show-related-video').removeClass('active');
    	});




    	// $('.open-submenu').on('click', function (e) {
    	// 	e.preventDefault();
    	// 	$(this).toggleClass('active').next('.submenu').slideToggle();
    	// 	$(this).closest('li').find('> a').toggleClass('focused')
    	// });


        // Scroll to ID


        $('a[href*="#"]:not([data-fancybox]').click(function (event) {
        	var $this = $(this);
        	var href = $this.attr('href');
        	var current_url = window.location.href;
        	var block_id = href.split("#").pop();
        	var block = $('#' + block_id);
        	if (href != '#' && block.length) {
        		if ((href.split('#')[0] == current_url.split('#')[0]) || (href.indexOf('#') == 0)) {
        			event.preventDefault();
        			$('html, body').animate({
        				scrollTop: block.offset().top ,
        			}, 500);
        		}
        	}
        });

        if ($('.mobile-cover-video').length > 0) {
        	$('.play-for-mobile').on('click', function() {
        		$('.mobile-cover-video')[0].pause() ;
        	});
        }

        $('[data-fancybox]').fancybox({
        	youtube : {
        		showinfo : 0
        	},
        	vimeo : {
        		color : 'f00'
        	},
        	afterClose: function() {
        		if ($('.mobile-cover-video').length > 0) {
        			$('.mobile-cover-video')[0].play() ;
        		}
        	}
        });

    });

    // Scripts which runs after all elements load

    $(window).on('load', function () {
 		//jQuery code goes here
 		setTimeout(function(){
 			$('.preloader').addClass('preloader--hidden');
 			// $('body').removeClass('no-scroll');
 			// $('html').removeClass('no-scroll');

 		}, 1500);




 	});

    // Scripts which runs at window resize

    $(window).resize(function () {

        //jQuery code goes here

    });
    // require('./../../template/block/reviews-slider-section/scripts') ;

}(jQuery));
