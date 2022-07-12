@extends('layouts.error')

@section('title') {{ __('500 Error') }} @endsection

@section('content')
	<h1 class="error-title text-danger">{{ __('500') }}</h1>
	<h3 class="text-uppercase error-subtitle">{{ __('INTERNAL SERVER ERROR') }}</h3>
	<p class="text-muted mt-4 mb-4">{{ __('ERROR PROCESSING THE REQUEST') }}</p>
@endsection