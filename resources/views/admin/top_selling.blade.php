<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Products</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.css') }}">
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
            color: black;
        }
        .edit_title 
        {
            color: black;
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
                <h1>Top Selling Products</h1>
    <table>
        <thead>
            <tr class="edit_title">
                <th>Product Title</th>
                <th>Total Orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topSellingProducts as $product)
                <tr>
                    <td>{{ $product->product_title }}</td>
                    <td>{{ $product->total_orders }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
        </div>
</div> 
</body>
</html>
