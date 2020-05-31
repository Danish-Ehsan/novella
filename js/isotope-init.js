(function( $ ) { 

   // init Isotope
	var $grid = $('.grid-cont').imagesLoaded( function() {
	  // init Isotope after all images have loaded
	  $grid.isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
		  //columnWidth: $grid.find('.grid-sizer')[0],
		  horizontalOrder: true
		}
	  });
	});
	
	
	// filter items on button click
	$('.posts__categories-btns-cont').on( 'click', 'button', function() {
		$('.posts__category-btn').removeClass('active');
		$(this).addClass('active');
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});

}( jQuery ));