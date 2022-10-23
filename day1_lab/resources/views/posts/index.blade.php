@extends('layouts.app')

@section('title') Index @endsection
@section('content')
<div class="text-center">
  <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post['id']}}</th>
        <td>{{$post['title']}}</td>
        @if($post->user)
          <td>{{$post->user->name}}</td>
        @else
          <td>Not Defined</td>
        @endif
        <td>{{$post->created_at->toRfc822String()}}</td>
        <td>
            <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
            {{-- <a href="{{route('posts.show', ['post' =>$post['id']])}}" class="btn btn-info">View</a> --}}
            <a href="{{route('posts.edit', ['post' =>$post['id']])}}" class="btn btn-primary">Edit</a>
              <button data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" type="submit">Delete</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{route('posts.destroy',$post['id'])}}" method="post">
            @method('delete')
            @csrf
        <button type="submit" class="btn btn-primary">Delete</button>
      </form>
      </div>
    </div>
  </div>
</div>

           

        </td>
      </tr>
      
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center mt-5">
            {{ $posts->links('pagination::bootstrap-4') }}
          </div>
@endsection





