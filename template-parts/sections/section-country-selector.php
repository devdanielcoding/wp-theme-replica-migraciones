<?php
/**
 * Generic country selector section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
$copy       = $args['copy'] ?? array();
$media      = $args['media'] ?? array();
$items      = $args['items'] ?? array();
?>

<section <?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( theme_section_classes( 'country-selector', $args ) ); ?>">
	<div class="section__inner layout layout--country">
		<div class="country-copy flow">
			<?php if ( ! empty( $media['logo'] ) ) : ?>
				<?php theme_render_image( $media['logo'], 'country-copy__logo' ); ?>
			<?php endif; ?>

			<?php if ( ! empty( $copy['eyebrow'] ) ) : ?>
				<p class="section-kicker"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $copy['title'] ) ) : ?>
				<h2 class="section-heading"><?php echo esc_html( $copy['title'] ); ?></h2>
			<?php endif; ?>

			<div class="section-copy">
				<?php theme_render_text_blocks( $copy['body'] ?? array() ); ?>
			</div>

			<?php if ( ! empty( $copy['note'] ) ) : ?>
				<p class="country-copy__note"><?php echo esc_html( $copy['note'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="country-media">
			<?php theme_render_image( $media['portrait'] ?? array(), 'country-media__portrait' ); ?>
		</div>

		<div class="country-panel">
			<ul class="country-list" aria-label="<?php esc_attr_e( 'Paises disponibles', 'une-wat' ); ?>">
				<?php foreach ( $items as $item ) : ?>
					<li><a href="#contacto"><?php echo esc_html( $item ); ?></a></li>
				<?php endforeach; ?>
			</ul>

			<div class="country-proof">
				<?php if ( ! empty( $media['partner'] ) ) : ?>
					<?php theme_render_image( $media['partner'], 'country-proof__logo' ); ?>
				<?php endif; ?>
				<p><?php echo esc_html( $args['proof'] ?? '' ); ?></p>
			</div>
		</div>
	</div>
</section>
