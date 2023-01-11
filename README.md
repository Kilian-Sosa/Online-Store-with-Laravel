# A5.2 - Creación de una plantilla en Laravel

Durante la [UT5](https://sergioelrincon.github.io/dsw/laravel/) vamos a implementar, con Laravel, una tienda online. Dicha aplicación incluirá varias páginas que mantendrán la misma apariencia durante toda la navegación (encabezado, barra de navegación y pie de página). Para ello, vamos a crear una aplicación en Laravel (o reutilizar la que creamos en la actividad anterior) y sobre ella realizar las siguientes tareas:

## Actividad 1
Crear una vista que utilizaremos como plantilla y que se denominará "app.blade.php". Estará alojada en la nueva carpeta "resources/views/layouts/". Para ello tendrás que hacer uso de la directiva "@extends".

El contenido de dicha plantilla será el que se incluye en el fichero adjunto "plantilla.html" (puedes personalizar la apariencia si así lo deseas).

Modifica la vista principal de la aplicación para que se cargue en ella el contenido de dicha plantilla en lugar del contenido actual.

## Actividad 2
Modifica la plantilla "app.blade.php" para que en lugar de mostrarse los textos "Título", "Subtítulo" y "Contenido", se incluyan las siguientes secciones:

- "title", cuyo valor por defecto será "Tienda online".
- "subtitle", cuyo valor por defecto será "Una tienda online Laravel".
- "content".

Modifica la plantilla principal para asignarle contenido a las secciones "title" y "content". Comprueba que se visualiza correctamente.


Haz uso de las directivas "@yield" y "@section".

## Actividad 3
Crea la carpeta "public/css" y en ella aloja el fichero "app.css" adjunto.

Modifica la plantilla "app.blade.php" para incluir el fichero anterior. Al hacer referencia al fichero utiliza el helper "asset".

Incluye también en la plantilla "app.blade.php" el pie de página contenido en el fichero adjunto "footer.html".  Debe estar ubicado entre los comentarios "<!-- footer -->"