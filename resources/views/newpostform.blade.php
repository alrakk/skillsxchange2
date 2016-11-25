@extends('templatepages')
@section('content')

        
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-40">
                    <!-- Register Box -->
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        
                            <div class="signup-header">
                                <h2 class="margin-bottom-20">New Post</h2>
                            </div>
                            {!! Form::open(['url' => 'posts', 'files'=>true, 'class'=>'margin-bottom-20']) !!}

                            
                            <div class="form-group margin-bottom-20">  
                                <label for="">Title</label>
                                {!!Form::text('title','',['class'=>'form-control']);!!}
                                {{$errors->first('title')}}
                            </div>

                            {{-- <div class="form-group margin-bottom-20">
                                <label for="">Author</label>
                                {!!Form::text('post_author','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('post_author')}}</p> 
                            </div> --}}
                            
                            <div class="form-group margin-bottom-20">
                                <label for="">Content</label>
                                {!!Form::textarea('content','',['class'=>'form-control wyz']);!!}
                                <p>{{$errors->first('content')}}</p>
                            </div>
                            
                            <div class="form-group margin-bottom-20">
                                <label for="">Photo</label>
                                 {!!Form::file('post_photo','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('post_photo')}}</p>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="">Video</label>
                                 {!!Form::file('post_video','',['class'=>'form-control']);!!}
                                 {{ Form::submit('Upload') }}
                                <p>{{$errors->first('post_video')}}</p>

                            </div>

                            
                            <hr>

                            <div class="col-lg-6 text-right margin-top-60">
                               <div class="btn-group-justified-col-md-4 margin-top-30">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button class="btn btn-primary" type="submit">Add Post</button>
                                </div>
                            </div>
                              
                       
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>

@endsection