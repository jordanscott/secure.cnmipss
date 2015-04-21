<!-- THIS IS THE VIEW THAT SENDS AN EMAIL TO CONFIRM THE USER BEFORE PASSWORD RESET IS ALLOWED -->

@extends('layouts.main')
@section('content')

  @if (Session::has('check'))
    <div class="center-text alert-box alert top-alert">{{{ Session::get('check') }}}</div>
  @endif
  @if (Session::has('global'))
    <div class="center-text alert-box success top-alert">{{{ Session::get('global') }}}</div>
  @endif
  @if (Session::has('message'))
    <div class="center-text alert-box success top-alert">{{{ Session::get('message') }}}</div>
  @endif

  <div class="large-offset-2 large-8 clearfix column signin-signup">
	  	<h2 class="center-text">Password Reminder</h2>
	  	<p class="center-text"><a class="" href="{{URL::route('login')}}">  Go Back?</a></p>
      {!!Form::open(['route'=>'send-reminder'])!!}
        {!!Form::label('email', 'Email')!!}<br>
        {!!Form::text('email', null, ['required' => true])!!}<br>
        @if(Session::has('error'))

          <p>{{ Session::get('error') }}</p>

        @elseif(Session::get('success'))

          <p>Please check your email!</p>

        @endif
        {!!Form::submit('Send Reset Email')!!}
      {!!Form::close()!!}

      

  </div>

    

	

  
	

@stop


