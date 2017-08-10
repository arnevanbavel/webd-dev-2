<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Color;
use App\Tag;
use App\Photo;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function showProducts()
    {
    	//hot items ? zelfde pagina?
    	$products = Product::all();
    	return view('admin.products_show')->with('products', $products);
    }

    public function showNewProduct()
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        $colors = Color::all();

        return view('admin.products_create')
        ->with('categories', $categories)
        ->with('tags', $tags)
        ->with('colors', $colors);
    }

    public function createProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'prijs' => 'required|numeric',
            'korteBeschrijving' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'uitleg' => 'required',
            //'photo' => 'required|mimes:jpg,jpeg,png|max:5120',
            'color_id' => 'required'
        ]);

        $product 						= new Product();
        $product->name 					= $request->name;
        $nameExplode 					= explode(" ", $request->name);
        $nameImplode 					= implode("-", $nameExplode);
        $product->link 					= $nameImplode;
        $product->prijs 				= $request->prijs;
        $product->korteBeschrijving 	= $request->korteBeschrijving;
        $product->categorie_id 			= $request->category_id;
        $product->tag_id 				= $request->tag_id;
        $product->uitleg 				= $request->uitleg;

        $files = $request->file('photo');

        if (!$product->save()) {
            return redirect('admin/products')->with('error', 'Product is niet succesvol aangemaakt.');
        }

        foreach ($files as $file) {

            $imageName = $file->getClientOriginalName();
            $imageName = rand(0, 10000) . $imageName;
            $file->move(base_path() . '/public/uploads/products', $imageName);

            $photo = new Photo();

            $photo->name = $imageName;
            $photo->product_id = $product->id;

            $photo->save();
          
        }

        $colors = $request->color_id;

        foreach($colors as $color) {
            $product->Colors()->attach($color);
        }        

        return redirect('admin/products')->with('success', 'Product is succesvol aangemaakt.');
    }
}
