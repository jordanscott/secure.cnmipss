<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input, Validator, Mail, Redirect;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Send user feedback to me.
	 *
	 * @return Response
	 */
	public function postFeedback()
	{
        //Validate data
        $validator = Validator::make(Input::all(), array(
            'feedback' => 'required|min:5|max:250'
        ));

        //If everything is correct than run passes.
        if ($validator -> passes()){

 		   $feedback = array(
 		   		'feedback' => Input::get('feedback'));

           Mail::send('emails.feedback', $feedback, function($message) use ($feedback)
            {
            	$message->to('jordan.scott@cnmipss.org', 'Jordan')->subject('Feedback | Staff Portal');

			});
		   // Redirect to page
		   return Redirect::route('dashboard')
		    ->with('message', 'Your feedback is much appreciated. Thank You!');

		              
	    }else{
			//return contact form with errors
	        return Redirect::route('dashboard')
	         ->with('error', 'Feedback must contain more than 5 characters. Please try again.');
	    }
	
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
