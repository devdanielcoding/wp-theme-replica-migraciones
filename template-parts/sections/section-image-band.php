<?php
/**
 * Generic image band section.
 *
 * @package UNE_WAT
 */

$section_id = $args['id'] ?? '';
$media      = $args['media'] ?? array();
?>

<section <?php echo $section_id ? 'id="' . esc_attr( $section_id ) . '"' : ''; ?> class="<?php echo esc_attr( theme_section_classes( 'image-band', $args ) ); ?>">
	<?php theme_render_image( $media['image'] ?? array(), 'image-band__image' ); ?>
</section>
