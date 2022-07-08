<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item {{ url()->current() == route('dash') ? 'selected' : '' }}">
          <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('dash') ? 'active' : '' }}"
              href="{{ route('dash') }}" aria-expanded="false">
            <i class="fa fa-tachometer-alt"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'superuser')
          <li class="sidebar-item {{ url()->current() == route('users') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('users') ? 'active' : '' }}"
                href="{{ route('users') }}" aria-expanded="false">
              <i class="fa fa-users"></i>
              <span class="hide-menu">Users</span>
            </a>
          </li>
          <li class="sidebar-item {{ url()->current() == route('access') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('access') ? 'active' : '' }}"
                href="{{ route('access') }}" aria-expanded="false">
              <i class="fa fa-universal-access"></i>
              <span class="hide-menu">Access</span>
            </a>
          </li>
          <li class="sidebar-item {{ url()->current() == route('audits') ? 'selected' : '' }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('audits') ? 'active' : '' }}"
                href="{{ route('audits') }}" aria-expanded="false">
              <i class="fa fa-file"></i>
              <span class="hide-menu">Audit Trail</span>
            </a>
          </li>
        @endif
        <li class="sidebar-item {{ url()->current() == route('setup') ? 'selected' : '' }}">
          <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() == route('setup') ? 'active' : '' }}"
              href="{{ route('setup') }}" aria-expanded="false">
            <i class="fa fa-cogs"></i>
            <span class="hide-menu">Setup</span>
          </a>
        </li>
        {{-- <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false">
          <i class="mdi mdi-chart-bubble"></i>
          <span class="hide-menu">Widgets</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false">
            <i class="mdi mdi-border-inside"></i>
            <span class="hide-menu">Tables</span>
          </a>
        </li> --}}
      </ul>
    </nav>
  </div>
</aside>