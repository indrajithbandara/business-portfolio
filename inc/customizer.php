<?php
/**
 * _businessportfolio Theme Customizer.
 *
 * @package _businessportfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _businessportfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '_businessportfolio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _businessportfolio_customize_preview_js() {
	wp_enqueue_script( '_businessportfolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '_businessportfolio_customize_preview_js' );

/**
 * Add the theme configuration
 */
_businessportfolio_Kirki::add_config( '_businessportfolio_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add the typography section
 */
_businessportfolio_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'businessportfolio' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the body-typography control
 */
_businessportfolio_Kirki::add_field( '_businessportfolio_theme', array(
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_attr__( 'Body Typography', 'businessportfolio' ),
	'description' => esc_attr__( 'Select the main typography options for your site.', 'businessportfolio' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'businessportfolio' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => 'body',
		),
	),
) );

/**
 * Add the body-typography control
 */
_businessportfolio_Kirki::add_field( '_businessportfolio_theme', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'businessportfolio' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'businessportfolio' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'businessportfolio' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );


/* sample kirki codes
_businessportfolio_Kirki::add_section( 'custom_css', array(
    'title'          => __( 'Custom CSS' ),
    'description'    => __( 'Add custom CSS here' ),
    'panel'          => 'test', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

_businessportfolio_Kirki::add_panel( 'test', array(
    'priority'    => 10,
    'title'       => __( 'My Title', 'textdomain' ),
    'description' => __( 'My Description', 'textdomain' ),
) );

_businessportfolio_Kirki::add_field( 'my_config', array(
	'settings' => 'my_setting',
	'label'    => __( 'My custom control', 'translation_domain' ),
	'section'  => 'custom_css',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'some-default-value',
) );

// used to display values in frontend
// $value = get_theme_mod( 'my_setting', 'default_valuess' );
*/
