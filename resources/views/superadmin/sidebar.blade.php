 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
            <span>Gold Member</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="index.html">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#user-management" data-toggle="collapse" aria-expanded="false" aria-controls="user-management">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple"></i>
        </span>
        <span class="menu-title">User Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user-management">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('user_role_permission')}}">User Roles and Permissions</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/user-activity-logs.html">User Activity Logs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#system-settings" data-toggle="collapse" aria-expanded="false" aria-controls="system-settings">
        <span class="menu-icon">
          <i class="mdi mdi-settings"></i>
        </span>
        <span class="menu-title">System Settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="system-settings">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/configuration-management.html">Configuration Management</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/backup-restore.html">Backup and Restore</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#advanced-analytics" data-toggle="collapse" aria-expanded="false" aria-controls="advanced-analytics">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">Advanced Analytics</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="advanced-analytics">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/sales-reports.html">Sales and Revenue Reports</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/customer-insights.html">Customer Insights</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#security-management" data-toggle="collapse" aria-expanded="false" aria-controls="security-management">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">Security Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="security-management">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/access-control.html">Access Control</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/audit-logs.html">Audit Logs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#performance-monitoring" data-toggle="collapse" aria-expanded="false" aria-controls="performance-monitoring">
        <span class="menu-icon">
          <i class="mdi mdi-monitor"></i>
        </span>
        <span class="menu-title">Performance Monitoring</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="performance-monitoring">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/system-health.html">System Health</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/error-logs.html">Error Logs</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
