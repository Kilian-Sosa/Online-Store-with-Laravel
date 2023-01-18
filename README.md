# A5.5 - Listado de productos (Base de datos)
Realiza las siguientes tareas para mostrar el listado de productos a partir de la información contenida en una base de datos MySQL:

- Crea una base de datos en MySQL que tenga el mismo nombre que tu tienda online. 

- Crea un usuario que tenga todos los permisos sobre dicha base de datos. 

- Crea una migración en Laravel que te permita añadir, a la base de datos anterior, la tabla "products". La tabla deberá tener los mismos campos que el array "products" definido en la actividad anterior, junto con los campos "created_at" y "updated_at".

- Modifica el fichero ".env" para establecer los parámetros necesarios para conectarte con la nueva base de datos utilizando el nuevo usuario y su contraseña.

- Ejecuta las migraciones.

- Comprueba que las tablas se han creado correctamente.

- Inserta en la base de datos (a través de phpMyAdmin, por ejemplo) 4 productos.

- Crea el modelo "Product" asociado a la tabla que acabas de crear.

- Elimina el array "products" del controlador de productos.

- Modifica los métodos "index" y "show" de dicho controlador para cargar los datos de la base de datos, en lugar del array tal y como se hacía en la actividad anterior.