
@extends('templatepages')
@section('content')


 
    <div id="content">
        <div class="container background-white">
            <div class="container">
                <div class="row margin-vert-60">
                    <!-- Login Box -->
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        <div class="login-page">

                            <div class="login-header margin-bottom-30">
                                <h2><b>Login to your account</b></h2>
                            </div>

                            {!! Form::open(['url' => 'login']) !!}

                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <label for=""></label>
                                    {!!Form::text('email','',['class'=>'form-control','placeholder'=>'Email']);!!}
                                </div>

                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <label for=""></label>
                                    {!!Form::password('password',array('placeholder'=>'Password','class'=>'form-control'));!!}
                                </div>

                                <p class="error">{{Session::get('message')}}</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="checkbox">
                                            <input type="checkbox">Stay signed in</label>
                                    </div>

                                    <div class="col-sm-5 margin-top-0">
                                        <button class="btn btn-primary pull-right margin-top-20" type="submit">Login</button>
                                    </div>
                                
                                </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    
                    <!-- End Login Box -->

                </div>
            </div>
        </div>
    </div>

        
@endsection  