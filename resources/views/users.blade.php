@extends('templatepages')
@section('content')

 
    <div id="content">
        <div class="container background-white">
            <div class="row margin-vert-30">
                <!-- Main Column -->

                <div class="col-md-9">
                    
                    @foreach($users as $index=>$user)         
                    <!-- User  -->
                        <div class="blog-post padding-bottom-20">
                        <!-- User Item Header -->
                        
                            <div class="blog-item-header margin-top-30">
                            
                                <h2><b>{{$user->firstname}} {{$user->lastname}}</b></h2>

                            <!-- User Details -->
                                <div class="blog-post-details">
                                    <p><b>{{$user->city}}, {{$user->country}}</b></p>    
                                </div>
                            <!-- End User Details -->
                            </div>
                        <!-- End User Item Header -->
                        
                        <!-- User Item Body -->
                            <div class="blog">
                                <div class="clearfix"></div>

                                <div class="blog-post-body row margin-top-15">
                                    <div class="grid-image-user col-sm-5">
                                        <img class="margin-bottom-20" src="{{url('/')}}/images/{{$user->photo}}" alt="">
                                    </div>

                                    <div class="col-md-7 padding-right-20">

                                        <p>{{$user->about}}</p>
                                        <p><b>Offering:</b>
                                        @foreach($user->offerings as $cat)
                                            {{$cat->name}} -
                                        @endforeach
                                       
                                        </p>
                                        <p><b>Seeking:</b>
                                        @foreach($user->seekings as $cat)
                                            {{$cat->name}} -
                                        @endforeach
                                        </p>
                                    
                                    <!-- Contact Modal -->

                                    @include('flash::message')
                                    @include('partials.contactmodal')

                                    <!-- End Contact Modal -->
                                    
                                    </div>
                                </div>
                        </div>
                        <!-- End User Item Body -->
                    </div>
                    <!-- End User Item -->

                    <!-- Comments -->
                    <div class="margin-right-70 margin-bottom-60 panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#faq-sub{{$index}}">
                                <h4 class="panel-title"><i class="fa fa-comments" aria-hidden="true">Comments</i>
                                    
                                    <span class="pull-right">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </span>
                                </h4>
                            </a>
                        </div>

                        <div id="faq-sub{{$index}}" class="panel-collapse collapse">
                            <div class="panel-body">

                                @foreach($user->commentsFromOthers as $comment)
                                    <h3 class="padding-bottom-20">{{$comment->user->firstname}} {{$comment->user->lastname}}</h3>
                                    <p class="padding-bottom-10">{{$comment->content}}</p>
                                  
                                    @if(Auth::check())

                                        @if((Auth::user()->admin_status =='1')||(Auth::user()->id == $comment->user_id))

                                            {{Form::open(['url'=>'comments/'.$comment->id,'method'=>'delete'])}}
                                            {{Form::submit('Delete',array('class'=>'btn btn-primary margin-top-10 margin-bottom-30 '))}}
                                            {{Form::close()}}

                                        @endif

                                    @endif

                                @endforeach

                                @if(Auth::check()== true)

                                    {!! Form::open(['url' => 'user-comments'])!!}

                                    {!! Form::hidden('user-for',$user->id)!!}
                                    <div class="form-group">
                                      <label for="comment">Comment:</label>

                                        {{Form::textarea('content','',['class'=>'form-control'])}}
                                    
                                        {!! Form::submit('Submit',array('class'=>'btn btn-primary margin-top-10 margin-right-5 pull-right'))!!}
                                    </div>
                                    {!! Form::close()!!}

                                    @else
                                        <p><b>Please login to add comments</b></p>

                                @endif
                                
                            </div>     
                        </div>                        
                    </div>
                 
                    <!-- End Comments -->
                
                    @endforeach

                    <!-- Pagination -->
                    {{$users->links()}}
                    <!-- End Pagination -->

                </div>
                <!-- End Main Column -->
            
                <!-- Side Column -->
                @include('partials.sidecolumn')
                <!-- End Side Column -->

            </div>
        </div>
    </div>
 

 
 @endsection         