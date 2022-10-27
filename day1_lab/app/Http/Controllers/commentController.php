<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\User;
use App\Models\Post;

class commentController extends Controller

{
    


  

    public function store( $postid)
    {  
        $post = Post::find($postid);	
        $comment = new Comment;
     $comment->body = request()->body;
 
    $post->comments()->save($comment);
    return redirect('/posts/'.$postid);
    }

    public function update( $id, $postID)
    {
        $comment = Comment::find($id);

        // dd($comment);
        $comment->body = request()->body;
        $comment->save();
        return redirect('/posts/'.$postID);
    }
    
    public function destroy($id, $postID)
    {
        Comment::find($id)->delete();
        return redirect('/posts/'.$postID);
    }
}
