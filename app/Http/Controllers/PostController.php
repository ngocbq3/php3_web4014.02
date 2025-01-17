<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select(['posts.*', 'name'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view("posts.index", compact('posts'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('posts.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('image', '_token');
        $image = "";

        //xử lý file ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
        }

        $data['image'] = $image;
        DB::table('posts')->insert($data);
        return redirect()->route('posts.index')->with('Success');
    }
}
