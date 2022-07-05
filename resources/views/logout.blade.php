@extends('layouts.guest')

@section('title')
	Logout
@endsection

@section('content')
	<h3 class="text-center">Logout Success...</h3>
@endsection

@section('scripts')
	<script>
		setInterval(function() {
			window.location.replace("{{ route('login') }}")
		}, 3000);
		
	</script>
@endsection