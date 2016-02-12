# COgroup CMS

Versión estable actual : 1.7.4

## Team

*	[Felipe Camacho](http://www.cogroupsas.com)

## Description

CMS Para uso general en COgroup.

Para la version 1.7 se ha incoporado un tema de administracion.

## IMPORTANTE

- Crear un folder llamado cache si no existe, en la ruta assets\ y darle permisos 777, el sistema guarda archivos cache en ese folder, si no se crea se generará un error.

- Los modelos generados deben ser revisados para evitar relaciones repetidas.

- Los Front y el Back Generados deben ser revisados para verificar la fidelidad de los mismos.

### Futures

-	Se ajustarán los genradores del Front y Back
-	Se generara el menú a partir de los permisos de usuario
-	Instalador para configuración inicial del sitio
-	Inclusión de un nuevo ORM o mejora del actual

### Change Log

1.7.4

-		Actualización de codeigniter a la versión 2.4.1
-		Mejoras pequeñas de código

1.7.3

-		Modificación de los Scripts de beoro para permitir multiples campos de un mismo tipo
-		Modificación del controlador Back_controller: se le adicionad metodos para generar componentes de formulario en formato Beoro.
-		Modulo generador de modelos basado en la base de datos tipo relacional, para darle el formato de Datamapper.
-		Modulo generador de modulos basado en los modelos existentes.
-		Modulo generador de la estructura de la plantilla en el Front-End a partir de la maqueta realizada.
-		Modificación y mejoramiento del Modulo generador de permisos
-		Metodo buil_ajax para cargar información que no requiere las cabeceras.
-		Modificación del metodo join_related de Datamapper para especificar el tipo de relación entre tablas.
-		Modulo generador de Backup de la base de datos del sitio.
-		Se modifico contactos para agregar coordenadas de Google Maps y mapa de Google Maps en el Back-End.
-		Se actualizo la estructura de las tablas de la base de datos.

1.7.2

-   Modulo OAuth para autenticación con redes sociales
-   Modulo de permisos
-   Updating Readme.
-   Agregando guia de usuario.
-   Merge de ajustes y desarrollos de Michael Quevedo.

1.7.1

-   Ajuste de bugs en creación de administradores
-   Ajuste de archivo common.js para la automatización de envio y validacion de formularios con ajax.
-   Updating Readme.

1.7 

-   Nuevo tema de administración basado en Twitter Bootstrap, mejoras y ajuste de algunos Bugs.
-   Alertas de sesión y Ajax automatizadas.
-   Mejores componentes para crear administradores.
-   Ajaxform para envio de formularios automatico.

1.6.2
 
-   Agregando Folders CSS y JS en assets del front.

### Istrucciones de instalación

- Descargar el zip del repositorio.
- Descomprimir en la carpeta del servidor ya sea local o en repositorio.
- En la carpeta docs/modelo se encuentra el archivo script_base_models.sql que deberá ser cargado en una base de datos nueva.
- Abrir el archivo /app/config/database.php y modificar las variables:
``
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'Aca el username de tu servidor MySQL';
	$db['default']['password'] = 'Aca el Password del usuario en tu servidor MySQL';
	$db['default']['database'] = 'Nombre de la base de datos';
``

Listo! el CMS ha sido instalado y esta listo para empezar a trabajar.