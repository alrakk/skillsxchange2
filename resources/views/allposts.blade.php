@extends('templatepages')
@section('content')

        <!-- === BEGIN CONTENT === -->
        <div id="content ">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <!-- Main Column -->
                    <div class="col-md-9">

                        @foreach($posts as $post)

                        <div class="blog-post">
                            
                            <div class="blog-item-header margin-top-50">
                                <!-- Title -->
                                <h2>{{$post->title}}</h2>
                                <!-- End Title -->
                            </div>
                            <!-- Blog Item -->
                            <div class="blog-item">
                                <div class="clearfix"></div>
                                <div class="blog-post-body row margin-top-15">
                                    <div class="col-md-12 ">
                                        <img class="margin-bottom-20" src="{{url('/')}}/images/{{$post->post_photo}}" alt="">
                                        <p><b>Author:</b> {{$post->user->firstname}} {{$post->user->lastname}}</p>
                                    </div>
                                    <div class="col-md-12  margin-bottom-50">
                                    
                                        <div>{!!$post->content!!}</div>
                                        
                                    </div>
                                </div>

                                    @if(Auth::check())

                                        @if((Auth::user()->admin_status =='1')||(Auth::user()->id == $post->user_id))

                                            {{Form::open(['url'=>'posts/'.$post->id,'method'=>'delete'])}}
                                            {{Form::submit('Delete',array('class'=>'btn btn-primary margin-top-10 margin-bottom-30 '))}}

                                            <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-primary margin-top-10 margin-bottom-30 ">Edit Post</a>
                                            {{Form::close()}}
                                         @endif

                                    @endif
                                
                                <div class="blog-item-footer">
                                    
                                    <!-- Comments -->
                                    <div class="blog-recent-comments panel panel-default margin-bottom-30">
                                        <div class="panel-heading">
                                            <h3>Comments</h3>
                                        </div>
                                        <ul class="list-group">
                                            @foreach($post->comments as $comment)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 class="margin-bottom-20"><b>{{$comment->user->firstname}} {{$comment->user->lastname}}</b></h3>
                                                    </div>
                                                    <div class="col-md-10">
                                    
                                                        <p>{{$comment->content}}</p>
                                                        
                                                    </div>

                                                </div>
                                                @if(Auth::check())

                                                        @if((Auth::user()->admin_status =='1')||(Auth::user()->id == $comment->user_id))

                                                            {{Form::open(['url'=>'comments/'.$comment->id,'method'=>'delete'])}}
                                                            {{Form::submit('Delete',array('class'=>'btn btn-primary margin-top-10 margin-bottom-30 '))}}
                                                            {{Form::close()}}

                                                         @endif
                                                    @endif
                                            </li>
                                            @endforeach
                                        </ul>



                                            <!-- Comment Form -->
                                            <li class="list-group-item">
                                                <div class="blog-comment-form">
                                                    <div class="row margin-top-20">
                                                        <div class="col-md-12">
                                                            <div class="pull-left">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                     

                                
                                                <h3>Leave a Comment</h3>

                                                    @if(Auth::check()== true)

                                                        {!! Form::open(['url' => 'post-comments'])!!}

                                                        {!! Form::hidden('post_id',$post->id)!!}
                                                        <div class="form-group">
                                                            <label for="comment"></label>

                                                            {{Form::textarea('content','',['class'=>'form-control'])}}
                                        
                                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary margin-top-10 margin-bottom-25 pull-right'))!!}
                                                        </div>

                                                        {!! Form::close()!!}

                                                        @else
                                                            <p><b>Please login to add comments</b></p>

                                                        @endif

                                                </div>
                                            </li>
                                            <!-- End Comment Form -->
                                        </ul>
                                    </div>
                                    <!-- End Comments -->
                                </div>
                            </div>
                            <!-- End Blog Item -->
                        </div>

                        @endforeach
                        <!-- End Blog Post -->
                         <!-- Pagination -->
                        {{$posts->links()}}
                
                        <!-- End Pagination -->
                    </div>
                    <!-- End Main Column -->
                    
                    <!-- Side Column -->
                   @include('partials.sidecolumn')
                    <!-- End Side Column -->
                    
                </div>
            </div>
        </div>
        <!-- === END CONTENT === -->
@endsection