<!DOCTYPE html>
<html lang="en">
<head>
    <title>AirPod Products</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
</head>
<body>
<div class="hero_area">
    <!-- Include the header -->
    @include('home.header')

    <div class="container my-4">
        <h1 class="text-center">AirPod Products</h1>
        <div class="row">
            @if($airpods->count() > 0)
                @foreach($airpods as $airpod)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/product/{{ $airpod->image }}" class="card-img-top" alt="AirPod Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $airpod->title }}</h5>
                                @if($airpod->discount_price)
                                    <p class="text-danger">Discount Price: ${{ $airpod->discount_price }}</p>
                                    <p class="text-muted"><del>Price: ${{ $airpod->price }}</del></p>
                                @else
                                    <p>Price: ${{ $airpod->price }}</p>
                                @endif
                                <a href="{{ url('/product-detail/' . $airpod->id) }}" class="btn btn-primary mb-2">View Details</a>
                                
                                <!-- Add to Cart Form -->
                                <form action="{{ url('add_cart', $airpod->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" name="quantity" value="1" min="1" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No airpods available at the moment.</p>
            @endif
        </div>
        <div class="d-flex justify-content-center">
        {{ $airpods->links() }}
        </div>
    </div>

    <!-- Include the footer -->
    @include('home.footer')
</div>
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
</body>
</html>
