# B-Press
Theme base for development in wordpress

## Tecnologías
* Html5
* Css3
* Php
* Webpack
* Laravel mix
* Sass
* Responsive Design
* Multipropósito

## Plugins
Se desactivo la función de plugins necesarios por problemas de testeo pero los plugins comunmente utilizados son:

Requeridos *.

* [Contact Form 7 *](http://contactform7.com/docs/)
* [Wordpress SEO by Yoast *](https://yoast.com/wordpress/plugins/seo/api/)
* [sendgrid *](https://wordpress.org/plugins/sendgrid-email-delivery-simplified/)
* [Mailchimp for WordPress](https://mc4wp.com/kb/)
* [Advanced Custom Fiels](http://www.advancedcustomfields.com/resources/)


### Guardar en base al enviar formularios con cf7

Para ello ocupamos un action_hook que provee cf7 y que únicamente se ejecuta al enviar exitosamente el formulario
 
    wpcf7_before_send_mail

El uso de esta función se encuentra documentado en el mismo archivo que se encuentra en:

    functions/save-contact-form.php

* Esta función se incluye únicamente cuando el plugin Contact Form 7 está activado.*

## Instalación
Para instalar todas las dependencias para constuir el tema basado en foundation ejecutar:
   
    yarn install

Esto nos baja foundation y las dependencias webpack que utilizamos en este tema.

## Configuración del proyecto

Es totalmente flexible para trabajar con cualquier framework css, tan solo cambiar la importación en:
	
	resources/assets/main.scss

tenemos foundation de forma predeterminada, para arrancar la configuración corremos:
	
	cp -r node_modules/laravel-mix/setup/** ./

dentro de los archivos que se generan tras ejecutar el comando anterior, copiamos la configuración del archivo `webpack-example.mix.js` en `webpack.mix.js` y canfigurar si tienes cambios sino dejarlo así, y para empezar el desarrollo ejecutamos:
	
	yarn dev

tenemos una serie de comandos disponibles para los diferentes entornos que podemos encontrar en `package.json`

####- - COPYRIGHT & LICENSE - -

This theme is based on BlankSlate theme