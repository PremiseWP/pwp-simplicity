<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PWP_Simplicity
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pwp_simplicity_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'pwp_simplicity_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pwp_simplicity_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pwp_simplicity_pingback_header' );

/**
 * Set class to the header widget based on the number of widgets
 *
 * @param  array $params params for the sidebar
 * @return array         the params altered with the right classes for each widget
 */
function pwp_simplicity_count_header_widgets( $params ) {

  $sidebar_id = $params[0]['id'];

  if ( $sidebar_id == 'pwp-simplicity-header-widgets' ) {

      $total_widgets = wp_get_sidebars_widgets();
      $sidebar_widgets = count( $total_widgets[$sidebar_id] );

      $params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
  }

  return $params;
}
// add_filter('dynamic_sidebar_params','pwp_simplicity_count_header_widgets');