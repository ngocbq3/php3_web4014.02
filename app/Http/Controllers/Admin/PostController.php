<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
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
}
