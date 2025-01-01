<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('superadmin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('superadmin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('superadmin.header')
        <!-- partial -->
        @include('superadmin.body')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('superadmin.script')
  </body>
</html>