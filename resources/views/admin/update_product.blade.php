<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
            <h2 class="font_size">Update Product</h2>

            <div class="margin_top">
          <form action="{{url('/update_product_confirm' , $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="design_label">
                <label for="">Product Title:</label>
                <input type="text" class="text_color" name="title" placeholder="Write a title" require="" value="{{$product->title}}">
            </div>
            <div class="design_label">
                <label for="">Product description:</label>
                <input type="text" class="text_color" name="description" placeholder="Write a discription" require="" value="{{$product->description}}">
            </div>
            <div class="design_label">
                <label for="">Product price:</label>
                <input type="number" class="text_color" name="price" placeholder="Write a price" require="" value="{{$product->price}}">
            </div>
            <div class="design_label">
                <label for="">Discrount Price:</label>
                <input type="number" class="text_color" name="discount_price" placeholder="Write a discount price" require="" value="{{$product->discount_price}}">
            </div>
            <div class="design_label">
                <label for="">Product Quantity:</label>
                <input type="number" class="text_color" name="quantity" placeholder="Write a quantity" require="" value="{{$product->quantity}}">
            </div>
            <div class="design_label">
                <label for="">Product Category:</label>
                <select name="category" id="" class="text_color" require="">
                    @foreach($category as $category)
                    <option value="" selected="">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="design_label">
                <label for="">Current image here:</label>
                <img style="margin:auto;" width="100" height="100" src="/product/{{$product->image}}" alt="">
            </div>
            <div class="design_label">
                <label for="">Product image here:</label>
                <input type="file" name="image" require="" >
            </div>
            <div class="design_label">
                <input type="submit" class="btn btn-success" value="Update Product">
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
