# A5.9 - Panel de control - Validación de usuarios
- Crea dos nuevos enlaces en la plantilla de la tienda online que apunten a las rutas “login” y “register”. Se mostrarán solo si el usuario no está logueado.

- Crea un nuevo enlace en la plantilla de la tienda online que se muestre solo si el usuario está logueado y que apunte a la ruta “logout”. Que solo se muestre si estás zlogueado. Encontrarás un problema y deberás solucionar.

- Crea una nueva migración que te permita añadir un campo denominado “role” que podrá tener dos valores: “admin” o “client”.  Es muy importante que el rol por defecto tenga el valor “client”. Ayúdate de "https://laravel.com/docs/9.x/migrations#creating-columns" y de "https://laravel.com/docs/9.x/migrations#dropping-columns" para crear la migración.