# Estructura De Pagina De Referencia

Fuente analizada: `referencia/Work and Travel USA - Peru.html`

La referencia es un export de Wix de `https://www.uneperu.com/`. El HTML contiene markup, scripts y controles propios de Wix, por lo que la implementacion debe traducir la intencion visual a un theme WordPress clasico con PHP, HTML semantico, CSS y JavaScript vanilla.

## Header

- Tipo: header fijo/transparente sobre fondo oscuro.
- Logo: isotipo UNE Peru (`c64658_171065454bd849cf9078e5364fea79d1~mv2.png`).
- Menu: navegacion simple hacia secciones de la pagina.
- CTA: "Crea tu cuenta UNE", replica del login social bar de Wix como enlace/boton.

## Secciones En Orden

### 1. Hero De Aventura

- Tipo: `parallax`.
- Variante: `hero`.
- Behavior: `parallax-sticky`.
- Layout: media full-bleed con imagen/video poster, overlay oscuro, texto grande superpuesto y logo WAT blanco.
- Contenido principal: "Unete a nosotros para celebrar la esencia de la aventura."
- Assets:
  - `c64658_0f8005bca56c459aa048a63477dc1c51f000.jpg` como poster/hero.
  - `blanco_edited.png` como logo Work and Travel blanco.
- Reglas especiales: el export usa video remoto Wix; se replica con imagen poster local para evitar dependencia externa.

### 2. Manifiesto + Media

- Tipo: `split`.
- Variante: `manifesto`.
- Layout: intro centrado, imagen titular "Viaja y trabaja en USA", media/video poster y columna de texto.
- Contenido principal:
  - "Sentimos alegria cuando las personas se reunen, descubren y valoran el mundo..."
  - "Cada momento importa."
  - "Transformando el mundo, una vida a la vez."
- Assets:
  - `_edited.jpg`
  - `c64658_f00416a780714c4db454f166547b0507f000.jpg`
  - `cali 137.jpg`
- Behaviors: el video embebido de Wix se degrada a poster visual con boton de play decorativo.

### 3. Separador Visual

- Tipo: `visual-break`.
- Variante: `dark`.
- Layout: respiracion vertical oscura entre manifiesto y programas.
- Assets: ninguno.

### 4. Imagen Panoramica

- Tipo: `image-band`.
- Variante: `wide`.
- Layout: imagen horizontal full-width.
- Assets:
  - `11062b_8061361380944d9d919879b25e3dcd1bf000.jpg`

### 5. Programas USA

- Tipo: `card-grid`.
- Variante: `programs`.
- Layout: encabezado centrado, pais destacado y cuatro cards en grilla.
- Contenido principal:
  - "Para comenzar la aventura, contamos con diferentes programas."
  - "Estados Unidos de America."
  - Programas: Work & Travel, Camp Counselor, Internship, Training.
- Assets:
  - `c64658_0f82e424f1c44aba9c862669c381baba~mv2.jpg`
  - `paracas stefano 136_edited.jpg`
  - `c64658_e0cfa91ac930481287068d9eab860644~mv2.jpg`
  - `paracas stefano 221_edited.jpg`
- Reglas especiales: el texto mezcla espanol e ingles; mantener tono de referencia pero limpiar errores obvios de espaciado.

### 6. Cultura / Temporadas

- Tipo: `parallax`.
- Variante: `culture`.
- Behavior: `parallax-sticky`.
- Layout: imagen panoramica con overlay oscuro y copy editorial superpuesto.
- Contenido principal:
  - "Cultura"
  - "32F - 5F California"
  - "Aventura para cada temporada"
- Assets:
  - `c64658_107ef066046c4452913de037a5a42c67f000.jpg`

### 7. Desconexion + Selector De Pais

- Tipo: `country-selector`.
- Variante: `dark`.
- Layout: bloque editorial con logo, texto, portrait lateral, selector de paises y sello de representante.
- Contenido principal:
  - "UNE Peru"
  - "Desconectate para conectar"
  - paises: USA, Peru, Argentina, Ecuador, Chile, Mexico.
  - "une, representante de ... por mas de 25 anos"
- Assets:
  - `LOGO UNE WAT HORIZONTAL NEGRO_edited.png`
  - `c64658_a00ed705ac1e4089ba1a01095040c20ff001.jpg`
  - `Screenshot 2025-09-19 at 11_03_edited_jp.jpg`

### 8. Footer

- Tipo: footer global.
- Layout: columnas de links y bloque de contacto.
- Contenido:
  - Larga Duracion: Internship/Training USA, Teaching USA, Culinary Australia, Au Pair.
  - Mas Solicitados: Work and Travel USA, Work and Travel Australia, Work and Travel New Zealand, Camp Leader USA.
  - Emails: `international@unework.com`, `info@uneperu.com`.
  - Contacto y WhatsApp oficial.

## Behaviors

- `parallax-sticky`: calcula progreso con `clamp((viewportHeight - sectionTop) / (sectionHeight + viewportHeight), 0, 1)`.
- Media: escala `1 -> 0.85`.
- Overlay: opacidad `1 -> 0`.
- Copy: translateY `250px -> -250px` con fade in/out entre 0.25 y 0.75.
- Degradacion: sin JS, el contenido permanece visible.

## Assets A Migrar

- Imagenes hero, logos, posters, cards de programa, banner cultura y partner.
- No migrar scripts Wix, analytics, polyfills, controles de video ni CSS generado.
- Fuentes: usar stack local del theme; la referencia usa Poppins/Outfit pero no requiere dependencias externas.

## Notas De Implementacion

- `front-page.php` debe funcionar como wireframe declarativo.
- Las secciones se renderizan con `theme_render_section()`.
- Templates genericos esperados:
  - `section-parallax.php`
  - `section-split.php`
  - `section-visual-break.php`
  - `section-image-band.php`
  - `section-card-grid.php`
  - `section-country-selector.php`
- CSS por capas en `assets/css/theme.css`: tokens, base, layout, components, sections y behaviors.
- JS vanilla en `assets/js/theme.js`, detectando behaviors por `data-behavior`.
