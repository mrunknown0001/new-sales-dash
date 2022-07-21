<div>
	<p><a href="{{ route('pfc.location') }}" class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('Back to Location') }}</a></p>
	<form wire:submit.prevent="update" autocomplete="off">
		@csrf
        <div class="mb-3">
          <label for="region" class="form-label required">{{ __('Region') }}</label>
          <select name="region" id="region" wire:model="region" class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}">
          	@if(isset($regions))
          		<option value="">{{ __('Select Region...') }}</option>
          		@foreach($regions as $r)
          			<option value="{{ $r->id }}">{{ $r->name . ' - ' . $r->code }}</option>
          		@endforeach
          	@else
          		<option value="">{{ __('NO REGION AVAILABLE') }}</option>
          	@endif
          </select>
          @if($errors->has('region'))
		        <p class="text-danger">{{ $errors->first('region') }}</p>
			    @endif
        </div>
		<div class="mb-3">
		  <label for="location_name" class="form-label required">Location Name</label>
		  <input type="text" class="form-control {{ $errors->has('location_name') ? 'is-invalid' : '' }}" name="location_name" id="location_name" wire:model="location.location_name" placeholder="Location Name">
		  @if($errors->has('location.location_name'))
		    <p class="text-danger">{{ $errors->first('location.location_name') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="location_code" class="form-label required">Location Code</label>
		  <input type="text" class="form-control {{ $errors->has('location_code') ? 'is-invalid' : '' }}" name="location_code" id="location_code" wire:model="location.location_code" placeholder="Location Code">
		  @if($errors->has('location.location_code'))
		    <p class="text-danger">{{ $errors->first('location.location_code') }}</p>
		  @endif
		</div>
		<div class="mb-3">
		  <label for="location_description" class="form-label">Location Description</label>
		  <input type="text" class="form-control {{ $errors->has('location_description') ? 'is-invalid' : '' }}" name="location_description" id="location_description" wire:model="location_description" placeholder="Location Description">
		  @if($errors->has('location_description'))
		    <p class="text-danger">{{ $errors->first('location_description') }}</p>
		  @endif
		</div>
		<div class="mb-3">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
		</div>
	</form>
	<script>
		window.addEventListener('location-updated', event => {
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
