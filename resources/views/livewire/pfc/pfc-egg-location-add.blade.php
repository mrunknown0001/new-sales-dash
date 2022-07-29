<div>
	<p><a href="{{ route('pfc.egg.location') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Egg Location') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="egg_location_name" class="form-label required">{{ __('Egg Location Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('egg_location_name') ? 'is-invalid' : '' }}" name="egg_location_name" id="egg_location_name" wire:model="egg_location_name" placeholder="Egg Location Name">
		  @if($errors->has('egg_location_name'))
		    <p class="text-danger">{{ $errors->first('egg_location_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="egg_location_code" class="form-label required">{{ __('Egg Location Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('egg_location_code') ? 'is-invalid' : '' }}" name="egg_location_code" id="egg_location_code" wire:model="egg_location_code" placeholder="Egg Location Code">
		  @if($errors->has('egg_location_code'))
		    <p class="text-danger">{{ $errors->first('egg_location_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="egg_location_description" class="form-label">{{ __('Egg Location Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('egg_location_description') ? 'is-invalid' : '' }}" name="egg_location_description" id="egg_location_description" wire:model="egg_location_description" placeholder="Egg Location Description">
		  @if($errors->has('egg_location_description'))
		    <p class="text-danger">{{ $errors->first('egg_location_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('egg-location-added', event => {
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
