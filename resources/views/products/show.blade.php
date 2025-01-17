@extends('layout')

@section('title', $post->title)

@section('content')
    <div>
        Chi tiết bài viết

        <h2>{{ $post->title }}</h2>
        <p>
            {{ $post->content }}
        </p>
        <p>
            <img src="{{ $post->image }}" width="100" alt="">
        </p>
    </div>
@endsection
