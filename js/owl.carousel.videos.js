(function( $ ) { 
   
    $(".owl-carousel-video-thumbnails").owlCarousel({
        loop: false,
		dots: true,
		responsive: {
			0: {
				items: 2
			},
			900: {
				items: 3
			},
			1200: {
				items: 4
			},
			1400: {
				items: 5
			}
		}
    });

}( jQuery ));