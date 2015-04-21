<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

use View, Password, Input;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

	/**
	 * Display Password Reminder View
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}


    /**
    * Handle a POST request to remind a user of their password.
    *
    * @return Response
    */
    public function postRemind()
    {
      switch (Password::remind(Input::only('email')))
      {
        case Password::INVALID_USER:
          return Redirect::back()->with('error', Lang::get($reason));

        case Password::REMINDER_SENT:
          return Redirect::back()->with('status', Lang::get($reason));
      }
    }



	/**
	 * Display Change Password View
	 */
	public function getPassChange()
	{
		return View::make('account.passchange');
	}


	/**
	 * POST Change Password View
	 */
	public function postPassChange()
	{
		$validator = Validator::make(Input::all(), array(
			'current_password' => 'required',
			'password'         => 'required|min:6|max:18', 
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
					Auth::logout();
					return Redirect::route('login')->with('global', 'Your password has been successfully changed!  You may now login using your new password.');

				}
			}
			else {

				return Redirect::route('change-password')->with('check', 'Your current password was incorrect.');

			}
		}

		return Redirect::route('change-password')->with('check', 'There was a problem changing your password.');

	}

}
