@inject('gc', '\App\Http\Controllers\GeneralController')

@if($gc->checkModuleAccess('product_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.sales') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.sales') ? 'active' : '' }}" href="{{ route('swine.sales') }}" href="{{ route('swine.sales') }}" aria-expanded="false">
		  <i class="fa fa-receipt"></i>
		  <span class="hide-menu">{{ __('Sales') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('farm_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.farm') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.farm') ? 'active' : '' }}" href="{{ route('swine.farm') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Farm') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('department_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.department') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.department') ? 'active' : '' }}" href="{{ route('swine.department') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Department') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('product_category_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.product.category') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.product.category') ? 'active' : '' }}" href="{{ route('swine.product.category') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Product Category') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('customer_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.customer') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.customer') ? 'active' : '' }}" href="{{ route('swine.customer') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Customer') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('sale_status_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.sale.status') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.sale.status') ? 'active' : '' }}" href="{{ route('swine.sale.status') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Sale Status') }}</span>
		</a>
	</li>
@endif
@if($gc->checkModuleAccess('classification_module', 'SWINE'))
	<li class="sidebar-item {{ url()->current() == route('swine.classification') ? 'selected' : '' }}">
		<a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('swine.classification') ? 'active' : '' }}" href="{{ route('swine.classification') }}" aria-expanded="false">
		  <i class="fa fa-file"></i>
		  <span class="hide-menu">{{ __('Classification') }}</span>
		</a>
	</li>
@endif