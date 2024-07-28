<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .center 
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size
        {
            text-align:  center;
            font-size: 40px;
            padding-top: 20px;
        }
        .edit_images 
        {
            width:100%;
            height:100px;
        }
        .edit_caption
        {
            background-color: blue;
        }
        .edit_productinformation 
        {
            padding: 10px;
            color: white;
            font-size: 15px;
            font-family: 'Times New Roman', Times, serif;
        }
        .edit_infotitle 
        {
            padding: 10px;
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
           @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
                <h2 class="font_size">All product</h2>
                <table class="center">
                    <tr class="edit_caption">
                        <th class="edit_infotitle">Product title</th>
                        <th class="edit_infotitle">Description</th>
                        <th class="edit_infotitle">Quantity</th>
                        <th class="edit_infotitle">Category</th>
                        <th class="edit_infotitle">Price</th>
                        <th class="edit_infotitle">Discount price</th>
                        <th class="edit_infotitle">Product image</th>
                        <th class="edit_infotitle">Delete</th>
                        <th class="edit_infotitle">Update</th>
                        
                    </tr>
                    @foreach($product as $product)
                    <tr class="edit_productinformation">
                        <th>{{$product->title}}</th>
                        <th>{{$product->description}}</th>
                        <th>{{$product->quantity}}</th>
                        <th>{{$product->category}}</th>
                        <th>${{$product->price}}</th>
                        <th>{{$product->discount_price}}</th>
                        <td>
                        <img class="edit_images" src="/product/{{$product->image}}" alt="">
                        </td>
                        <td>
                            <a href="{{url('delete_product' , $product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this')">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('update_product' , $product->id)}}" class="btn btn-success">Update</a>
                        </td>
                    </tr>
                    @endforeach
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