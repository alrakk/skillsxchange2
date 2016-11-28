
@extends('templatemain')
@section('content')

    <!-- === BEGIN CONTENT === -->
    <div id="welcome" class="background-white">
        <div class="container">
            <div class="row margin-vert-40">
                <!-- Main Text -->
                <div class="col-md-12 margin-50">
                    <h2 class="text-center article-title">About Skill Xchange</h2>
                    <p class="text-center">A place to swap, trade, barter or share your skills and services with other members. No complicated systems of trading. It is simple barter – you find someone who wants your skills, or they find you, and you sort your own deal.It can be great fun as well.It's a place that nurtures community spirit and a genuine caring for the environment - and it's all completely free!</p>

                    <img class="col-md-offset-3 margin-top-60 fadeInUp animate" alt="" src="{{url('/')}}/assets/img/pay.jpg">
                </div>
                <!-- End Main Text -->
            </div>
        </div>
    </div>
    <!-- Categories Title -->
    <div id="icons" class="parallax-bg1 text-light background-primary" style="background-position: 50% 0%;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row margin-vert-40">
                
                <div class="categories col-md-4 col-md-offset-4 text-center animate fadeIn">
                    <i class="fa-crosshairs fa-3x color-primary-lighter"></i>
                    <h2 class="padding-top-10">Categories</h2>
                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer.</p>
                </div>

            </div>
        </div>
    </div>
    <!-- End Categories Title -->

    <!-- Categories -->


    <div id="porfolio" class="parallax-bg2" style="background-position: 50% 0%;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row margin-top-40">
                <!-- Categories Item -->
            @foreach(App\Category::where('priority','1')->get() as $index=>$category)

                <?php

                    if(($index % 3) == 0){
                        $class = 'fadeInLeft';
                    }
                    if(($index % 3) == 1){
                        $class = 'fadeInUp';
                    }
                    if(($index % 3) == 2){
                        $class = 'fadeInRight';
                    }
                ?>
                

                <div class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                    <a href="#">
                        <figure class="animate {{$class}}">
                            <div class="grid-image">
                                <div class="featured-info">

                                    <div class="info-wrapper"><a href="{{url('categories/'.$category->id)}} ">{{$category->name}}</a></div>
                                </div>
                                <img alt="image1" src="{{url('/')}}/images/{{$category->photo_category}}">
                            </div>
                        </figure>
                    </a>
                </div>

            @endforeach

                <div class="portfolio-item col-sm-4 col-md-offset-4 col-xs-6 margin-bottom-40">
                    <a href="#">
                        <figure class="animate fadeInUp">
                            <div class="grid-image">
                                <div class="featured-info">
                                    <div class="info-wrapper"><a href="{{url('categories/other')}}">Other Categories</a></div>
                                </div>
                                <img alt="image2" src="{{url('/')}}/images/photo_13.jpg">
                            </div>
                        </figure>
                     </a>
                </div>

                    
                </div>
            </div>
        </div>
       
        <!-- End Categories -->

        <!-- Contact -->
        <div id="hiring" class="parallax-bg3 text-light" style="background-position: 50% 0%;" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 margin-vert-40">
                        <h2 class="animate fadeIn" style="text-align: center;">Contact Us</h2>
                        <hr>
        
                        <p class="animate fadeInUp" style="text-align: center;">
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

         <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <!-- Main Column -->
                    <div class="col-md-9">
                        <!-- Main Content -->
                        <div class="headline">
                            <h2 class="margin-bottom-20"></h2>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas feugiat. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit
                            amet, consectetur adipiscing elit landitiis.</p>
                        <br>
                        <!-- Contact Form -->
                        <form>
                            <label>Name</label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6 col-md-offset-0">
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <label>Email
                                <span class="color-red">*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6 col-md-offset-0">
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <label>Message</label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-8 col-md-offset-0">
                                    <textarea rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                            <p>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </p>
                        </form>
                        <!-- End Contact Form -->
                        <!-- End Main Content -->
                    </div>
                    <!-- End Main Column -->
                    <!-- Side Column -->
                    <div class="col-md-3">
                        <!-- Recent Posts -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact Info</h3>
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, no cetero voluptatum est, audire sensibus maiestatis vis et. Vitae audire prodesset an his. Nulla ubique omnesque in sit.</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa-phone color-primary"></i>+353-44-55-66</li>
                                    <li>
                                        <i class="fa-envelope color-primary"></i>info@example.com</li>
                                    <li>
                                        <i class="fa-home color-primary"></i>http://www.example.com</li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li>
                                        <strong class="color-primary">Monday-Friday:</strong>9am to 6pm</li>
                                    <li>
                                        <strong class="color-primary">Saturday:</strong>10am to 3pm</li>
                                    <li>
                                        <strong class="color-primary">Sunday:</strong>Closed</li>
                                </ul>
                            </div>
                        </div>
                        <!-- End recent Posts -->
                    </div>
                    <!-- End Side Column -->
                </div>
            </div>
        </div>
        <!-- End Contact -->
        <!-- === END CONTENT === -->

     
@endsection   