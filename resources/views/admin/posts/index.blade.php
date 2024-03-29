@extends('layouts.admin')



@section('content')

@if(Session::has('created_posts'))

  <p class="bg-success">{{session('created_posts')}}</p>

@endif

@if(Session::has('deleted_post'))

  <p class="bg-danger">{{session('deleted_post')}}</p>

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
        <th>Posts</th>
        <th>Comments</th>
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
        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{str_limit($post->body,30)}}</td>
        <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
        <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
       
      </tr>


	@endforeach	
      @endif
      
    </tbody>
  </table>




@stop



























