# A5.6 - Panel de control de productos
A continuación vamos a crear un panel de control que nos permita consultar los productos, editarlos y añadir nuevos. Para ello realizaremos lo siguiente:

## Panel de control
- Vamos a crear una nueva plantilla que utilizaremos únicamente para el panel de control. Dicha plantilla la añadiremos a la carpeta "resource/views/layouts" y se llamará "admin.blade.php". 

- Su código será el que se incluye en "admin.blade.txt".

- La plantilla anterior utiliza una imagen y un css que se incluyen en esta actividad.

- Crea, en "app/Http/Controllers/Admin", un nuevo control denominado "AdminHomeController.php" con el código necesario para mostrar correctamente la vista que crearemos a continuación.

- Crea una nueva vista en "resource/views/admin/home" denominada "index.blade.php". Su código será el adjunto en "admin.home.index.blade.txt".

- Crea la ruta necesaria para acceder a la nueva vista.

Comprueba que puedes acceder al nuevo panel de control y que todo se visualiza correctamente.

## Listado de productos
- Crea una nueva ruta que apunte a "/admin/products" que sea gestionada por el método "index" de "AdminProductController". Estará alojado en "app/Http/Controllers/Admin".

- El controlador simplemente pasará a la vista el título de la página y el listado de todos los productos.

- Crea la vista "resource/views/admin/product/index.blade.php". La vista debería mostrar el id y nombre del producto junto con un enlace para editarlo y eliminarlo (de momento, deshabilitados).

- Añade la ruta de la administración de productos en la plantilla del panel de control.

Comprueba que se muestran correctamente los productos.

## Nuevo producto
- Crea una nueva ruta que utilice el método "post" para crear un nuevo producto. Se llamará "admin.product.store" y la gestionará el método "store" del controlador "AdminProductController".

- Sustituye el contenido de "resources/views/admin/product/index.blade.php" por el proporcionado en "admin.product.index.blade.txt"

- Crea el método "store" en el controlador "AdminProductController" para poder validar y almacenar el nuevo producto en la base de datos. Valida lo siguiente:
    El nombre sea obligatorio y que tenga un máximo de 255 caracteres
    La descripción sea obligatoria
    El precio sea obligatorio, numérico y mayor que cero.

- La imagen no se le pide al usuario. De momento, almacena en la base de datos el nombre del fichero "image.jpg".