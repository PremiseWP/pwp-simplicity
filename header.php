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

	<?php wp_head();

	// load customizer styles last so that we override all stylesheets
	require get_template_directory() . '/inc/customizer-styles.php'; ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-content">
			<?php
			if ( is_active_sidebar( 'pwp-simplicity-header-widgets' ) ) : ?>
				<div class="pwp-simplicity-header-widgets pwp-clear-float pwp-row">
					<?php dynamic_sidebar( 'pwp-simplicity-header-widgets' ); ?>
				</div>
			<?php
			endif; ?>

			<div class="site-branding">
				<?php pwp_simplicity_site_branding(); ?>
			</div><!-- .site-branding -->

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<i class="fa fa-bars"></i>
			</button>

			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>
		<?php pwp_simplicity_header_overlay(); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
