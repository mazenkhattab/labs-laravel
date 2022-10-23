<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(5);
       
        return view('posts.index', [
          'posts' => $allPosts
        ]);
    }

    public function create()
    {   
        $allUsers = User::all();
        return view('posts.create',[
            'allUsers' => $allUsers
        ]);
    }

    public function show($postId)
    {    $post = Post::find($postId);
        $userid=  $post->user_id;
        $user= user::find($userid);
        foreach ($post->comments as $comment) {
            var_dump($comment);
        }
        
       return view('posts.show',[
        "post" => $post,
        'user'=> $user,
        
       ]);
    }

    public function store()
    { 
        $data = request()->all();

        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->post_creator,
        ]);
        return to_route('posts.index');
    }

    public function edit($postid){
        $post = Post::find($postid);
        $allUsers = User::all();

        return view('posts.edit',[
         'postid'=>$postid , 
        'post' =>$post,
        'allUsers' => $allUsers]);
    }

    public function destroy($postid){
        $post = post::find($postid);
        $post->delete();
       return to_route('posts.index');
    }

    public function update($postid){
       $post=post::find($postid);
       $post->title =  request()->title;
       $post->description =  request()->description;
       $post->user_id =  request()->post_creator;
       $post->save();
        return to_route('posts.index');
    }
    
}
