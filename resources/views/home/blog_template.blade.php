<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="ecommerce, blog, fashion, shopping">
    <meta name="description" content="Stay updated with the latest fashion trends, styling tips, and eCommerce news.">
    <meta name="author" content="Famms">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Famms Blog - Latest Fashion Trends</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css">
    <!-- Font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet">
    <!-- Responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet">

    <style>
        /* Styling for the hero section image */
        .hero_area {
            position: relative;
            text-align: center;
            background-color: #f4f4f4;
            padding: 40px 0;
        }

        .hero_area .edit_image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hero_area .edit_image {
            margin: 0 auto;
            display: block;
        }

        /* Blog section styles */
        .blog_box {
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
        }

        .blog_box:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .img-box img {
            width: 100%;
            height: 500px;
            border-bottom: 2px solid #ddd;
            transition: transform 0.3s ease-in-out;
        }

        .img-box img:hover {
            transform: scale(1.05);
        }

        .detail-box {
            padding: 20px;
            text-align: center;
        }

        .detail-box h5 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #333;
        }

        .detail-box p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-blog-read {
            text-transform: uppercase;
            color: white;
            background-color: #ff523b;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .btn-blog-read:hover {
            background-color: #ff784b;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header section -->
        @include('home.header')
        <div>
            <img class="edit_image" src="https://www.cotstyle.com/cdn/shop/articles/Fashion_Styles_Ultimate_Guide.png?v=1712915461" alt="Fashion Guide Image">
        </div>
    </div>

    <!-- Blog section -->
    <section class="blog_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>Latest Fashion Blog</h2>
                <p>Discover the latest trends and fashion tips from our experts</p>
            </div>

            <div class="row">
                <!-- Blog post 1 -->
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.olsenfashion.com/wp-content/uploads/2024/01/Blog_LeadImg_01-18-24.jpg" alt="Latest trends in fashion">
                        </div>
                        <div class="detail-box">
                            <h5>Trendy Summer Looks for 2024</h5>
                            <p>Stay cool and fashionable with these must-have summer styles. Read more to find out the best picks for your wardrobe...</p>
                            <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fm.economictimes.com%2Fmagazines%2Fpanache%2Fwinter-is-here-stock-your-wardrobe-with-these-fashion-essentials%2Fleather-jacket%2Fslideshow%2F95931227.cms&psig=AOvVaw1llb0Z6JEGtmAFOUzdp2G_&ust=1728444745415000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPCt_JTt_YgDFQAAAAAdAAAAABAE" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Blog post 2 -->
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://assets.vogue.com/photos/657b6b68f4f0d47ed9fe7e4a/master/w_1600%2Cc_limit/Toteme%25201.jpeg" alt="Winter fashion ideas">
                        </div>
                        <div class="detail-box">
                            <h5>Winter Fashion Essentials</h5>
                            <p>From cozy sweaters to trendy boots, discover the must-have items for this winter season...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Blog post 3 -->
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://assets.vogue.com/photos/62f557d4f68d425eaff20450/master/pass/00-promo.jpg" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.dbZIDEp-_UICaN5A00MI0gHaLu%26pid%3DApi&sp=1734189067T708207b9db13c25893e1c579c05291682af1d6967d92103809f894a30e9a24ba" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.mb67sttTNS_Co3Q7pWOxMwHaLD%26pid%3DApi&sp=1734189067T5e0355db4660795cc158a4844f5d6b4872440654bbc821347844c6d4c0d235bc" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.j09WUK9prexWxT_FE3gvHwHaIA%26pid%3DApi&sp=1734189332T3cef72f359617ccdcea8ee3233bdfb369d1b6cd51a9fdb9a7d82961081d036bb" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.roGb6ZsTBzOAdO4RucyknQHaNV%26pid%3DApi&sp=1734189387T6bcc3db86d38abb36d309524f700f1b3034e792703aa795a094645cf7b2b8f72" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.55VCk7do8fyFnSxKc15a_gHaJz%26pid%3DApi&sp=1734189332T60672a85ecc5f025ece77db4d50aadcd0ecefb47b793e1d054968576cbbded8e" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.ZdjWA7M1md6TgcTFE3XtMgAAAA%26pid%3DApi&sp=1734189332Ta5b2c76815784ca5995ac8e703a1665dc7b2198095fd139e929550a35cc17d72" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP._-yeBrLh8uaw-SwA8sdLZgAAAA%26pid%3DApi&sp=1734189387T7ff00c153af3760d75c9612001266809729eff678bbe435b295094fbf32a3891" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.S-rBos62_xl80UxXVH1TVgHaJF%26pid%3DApi&sp=1734189387Tfc2ea79b131a88e85f47cdbf685f88dfa8a423491d03ac54c6ce8f712fedbf2d" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.Dk1lV8Vga-Xamsq6p4_ksgHaL2%26pid%3DApi&sp=1734189387Tf8eb017a7776fe7497d074fdc681ad65fa0c3394a457642aa82c544ed8b173f5" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.zBfIOfMYDMOgnpLJF5Bd6AHaL7%26pid%3DApi&sp=1734189387T0c2c7f40923861b7fd9b3a92cfcc4b30fe8c307a1c07c2e376503401668cdd90" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.8UKUC0QxoNwLVWVL3JkV_gHaNK%26pid%3DApi&sp=1734189387T1bc1b8796e6380900818b4c0083327e7bb8eff4816d107691d27bcbe7446e045" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="img-box">
                            <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.HwwXZ0ATfHXmu4Ca6FYcqQHaLH%26pid%3DApi&sp=1734189387Tbc03088c42fc1722fc548fea8a95d68a53ed0de69e31752dca8d4fe6a0691026" alt="Street style inspiration">
                        </div>
                        <div class="detail-box">
                            <h5>Street Style Inspiration</h5>
                            <p>Explore bold and casual looks inspired by city streets. Perfect for everyday wear...</p>
                            <a href="#" class="btn btn-blog-read">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->
    @include('home.footer')

    <!-- Scripts -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>

</html>
