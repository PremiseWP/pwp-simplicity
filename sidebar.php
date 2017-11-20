<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PWP_Simplicity
 */

if ( ! is_active_sidebar( 'pwp-simplicity-sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'pwp-simplicity-sidebar-1' ); ?>
</aside><!-- #secondary -->
