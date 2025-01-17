<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách bài viết</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-80">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">View</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category Name</th>
                    <th>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->image }}</td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->name }}</td>
                        <td>Edit | Delete</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</body>

</html>
