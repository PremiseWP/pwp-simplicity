<?php
/**
 * PWP Simplicity Theme Customizer
 *
 * @package PWP_Simplicity
 */

// load this class when the customizer loads
add_action( 'customize_register', array( PWP_Simplicity_Customizer::get_inst(), 'init' ) );

/**
 *	Handles all theme options for the customizer
 */
class PWP_Simplicity_Customizer {

	/**
	 * The name used to save our theme mods
	 *
	 * Static and public so that it can be referenced from outside this class
	 *
	 * @static
	 * @var string
	 */
	public static $mod_name = 'pwp_simplicity_theme_mod';

	/**
	 * holds the theme mods
	 *
	 * @var array
	 */
	private $mods = array();

	/**
	 * holds the wp customizer object
	 *
	 * @var null
	 */
	private $customizer = null;

	/**
	 * will hold the header settings
	 *
	 * @var array
	 */
	private $header_settings = array();

	/**
	 * Will hold the header controls
	 *
	 * @var array
	 */
	private $header_controls = array();

	/**
	 * holds an instance of this class
	 *
	 * @var null
	 */
	private static $inst = NULL;

	/**
	 * instantiate this class
	 *
	 * @return object instance of this class
	 */
	public static function get_inst() {
		if ( NULL === self::$inst ) {
			self::$inst = new self;
		}
		return self::$inst;
	}

	/**
	 * left blank and public on purpose
	 */
	function __construct() {}

	/**
	 * construct our object, register the hook for our js on the customizer preview, and bind sections for the customizer
	 *
	 * @param  object $wp_customize the wp customizer object
	 * @return void                 does not return anything
	 */
	public function init( $wp_customize ) {
		// register the JS for the customizer preview
		add_action( 'customize_preview_init', array( $this, 'preview_js' ) );
		// build our object
		// this functin acts as our construct here
		$this->customizer = $wp_customize;
		$this->mods = get_theme_mod( self::$mod_name );
		// register the header section
		$this->header_section();

		$this->body_section();

		$this->buttons_section();

		$this->typography();
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function preview_js() {
		wp_enqueue_script(
			'pwp-simplicity-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20151215',
			true
		);
	}

	/**
	 * display the header section
	 *
	 * @return void does not return anything
	 */
	protected function header_section() {
		// 1. register the section
		$this->customizer->add_section( 'pwp_simplicity_customizer_header', array(
		  'title'          => __( 'Simplicity Header' ),
		  'description'    => __( 'Control the header settings here.' ),
		  'priority'       => 21,
		  'capability'     => 'edit_theme_options',
		  'panel'          => '', // Not typically needed.
		  'theme_supports' => '', // Rarely needed.
		) );

		// 2. register the settings
		$header_settings = array(
			'header' => array(
				'color' => array(
					'default'           => '#FFFFFF',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'width'     => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'max-width' => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '0.3em 1em 0.3em 1em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				// settings for the overlay
				'background-color' => array(
					'default'           => '#206Fbb',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
					'type'              => 'theme_mod',
				),
				'opacity' => array(
					'default'           => '1',
					'sanitize_callback' => 'pwp_simplicity_floaval',
					'transport'         => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'nav' => array(
				'color' => array(
					'default'           => '#FFFFFF',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
		);
		// add the settings
		$this->_add_settings( $header_settings );

		// 3. register the controls
		$header_controls = array(
			'header' => array(
				'color' => array(
					'type'    => 'color',
				  'label'   => __( 'Header Text Color', 'theme_textdomain' ),
				  'section' => 'pwp_simplicity_customizer_header',
				),
				'background-color' => array(
					'type'    => 'color',
				  'label'   => __( 'Header Background Color', 'theme_textdomain' ),
				  'section' => 'pwp_simplicity_customizer_header',
				),
				'opacity' => array(
					'type'        => 'number',
					'label'       => __( 'Header Background Opacity', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_header',
					'input_attrs' => array(
						'min'  => '0.1',
						'step' => '0.1',
						'max'  => '1',
					),
				),
				'width' => array(
					'type'        => 'text',
					'label'       => __( 'Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_header',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'max-width' => array(
					'type'        => 'text',
					'label'       => __( 'Max Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_header',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'description' => 'Use padding to set the header content width.',
					'label'       => __( 'Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_header',
					'input_attrs' => array(
						'placeholder' => '0.3em 1em 0.3em 1em',
					),
				),
			),
			'nav' => array(
				// 'background-color' => array(
				// 	'type'    => 'color',
				//   'label'   => __( 'Nav Button Background', 'theme_textdomain' ),
				//   'section' => 'pwp_simplicity_customizer_header',
				// ),
				'color' => array(
					'type'    => 'color',
				  'label'   => __( 'Nav Button Color', 'theme_textdomain' ),
				  'section' => 'pwp_simplicity_customizer_header',
				),
			),
		);
		// add the controls
		$this->_add_controls( $header_controls );

		// 4. Optional. Register the partials
		$partial_args = array(
			'selector'        => '.site-header-overlay',
			'render_callback' => 'pwp_simplicity_header_overlay',
			'container_inclusive' => true,
		);
		$header_partials = array(
			'header' => array(
				'background-color' => $partial_args,
				'opacity' => $partial_args,
			),
		);
		$this->_add_partials( $header_partials );
	}

	/**
	 * display the body section
	 *
	 * @return void does not return anything
	 */
	protected function body_section() {
		$this->customizer->add_section( 'pwp_simplicity_customizer_body', array(
		  'title'          => __( 'Simplicity Body' ),
		  'description'    => __( 'Control the body settings here.' ),
		  'priority'       => 22,
		  'capability'     => 'edit_theme_options',
		  'panel'          => '', // Not typically needed.
		  'theme_supports' => '', // Rarely needed.
		) );

		// the body settings
		$body_settings = array(
			'body' => array(
				'width'     => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'max-width' => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '0',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'content' => array(
				'width'     => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'max-width' => array(
					'default'           => '100%',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '0 1em 0 1em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
		);
		$this->_add_settings( $body_settings );

		$body_controls = array(
			'body' => array(
				'width' => array(
					'type'        => 'text',
					'label'       => __( 'Body Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'max-width' => array(
					'type'        => 'text',
					'label'       => __( 'Body Max Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'label'       => __( 'Body Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
			),
			'content' => array(
				'width' => array(
					'type'        => 'text',
					'label'       => __( 'Container Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'max-width' => array(
					'type'        => 'text',
					'label'       => __( 'Container Max Width', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'label'       => __( 'Container Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_body',
					'input_attrs' => array(
						'placeholder' => '0.3em 1em 0.3em 1em',
					),
				),
			),
		);
		// add the controls
		$this->_add_controls( $body_controls );
	}

	/**
	 * display the buttons section
	 *
	 * @return void does not return anything
	 */
	protected function buttons_section() {
		$this->customizer->add_section( 'pwp_simplicity_customizer_buttons', array(
		  'title'          => __( 'Simplicity Buttons' ),
		  'description'    => __( 'Control the styles for the primary and secondary buttons here.' ),
		  'priority'       => 23,
		  'capability'     => 'edit_theme_options',
		  'panel'          => '', // Not typically needed.
		  'theme_supports' => '', // Rarely needed.
		) );

		// the buttons settings
		$this->_add_settings( array(
			'button-primary' => array(
				'background-color'     => array(
					'default'           => '#206fbb',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'color'     => array(
					'default'           => '#fefefe',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'font-size'     => array(
					'default'           => '1em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '1em 1.8em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'button-secondary' => array(
				'background-color'     => array(
					'default'           => '#fc3a00',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'color'     => array(
					'default'           => '#f4f4f4',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'font-size'     => array(
					'default'           => '1em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '1em 1.8em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'button-warning' => array(
				'background-color'     => array(
					'default'           => '#ff5300',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'color'     => array(
					'default'           => '#fefefe',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'font-size'     => array(
					'default'           => '1em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
				'padding' => array(
					'default'           => '1em 1.8em',
					'sanitize_callback' => 'esc_attr',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
		) );

		$this->_add_controls( array(
			'button-primary' => array(
				'background-color' => array(
					'type'        => 'color',
					'label'       => __( 'Primary Button Background Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Primary Button Text Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'font-size' => array(
					'type'        => 'text',
					'label'       => __( 'Primary Button Font Size', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'label'       => __( 'Primary Button Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
			),
			'button-secondary' => array(
				'background-color' => array(
					'type'        => 'color',
					'label'       => __( 'Secondary Button Background Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Secondary Button Text Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'font-size' => array(
					'type'        => 'text',
					'label'       => __( 'Secondary Button Font Size', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'label'       => __( 'Secondary Button Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
			),
			'button-warning' => array(
				'background-color' => array(
					'type'        => 'color',
					'label'       => __( 'Warning Button Background Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Warning Button Text Color', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
				),
				'font-size' => array(
					'type'        => 'text',
					'label'       => __( 'Warning Button Font Size', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, etc..',
					),
				),
				'padding' => array(
					'type'        => 'text',
					'label'       => __( 'Warning Button Padding', 'theme_textdomain' ),
					'section'     => 'pwp_simplicity_customizer_buttons',
					'input_attrs' => array(
						'placeholder' => 'use px, em, %, etc..',
					),
				),
			),
		) );
	}

	/**
	 * display the colors section
	 *
	 * @return void does not return anything
	 */
	protected function typography() {

		$this->_add_settings( array(
			'h1' => array(
				'color'     => array(
					'default'           => '#222222',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'h2' => array(
				'color'     => array(
					'default'           => '#222222',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'h3' => array(
				'color'     => array(
					'default'           => '#333333',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'h4' => array(
				'color'     => array(
					'default'           => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'h5' => array(
				'color'     => array(
					'default'           => '#666666',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'h6' => array(
				'color'     => array(
					'default'           => '#666666',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'p' => array(
				'color'     => array(
					'default'           => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'a' => array(
				'color'     => array(
					'default'           => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
			'li' => array(
				'color'     => array(
					'default'           => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
					// 'transport'      => 'postMessage',
					'type'              => 'theme_mod',
				),
			),
		) );


		$this->_add_controls( array(
			'h1' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 1', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h1</code> tag.',
					'section'     => 'colors',
				),
			),
			'h2' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 2', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h2</code> tag.',
					'section'     => 'colors',
				),
			),
			'h3' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 3', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h3</code> tag.',
					'section'     => 'colors',
				),
			),
			'h4' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 4', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h4</code> tag.',
					'section'     => 'colors',
				),
			),
			'h5' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 5', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h5</code> tag.',
					'section'     => 'colors',
				),
			),
			'h6' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Header 6', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>h6</code> tag.',
					'section'     => 'colors',
				),
			),
			'p' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Paragraphs', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>p</code> tag.',
					'section'     => 'colors',
				),
			),
			'a' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'Links', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>a</code> tag.',
					'section'     => 'colors',
				),
			),
			'li' => array(
				'color' => array(
					'type'        => 'color',
					'label'       => __( 'List Items', 'theme_textdomain' ),
					'description'  => 'The color used for the <code>li</code> tag.',
					'section'     => 'colors',
				),
			),
		) );
	}

	/*
		Private Methods
	 */

	private function _add_settings( $settings_group ) {
		foreach ( $settings_group as $setting => $args ) {
			foreach ($args as $setting_name => $setting_args ) {
				$this->customizer->add_setting( self::$mod_name."[{$setting}][{$setting_name}]", $setting_args );
			}
		}
	}

	private function _add_controls( $controls_group ) {
		foreach ( $controls_group as $control => $args ) {
			foreach ($args as $control_name => $control_args ) {
				if ( 'color' === $control_args['type']
					&& class_exists( 'WP_Customize_Color_Control' ) ) {

					$this->customizer->add_control(
						new WP_Customize_Color_Control(
							$this->customizer,
							self::$mod_name."[{$control}][{$control_name}]",
							$control_args
						)
					);
				}
				else {
					$this->customizer->add_control(
						self::$mod_name."[{$control}][{$control_name}]",
						$control_args
					);
				}
			}
		}
	}

	private function _add_partials( $partials_group ) {
		if ( isset( $this->customizer->selective_refresh ) ) {
			foreach ($partials_group as $partial => $args) {
				foreach ($args as $partial_name => $partial_args) {
					$this->customizer->selective_refresh->add_partial(
						self::$mod_name."[{$partial}][{$partial_name}]",
						$partial_args
					);
				}
			}
		}
	}
}
?>