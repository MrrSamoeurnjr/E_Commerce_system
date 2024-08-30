<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Lifetime Value (CLV)</title>
    @include('admin.css')
    <style>
        /* Styling the main content area */
        .content-wrapper {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Ensure the table spans the full width */
        .table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Define specific widths for each column */
        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Adjust column width based on content */
        .table th:nth-child(1), .table td:nth-child(1) { width: 15%; } /* Name */
        .table th:nth-child(2), .table td:nth-child(2) { width: 20%; } /* Email */
        .table th:nth-child(3), .table td:nth-child(3) { width: 10%; } /* Total Spent */
        .table th:nth-child(4), .table td:nth-child(4) { width: 15%; } /* Average Purchase Value */
        .table th:nth-child(5), .table td:nth-child(5) { width: 10%; } /* Purchase Frequency */
        .table th:nth-child(6), .table td:nth-child(6) { width: 10%; } /* Customer Lifespan (Days) */
        .table th:nth-child(7), .table td:nth-child(7) { width: 20%; } /* CLV */

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center; /* Center align header text */
        }

        .table td {
            text-align: center; /* Center align all cell content */
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Highlighting rows on hover */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling the page header */
        h4 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 10px;
            }

            .table th, .table td {
                padding: 10px;
                font-size: 12px;
            }

            .table th:nth-child(1), .table td:nth-child(1),
            .table th:nth-child(2), .table td:nth-child(2),
            .table th:nth-child(3), .table td:nth-child(3),
            .table th:nth-child(4), .table td:nth-child(4),
            .table th:nth-child(5), .table td:nth-child(5),
            .table th:nth-child(6), .table td:nth-child(6),
            .table th:nth-child(7), .table td:nth-child(7) {
                width: auto; /* Allow automatic adjustment on smaller screens */
            }
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
                <h4>Customer Lifetime Value (CLV)</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Spent</th>
                            <th>Average Purchase Value</th>
                            <th>Purchase Frequency</th>
                            <th>Cus Lifespan (Days)</th>
                            <th>CLV</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customerLifetimes as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>${{ number_format($customer->total_spent, 2) }}</td>
                                <td>${{ number_format($customer->average_purchase_value, 2) }}</td>
                                <td>{{ $customer->purchase_count }}</td>
                                <td>{{ $customer->customer_lifespan }}</td>
                                <td>${{ number_format($customer->customer_lifetime_value, 2) }}</td>
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
