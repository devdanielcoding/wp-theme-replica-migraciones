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

		$target = ! empty( $button['target'] ) ? sprintf( ' target="%s"', esc_attr( $button['target'] ) ) : '';
		$rel    = ! empty( $button['rel'] ) ? sprintf( ' rel="%s"', esc_attr( $button['rel'] ) ) : '';

		printf(
			'<a class="button %3$s" href="%1$s"%4$s%5$s>%2$s</a>',
			esc_url( $button['url'] ),
			esc_html( $button['label'] ),
			esc_attr( $class ),
			$target, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			$rel // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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

if ( ! function_exists( 'theme_section_classes' ) ) {
	/**
	 * Construye clases de seccion desde datos declarativos.
	 *
	 * @param string $type Tipo de seccion.
	 * @param array  $args Datos de seccion.
	 * @return string
	 */
	function theme_section_classes( $type, $args = array() ) {
		$classes = array( 'section', 'section--' . sanitize_html_class( $type ) );

		if ( ! empty( $args['variant'] ) ) {
			$classes[] = 'section--' . sanitize_html_class( $args['variant'] );
		}

		if ( ! empty( $args['class'] ) ) {
			$classes[] = sanitize_html_class( $args['class'] );
		}

		return implode( ' ', array_filter( $classes ) );
	}
}

if ( ! function_exists( 'theme_render_image' ) ) {
	/**
	 * Renderiza una imagen migrada.
	 *
	 * @param array  $image Datos: file, alt, class, loading.
	 * @param string $class Clase extra opcional.
	 */
	function theme_render_image( $image, $class = '' ) {
		if ( empty( $image['file'] ) ) {
			return;
		}

		$classes = trim( ( $image['class'] ?? '' ) . ' ' . $class );
		$loading = $image['loading'] ?? 'lazy';

		printf(
			'<img src="%1$s" alt="%2$s" class="%3$s" loading="%4$s">',
			esc_url( theme_image_url( $image['file'] ) ),
			esc_attr( $image['alt'] ?? '' ),
			esc_attr( $classes ),
			esc_attr( $loading )
		);
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
