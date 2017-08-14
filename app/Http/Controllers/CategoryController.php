<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Tag;
use DB;


class CategoryController extends Controller
{
    
    public function show(Categorie $category, Product $product, Request $request)
    {   
        if ($request->cookie('language')) {
            $language = $request->cookie('language');

            Lang::setLocale($language);
        } 

        $products = Product::where('categorie_id', '=', $category->id)->take(4)->get();
        return view('categories.showProduct', compact('product', 'products', 'category'));
    }

    public function index(Categorie $category, Request $request)
    {
    	DB::enableQueryLog();

        $tags = Tag::all();
        $tagsExplode = "";
        $searchTags = "";
        $sort = "";
        $minValue = "";
        $maxValue = "";

        if (isset($request->sort)) {
            $sort = $request->sort;
            $searchTags = $request->tags;         
            $tagsExplode = explode("|", $searchTags);
            $minValue = intval($request->minValue);
            $maxValue = intval($request->maxValue);
            if ($tagsExplode[0] == "") {
                switch ($sort) {
                    case "relevance":
                        $products = Product::with('photos')->orWhere(function ($query) use($category, $minValue, $maxValue) 
                        {
                                $query->orWhere([['categorie_id', '=', $category->id], ['prijs', '>', $minValue], ['prijs', '<', $maxValue]]);
                        })->paginate(12);
                        break;
                    case "lowToHigh":
                        $products = $this->filterProductsWithoutTags($category, $minValue, $maxValue, "prijs", "DESC");
                        break;
                    case "highToLow":
                        $products = $this->filterProductsWithoutTags($category, $minValue, $maxValue, "prijs", "ASC");
                        break;
                    case "latest":
                        $products = $this->filterProductsWithoutTags($category, $minValue, $maxValue, "created_at", "DESC");
                    case "oldest":
                        $products = $this->filterProductsWithoutTags($category, $minValue, $maxValue, "created_at", "ASC");
                        break;
                }

                $products->appends(['sort' => $sort]);
                $products->appends(['minValue' => $minValue]);
                $products->appends(['maxValue' => $maxValue]);
                $products->appends(['tags' => $searchTags]);    
            }
            else {
                switch ($sort) {
                    case "relevance":
                        $products = Product::with('photos')->orWhere(function ($query) use($category, $tagsExplode, $minValue, $maxValue) {
                                foreach ($tagsExplode as $tag) 
                                {
                                    $query->orWhere([['categorie_id', '=', $category->id], ['tag_id', '=', $tag], ['prijs', '>', $minValue], ['prijs', '<', $maxValue]]);
                                }
                            })

                        ->paginate(12);
                        break;
                    case "lowToHigh":
                        $products = $this->filterProductsWithTags($category, $tagsExplode, $minValue, $maxValue, "prijs", "DESC");
                        break;
                    case "highToLow":
                        $products = $this->filterProductsWithTags($category, $tagsExplode, $minValue, $maxValue, "prijs", "ASC");
                        break;
                    case "latest":
                        $products = $this->filterProductsWithTags($category, $tagsExplode, $minValue, $maxValue, "created_at", "DESC");
                        break;
                    case "oldest":
                        $products = $this->filterProductsWithTags($category, $tagsExplode, $minValue, $maxValue, "created_at", "ASC");
                        break;
                }

                $products->appends(['sort' => $sort]);
                $products->appends(['minValue' => $minValue]);
                $products->appends(['maxValue' => $maxValue]);
                $products->appends(['tags' => $searchTags]);
            }
        }
        else {
            $products = Product::with('photos')->where('categorie_id', '=', $category->id)->paginate(12);

        }
    	return view('categories.index', compact('products', 'category', 'tags', 'tagsExplode', 'sort'));
    }

    public function filter(Request $request, Categorie $category)
    {
        $tags = "";

        if ($request->tags != "") {
            $tags = implode( "|" , $request->tags);
        }
        return redirect('categories/' . $category->url . '?sort=' . $request->sort . "&minValue=" . $request->minValue . "&maxValue=" . $request->maxValue . "&tags=" . $tags) ;
    }

    public function filterProductsWithoutTags($category, $minValue, $maxValue, $orderBy, $tableFilter)
    {
        $products = Product::with('photos')->orWhere(function ($query) use($category, $minValue, $maxValue) {
                $query->orWhere([['categorie_id', '=', $category->id], ['prijs', '>', $minValue], ['prijs', '<', $maxValue]]);
            })
            ->orderBy($orderBy, $tableFilter)

        ->paginate(12);

        return $products;
    }

    public function filterProductsWithTags($category, $tagsExplode, $minValue, $maxValue, $orderBy, $tableFilter)
    {
        $products = Product::with('photos')
            ->orWhere(function ($query) use($category, $tagsExplode, $minValue, $maxValue) {
                foreach ($tagsExplode as $tag) {
                    $query->orWhere([['categorie_id', '=', $category->id], ['tag_id', '=', $tag], ['prijs', '>', $minValue], ['prijs', '<', $maxValue]]);
                }
            })
            ->orderBy($orderBy, $tableFilter)

        ->paginate(12);

        return $products;
    }
}
