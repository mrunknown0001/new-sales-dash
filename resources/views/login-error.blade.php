@extends('layouts.guest')

@section('title')
	{{ __('Error') }}
@endsection

@section('content')
	<h3 class="text-center">{{ $message }}</h3>
@endsection

@section('scripts')
	<script>
		setInterval(function() {
			window.location.replace("{{ route('login') }}")
		}, 3000);
		
	</script>
@endsection