@extends('layouts.app')

@section('title')
	{{ __('PFC Product ') }} {{ $action }}
@endsection


@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      @if($action == 'Add')
        @livewire('pfc.pfc-product-add', ['product_types' => $product_types])
      @elseif($action == 'Edit')
        @livewire('pfc.pfc-product-edit', ['product' => $product, 'product_types' => $product_types])
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection