<div class="form-group">
	@if($errors->has('access'))
		<p class="text-danger">{{ $errors->first('access') }}</p>
	@endif
	@if($errors->has('user_id'))
		<p class="text-danger">{{ $errors->first('user_id') }}</p>
	@endif
	@if($errors->has('farm'))
		<p class="text-danger">{{ $errors->first('farm') }}</p>
	@endif
</div>
<div class="form-group">
	<h4>{{ __('Charts') }}:</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'charts_module') ? 'checked' : '' }} value="charts_module" name="access[]" wire:model="access" id="charts_module"> <label for="charts_module">{{ __('Module') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Reports') }}:</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'reports_module') ? 'checked' : '' }} value="reports_module" name="access[]" wire:model="access" id="reports_module"> <label for="reports_module">{{ __('Module') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Sales:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'sales_module') ? 'checked' : '' }} value="sales_module" name="access[]" wire:model="access" id="sales_module"> <label for="sales_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'sales_add') ? 'checked' : '' }} value="sales_add" name="access[]" wire:model="access" id="sales_add"> <label for="sales_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'sales_edit') ? 'checked' : '' }} value="sales_edit" name="access[]" wire:model="access" id="sales_edit"> <label for="sales_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'sales_delete') ? 'checked' : '' }} value="sales_delete" name="access[]" wire:model="access" id="sales_delete"> <label for="sales_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Product:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_module') ? 'checked' : '' }} value="product_module" name="access[]" wire:model="access" id="product_module"> <label for="product_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_add') ? 'checked' : '' }} value="product_add" name="access[]" wire:model="access" id="product_add"> <label for="product_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_edit') ? 'checked' : '' }} value="product_edit" name="access[]" wire:model="access" id="product_edit"> <label for="product_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_delete') ? 'checked' : '' }} value="product_delete" name="access[]" wire:model="access" id="product_delete"> <label for="product_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Breed:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_module') ? 'checked' : '' }} value="breed_module" name="access[]" wire:model="access" id="breed_module"> <label for="breed_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_add') ? 'checked' : '' }} value="breed_add" name="access[]" wire:model="access" id="breed_add"> <label for="breed_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_edit') ? 'checked' : '' }} value="breed_edit" name="access[]" wire:model="access" id="breed_edit"> <label for="breed_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_delete') ? 'checked' : '' }} value="breed_delete" name="access[]" wire:model="access" id="breed_delete"> <label for="breed_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>