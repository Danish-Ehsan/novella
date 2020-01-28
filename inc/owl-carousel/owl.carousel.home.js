(function( $ ) { 
   
    $(".owl-carousel-featured").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1200
    });
    
    $(".owl-carousel-client-logos").owlCarousel({
        loop: true,
        items: 4,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000
    });

}( jQuery ));