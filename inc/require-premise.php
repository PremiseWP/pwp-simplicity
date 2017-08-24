<?php
/**
 * This file requires Premise WP
 *
 * If Premise WP is not active, this file will automatically activate it.
 *
 * @package Premise Demo
 */

if ( ! class_exists( 'Premise_WP' ) ) {

    /**
     * Require the TGM_Plugin_Activation class.
     */
    require_once 'tgm-activation-plugin.php';

    /**
     * Register TGM_Plugin_Activation Hook
     */
    add_action( 'tgmpa_register', 'pwp_simplicity_require_premise' );

    /**
     * This function is hooked into tgmpa_init, which is fired within the
     * TGM_Plugin_Activation class constructor.
     */
    function pwp_simplicity_require_premise() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // Make Premise WP required
            array(
                'name'               => 'Premise WP Plugin',
                'slug'               => 'Premise-WP',
                'source'             => 'https://github.com/PremiseWP/Premise-WP/archive/master.zip',
                'required'           => true,
                'version'            => '2.1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => '',
                'is_callable'        => '',
            ),

            array(
                'name'     => 'Jetpack',
                'slug'     => 'jetpack',
                'required' => true,
            ),

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         */
        $config = array(
            'id'           => 'PWP-Simplicity',
            'default_path' => '',
            'menu'         => 'PWP_Simplicity',
            'parent_slug'  => 'plugins.php',
            'capability'   => 'manage_options',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
        );

        tgmpa( $plugins, $config );
    }
}

?>