<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use  App\Http\Requests\StorePostRequest;
use Illuminate\Database\Console\DumpCommand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



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
        $image=$post->post_image;

       return view('posts.show',[
        "post" => $post,
        'user'=> $user,
       'image'=> $image,
       ]);
    }

    public function store(StorePostRequest $request)
    { 
        $data = $request->all();
        $newfile= $request->file("thumbnail");
        $newfile->storeAs('images',$newfile->hashName());
        Post::create([  
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->post_creator,
            'post_image'=>$newfile->hashName()
        ]);
        
        // $file= $request->hasfile('thumbnail');
      
        // if($file){
     
        //     $newfile= $request->file("thumbnail");
        //     if($newfile->extension() == 'png' || $newfile->extension() == 'jpg' ){
        //       $filename =  $newfile->hashName();
        //       Post::create([  
        //        'post_image'=>$newfile->getClientOriginalName()
              
        //     ]); 
        //     $newfile->store('images');
        //     }
        // }
      
        return to_route('posts.index');
    }

    public function edit($postid){
        $post = Post::find($postid);
        $allUsers = User::all();
        $image=$post->post_image;
        return view('posts.edit',[
         'postid'=>$postid , 
        'post' =>$post,
        'allUsers' => $allUsers,
        'image'=> $image
    ]);
    }

    public function destroy($postid){
        $post = post::find($postid);
      $image=$post->post_image;
     $imagepath="images\\".$image;
    //  dump($imagepath);
      Storage::delete($imagepath);
        $post->delete();
   
       return to_route('posts.index');
    }

    public function update($postid,StorePostRequest $request){
       $post=post::find($postid);
       $post->title = $request->title;
       $post->description = $request->description;
       $post->user_id = $request->post_creator;

    $image=$post->post_image;
     $imagepath="images\\".$image;
      Storage::delete($imagepath);

      $newfile= $request->file("thumbnail");
      $newfile->storeAs('images',$newfile->hashName());

       $post->post_image = $newfile->hashName();
       $post->save();
        return to_route('posts.index');
    }
    
}
