<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();

        return view("products.index", compact('posts'));
    }

    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        return view('products.show', compact('post'));
    }
}
