<?php
/**
 * PWP Simplicity Theme Customizer
 *
 * @package PWP_Simplicity
 */


add_action( 'customize_register', array( PWP_Simplicity_Customizer::get_inst(), 'init' ) );


/**
*
*/
class PWP_Simplicity_Customizer {

	protected static $inst = NULL;

	protected $mods = array();

	protected $customizer = null;

	public static $mod_name = 'pwp_simplicity_theme_mod';

	public static function get_inst() {
		if ( NULL === self::$inst ) {
			self::$inst = new self;
		}
		return self::$inst;
	}

	function __construct() {}


	public function init( $wp_customize ) {
		$this->customizer = $wp_customize;
		$this->mods = get_theme_mod( self::$mod_name );

		$this->core_options();

		$this->header_customizer();
	}


	public function header_customizer() {
		// 1. register the settings
		$this->customizer->add_setting( self::$mod_name.'[header][background-color]', array(
		  'default' => '#206Fbb',
		  'sanitize_callback' => 'sanitize_hex_color',
		  'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][color]', array(
		  'default' => '#FFFFFF',
		  'sanitize_callback' => 'sanitize_hex_color',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][nav-btn-background-color]', array(
		  'default' => 'transparent',
		  'sanitize_callback' => 'sanitize_hex_color',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][nav-btn-color]', array(
		  'default' => '#FFFFFF',
		  'sanitize_callback' => 'sanitize_hex_color',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][background-opacity]', array(
		  'default' => '1',
		  'sanitize_callback' => array( $this, 'floatvalue' ),
		  'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][width]', array(
		  'default' => '100%',
		  'sanitize_callback' => 'esc_attr',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][max-width]', array(
		  'default' => '100%',
		  'sanitize_callback' => 'esc_attr',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );
		$this->customizer->add_setting( self::$mod_name.'[header][padding]', array(
		  'default' => '0.3em 1em 0.3em 1em',
		  'sanitize_callback' => 'esc_attr',
		  // 'transport' => 'postMessage',
		  'type' => 'theme_mod',
		) );

		// 2. register the section
		$this->customizer->add_section( 'pwp_simplicity_customizer_header', array(
		  'title' => __( 'Simplicity Header' ),
		  'description' => __( 'Control the header settings here.' ),
		  'panel' => '', // Not typically needed.
		  'priority' => 65,
		  'capability' => 'edit_theme_options',
		  'theme_supports' => '', // Rarely needed.
		) );

		// 3. register the controls
		$this->customizer->add_control( new WP_Customize_Color_Control( $this->customizer, self::$mod_name.'[header][background-color]', array(
		  'label' => __( 'Header Background Color', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) ) );
		$this->customizer->add_control( new WP_Customize_Color_Control( $this->customizer, self::$mod_name.'[header][color]', array(
		  'label' => __( 'Header Text Color', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) ) );
		$this->customizer->add_control( new WP_Customize_Color_Control( $this->customizer, self::$mod_name.'[header][nav-btn-background-color]', array(
		  'label' => __( 'Nav Button Background', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) ) );
		$this->customizer->add_control( new WP_Customize_Color_Control( $this->customizer, self::$mod_name.'[header][nav-btn-color]', array(
		  'label' => __( 'Nav Button Color', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) ) );
		$this->customizer->add_control( self::$mod_name.'[header][background-opacity]', array(
			'type' => 'number',
			'input_attrs' => array(
				'min' => '0.1',
				'step' => '0.1',
				'max' => '1',
			),
		  'label' => __( 'Header Background Opacity', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) );
		$this->customizer->add_control( self::$mod_name.'[header][width]', array(
			'type' => 'text',
			'input_attrs' => array(
				'placeholder' => 'use px, em, %, etc..',
			),
		  'label' => __( 'Width', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) );
		$this->customizer->add_control( self::$mod_name.'[header][max-width]', array(
			'type' => 'text',
			'input_attrs' => array(
				'placeholder' => 'use px, em, %, etc..',
			),
		  'label' => __( 'Max Width', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) );
		$this->customizer->add_control( self::$mod_name.'[header][padding]', array(
			'type' => 'text',
			'input_attrs' => array(
				'placeholder' => '0.3em 1em 0.3em 1em',
			),
			'description' => 'Use padding to set the header content width.',
		  'label' => __( 'Padding', 'theme_textdomain' ),
		  'section' => 'pwp_simplicity_customizer_header',
		) );


		// 4. register the partials
		$partial_args = array(
			'selector'        => '.site-header-overlay',
			'render_callback' => 'pwp_simplicity_header_overlay',
			'container_inclusive' => true,
		);
		$this->customizer->selective_refresh->add_partial(
			self::$mod_name.'[header][background-color]',
			$partial_args
		);
		$this->customizer->selective_refresh->add_partial(
			self::$mod_name.'[header][background-opacity]',
			$partial_args
		);
	}

	public function floatvalue( $value, $setting_object ) {
		return floatval( $value );
	}


	public function core_options() {
		$this->customizer->get_setting( 'blogname' )->transport         = 'postMessage';
		$this->customizer->get_setting( 'blogdescription' )->transport  = 'postMessage';
		// $this->customizer->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $this->customizer->selective_refresh ) ) {
			$this->customizer->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => array( $this, 'partial_blogname' ),
			) );
			$this->customizer->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => array( $this, 'partial_blogdescription' ),
			) );
		}
	}

	public function partial_blogname() {
		bloginfo( 'name' );
	}

	public function partial_blogdescription() {
		bloginfo( 'description' );
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pwp_simplicity_customize_preview_js() {
	wp_enqueue_script( 'pwp-simplicity-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pwp_simplicity_customize_preview_js' );
