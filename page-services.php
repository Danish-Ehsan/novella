<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
                        <div class="post-cont page-services">
                            <article class="post__content">
                                <?php the_content(); ?>
                            </article>
							
							<?php 
								$query = new WP_Query( array('pagename' => 'home-page') );
								if ($query->have_posts()) :
									while ($query->have_posts()) :
										$query->the_post();
										if (have_rows('client_logos')) :
											echo '<h1 class="services__clients-title">Past Clients</h1>';
											echo '<div class="services__clients-cont">';
											while(have_rows('client_logos')) :
												the_row();
							?>
							<div class="services__clients-logo" style="background-image: url(<?php echo get_sub_field('client_logo'); ?>)"></div>
							<?php
											endwhile;
											echo '</div>';
										endif;
										wp_reset_postdata();
									endwhile;
								endif;
                            
                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
						</div><!--.post-cont-->
                    </div><!--.posts__left-col-->
                    <?php get_sidebar(); ?>
                </div><!--.posts-cont-->
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
