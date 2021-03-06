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
		//POST Route to Password Change Reminder Email
		Route::post('/post-reminder', array(
			'as'=>'post-reminder',
			'uses' => 'Auth\PasswordController@postEmail'
			));
		//POST Route to Password Resetting
		Route::post('/post-reset', array(
			'as'=>'post-reset',
			'uses' => 'Auth\PasswordController@postReset'
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

	//Show login page after activation successful (GET)
	Route::get('/activate/{code}', array(
		'as'=>'activate',
		'uses' => 'AccountController@getActivate'
		));

	//GET Change Password
	Route::get('/password-remind', array(
		'as' => 'get-email',
		'uses' => 'Auth\PasswordController@getEmail'
		));

	//GET Reset Password view with token
	Route::get('/password/reset/{token}', array(
		'as' => 'get-reset',
		'uses' => 'Auth\PasswordController@getReset'
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


});
