<?php
/**
 * @package novella
 */

get_header();
?>

            <main id="main" class="main">
                <?php
                    //$the_query = new WP_Query( array('post_type' => 'things_we_love') );

                    if ( have_posts() ) :
                        echo '<div class="twl-posts__cont things-we-love">';
                        while (have_posts()) : the_post();
                ?>   
                <div class="twl-posts" style="background-image: url(<?php echo get_the_post_thumbnail_url( null, 'medium-square'); ?>)">
                    <div class="twl-post__content-cont">
                        <div class="twl-post__copy-cont">
                            <h2 class="twl-post__title"><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                        <button class="twl-post__read-more-btn"><a href="<?php the_field('url'); ?>" target="_blank" class="twl-post__read-more-btn-link"><?php the_field('brand_name'); ?></a></button>
                    </div>
                </div>
                <?php
                        endwhile;
                        echo '</div>';
						 the_posts_pagination(array(
							'next_text'         => '›',
							'prev_text'         => '‹'
						));
                    endif;
                ?>
            </main><!-- #main -->

<?php
get_footer();
