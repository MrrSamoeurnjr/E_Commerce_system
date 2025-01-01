<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <style type="text/css">
    .center {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    text-align: left;
}

th, td {
    padding: 12px 15px;
}

th {
    background-color: #f2f2f2;
    color: #333;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

td img {
    width: 100px;
    height: auto;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.alert {
    margin: 20px;
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}

.alert .close {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.alert .close:hover {
    color: black;
}
   </style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
         <div class="center">
            <table>
                <tr>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Images</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach($order as $order)
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="product/{{$order->image}}" alt="">
                    </td>
                    <td>
                        @if($order->delivery_status == 'processing')
                        <a onclick="return confirm('Are you sure to cancel this product?')" class="btn btn-danger" href="{{url('cancel_order', $order->id )}}">Cancel order</a>
                        @else
                        <p>Not allowed</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
         </div>
      </div>'
      <!-- Footer section -->
    @include('home.footer')'
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>