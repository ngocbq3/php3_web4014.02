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
}
