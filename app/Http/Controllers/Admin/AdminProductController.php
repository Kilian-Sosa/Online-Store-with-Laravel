<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller{

    function index(){
        $viewData = [];
        $viewData["title"] = "Admin Panel - Listado de Productos - Tienda Online";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }
    
    function store(Request $request){
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$out->writeln($request -> image);
        $validatedData = $request -> validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1",
            "image" => "required|image|mimes:jpeg,jpg,png,gif,svg"
        ]);
        
        $newProduct = new Product();
        $newProduct -> setName($validatedData['name']);  
        $newProduct -> setDescription($validatedData['description']);  
        $newProduct -> setImage('safe.jpg');  
        $newProduct -> setPrice($validatedData['price']);
        $newProduct -> save();

        $imageName =  $newProduct -> id .'.'. $request->image->extension();

        $newProduct -> setImage($imageName);
        $newProduct -> save();

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

        Storage::disk('public')->put(  
            $imageName,  
            file_get_contents($request->file('image')->getRealPath())  
        );

        return redirect()->back();
    }

    function delete(int $id){
        Storage::disk('public')->delete(Product::find($id)->image);
        Product::destroy($id);
        return redirect()->back();
    }


}