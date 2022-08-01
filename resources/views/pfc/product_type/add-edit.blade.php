@extends('layouts.app')

@section('title')
	{{ __('PFC Product Type ') }} {{ $action }}
@endsection


@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      @if($action == 'Add')
        @livewire('pfc.pfc-product-type-add')
      @elseif($action == 'Edit')
        @livewire('pfc.pfc-product-type-edit', ['type' => $type])
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection