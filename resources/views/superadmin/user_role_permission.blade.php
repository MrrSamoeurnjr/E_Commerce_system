<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
@include('superadmin.css')
<style>

</style>
<body>
<div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('superadmin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('superadmin.header')
            <div class="main-panel">
                <div class="content-wrapper">
                    
                </div>
            </div>
        </div>
</div>
    @include('superadmin.script')
</body>
</html>