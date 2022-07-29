<div>
  <p><a href="{{ route('pfc.region') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Region') }}</a></p>
	<form wire:submit.prevent="update" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="name" class="form-label required">{{ __('Region Name') }}</label>
		  <input type="text" class="form-control {{ $errors->has('region.name') ? 'is-invalid' : '' }}" name="name" id="name" wire:model="region.name" placeholder="Region Name">
		  @if($errors->has('region.name'))
		    <p class="text-danger">{{ $errors->first('region.name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="code" class="form-label required">{{ __('Region Code') }}</label>
		  <input type="text" class="form-control {{ $errors->has('region.code') ? 'is-invalid' : '' }}" name="code" id="code" wire:model="region.code" placeholder="Region Code">
		  @if($errors->has('region.code'))
		    <p class="text-danger">{{ $errors->first('region.code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="is_active" class="form-label">{{ __('Is Active?') }}</label>
		  <input type="checkbox" name="is_active" id="is_active" wire:model="region.is_active" >
		  @if($errors->has('region.region_description'))
		    <p class="text-danger">{{ $errors->first('region.region_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Update') }}</button>
		</div>
	</form>
	<script>
		window.addEventListener('region-updated', event => {
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
