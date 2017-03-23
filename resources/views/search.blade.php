@extends('templatepages')
@section('content')


        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <!-- Main Column -->
                    <div class="col-md-9">
                        <h1>{{-- {{$category->name}} --}}</h1>
                   
                        <!-- User Post -->

                        @foreach($cats as $cat)
                            <h1>{{$cat->name}}</h1>

                            @foreach($cat->users as $user)
                                <div class="blog-post padding-top-20">

                                <!-- User Item Header -->
                                <div class="blog-item-header">                           
                                    <h2>{{$user->firstname}} {{$user->lastname}}</h2>

                                    <div class="blog-post-details">
                                        <p><b>{{$user->city}}, {{$user->country}}</b></p>                      
                                    </div>
                                <!-- End User Item Details -->
                                </div>
                            
                        
                                <!-- User Item Body -->
                                <div class="blog">
                                    <div class="clearfix"></div>

                                    <div class="blog-post-body row margin-top-15">
                                        <div class="col-md-5">
                                            <img class="margin-bottom-20" src="{{url('/')}}/images/{{$user->photo}}" alt="thumb1">
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

                                                    
                                                <!-- Modal Contact -->
                                                 @include('partials.contactmodal')
                                                <!-- End Modal Contact -->   
                                            </div>
                                    </div>
                                </div>
                                    <!-- End User Item Body -->
                                </div>
                                
                            @endforeach

                        @endforeach

                            @foreach($searchUsers as $user)
                                <div class="blog-post padding-top-20">

                                <!-- User Item Header -->
                                <div class="blog-item-header">                           
                                    <h2>{{$user->firstname}} {{$user->lastname}}</h2>

                                    <div class="blog-post-details">
                                        <p><b>{{$user->city}}, {{$user->country}}</b></p>                      
                                    </div>
                                <!-- End User Item Details -->
                                </div>
                            
                        
                                <!-- User Item Body -->
                                <div class="blog">
                                    <div class="clearfix"></div>

                                    <div class="blog-post-body row margin-top-15">
                                        <div class="col-md-5">
                                            <img class="margin-bottom-20" src="{{url('/')}}/images/{{$user->photo}}" alt="thumb1">
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

                                                    
                                        <!-- Modal Contact -->
                                        @include('partials.contactmodal')
                                        <!-- End Modal Contact -->
                                              
                                            </div>
                                    </div>
                                </div>
                                    <!-- End User Item Body -->
                                </div>
                            @endforeach
                        <!-- End User Item -->
                        
                        <!-- Pagination -->
                        {{-- {{$cats->links()}} --}}
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