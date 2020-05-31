(function( $ ) { 
	console.log(videosInfo);
	console.log('length= ' + videosInfo.length);
	
	var $videoThumbsCont = $('.js--video-thumbs-cont');
	var $videoTitle = $('.js--main-video-title');
	var $mainVideoCont = $('.js--main-video-cont');
	var $videoThumbs = $('.js--video-thumb');
	
	for (let i = 5; i < videosInfo.length; i++) {
		//setTimeout(function() {
			$.ajax({
				url: 'https://vimeo.com/api/oembed.json?url=' + videosInfo[i].video_URL + '&maxwidth=850&maxheight=600',
				success: function(result) {
					console.log(result);
					//result = JSON.parse(result);
					videosInfo[i].html = result.html;
					videosInfo[i].thumbnail_url = result.thumbnail_url;
					videosInfo[i].title = result.title;
					console.log('i= ' + i);
					$videoThumbs.eq(i).css('background-image', 'url("' + videosInfo[i].thumbnail_url + '")');
					console.log('data=' + $videoThumbs.eq(i).data('key'));
				}
			});
		//}, ((i - 4) * 100));
	}
	//console.log(videosInfo);
	
	
	$videoThumbsCont.on('click', '.js--video-thumbnail-btn', updateVideo);
	
	function updateVideo(e) {
		e.preventDefault();
		var videoKey = $(e.target).parents('.js--video-thumb').data('key');
		console.log('videoKey= ' + videoKey);
		
		$videoTitle.text(videosInfo[videoKey].title);
		$mainVideoCont.eq(0).children().eq(0).replaceWith(videosInfo[videoKey].html);
		$videoThumbs.removeClass('active');
		$videoThumbs.filter( function () { return $(this).data('key') == videoKey } ).addClass('active');
	}
	
}( jQuery ));