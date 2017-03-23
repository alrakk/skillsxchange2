@extends('templatepages')
@section('content')


		<div id="content">
            <div class="container background-white">
                <div class="row margin-vert-40">
                  
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        
                            <div class="signup-header">
                                <h2 class="margin-bottom-20">Edit Post</h2>
                            </div>
                            
                            {!! Form::open(['url' => 'posts/'.$post->id,'method'=>'put', 'files'=>true, 'class'=>'margin-bottom-20']) !!}

                            <div class="form-group margin-bottom-20">
                                <label for=""><b>Photo</b></label>
                        
                                 <img id="photo" src="{{url('/')}}/images/{{$post->post_photo}}" alt="">

                                 <div class="dropzone margin-top-20" id="image-upload"></div>
                                 <input type="hidden" name="post_id" value="{{$post->id}}">
                                
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for=""><b>Video</b></label>
                                 {!!Form::file('post_video',$post->post_video,['class'=>'form-control']);!!}
                                 {{ Form::submit('Upload') }}
                                
                            </div>

                            <div class="form-group margin-bottom-20">  
                                <label for=""><b>Title</b></label>
                                {!!Form::text('title',$post->title,['class'=>'form-control']);!!}
                                
                            </div>

                
                            <div class="form-group margin-bottom-20">
                                <label for=""><b>Content</b></label>
                                {!!Form::textarea('content',$post->content,['class'=>'form-control']);!!}
                               
                            </div>
                                                        
                            <hr>

                            <div class="col-lg-6 text-right margin-top-60">
                               <div class="btn-group-justified-col-md-4 margin-top-30">
                                    
                                    <button class="btn btn-primary" type="submit">Update Post</button>
                                </div>
                            </div>
                              
                       
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>

@endsection
