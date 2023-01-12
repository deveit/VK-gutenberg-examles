
;
(function ($) {

    // Scripts which runs after DOM load

    $(document).ready(function () {

    	// $('#nav-icon2').click(function () {
    	// 	$(this).toggleClass('open');
    	// 	$('.top-bar').toggleClass('open');
    	// 	$('.header').toggleClass('open-header');
    	// });

    	// $('.open-submenu').on('click', function (e) {
    	// 	e.preventDefault();
    	// 	$(this).toggleClass('active').next('.submenu').slideToggle();
    	// 	$(this).closest('li').find('> a').toggleClass('focused')
    	// });

        // Scroll to ID

        // $('a[href*="#"]').click(function (event) {
        // 	var $this = $(this);
        // 	var href = $this.attr('href');
        // 	var current_url = window.location.href;
        // 	var block_id = href.split("#").pop();
        // 	var block = $('#' + block_id);
        // 	if (href != '#' && block.length) {
        // 		if ((href.split('#')[0] == current_url.split('#')[0]) || (href.indexOf('#') == 0)) {
        // 			event.preventDefault();
        // 			$('html, body').animate({
        // 				scrollTop: block.offset().top,
        // 			}, 500, 'linear');
        // 		}
        // 	}
        // });

        // $(window).scroll(function() { 

        // 	var scroll = $(window).scrollTop();

        // 	if (scroll >= 1) {
        // 		$(".header").addClass("active");
        // 		$("body").addClass("active");
        // 	} else {
        // 		$(".header").removeClass("active");
        // 		$("body").removeClass("active");
        // 	}
        // });
        // if ($(window).scrollTop() > 1 ) {
        // 	$(".header").addClass("active");
        // 	$("body").addClass("active");
        // }

    });

    // Scripts which runs after all elements load

    $(window).on('load', function () {

        //jQuery code goes here
        $('.preloader').addClass('preloader--hidden');

        // window.addEventListener('load', () => {
		// 	const preloader = document.querySelector(".preloader");
		// 	preloader.classList.add("'preloader--hidden");
		// });

	});

    // Scripts which runs at window resize

    $(window).resize(function () {

        //jQuery code goes here

    });
    require('./../../template/block/slider-section/scripts') ;

}(jQuery));


