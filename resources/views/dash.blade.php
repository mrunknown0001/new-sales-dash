@extends('layouts.app')

@section('title')
	{{ __($code . ' Dashboard') }}
@endsection

@section('content')
	@if(strlen($str) < 1 && $code != '')
		<div class="mt-5">
			<h5 class="text-center text-danger">LOOKS LIKE YOU DON'T HAVE ACCESS, CONTACT ADMINISTRATOR.</h5>
		</div>
	@endif
@endsection

@section('scripts')

@endsection