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
	  <p class="center-text"><a class="" href="dashboard">  Nevermind?</a></p>
	  <form action="{{ URL::route('change-password') }}" method="post" class="large-6 large-offset-3 boxshadow1">
	    <div class="row">
	      <div class="columns">
	        <label>Current Password
	        <input name="current_password" type="password"/>
	          @if($errors->has('current_password'))
	            <p class="validation-error">{{ $errors->first('current_password') }}</p>
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
	          <input name="verify_password" type="password"/> 
	          @if($errors->has('verify_password'))
	            <p class="validation-error">{{ $errors->first('verify_password') }}</p>
	          @endif
	        </label>
	      </div>
	    </div>
	    <div class="row">
	      <div class="columns">
	          <input class="button expand" type="submit" value="Change Password" />
	      </div>
	    </div>
	    {!! Form::token() !!}
	  </form>
	</div>
	

@stop