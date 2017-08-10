<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function showProducts()
    {
    	$products = Product::all();
    	return view('admin.products_show')->with('products', $products);
    }

    public function showNewProduct()
    {
        $categories = Categorie::all();
        return view('admin.products_create')
        ->with('categories', $categories);
    }
}
