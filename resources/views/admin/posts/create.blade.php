@extends('layouts.admin')



@section('content')


<h1>Create Post</h1>

<div class="row">
{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}

{{csrf_field()}}

<div class="form-group">

        	{!! Form::label('title','Title') !!}
        	{!! Form::text('title',null,['class'=>'form-control']) !!}
        	
</div>

<div class="form-group">

        	{!! Form::label('category_id','Category') !!}
        	{!! Form::select('category_id',array(''=>'options'),null,['class'=>'form-control']) !!}
        	
</div>

<div class="form-group">

        	{!! Form::label('photo_id','Photo') !!}
        	{!! Form::file('photo_id',['class'=>'form-control']) !!}
        	
</div>

<div class="form-group">

        	{!! Form::label('body','Tell the world how you feel:') !!}
        	{!! Form::textarea('body',null,['class'=>'form-control']) !!}
        	
</div>
<div class="form-group">

        	
        	{!! Form::submit('Speak Ya Mind!',['class'=>'btn btn-primary']) !!}
        	
</div>

{!! Form::close() !!}

</div>

<div class="row">

	@include('includes.form_error')
	
</div>





@stop