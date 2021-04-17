<?php

namespace App\Http\Controllers;

use App\Models\Order;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function account()
    {
        $user = Auth::user();
        return view('auth.account',compact('user'));
    }

    public function cart()
    {
        $products_to_carts = Auth::user()->cart()->products()->get();
        $cart_total_price = 0;
        return view('auth.cart',compact('products_to_carts','cart_total_price'));
    }

    public function create_cart()
    {

    }

    public function add_to_cart($product_id)
    {
        $products_in_cart = Auth::user()->cart()->products();
        //проверка,  если продукт есть в корзине ,он лишь добавляет count
        if($products_in_cart->get()->contains($product_id)){
            $updated_product = $products_in_cart->get()->where('id',$product_id)->first()->pivot;
            $updated_product->count++;
            $updated_product->update();
        }else{
            $products_in_cart->attach($product_id);
        }
        return redirect()->back();
    }

    public function cart_update(Request $request)
    {
        dd($request);
    }

    public function remove_from_cart($product_id)
    {
        $products_in_cart = Auth::user()->cart()->products();
        //проверка, если продукт есть в корзине ,он лишь добавляет count
            $products_in_cart->detach($product_id);
            return redirect()->back();

    }

}
