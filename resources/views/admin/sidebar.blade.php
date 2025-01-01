<style>
  .nav-item.menu-items {
    position: relative;
    transition: background-color 0.3s ease;
}

.nav-item.menu-items:hover {
    background-color: #2a3f54;
}

.nav-item .nav-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    transition: color 0.3s ease;
}

.nav-item .nav-link:hover {
    color: #1abc9c;
}

.nav-item .menu-icon i {
    font-size: 18px;
    margin-right: 10px;
    transition: transform 0.3s ease;
}

.nav-item .menu-icon i:hover {
    transform: rotate(20deg);
}

.nav-item .nav-link i.menu-arrow {
    transition: transform 0.3s ease;
}

.nav-item .nav-link[aria-expanded="true"] i.menu-arrow {
    transform: rotate(90deg);
}

.nav-item .sub-menu {
    padding-left: 30px;
}

.nav-item .sub-menu .nav-link {
    padding: 8px 15px;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-item .sub-menu .nav-link:hover {
    background-color: #34495e;
    color: #ecf0f1;
}
/* Add smooth transition for the collapse */
.collapse {
        transition: height 0.3s ease;
    }

    /* Customize the menu icon arrow rotation */
    .menu-arrow {
        transition: transform 0.3s ease;
    }

    .collapsed .menu-arrow {
        transform: rotate(-90deg);
    }

    /* Customize the hover effect on sub-menu items */
    .sub-menu .nav-link:hover {
        color: #ff5722; /* Customize the color on hover */
        text-decoration: underline;
    }

</style>
<script>
    $(document).ready(function(){
        // Handle the collapse toggle and arrow rotation
        $('[data-toggle="collapse"]').on('click', function() {
            $(this).find('.menu-arrow').toggleClass('collapsed');
        });
    });
</script>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="admin/samoeurn.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Samoeurn Art</h5>
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
                      <i class="mdi mdi-onepassword  text-info"></i>
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
            <a class="nav-link" href="{{url('/redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view_product') }}">Add Product</a></li>
                <li class="nav-item">
                   <a class="nav-link"  href="{{url('/show_product')}}">Show Product</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_category')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Order</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('popular_product')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Popular product</span>
            </a>
          </li>
          <li class="nav-item menu-items">
    <a class="nav-link" href="{{ url('user_activity_log') }}">
        <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">User Activity Log</span>
    </a>
</li>
 <li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#sales-reports" aria-expanded="false" aria-controls="sales-reports">
        <span class="menu-icon">
            <i class="mdi mdi-chart-line"></i>
        </span>
        <span class="menu-title">Sales Reports</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="sales-reports">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
                <a class="nav-link" href="{{ url('/daily_monthly_sale') }}">
                    <i class="mdi mdi-calendar"></i> Daily/Weekly/Monthly Sales
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/top_selling') }}">
                    <i class="mdi mdi-star"></i> Top Selling Products
                </a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="{{ url('/sale_by_cateogry') }}">
                    <i class="mdi mdi-tag-multiple"></i> Sales by Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/sale_by_reqion') }}">
                    <i class="mdi mdi-map-marker"></i> Sales by Region
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/sale_growth') }}">
                    <i class="mdi mdi-trending-up"></i> Sales Growth
                </a>
            </li>
        </ul>
    </div>
</li>
 <li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Customer Behavior Reports</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/new_vs_Returning_Customers') }}">New vs. Returning Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/customer_demo') }}">Customer Demographics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/customer_purchase_f') }}">Customer Purchase Frequency</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/customer_lifetime_value') }}">Customer Lifetime Value (CLV)</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.chats') }}">
        <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">View User Chats</span>
    </a>
</li>

</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

