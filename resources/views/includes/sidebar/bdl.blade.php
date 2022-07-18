@inject('gc', '\App\Http\Controllers\GeneralController')

@if($gc->checkModuleAccess('sales_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-receipt"></i>
		  <span class="hide-menu">{{ __('Sales') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('area_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-map-marked-alt"></i>
		  <span class="hide-menu">{{ __('Area') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('type_of_tech_visit_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Type of Tech Visit') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-user-circle"></i>
		  <span class="hide-menu">{{ __('Customer') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('type_of_account_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-file-invoice"></i>
		  <span class="hide-menu">{{ __('Type of Account') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Product') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_type_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Product Type') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('breed_module', 'BDL'))
	<li class="sidebar-item">
		<a class="sidebar-link waves-effect waves-dark sidebar-link " href="#" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Breed') }}</span>
		</a>
	</li>
@endif