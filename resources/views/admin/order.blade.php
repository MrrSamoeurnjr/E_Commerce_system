<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .text_order {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .edit_table_of_th {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
            table-layout: fixed;
        }
        .edit_table_of_th th, .edit_table_of_th td {
            padding: 10px; /* Adjust padding as needed */
            text-align: center;
            word-wrap: break-word; /* Add this line */
        }
        .edit_tr_of_th {
            background-color: blue;
        }
        .design_form 
        {
            margin-bottom: 5px;
            text-align: center;
        }
        .design_form input
        {
            border-radius: 5px;
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
                    <h1 class="text_order">All Orders</h1>
                    <div class="design_form">
                        <form action="{{ url('searchData') }}" method="get">
                            @csrf
                            <input style="color:black;" type="text" name="search" placeholder="Search For Something">
                            <input type="submit" value="search" class="btn btn-outline-primary">
                        </form>
                    </div>
                    <table class="edit_table_of_th">
                        <tr class="edit_tr_of_th">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Delivery</th>
                            <th>Print</th>
                            <th>Send email</th>
                        </tr>
                        @forelse($order as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td> <!-- Corrected 'pice' to 'price' -->
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td><img src="/product/{{$order->image}}" alt=""></td>
                            <td>
                            @if($order->delivery_status=="processing")
                                <a class="btn btn-primary" onclick="return confirm('Are you sure this order is delivered')"  href="{{url('delivery' , $order->id)}}">Delivery</a> <!-- Added button element -->
                            @else
                            <p>delivered</p>
                            @endif
                            </td>
                            <td><a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a></td>
                            <td><a href="{{ url('send_email', $order->id) }}" class="btn btn-secondary">Send email</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">No Data Found</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>
</html>
