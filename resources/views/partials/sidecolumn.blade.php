        <div class="col-md-3">
            <!-- Blog Tags -->
            <div class="blog-tags margin-top-50">
                <h3 class="margin-bottom-20">Categories</h3>
                @foreach(App\Category::where('priority','1')->get() as $cat)
                    <li>
                        <a href="{{url('categories/'.$cat->id)}}" class="blog-tag">{{$cat->name}}</a>
                    </li>
                @endforeach

                {!! Form::open(['url' => 'search','files'=>true, 'class'=>'margin-bottom-10'])!!}

                <div class="form-search" method="get" id="s" action="/"></div>
                        <div class="input-append">
                        <input type="text" class="input-medium search-query" name="s" placeholder="Search" value="">
                    <button type="submit" class="add-on"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                {!! Form::close() !!}


            </div>
            <!-- End Blog Tags -->
            
            <!-- Recent Posts -->
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Recent Posts</h3>
                    </div>
                    <div class="panel-body">
                    <ul class="posts-list margin-top-10">
                    @foreach(App\Post::orderBy('created_at','DESC')->take(3)->get() as $post)
                        
                            <li>
                                <div class="recent-post margin-top-10">
                                    <a href="">
                                        <img class="pull-left" src="{{url('/')}}/images/{{$post->post_photo}}" alt="thumb1">
                                    </a>
                                    <a href="{{url('posts/'.$post->id)}}" class="posts-list-title">{{$post->title}}</a>
                                    <br>
                                    <span class="recent-post-date">
                                        
                                    </span>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </li> 
                        

                    @endforeach
                    </ul>

                    </div>
                </div>
                <!-- End recent Posts -->
        </div>