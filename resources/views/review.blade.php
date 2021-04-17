@extends('layout')

@section('title')
    Review
@endsection
@section('main_content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->All() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </divc>
    @endif
    <form action="/review/check" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
        <input type="name" name="name" id="text" placeholder="Введите text" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Введите text" cols="30" rows="10"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <h1>All messages</h1>
    @foreach($reviews as $el)
        <div class="allert alert-warning">
            <h3>{{ $el->message }}</h3>
        </div>

    @endforeach
@endsection
