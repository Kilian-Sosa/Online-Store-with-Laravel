# Realiza las siguientes modificaciones en la aplicación de tienda online:
● Crea y ejecuta una nueva migración que permita modificar la tabla de productos
para incluir un nuevo campo tipo texto denominado “especificaciones”.
● Modifica el formulario de alta de productos ubicado en la administración de la tienda
para permitir adjuntar al producto un fichero con las especificaciones del
producto. El nombre del fichero deberá almacenarse en el campo definido en el
apartado anterior.
Debes tener en cuenta que es posible que para productos diferentes se pueden
subir ficheros con la misma denominación y en ese caso la aplicación debería
almacenar correctamente ambos ficheros.
● Modifica la plantilla de la tienda para se muestre en el encabezado el nombre del
usuario si ha iniciado sesión. Dicho nombre de usuario contendrá un enlace a la
página donde se modifica su perfil (color y tipo de letra).
● Implementa una APIRest que devuelva al cliente que hace la petición, la información
de todos los productos registrados en la base de datos