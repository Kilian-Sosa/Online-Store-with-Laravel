<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Exception;

class ProductController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Listado de Productos - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["products"] = Product::all();
        return view('products.index')->with("viewData", $viewData);
    }

    function show(int $id){
        try {$product = Product::findOrFail($id);}
        catch(ModelNotFoundException $e){return view('products.error')->with("error", "Error: ID no encontrado");}

        $viewData = [];
        $viewData["title"] = "Detalles del Producto - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["product"] = $product;
        return view('products.show')->with("viewData", $viewData);
    }

    function apiAll(){
        try {
            $products = Product::all();
            return response()->json([
                'data' => $products,
                'message' => 'Succeed',
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
