<?php
/**
 * Default template.
 *
 * @package UNE_WAT
 */

get_header();
?>

<section class="section section--page">
	<div class="section__inner flow">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		}
		?>
	</div>
</section>

<?php
get_footer();
