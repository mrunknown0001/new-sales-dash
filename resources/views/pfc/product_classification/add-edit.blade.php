@extends('layouts.app')

@section('title')
	{{ __('PFC Product Classification ') }} {{ $action }}
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 offset-2">
      @if($action == 'Add')
        @livewire('pfc.pfc-product-classification-add', ['products' => $products])
      @elseif($action == 'Edit')
        @livewire('pfc.pfc-product-classification-edit', ['class' => $class, 'products' => $products])
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection