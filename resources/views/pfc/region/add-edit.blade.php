@extends('layouts.app')

@section('title')
	{{ __('PFC Region ') }} {{ $action }}
@endsection


@section('content')
  <div class="row">
    <div class="col-md-8 col-sm-12 offset-2">
      @if($action == 'Add')
        @livewire('pfc.pfc-region-add')
      @elseif($action == 'Edit')
        @livewire('pfc.pfc-region-edit', ['region' => $region])
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection