@extends('layouts.main')
@section('content')

@if (Session::has('global'))
  <div class="center-text alert-box success top-alert">{{{ Session::get('global') }}}</div>
@endif

<div class="large-8 large-centered columns clearfix signin-signup">
  <h2 class="center-text">Create Your Account</h2>
  <p class="center-text"><a class="" href="{{ URL::route('login') }}">Already have an account?</a></p>
  
  <form action="{{ URL::route('account-create') }}" method="post" class="boxshadow1 columns">
    <div class="row">
      <div class="large-6 columns">
        <label>First Name
          <input name="first_name" type="text" value="{{ old('first_name') }}" >
          @if($errors->has('first_name'))
            <p class="validation-error">{{ $errors->first('first_name') }}</p>
          @endif
        </label>
      </div>
      <div class="large-6 columns">
        <label>Last Name
          <input name="last_name" type="text" value="{{ old('last_name') }}" >
          @if($errors->has('last_name'))
            <p class="validation-error">{{ $errors->first('last_name') }}</p>
          @endif
        </label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <label>Your Email
          <input name="email" type="email" value="{{ old('email') }}" >
          @if($errors->has('email'))
            <p class="validation-error">{{ $errors->first('email') }}</p>
          @endif
        </label>
      </div>
      <div class="large-6 columns">
        <label>Verify Email
          <input name="verify_email" type="email" value="{{ old('verify_email') }}" >
          @if($errors->has('verify_email'))
            <p class="validation-error">{{ $errors->first('verify_email') }}</p>
          @endif
        </label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <label>Create Password
          <input name="password" type="password">
          @if($errors->has('password'))
            <p class="validation-error">{{ $errors->first('password') }}</p>
          @endif
        </label>
      </div>
      <div class="large-6 columns">
        <label>Verify Password
          <input name="verify_password" type="password">
          @if($errors->has('verify_password'))
            <p class="validation-error">{{ $errors->first('verify_password') }}</p>
          @endif
        </label>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <label>Department within PSS
          <select name="department">
            <option value="None">Select...</option>
            <option value="Accountability, Research and Evaluation">Accountability, Research and Evaluation</option>
            <option value="Administration Services">Administration Services</option>
            <option value="Commissioner of Education">Commissioner of Education</option>
            <option value="Curriculum and Instruction">Curriculum and Instruction</option>
            <option value="Equal Employment Office">Equal Employment Office</option>
            <option value="Federal Programs Grants and Foundations">Federal Programs Grants and Foundations</option>
            <option value="Federal Programs Monitor">Federal Programs Monitor</option>
            <option value="Finance">Finance</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Legal Counsel">Legal Counsel</option>
            <option value="Principal">Principal</option>
            <option value="Public Information Officer">Public Information Officer</option>
            <option value="State Board of Education">State Board of Education</option>
            <option value="Student and Support Services">Student and Support Services</option>
            <option value="Teacher">Teacher</option>
            <option value="Vice Principal">Vice Principal</option>
            <option value="Other">Other...</option>
          </select>
          @if($errors->has('department'))
            <p class="validation-error">{{ $errors->first('department') }}</p>
          @endif
        </label>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns left">
          <input class="button expand" type="submit" value="Create" />
      </div>
    </div>
    {!! Form::token() !!}
  </form>
</div>
	
	
@stop