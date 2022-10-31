<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate();

        return PostResource::collection($posts);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        $user = user::find($post->user_id);
        $postinfo = new PostResource($post);
       
        return $postinfo;
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $post = Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return new PostResource($post);
    }
}
