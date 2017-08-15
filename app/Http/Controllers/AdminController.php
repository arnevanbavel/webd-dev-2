<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Color;
use App\Tag;
use App\Photo;
use App\HotItem;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function showProducts()
    {
        $products = Product::all();
    	$hotItems = HotItem::orderBy('place', 'ASC')->get();
    	return view('admin.products_show')
        ->with('products', $products)
        ->with('hotItems', $hotItems);
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
            'name' 						=> 'required|unique:products,name',
            'prijs' 					=> 'required|numeric',
            'korteBeschrijving' 		=> 'required',
            'category_id' 				=> 'required',
            'tag_id' 					=> 'required',
            'uitleg' 					=> 'required',
            //'photo' 					=> 'required|mimes:jpg,jpeg,png|max:5120',
            'color_id' 					=> 'required'
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

        $GeselecteerdeKleuren = $request->color_id;
        foreach($GeselecteerdeKleuren as $GeselecteerdeKleur) {
            $product->Colors()->attach($GeselecteerdeKleuren);
        }        

        return redirect('admin/products')->with('success', 'Product is succesvol aangemaakt.');
    }

    public function editProduct(Product $product)
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        $hotItems = HotItem::orderBy('place', 'ASC')->get();
        $colors = Color::all();

        return view('admin.products_edit', compact('product', 'categories', 'hotItems', 'tags', 'colors'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name,'.$product->id,
            'prijs' => 'required|numeric',
            'korteBeschrijving' => 'required',
            'categorie_id' => 'required',
            'tag_id' => 'required',
            'uitleg' => 'required',
            'color_id' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:5120'
        ]);

        $product->name = $request->name;
        $nameExplode = explode(" ", $request->name);
        $nameImplode = implode("-", $nameExplode);
        $product->link = $nameImplode;
        $product->prijs = $request->prijs;
        $product->korteBeschrijving = $request->korteBeschrijving;
        $product->categorie_id = $request->categorie_id;
        $product->tag_id = $request->tag_id;
        $product->uitleg = $request->uitleg;

        if (count($product->colors) != 0) {            
            foreach ($product->colors as $productColor) {
                $colorChecked = false;
                foreach($request->color_id as $requestColor) {
                    if ($productColor->id == $requestColor) {
                        $colorChecked = true;
                    }
                }
                if (!$colorChecked) {
                    $product->colors()->detach($productColor->id);
                }
            }
            foreach ($request->color_id as $requestColor) {
                $colorExist = false;
                foreach($product->colors as $productColor) {
                    if ($productColor->id == $requestColor) {
                        $colorExist = true;
                    }
                }
                if (!$colorExist) {
                    $product->colors()->attach($requestColor);
                }
            }
        }
        else {
            $colors = $request->color_id;

            foreach ($colors as $color) {
                $product->Colors()->attach($color);
            }
        }
        
        $product->save();

        if ($request->file('photo') != NULL) {

            $files = $request->file('photo');

            foreach ($files as $file) {

                $imageName = $file->getClientOriginalName();
                $imageName = rand(0, 10000) . $imageName;
                $file->move(base_path() . '/public/uploads/products', $imageName);

                $photo = new Photo();

                $photo->name = $imageName;
                $photo->product_id = $product->id;

                $photo->save();
              
            }
        }

        if ($request->deletePhoto != null) {

            $photos = $request->deletePhoto;

            foreach ($photos as $photo) {
                $deletePhoto = Photo::find($photo);

                $deletePhoto->delete();
            }
        }

        if ($request->place == 4) {
            return redirect('admin/products')->with('success', 'Product is succesvol aangepast.');
        }

        if (count($product->hotItems) == 1) {
            $hotItem1 = HotItem::where('place', $request->place)->get();
            $hotItem1 = HotItem::find($hotItem1[0]->id);

            $hotItem2 = HotItem::where('place', $product->hotItems[0]->place)->get();
            $hotItem2 = HotItem::find($hotItem2[0]->id);

            $place1 = $hotItem1->place;
            $place2 = $hotItem2->place;

            $hotItem1->place = $place2;
            $hotItem2->place = $place1;

            $hotItem1->save();
            $hotItem2->save();

            $hotItem = HotItem::where('place', $request->place)->get();
            $hotItem = HotItem::find($hotItem[0]->id);
        }

        $hotItem = HotItem::where('place', $request->place)->get();
        $hotItem = HotItem::find($hotItem[0]->id);

        $hotItem->product_id = $product->id;

        $hotItem->save();        

        return redirect('admin/products')->with('success', 'Product is succesvol aangepast.');
    }
}
