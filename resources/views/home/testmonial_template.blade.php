<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css">
    <!-- Font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet">
    <!-- Responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        .testimonial-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }
        .testimonial {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .customer-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .customer-info h4 {
            margin: 0;
            font-weight: bold;
        }
        .testimonial-rating {
            font-size: 1.2em;
            color: #f39c12;
        }
        .testimonial-text {
            font-style: italic;
            color: #555;
        }
        .btn-cta {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-cta:hover {
            background-color: #218838;
        }
        .testimonial-video {
            margin-top: 20px;
        }
        .testimonial-video iframe, .testimonial-video video {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        
        <!-- Testimonial Section -->
        <section class="testimonial-section">
            <div class="container">
                <h2 class="text-center mb-5">What Our Customers Say</h2>
                <div class="row">
                    <!-- Testimonial 1 -->
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://verint.imgix.net/wp-content/uploads/customer-calling-home-featured.png?fit=max&auto=format&auto=compress" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>John Doe</h4>
                                    <p>From Los Angeles, CA</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐⭐ 5/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"The product quality is amazing! Fast shipping and great customer service. I'll definitely be back for more."</p>
                            </div>
                            <!-- Video Testimonial -->
                            <div class="testimonial-video">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/tOwjEOt1zYU" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="testimonial-footer">
                                <p>Purchased on: July 15, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/HPVfdg86lOc" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/9MbXVM7IsdA" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/HSgjpQBkR0c" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/KNG-OqNe5PU" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/jTI1kgFBpWc" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/xcxGdoXIW8E" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonial">
                            <div class="testimonial-header">
                                <img src="https://thumbs.dreamstime.com/b/shot-young-man-wearing-headset-working-laptop-home-adjusting-to-new-ways-work-shot-young-man-wearing-245039024.jpg" alt="Customer Photo" class="customer-photo">
                                <div class="customer-info">
                                    <h4>Jane Smith</h4>
                                    <p>From New York, NY</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ⭐⭐⭐⭐ 4/5 Stars
                            </div>
                            <div class="testimonial-text">
                                <p>"Great value for the price! The product met all my expectations, and I would recommend it to my friends."</p>
                            </div>
                            <!-- YouTube Video Testimonial -->
                            <div class="testimonial-video">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/feGIjF0QW-s" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="testimonial-footer">
                                <p>Purchased on: August 1, 2024</p>
                                <a href="{{url('/')}}" class="btn-cta">Shop Now</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    @include('home.footer')
</body>
</html>
