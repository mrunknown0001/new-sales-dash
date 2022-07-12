@extends('layouts.error')

@section('title') {{ __('404 Error') }} @endsection

@section('content')
	<h1 class="error-title text-danger">{{ __('404') }}</h1>
	<h3 class="text-uppercase error-subtitle">{{ __('PAGE NOT FOUND !') }}</h3>
	<p class="text-muted mt-4 mb-4">{{ __('YOU SEEM TO BE TRYING TO FIND HIS WAY HOME') }}</p>
@endsection