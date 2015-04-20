<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth, View, Validator, Input, Redirect, Session, App\User, Hash, Mail, URL;

use Illuminate\Http\Request;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}


	/**
	 * Show the form for creating a new account.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('account.create');
	}


	/**
	 * Store a newly created resource in Users Database.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Store the info from account.create
		$validator = Validator::make(Input::all(), array(
			'first_name'      => 'required|min:3|max:25',
			'last_name'       => 'required|min:3|max:30',
			'email'           => 'required|pssemail|max:50|email|unique:users',
			'verify_email'    => 'required|same:email',
			'password'        => 'required|min:6|max:18',
			'verify_password' => 'required|same:password',
			'department'      => 'required|deptselect'


		));

		if($validator->fails())
		{
			return Redirect::route('create')
				->withErrors($validator)
				->withInput();
		}
		else
		{
			$first_name = Input::get('first_name');
			$last_name  = Input::get('last_name');
			$department = Input::get('department');
			$email      = Input::get('email');
			$password   = Input::get('password');


			//Activation Code 
			$code = str_random(60);

			$user = User::create(array(
				'first_name'=> $first_name,
				'last_name' => $last_name,
				'email'     => $email,
				'department'=> $department,
				'password'  => Hash::make($password),
				'code'      => $code,
				'active'    => 0
			));

			if($user){

				Mail::send('emails.auth.activate', array('link' => URL::route('activate', $code), 'name' => $first_name), 
					function($message) use ($user){
						$message->to($user->email, $user->name)->subject('Activate Your Account'); 
					});

				return Redirect::route('create')->with('global', 'Your account has been created! Make sure to check
				 your email for your activation link and then you can login and begin creating your profile.');
			}

		}

	}

	/**
	 * Go through the Activation Email process
	 *
	 */
	public function getActivate($code)
	{
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if ($user->count()) {
			$user = $user->first();
			$user->active = 1;
			$user->code = '';

			if ($user->save()) {
				return Redirect::route('login')->with('global', 'Your account has been activated and you are now ready to login!');
			}
		}

		return Redirect::route('login')->with('check', 'We could not activate your account at this time.  Please try again later.');
	}


	/**
	 * Show the form for logging into account.
	 *
	 * @return Response
	 */
	public function createLogin()
	{
		if (Auth::check()) {
			return View::make('account.dashboard');
		}
		else{
			return View::make('account.login');
		}
	}


	/**
	 * Show the form for logging into account.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$validator = Validator::make(Input::all(), array(
			'email'    => 'required|email',
			'password' => 'required'
		));

		if($validator->fails())
		{
			return Redirect::route('account-login')
				->withErrors($validator)
				->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'email'    => Input::get('email'),
				'password' => Input::get('password'),
				'active'   => 1
				), $remember
			);

			if ($auth) {
				
				return Redirect::route('dashboard');
			}
			else
			{
				return Redirect::route('login')->with('check', 'Please check your email and password. ');
			}
		}

		return Redirect::route('login')->with('global', 'There was a problem signing you in. Have you activated your account? ');

	}


	/**
	 * Display dashboard to logged in user
	 */
	public function dashboard()
	{

		if (Auth::user()) {
			return View::make('account.dashboard');
		}
		else
		{
			return View::make('account.login');
		}
	}


	/**
	 * Display Change Password View
	 */
	public function changePassword()
	{
		return View::make('account.passchange');
	}


	/**
	 * POST Change Password View
	 */
	public function postChangePassword()
	{
		$validator = Validator::make(Input::all(), array(
			'current_password' => 'required',
			'password'         => 'required|min:6', 
			'verify_password'  => 'required|same:password'
		));

		if($validator->fails())
		{
			return Redirect::route('change-password')
				->withErrors($validator);
		}
		else
		{
			$user = User::find(Auth::user()->id);
			$current_password = Input::get('current_password');
			$password         = Input::get('password');

			if (Hash::check($current_password, $user->getAuthPassword())) {

				$user->password = Hash::make($password);

				if ($user->save()) {

					return Redirect::route('login')->with('global', 'Your password has been successfully changed!');

				}
			}
			else {

				return Redirect::route('change-password')->with('check', 'Your current password was incorrect.');

			}
		}

		return Redirect::route('change-password')->with('check', 'There was a problem changing your password.');

	}


	/**
	 * Logout current user
	 */
	public function logOut()
	{
		Auth::logout();
		Session::flush();
    	return Redirect::route('login')->with('message', 'You have been successfully logged out!');	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
