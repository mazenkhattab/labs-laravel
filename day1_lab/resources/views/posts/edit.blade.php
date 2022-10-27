@extends('layouts.app')

@section('title') edit @endsection

@section('content')

        <form action="{{route('posts.update',$postid)}}" method="post" enctype="multipart/form-data">
         @method('PUT')
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" value="{{$post->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('title')
                        <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input  value="{{$post->description}}" name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('description')
                        <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select  name="post_creator"  class="form-control">
                @foreach ($allUsers as $user)
                    <option value="{{$user->id}}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <img src="{{asset("images/$image")}}" alt="not">
               </div>

              <div>
                <label class="form-label" for="thumbnail">Upload new photo</label>
                <input type="file" name="thumbnail" class="form-control w-25">
              </div>
         
            <button type="submit" class="btn btn-primary">update</button>
          </form>

        
       
   
@endsection
