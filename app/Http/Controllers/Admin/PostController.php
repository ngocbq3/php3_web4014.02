<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->except('image');

        $image = "";

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
        }
        $data['image'] = $image;

        Post::query()->create($data);
        return redirect()->route('admin.posts.list')->with('message', 'Create success');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('admin.posts.list')->with('message', 'Delete success');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view("admin.posts.edit", compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('image');

        $post = Post::find($id);

        $image = $post->image;

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
        }
        $data['image'] = $image;

        //Cập nhật
        $post->update($data);

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }
}
