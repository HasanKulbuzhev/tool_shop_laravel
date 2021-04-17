<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function shop()
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('shop',compact('products','categories','brands'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function product($product_code)
    {
        $product = Product::all()->where('code',$product_code)->find(1);
        return view('product',compact('product'));
    }
}
