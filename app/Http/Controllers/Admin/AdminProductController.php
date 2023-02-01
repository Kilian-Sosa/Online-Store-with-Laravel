<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Admin Panel - Listado de Productos - Tienda Online";
        $viewData["products"] = Product::all();
        return view('admin.products.index')->with("viewData", $viewData);
    }
    
    function store(Request $request){
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$out->writeln($request -> image);
        $validatedData = $request -> validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1",
            "image" => "image|mimes:jpeg,jpg,png,gif,svg"
        ]);
        
        $newProduct = new Product();
        $newProduct -> setName($validatedData['name']);  
        $newProduct -> setDescription($validatedData['description']);  
        $newProduct -> setImage('safe.jpg');  
        $newProduct -> setPrice($validatedData['price']);
        $newProduct -> save();

        if($request -> hasFile("image")){
            $imageName =  $newProduct -> id .'.'. $request->image->extension();
            $newProduct -> setImage($imageName);
            $newProduct -> save();

            Storage::disk('public')->put(  
                $imageName,  
                file_get_contents($request->file('image')->getRealPath())  
            );
        } 


        /* Other form of creating a Product
        $newProduct = Product::create([
            'name' => $validatedData['name'], 
            'description' => $validatedData['description'],
            'image' => 'safe.jpg',
            'price' => $validatedData['price']
        ]);  

        $imageName = $newProduct -> getID() .'.'. $request->image->extension();

        //$newProduct -> setImage($imageName);
        //$newProduct -> save();
        */

        session()->flash('success', 'El registro se ha añadido correctamente.');
        return redirect()->back();
    }

    function edit(int $id){
        try {$product = Product::findOrFail($id);}
        catch(ModelNotFoundException $e){return view('products.error')->with("error", "Error: ID no encontrado");}

        $viewData = [];
        $viewData["title"] = "Actualizar Producto - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["product"] = $product;
        return view('admin.products.edit')->with("viewData", $viewData);
    }

    function update(int $id, Request $request){
        $validatedData = $request -> validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1",
            "image" => "image|mimes:jpeg,jpg,png,gif,svg"
        ]);
        
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if($request -> hasFile("image")){
            Storage::disk('public')->delete(Product::find($id)->image);
            $imageName =  $product -> id .'.'. $request->image->extension();
            $product -> setImage($imageName);
            Storage::disk('public')->put(  
                $imageName,  
                file_get_contents($request->file('image')->getRealPath())  
            );
        }
        
        $product->save();
        session()->flash('success', 'El registro se ha actualizado correctamente.');
        return redirect()->back();
    }

    function delete(int $id){
        Storage::disk('public')->delete(Product::find($id)->image);
        Product::destroy($id);
        session()->flash('success', 'El registro se ha eliminado correctamente.');
        return redirect()->back();
    }
}