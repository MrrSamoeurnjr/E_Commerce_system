<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity Log</title>
</head>
@include('admin.css')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .content-wrapper {
        padding: 20px;
    }

    h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table thead {
        background-color: #007bff;
        color: #fff;
    }

    table thead th {
        padding: 10px;
        text-align: left;
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody tr:hover {
        background-color: #e9ecef;
    }

    table tbody td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
        color: black;
    }

    .container-scroller {
        width: 100%;
    }

    .container-fluid {
        padding: 0;
        width: 100%;
    }

    .main-panel {
        width: 100%;
        background-color: #fff;
    }

    @media (max-width: 768px) {
        .content-wrapper {
            padding: 10px;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        table thead th, 
        table tbody td {
            padding: 8px;
        }
    }
</style>
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
    <table border="1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Registered At</th>
                <th>Total Products Ordered</th>
                <th>Total Money Spent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <div class="text_color">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y H:i:s') }}</td>
                    <td>{{ $user->total_products_ordered ?: 0 }}</td> <!-- Display 0 if null -->
                    <td>${{ number_format($user->total_money_spent ?: 0, 2) }}</td> <!-- Format as currency -->
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
</body>
</html>
