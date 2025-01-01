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
      <style type="text/css">
         .center 
         {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 3px;
         }
         table,th,td
         {
            border: 1px solid grey;
         }
         .th_style
         {
            font-size: 17px;
            padding: 5px;
            background: skyblue;
         }
         .edit_image 
         {
            width: 100%;
            height: 80px;
         }
         .edit_totalprice 
         {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
         }
         .edit_procced_order
         {
            margin-top: 20px;
         }
         .edit_tow_button
         {
            padding: 10px;
         }
      </style>
   </head>
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
            <th class="th_style">Product title</th>
            <th class="th_style">Product quantity</th>
            <th class="th_style">Price</th>
            <th class="th_style">Image</th>
            <th class="th_style">Action</th>
         </tr>
         <?php $totalprice=0 ?>
         @foreach($cart as $cart)
         <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}}</td>
            <td><img class="edit_image" src="/product/{{$cart->image}}" alt=""></td>
            <td><a onclick="return confirm('Are you sure to delete this product')" class="btn btn-danger" href="{{url('delete_cart' , $cart->id )}}">Remove</a></td>
         </tr>
         <?php $totalprice=$totalprice + $cart->price ?>
         @endforeach
         </table>
         <div>
            <p class="edit_totalprice">Total price: ${{$totalprice}}</p>
         </div>
         <div class="edit_procced_roder">
            <h3 class="edit_tow_button">Procced to Order</h3>
            <a class="btn btn-success" href="{{url('cash_order')}}">Cash on Delivery</a>
            <a class="btn btn-primary" href="{{url('stripe',$totalprice)}}">Pay Using Card</a>
            <a class="btn btn-secondary" href="{{url('qrcodeforpaying')}}">Pay Using QR Code</a>
         </div>
      </div>
      </div>
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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