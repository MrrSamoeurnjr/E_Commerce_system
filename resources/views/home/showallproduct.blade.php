<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="home/css/style.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">
    <style>
        /* Custom styles for the product cards */
        .card {
            transition: all 0.3s ease-in-out;
            margin-bottom: 30px;
            border: none;
            overflow: hidden; /* Hide overflow */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            color: #6c757d;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .product-price {
            font-size: 1.25rem;
            color: #333;
        }

        .product-discount {
            font-size: 1.25rem;
            color: red;
            font-weight: bold;
        }

        .product-category {
            color: #007bff;
            font-weight: 500;
        }

        /* Image styling */
        .product-image {
            width: 100%; /* Full width */
            height: 300px; /* Fixed height */
            /* object-fit: cover;  */
            transition: transform 0.3s ease; /* Smooth zoom on hover */
        }

        .product-image:hover {
            transform: scale(1.05); /* Slight zoom effect */
        }

        /* Responsive design tweaks */
        @media (max-width: 768px) {
            .card-img-top {
                height: auto;
            }
        }
    </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')
    <section class="container mt-5">
        <h2 class="text-center mb-4">All Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="/product/{{ $product->image }}" alt="Product Image" class="product-image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p><strong>Price: </strong><span class="product-price">${{ $product->price }}</span></p>
                            @if($product->discount_price)
                                <p><strong>Discount Price: </strong><span class="product-discount">${{ $product->discount_price }}</span></p>
                            @endif
                            <p><strong>Quantity: </strong>{{ $product->quantity }}</p>
                            <p><strong>Category: </strong><span class="product-category">{{ $product->category }}</span></p>
                            <a href="{{url('/')}}" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@include('home.footer')

<!-- Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
