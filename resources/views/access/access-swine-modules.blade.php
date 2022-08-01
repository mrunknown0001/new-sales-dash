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
	<h4>{{ __('Reports') }}:</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'reports_module') ? 'checked' : '' }} value="reports_module" name="access[]" wire:model="access" id="reports_module"> <label for="reports_module">{{ __('Module') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Sales:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sales_module') ? 'checked' : '' }} value="sales_module" name="access[]" wire:model="access" id="sales_module"> <label for="sales_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sales_add') ? 'checked' : '' }} value="sales_add" name="access[]" wire:model="access" id="sales_add"> <label for="sales_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sales_edit') ? 'checked' : '' }} value="sales_edit" name="access[]" wire:model="access" id="sales_edit"> <label for="sales_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sales_delete') ? 'checked' : '' }} value="sales_delete" name="access[]" wire:model="access" id="sales_delete"> <label for="sales_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Farm:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'farm_module') ? 'checked' : '' }} value="farm_module" name="access[]" wire:model="access" id="farm_module"> <label for="farm_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'farm_add') ? 'checked' : '' }} value="farm_add" name="access[]" wire:model="access" id="farm_add"> <label for="farm_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'farm_edit') ? 'checked' : '' }} value="farm_edit" name="access[]" wire:model="access" id="farm_edit"> <label for="farm_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'farm_delete') ? 'checked' : '' }} value="farm_delete" name="access[]" wire:model="access" id="farm_delete"> <label for="farm_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Department:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'department_module') ? 'checked' : '' }} value="department_module" name="access[]" wire:model="access" id="department_module"> <label for="department_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'department_add') ? 'checked' : '' }} value="department_add" name="access[]" wire:model="access" id="department_add"> <label for="department_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'department_edit') ? 'checked' : '' }} value="department_edit" name="access[]" wire:model="access" id="department_edit"> <label for="department_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'department_delete') ? 'checked' : '' }} value="department_delete" name="access[]" wire:model="access" id="department_delete"> <label for="department_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Product:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_module') ? 'checked' : '' }} value="product_module" name="access[]" wire:model="access" id="product_module"> <label for="product_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_add') ? 'checked' : '' }} value="product_add" name="access[]" wire:model="access" id="product_add"> <label for="product_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_edit') ? 'checked' : '' }} value="product_edit" name="access[]" wire:model="access" id="product_edit"> <label for="product_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_delete') ? 'checked' : '' }} value="product_delete" name="access[]" wire:model="access" id="product_delete"> <label for="product_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Product Category:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_category_module') ? 'checked' : '' }} value="product_category_module" name="access[]" wire:model="access" id="product_category_module"> <label for="product_category_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_category_add') ? 'checked' : '' }} value="product_category_add" name="access[]" wire:model="access" id="product_category_add"> <label for="product_category_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_category_edit') ? 'checked' : '' }} value="product_category_edit" name="access[]" wire:model="access" id="product_category_edit"> <label for="product_category_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'product_category_delete') ? 'checked' : '' }} value="product_category_delete" name="access[]" wire:model="access" id="product_category_delete"> <label for="product_category_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Customer:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_module') ? 'checked' : '' }} value="customer_module" name="access[]" wire:model="access" id="customer_module"> <label for="customer_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_add') ? 'checked' : '' }} value="customer_add" name="access[]" wire:model="access" id="customer_add"> <label for="customer_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_edit') ? 'checked' : '' }} value="customer_edit" name="access[]" wire:model="access" id="customer_edit"> <label for="customer_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_delete') ? 'checked' : '' }} value="customer_delete" name="access[]" wire:model="access" id="customer_delete"> <label for="customer_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Sales Status:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sale_status_module') ? 'checked' : '' }} value="sale_status_module" name="access[]" wire:model="access" id="sale_status_module"> <label for="sale_status_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sale_status_add') ? 'checked' : '' }} value="sale_status_add" name="access[]" wire:model="access" id="sale_status_add"> <label for="sale_status_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sale_status_edit') ? 'checked' : '' }} value="sale_status_edit" name="access[]" wire:model="access" id="sale_status_edit"> <label for="sale_status_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_delete') ? 'checked' : '' }} value="customer_delete" name="access[]" wire:model="access" id="customer_delete"> <label for="customer_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Classification:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'classification_module') ? 'checked' : '' }} value="classification_module" name="access[]" wire:model="access" id="classification_module"> <label for="classification_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sale_status_add') ? 'checked' : '' }} value="sale_status_add" name="access[]" wire:model="access" id="sale_status_add"> <label for="sale_status_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'sale_status_edit') ? 'checked' : '' }} value="sale_status_edit" name="access[]" wire:model="access" id="sale_status_edit"> <label for="sale_status_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'customer_delete') ? 'checked' : '' }} value="customer_delete" name="access[]" wire:model="access" id="customer_delete"> <label for="customer_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>
<div class="form-group">
	<h4>{{ __('Breed:') }}</h4>
	<ul class="list-inline">
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'breed_module') ? 'checked' : '' }} value="breed_module" name="access[]" wire:model="access" id="breed_module"> <label for="breed_module">{{ __('Module') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'breed_add') ? 'checked' : '' }} value="breed_add" name="access[]" wire:model="access" id="breed_add"> <label for="breed_add">{{ __('Add') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'breed_edit') ? 'checked' : '' }} value="breed_edit" name="access[]" wire:model="access" id="breed_edit"> <label for="breed_edit">{{ __('Edit') }}</label></li>
		<li class="list-inline-item"><input type="checkbox" {{ $access->checkAccess($user_id, $farm, 'breed_delete') ? 'checked' : '' }} value="breed_delete" name="access[]" wire:model="access" id="breed_delete"> <label for="breed_delete">{{ __('Delete') }}</label></li>
	</ul>
</div>