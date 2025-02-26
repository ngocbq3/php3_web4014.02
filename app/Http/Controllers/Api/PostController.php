<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->paginate(8);
        return response()->json(
            [
                'success' => true,
                'message' => 'Danh sách bài viết',
                'data' => $posts
            ],
            200
        );
    }

    public function show($id)
    {
        try {
            $post = Post::query()->findOrFail($id);
            return response()->json([
                'success'   => true,
                'message'   => "Chi tiết",
                'data'      => $post
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'message'   => 'Không lấy được dữ liệu: ' . $th->getMessage()
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::query()->findOrFail($id);
            $post->delete();
            return response()->json([
                'success'   => true,
                'message'   => "Xóa dữ liệu thành công",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'message'   => "Xóa dữ liệu thất bại"
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //validate
        $validator = Validator::make($data, [
            'title' => ['required', 'min:6', 'unique:posts,title'],
            'image' => ['nullable', 'image'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => "Thêm dữ liệu không thành công",
                'data'      => $validator->errors()
            ]);
        }

        try {
            $image = "";
            //upload image
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('images');
            }
            $data['image'] = $image;

            Post::query()->create($data);

            return response()->json([
                'success'   => true,
                'message'   => "Thêm dữ liệu thành công",
                'data'      => $data,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'message'   => "Thêm dữ liệu thất bại: " . $th->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::query()->findOrFail($id);

            $data = $request->all();

            //validate
            $validator = Validator::make($data, [
                'title' => ['required', 'min:6', 'unique:posts,title'],
                'image' => ['nullable', 'image'],
                'description' => ['required'],
                'content' => ['required'],
                'category_id' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success'   => false,
                    'message'   => "Cập nhật dữ liệu không thành công",
                    'data'      => $validator->errors()
                ]);
            }

            //upload image
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('images');
                $data['image'] = $image;
            }

            $post->update($data);
            return response()->json([
                'success'   => true,
                'message'   => "Cập nhật dữ liệu thành công",
                'data'      => $post,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'message'   => "Cập nhật dữ liệu thất bại: " . $th->getMessage(),
            ]);
        }
    }
}
