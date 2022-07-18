<div>
	<div class="row">
		<div class="col-md-12">
			<p><a href="{{ route('access.farm', ['code' => $farm]) }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>{{ __(' Back to ') . $farm}} </a></p>
			<p>{{ __('User: ') }}<strong>{{ $fullname }}</strong></p>
			<p>{{ __('Farm: ') }}<strong>{{ $farm }}</strong></p>

			<form wire:submit.prevent="save">
				@csrf
				<input type="hidden" wire:model="user_id" id="user_id" value="{{ $user_id }}" name="user_id">
				<input type="hidden" wire:model="farm" value="{{ $farm }}" name="farm">
				@if($farm == 'PFC')
					@include('access.access-pfc-modules')
				@elseif($farm == 'BDL')
					@include('access.access-bdl-modules')
				@elseif($farm == 'SWINE')
					@include('access.access-swine-modules')
				@endif
				<div class="form-group">
					<button class="btn btn-primary"><i class="fa fa-save"></i>{{ __(' Save') }}</button>
				</div>
			</form>
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		window.addEventListener('access-set', event => {
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
