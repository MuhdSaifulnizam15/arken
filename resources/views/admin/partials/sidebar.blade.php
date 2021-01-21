<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">{{ env('APP_SHORT_NAME') }}</a>
    </div>
    <ul class="sidebar-menu">
      <li>
        <a href="#" class="nav-link">
          <i class="fas fa-fire"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Content</li> 
      <li class="nav-item dropdown active">
        <li>
          <a href="#" class="nav-link">
            <i class="fas fa-file-archive"></i>
            <span>Media</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link">
            <i class="fas fa-syringe"></i>
            <span>Daily Dose</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link">
            <i class="fas fa-tools"></i>
            <span>Quiz Builder</span>
          </a>
        </li>
        <li class="nav-item dropdown">
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
            <li>
              <a href="#" class="nav-link">
                <i class="far fa-file-word"></i>
                <span>Quizzes</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link">
                <i class="fas fa-school"></i>
                <span>Classes</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link">
                <i class="fas fa-user-graduate"></i>
                <span>Students</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link">
                <i class="far fa-paper-plane"></i>
                <span>Assignments</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link">
                <i class="fas fa-book"></i>
                <span>Subjects</span>
              </a>
            </li>
          </ul>
        </li>
      </li>

      <li class="menu-header">Settings</li> 
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-cogs"></i>
            <span>Settings</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#" class="nav-link">
                <i class="fas fa-user"></i>
                <span>My Profile</span>
              </a>
            </li>
          </ul>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </aside>
</div>