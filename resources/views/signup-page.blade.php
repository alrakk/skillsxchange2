@extends('templatepages')
@section('content')

        
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-40">
                    <!-- Register Box -->
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        
                            <div class="signup-header">
                                <h2 class="margin-bottom-20">Register a new account</h2>
                                <p>Already a member? Click
                                    <a href="{{url('login')}}"><u>HERE</u> </a>to login to your account.</p>
                            </div>

                            {!! Form::open(['url' => 'users','files'=>true, 'class'=>'margin-bottom-20'])!!}
                            
                            <div class="form-group margin-bottom-20">  
                                <label for="">First Name
                                    <span class="color-red">*</span>
                                </label>
                                {!!Form::text('firstname','',['class'=>'form-control']);!!}
                                {{$errors->first('firstname')}}
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="">Last Name
                                    <span class="color-red">*</span>
                                </label>
                                {!!Form::text('lastname','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('lastname')}}</p> 
                            </div>
                            
                            <div class="form-group margin-bottom-20">
                                <label for="">Email 
                                <span class="color-red">*</span>
                                 </label>
                                {!!Form::text('email','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group margin-bottom-20">
                                <label for="">City
                                    <span class="color-red">*</span>
                                </label>
                                {!!Form::text('city','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('city')}}</p> 
                            </div>
                            <div class="form-group margin-bottom-20">
                                <label for="">Country
                                    <span class="color-red">*</span>
                                </label>
                                {!!Form::text('country','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('country')}}</p> 
                            </div>
                            
                            <div class="form-group margin-bottom-20">
                                <label for="">Profile Pic</label>
                                 {!!Form::file('photo','',['class'=>'form-control']);!!}
                                 
                                
                            </div>

                            <div class="form-group margin-bottom-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Password
                                            <span class="color-red">*</span>
                                        </label>
                                        {!!Form::password('password','',['class'=>'form-control']);!!}
                                        <p>{{$errors->first('password')}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Confirm Password
                                            <span class="color-red">*</span>
                                        </label>
                                        {!!Form::password('password_confirmation','',['class'=>'form-control']);!!}    
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group margin-bottom-20">
                                <label for="">About Me:</label>
                                {!!Form::textarea('about','',['class'=>'form-control']);!!}
                                <p>{{$errors->first('about')}}</p> 
                            </div>
                            <hr>
                            <p><b>Please choose one or more categories you are interested to Xchange.</b></p>

                           
                            <h3 class="margin-bottom-20"><b>Category Offering:</b></h3>

                            
                                <div class="form-group col-md-12 ">
                                  
                                  {!!Form::select('category_offering[]',App\Category::lists('name'),null,['id'=>'category_list','class'=>'form-control','multiple'=>'multiple']);!!}
                                  <p>{{$errors->first('category_offering')}}</p>
                                </div>
                           
                                
                                <div class="form-inline margin-bottom-50">
                                    <div class="form-group">
                                    <label for="">Other:</label>
                                     {!!Form::text('other_offering','',['class'=>'form-control','placeholder'=>"Let us know"]);!!}
                                  </div>
                                </div>        
                            
                        <h3 class="margin-bottom-20"><b>Category Seeking:</b></h3>

                            <div class="form-group col-md-12 ">

                                {!!Form::select('category_seeking[]',App\Category::lists('name'),null,['id'=>'category_list_seeking','class'=>'form-control','multiple'=>'multiple']);!!}
                                  <p>{{$errors->first('category_seeking')}}</p>
                            </div>
                           
                            <p class="error">{{Session::get('message')}}</p>
                               
                                <div class="form-inline margin-bottom-50">
                                    <div class="form-group">
                                    <label for="">Other:</label>
                                     {!!Form::text('other_seeking','',['class'=>'form-control','placeholder'=>"Let us know"]);!!}
                                  </div>
                                </div>  

                            <hr>

                            <div class="row margin-top-60">
                                <div class="col-lg-8">
                                    <label class="checkbox">
                                        <input type="checkbox">I read the
                                        <a href="#">Terms and Conditions</a>
                                    </label>
                                </div>
                                <div class="col-lg-4 text-right margin-top-60">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>
                            </div>
                       
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>

@endsection