<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Página principal - Tienda online";
        if(!Auth::user()) Session::flush();
        if(Auth::user() && !session()->has('user')) session(['userName' => Auth::user() -> getName()]);

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

    function profile(){
        $viewData = [];
        $viewData["title"] = "Configuración - Tienda online";
        $viewData["subtitle"] = "Panel de Configuración";
        return view('home.profile')->with("viewData", $viewData);
    }

    function update(Request $request){
        $request->validate([
            'font' => 'required',
            'headColor' => 'required',
        ]);

        session(['user' => true]);
        session(['font' => $request -> font]);
        session(['headColor' => $request -> headColor]);
        return redirect()->back();
    }
}
