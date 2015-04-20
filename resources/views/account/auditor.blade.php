@extends('layouts.main')
@section('content')



  @if (Session::has('global'))
    <div class="alert-box success">{{{ Session::get('global') }}}</div>
  @endif
  
  <div class="dashboard large-12 columns">
    <h4>Welcome to the Auditor Dashboard, {{{ Auth::user()->first_name }}}</h4>

    <dl class="tabs vertical" data-tab>
      <dd class="active"><a href="#panel1">Recent Activity</a></dd>
      <dd><a href="#panel2">Find a Document</a></dd>
      <dd><a href="#panel3">Upload</a></dd>
      <dd><a href="#panel4">Calendar</a></dd>
      <dd><a href="#panel5">Messages</a></dd>
    </dl>
    <div class="tabs-content vertical">
      <div class="content active" id="panel1">
        <p>This is the first panel of the basic tab example. This is the first panel of the basic tab example.</p>
      </div>
      <div class="content" id="panel2">
        <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
      </div>
      <div class="content" id="panel3">
        <p>Upload a document for everyone to see or specifically to your Supervisor.</p>
        <a href="#" class="button end">Upload</a>
      </div>
      <div class="content" id="panel4">
        <p>Please view the calendar for any upcoming events, due dates, meetings, etc.</p>
        <div id="calendar">
          <div id="full-clndr" class="clearfix">
              <script type="text/template" id="full-clndr-template">
                <div class="clndr-controls">
                  <div class="clndr-previous-button">&lt;</div>
                  <div class="clndr-next-button">&gt;</div>
                  <div class="current-month"><%= month %> <%= year %></div>

                </div>
                <div class="clndr-grid">
                  <div class="days-of-the-week clearfix">
                    <% _.each(daysOfTheWeek, function(day) { %>
                      <div class="header-day"><%= day %></div>
                    <% }); %>
                  </div>
                  <div class="days">
                    <% _.each(days, function(day) { %>
                      <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
                    <% }); %>
                  </div>
                </div>
                <div class="event-listing">
                  <div class="event-listing-title">EVENTS THIS MONTH</div>
                  <% _.each(eventsThisMonth, function(event) { %>
                      <div class="event-item">
                        <div class="event-item-name"><%= event.title %></div>
                        <div class="event-item-location"><%= event.location %></div>
                      </div>
                    <% }); %>
                </div>
              </script>
            </div>
        </div>
      </div>
      <div class="content" id="panel5">
        <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
      </div>
    </div>


    

  </div>
    
  

  

@stop