@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@section('content')
	<h3>Logged In</h3>
	<p><img id="profile_photo" src="" width="50px" alt=""></p>
	<ul>
		<li>Fullname: <span id="fullname"></span></li>
		<li>Email: <span id="email"></span></li>
	</ul>
	<p><a href="{{ route('logout') }}">Logout</a></p>
@endsection

@section('scripts')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script>
		$.ajax({
			type: "GET",
			url: "{{ config('app.root_domain') . config('app.user_details_slug') . \Crypt::encryptString(Auth::user()->id) }}",
			dataType: 'json',
			success: function(response){
				document.getElementById('fullname').innerHTML = response['first_name'] + " " + response['last_name'];
				document.getElementById('email').innerHTML = response['email'];
				$("#profile_photo").attr("src",response['profile_photo_url']);
			}
		});
	</script>
@endsection