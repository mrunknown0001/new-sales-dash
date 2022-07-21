<div>
	<p><a href="{{ route('pfc.region') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Region') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="name" class="form-label required">Region Name</label>
		  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" wire:model="name" placeholder="Region Name">
		  @if($errors->has('name'))
		    <p class="text-danger">{{ $errors->first('name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="code" class="form-label required">Region Code</label>
		  <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" wire:model="code" placeholder="Region Code">
		  @if($errors->has('code'))
		    <p class="text-danger">{{ $errors->first('code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
		</div>
	</form>
	<script>
		window.addEventListener('region-added', event => {
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
