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

                            <!-- User Item Details -->
                                <div class="blog-post-details">
                                    <p><b>{{$user->city}}, {{$user->country}}</b></p>
                                <!-- End User Name -->                            
                                </div>
                            <!-- End User Item Details -->
                            </div>
                        <!-- End User Item Header -->
                        

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

                                                    
                                            <!-- Pop Up -->

                                   <div class="bd-example">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Connect</button>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                      <h4 class="modal-title" id="exampleModalLabel">Send Message</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form>
                                                        <div class="form-group">
                                                          <label for="recipient-name" class="form-control-label">Name</label>
                                                          <input type="text" class="form-control" id="Name">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="message-text" class="form-control-label">Subject</label>
                                                          <input class="form-control" id="subject"></input>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="message-text" class="form-control-label">Email</label>
                                                          <input class="form-control" id="email"></input>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="message-text" class="form-control-label">Message:</label>
                                                          <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                      </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Send message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Pop Up -->
                                   
                                            
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
                            <li class="">
                                <a href="#">Previous</a>
                            </li>
                            <li>
                                <a href="#">Next</a>
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