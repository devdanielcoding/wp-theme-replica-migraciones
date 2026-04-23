<?php
/**
 * Site header.
 *
 * @package UNE_WAT
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Ir al contenido principal', 'une-wat' ); ?></a>

<header class="site-header">
	<div class="site-header__inner">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'UNE Peru', 'une-wat' ); ?>">
			<img src="<?php echo esc_url( theme_image_url( 'une-logo-mark.png' ) ); ?>" alt="<?php esc_attr_e( 'UNE Peru', 'une-wat' ); ?>">
		</a>

		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'une-wat' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'depth'          => 1,
					)
				);
			} else {
				?>
				<ul class="site-nav__list">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'une-wat' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<a class="site-header__cta" href="#paises"><?php esc_html_e( 'Crea tu cuenta UNE', 'une-wat' ); ?></a>
	</div>
</header>

<main id="main" class="site-main">
