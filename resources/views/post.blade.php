@extends('layouts.blog-post')


@section('content')



 <!-- Blog Post -->

                <!-- Title -->
                <h1 style="margin-top: 75px;">{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
               <p>{{$post->body}}</p> 

                <hr>

               

                @if(Session::has('comment_message'))
                	{{session('comment_message')}}

                	@endif

                 <!-- Blog Comments -->
@if(Auth::check())    

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>


                    {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    	
                    	{{csrf_field()}}
                    	
                    	<div class="form-group">
                    	
                    	        	{!! Form::label('body','Body') !!}
                    	        	{!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                    	        	
                    	</div>

                    	<div class="form-group">
                    	
                    	        	{!! Form::submit('Submit comment',['class'=>'btn btn-primary']) !!}
                    	        	
                    	        	
                    	</div>

                    	{!! Form::close() !!}
                 </div>
             

@endif                    		




                <hr>

                <!-- Posted Comments -->

@if(count($comments) > 0)

    @foreach($comments as $comment)


                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        
                        </h4>
                        <p>{{$comment->body}}</p>



                      @if(count($comment->replies) > 0)


                        @foreach($comment->replies as $reply)

                        @if($reply->is_active == 1)
                        
                    



                       <-- Nested Comment -->
                      
                        
                        <div id="nested-comment" class="media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                }
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>

                             <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply">

                            <div class="comment-reply-container">
                       <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                       <div class="comment-reply col-sm-9">
                            

                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])!!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            
                                        {{csrf_field()}}
                                        <div class="form-group">

                                        
                                                    {!! Form::label('body','Reply') !!}
                                                    {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>1]) !!}
                                                    
                                        </div>
                                        <div class="form-group">
                                        {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}    
                            
                                        </div>
                            
                                        {!! Form::close() !!}
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                        <!-- End Nested Comment -->
                            @endif
                            @endforeach


                        
                         @else 
              <div id="nested-comment" class="comment-reply-container">
                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                {{csrf_field()}}
                <div class="comment-reply col-sm-9">

                    
                  {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                    
 
                    {!! Form::hidden('comment_id', $comment->id) !!}

                    <div class="form-group">

                      {!! Form::label('body', 'Reply:') !!}
                      {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) !!}
                    </div>
 
                    <div class="form-group">
                      {!! Form::submit('Submit Reply', ['class' => 'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                </div>
              </div>
            @endif


                        

                    
                </div>
        @endforeach        
       @endif         

            

@stop

@section('scripts')

<script>

    $(".comment-reply-container .toggle-reply").click(function(){

        $(this).next().slideToggle("slow");
    });
    
</script>

@stop