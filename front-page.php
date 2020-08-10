<?php
/**
 * @package novella
 */

get_header();
?>

            <main id="main" class="main">
                <?php 
                    $featured = get_field('featured_galleries');
                    if ($featured) :
                        echo '<div class="featured__arrows-cont"><i class="fas fa-chevron-left featured__chevron-left"></i><i class="fas fa-chevron-right featured__chevron-right"></i>';
                        echo '<div class="featured__cont owl-carousel owl-carousel-featured">';
                        foreach ($featured as $key=>$post) :
                        setup_postdata($post);
						
						if ($key == 0) :
                ?>
                <div class="featured" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                    <a href="<?php the_permalink(); ?>" class="featured__link"></a>
                </div>
				<?php
					else :
				?>
				<div class="featured owl-lazy" data-src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <a href="<?php the_permalink(); ?>" class="featured__link"></a>
                </div>
                <?php
					endif;
                    wp_reset_postdata();
                    endforeach;
                    echo '</div></div>';
                    endif;
                ?>
                
                <?php
                    $posts = get_posts(array('numberposts' => 12));
                    if ($posts) :
                        echo '<div class="home-posts__cont">';
                        foreach ($posts as $post) :
                            setup_postdata($post);
                ?>
                <div class="home-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'medium_large'); ?>)">
                    <div class="home-post__title-cont">
                        <h2 class="home-post__title"><?php the_title(); ?></h2>
                        <button class="home-post__read-more-btn"><a href="<?php the_permalink(); ?>" class="home-post__read-more-btn-link">Read More</a></button>
                    </div>
                </div>
                <?php
                        endforeach;
                        wp_reset_postdata();
                        echo '</div>';
                    endif;
                ?>
                
                <?php 
                    //$logos = get_field('client_logos');
                    if (have_rows('client_logos')) :
                        echo '<div class="client-logos-cont owl-carousel owl-carousel-client-logos">';
                        while(have_rows('client_logos')) :
                            the_row();
                ?>
                <div class="client-logo-cont" style="background-image: url(<?php echo get_sub_field('client_logo');  ?>)">
                </div>
                <?php
                    endwhile;
                    echo '</div>';
                    endif;
                ?>
            </main><!-- #main -->

<?php
get_footer();
