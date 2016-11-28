@extends('templatepages')
@section('content')


        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <!-- Main Column -->
                    <div class="col-md-9">
                   
                        <!-- User Post -->

                        @foreach($cats as $cat)
                            @foreach($cat->users as $user)
                            <div class="blog-post padding-bottom-20">
                                <!-- User Item Header -->
                                
                                <div class="blog-item-header margin-top-30">
                                    
                                    <h2>{{$user->firstname}}</h2>

                                    <!-- User Item Details -->
                                    <div class="blog-post-details">
                                        <!-- Author Name -->
                                        <div class="blog-post-details-item blog-post-details-item-left">
                                            
                                        </div>
                                        <!-- End User Name -->
                                        <!-- Date -->
                                        <div class="blog-post-details-item blog-post-details-item-left">
                                            
                                        </div>
                                        <!-- End Date -->
                                        
                                        <!-- # of Comments -->
                                        <div class="blog-post-details-item blog-post-details-item-left blog-post-details-item-last">
                                            <a href="">
                                               
                                            </a>
                                        </div>
                                        <!-- End # of Comments -->
                                    </div>
                                    <!-- End User Item Details -->
                                </div>
                                <!-- End User Item Header -->

                                <!-- User Item Body -->
                                <div class="blog">
                                    <div class="clearfix"></div>

                                    <div class="blog-post-body row margin-top-15">
                                        <div class="col-md-5">
                                            <img class="margin-bottom-20" src="images/prof1.jpeg" alt="thumb1">
                                        </div>
                                        <div class="col-md-7 padding-right-20">

                                            <p>About me:Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolor.</p>
                                            <p>Offering:Care, sitting, walk dogs</p>
                                            <p>Seeking: Cooking classes</p>
                                            
                                            <a href="contact.html" class="btn btn-primary">
                                                Connect
                                                <i class="icon-chevron-right readmore-icon"></i>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End User Item Body -->
                            </div>
                            @endforeach

                        @endforeach
                        <!-- End User Item -->
                        
                        <!-- Pagination -->
                        <ul class="pagination">
                            <li>
                                <a href="#">&laquo;</a>
                            </li>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li class="disabled">
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li>
                                <a href="#">&raquo;</a>
                            </li>
                        </ul>
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