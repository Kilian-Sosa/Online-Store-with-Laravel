<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    function about(){
        return view('home.about') 
            -> with("title", "Acerca de - Tienda online")
            -> with("subtitle", "Este es el subtítulo")
            -> with("description", "Lore ipsum lore ipsum lore ipsum")
            -> with("author", "Kilian");
    }
}
