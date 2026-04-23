<?php
/**
 * Site footer.
 *
 * @package UNE_WAT
 */
?>
</main>

<footer class="site-footer" id="contacto">
	<div class="site-footer__inner">
		<div class="site-footer__brand">
			<img src="<?php echo esc_url( theme_image_url( 'une-wat-horizontal.png' ) ); ?>" alt="<?php esc_attr_e( 'UNE Work and Travel', 'une-wat' ); ?>">
			<p><?php esc_html_e( 'Work and Travel USA con UNE permite a estudiantes vivir una temporada de trabajo, viaje y aprendizaje cultural.', 'une-wat' ); ?></p>
		</div>

		<div class="site-footer__column">
			<h2><?php esc_html_e( 'Larga Duracion', 'une-wat' ); ?></h2>
			<ul>
				<li><a href="#programas"><?php esc_html_e( 'Internship/Training USA', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Teaching USA', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Culinary Australia', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Au Pair USA', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Au Pair Alemania', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Au Pair China', 'une-wat' ); ?></a></li>
			</ul>
		</div>

		<div class="site-footer__column">
			<h2><?php esc_html_e( 'Mas Solicitados', 'une-wat' ); ?></h2>
			<ul>
				<li><a href="#programas"><?php esc_html_e( 'Work and Travel USA', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Work and Travel Australia', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Work and Travel New Zealand', 'une-wat' ); ?></a></li>
				<li><a href="#programas"><?php esc_html_e( 'Camp Leader USA', 'une-wat' ); ?></a></li>
			</ul>
		</div>

		<div class="site-footer__column site-footer__contact">
			<h2><?php esc_html_e( 'Contacto', 'une-wat' ); ?></h2>
			<p><a href="mailto:international@unework.com">international@unework.com</a></p>
			<p><a href="mailto:info@uneperu.com">info@uneperu.com</a></p>
			<p><?php esc_html_e( 'El proceso del programa Work and Travel USA es 100% online.', 'une-wat' ); ?></p>
			<p><?php esc_html_e( 'Para los Programas Camp, registrate en unework.com.', 'une-wat' ); ?></p>
			<p><?php esc_html_e( 'WhatsApp oficial UNEPERU: +1 (555) 832-2828', 'une-wat' ); ?></p>
			<a class="site-footer__claim" href="#"><?php esc_html_e( 'Libro de Reclamaciones', 'une-wat' ); ?></a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
