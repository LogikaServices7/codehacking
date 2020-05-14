@extends('layouts.admin')


@section('content')

@if(Session::has('deleted_media'))

  <p class="bg-danger">{{session('deleted_media')}}</p>

@endif



<h1>Media</h1>

@if($photos)

<table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Photo</th>
        <th>Created at</th>
        
      </tr>
    </thead>
     <tbody>

	@foreach($photos as $photo)

      <tr>
        <td>{{$photo->id}}</td>
        <td><img height="50" src="{{$photo->file}}" alt=""></td>
        <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>

        <td>
           {{csrf_field()}}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
        
       
        
       
        <div class="form-group">
            {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6']) !!}
            
        </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>


  @endif



@stop