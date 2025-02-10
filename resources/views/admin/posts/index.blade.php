@extends('admin.master')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="container w-80">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">View</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ Storage::url($post->image) }}" width="90" alt="">
                        </td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            Edit | Delete
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
