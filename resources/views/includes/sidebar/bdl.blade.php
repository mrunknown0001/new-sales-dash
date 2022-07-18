@inject('gc', '\App\Http\Controllers\GeneralController')

@if($gc->checkModuleAccess('sales_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.sales') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.sales') ? 'active' : '' }}" href="{{ route('bdl.sales') }}" aria-expanded="false">
		  <i class="fa fa-receipt"></i>
		  <span class="hide-menu">{{ __('Sales') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('area_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.area') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.area') ? 'active' : '' }}" href="{{ route('bdl.area') }}" href="{{ route('bdl.area') }}" aria-expanded="false">
		  <i class="fa fa-map-marked-alt"></i>
		  <span class="hide-menu">{{ __('Area') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('type_of_tech_visit_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.type.of.tech.visit') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.type.of.tech.visit') ? 'active' : '' }}" href="{{ route('bdl.type.of.tech.visit') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Type of Tech Visit') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.customer') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.customer') ? 'active' : '' }}" href="{{ route('bdl.customer') }}" aria-expanded="false">
		  <i class="fa fa-user-circle"></i>
		  <span class="hide-menu">{{ __('Customer') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('type_of_account_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.type.of.account') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.type.of.account') ? 'active' : '' }}" href="{{ route('bdl.type.of.account') }}" aria-expanded="false">
		  <i class="fa fa-file-invoice"></i>
		  <span class="hide-menu">{{ __('Type of Account') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.product') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.product') ? 'active' : '' }}" href="{{ route('bdl.product') }}" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Product') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_type_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.product.type') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.product.type') ? 'active' : '' }}" href="{{ route('bdl.product.type') }}" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Product Type') }}</span>
		</a>
	</li>
	</li>
@endif
@if($gc->checkModuleAccess('breed_module', 'BDL'))
	<li class="sidebar-item {{ url()->current() == route('bdl.breed') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('bdl.breed') ? 'active' : '' }}" href="{{ route('bdl.breed') }}" aria-expanded="false">
		  <i class="fa fa-egg"></i>
		  <span class="hide-menu">{{ __('Breed') }}</span>
		</a>
	</li>
@endif