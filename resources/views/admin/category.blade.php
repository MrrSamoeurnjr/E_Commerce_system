<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center 
        {
            text-align: center;
        }
        .font-h2
        {
            padding: 10px;
            font-size: 40px;
        }
        form 
        {
            margin-top: 10px;
            padding: 5px;
        }
        form input 
        {
            margin: 10px;
        }
        .input_categoryname 
        {
            font-size: 10px;
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
        @include('admin.header')
        <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <div class="div_center">
            <h2 class="font-h2">Add Category</h2>
            <form action="{{url('/add_category')}}" method="POST">
                @csrf
                <input class="input_categoryname" type="text" name="category" placeholder="Write category name">
                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
            </form>
            </div>
            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td>
                        <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>