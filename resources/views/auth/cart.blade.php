@extends('layouts.master')
@section('contents')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="cart.html">Cart</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Cart Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50">
    <div class="container">
        <h2 class="text-capitalize sub-heading">cart</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-50">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->products()->get() as $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img src="img/products/1.jpg" alt="cart-image" /></a>
                                </td>
                                <td class="product-name"><a href="#">{{ $product->name }}</a></td>
                                <td class="product-price"><span class="amount">£{{ $product->price }}</span></td>
                                <td class="product-quantity"><input name="product_count|{{ $product->id }}" form="cart_update_form" type="number" min="1" value="{{ $product->pivot->count }}" /></td>
                                <td class="product-subtotal">£{{ $product->get_total_price() }}</td>
                                <td class="product-remove"> <a href="{{ route('remove-from-cart',$product->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img src="img/products/2.jpg" alt="cart-image" /></a>
                                </td>
                                <td class="product-name"><a href="#">Products Name Here</a></td>
                                <td class="product-price"><span class="amount">£50.00</span></td>
                                <td class="product-quantity"><input type="number" value="1" /></td>
                                <td class="product-subtotal">£50.00</td>
                                <td class="product-remove"> <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <!-- Cart Button Start -->
                        <div class="col-lg-8 col-md-7">
                            <div class="buttons-cart">
                                <form action="{{ route('cart-update') }}" method="POST" enctype="multipart/form-data">
                                    <label for="jjj">
                                    <input href="{{ route('cart-update') }}" type="submit" value="Update Cart"/>
                                    </label>
                                    @csrf
                                </form>
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <br />
                                <table>
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">$215.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">${{ $cart->price }}</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{ route('orders.show',$cart) }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->

@endsection
