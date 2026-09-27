<?php
/**
 * Oqton Tech theme functions.
 *
 * @package oqton-tech
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'OQTON_TECH_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Theme supports.
 */
function oqton_tech_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/extra.css' );
}
add_action( 'after_setup_theme', 'oqton_tech_setup' );

/**
 * Front-end assets.
 */
function oqton_tech_enqueue_assets() {
	wp_enqueue_style(
		'oqton-tech-extra',
		get_theme_file_uri( 'assets/css/extra.css' ),
		array(),
		OQTON_TECH_VERSION
	);

	wp_enqueue_script(
		'oqton-tech-counter',
		get_theme_file_uri( 'assets/js/counter.js' ),
		array(),
		OQTON_TECH_VERSION,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'oqton_tech_enqueue_assets' );

/**
 * Pattern category for the theme's sections.
 */
function oqton_tech_pattern_categories() {
	register_block_pattern_category(
		'oqton',
		array( 'label' => __( 'Oqton Sections', 'oqton-tech' ) )
	);
}
add_action( 'init', 'oqton_tech_pattern_categories' );

/**
 * Block styles used by the patterns.
 */
function oqton_tech_block_styles() {
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'oqton-tech' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'card-hover',
			'label' => __( 'Card (hover lift)', 'oqton-tech' ),
		)
	);
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'eyebrow',
			'label' => __( 'Eyebrow', 'oqton-tech' ),
		)
	);
	register_block_style(
		'core/button',
		array(
			'name'  => 'outline-light',
			'label' => __( 'Outline light', 'oqton-tech' ),
		)
	);
	register_block_style(
		'core/list',
		array(
			'name'  => 'checklist',
			'label' => __( 'Checklist', 'oqton-tech' ),
		)
	);
}
add_action( 'init', 'oqton_tech_block_styles' );

/**
 * Helper for pattern image URLs.
 *
 * @param string $file File name inside assets/images.
 * @return string
 */
function oqton_tech_img( $file ) {
	return esc_url( get_theme_file_uri( 'assets/images/' . $file ) );
}
