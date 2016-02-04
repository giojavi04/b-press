# shift-press
Theme base for development in Shift

## Instalación
Para instalar todas las dependencias para constuir el theme basado en foundation ejecutar:
   
    npm install

Esto nos baja foundation y las dependencias gulp que utilizamos en este tema.

## Plugins
Se desactivo la función de plugins necesarios por problemas de testeo pero los plugins comunmente utilizados son:

Requeridos *.

> * [Contact Form 7 *](http://contactform7.com/docs/)
* [Wordpress SEO by Yoast *](https://yoast.com/wordpress/plugins/seo/api/)
* [wpMandrill (a prueba para integrar con contact form) *](https://wordpress.org/plugins/wpmandrill/), [funcional - testeado, pero si hay algún error](https://wordpress.org/support/topic/plugin-wpmandrill-compatiblitity-with-other-plugins)
* [Mailchimp for WordPress](https://mc4wp.com/kb/)
* [Advanced Custom Fiels](http://www.advancedcustomfields.com/resources/)
* [Easy Foundation Shortcodes](https://wordpress.org/plugins/easy-foundation-shortcodes/) 


### Guardar en base al enviar formularios con cf7

Para ello ocupamos un action_hook que provee cf7 y que únicamente se ejecuta al enviar exitosamente el formulario
 
    wpcf7_before_send_mail

El uso de esta función se encuentra documentado en el mismo archivo que se encuentra en:

    functions/save-contact-form.php

*Esta función se incluye únicamente cuando el plugin Contact Form 7 está activado.*

## Configuración del proyecto
Todo el tema se manaja bajo gulp, tanto los scripts como los css de igual manera es completamente flexible para trabajar con foundation o boostrap; en este momento está configurado para foundation( por defecto que ocupamos en Shift), para hacer correr estos scripts simplemente basta con ejecutar:

	gulp watch

- - COPYRIGHT & LICENSE - -

This theme is based on BlankSlate theme