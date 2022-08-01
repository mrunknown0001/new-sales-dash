<div>
	<p><a href="{{ route('pfc.product.type') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Product Type') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="product_type_name" class="form-label required">{{ __('Product Type Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_type_name') ? 'is-invalid' : '' }}" name="product_type_name" id="product_type_name" wire:model="product_type_name" placeholder="Product Type Name">
		  @if($errors->has('product_type_name'))
		    <p class="text-danger">{{ $errors->first('product_type_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_type_code" class="form-label required">{{ __('Product Type Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_type_code') ? 'is-invalid' : '' }}" name="product_type_code" id="product_type_code" wire:model="product_type_code" placeholder="Product Type Code">
		  @if($errors->has('product_type_code'))
		    <p class="text-danger">{{ $errors->first('product_type_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_type_description" class="form-label ">{{ __('Product Type Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_type_description') ? 'is-invalid' : '' }}" name="product_type_description" id="product_type_description" wire:model="product_type_description" placeholder="Product Type Description">
		  @if($errors->has('product_type_description'))
		    <p class="text-danger">{{ $errors->first('product_type_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('product-type-added', event => {
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
