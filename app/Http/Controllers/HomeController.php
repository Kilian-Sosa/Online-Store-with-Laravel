<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Página principal - Tienda online";
        return view('home.index')->with("viewData", $viewData);
    }
    
    function about(){
        $viewData = [];
        $viewData["title"] = "Acerca de - Tienda online";
        $viewData["subtitle"] = "Este es el subtítulo";
        $viewData["description"] = "Lore ipsum lore ipsum lore ipsum";
        $viewData["author"] = "Kilian";
        return view('home.about')->with("viewData", $viewData);
    }
}
