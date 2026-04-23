<?php
/**
 * Generic visual breathing section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
?>

<section <?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( theme_section_classes( 'visual-break', $args ) ); ?>" aria-hidden="true">
	<div class="visual-break__line"></div>
</section>
