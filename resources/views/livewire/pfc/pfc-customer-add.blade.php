<div>
	<p><a href="{{ route('pfc.customer') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Customer') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="customer_name" class="form-label required">Customer Name</label>
		  <input type="text" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" name="customer_name" id="customer_name" wire:model="customer_name" placeholder="Customer Name">
		  @if($errors->has('customer_name'))
		    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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

