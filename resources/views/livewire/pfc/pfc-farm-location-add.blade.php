<div>
	<p><a href="{{ route('pfc.farm.location') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Farm Location') }}</a></p>
	<form wire:submit.prevent="save" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="farm_location_name" class="form-label required">{{ __('Farm Location Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('farm_location_name') ? 'is-invalid' : '' }}" name="farm_location_name" id="farm_location_name" wire:model="farm_location_name" placeholder="Farm Location Name">
		  @if($errors->has('farm_location_name'))
		    <p class="text-danger">{{ $errors->first('farm_location_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="farm_location_code" class="form-label required">{{ __('Farm Location Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('farm_location_code') ? 'is-invalid' : '' }}" name="farm_location_code" id="farm_location_code" wire:model="farm_location_code" placeholder="Farm Location Code">
		  @if($errors->has('farm_location_code'))
		    <p class="text-danger">{{ $errors->first('farm_location_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="farm_location_description" class="form-label">{{ __('Farm Location Description') }}</label>
		  <input type="text" class="form-control {{ $errors->has('farm_location_description') ? 'is-invalid' : '' }}" name="farm_location_description" id="farm_location_description" wire:model="farm_location_description" placeholder="Farm Location Description">
		  @if($errors->has('farm_location_description'))
		    <p class="text-danger">{{ $errors->first('farm_location_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
		</div>
	</form>
	<script>
		window.addEventListener('farm-location-added', event => {
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
