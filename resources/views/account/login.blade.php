@extends('layouts.main')
@section('content')

  @if (Session::has('check'))
    <div class="alert-box alert top-alert">{{{ Session::get('check') }}}</div>
  @endif
  @if (Session::has('global'))
    <div class="alert-box success top-alert">{{{ Session::get('global') }}}</div>
  @endif
  @if (Session::has('message'))
    <div class="alert-box success top-alert">{{{ Session::get('message') }}}</div>
  @endif

  	<div class="large-offset-2 large-8 column signin-signup">
	  <h2 class="center-text">{{{$site_name}}} Login</h2>
	  <p class="center-text"><a class="" href="../create">  Don't have an account?</a></p>
	  <form action="{{ URL::route('account-login-post') }}" method="post" class="large-6 large-offset-3 boxshadow1">
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
	        <label>Password
	          <input name="password" type="password"/> 
	          @if($errors->has('password'))
	            <p class="validation-error">{{ $errors->first('password') }}</p>
	          @endif
	        </label>
	      </div>
	    </div>
	    <div>
			<input id="remember" name="remember" type="checkbox">
			<label for="remember">Remember Me</label>
			<a class="forgot-link" href="{{ URL::route('get-email') }}">Forgot Password?</a>
		</div>
	    <div class="row">
	      <div class="columns">
	          <input class="button expand" type="submit" value="Login" />
	      </div>
	    </div>
	    {!! Form::token() !!}
	  </form>

	</div>

@stop