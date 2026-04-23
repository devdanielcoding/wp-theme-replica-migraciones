<?php
/**
 * Generic split section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
$copy       = $args['copy'] ?? array();
$media      = $args['media'] ?? array();
?>

<section <?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( theme_section_classes( 'split', $args ) ); ?>">
	<div class="section__inner layout layout--split">
		<div class="split-media">
			<?php if ( ! empty( $media['badge'] ) ) : ?>
				<?php theme_render_image( $media['badge'], 'split-media__badge' ); ?>
			<?php endif; ?>

			<?php if ( ! empty( $media['poster'] ) ) : ?>
				<figure class="video-card">
					<?php theme_render_image( $media['poster'], 'video-card__poster' ); ?>
					<span class="video-card__button" aria-hidden="true"></span>
				</figure>
			<?php endif; ?>

			<?php if ( ! empty( $media['sidebar'] ) ) : ?>
				<?php theme_render_image( $media['sidebar'], 'split-media__portrait' ); ?>
			<?php endif; ?>
		</div>

		<div class="split-copy flow">
			<?php if ( ! empty( $copy['eyebrow'] ) ) : ?>
				<p class="section-kicker"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $copy['title'] ) ) : ?>
				<h2 class="section-heading"><?php echo esc_html( $copy['title'] ); ?></h2>
			<?php endif; ?>

			<div class="section-copy">
				<h3><?php esc_html_e( 'Transformando el mundo, una vida a la vez!', 'une-wat' ); ?></h3>
				<?php theme_render_text_blocks( $copy['body'] ?? array() ); ?>
			</div>
		</div>
	</div>
</section>
