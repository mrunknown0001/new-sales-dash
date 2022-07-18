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
	<h4>{{ __('Area:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'area_module') ? 'checked' : '' }} value="area_module" name="access[]" wire:model="access" id="area_module"> <label for="area_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'area_add') ? 'checked' : '' }} value="area_add" name="access[]" wire:model="access" id="area_add"> <label for="area_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'area_edit') ? 'checked' : '' }} value="area_edit" name="access[]" wire:model="access" id="area_edit"> <label for="area_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'area_delete') ? 'checked' : '' }} value="area_delete" name="access[]" wire:model="access" id="area_delete"> <label for="area_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Type of Tech Visit:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_tech_visit_module') ? 'checked' : '' }} value="type_of_tech_visit_module" name="access[]" wire:model="access" id="type_of_tech_visit_module"> <label for="type_of_tech_visit_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_tech_visit_add') ? 'checked' : '' }} value="type_of_tech_visit_add" name="access[]" wire:model="access" id="type_of_tech_visit_add"> <label for="type_of_tech_visit_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_tech_visit_edit') ? 'checked' : '' }} value="type_of_tech_visit_edit" name="access[]" wire:model="access" id="type_of_tech_visit_edit"> <label for="type_of_tech_visit_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_tech_visit_delete') ? 'checked' : '' }} value="type_of_tech_visit_delete" name="access[]" wire:model="access" id="type_of_tech_visit_delete"> <label for="type_of_tech_visit_delete">{{ __('Delete') }}</label></li>
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
	<h4>{{ __('Type of Account:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_account_module') ? 'checked' : '' }} value="type_of_account_module" name="access[]" wire:model="access" id="type_of_account_module"> <label for="type_of_account_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_account_add') ? 'checked' : '' }} value="type_of_account_add" name="access[]" wire:model="access" id="type_of_account_add"> <label for="type_of_account_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_account_edit') ? 'checked' : '' }} value="type_of_account_edit" name="access[]" wire:model="access" id="type_of_account_edit"> <label for="type_of_account_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'type_of_account_delete') ? 'checked' : '' }} value="type_of_account_delete" name="access[]" wire:model="access" id="type_of_account_delete"> <label for="type_of_account_delete">{{ __('Delete') }}</label></li>
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
	<h4>{{ __('Breed:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_module') ? 'checked' : '' }} value="breed_module" name="access[]" wire:model="access" id="breed_module"> <label for="breed_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_add') ? 'checked' : '' }} value="breed_add" name="access[]" wire:model="access" id="breed_add"> <label for="breed_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_edit') ? 'checked' : '' }} value="breed_edit" name="access[]" wire:model="access" id="breed_edit"> <label for="breed_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ \App\Http\Controllers\AccessController::checkAccess($user_id, $farm, 'breed_delete') ? 'checked' : '' }} value="breed_delete" name="access[]" wire:model="access" id="breed_delete"> <label for="breed_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>