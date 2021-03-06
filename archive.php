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
                <div class="posts-cont">
                    <div class="posts__left-col">
                        <?php if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                        ?>
                        <div class="post-cont">
                            <header class="post__header">
                                <h1 class="post__title"><a href="<?php the_permalink(); ?>" class="post__title-link"><?php the_title(); ?></a></h1>
                                <p class="post__author">By <a href="<?php echo get_author_posts_url(get_the_author_meta($field = 'ID')); ?>" class="post__author-name"><?php echo get_the_author_meta('display_name'); ?></a><?php edit_post_link('Edit', ' | '); ?></p>
                            </header>
							<?php 
								if ( have_rows('post_image_carousel') ) : 	
							?>
								<div class="featured__arrows-cont"><i class="fas fa-chevron-left featured__chevron-left"></i><i class="fas fa-chevron-right featured__chevron-right"></i>
								<div class="post__carousel owl-carousel owl-carousel-post">
									<?php while ( have_rows('post_image_carousel') ) : the_row(); ?>
									<div class="post__carousel-image" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
									<?php endwhile; ?>
								</div>
								</div>
							<?php endif; ?>
                            <article class="post__content">
                                <?php the_content(); ?>
                            </article>
                            <div class="post__tags-cont">
                                <div class="post__categories"><i class="far fa-folder post__tags-icon"></i><?php the_category(', '); ?></div>
                                 <i class="fas fa-tags post__tags-icon"></i><?php the_tags( '', ', ', '<br />' ); ?> 
                            </div>
                        </div>
                        <?php	
                            endwhile;
                            
                            the_posts_pagination(array(
                                'after_page_number' => ' /',
                                'next_text'         => 'Next →',
                                'prev_text'         => '← Previous'
                            ));

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    </div><!--.posts__left-col-->
                    <?php get_sidebar(); ?>
                </div><!--.posts-cont-->
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
