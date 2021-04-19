@extends('layouts.master')
@section('contents')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- coupon-area start -->
<div class="coupon-area">
    <div class="container">
        <!-- Section Title Start -->
        <div class="section-title mb-20">
            <h2>checkout</h2>
        </div>
        <!-- Section Title Start End -->
        <div class="row">
            <div class="col-lg-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Login" />
                                    <label>
                                        <input type="checkbox" />
                                        Remember me
                                    </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                    <!-- ACCORDION START -->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" class="code" value="Coupon code" />
                                    <input type="submit" value="Apply Coupon" />
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- coupon-area end -->
<!-- checkout-area start -->
<div class="checkout-area pt-30  pb-60">
    <div class="container">
        <form action="{{ route('orders.update',$user->cart()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select mb-30">
                                    <label>Country <span class="required">*</span></label>
                                    <select>
                                        <option value="volvo">Bangladesh</option>
                                        <option value="saab">Algeria</option>
                                        <option value="mercedes">Afghanistan</option>
                                        <option value="audi">Ghana</option>
                                        <option value="audi2">Albania</option>
                                        <option value="audi3">Bahrain</option>
                                        <option value="audi4">Colombia</option>
                                        <option value="audi5">Dominican Republic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label name="name" >First Name <span class="required">*</span></label>
                                    <input type="text" name="name" value="{{ $user->name }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label name="last_name">Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name"  value="{{ $user->last_name }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label name="address">Address <span class="required">*</span></label>
                                    <input type="text" name="address" value="{{ $user->address }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mtb-30">
                                    <input type="text" value="Apartment, suite, unit etc. (optional)" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label name="city">Town / City <span class="required">*</span></label>
                                    <input type="text" name="city" value="Town / City" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label name="state">State / County <span class="required">*</span></label>
                                    <input name="state" type="text" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label name="postcode_zip">Postcode / Zip <span class="required">*</span></label>
                                    <input name="postcode_zip" type="text" value="Postcode / Zip" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label name="email" >Email Address <span class="required">*</span></label>
                                    <input name="email"  type="email" value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label name="phone">Phone  <span class="required">*</span></label>
                                    <input type="text" value="{{ $user->phone }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc mb-30">
                                    <input id="cbox" type="checkbox" />
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                    <p class="mb-10">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <label>Account password  <span class="required">*</span></label>
                                    <input type="password" value="password" />
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label name="note">Order Notes</label>
                                    <textarea name="note" id="checkout-mess" cols="30" rows="10" value="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products_to_cart as $product)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{ $product->name }} <strong class="product-quantity"> × {{ $product->pivot->count }}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">£{{ $product->get_total_price() }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Products Name Here <strong class="product-quantity"> × 1</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">£50.00</span>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">£215.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">£{{ $user->cart()->price }}</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Place order" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->

@endsection
