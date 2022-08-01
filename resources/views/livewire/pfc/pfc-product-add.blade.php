<div>
	<p><a href="{{ route('pfc.product') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Product') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="product_type" class="form-label required">{{ __('Product Type') }}</label>
		  <select name="product__type" id="product_type" class="form-control {{ $errors->has('product_type') ? 'is-invalid' : '' }}" wire:model="product_type">
      	@if(isset($product_types))
      		<option value="">{{ __('Select Product Type') }}</option>
      		@foreach($product_types as $p)
      			<option value="{{ $p->id }}">{{ $p->product_type_name }}</option>
      		@endforeach
      	@else
      		<option value="">{{ __('NO PRODUCT TYPE AVAILABLE') }}</option>
      	@endif
		  </select>
		  @if($errors->has('product_type'))
		    <p class="text-danger">{{ $errors->first('product_type') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_name" class="form-label required">{{ __('Product Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" name="product_name" id="product_name" wire:model="product_name" placeholder="Product Name">
		  @if($errors->has('product_name'))
		    <p class="text-danger">{{ $errors->first('product_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_code" class="form-label required">{{ __('Product Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" name="product_code" id="product_code" wire:model="product_code" placeholder="Product Code">
		  @if($errors->has('product_code'))
		    <p class="text-danger">{{ $errors->first('product_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_description" class="form-label">{{ __('Product Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_description') ? 'is-invalid' : '' }}" name="product_description" id="product_description" wire:model="product_description" placeholder="Product Description">
		  @if($errors->has('product_description'))
		    <p class="text-danger">{{ $errors->first('product_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('product-added', event => {
      Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.icon,
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Close'
      });
		});
	</script>
</div>