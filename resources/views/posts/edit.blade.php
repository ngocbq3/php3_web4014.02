@extends('admin')

@section('title', 'Sửa thông tin bài viết')

@section('content')
    <form action="{{ route('admin.posts.edit', $id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label> <br>
            <img src="{{ Storage::url($post->image) }}" width="100" alt=""> <br>
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Content</label>
            <textarea name="content" rows="10" class="form-control">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Category</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" @selected($cate->id == $post->category_id)>
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add new</button>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">List</a>
        </div>
    </form>
@endsection
