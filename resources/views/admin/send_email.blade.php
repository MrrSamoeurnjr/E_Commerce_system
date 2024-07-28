<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .form-container {
            padding-left: 35%;
            padding-top: 30px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .form-container input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
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
            <div class="main-panel">
                <div class="content-wrapper">
                @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
                    <h1 style="text-align:center;font-size:25px;">Send Email to {{$order->email}}</h1>
                    <form action="{{url('send_email_notification' , $order->id)}}" method="POST">
                        @csrf
                        <div class="form-container">
                            <label for="greeting">Email Greeting:</label>
                            <input style="color:black;" type="text" id="greeting" name="greeting">
                        </div>
                        <div class="form-container">
                            <label for="firstline">Email FirstLine:</label>
                            <input style="color:black;" type="text" id="firstline" name="firstline">
                        </div>
                        <div class="form-container">
                            <label for="body">Email Body:</label>
                            <input style="color:black;" type="text" id="body" name="body">
                        </div>
                        <div class="form-container">
                            <label for="button">Email Button name:</label>
                            <input style="color:black;" type="text" id="button" name="button">
                        </div>
                        <div class="form-container">
                            <label for="url">Email Url:</label>
                            <input style="color:black;" type="text" id="url" name="url">
                        </div>
                        <div class="form-container">
                            <label for="lastline">Email LastLine:</label>
                            <input style="color:black;" type="text" id="lastline" name="lastline">
                        </div>
                        <div class="form-container">
                            <input type="submit" value="Send Email">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>
</html>
