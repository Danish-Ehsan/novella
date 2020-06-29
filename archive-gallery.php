<?php
/**
 * @package novella
 */

get_header();
?>

            <main id="main" class="main">
                <?php

                    if (have_posts()) :
                        echo '<div class="gallery__posts-cont">';
                        while (have_posts()) :
                            the_post();
                ?>   
                <div class="gallery__post-cont">
                    <div class="gallery__content-cont">
						<div class="gallery__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
						<div class="gallery__copy-bkg"></div>
						<div class="gallery__copy-cont">
							<h2 class="gallery__title"><?php the_title(); ?></h2>
							<button class="gallery__read-more-btn"><a href="<?php the_permalink(); ?>" class="gallery__read-more-btn-link">More</a></button>
						</div>
                    </div>
                </div>
                <?php
                        endwhile;
                        echo '</div>';
                    endif;
                ?>
            </main><!-- #main -->

<?php
get_footer();
