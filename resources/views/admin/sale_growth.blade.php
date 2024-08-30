<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Growth</title>
    @include('admin.css')
    <style>
        .sales-growth-container {
            background-color: #f4f5f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .sales-growth-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .sales-growth-data {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
            text-align: center;
        }

        .growth-rate-positive {
            color: #4caf50;
            font-weight: bold;
        }

        .growth-rate-negative {
            color: #f44336;
            font-weight: bold;
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
                <div class="sales-growth-container">
                    <h4 class="sales-growth-title">Sales Growth</h4>
                    <p class="sales-growth-data">Current Period Sales: ${{ number_format($currentPeriodSales, 2) }}</p>
                    <p class="sales-growth-data">Previous Period Sales: ${{ number_format($previousPeriodSales, 2) }}</p>
                    <p class="sales-growth-data">
                        Growth Rate: 
                        <span class="{{ $growthRate >= 0 ? 'growth-rate-positive' : 'growth-rate-negative' }}">
                            {{ number_format($growthRate, 2) }}%
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
