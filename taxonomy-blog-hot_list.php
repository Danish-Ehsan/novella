<?php
/**
 * The template for displaying HotList archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novella
 */

get_header();
?>

    <div id="primary" class="content-area">
            <main id="main" class="site-main">
				<div class="posts__categories-btns-cont">
					<button class="posts__category-btn active" data-filter="*">All</button>
					<button class="posts__category-btn" data-filter=".artist">Artist</button>
					<button class="posts__category-btn" data-filter=".culture">Culture</button>
					<button class="posts__category-btn" data-filter=".fashion">Fashion</button>
					<button class="posts__category-btn" data-filter=".food">Food</button>
					<button class="posts__category-btn" data-filter=".lifestyle">Lifestyle</button>
				</div>
                <div class="posts-cont grid-cont hotlist clearfix">
					<?php if ( have_posts() ) : ?>
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
					?>
					<div class="post-cont grid-item <?php foreach((get_the_category()) as $category) { echo strtolower($category->cat_name) . ' '; } ?>" data-filter="">
						<div class="post__thumbnail">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title() . ' thumbnail'?>">
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
							'next_text'         => '›',
							'prev_text'         => '‹'
						));

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
            </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
