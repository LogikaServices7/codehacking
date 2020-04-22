@extends('layouts.admin')



@section('content')

@if(Session::has('created_posts'))

  <p class="bg-success">{{session('created_posts')}}</p>

@endif

<!-- @if(Session::has('created_user'))

  <p class="bg-success">{{session('created_user')}}</p>

@endif -->


<h1>Posts</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        
      </tr>
    </thead>
    <tbody>

		@if($posts)

			@foreach($posts as $post)

      <tr>
        <td>{{$post->id}}</td>
        <td><img height="50" src="{{$post->photo ? $post->photo->file : '/images/avatar.jpg'}}" alt=""></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
       
      </tr>


	@endforeach	
      @endif
      
    </tbody>
  </table>




@stop



























