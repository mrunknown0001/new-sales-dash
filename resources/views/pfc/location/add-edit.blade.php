@extends('layouts.app')

@section('title')
	{{ __('PFC Location ') }} {{ $action }}
@endsection


@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      @if($action == 'Add')
        @livewire('pfc.pfc-location-add', ['regions' => $regions,])
      @elseif($action == 'Edit')
        @livewire('pfc.pfc-location-edit', ['regions' => $regions, 'location' => $location])
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection