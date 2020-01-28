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
                        echo '<div class="featured-cont owl-carousel owl-carousel-featured">';
                        foreach ($featured as $post) :
                        setup_postdata($post);
                ?>
                <div class="featured" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                </div>
                <?php
                    wp_reset_postdata();
                    endforeach;
                    echo '</div>';
                    endif;
                ?>
                
                <?php
                    $posts = get_posts(array('numberposts' => 12));
                    if ($posts) :
                        echo '<div class="posts-cont">';
                        foreach ($posts as $post) :
                            setup_postdata($post);
                ?>
                <div class="posts" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                    <?php //the_post_thumbnail(); ?>
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
