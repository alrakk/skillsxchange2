@extends('templatepages')
@section('content')


		<div id="content">

            <div class="container background-white">
                <div class="row margin-vert-40">
                    <!-- Register Box -->
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        
                            <div class="signup-header">
                                <h2 class="margin-bottom-20">New Category</h2>
                            </div>
                            {!! Form::open(['url' => 'categories', 'files'=>true, 'class'=>'margin-bottom-20']) !!}

                            
                            <div class="form-group margin-bottom-20">  
                                <label for="">Category Name</label>
                                {!!Form::text('name','',['class'=>'form-control']);!!}
                                {{$errors->first('name')}}
                            </div>

                            <div class="form-group margin-bottom-20">  
                                <label for="">Priority</label>
                                {!!Form::select('priority',[0,1],null,['class'=>'form-control']);!!}
                                {{$errors->first('priority')}}
                            </div>
                            
                            
                            <div class="form-group margin-bottom-20">
                                <label for="">Photo</label>
                                 {!!Form::file('photo_category','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('photo_category')}}</p>
                            </div>
   
                            <hr>

                            <div class="col-lg-6 text-right margin-top-60">
                               <div class="btn-group-justified-col-md-4 margin-top-30">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button class="btn btn-primary" type="submit">Add Category</button>
                                </div>
                            </div>
                              
                       
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>

@endsection