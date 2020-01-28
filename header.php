<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novella
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'novella' ); ?></a>

    <header id="masthead" class="header">
        <div class="header__logo-cont">
            <div class="header__logo">
                    <?php
                    the_custom_logo();
                    ?>
            </div><!-- .site-branding -->
        </div>

        <nav id="site-navigation" class="header__nav">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'novella' ); ?></button>
            <?php
            wp_nav_menu( array(
                    'theme_location'    => 'main-menu',
                    'menu_class'        => 'header__nav-menu',
                    'container'         =>  false
            ) );
            ?>
        </nav><!-- #site-navigation -->

        <div class="header__social">
            <ul class="header__social-menu">
                <li class="header__social-menu-item"><a href="http://facebook.com/NovellaMagazine"><i class="fab fa-facebook-square"></i></a></li>
                <li class="header__social-menu-item"><a href="http://twitter.com/NovellaMagazine"><i class="fab fa-twitter-square"></i></a></li>
                <li class="header__social-menu-item"><a href="http://instagram.com/novellamagazine"><i class="fab fa-instagram"></i></i></a></li>
                <li class="header__social-menu-item"><a href="http://novellamag.tumblr.com"><i class="fab fa-tumblr-square"></i></i></a></li>
                <li class="header__social-menu-item"><a href="https://vimeo.com/novellamag"><i class="fab fa-vimeo-square"></i></i></a></li>
                <li class="header__social-menu-item"><a href="mailto:info@novellamag.com"><i class="fas fa-envelope-square"></i></i></a></li>
            </ul>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="container">
