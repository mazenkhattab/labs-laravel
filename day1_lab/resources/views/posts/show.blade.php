@extends('layouts.app')

@section('title') show @endsection
@section('content')
        <div class="row container ">
            <div class="w-100 bg-light  mt-2 border">
                Post info
            </div>
            <div class="w-100 bg-white border">
                <div class="100 bg-white mt-2 mb-2">
                Title: {{$post->title}}<br>
                Description: {{$post->description}}<br>
                </div>
            </div>
            <div>
             <img src="{{asset("images/$image")}}" alt="not">
            </div>

        </div>
        <div class="row container ">
            <div class="w-100 bg-light  mt-2 border">
                Post Creator info
            </div>
            <div class="w-100 bg-white border">
                <div class="100 bg-white mt-2 mb-2">
                Name: {{$user->name}} <br>
                Email:{{$user->email}} <br>
                Created At : {{$post->created_at}} 
               
            
                </div>
            </div>
<div>
  
</div>
        </div>
        <div>
             
          <form action="{{route('comments.store',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
         
            <input placeholder="Enter you comment here" style="width: 500px;height: 100px" type="text" name="body"><br><br>
            <button type="submit">Add comment</button>
          </form>
    
        </div>
        @if (!$post->comments->isEmpty())
        <div class="mt-2 mb-2 align-items-center ">
           <h1>Comments </h1> 
            @foreach ($comments as $comment)
            <div class="border border-2 bg-light">
                {{$comment->body}}
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#updateModal">Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#commentModal">Remove</button>
                </div>
                        
                
               
            </div>
                
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('comments.destroy', [$comment->id, $post->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Remove" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('comments.update', [$comment->id, $post->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" placeholder="enter new comment here" name="body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h1 class="text-center">No comments Found</h1>
            @endif
@endsection
