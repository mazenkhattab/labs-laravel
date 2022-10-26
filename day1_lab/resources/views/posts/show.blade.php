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
   
@endsection
