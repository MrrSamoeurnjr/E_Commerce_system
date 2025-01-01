<!DOCTYPE html>
<html lang="en">
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
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- Font Awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style type="text/css">
        .contact-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }
        .contact-section h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
            color: #333;
        }
        .contact-info {
            text-align: center;
            margin-bottom: 30px;
        }
        .contact-info p {
            font-size: 18px;
            color: #555;
            margin: 15px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contact-info p i {
            margin-right: 10px;
            color: #333;
            font-size: 20px;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .contact-info a:hover {
            color: #0056b3;
        }
        .map {
            text-align: center;
        }
        .map h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .map iframe {
            width: 100%;
            height: 450px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header section starts -->
        @include('home.header')
        <!-- Contact section starts -->
        <div class="contact-section">
            <h1>Contact Us</h1>
            <div class="contact-info">
                <!-- <p><strong><i class="fa fa-envelope"></i> Email:</strong> samoeurnart6@gmail.com</p> -->
                <p><strong><i class="fa fa-envelope"></i> Email:</strong> 
    <a href="mailto:samoeurnart6@gmail.com">samoeurnart6@gmail.com</a>
</p>
                <p><strong><i class="fa fa-phone"></i> Phone:</strong> +855 66 371 061</p>
                <p><strong><i class="fa fa-telegram"></i> Telegram:</strong> 
                <a href="https://t.me/+85566371061" target="_blank">+855 66 371 061</a>
                </p>
                <!-- <p><strong><i class="fa fa-facebook"></i> Facebook page:</strong> 
                    <a href="https://www.facebook.com/SamoeurnArt" target="_blank">Samoeurn Art</a>
                </p> -->
                <p><strong><i class="fa fa-facebook"></i> Facebook page:</strong> 
    <a href="https://www.facebook.com/អាតសំអឿន" target="_blank">Samoeurn Art</a>
</p>

                <p><strong><i class="fa fa-map-marker"></i> Our Location:</strong> Battambang city, Sangkat Alung vil, SamoeurnJR freelancer</p>
            </div>
            <div class="map">
                <h2>You can check the map below</h2>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.835434509374!2d104.917445315318!3d11.556373991796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951b5e0b0b0b1%3A0x4b0b0b0b0b0b0b0b!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sus!4v1620221234567!5m2!1sen!2sus" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
        <!-- Footer section starts -->
        @include('home.footer')
        <!-- Footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
    <!-- jQuery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- Popper JS -->
    <script src="home/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="home/js/bootstrap.js"></script>
    <!-- Custom JS -->
    <script src="home/js/custom.js"></script>
</body>
</html>
