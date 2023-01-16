<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller{
    public static array $products;

    private function insert(){
        ProductController::$products[0] = array("id" => 1, "name" => "Nintendo 3DS negro", 
            "description" => "Consola portátil de Nintendo que permitirá disfrutar de efectos 3D sin necesidad de gafas especiales, e incluirá retrocompatibilidad con el software de DS y de DSi.", 
            "image" => asset('img/nintendo3ds.png'), "price" => 270.00);
        ProductController::$products[1] = array("id" => 2, "name" => "Acer AX3950 I5-650 4GB 1TB", "description" => "Características:\r\n\r\nSistema Operativo : Windows® 7 Home Premium Original\r\n\r\nProcesador / Chipset\r\nNúmero de Ranuras PCI: 1\r\nFabricante de Procesador: Intel\r\nTipo de Procesador: Core i5\r\nModelo de Procesador: i5-650\r\nNúcleo de Procesador: Dual-core\r\nVelocidad de Procesador: 3,20 GHz\r\nCaché: 4 MB\r\nVelocidad de Bus: No aplicable\r\nVelocidad HyperTransport: No aplicable\r\nInterconexión QuickPathNo aplicable\r\nProcesamiento de 64 bits: Sí\r\nHyper-ThreadingSí\r\nFabricante de Chipset: Intel\r\nModelo de Chipset: H57 Express\r\n\r\nMemoria\r\nMemoria Estándar: 4 GB\r\nMemoria Máxima: 8 GB\r\nTecnología de la Memoria: DDR3 SDRAM\r\nEstándar de Memoria: DDR3-1333/PC3-10600\r\nNúmero de Ranuras de Memoria (Total): 4\r\nLector de tarjeta memoria: Sí\r\nSoporte de Tarjeta de Memoria: Tarjeta CompactFlash (CF)\r\nSoporte de Tarjeta de Memoria: MultiMediaCard (MMC)\r\nSoporte de Tarjeta de Memoria: Micro Drive\r\nSoporte de Tarjeta de Memoria: Memory Stick PRO\r\nSoporte de Tarjeta de Memoria: Memory Stick\r\nSoporte de Tarjeta de Memoria: CF+\r\nSoporte de Tarjeta de Memoria: Tarjeta Secure Digital (SD)\r\n\r\nStorage\r\nCapcidad Total del Disco Duro: 1 TB\r\nRPM de Disco Duro: 5400\r\nTipo de Unidad Óptica: Grabadora DVD\r\nCompatibilidad de Dispositivo Óptico: DVD-RAM/±R/±RW\r\nCompatibilidad de Medios de Doble Capa: Sí", 
            "image" => asset('img/acerpc.png'), "price" => 410.00);
        ProductController::$products[2] = array("id" => 3, "name" => "Archos Clipper MP3 2GB negro", "description" => "Características:\r\n\r\nAlmacenamiento Interno Disponible en 2 GB*\r\nCompatibilidad Windows o Mac y Linux (con soporte para almacenamiento masivo)\r\nInterfaz para ordenador USB 2.0 de alta velocidad\r\nBattería2 11 horas música\r\nReproducción Música3 MP3\r\nMedidas Dimensiones: 52mm x 27mm x 12mm, Peso: 14 Gr", 
            "image" => asset('img/archosmp3.png'), "price" => 26.70);
        ProductController::$products[3] = array("id" => 4, "name" => "Sony Bravia 32IN FULLHD", "description" => "Características:\r\n\r\nFull HD: Vea deportes películas y juegos con magníficos detalles en alta resolución gracias a la resolución 1920x1080.\r\n\r\nHDMI®: 4 entradas (3 en la parte posterior, 1 en el lateral)\r\n\r\nUSB Media Player: Disfrute de películas, fotos y música en el televisor.\r\n\r\nSintonizador de TV HD MPEG-4 AVC integrado: olvídese del codificador y acceda a servicios de TV que incluyen canales HD con el sintonizador DVB-T y DVB-C integrado con decodificador MPEG4 AVC (dependiendo del país y sólo con operadores compatibles)\r\n\r\nSensor de luz: ajusta automáticamente el brillo según el nivel de la iluminación ambiental para que pueda disfrutar de una calidad de imagen óptima sin consumo innecesario de energía.\r\n\r\nBRAVIA Sync: controle su sistema de ocio doméstico entero con un mismo mando a distancia universal que le permite reproducir contenidos o ajustar la configuración de los dispositivos compatibles con un solo botón.\r\n\r\nBRAVIA ENGINE 2: experimente colores y detalles de imagen increíblemente nítidos y definidos. \r\n\r\nLive Colour: seleccione entre cuatro modos: desactivado, bajo, medio y alto, para ajustar el color y obtener imágenes vivas y una calidad óptima. \r\n\r\n24p True Cinema: reproduzca una auténtica experiencia cinemática y disfrute de películas exactamente como el director las concibió a 24 fotogramas por segundo.", 
            "image" => asset('img/sonytv.png'), "price" => 356.90);
    }

    private function getProduct(int $id): int{
        if($id == 0) return -1;
        for ($i = 0; $i < sizeof(ProductController::$products); $i++) 
            if(ProductController::$products[$i]["id"] == $id) return $i;
        return -1;
    }

    function index(){
        $this -> insert();
        $viewData = [];
        $viewData["title"] = "Listado de Productos - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["products"] = ProductController::$products;
        return view('products.index')->with("viewData", $viewData);
    }

    function show(int $id){
        $this -> insert();
        $productIdent = $this -> getProduct($id);
        if($productIdent == -1) return view('products.error')->with("error", "No existe un producto con dicho ID");

        $viewData = [];
        $viewData["title"] = "Detalles del Producto - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["product"] = ProductController::$products[$productIdent];
        return view('products.show')->with("viewData", $viewData);
    }
}
