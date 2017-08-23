<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PWP_Simplicity
 */

if ( ! function_exists( 'pwp_simplicity_site_branding' ) ) :
	/**
	 * display the site branding, logo or site title
	 *
	 * @return string the html for the site's branding
	 */
	function pwp_simplicity_site_branding() {
		$__is_home = ( is_front_page() && is_home() ) ? true : false;

		if ( has_custom_logo() ) the_custom_logo();

		if ( $__is_home ) : ?>
			<h1 class="site-title">
		<?php else : ?>
			<p class="site-title">
		<?php
		endif; ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
		<?php
		if ( $__is_home ) : ?>
			</h1>
		<?php else : ?>
			</p>
		<?php
		endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif;
	}
endif;

if ( ! function_exists( 'pwp_simplicity_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function pwp_simplicity_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'pwp-simplicity' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'pwp-simplicity' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'pwp_simplicity_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pwp_simplicity_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'pwp-simplicity' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'pwp-simplicity' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'pwp-simplicity' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'pwp-simplicity' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'pwp-simplicity' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'pwp-simplicity' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'pwp_simplicity_theme_mod' ) ) :
	/**
	 * get the thememod for out theme
	 *
	 * @return array theme mod or empty array
	 */
	function pwp_simplicity_theme_mod() {
		return get_theme_mod( PWP_Simplicity_Customizer::$mod_name, array() );
	}
endif;

if ( ! function_exists( 'pwp_simplicity_header_overlay' ) ) :
	/**
	 * echo the overlay for the header. Used by the customizer and the header to sho the overlay and update on live preview.
	 *
	 * @return string the html for the header background.
	 */
	function pwp_simplicity_header_overlay() {
		$theme_mod = pwp_simplicity_theme_mod();

		$background_color = ( isset( $theme_mod['header'] )
			&& isset( $theme_mod['header']['background-color'] ) )
			? esc_attr( $theme_mod['header']['background-color'] )
			: '#206Fbb';

		$opacity = ( isset( $theme_mod['header'] )
			&& isset( $theme_mod['header']['opacity'] ) )
			? (float) $theme_mod['header']['opacity']
			: '1';

		echo '<div class="site-header-overlay" style="background-color:'.$background_color.'; opacity:'.$opacity.';"></div>';
	}
endif;

if ( ! function_exists( 'pwp_simplicity_floaval' ) ) :
	/**
	 * return a float values
	 *
	 * @param  string $value          value to be sanitized
	 * @param  object $setting_object the setting object
	 * @return string                 sanitized value
	 */
	function pwp_simplicity_floaval( $value, $setting_object ) {
		return floatval( $value );
	}
endif;