<div>
	<p><a href="{{ route('pfc.customer.type') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Customer Type') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="customer_type_name" class="form-label required">{{ __('Customer Type Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_type_name') ? 'is-invalid' : '' }}" name="customer_type_name" id="customer_type_name" wire:model="customer_type_name" placeholder="Customer Type Name">
		  @if($errors->has('customer_type_name'))
		    <p class="text-danger">{{ $errors->first('customer_type_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="customer_type_description" class="form-label ">{{ __('Customer Type Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_type_description') ? 'is-invalid' : '' }}" name="customer_type_description" id="customer_type_description" wire:model="customer_type_description" placeholder="Customer Type Description">
		  @if($errors->has('customer_type_description'))
		    <p class="text-danger">{{ $errors->first('customer_type_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('customer-type-added', event => {
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
