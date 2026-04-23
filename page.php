<?php
/**
 * Page template.
 *
 * @package UNE_WAT
 */

get_header();
?>

<section class="section section--page">
	<div class="section__inner flow">
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h1>', '</h1>' );
			the_content();
		}
		?>
	</div>
</section>

<?php
get_footer();
