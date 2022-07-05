<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item {{ url()->current() ? 'selected' : '' }}">
          <a class="sidebar-link waves-effect waves-dark sidebar-link {{ url()->current() ? 'active' : '' }}"
              href="index.html" aria-expanded="false">
            <i class="mdi mdi-view-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        {{-- <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="charts.html" aria-expanded="false">
            <i class="mdi mdi-chart-bar"></i>
            <span class="hide-menu">Charts</span></a>
        </li>
        <li class="sidebar-item">
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