<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PWP_Simplicity
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pwp-simplicity' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<a href="<?php echo site_url(); ?>" class="logo-link">
				<img src="<?php echo esc_url( get_template_directory_uri().'/img/Logo.png' ); ?>" class="logo">
			</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<img src="<?php echo esc_url( get_template_directory_uri().'/img/nav-toggle.png' ); ?>" class="nav-toggle">
			</button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php if ( is_front_page() ) : ?>
		<div class="pwp-simplicity-hero" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/img/hero.png' ); ?>);">
			<div class="pwp-simplicity-hero-text">
				<img src="<?php echo esc_url( get_template_directory_uri().'/img/behind-the-bar-with-laphroaig.png' ); ?>">
				<p>Crafting drinks with the most richly flavoured of all Scotch whiskies.</p>
			</div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
