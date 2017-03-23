
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Skills Xchange</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" />
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/nexus.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>

        
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Raleway:100,300,400" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" type="text/css" rel="stylesheet">
        <!-- Select2-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>
    </head>
    <body>
        <div id="social" class="visible-lg">
            <ul class="social-icons pull-right hidden-xs">
                <li class="social-rss">
                    <a href="#" target="_blank" title="RSS"></a>
                </li>
                <li class="social-twitter">
                    <a href="#" target="_blank" title="Twitter"></a>
                </li>
                <li class="social-facebook">
                    <a href="#" target="_blank" title="Facebook"></a>
                </li>
                <li class="social-googleplus">
                    <a href="#" target="_blank" title="GooglePlus"></a>
                </li>
            </ul>
        </div>
        <!-- Header -->
        <div id="header" style="background-position: 50% 0%; height:100%;" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{url('categories')}}" title="">
                            <h1 class="animate fadeInDownBig">Skills Xchange</h1>
                        </a>
                    </div>
                    <!-- End Logo -->
                </div>
                <!-- Top Menu -->
                <div id="hornav" class="row text-light">
                    <div class="col-md-12">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">

                            <li><a href="{{url('categories')}}" class="fa-home active">Home</a></li>

                            @if(Auth::check() == false)
                                
                                <li><a href="{{url('login')}}" class="fa-sign-in">Login</a></li>
                                <li><a href="{{url('users/create')}}" class="fa-pencil">Register</a></li>
                                <li><a href="{{url('posts')}}" class="fa-comments-o">Blog</a></li>

                            @else
        
                                <li><a href="{{url('posts')}}" class="fa-comments-o">Blog</a></li>
                                <li><a href="{{url('posts/create')}}" class="fa-file">Create New Post</a></li> 
                                <li><a href="{{url('users/'.Auth::user()->id)}}" class="fa-info">User Details</a></li>
                                <li><a href="{{url('users')}}" class="fa-users">Users</a></li>


                                @if(Auth::user()->admin_status == '1')
                                    <li><a href="{{url('categories/create')}}" class="fa-comment ">New Category</a></li>
                                    

                                @endif

                                    <li><a href="{{url('logout')}}" class="fa-sign-out ">Logout</a></li>
                            @endif 

                            </ul>

                        </div>
                    </div>
                </div>


                <!-- End Top Menu -->
                <div class="search">  
                    <div class="col-md-4 col-md-offset-4">
                    <h2 class="">Search Categories</h2>
                        {!! Form::open(['url' => 'search','files'=>true, 'class'=>'margin-bottom-10'])!!}

                        <div id="search-input" method="get" id="s" action="/">
                            <div class="input-group col-md-12 ">
                                <input type="text" class="form-control input-lg" name="s" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>              

            </div>
        </div>
        <!-- End Header -->
<!-- === END HEADER === -->

@yield('content')

<div id="token">{{csrf_token()}}</div>      

<!-- Footer -->
        <div id="footer" class="background-dark text-light">
            <div class="container no-padding">
                <div class="row">
                    
                    <!-- Copyright -->
                    <div id="copyright" class="col-md-4 col-md-offset-8">
                        <p class="pull-right">© Skills Xchange</p>
                    </div>
                    <!-- End Copyright -->
                </div>
            </div>
            <!-- End Footer -->
            <!-- JS --><!-- tinymce -->
            
  
            <div id="public">{{url("/")}}</div>
            
            <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
            <!-- select2 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <!-- wisiwig -->
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <!-- jeditable -->
            <script src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>
          
            <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
            <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.isotope.js')}}" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.slicknav.js')}}" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="{{asset('assets/js/jquery.visible.js')}}" charset="utf-8"></script>
            <!-- Stellar Parallax -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.stellar.js')}}" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.sticky.js')}}" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="{{asset('assets/js/slimbox2.js')}}" charset="utf-8"></script>

            <script src="{{asset('assets/js/dropzone.js')}}"></script>
            <!-- Modernizr -->
            <script src="{{asset('assets/js/modernizr.custom.js')}}" type="text/javascript"></script>




            <!-- End JS -->
    </body>
</html>
