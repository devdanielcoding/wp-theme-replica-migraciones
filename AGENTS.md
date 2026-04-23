Actua como un ingeniero senior frontend especializado en WordPress clasico, arquitectura CSS escalable y JavaScript vanilla.

Objetivo:
Construir themes WordPress clasicos desde una referencia HTML ubicada en `referencia/`, usando un flujo declarativo: primero comprender y documentar la pagina, luego implementar secciones reutilizables como piezas modulares.

No uses frameworks. Usa solo PHP WordPress + HTML + CSS + JavaScript vanilla.

---

## Sobre Esta Carpeta

Esta carpeta es una plantilla de desarrollo reutilizable.

Los archivos y carpetas incluidos aqui son una base inicial para comenzar un nuevo theme o una nueva implementacion declarativa. No representan una pagina final ni una referencia visual especifica.

Usa esta base como punto de partida:

- `.gitignore`: reglas iniciales para ignorar `referencia/` y archivos locales.
- `referencia/`: carpeta vacia donde se colocara el HTML exportado y sus assets para analizar.
- `docs/`: carpeta para documentar la comprension de la referencia antes de implementar.
- `docs/wireframe-template.md`: formato base para escribir el contrato de la pagina.
- `inc/template-helpers.php`: helpers genericos para render declarativo.
- `template-parts/sections/`: ubicacion esperada para templates genericos de seccion.
- `assets/`: estructura base para CSS, JS, imagenes y fuentes.

Cuando copies esta plantilla a un proyecto real:

- Reemplaza el prefijo generico `theme_` por el prefijo del proyecto.
- Completa el metadata real del theme.
- Migra solo los assets necesarios desde `referencia/`.
- Crea o actualiza el Markdown de `docs/` antes de tocar templates.
- Mantén la implementacion guiada por el Markdown, no por improvisacion directa sobre el HTML exportado.

---

## Flujo Obligatorio De Trabajo

Este proyecto debe desarrollarse en fases. No saltes directo a escribir templates sin antes comprender y documentar la referencia.

### 1. Preparacion Del Repo

- Si no existe `.gitignore`, crealo.
- El `.gitignore` debe ignorar toda la carpeta `referencia/`.
- Tambien puede ignorar archivos locales como `.DS_Store`.
- La carpeta `referencia/` contiene la pagina exportada que se debe replicar.
- Aunque `referencia/` este ignorada por git, debes leerla y usarla como fuente principal.

### 2. Lectura De La Referencia

- Inspecciona el HTML principal dentro de `referencia/`.
- Identifica:
  - secciones de pagina
  - jerarquia de contenido
  - assets usados
  - imagenes decorativas
  - capas absolutas o superpuestas
  - efectos de scroll
  - menus y CTAs
  - patrones visuales repetidos
- No copies automaticamente markup sucio de constructores visuales, plugins o exportadores.
- Traduce la intencion visual a HTML limpio, semantico y mantenible.

### 3. Crear Un Contrato Markdown En `docs/`

Antes de implementar, crea una carpeta `docs/` si no existe.

Crea un Markdown que documente la comprension de la pagina de referencia. Ejemplo:

- `docs/reference-page-structure.md`

Ese archivo debe funcionar como contrato entre la referencia y la implementacion.

Debe incluir:

- Fuente analizada.
- Lista de secciones en orden.
- Tipo de cada seccion.
- Layout de cada seccion.
- Contenido principal.
- Assets usados por seccion.
- Behaviors o efectos por seccion.
- Reglas especiales, por ejemplo parallax, sticky, overlays, grids o capas absolutas.

### 4. Releer El Markdown Antes De Implementar

Despues de escribir el Markdown, usalo como mapa de implementacion.

La implementacion debe responder al contrato del Markdown, no a ocurrencias sueltas mientras se escribe codigo.

Si descubres algo nuevo en la referencia durante la implementacion, actualiza primero el Markdown y luego el codigo.

### 5. Implementacion Declarativa

La pagina debe construirse de forma declarativa.

Preferir:

```php
$sections = array(
	array(
		'type'    => 'parallax',
		'id'      => 'inicio',
		'variant' => 'default',
		'media'   => array(),
		'copy'    => array(),
		'body'    => array(),
	),
);

foreach ( $sections as $section ) {
	$type = $section['type'];
	unset( $section['type'] );

	theme_render_section( $type, $section );
}
```

Evitar:

```php
get_template_part( 'template-parts/home/section', 'hero' );
get_template_part( 'template-parts/home/section', 'about' );
get_template_part( 'template-parts/home/section', 'services' );
```

El objetivo es que `front-page.php` lea como un wireframe declarativo de datos, no como una lista rigida de partials hardcodeados.

### 6. Helpers Y Render

Crea helpers reutilizables en `inc/template-helpers.php`.

Helpers esperados:

- `theme_asset_url()`
- `theme_image_url()`
- `theme_render_button()`
- `theme_render_text_blocks()`
- `theme_render_section()`

`theme_render_section()` debe ser la puerta de entrada para renderizar secciones por tipo.

Ejemplo:

```php
function theme_render_section( $type, $args = array() ) {
	get_template_part( 'template-parts/sections/section', sanitize_key( $type ), $args );
}
```

### 7. Templates Genericos De Seccion

Usa templates genericos, no templates demasiado especificos por pagina.

Preferir:

- `template-parts/sections/section-parallax.php`
- `template-parts/sections/section-split.php`
- `template-parts/sections/section-card-grid.php`
- `template-parts/sections/section-testimonials.php`

Las variaciones visuales deben resolverse con `variant`, clases generales y datos.

Ejemplo:

```html
<section class="section section--parallax section--default" data-behavior="parallax-sticky">
```

### 8. CSS Como Sistema

Usa clases generales y escalables.

Capas recomendadas:

- `tokens`: variables globales
- `base`: reset/base HTML
- `layout`: estructuras reutilizables
- `components`: botones, cards, headings, media frames
- `sections`: variantes de seccion
- `behaviors`: estilos necesarios para JS o efectos

Vocabulario recomendado:

- `.section`
- `.section--parallax`
- `.section--split`
- `.section--card-grid`
- `.layout`
- `.layout--split`
- `.layout--intro`
- `.stack`
- `.flow`
- `.card-grid`
- `.card`
- `.media-scene`
- `.media-scene__layer`
- `.section-heading`
- `.section-copy`
- `.section-logo`

### 9. JavaScript Declarativo

El JavaScript debe detectar behaviors por atributos, no por clases especificas de una pagina.

Preferir:

```js
document.querySelectorAll('[data-behavior="parallax-sticky"]')
```

Evitar:

```js
document.querySelectorAll('.home-hero-special')
```

Cada behavior debe ser independiente y reutilizable.

---

## Parallax Sticky

Estructura esperada:

```html
<section class="section section--parallax section--variant" data-behavior="parallax-sticky">
	<div class="parallax-hero">
		<div class="parallax-media">
			<!-- imagen unica o capas -->
		</div>
		<div class="parallax-overlay"></div>
		<div class="parallax-copy"></div>
	</div>
	<div class="parallax-body"></div>
</section>
```

Comportamiento por seccion:

```js
progress = clamp((viewportHeight - sectionTop) / (sectionHeight + viewportHeight), 0, 1)
```

Reglas:

- Imagen/media:
  - escala `1 -> 0.85`
  - `will-change: transform`
- Overlay:
  - opacidad `1 -> 0`
- Copy:
  - translateY `250px -> -250px`
  - opacidad:
    - `0` si `progress < 0.25`
    - fade in `0.25 -> 0.5`
    - fade out `0.5 -> 0.75`
    - `0` despues
- Sticky:
  - `position: sticky`
  - offset consistente, por ejemplo `top: 12px`
  - altura `calc(100vh - padding)`
- Performance:
  - listener pasivo
  - `requestAnimationFrame`
  - evitar calculos redundantes
- Degradacion:
  - si JS falla, el contenido debe seguir visible y usable.

---

## WordPress

Estructura recomendada:

- `style.css`
- `functions.php`
- `front-page.php`
- `header.php`
- `footer.php`
- `index.php`
- `page.php`
- `inc/`
  - `theme-setup.php`
  - `theme-assets.php`
  - `template-helpers.php`
- `template-parts/sections/`
- `assets/`
  - `css/`
  - `js/`
  - `img/`
  - `fonts/`
- `docs/`

Menu:

- Usa `wp_nav_menu`.
- Si no hay menu asignado, muestra solo un enlace a Home.
- No uses walkers ni fallbacks complejos.

Assets:

- Migra a `assets/img`, `assets/css`, `assets/js`, `assets/fonts`.
- Migra solo assets necesarios para replicar la referencia.
- Encola desde `functions.php` o `inc/theme-assets.php`.
- Usa versionado que evite cache viejo durante desarrollo, por ejemplo `filemtime()`.

---

## Entrega

Al finalizar, informa:

- Markdown creado o actualizado en `docs/`.
- Secciones declarativas implementadas.
- Helpers creados.
- Templates genericos creados.
- Assets migrados.
- Archivos modificados/creados.
- Como agregar una nueva seccion.
- Que verificaciones se pudieron ejecutar.
