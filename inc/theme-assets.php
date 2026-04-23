<?php
/**
 * Asset loading.
 *
 * @package UNE_WAT
 */

if ( ! function_exists( 'theme_asset_version' ) ) {
	function theme_asset_version( $relative_path ) {
		$file = get_stylesheet_directory() . '/' . ltrim( $relative_path, '/' );

		return file_exists( $file ) ? (string) filemtime( $file ) : wp_get_theme()->get( 'Version' );
	}
}

if ( ! function_exists( 'theme_enqueue_assets' ) ) {
	function theme_enqueue_assets() {
		wp_enqueue_style(
			'une-wat-theme',
			get_stylesheet_directory_uri() . '/assets/css/theme.css',
			array(),
			theme_asset_version( 'assets/css/theme.css' )
		);

		wp_enqueue_script(
			'une-wat-theme',
			get_stylesheet_directory_uri() . '/assets/js/theme.js',
			array(),
			theme_asset_version( 'assets/js/theme.js' ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );
