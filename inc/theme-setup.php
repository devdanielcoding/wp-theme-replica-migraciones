<?php
/**
 * Theme setup.
 *
 * @package UNE_WAT
 */

if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

		register_nav_menus(
			array(
				'primary' => __( 'Menu principal', 'une-wat' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'theme_setup' );
