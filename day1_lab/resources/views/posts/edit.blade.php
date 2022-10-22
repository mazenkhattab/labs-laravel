@extends('layouts.app')

@section('title') edit @endsection

@section('content')
        <form action="{{route('posts.update',$postid)}}" method="post">
         @method('PUT')
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select class="form-control">
                    <option>Ahmed</option>
                </select>
              </div>
         
            <button type="submit" class="btn btn-primary">update</button>
          </form>
   
@endsection
