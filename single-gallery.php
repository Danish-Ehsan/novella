<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novella
 */

get_header();
?>

    <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php 
                    $gallery_images = get_field('gallery_images');
                    if (has_post_thumbnail() || $gallery_images) :
                        echo '<div class="featured__arrows-cont"><i class="fas fa-chevron-left featured__chevron-left"></i><i class="fas fa-chevron-right featured__chevron-right"></i>';
                        echo '<div class="featured__cont owl-carousel owl-carousel-featured">';
                        if (has_post_thumbnail()) {
                            echo '<div class="featured" style="background-image: url(' . get_the_post_thumbnail_url() . ')"></div>';
                        }
                        if ($gallery_images) :
                            while (the_repeater_field('gallery_images')) :
                ?>
                <div class="featured" style="background-image: url(<?php the_sub_field('gallery_image'); ?>)"></div>
                <?php
                            endwhile;
                        endif;
                    echo '</div></div>';
                    endif;
                ?>
                <div class="posts-cont gallery-single">

                        <?php if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                        ?>
                        <div class="post-cont">
                            <header class="post__header">
                                <h1 class="post__title"><?php the_title(); ?></h1>
                            </header>
                            <article class="post__content">
                                <?php the_content(); ?>
                            </article>
                        </div>
                        <?php	
                            
                            the_post_navigation(array(
                                'next_text'         => 'Next →',
                                'prev_text'         => '← Previous'
                            ));
                            
                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>

                </div><!--.posts-cont-->
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();