<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

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
        /* Hero Area adjustments */
        .hero_area {
            padding-top: 30px;
        }

        /* About Us Section */
        .about_us_section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .about_us_section h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .about_us_section img {
            border-radius: 8px;
        }

        .about_us_section p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        /* Team Section */
        .team_section {
            padding: 60px 0;
        }

        .team_section h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .team_section .col-md-4 {
            text-align: center;
            margin-bottom: 30px;
        }

        .team_section .col-md-4 img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            max-width: 200px;
            margin-bottom: 20px;
        }

        .team_section h4 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .team_section p {
            font-size: 16px;
            color: #777;
        }

        /* Testimonials Section */
        .testimonials_section {
            background-color: #f8f9fa;
            padding: 60px 0;
            text-align: center;
        }

        .testimonials_section h2 {
            font-size: 36px;
            margin-bottom: 40px;
        }

        .testimonial {
            background-color: white;
            padding: 20px;
            margin: 10px auto;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .testimonial p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .testimonial h5 {
            margin-top: 10px;
            font-size: 20px;
            font-weight: 600;
        }

        /* Mission & Values Section */
        .mission_values_section {
            padding: 60px 0;
        }

        .mission_values_section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .mission_values_section p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        .mission_values_section ul {
            list-style: none;
            padding: 0;
        }

        .mission_values_section ul li {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
            color: #333;
            position: relative;
        }

        .mission_values_section ul li:before {
            content: "\f00c"; /* Font Awesome check mark */
            font-family: FontAwesome;
            position: absolute;
            left: -30px;
            top: 0;
            color: #28a745;
        }
    </style>
</head>
<body> 
    <div class="hero_area">
    @include('home.header')
        <section class="about_us_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://imgs.search.brave.com/zszk-8YA_F9QUvB5DIuDkETMBwZhTk_H9WEfBQLqPsg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTM3/MzI0MDgzOC9waG90/by9wb3NpdGl2ZS10/ZWFtLW1vdGl2YXRp/b24uanBnP3M9NjEy/eDYxMiZ3PTAmaz0y/MCZjPXp5TERxdmp4/WURWMG5oS2Y3bGFY/VWNPZXI1WlctRkg4/NjRJOWs2TFhnakk9" alt="About Us Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2>Our Story</h2>
                        <p>Founded in 2026, Samoeurn eCommerce Website started with a simple mission: to bring modern products to people everywhere. Over the years, we have grown into a trusted brand that values quality, customer satisfaction, and community engagement.</p>
                        <p>We believe in offering only the best clothes and ensuring that every customer has a seamless experience from browsing to delivery.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team_section">
            <div class="container">
                <h2>Meet the Team</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://imgs.search.brave.com/5soQSaRBuefhYpV-3knHA9qRI_vVZ0ulJ2C5T81gTLA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ1/MzM3NDUzNS9waG90/by9wb3J0cmFpdC1v/Zi1hLXlvdW5nLXVu/aXZlcnNpdHktc3R1/ZGVudC13b21hbi1h/dC11bml2ZXJzaXR5/LndlYnA_Yj0xJnM9/NjEyeDYxMiZ3PTAm/az0yMCZjPXladnBF/ajdzMmNiYjRTaDNj/V2FwZTFXN2pEQlZD/eFVQcnNuREYtcG0t/Q3c9" alt="Team Member" class="img-fluid">
                        <h4>Seivmey Sol</h4>
                        <p>Digital Marketing</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://thumbs.dreamstime.com/b/young-asian-engineer-portrait-cheerful-blueprint-his-hands-52875157.jpg" alt="Team Member" class="img-fluid">
                        <h4>Samoeurn Art</h4>
                        <p>Software Developer</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://as2.ftcdn.net/v2/jpg/02/91/67/67/1000_F_291676731_8z8ofQk5dxtbv0SwLK4TQDuBpUkLczzb.jpg" alt="Team Member" class="img-fluid">
                        <h4>Samphas Rith</h4>
                        <p>Programmer</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Customer Testimonials -->
        <section class="testimonials_section">
            <div class="container">
                <h2>What Our Customers Say</h2>
                <div class="testimonial">
                    <p>“I absolutely love the products from Samoeurn eCommerce. The quality is unmatched, and the customer service is top-notch!”</p>
                    <h5>- John Doe</h5>
                </div>
                <div class="testimonial">
                    <p>“Fast shipping, amazing products. I'm a regular customer now!”</p>
                    <h5>- Jane Smith</h5>
                </div>
            </div>
        </section>

        <!-- Mission and Values -->
        <section class="mission_values_section">
            <div class="container">
                <h2>Our Mission & Values</h2>
                <p>At Samoeurn eCommerce, we are driven by a clear mission: to provide customers with high-quality products and a seamless shopping experience.</p>
                <ul>
                    <li>Customer Satisfaction</li>
                    <li>Quality and Integrity</li>
                    <li>Innovation and Growth</li>
                    <li>Community Engagement</li>
                </ul>
            </div>
        </section>
 <!-- Footer section -->
    @include('home.footer')
    </div>
</body>
</html>
