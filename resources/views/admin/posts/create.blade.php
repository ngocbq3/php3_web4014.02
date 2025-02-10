@extends('admin.master')
@section('title', 'Thêm bài viết')
@section('content')
    <div class="container w-75">
        <form action="{{ route('admin.posts.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create New</button>
            </div>
        </form>
    </div>
@endsection
