# Plantilla De Desarrollo Declarativo

Esta carpeta es una base reutilizable para construir un theme WordPress clasico a partir de una referencia HTML.

## Flujo

1. Coloca el HTML exportado y sus assets dentro de `referencia/`.
2. Ignora `referencia/` en git, pero usala como fuente principal de analisis.
3. Crea `docs/reference-page-structure.md` con la comprension de la pagina.
4. Relee ese Markdown antes de implementar.
5. Construye `front-page.php` con un arreglo declarativo `$sections`.
6. Renderiza cada bloque con `theme_render_section()`.
7. Usa templates genericos en `template-parts/sections/`.
8. Usa CSS por sistema: tokens, base, layout, components, sections y behaviors.
9. Usa JavaScript vanilla por atributos `data-behavior`.

## Estructura Incluida

```txt
plantilla-desarrollo/
  AGENTS.md
  .gitignore
  README.md
  referencia/
  docs/
  inc/
    template-helpers.php
  template-parts/
    sections/
  assets/
    css/
    js/
    img/
    fonts/
```

## Convencion General

Los helpers usan prefijo `theme_` para que puedas reemplazarlo por el prefijo real del proyecto.

Ejemplo:

```php
theme_render_section( 'parallax', $section );
```
