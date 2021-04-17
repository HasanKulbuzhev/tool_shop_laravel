@extends('test/maket')

@section('main')
    @foreach($posts as $key=>$post)
        @if($key == $id) @continue()
    <div class="info">
        <span class="date">{{ $post['date'] }}</span>
        <span class="author">{{ $post['author'] }}</span>
    </div>
    <div class="text">
        {{ $post['text'] }}
    </div>
    @endforeach
@endsection
