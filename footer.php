<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novella
 */

?>

    </div><!-- .container -->

    <footer id="colophon" class="footer">
        <?php
            // Get about us page content
            $the_query = new WP_Query( array('pagename' => 'about-us') );

            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
        ?>

        <div class="footer__about">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <div class="about__contact">
                <i class="fas fa-map-marker-alt about__icons"></i>
                <?php the_field('address_line_1'); ?><br>
                <i class="about__icons">&nbsp;</i>
                <?php the_field('address_line_2'); ?><br>
                <i class="fas fa-phone-alt about__icons"></i>
                <?php the_field('phone_number'); ?><br>
                <i class="far fa-envelope about__icons"></i>
                <?php $email_address = get_field('email_address'); ?>
                <a href="<?php echo 'mailto:' . $email_address; ?>"><?php echo $email_address;  ?></a><br>
            </div>
            <p>&copy; <?php echo date('Y'); ?> Novella Magazine. All rights reserved.</p>
        </div>

        <?php
            endwhile;
            endif;
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>

        <div class="footer__twitter">
            <h3>Follow me on Twitter</h3>
            <a href="http://twitter.com/NovellaMagazine">Tweets by @NovellaMagazine</a>
        </div>

        <div class="footer__insta"></div>



    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
