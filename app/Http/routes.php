<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('categories', function() {
//     //return view('welcome');
//     return view('main');
// });

// Route::get('test', function () {
//     return App\Category::all();

// });

//-------------------------Categories-------------------//
//------------------------------------------------------//

Route::get('categories', function(){
	$categories = App\Category::all();

	return view('main',['categories'=>$categories]);
});

Route::get('categories/create', function(){
	$categories = App\Category::all();

	return view('newcategory');

})->middleware(['auth','admin']);

Route::get('categories/other', function(){
	$users = App\User::whereHas('categories', function ($query) {
        $query->where('priority',0);
    })
    ->distinct()->paginate(3);

	return view('users-category-other',['users'=> $users]);
});

Route::get('categories/{id}', function($id){
	$category = App\Category::find($id);

	return view('users-category',['category'=> $category]);
});


Route::post('categories', function(){
	$input = Request::all();

	$rules = [
		'name' => 'required',
		'photo_category' => 'required',

	];

	$validator = Validator::make($input, $rules);

	if($validator->passes()==true){

		$category = App\Category::create($input);

		$newName ='photo_'.$category->id.'.jpg';
		Request::file('photo_category')->move('images',$newName);
		$category->photo_category=$newName;
		$category->save();

		return redirect('categories');

	}else{
		return redirect('categories/create')->withInput()->withErrors($validator);
	}

})->middleware(['auth','admin']);



//-------------------------Users------------------------//
//------------------------------------------------------//

Route::get('users', function(){
	$users = App\User::paginate(2);

	return view('users',['users'=>$users]);

})->middleware(['auth']);

Route::get('users/create', function(){

	return view('signup-page');

});

//--------------------New User------------------------//
//----------------------------------------------------//

Route::post('users', function(){
	$input = Request::all();

	//return $input;

	$rules = [
		'firstname' => 'required',
		'lastname' => 'required',
		'email'=>'required',
		'city'=>'required',
		'country'=>'required',
		'password'=>'required',
		'about'=>'required',
		'category_offering'=>'required',
		'category_seeking'=>'required',


	];

	$validator = Validator::make($input, $rules);

	if($validator->passes() == true){

		$user = App\User::create($input);
		$user->password = bcrypt($user->password);

		$newName = 'defaultprof.jpeg';
		if(Request::hasFile('photo')){

			$newName = 'photo_'. $user->id.'.jpg';
			Request::file('photo')->move('images', $newName);

		}
		
		$user->photo = $newName;
		$user->save();

		$cat_offerings = $input['category_offering'];
		$user->categories()->attach($cat_offerings, ['type' => 'offering']);
		if(Request::has('other_offering')){

			$otherOffering = Request::get('other_offering');

			$newCat = new App\Category();
			$newCat->name = $otherOffering;
			$newCat->priority = 0;
			$newCat->save();

			$user->categories()->attach($newCat->id, ['type' => 'offering']);


		}

		$cat_seekings = $input['category_seeking'];
		$user->categories()->attach($cat_seekings, ['type' => 'seeking']);
		if(Request::has('other_seeking')){

			$otherSeeking = Request::get('other_seeking');

			$newCat = new App\Category();
			$newCat->name = $otherSeeking;
			$newCat->priority = 0;
			$newCat->save();

			$user->categories()->attach($newCat->id, ['type' => 'seeking']);


		}
		flash()->overlay('Registration successful!', 'Skills Xchange');
		
		Auth::login($user);
		return redirect('users/'.$user->id);

	}else{
		return redirect ('users/create')->withInput()->withErrors($validator);
    
	}

});


//----------------------User Details-------------------------//
//----------------------------------------------------------//

Route::get('users/{id}', function($id){
	$user = App\User::find($id);

	return view('userdetails', ['user' =>$user]);

})->middleware(['auth','useraccount']);

Route::get('users/{id}/edit', function($id){
	$user = App\User::find($id);

	//collection of  array
	// dd( $user->offerings()->lists('categories.id'));

		
	return view('edituser',['user'=>$user]);

})->middleware(['auth','useraccount']);

Route::put('users/{id}', function($id){
	$input = Request::all();

	$rules =[

		'firstname' => 'required',
		'email' => 'required',
		'city'=> 'required',
		'country'=> 'required',
		'category_offering'=>'required',
		'category_seeking'=>'required',

	];

	$validator = Validator::make($input, $rules);

	if($validator->passes() == true){
		$user = App\User::find($id);
		
		$user->fill($input);
		$user->save();

		if(Request::hasFile('photo')){

			$newName = time().'photo_'. $user->id.'.jpg';
			Request::file('photo')->move('images', $newName);
			$user->photo = $newName;
			$user->save();


		}
			


		$user->categories()->detach();

		$cat_offerings = $input['category_offering'];


		$user->categories()->attach($cat_offerings, ['type' => 'offering']);
		if(Request::has('other_offering')){

			$otherOffering = Request::get('other_offering');

			$newCat = new App\Category();
			$newCat->name = $otherOffering;
			$newCat->priority = 0;
			$newCat->save();

			$user->categories()->attach($newCat->id, ['type' => 'offering']);


		}

		$cat_seekings = $input['category_seeking'];
		$user->categories()->attach($cat_seekings, ['type' => 'seeking']);
		if(Request::has('other_seeking')){

			$otherSeeking = Request::get('other_seeking');

			$newCat = new App\Category();
			$newCat->name = $otherSeeking;
			$newCat->priority = 0;
			$newCat->save();

			$user->categories()->attach($newCat->id, ['type' => 'seeking']);


		}

		return redirect('users/'.$id);

	}else{
		

	    return redirect('users/'.$id.'/edit')->
			withInput()->withErrors($validator);
	   }

})->middleware(['auth','useraccount']);


//-------------------Comments User------------------------ //
//--------------------------------------------------------//

Route::post('user-comments', function(){

	$input = Request::all();

		$comment = new App\Comment();
	
		$comment->content = $input['content'];
		$comment->user_id = Auth::user()->id;
		$comment->commentable_id = $input['user-for'];
		$comment->commentable_type = 'App\User';
		$comment->save();

		return Redirect::back();

	
});

Route::delete('comments/{id}', function($id){

	$comment = App\Comment::find($id);
	$comment->delete();

	return Redirect::back();

})->middleware(['auth']);

//---------------------POSTS-----------------------//
//-------------------------------------------------//

Route::get('posts', function(){
	$posts= App\Post::paginate(1);
	

	return view('allposts',['posts'=>$posts]);
});

Route::get('posts/create', function(){
	return view ('newpostform');
	
})->middleware(['auth']);

Route::get('posts/{id}', function($id){

	$post= App\Post::find($id);

	return view('singlepost',['post'=>$post]);

});

Route::get('posts/{id}/edit', function($id){
	
	$post = App\Post::find($id);	
	
	return view('editpost',['post'=>$post]);

});




Route::post('posts', function(){

	$input = Request::all();

	$rules = [

        'title'=>'required',
        'content'=>'required',
   

    ];

    $validator = Validator::make($input, $rules);

    if($validator->passes()==true){
    	$post = App\Post::create($input);
    	
    	$newName = 'defaultpost.jpg';

		if(Request::hasFile('post_photo')){

	    	$newName = 'photo_'.$post->id.'.jpg';
	    	Request::file('post_photo')->move('images',$newName);
    	}

    	$post->post_photo = $newName;
    	$post->save();

    	return redirect('posts/'.$post->id); 	

    }else{
    	return redirect('posts/create')->withInput()->withErrors($validator);
    }

});


Route::put('posts/{id}',function($id){


    $input= Request::all();

    $rules =[

        'content'=>'required',

    ];

    $validator = Validator::make($input, $rules);

    if($validator->passes() == true){

        $post = App\Post::find($id);
        $post->fill($input);
        $post->save();

   //      	$newName = time().'photo_'. $post->id.'.jpg';
			// Request::file('post_photo')->move('images', $newName);
			// $post->post_photo = $newName;
			// $post->save();

    return redirect('posts/'.$id);


    }else{
        return redirect('posts/'.$id.'/edit')->withInput()->withErrors($validator);

    }


       
});

Route::delete('posts/{id}', function($id){

    $post = App\Post::find($id);
    $post->delete();

    return redirect('posts');

});


//--------------------Comments Posts-------------------//
//-----------------------------------------------------//

Route::post('post-comments',function(){

    $input = Request::all();

        $comment = new App\Comment();
        $comment->content = $input['content'];
        $comment->user_id = Auth::user()->id;
        $comment->commentable_id = $input['post_id'];
        $comment->commentable_type = 'App\Post';
        $comment->save();


     return Redirect::back();

});

Route::delete('comments/{id}', function($id){

    $comment = App\Comment::find($id);
    $comment->delete();

    return Redirect::back();

});


//----------------------Auth---------------------//
//-----------------------------------------------//

Route::get('login', function(){
	return view('login');
});

Route::post('login', function(){
    $input = Request::only('email', 'password');

    if(Auth::attempt($input)== true){

       flash()->overlay('You are logged in!', 'Skills Xchange');

        return redirect('categories');

    }else{
        return redirect('login')->with('message','Try again');
    }


        
});

Route::get('logout', function(){

    Auth::logout();

    return redirect('login');
});

//--------------------SEARCH------------------------//
//--------------------------------------------------//

Route::post('search', function(){

	$word = Request::get('s');

	$cats = App\Category::where('name','LIKE','%'.$word.'%')->get();
	$searchUsers = App\User::where('firstname','LIKE','%'.$word.'%')->orWhere('firstname','LIKE','%'.$word.'%')->get();

	return view('search',compact('cats','searchUsers'));
});

//------------------EMAIL--------------------------//
//-------------------------------------------------//

Route::get('contact', function () {

	return Redirect::back();
});

Route::post('contact', function () {

	$data = Request::all();

	//return $data;

	$reciever = App\User::find($data['user_id']);
	$sender = Auth::user();

	Mail::send('emailtemplate', $data, function ($message) use ($reciever,$sender) {
	    $message->from($sender->email, 'Skills Xchange');
	    $message->to($reciever->email);

	});
	
	flash()->overlay('Message has been sent!', 'Skills Xchange');

	return Redirect::back();
	
});


//------------------dropzone---------------------//
//----------------------------------------------//


Route::post('photos', function () {


	$post = App\Post::find(Request::get('post_id'));
    $newName = time().'photo_'. $post->id.'.jpg';
    Request::file('photo')->move('images',$newName);
	$post->post_photo = $newName;
	$post->save();
	return $newName;


});



