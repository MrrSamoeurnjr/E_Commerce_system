<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
    <tr>
        <td>{{ $order->name }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->product_title }}</td>
        <td>{{ $order->quantity }}</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->payment_status }}</td>
        <td>{{ $order->delivery_status }}</td>
    </tr>
</tbody>

        </tbody>
    </table>
</body>
</html>
