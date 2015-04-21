<!-- THIS IS THE VIEW FOR THE PASSWORD RESET FORM THAT IS GIVEN AFTER THE EMAIL REMINDER LINK IS CLICKED -->

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
	  <h2 class="center-text">Change Your Password</h2>
	  <p class="center-text"><a class="" href="../dashboard">  Nevermind?</a></p>
	  {{-- <form action="{{ URL::route('post-reset') }}" method="post" class="large-6 large-offset-3 boxshadow1">
	    <div class="row">
	      <div class="columns">
	        <label>Email
	          <input name="email" type="text"{{ Input::old('email') ? ' value="' . e(Input::old('email')) . '"' : '' }} />
	          @if($errors->has('email'))
	            <p class="validation-error">{{ $errors->first('email') }}</p>
	          @endif
	        </label>
	      </div>
	    </div>
	    <div class="row">
	      <div class="columns">
	        <label>New Password
	          <input name="password" type="password"/> 
	          @if($errors->has('password'))
	            <p class="validation-error">{{ $errors->first('password') }}</p>
	          @endif
	        </label>
	      </div>
	    </div>
	    <div class="row">
	      <div class="columns">
	        <label>Verify New Password
	          <input name="password_confirmation" type="password"/> 
	          @if($errors->has('password_confirmation'))
	            <p class="validation-error">{{ $errors->first('password_confirmation') }}</p>
	          @endif
	        </label>
	      </div>
	    </div> --}}
	    {{Form::open(['route'=>'post-reset'])}}

	    	{{Form::label('email', 'Email')}}
	    	{{Form::text('email')}}

	    	{{Form::label('password', 'Password')}}
	    	{{Form::text('password')}}

	    	{{Form::label('password_confirmation', 'Verify Password')}}
	    	{{Form::text('password_confirmation')}}

	    	{{Form::submit('Create New Password')}}

	    	{{ Form::hidden('token', $token) }}

	    	@if(Session::has('error'))

	          <p>{{ Session::get('error') }}</p>

	        @elseif(Session::get('success'))

	          <p>Please check your email!</p>

	        @endif

	    {{Form::close()}}
	    
	    {{-- <div class="row">
	      <div class="columns">
	          <input class="button expand" type="submit" value="Change Password" />
	      </div>
	    </div> --}}
	    
	  {{-- </form> --}}
	</div>
	

@stop