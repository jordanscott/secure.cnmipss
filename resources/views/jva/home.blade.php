@extends('layouts.main')
@section('content')

	
	<div class="dashboard large-12 columns">
		<h4>Job Vacancies Announcements<p><a href="">&#43;Add New</a></p></h4>
		<br>
		<div class="search">
			<h5>Search JVAs</h5>
			{{ Form::open(array('route' => 'search', 'method' => 'get')) }}

				<div class="row">
					<div class="large-5 columns">
						<input name="keyword" type="text" placeholder="Keywords separated by comma..." />
					</div>
					<div class="large-3 columns end">
			          <a href="#" class="show-search">{ Show Advanced Search }</a>
			          <a href="#" class="show-search" style="display: none;">{ Close Advanced Search }</a>
			      	</div>
				</div>
				<div class="row">
					<div class="hide-then-show">
						{{ Form::label('date', 'Date Received'); }}
						{{ Form::text('date'); }}

						{{ Form::label('first_name', 'First Name'); }}
						{{ Form::text('first_name'); }}

						{{ Form::label('last_name', 'Last Name'); }}
						{{ Form::text('last_name'); }}

						{{ Form::label('position', 'Position'); }}
						{{ Form::text('position'); }}

						{{ Form::label('jva_number', 'JVA Number'); }}
						{{ Form::text('jva_number'); }}
					</div>
					<div class="large-3 columns">
						<input class="button expand" type="submit" value="Search" />
					</div>
					
				</div>
				

					

			{{ Form::close() }}
			
			
			

			<div class="search-results">


				
			</div>
			
		</div>
		

		

	</div>
		
	

	

@stop