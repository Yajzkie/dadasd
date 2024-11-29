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
            max-height: 50%;
            max-width: 70%;
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
            top: 50%;
            max-height:50% ;
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
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 0;
        }


    @media (max-width: 768px) {
    
        .header {
            height: auto;
        }

        .login-container {
            position: relative;
            transform: translate(0, 0);
            top: initial;
            left: initial;
        }

    }
    </style>
</head>
<body style="background-color: #d4eafd;">


<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <!-- First Slide: Header and Login Section -->
        <div class="carousel-item active">
            <div class="header text-center mb-5">
                <div>
                    <h1 class="display-1">Welcome to COTS Tracker</h1>
                </div>
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
                <p>
                The COTS Tracker Mobile Application is a fantastic method used to address the issue of Crown-of-Thorns
                 Starfish (COTS) in the coral reef environment. Utilising geospatial mapping and/or GPS to capture and
                  geo-reference particular locations of COTS sightings. It uses reports from its users and comes up with 
                  a visual density map that helps identify areas that need to be addressed.</p>
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
                    <p class="bg-info text-white p-3 rounded">
                        Despite its beauty, Southern Leyte province in the Philippines has several hurdles
                         when it comes to the marine environment issue. The area has been facing a major 
                         problem with poaching and other unlawful activities against the best interest of 
                         its aquatic ecosystem. Furthermore there has been a recent outbreak of the Crown-of-Thorns
                          Starfish (COTS) which feeds on coral and greatly contributes to the deterioration of coral 
                          reefs and further stress for the already struggling marine ecosystem. Measures to combat 
                          these problems are important in maintaining the beautiful and rich marine wildlife of Southern 
                          Leyte and its environment to benefit those who will come after us.</p>
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
