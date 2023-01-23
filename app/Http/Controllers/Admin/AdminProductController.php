<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AdminProductController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Admin Panel - Listado de Productos - Tienda Online";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }
    
    function store(Request $request){
        $validatedData = $request -> validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|min:1|decimal:0,2"
        ]);
        
        $newProduct = new Product();  
        $newProduct -> setName($validatedData['name']);  
        $newProduct -> setDescription($validatedData['description']);  
        $newProduct -> setImage('img/image.jpg');  
        $newProduct -> setPrice($validatedData['price']);  
        $newProduct -> save();
        return redirect()->back();
    }
}