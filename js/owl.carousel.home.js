(function( $ ) { 
   
    $(".owl-carousel-featured").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
		lazyLoad: true,
		lazyLoadEager: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1200
    });
    
    $(".owl-carousel-client-logos").owlCarousel({
        loop: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplaySpeed: 1000,
		responsive: {
			0: {
				items: 2
			},
			600: {
				items: 3
			},
			700: {
				items: 4
			}
		}
    });

    var owl = $('.owl-carousel-featured');
    owl.owlCarousel();

    $('.featured__chevron-left').click(function() {
		//stop and start need to be triggered to reset the timer before the slide auto switches
       owl.trigger('stop.owl.autoplay').trigger('prev.owl.carousel', [1000]).trigger('play.owl.autoplay', [5000, 1200]); 
    });
    
    $('.featured__chevron-right').click(function() {
       owl.trigger('stop.owl.autoplay').trigger('next.owl.carousel', [1000]).trigger('play.owl.autoplay', [5000, 1200]); 
    });

}( jQuery ));