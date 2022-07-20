@extends('layouts.app')

@section('title')
	{{ __('Access') }}
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
      @livewire('access')
		</div>
	</div>
@endsection


@section('scripts')

@endsection