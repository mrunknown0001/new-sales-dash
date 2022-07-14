@inject('gc', '\App\Http\Controllers\GeneralController')

@if($gc->checkModuleAccess('sales_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.sales') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.sales') ? 'active' : '' }}" href="{{ route('pfc.sales') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Sales') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('region_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.region') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.region') ? 'active' : '' }}" href="{{ route('pfc.region') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Region') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('location_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.location') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.location') ? 'active' : '' }}" href="{{ route('pfc.location') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Location') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_type_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.customer.type') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.customer.type') ? 'active' : '' }}" href="{{ route('pfc.customer.type') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Customer Type') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.customer') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.customer') ? 'active' : '' }}" href="{{ route('pfc.customer') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Customer') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_type_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.product.type') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.product.type') ? 'active' : '' }}" href="{{ route('pfc.product.type') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product Type') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.product') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.product') ? 'active' : '' }}" href="{{ route('pfc.product') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_classification_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.product.classification') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.product.classification') ? 'active' : '' }}" href="{{ route('pfc.product.classification') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product Classification') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_quality_type_module', 'PFC'))
	<li class="sidebar-item {{ url()->current() == route('pfc.product.quality.type') ? 'selected' : '' }}"">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('pfc.product.quality.type') ? 'active' : '' }}" href="{{ route('pfc.product.quality.type') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product Quality Type') }}</span>
		</a>
	</li>
	@endif