
{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} from {{ Auth::user()->department }} sent the following feedback: <br><br>

{{ $feedback }}