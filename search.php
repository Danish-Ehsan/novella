<?php
/**
 * The template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novella
 */

get_header();
?>

    <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="posts-cont search-results">
                    <div class="posts__left-col">
                        <h1 class="search-results__heading">Search Results for: <?php echo get_search_query(); ?></h1>
                        <?php if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                        ?>
                        <div class="post-cont">
                            <header class="post__header">
                                <h1 class="post__title"><a href="<?php the_permalink(); ?>" class="post__title-link"><?php the_title(); ?></a></h1>
                            </header>
                            <article class="post__content">
                                <?php the_excerpt(); ?>
                            </article>
                            <div class="post__tags-cont">
                                <div class="post__categories"><span class="post-cont--grey">Under: </span><?php the_category(', '); ?></div>
                                <span class="post-cont--grey">Tagged: </span><?php the_tags( '', ', ', '<br />' ); ?> 
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
