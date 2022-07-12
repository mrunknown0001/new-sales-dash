<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item {{ url()->current() == route('dash') ? 'selected' : '' }}">
          <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('dash') ? 'active' : '' }}"
              href="{{ route('dash') }}" aria-expanded="false">
            <i class="fa fa-tachometer-alt"></i>
            <span class="hide-menu">{{ __('Dashboard') }}</span>
          </a>
        </li>
        @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'superuser')
          <li class="sidebar-item {{ url()->current() == route('users') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('users') ? 'active' : '' }}"
                href="{{ route('users') }}" aria-expanded="false">
              <i class="fa fa-users"></i>
              <span class="hide-menu">{{ __('Users') }}</span>
            </a>
          </li>
          {{-- <li class="sidebar-item {{ url()->current() == route('access') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('access') ? 'active' : '' }}"
                href="{{ route('access') }}" aria-expanded="false">
              <i class="fa fa-universal-access"></i>
              <span class="hide-menu">Access</span>
            </a>
          </li> --}}
          <li class="sidebar-item {{ url()->current() == route('audits') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('audits') ? 'active' : '' }}"
                href="{{ route('audits') }}" aria-expanded="false">
              <i class="fa fa-file"></i>
              <span class="hide-menu">{{ __('Audit Trail') }}</span>
            </a>
          </li>
        @endif
        <li class="sidebar-item {{ url()->current() == route('setup') ? 'selected' : '' }}">
          <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('setup') ? 'active' : '' }}"
              href="{{ route('setup') }}" aria-expanded="false">
            <i class="fa fa-cogs"></i>
            <span class="hide-menu">{{ __('Setup') }}</span>
          </a>
        </li>
        <li class="sidebar-item {{ url()->current() == route('access.farm', ['code' => 'PFC']) || url()->current() == route('access.farm', ['code' => 'BDL']) || url()->current() == route('access.farm', ['code' => 'SWINE']) ? 'selected' : '' }}">
          <a class="sidebar-link has-arrow waves-effect waves-dark {{ url()->current() == route('access.farm', ['code' => 'PFC']) || url()->current() == route('access.farm', ['code' => 'BDL']) || url()->current() == route('access.farm', ['code' => 'SWINE']) ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-universal-access"></i>
            <span class="hide-menu">{{ __('Access') }}</span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level {{ url()->current() == route('access.farm', ['code' => 'PFC']) || url()->current() == route('access.farm', ['code' => 'BDL']) || url()->current() == route('access.farm', ['code' => 'SWINE']) ? 'in' : '' }}">
            <li class="sidebar-item {{ url()->current() == route('access.farm', ['code' => 'PFC']) ? 'active' : '' }}">
                <a href="{{ route('access.farm', ['code' => 'PFC']) }}" class="sidebar-link">
                <i class="fab fa-wpforms"></i>
                <span class="hide-menu">{{ __('PFC') }}</span>
              </a>
            </li>
            <li class="sidebar-item {{ url()->current() == route('access.farm', ['code' => 'BDL']) ? 'active' : '' }}">
                <a href="{{ route('access.farm', ['code' => 'BDL']) }}" class="sidebar-link">
                <i class="fab fa-wpforms"></i>
                <span class="hide-menu">{{ __('BDL') }}</span>
              </a>
            </li>
            <li class="sidebar-item {{ url()->current() == route('access.farm', ['code' => 'SWINE']) ? 'active' : '' }}">
                <a href="{{ route('access.farm', ['code' => 'SWINE']) }}" class="sidebar-link">
                <i class="fab fa-wpforms"></i>
                <span class="hide-menu">{{ __('SWINE') }}</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>