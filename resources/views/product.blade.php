@extends('layouts.master')
@section('title', 'Товар')
@section('content')
        <h1>{{ $product->name }}</h1>
        <h2>{{ $product->category->name }}</h2>
        <p>Цена: <b>{{ $product->price }} ₽</b></p>
        <img src=@if(empty(Storage::url($product->image))) {{ Storage::url($category->image) }} @else "http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg"@endif >
        <p>Отличный продвинутый телефон с памятью на 64 gb</p>

        <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

        </form>
@endsection
