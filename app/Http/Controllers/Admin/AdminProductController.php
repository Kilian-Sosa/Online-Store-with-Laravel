<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Admin Page - Listado de Productos - Tienda Online";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }
    
    function store(Request $request){
        $request -> validate(["name" => "required|max:255"]);
        $request -> validate(["description" => "required"]);
        $request -> validate(["image" => "required|max:255"]);
        $request -> validate(["price" => "required|max:255"]);
        $newProduct = new Product();  
        $newProduct -> setName($request -> input('name'));  
        $newProduct -> setDescription($request -> input('description'));  
        $newProduct -> setImage($request -> input('image'));  
        $newProduct -> setPrice($request -> input('price'));  
        $newProduct -> save();
    }
}