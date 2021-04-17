<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function home(ProductsFilterRequest $request){
//        /dd($request->all());
        $productsQuery = Product::query();
        if($request->filled('price_from')){
            $productsQuery->where('price','>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $productsQuery->where('price','<=', $request->price_to);
        }
        $products = $productsQuery->paginate(6)->withPath($request->getUri());
        return view('home', compact('products'));
    }

    public function categories(){
        $categories = Category::get();
        return view('categories', ['categories' => $categories]);
    }

    public function category($code = null){
        $category = Category::where('code',$code)->first();
        return view('category' , compact('category'));
    }

    public function product($category,$product = null){
        $product = Product::where('code',$product)->first();
        return view('product', ['product' => $product]);
    }

}
