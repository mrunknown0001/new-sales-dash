<div>
	<p><a href="{{ route('pfc.customer') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Customer') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="customer_type" class="form-label required">{{ __('Customer Type') }}</label>
		  <select name="customer_type" id="customer_type" class="form-control {{ $errors->has('customer_type') ? 'is-invalid' : '' }}" wire:model="customer_type">
      	@if(isset($customer_types))
      		<option value="">{{ __('Select Customer Type') }}</option>
      		@foreach($customer_types as $c)
      			<option value="{{ $c->id }}">{{ $c->customer_type_name }}</option>
      		@endforeach
      	@else
      		<option value="">{{ __('NO CUSTOMER TYPE AVAILABLE') }}</option>
      	@endif
		  </select>
		  @if($errors->has('customer_type'))
		    <p class="text-danger">{{ $errors->first('customer_type') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="customer_name" class="form-label required">{{ __('Customer Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" name="customer_name" id="customer_name" wire:model="customer_name" placeholder="Customer Name">
		  @if($errors->has('customer_name'))
		    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="customer_address" class="form-label required">{{ __('Customer Address') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" name="customer_address" id="customer_address" wire:model="customer_address" placeholder="Customer Address">
		  @if($errors->has('customer_address'))
		    <p class="text-danger">{{ $errors->first('customer_address') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="customer_email" class="form-label required">{{ __('Customer Email') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_email') ? 'is-invalid' : '' }}" name="customeremail" id="customer_email" wire:model="customer_email" placeholder="Customer Email">
		  @if($errors->has('customer_email'))
		    <p class="text-danger">{{ $errors->first('customer_email') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="customer_contact_number" class="form-label required">{{ __('Customer Contact Number') }}</label>
		  <input type="text" class="form-control {{ $errors->has('customer_contact_number') ? 'is-invalid' : '' }}" name="customercontact_number" id="customer_contact_number" wire:model="customer_contact_number" placeholder="Customer Contact Number">
		  @if($errors->has('customer_contact_number'))
		    <p class="text-danger">{{ $errors->first('customer_contact_number') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('customer-added', event => {
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

