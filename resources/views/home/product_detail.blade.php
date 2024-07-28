<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
       <style type="text/css">
        .edit_product_detail {
            padding: 20px;
            text-align: center;
            margin: auto;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: #fff;
        }
        .edit_image {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }
        .detail-box {
            padding: 20px;
        }
        .detail-box h5 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .detail-box h6 {
            font-size: 20px;
            margin: 10px 0;
        }
        .detail-box p {
            margin: 5px 0;
        }
        .discount-price {
            color: red;
            font-weight: bold;
        }
        .original-price {
            text-decoration: line-through;
            color: grey;
        }
        .more_descript h6 {
            font-size: 16px;
            color: #555;
        }
        .btn-danger {
            background-color: #ff4d4d;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-danger:hover {
            background-color: #ff1a1a;
        }
       </style>
       <base href="/public">
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
   <body>
    <div class="product_detail">
      <div class="hero_area">
         <!-- header section starts -->
         @include('home.header')
         <div class="edit_product_detail">
            <div class="img-box">
               <img class="edit_image" src="/product/{{$product->image}}" alt="{{$product->title}}">
            </div>
            <div class="detail-box">
               <h5>{{$product->title}}</h5>
               @if($product->discount_price != null) 
                  <h6 class="discount-price">
                     <p>Discount</p>
                     ${{$product->discount_price}}
                  </h6>
                  <h6 class="original-price">
                     <p>Price</p>
                     ${{$product->price}}
                  </h6>
               @else
                  <h6 class="discount-price">
                     <p>Price</p>
                     ${{$product->price}}
                  </h6>
               @endif
               <div class="more_descript">
                  <h6>Product category: {{$product->category}}</h6>
                  <h6>Available quantity: {{$product->quantity}}</h6>
                  <h6>Product detail: {{$product->description}}</h6>
                  <form action="{{url('add_cart' , $product->id)}}" method="POST">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                 </div>
                                 <div class="col-md-4">
                                 <input type="submit" value="Add to casrt">
                                 </div>
                              </div>
                           </form>
                  <!-- <a href="" class="btn btn-danger">Add to cart</a> -->
               </div>
            </div>
         </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div>
      <!-- jQuery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
    </div>
   </body>
</html>
