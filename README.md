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

# A5.3 - Creación de un controlador y de las páginas principal y 'about'
En esta actividad vamos a crear dos nuevas páginas: Una página principal asociada a la ruta "/" y una página titulada "Acerca de". Ambas páginas deberán estar accesibles a través de los enlaces del menú principal.

## Página principal
Añade a tu aplicación la carpeta "/public/img" y copia en ella las imágenes adjuntas.

Crea la carpeta "/resources/views/home" y dentro de ella añade una vista que contendrá la nueva página principal de nuestra aplicación: "index.blade.php". Su contenido será el del fichero "index.php" adjunto, teniendo en cuenta que las rutas de las imágenes las deberás sustituir por las rutas absolutas (para construir las rutas utiliza el helper "asset") y que el título deberás sustituirlo por una string que tendrás que pasar a través de una función anónima definida en el router ("/").

## Página 'acerca de'
Crea, en la carpeta "/resources/views/home", la vista "about.blade.php", e incluye en ella el código contenido en el fichero adjunto "about.php". Para acceder a esta nueva página, crea un nuevo controlador (utilizando artisan) denominado "HomeController". En dicho controlador deberás implementar el método "about" que devolverá la vista correspondiente con las asignaciones de variables necesarias para que la página se muestre correctamente.

## Helper 'now'
Utiliza el helper "now" para mostrar, en el pie de página, la fecha y la hora actuales

## Helper 'route'
Utiliza el helper "route" para enlazar, en el encabezado, las dos nuevas páginas utilizando los nombres de sus rutas, en lugar de utilizar una string.

# A5.4 - Listado de productosEn esta actividad implementaremos el listado de todos los productos de nuestra tienda. De momento, los productos estarán almacenados en un array. 

Pero antes de implementar esta nueva funcionalidad, realizaremos los siguientes cambios en el código de la actividad A5.3:

- Cambia la ruta de la página principal para que sea gestionada por el método "index", que crearemos en el controlador ya existente: HomeController. De esta forma, eliminamos la función anónima que comentamos recientemente que deberíamos intentar evitar.

- Vamos a intentar enviar a los controladores, desde el router, un array con la información necesaria. En lugar de enviar muchas variables. Si necesitamos pasar mucha información tendríamos que utilizar muchas invocaciones al método "with", lo cual "ensuciaría" el código. Por lo tanto, modifica el código (de web.php y de la vista correspondiente) para pasar toda la información en un array y utilizar índices a ese array identificativos.

- Deberíamos modificar los nombres de las variables usadas en el método "about()" del controlador para que sus nombres sea representativos. INTENTA EVITAR denominaciones de ese tipo. 


## Listado de productos

- Crea una nueva ruta denominada "/products" que será gestionada por el método "index()" de un nuevo controlador: "ProductController". 

- En el controlador, crea un array público estático denominado $products que contenga los campos "id", "name", "description", "image" y "price". Inserta en él, al menos, 4 productos. El primer id deberá ser el 1 y el resto serán consecutivos.

- El método index() del nuevo controlador deberá redirigir al usuario a la nueva vista que tendremos que implementar (con el contenido del fichero "products.txt" adjunto). Deberás enviarle a la vista los campos "title", "subtitle", y "products". La nueva vista se denominará "/resources/views/product/index.blade.php".

- Modifica el código de la vista para, utilizando la directiva @foreach, mostrar al usuario el listado de productos. 
De momento, el enlace al producto debe quedar vacío (hasta que implementemos esta funcionalidad).

- Utiliza imágenes con las mismas dimensiones que las alojadas en "public/img". 

- Añade un nuevo enlace a la plantilla de nuestra aplicación para que podamos enlazar con el listado de productos. Utiliza el texto "Productos" para dicho enlace.

## Detalles del producto

- Crea una nueva ruta denominada "/products/{id}" que será gestionada por el método "show($id)" del controlador "ProductController". Esta ruta se utilizará para mostrar los datos de un producto determinado (el indicado por el parámetro "id"). Por ejemplo, si accedemos a "/products/1" la aplicación mostrará los datos del producto cuyo id es 1.

- El método show($id) del nuevo controlador deberá redirigir al usuario a la nueva vista que tendremos que implementar (con el contenido del fichero "show.txt" adjunto). Deberás enviarle a la vista los campos "title", "subtitle", y "products". La nueva vista se denominará "/resources/views/product/index.blade.php".

Por último, añade al menú superior un enlace que apunte a la ruta que muestra el listado de productos.