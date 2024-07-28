<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            margin-top: 10px;
            text-align: center;
        }
        .font_size {
            font-size: 30px;
        }
        .text_color
        {
            font-size: 15px;
            color: black;
        }
        .margin_top
        {
            margin-top: 10px;
        }
        label
        {
          display: inline-block;
          width: 200px;
        }
        .design_label
        {
          margin-top: 10px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
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
          <div class="div_center">
            <h2 class="font_size">Add Product</h2>

            <div class="margin_top">
          <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="design_label">
                <label for="">Product Title:</label>
                <input type="text" class="text_color" name="title" placeholder="Write a title" require="">
            </div>
            <div class="design_label">
                <label for="">Product description:</label>
                <input type="text" class="text_color" name="description" placeholder="Write a discription" require="">
            </div>
            <div class="design_label">
                <label for="">Product price:</label>
                <input type="number" class="text_color" name="price" placeholder="Write a price" require="">
            </div>
            <div class="design_label">
                <label for="">Discrount Price:</label>
                <input type="number" class="text_color" name="discount_price" placeholder="Write a discount price" require="">
            </div>
            <div class="design_label">
                <label for="">Product Quantity:</label>
                <input type="number" class="text_color" name="quantity" placeholder="Write a quantity" require="">
            </div>
            <div class="design_label">
                <label for="">Product Category:</label>
                <select name="category" id="" class="text_color" require="">
                    <option value="" selected="">Add a category here</option>
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="design_label">
                <label for="">Product image here:</label>
                <input type="file" name="image" require="" >
            </div>
            <div class="design_label">
                <input type="submit" class="btn btn-success" value="Add Product">
            </div>
          </form>
          </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
