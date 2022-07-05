@extends('layouts.app')

@section('title')
	Dashboard
@endsection

@section('content')
	
@endsection

@section('scripts')
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