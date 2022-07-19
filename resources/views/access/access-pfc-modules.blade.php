@inject('access', '\App\Http\Controllers\AccessController')

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
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'charts_module') ? 'checked' : '' }} value="charts_module" name="access[]" wire:model="access" id="charts_module"> <label for="charts_module">{{ __('Module') }}</label></li>
	</ul>
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
	<h4>{{ __('Region') }}:</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'region_module') ? 'checked' : '' }} value="region_module" name="access[]" wire:model="access" id="region_module"> <label for="region_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'region_add') ? 'checked' : '' }} value="region_add" name="access[]" wire:model="access" id="region_add"> <label for="region_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'region_edit') ? 'checked' : '' }} value="region_edit" name="access[]" wire:model="access" id="region_edit"> <label for="region_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'region_delete') ? 'checked' : '' }} value="region_delete" name="access[]" wire:model="access" id="region_delete"> <label for="region_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Location:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'location_module') ? 'checked' : '' }} value="location_module" name="access[]" wire:model="access" id="location_module"> <label for="location_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'location_add') ? 'checked' : '' }} value="location_add" name="access[]" wire:model="access" id="location_add"> <label for="location_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'location_edit') ? 'checked' : '' }} value="location_edit" name="access[]" wire:model="access" id="location_edit"> <label for="location_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'location_delete') ? 'checked' : '' }} value="location_delete" name="access[]" wire:model="access" id="location_delete"> <label for="location_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Customer Type:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_type_module') ? 'checked' : '' }} value="customer_type_module" name="access[]" wire:model="access" id="customer_type_module"> <label for="customer_type_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_type_add') ? 'checked' : '' }} value="customer_type_add" name="access[]" wire:model="access" id="customer_type_add"> <label for="customer_type_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_type_edit') ? 'checked' : '' }} value="customer_type_edit" name="access[]" wire:model="access" id="customer_type_edit"> <label for="customer_type_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_type_delete') ? 'checked' : '' }} value="customer_type_delete" name="access[]" wire:model="access" id="customer_type_delete"> <label for="customer_type_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Customer:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_module') ? 'checked' : '' }} value="customer_module" name="access[]" wire:model="access" id="customer_module"> <label for="customer_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_add') ? 'checked' : '' }} value="customer_add" name="access[]" wire:model="access" id="customer_add"> <label for="customer_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_edit') ? 'checked' : '' }} value="customer_edit" name="access[]" wire:model="access" id="customer_edit"> <label for="customer_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'customer_delete') ? 'checked' : '' }} value="customer_delete" name="access[]" wire:model="access" id="customer_delete"> <label for="customer_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Product Type:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_type_module') ? 'checked' : '' }} value="product_type_module" name="access[]" wire:model="access" id="product_type_module"> <label for="product_type_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_type_add') ? 'checked' : '' }} value="product_type_add" name="access[]" wire:model="access" id="product_type_add"> <label for="product_type_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_type_edit') ? 'checked' : '' }} value="product_type_edit" name="access[]" wire:model="access" id="product_type_edit"> <label for="product_type_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_type_delete') ? 'checked' : '' }} value="product_type_delete" name="access[]" wire:model="access" id="product_type_delete"> <label for="product_type_delete">{{ __('Delete') }}</label></li>
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
	<h4>{{ __('Product Classification:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_classification_module') ? 'checked' : '' }} value="product_classification_module" name="access[]" wire:model="access" id="product_classification_module"> <label for="product_classification_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_classification_add') ? 'checked' : '' }} value="product_classification_add" name="access[]" wire:model="access" id="product_classification_add"> <label for="product_classification_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_classification_edit') ? 'checked' : '' }} value="product_classification_edit" name="access[]" wire:model="access" id="product_classification_edit"> <label for="product_classification_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_classification_delete') ? 'checked' : '' }} value="product_classification_delete" name="access[]" wire:model="access" id="product_classification_delete"> <label for="product_classification_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Product Quality Type:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_quality_type_module') ? 'checked' : '' }} value="product_quality_type_module" name="access[]" wire:model="access" id="product_quality_type_module"> <label for="product_quality_type_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_quality_type_add') ? 'checked' : '' }} value="product_quality_type_add" name="access[]" wire:model="access" id="product_quality_type_add"> <label for="product_quality_type_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_quality_type_edit') ? 'checked' : '' }} value="product_quality_type_edit" name="access[]" wire:model="access" id="product_quality_type_edit"> <label for="product_quality_type_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'product_quality_type_delete') ? 'checked' : '' }} value="product_quality_type_delete" name="access[]" wire:model="access" id="product_quality_type_delete"> <label for="product_quality_type_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>