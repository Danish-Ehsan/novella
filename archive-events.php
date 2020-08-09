<?php
/**
 * The template for displaying Events archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novella
 */

get_header();
?>

    <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="posts-cont grid-cont hotlist events clearfix">
						<?php if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                        ?>
                        <div class="post-cont grid-item">
                            <div class="post__thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'medium_large'); ?>" alt="<?php echo get_the_title() . ' thumbnail'?>">
                                </a>
                            </div>
                            <header class="post__header">
                                <h3 class="post__title"><a href="<?php the_permalink(); ?>" class="post__title-link"><?php the_title(); ?></a></h3>
                            </header>
                            <article class="post__content">
                                <?php the_excerpt(); ?>
                            </article>
                        </div>
                        <?php	
                            endwhile;
                        ?>
				</div><!--.posts-cont-->
						<?php
                            the_posts_pagination(array(
                                'after_page_number' => ' /',
                                'next_text'         => 'Next →',
                                'prev_text'         => '← Previous'
                            ));

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
