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
        autoplaySpeed: 1000
    });

    var owl = $('.owl-carousel-featured');
    owl.owlCarousel();

    $('.featured__chevron-left').click(function() {
       owl.trigger('prev.owl.carousel', [1000]); 
    });
    
    $('.featured__chevron-right').click(function() {
       owl.trigger('next.owl.carousel', [1000]); 
    });

}( jQuery ));