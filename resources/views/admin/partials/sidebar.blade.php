<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">{{ env('APP_SHORT_NAME') }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fas fa-fire"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="menu-header">Content</li> 
        <li class="nav-item dropdown active">
          <li class="{{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}" class="nav-link">
              <i class="fas fa fa-tags"></i>
              <span>Categories</span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}">
            <a href="{{ route('admin.attributes.index') }}" class="nav-link">
              <i class="fas fa fa-th"></i>
              <span>Attributes</span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}">
            <a href="{{ route('admin.brands.index') }}" class="nav-link">
              <i class="fas fa fa-briefcase"></i>
              <span>Brands</span>
            </a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-tasks"></i>
              <span>Manage</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="#" class="nav-link">
                  <i class="fas fa-users"></i>
                  <span>Users</span>
                </a>
            </li>
            </ul>
          </li> -->
        </li>

        <li class="menu-header">Settings</li> 
        <li class="{{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}">
          <a href="{{ route('admin.settings') }}" class="nav-link">
            <i class="fas fa-cogs"></i>
            <span>Settings</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link">
            <i class="fas fa-user"></i>
            <span>My Profile</span>
          </a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </aside>
</div>