@extends('layouts.error')

@section('title') {{ __('403 Error') }} @endsection

@section('content')
	<h1 class="error-title text-danger">{{ __('403') }}</h1>
	<h3 class="text-uppercase error-subtitle">{{ __('ACCESS DENIED !') }}</h3>
	<p class="text-muted mt-4 mb-4">{{ __('YOU SEEM TO BE TRYING TO ACCESS A PAGE') }}</p>
@endsection