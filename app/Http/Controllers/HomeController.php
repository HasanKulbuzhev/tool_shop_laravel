<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Order;
use App\Models\Product;
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
        return view('auth.users.account',compact('user'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $products_to_cart = $user->cart()->products()->get();
        return view('auth.checkout',compact('products_to_cart','user'));
    }

    public function cart()
    {
        $cart = Auth::user()->cart();
        return view('auth.cart',compact('cart'));
    }

    public function create_cart()
    {

    }

    public function add_to_cart($product_id)
    {
        $cart = Auth::user()->cart();//понадобится для добавления общей цены
        $products_in_cart = $cart->products();//понадобится для проверки
        $added_product = $products_in_cart->get()->where('id',$product_id)->first();//понадобится для добавления продукта в корзину

        //проверка,  если продукт есть в корзине ,он лишь добавляет count
        if($products_in_cart->get()->contains($product_id)){
            $added_product->pivot->count++;
            $added_product->pivot->update();
            $cart->price += $added_product->price;
        }else{
            $products_in_cart->attach($product_id);
            $cart->price += $products_in_cart->get()->where('id',$product_id)->first()->price;//если товара нету в корзине,то он его не найдёт
            //поэтому я не использовал тут added_products,т.к. в нём будет значение только если в корзине уже есть этот товар
        }

        $cart->update();
        return redirect()->back();
    }

    public function cart_update(Request $request)
    {
        dd($request);
    }

    public function remove_from_cart($product_id)
    {
        $cart = Auth::user()->cart();
        $products_in_cart = $cart->products();
        $cart->price -= $products_in_cart->get()->where('id',$product_id)->first()->price;
        $cart->update();
        $products_in_cart->detach($product_id);
        return redirect()->route('cart');

    }

}
