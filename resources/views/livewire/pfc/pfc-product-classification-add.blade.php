<div>
	<p><a href="{{ route('pfc.product.classification') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Product classification') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="product" class="form-label required">{{ __('Product') }}</label>
		  <select name="product" id="product" class="form-control {{ $errors->has('product') ? 'is-invalid' : '' }}" wire:model="product">
      	@if(isset($products))
      		<option value="">{{ __('Select Product Type') }}</option>
      		@foreach($products as $p)
      			<option value="{{ $p->id }}">{{ $p->product_name }}</option>
      		@endforeach
      	@else
      		<option value="">{{ __('NO PRODUCT AVAILABLE') }}</option>
      	@endif
		  </select>
		  @if($errors->has('product'))
		    <p class="text-danger">{{ $errors->first('product') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_classification_name" class="form-label required">{{ __('Product Classification Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_classification_name') ? 'is-invalid' : '' }}" name="product_classification_name" id="product_type_name" wire:model="product_classification_name" placeholder="Product Classification Name">
		  @if($errors->has('product_classification_name'))
		    <p class="text-danger">{{ $errors->first('product_classification_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_classification_code" class="form-label required">{{ __('Product Classification Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_classification_code') ? 'is-invalid' : '' }}" name="product_classification_code" id="product_classification_code" wire:model="product_classification_code" placeholder="Product Classification Code">
		  @if($errors->has('product_classification_code'))
		    <p class="text-danger">{{ $errors->first('product_classification_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="product_classification_description" class="form-label">{{ __('Product Classification Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('product_classification_description') ? 'is-invalid' : '' }}" name="product_classification_description" id="product_classification_description" wire:model="product_classification_description" placeholder="Product Classification Description">
		  @if($errors->has('product_classification_description'))
		    <p class="text-danger">{{ $errors->first('product_classification_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('product-classifcation-added', event => {
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
