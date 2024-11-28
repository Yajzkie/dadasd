<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COTS Tracker')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .header {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            height: 100vh;
            position: relative;
            color: #000;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .header p {
            max-width: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: absolute;
            top: 48%;
            transform: translateY(-100%);
        }

        .map img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #555;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #d4eafd;">


<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <!-- First Slide: Header and Login Section -->
        <div class="carousel-item active">
            <div class="header text-center">
                <h1>Welcome to COTS Tracker</h1>
                <p>Your go-to resource for Commercial Off-The-Shelf (COTS) solutions. Explore 
                    our comprehensive range of COTS products designed to streamline your operations, reduce costs, and enhance 
                    efficiency. From software to hardware, our expert-curated selections meet
                     diverse needs with proven reliability and performance. Get insights and make informed 
                     decisions with our detailed reports available at the end of each product description. 
                     Dive in and discover how COTS can transform your business today!</p>

                <!-- Login Container -->
                <div class="login-container">
                    <div class="bg-white shadow p-4 rounded">
                        <h5 class="text-center mb-3">Login to COTS Tracker</h5>
                        <p1 class="text-center mb-4">Please sign-in to your account and start the adventure</p1>

                        <!-- Display login error message if available -->
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Display validation errors -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3 d-flex flex-wrap align-items-left">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                            </div>
                            <div class="mb-3 d-flex flex-wrap align-items-left">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Slide: Content and Map Section -->
        <div class="carousel-item">
    <div class="container my-5">
        <h2 class="text-center mb-4">Most Dangerous Species</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <img src="{{ asset('images/cots1.jpg') }}" class="img-fluid rounded" alt="Species 1">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/cots2.jpg') }}" class="img-fluid rounded" alt="Species 2">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/cots1.jpg') }}" class="img-fluid rounded" alt="Species 3">
            </div>
        </div>
    </div>

    <div class="row my-5 d-flex justify-content-center align-items-center">
        <div class="col-lg-4">
            <img src="{{ asset('images/maps.png') }}" class="img-fluid rounded" alt="Map of Southern Leyte">
        </div>

        <div class="col-lg-4">
            <p class="bg-info text-white p-3 rounded">Southern Leyte, a stunning province in the Philippines, faces significant challenges related to its marine ecosystem. The area has 
                been struggling with illegal fishing practices that threaten its rich biodiversity and disrupt the balance of its underwater habitats. Additionally, an outbreak of Crown-of-Thorns Starfish (COTS) 
                has exacerbated the problem, as these invasive predators damage coral reefs and further strain the local marine environment. Efforts to address these issues are crucial for preserving Southern Leyte’s
                unique marine life and ensuring the health of its ecosystems for future generations.</p>
        </div>
    </div>

    <!-- Contact Info Section -->
    <div class="contact-info my-4 d-flex justify-content-center">
    <div class="details d-flex align-items-start">
        <!-- Logos side by side -->
        <div class="img d-flex justify-content-start" style="gap: 10px;">
            <img src="{{ asset('images/logo1.jpg') }}" alt="Logo 1" class="mb-2" style="max-width: 80px;">
            <img src="{{ asset('images/logo3.jpg') }}" alt="Logo 2" class="mb-2" style="max-width: 80px;">
        </div>
        
        <!-- Contact Information -->
        <div class="info mt-3">
            <p><strong>Contact Details:</strong></p>
            <p>📞 <strong>0993023200445</strong></p>
            <p>✉️ <strong>dssdks@gmail.com</strong></p>
        </div>
    </div>
</div>

</div>


    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Footer -->
<div class="footer">
    <p>ALL RIGHTS RESERVED 2024</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
