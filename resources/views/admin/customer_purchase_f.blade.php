<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Purchase Frequency</title>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            color: #333;
        }
        
        .content-wrapper {
            padding: 20px;
        }

        h4 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .edit_cutstomer_purchase 
        {
            padding: 10px;
            color: white;
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
                <h4 class="edit_cutstomer_purchase">Customer Purchase Frequency</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number of Purchases</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customerPurchaseFrequency as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->purchase_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
