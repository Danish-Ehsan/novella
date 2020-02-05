<?php
/**
 * The template for displaying single posts
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
                                <h1 class="post__title post__title--grey"><?php the_title(); ?></h1>
                                <p class="post__author">By <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>" class="post__author-name"><?php echo get_the_author_meta('display_name'); ?></a><?php edit_post_link('Edit', ' | '); ?></p>
                            </header>
                            <article class="post__content">
                                <?php the_content(); ?>
                            </article>
                            <div class="post__tags-cont">
                                <div class="post__categories"><i class="far fa-folder post__tags-icon"></i><?php the_category(', '); ?></div>
                                 <i class="fas fa-tags post__tags-icon"></i><?php the_tags( '', ', ', '<br />' ); ?> 
                            </div>
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
                    </div><!--.posts__left-col-->
                    <?php get_sidebar(); ?>
                </div><!--.posts-cont-->
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
