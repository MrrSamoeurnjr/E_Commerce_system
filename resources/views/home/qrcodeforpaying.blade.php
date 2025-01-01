<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Bank Account</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="home/css/style.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            transition: transform 0.3s;
            margin-bottom: 30px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-activate {
            width: 100%;
            margin-top: 10px;
        }
        .qr-code {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')

    <div class="container">
        <h2 class="text-center mb-4">Activate Bank Account for QR Code Payments</h2>
        <div class="row">
            <!-- ABA Bank Account Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ABA Bank</h5>
                        <p class="card-text">Activate your ABA Bank account for quick and secure QR code payments.</p>
                        <select class="form-control mb-3" id="currency-aba" onchange="updateQRCode('ABA')">
                            <option value="USD">USD ($)</option>
                            <option value="KHR">KHR (Riel)</option>
                        </select>
                        <button class="btn btn-primary btn-activate" onclick="activateBank('ABA')">Activate</button>
                    </div>
                </div>
                <div class="qr-code" id="qr-aba-usd" style="display:none;">
                    <h6>ABA QR Code (USD):</h6>
                    <img src="product/aba.jpg" alt="ABA QR Code USD" width="200">
                </div>
                <div class="qr-code" id="qr-aba-khr" style="display:none;">
                    <h6>ABA QR Code (KHR):</h6>
                    <img src="product/abarial.jpg" alt="ABA QR Code KHR" width="200">
                </div>
            </div>

            <!-- ACLEDA Bank Account Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ACLEDA Bank</h5>
                        <p class="card-text">Activate your ACLEDA Bank account for quick and secure QR code payments.</p>
                        <select class="form-control mb-3" id="currency-acleda" onchange="updateQRCode('ACLEDA')">
                            <option value="USD">USD ($)</option>
                            <option value="KHR">KHR (Riel)</option>
                        </select>
                        <button class="btn btn-primary btn-activate" onclick="activateBank('ACLEDA')">Activate</button>
                    </div>
                </div>
                <div class="qr-code" id="qr-acleda-usd" style="display:none;">
                    <h6>ACLEDA QR Code (USD):</h6>
                    <img src="product/acledausd.jpg" alt="ACLEDA QR Code USD" width="200">
                </div>
                <div class="qr-code" id="qr-acleda-khr" style="display:none;">
                    <h6>ACLEDA QR Code (KHR):</h6>
                    <img src="product/acledarial.jpg" alt="ACLEDA QR Code KHR" width="200">
                </div>
            </div>

            <!-- Phillip Bank Account Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Phillip Bank</h5>
                        <p class="card-text">Activate your Phillip Bank account for quick and secure QR code payments.</p>
                        <select class="form-control mb-3" id="currency-phillip" onchange="updateQRCode('PHILLIP')">
                            <option value="USD">USD ($)</option>
                            <option value="KHR">KHR (Riel)</option>
                        </select>
                        <button class="btn btn-primary btn-activate" onclick="activateBank('PHILLIP')">Activate</button>
                    </div>
                </div>
                <div class="qr-code" id="qr-phillip-usd" style="display:none;">
                    <h6>Phillip Bank QR Code (USD):</h6>
                    <img src="product/phillipusd.jpg" alt="Phillip Bank QR Code USD" width="200">
                </div>
                <div class="qr-code" id="qr-phillip-khr" style="display:none;">
                    <h6>Phillip Bank QR Code (KHR):</h6>
                    <img src="product/philliprial.jpg" alt="Phillip Bank QR Code KHR" width="200">
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.footer')

<script>
    function activateBank(bank) {
        // Hide all QR code sections
        document.getElementById('qr-aba-usd').style.display = 'none';
        document.getElementById('qr-aba-khr').style.display = 'none';
        document.getElementById('qr-acleda-usd').style.display = 'none';
        document.getElementById('qr-acleda-khr').style.display = 'none';
        document.getElementById('qr-phillip-usd').style.display = 'none';
        document.getElementById('qr-phillip-khr').style.display = 'none';

        // Show the QR code for the activated bank
        if (bank === 'ABA') {
            const currency = document.getElementById('currency-aba').value;
            document.getElementById('qr-aba-' + currency.toLowerCase()).style.display = 'block';
            alert('Activated ABA Bank account with currency: ' + currency);
        } else if (bank === 'ACLEDA') {
            const currency = document.getElementById('currency-acleda').value;
            document.getElementById('qr-acleda-' + currency.toLowerCase()).style.display = 'block';
            alert('Activated ACLEDA Bank account with currency: ' + currency);
        } else if (bank === 'PHILLIP') {
            const currency = document.getElementById('currency-phillip').value;
            document.getElementById('qr-phillip-' + currency.toLowerCase()).style.display = 'block';
            alert('Activated Phillip Bank account with currency: ' + currency);
        }
    }

    function updateQRCode(bank) {
        // Hide all QR codes when changing currency
        document.getElementById('qr-' + bank.toLowerCase() + '-usd').style.display = 'none';
        document.getElementById('qr-' + bank.toLowerCase() + '-khr').style.display = 'none';
    }
</script>

<!-- Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
