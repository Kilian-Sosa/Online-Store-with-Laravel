# A5.10 - Panel de control - Control de acceso y gestión de variables de sesión
- Impide el acceso al panel de control a los usuarios que no tienen el rol "admin". En caso de que un usuario sin ese rol intente entrar, redirígelo a la página de inicio.
- Habilita una página de configuración a la que podrán acceder todos los usuarios validados, de forma que se pueda modificar, durante la sesión, el color del encabezado y el tipo de letra que se utilizan en la plantilla de la tienda online. Para ello, utiliza los métodos siguientes. (Más información en "https://laravel.com/docs/9.x/session#the-global-session-helper"):
        $value = session('key');
        session(['key' => 'value']);
        $value = session('key', 'default');
