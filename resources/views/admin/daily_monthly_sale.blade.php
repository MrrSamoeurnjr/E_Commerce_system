<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily/Weekly/Monthly Sales</title>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container-scroller {
            display: flex;
        }
        .container-fluid {
            flex: 1;
        }
        .page-body-wrapper {
            padding: 20px;
        }
        .main-panel {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content-wrapper {
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 20px;
            color: yellowgreen;
            margin: 10px 0;
        }
        p {
            font-size: 18px;
            color: white;
            margin: 5px 0 20px 0;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>Sales Summary</h1>
                    <h2>Daily Sales</h2>
                    <p>Total: ${{ number_format($dailySales, 2) }}</p>

                    <h2>Weekly Sales</h2>
                    <p>Total: ${{ number_format($weeklySales, 2) }}</p>

                    <h2>Monthly Sales</h2>
                    <p>Total: ${{ number_format($monthlySales, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
