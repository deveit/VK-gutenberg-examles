jQuery(document).ready(function($){
	var slider = $(".slider");

	console.log(slider) ;
	if (slider.length) {
		slider.each(function (idx, item) {
			var slickInduvidual = $(this);
			$(this).slick({
				cssEase: 'ease',
				slidesToShow: 3,
				slidesToScroll: 1,
				dots: false,
				arrows: true,
				adaptiveHeight: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 5000,
				infinite: false,
				nextArrow: slickInduvidual.find('.slider__arrow--next'),
				prevArrow: slickInduvidual.find('.slider__arrow--prev'),
				slide: '.slider__item',
				responsive: [
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
					}
				}
				]
			});
		}); 
	}
	
});