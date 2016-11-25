@extends('templatepages')
@section('content')

	<div id="content">
        <div class="container background-white">
            <div class="row margin-vert-40">
                    
                <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        
                    <div class="blog-post-body">
	                    <h2 class="margin-bottom-20">Your Account Details</h2>
	                    

	                    	<h3 class="margin-bottom-20">Photo</h3>
							<img src="{{url('/')}}/images/{{$user->photo}}" alt="" class="img-thumbnail">

	                        <h3 class="margin-top-30">First Name:</h3>
							<p class="margin-top-10">{{$user->firstname}}</p>

							<h3>Last Name:</h3>
							<p class="margin-top-10">{{$user->lastname}}</p>

							<h3>Email:</h3>
							<p class="margin-top-10">{{$user->email}}</p>

							<h3>About Me:</h3>
							<p class="margin-top-10">{{$user->about}}</p>


							<h3 class="margin-top-30">Offering:</h3>
							<p class="margin-top-10">
								@foreach($user->offerings as $offering)
									{{$offering->name}},
								@endforeach
							</p>

							<h3 class="margin-top-30">Seeking:</h3>
							<p class="margin-top-10">
								@foreach($user->seekings as $seeking)
									{{$seeking->name}},
								@endforeach

							</p>

							{{-- <a href="{{url('users/'.$user->id.'/edit')}}" class=" btn btn-primary">Edit Details</a> --}}


							<a href="{{url('users/'.Auth::user()->id.'/edit')}}" class="btn btn-primary margin-top-40 ">Edit Details</a>

                    </div>
                </div>
            </div>
        </div>
	</div>




@endsection!!