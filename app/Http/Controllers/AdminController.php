<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Color;
use App\Tag;

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
}
