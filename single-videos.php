<?php
/**
 * @package novella
 */

get_header();
?>

            <main id="main" class="main">
                
			<?php 
				if (have_posts()) :
					while (have_posts()) : the_post();
				
						$video_URL = get_field('url');
						$video_json = json_decode( file_get_contents('https://vimeo.com/api/oembed.json?url=' . $video_URL . '&maxwidth=850&maxheight=600') );
			?>
						<header class="videos__title-cont">
							<h2 class="videos__title js--main-video-title"><?php the_title(); ?></h2>
						</header>
						<div class="videos__iframe-cont js--main-video-cont">
							<?php echo $video_json->html; ?>
						</div>
			<?php			
				endwhile;
				endif;
			?>
				
            </main><!-- #main -->

<?php
get_footer();
