@extends('layout')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div>
        danh sách bài viết

        @foreach ($posts as $post)
            <div>
                <a href="{{ route('products.show', $post->id) }}">{{ $post->title }}</a>
                <p>
                    {{ $post->description }}
                </p>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
