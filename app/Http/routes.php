<?php



/*
|--------------------------------------------------------------------------
| Variables Accessible to All Views
|--------------------------------------------------------------------------
|
*/

View::share('site_name', 'Staff Portal');

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


/*
| Unauthenticated group
*/
Route::group(array('before' => 'guest'), function(){

	//Cross Site Request Forgery Protection
	Route::group(array('before'=>'csrf'), function(){

		//Create Account (POST)
		Route::post('/account-creating', array(
			'as'=>'account-create',
			'uses' => 'AccountController@store'
			));
		//Login to Account (POST)
		Route::post('/account-logging-in', array(
			'as'=>'account-login-post',
			'uses' => 'AccountController@postLogin'
			));

	});
});

	//Home (GET)
	Route::get('/', array(
		'as'=>'home',
		'uses' => 'WelcomeController@index'
		));

	//Login to Account (GET)
	Route::get('/login', array(
		'as'=>'login',
		'uses' => 'AccountController@createLogin'
		));

	//Create Account (GET)
	Route::get('/create', array(
		'as'=>'create',
		'uses' => 'AccountController@create'
		));
	Route::get('/activate/{code}', array(
		'as'=>'activate',
		'uses' => 'AccountController@getActivate'
		));




/*
| Authenticated User group
*/

Route::group(array('before' => 'auth'), function(){

	Route::group(array('before' => 'csrf'), function(){

		//POST Change Password
		Route::post('/account/change-password', array(
			'as'=>'change-password',
			'uses' => 'AccountController@postChangePassword'
			));

		//POST User Feedback
		Route::post('/account/feedback', array(
			'as'=>'feedback',
			'uses' => 'ContactController@postFeedback'
			));

	});

	//GET Dashboard
	Route::get('/account/dashboard', array(
		'as'=>'dashboard',
		'uses' => 'AccountController@dashboard'
		));

	//GET Change Password
	Route::get('/account/change-password', array(
		'as' => 'change-password',
		'uses' => 'AccountController@changePassword'
		));

	//GET logout (will log out when routed here)
	Route::get('/account/logout', array(
	  	'as' => 'logout', 
	  	'uses' => 'AccountController@logOut'
	  	));


	//Cross Site Request Forgery Protection for Uploads
	Route::group(array('before'=>'csrf'), function(){

		//Create Account (POST)
		Route::post('/account/upload', array(
			'as'=>'upload',
			'uses' => 'UploadsController@store'
			));

	});

});
