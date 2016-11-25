@extends('templatepages')
@section('content')

	<div id="content">
	    <div class="container background-white">
	        <div class="row margin-vert-40">
	                    
	            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
	                        
	                <div class="blog-post-body">
		                <h2 class="margin-bottom-20">Update Your Details</h2>

					{!! Form::open(['url' => 'users/'.$user->id, 'method'=>'put'])!!}


					<div class="form-group margin-bottom-20"> 
						<label for="">First Name</label>
						{!!Form::text('firstname',$user->firstname,['class'=>'form-control']);!!}
						<p>{{$errors->first('firstname')}}</p>
					</div>

					<div class="form-group margin-bottom-20"> 
						<label for="">Last Name</label>
						{!!Form::text('lastname',$user->lastname,['class'=>'form-control']);!!}
						<p>{{$errors->first('lastname')}}</p>
					</div>
					
					<div class="form-group margin-bottom-20"> 
						<label for="">Email</label>
						{!!Form::text('email',$user->email,['class'=>'form-control']);!!}
						<p>{{$errors->first('email')}}</p>
					</div>

					<div class="form-group margin-bottom-20"> 
						<label for="">About Me</label>
						{!!Form::textarea('about',$user->about,['class'=>'form-control']);!!}
						<p>{{$errors->first('about')}}</p>
					</div>

					<p>Please choose one or more categories you are interested to Xchange.</p>

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

                    <div class="form-inline margin-bottom-50">
                        <div class="form-group">
                        	<label for="">Other:</label>
                         	{!!Form::text('other_seeking','',['class'=>'form-control','placeholder'=>"Let us know"]);!!}
                      	</div>
                    </div>  
                           

					
					<input class="btn btn-primary margin-top-30" type="submit" value="Update details">

	    
					{!! Form::close() !!}
					
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection