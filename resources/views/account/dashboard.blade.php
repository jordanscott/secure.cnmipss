@extends('layouts.main')
@section('content')



  @if (Session::has('global'))
    <div class="alert-box info top-alert">{{{ Session::get('global') }}}</div>
  @elseif(Session::has('message'))
    <div class="alert-box success top-alert">{{{ Session::get('message') }}}</div>
  @elseif(Session::has('error'))
    <div class="alert-box alert top-alert">{{{ Session::get('error') }}}</div>
  @endif
	
	<div class="dashboard large-12 columns">
		<h4>Dashboard</h4>

		<dl class="tabs vertical" data-tab>
		  <dd class="active"><a href="#panel1">Welcome!</a></dd>
		  <dd><a href="#panel2">HelpDesk</a></dd>
		  <dd><a href="#panel3">Feedback</a></dd>
		  {{-- <dd><a href="#panel4">Calendar</a></dd>
		  <dd><a href="#panel5">Messages</a></dd> --}}
		</dl>
		<div class="tabs-content vertical">
		  <div class="content active" id="panel1">
		    <p>Welcome to PSS' new Staff Portal.  Right now we are in a testing phase so there is not a lot of content here.  The one thing we do offer, as of right now, is a helpdesk to log an issue with Aministration Services.  Please feel free to use the helpdesk to contact Administration Services for assistance.<br><br>

		    We could really use your help in determining what information and content to put in our new staff portal.  Let us know in the Feedback tab.</p>
		  </div>
		  <div class="content" id="panel2">
		    <a class="button" href="../heldesk">Admin Services HelpDesk</a>
		  </div>
		  <div class="content" id="panel3">
		    <p>We could really use your feedback about what type of information and content you would like to have available through our new staff portal.  Please fill out the form below to give us your feedback.</p>

		    {!! Form::open(array('route' => 'feedback')) !!}
			    {!! Form::textarea('feedback', null, array('placeholder' => 'type here...')) !!}
			    {!! Form::submit('Send', array('class' => 'button tiny')) !!}
			    {!! Form::token() !!}
			{!! Form::close() !!}

		  </div>
		 
		</div>


		

	</div>
		
	

	

@stop