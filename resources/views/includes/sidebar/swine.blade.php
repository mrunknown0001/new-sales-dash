@inject('gc', '\App\Http\Controllers\GeneralController')

@if($gc->checkModuleAccess('product_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-receipt"></i>
		  <span class="hide-menu">{{ __('Sales') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('farm_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Farm') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('department_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Department') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_category_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product Category') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Customer') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('sale_status_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Sale Status') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('classification_module', 'SWINE'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Classification') }}</span>
		</a>
	</li>
@endif