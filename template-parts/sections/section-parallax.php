<?php
/**
 * Generic parallax section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
$copy       = $args['copy'] ?? array();
$media      = $args['media'] ?? array();
$behavior   = $args['behavior'] ?? '';
$heading    = ( ! empty( $args['variant'] ) && 'hero' === $args['variant'] ) ? 'h1' : 'h2';
?>

<section
	<?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?>
	class="<?php echo esc_attr( theme_section_classes( 'parallax', $args ) ); ?>"
	<?php echo $behavior ? 'data-behavior="' . esc_attr( $behavior ) . '"' : ''; ?>
>
	<div class="parallax-hero">
		<div class="parallax-media">
			<?php theme_render_image( $media['image'] ?? array(), 'parallax-media__image' ); ?>
		</div>
		<div class="parallax-overlay"></div>
		<div class="parallax-copy">
			<?php if ( ! empty( $media['logo'] ) ) : ?>
				<?php theme_render_image( $media['logo'], 'section-logo section-logo--light' ); ?>
			<?php endif; ?>

			<?php if ( ! empty( $copy['eyebrow'] ) ) : ?>
				<p class="section-kicker"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $copy['title'] ) ) : ?>
				<<?php echo esc_html( $heading ); ?> class="section-heading"><?php echo esc_html( $copy['title'] ); ?></<?php echo esc_html( $heading ); ?>>
			<?php endif; ?>

			<?php if ( ! empty( $copy['body'] ) ) : ?>
				<div class="section-copy">
					<?php theme_render_text_blocks( $copy['body'] ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
