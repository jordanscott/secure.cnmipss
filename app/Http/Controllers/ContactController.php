<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
		//Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array (
            'feedback' => 'required|min:5|max:250'
        );

        //Validate data
        $validator = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){

           Mail::send('emails.feedback', $data, function($message) use ($data)
            {
                //$message->from($data['email'] , $data['first_name']); uncomment if using first name and email fields 
                $message->from('feedback@gmail.com', 'feedback contact form');
			    //email 'To' field: cahnge this to emails that you want to be notified.                    
			    $message->to('feedback@gmail.com', 'John')->cc('feedback@gmail.com')->subject('feedback form submit');

			            });
			            // Redirect to page
			   return Redirect::route('home')
			    ->with('message', 'Your message has been sent. Thank You!');


			            //return View::make('contact');  
			         }else{
			   //return contact form with errors
			            return Redirect::route('home')
			             ->with('error', 'Feedback must contain more than 5 characters. Try Again.');

			         }
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
