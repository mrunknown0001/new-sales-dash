<div>
  <p><a href="{{ route('pfc.region') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Region') }}</a></p>
	<form wire:submit.prevent="update" autocomplete="off">
		@csrf
		<div class="mb-3">
		  <label for="region_name" class="form-label required">Region Name</label>
		  <input type="text" class="form-control {{ $errors->has('region.region_name') ? 'is-invalid' : '' }}" name="region_name" id="region_name" wire:model="region.region_name" placeholder="Region Name">
		  @if($errors->has('region.region_name'))
		    <p class="text-danger">{{ $errors->first('region.region_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="region_code" class="form-label required">Region Code</label>
		  <input type="text" class="form-control {{ $errors->has('region.region_code') ? 'is-invalid' : '' }}" name="region_code" id="region_code" wire:model="region.region_code" placeholder="Region Code">
		  @if($errors->has('region.region_code'))
		    <p class="text-danger">{{ $errors->first('region.region_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="region_description" class="form-label">Region Description</label>
		  <input type="text" class="form-control {{ $errors->has('region.region_description') ? 'is-invalid' : '' }}" name="region_description" id="region_description" wire:model="region.region_description" placeholder="Region Description">
		  @if($errors->has('region.region_description'))
		    <p class="text-danger">{{ $errors->first('region.region_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="is_active" class="form-label">Is Active?</label>
		  <input type="checkbox" name="is_active" id="is_active" wire:model="region.is_active" >
		  @if($errors->has('region.region_description'))
		    <p class="text-danger">{{ $errors->first('region.region_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
