<?php
/**
 * Generic card grid section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
$copy       = $args['copy'] ?? array();
$cards      = $args['cards'] ?? array();
?>

<section <?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( theme_section_classes( 'card-grid', $args ) ); ?>">
	<div class="section__inner flow">
		<header class="layout layout--intro">
			<?php if ( ! empty( $copy['title'] ) ) : ?>
				<h2 class="section-heading"><?php echo esc_html( $copy['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $copy['subtitle'] ) ) : ?>
				<p class="section-kicker section-kicker--country"><?php echo esc_html( $copy['subtitle'] ); ?></p>
			<?php endif; ?>
		</header>

		<div class="card-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="card program-card">
					<?php if ( ! empty( $card['image'] ) ) : ?>
						<figure class="card__media">
							<?php theme_render_image( $card['image'], 'card__image' ); ?>
						</figure>
					<?php endif; ?>

					<div class="card__body flow">
						<?php if ( ! empty( $card['meta'] ) ) : ?>
							<p class="card__meta"><?php echo esc_html( $card['meta'] ); ?></p>
						<?php endif; ?>

						<?php if ( ! empty( $card['title'] ) ) : ?>
							<h3 class="card__title"><?php echo esc_html( $card['title'] ); ?></h3>
						<?php endif; ?>

						<?php if ( ! empty( $card['body'] ) ) : ?>
							<p><?php echo esc_html( $card['body'] ); ?></p>
						<?php endif; ?>

						<?php
						if ( ! empty( $card['button'] ) ) {
							theme_render_button( $card['button'], 'button--small' );
						}
						?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
