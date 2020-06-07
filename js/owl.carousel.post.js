(function( $ ) { 
   
    $(".owl-carousel-post").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1200
    });
	
	var owl = $('.owl-carousel-post');
    owl.owlCarousel();

    $('.featured__chevron-left').click(function() {
		//stop and start need to be triggered to reset the timer before the slide auto switches
       owl.trigger('stop.owl.autoplay').trigger('prev.owl.carousel', [1000]).trigger('play.owl.autoplay', [5000, 1200]); 
    });
    
    $('.featured__chevron-right').click(function() {
       owl.trigger('stop.owl.autoplay').trigger('next.owl.carousel', [1000]).trigger('play.owl.autoplay', [5000, 1200]); 
    });

}( jQuery ));