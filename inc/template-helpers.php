<?php
/**
 * Helpers genericos para render declarativo de secciones.
 *
 * Reemplaza el prefijo `theme_` por el prefijo del proyecto real.
 *
 * @package Theme_Starter
 */

if ( ! function_exists( 'theme_asset_url' ) ) {
	/**
	 * Devuelve una URL a un asset del theme.
	 *
	 * @param string $path Ruta relativa dentro de assets.
	 * @return string
	 */
	function theme_asset_url( $path ) {
		return get_stylesheet_directory_uri() . '/assets/' . ltrim( $path, '/' );
	}
}

if ( ! function_exists( 'theme_image_url' ) ) {
	/**
	 * Devuelve una URL a una imagen dentro de assets/img.
	 *
	 * @param string $filename Nombre del archivo.
	 * @return string
	 */
	function theme_image_url( $filename ) {
		return theme_asset_url( 'img/' . ltrim( $filename, '/' ) );
	}
}

if ( ! function_exists( 'theme_render_button' ) ) {
	/**
	 * Renderiza un boton.
	 *
	 * @param array  $button Datos: label, url.
	 * @param string $class Clase extra opcional.
	 */
	function theme_render_button( $button, $class = '' ) {
		if ( empty( $button['label'] ) || empty( $button['url'] ) ) {
			return;
		}

		printf(
			'<a class="button %3$s" href="%1$s">%2$s</a>',
			esc_url( $button['url'] ),
			esc_html( $button['label'] ),
			esc_attr( $class )
		);
	}
}

if ( ! function_exists( 'theme_render_text_blocks' ) ) {
	/**
	 * Renderiza texto como parrafos.
	 *
	 * @param string|array $text Texto o lista de textos.
	 */
	function theme_render_text_blocks( $text ) {
		$blocks = is_array( $text ) ? $text : array( $text );

		foreach ( $blocks as $block ) {
			if ( '' === trim( (string) $block ) ) {
				continue;
			}

			printf( '<p>%s</p>', esc_html( $block ) );
		}
	}
}

if ( ! function_exists( 'theme_render_section' ) ) {
	/**
	 * Renderiza una seccion por tipo.
	 *
	 * @param string $type Tipo de seccion.
	 * @param array  $args Datos de la seccion.
	 */
	function theme_render_section( $type, $args = array() ) {
		get_template_part( 'template-parts/sections/section', sanitize_key( $type ), $args );
	}
}
