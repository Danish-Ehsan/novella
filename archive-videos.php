<?php
/**
 * @package novella
 */

get_header();
?>

            <main id="main" class="main">
                
			<?php 
				if (have_posts()) :
					$videos = new WP_Query( array(
						'post_type' => 'videos',
						'posts_per_page' => -1
					) );
				//print_r($videos);
				
					//Setup array which loads thumbnails for first 5 items and passes object to javascript to lazy load the rest of the thumbnails
				
					$videos_info = array();
					
					if ($videos->have_posts()) {
						$post_count = 0;
						while ($videos->have_posts()) {
							$videos->the_post();
							if ($post_count <= 4) {
								$post_count++;
								$video_URL = get_field('url');
								$video_json = json_decode( file_get_contents('https://vimeo.com/api/oembed.json?url=' . $video_URL . '&maxwidth=850&maxheight=600') );
								$title = get_the_title();
								$thumbnail_URL = $video_json->thumbnail_url;
								$html = $video_json->html;
								$video_info = ['title' => $title, 'html' => $html, 'thumbnail_url' => $thumbnail_URL, 'video_url' => $video_URL];

								$videos_info[] = $video_info;
							} else {
								$title = get_the_title();
								$video_URL = get_field('url');
								$video_info = ['title' => $title, 'video_URL' => $video_URL];
								
								$videos_info[] = $video_info;
							}
						}
					}
					
					//Pass $videos_info data to Javascript file
					wp_localize_script( 'videos-page-js', 'videosInfo', $videos_info );
					
			?>
				<header class="videos__title-cont">
					<h2 class="videos__title js--main-video-title"><?php echo $videos_info[0]['title'] ?></h2>
				</header>
				<div class="videos__iframe-cont js--main-video-cont">
					<?php echo $videos_info[0]['html']; ?>
				</div>
				<?php
					if (have_posts()) :
						echo '<div class="videos__thumbnails-cont js--video-thumbs-cont owl-carousel owl-carousel-video-thumbnails">';
						$post_count = 0;
						while (have_posts()) :
							the_post();
							//$video_URL = get_field('url');
							//$video_json = json_decode( file_get_contents('https://vimeo.com/api/oembed.json?url=' . $video_URL . '&maxwidth=850&maxheight=600') );
				?>
				<a href="javascript:void(0);" class="videos__thumbnail js--video-thumb <?php if ($post_count == 0) { echo 'active'; } ?>" style="background-image: url('<?php echo isset($videos_info[$post_count]['thumbnail_url']) ? $videos_info[$post_count]['thumbnail_url'] : ''; ?>')"; data-key="<?php echo ($post_count); ?>">
					<div class="videos__thumbnail-title-cont">
                        <h2 class="videos__thumbnail-title"><?php the_title(); ?></h2>
                        <button class="videos__thumbnail-watch-btn js--video-thumbnail-btn">Watch</button>
                    </div>
				</a>
				<?php
							$post_count++;
						endwhile;
						echo '</div>';
					endif;
				?>
			<?php
				endif;
			?>
				
            </main><!-- #main -->

<?php
get_footer();
