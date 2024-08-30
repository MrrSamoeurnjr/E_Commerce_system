<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New vs Returning Customers</title>
    @include('admin.css')
    <style>
        .card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            text-align: center;
        }
        .card h4 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 15px;
        }
        .card p {
            color: #555;
            font-size: 1.2em;
        }
        .content-wrapper {
            padding: 40px;
        }
        .content-wrapper h2 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <h2>New vs Returning Customers</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>New Customers</h4>
                                <p>Total: {{ $newCustomers }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Returning Customers</h4>
                                <p>Total: {{ $returningCustomers }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Ratio of New to Returning Customers</h4>
                                <p>{{ $newCustomers }} : {{ $returningCustomers }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
