<?php
/**
 * Declarative front page.
 *
 * @package UNE_WAT
 */

get_header();

$sections = array(
	array(
		'type'     => 'parallax',
		'id'       => 'inicio',
		'variant'  => 'hero',
		'behavior' => 'parallax-sticky',
		'media'    => array(
			'image' => array(
				'file'    => 'hero-adventure.jpg',
				'alt'     => '',
				'loading' => 'eager',
			),
			'logo'  => array(
				'file' => 'une-wat-white.png',
				'alt'  => 'UNE Work and Travel',
			),
		),
		'copy'     => array(
			'title' => 'Unete a nosotros para celebrar la esencia de la aventura.',
		),
	),
	array(
		'type'    => 'split',
		'id'      => 'manifiesto',
		'variant' => 'manifesto',
		'copy'    => array(
			'eyebrow' => 'Cada momento importa.',
			'title'   => 'Sentimos alegria cuando las personas se reunen, descubren y valoran el mundo, mientras se conectan con su verdadero ser.',
			'body'    => array(
				'Se trata de una nueva generacion intrepida de aventureros: buscadores, curiosos y viajeros amantes de la naturaleza que no pueden quedarse quietos.',
				'Damos la bienvenida a esas almas valientes que desean explorar nuevos caminos, escalar montanas y descubrir senderos ocultos, mientras desarrollan habilidades y contribuyen a las comunidades que los reciben.',
				'Al transformar vidas una a una, inspiramos a todos a lanzarse de lleno en experiencias significativas e inolvidables.',
			),
		),
		'media'   => array(
			'badge'   => array(
				'file' => 'work-travel-title.jpg',
				'alt'  => 'Viaja y trabaja en USA',
			),
			'poster'  => array(
				'file' => 'story-video-poster.jpg',
				'alt'  => 'Aventura Work and Travel',
			),
			'sidebar' => array(
				'file' => 'california-portrait.jpg',
				'alt'  => 'California',
			),
		),
	),
	array(
		'type'    => 'visual-break',
		'id'      => 'respiro',
		'variant' => 'dark',
	),
	array(
		'type'    => 'image-band',
		'id'      => 'viaje',
		'variant' => 'wide',
		'media'   => array(
			'image' => array(
				'file' => '11062b_8061361380944d9d919879b25e3dcd1bf000.jpg',
				'alt'  => 'Experiencia Work and Travel USA',
			),
		),
	),
	array(
		'type'    => 'card-grid',
		'id'      => 'programas',
		'variant' => 'programs',
		'copy'    => array(
			'title'    => 'Para comenzar la aventura, contamos con diferentes programas.',
			'subtitle' => 'Estados Unidos de America',
		),
		'cards'   => array(
			array(
				'title' => 'Work & Travel',
				'meta'  => '100% online',
				'image' => array(
					'file' => 'program-work-travel.jpg',
					'alt'  => 'Work and Travel USA',
				),
				'body'  => '+18. Para estudiantes peruanos que cursan del 1 al 10 ciclo en universidades e institutos autorizados. Puedes viajar con amigos, conseguir trabajo o recibir ayuda; tu ingles no tiene que ser perfecto.',
			),
			array(
				'title'  => 'Camp Counselor',
				'meta'   => 'Crea tu cuenta en unework.com',
				'image'  => array(
					'file' => 'program-camp.jpg',
					'alt'  => 'Camp Counselor USA',
				),
				'body'   => '+18. Puedes estar estudiando o no. Requiere evaluacion personal en nuestras oficinas en Lima, Peru.',
				'button' => array(
					'label' => 'Crear cuenta',
					'url'   => 'https://unework.com',
				),
			),
			array(
				'title' => 'Internship',
				'meta'  => 'Experiencia profesional',
				'image' => array(
					'file' => 'program-internship.jpg',
					'alt'  => 'Internship USA',
				),
				'body'  => '+18. Para estudiantes o egresados recientes que buscan mas experiencia. Si terminaste tu carrera, aplica dentro del primer ano.',
			),
			array(
				'title' => 'Training',
				'meta'  => 'Hasta 18 meses',
				'image' => array(
					'file' => 'program-training.jpg',
					'alt'  => 'Training USA',
				),
				'body'  => '+18. Si estas por terminar tus estudios, aplica temprano. Podras vivir y realizar practicas remuneradas en USA por hasta 18 meses.',
			),
		),
	),
	array(
		'type'     => 'parallax',
		'id'       => 'cultura',
		'variant'  => 'culture',
		'behavior' => 'parallax-sticky',
		'media'    => array(
			'image' => array(
				'file' => 'culture-california.jpg',
				'alt'  => 'California en invierno',
			),
		),
		'copy'     => array(
			'eyebrow' => 'Cultura',
			'title'   => 'Aventura para cada temporada',
			'body'    => array( '32F - 5F California' ),
		),
	),
	array(
		'type'    => 'country-selector',
		'id'      => 'paises',
		'variant' => 'dark',
		'copy'    => array(
			'eyebrow' => 'UNE Peru',
			'title'   => 'Desconectate para conectar',
			'body'    => array(
				'UNE te invita a desacelerar y a involucrarte con lo que realmente importa: tu entorno, tu interior y las personas con quienes compartes el viaje.',
				'Camina en la naturaleza, muevete con intencion, siente cada momento. La vida real te esta llamando... y es hermosa.',
			),
			'note'    => 'Espera. Para comenzar la aventura, selecciona tu pais.',
		),
		'media'   => array(
			'logo'    => array(
				'file' => 'une-wat-horizontal.png',
				'alt'  => 'UNE Work and Travel',
			),
			'portrait' => array(
				'file' => 'disconnect-portrait.jpg',
				'alt'  => 'Viajeras UNE',
			),
			'partner' => array(
				'file' => 'partner-logo.jpg',
				'alt'  => 'Partner',
			),
		),
		'items'   => array( 'USA', 'Peru', 'Argentina', 'Ecuador', 'Chile', 'Mexico' ),
		'proof'   => 'une, representante por mas de 25 anos',
	),
);

foreach ( $sections as $section ) {
	$type = $section['type'];
	unset( $section['type'] );

	theme_render_section( $type, $section );
}

get_footer();
