<?php
/**
 * This file outputs the custom styles generated from options in the PWP Simplicity Theme Customizer
 *
 * @see PWP_Simplicity_Customizer class which handles the customizer options for more info
 *
 * @package PWP_Simplicity
 */

// get the theme mods
$theme_mods = pwp_simplicity_theme_mod();
// get the settings for the header section
$_header  = isset( $theme_mods['header'] )  ? $theme_mods['header']  : array();
$_nav     = isset( $theme_mods['nav'] )     ? $theme_mods['nav']     : array();
// get the settings for the body section
$_body    = isset( $theme_mods['body'] )    ? $theme_mods['body']    : array();
$_content = isset( $theme_mods['content'] ) ? $theme_mods['content'] : array();

/**
 * loop through the options set for a tag and output the css
 *
 * @param  array  $tag associative array of css property => value
 * @return string      the css for the tag
 */
function pwp_print_custom_styles_for( $tag = array() ) {
	foreach ( (array) $tag as $property => $value ) {
		if ( ! empty( (string) $value ) ) {
			echo $property .': '. esc_attr( $value ) .';';
		}
	}
}

/**
 * print all styles from the customizer that apply to the typography
 *
 * @return string the css for the typography
 */
function pwp_print_custom_typography( $theme_mods ) {
	$_typography_tags = array(
		'h1','h2','h3','h4','h5','h6','p','a','li',
	);
	foreach ($_typography_tags as $tag) {
		if ( isset( $theme_mods[ $tag ] ) ) {
			echo $tag.'{';
				pwp_print_custom_styles_for( $theme_mods[ $tag ] );
			echo '}';
		}
	}
}
?>

<style type="text/css">
/* These style were generated from pwp simplicity theme and can be changed from the customizer */
/* Typography colors */
<?php pwp_print_custom_typography( $theme_mods ); ?>
/* Header styles */
.site-header{<?php pwp_print_custom_styles_for( $_header ); ?>}
.menu-toggle{<?php pwp_print_custom_styles_for( $_nav ); ?>}
/* Main content styles */
.site{<?php pwp_print_custom_styles_for( $_body ); ?>}
.site-content{<?php pwp_print_custom_styles_for( $_content ); ?>}
</style>