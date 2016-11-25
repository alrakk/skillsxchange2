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
Route::get('categories', function(){
	$categories = App\Category::all();

	return view('main',['categories'=>$categories]);
});

Route::get('categories/create', function(){
	$categories = App\Category::all();

	return view('newcategory');
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

Route::get('users', function(){
	$users = App\User::paginate(2);

	return view('users',['users'=>$users]);
});
Route::get('users/create', function(){

	return view('signup-page');
});


Route::get('users/{id}', function($id){
	$user = App\User::find($id);

	return view('users',['user' =>$user]);

});



//--------------------New User------------------------//

Route::post('users', function(){
	$input = Request::all();

	//return $input;

	$rules = [
		'firstname' => 'required',
		'lastname' => 'required',
		'email'=>'required',
		'password'=>'required',
		'photo'=>'required',
		'about'=>'required',
		'category_offering'=>'required',
		'category_seeking'=>'required',


	];

	$validator = Validator::make($input, $rules);

	if($validator->passes() == true){

		$user = App\User::create($input);
		$user->password = bcrypt($user->password);

		$newName = 'photo_'. $user->id.'.jpg';
		Request::file('photo')->move('images', $newName);
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
	
		
		Auth::login($user);
		return redirect('users/'.$user->id);

	}else{
		return redirect ('users/create')->withInput()->withErrors($validator);
    
	}

});


//----------------------User Details-------------------------//

Route::get('users/{id}', function($id){
	$user = App\User::find($id);

	return view('userdetails', ['user' =>$user]);
});

Route::get('users/{id}/edit', function($id){
	$user = App\User::find($id);

	return view('edituser',['user'=>$user]);
});

Route::put('users/{id}', function($id){
	$input = Request::all();

	$rules =[

		'firstname' => 'required',
		'email' => 'required',
		'category_offering'=>'required',
		'category_seeking'=>'required',

	];

	$validator = Validator::make($input, $rules);

	if($validator->passes() == true){

		$user = App\User::find($id);
		$user->fill($input);
		$user->save();

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
		


		$column=$input['column'];
	    $value= $input['value']; 
	            
	    $user = User::find($id);
	    $user->$column =$value;
	    $user->save();
	
	    return redirect('users/'.$id.'/edit')->
			withInput()->withErrors($validator);
	   }



});


//-------------------Comments User--------------------------------//

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
});

//---------------------POSTS-----------------------//

Route::get('posts', function(){
	$posts= App\Post::paginate(1);
	

	return view('allposts',['posts'=>$posts]);
});

Route::get('posts/create', function(){
	return view ('newpostform');
	
});

Route::get('posts/{id}', function($id){

	$post= App\Post::find($id);

	return view('singlepost',['post'=>$post]);

});

Route::post('posts', function(){

	$input = Request::all();

	$rules = [

        'title'=>'required',
        'content'=>'required',
        'post_photo'=>'required',

    ];

    $validator = Validator::make($input, $rules);

    if($validator->passes()==true){

    	$post = App\Post::create($input);

    	$newName = 'photo_'.$post->id.'.jpg';
    	Request::file('post_photo')->move('images',$newName);
    	$post->post_photo = $newName;
    	$post->save();

    	return redirect('posts/'.$post->id); 	

    }else{
    	return redirect('posts/create')->withInput()->withErrors($validator);
    }
});

Route::put('posts/{id}',function($id){


        $input=Request::all();

        $column =$input['column'];
        $value=$input['value'];

        $post = App\Post::find($id);
        $post->$column =$value;
        $post->save();

        return $value;

       
});

Route::delete('posts/{id}', function($id){

    $post = App\Post::find($id);
    $post->delete();

    return redirect('posts');

});


//-----------------------Comments Posts-------------------//

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


//----------------------Auth-------------------------------//

Route::get('login', function(){
	return view('login');
});

Route::post('login', function(){
    $input = Request::only('email', 'password');

    if(Auth::attempt($input)== true){
       
        return redirect('categories');

    }else{
        return redirect('login')->with('message','Try again');
    }
        
});

Route::get('logout', function(){

    Auth::logout();

    return redirect('login');
});

//--------------------SEARCH------------------------------//

Route::get('search', function(){
	return view('search');
});
