# A5.8 - Panel de control - Eliminando y editando productos
- Habilita el enlace correspondiente del listado de productos del panel de control para que se pueda llevar a cabo la eliminación de productos de nuestra tienda online. Para ello, crea una nueva ruta "DELETE" denominada "/admin/products/{id}/delete" que mediante el método "delete" del controlador "AdminProductController" realizará el borrado.
    OPCIONAL: elimina también el fichero asociado al producto.

- Activa el botón de edición del listado de productos del panel de control para que puedas editar productos de nuestra tienda. Para ello, crea las siguientes rutas:

    "/admin/products/{id}/edit" - Será gestionada por el método "edit" del controlador "AdminProductController". Dicho método mostrará un formulario en la vista "admin.product.edit" que permitirá visualizar los datos actuales del producto y actualizarlos postriormente.

    "/admin/products/{id}/update" - Será la ruta a la que se enviará el formulario anterior para realizar la actualización. La gestionará el método "update" del controlador "AdminProductController".