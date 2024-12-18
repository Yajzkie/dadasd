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
<body>


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
            </div>
        </div>

        <!-- Second Slide: Content and Map Section -->
        <div class="carousel-item">
    <div class="container my-5">
        <!-- Section Title -->
        <div class="row g-4 justify-content-center">
            <!-- Species Images -->
            <div class="col-md-4">
                <img src="{{ asset('images/img1.jpg') }}" class="img-fluid rounded shadow-sm" alt="Species 1">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/img2.jpg') }}" class="img-fluid rounded shadow-sm" alt="Species 2">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/img3.jpg') }}" class="img-fluid rounded shadow-sm" alt="Species 3">
            </div>
        </div>
    </div>

    <!-- Map and Description Section -->
    <div class="row my-5 d-flex justify-content-center align-items-center">
        <!-- Map -->
        <div class="col-lg-4 text-center">
            <img src="{{ asset('images/maps.png') }}" class="img-fluid rounded shadow-sm" alt="Map of Southern Leyte">
        </div>

        <!-- Description -->
        <div class="col-lg-6">
            <p class="bg-info text-white p-4 rounded shadow-sm">
            The Southern Leyte province in the Philippines is renowned for its abundant marine resources, with its coastal waters hosting vibrant coral reefs and a rich diversity of fish species. These ecosystems not only provide essential services such as fisheries and coastal protection but also contribute to the cultural and economic well-being of the local communities. However, these ecosystems are under significant threat from recurring outbreaks of Crown-of-Thorns Seastar (COTS).
COTS, in large numbers, are voracious coral predators that can devastate coral reef ecosystems if left unchecked. The resulting loss of coral cover diminishes biodiversity and could disrupt the balance of marine life and compromise the resilience of these ecosystems to other stressors, such as climate change and pollution. This could significantly affect not only the health of marine habitats but also the livelihoods of communities that depend on this resource for food and tourism opportunities.
To address this critical issue, the COTS Tracker Mobile Application offers a cutting-edge solution. By leveraging geospatial mapping and GPS technology, the app enables users to document and geo-reference specific COTS sightings. These user-submitted reports are aggregated into visual density maps, allowing conservation practitioners and local authorities to identify areas that require urgent actions or interventions.
The COTS Tracker is an invaluable tool for conserving Southern Leyte’s marine ecosystems. By providing actionable data, enhancing response efforts, and facilitating community involvement, it plays a key role in safeguarding biodiversity and ensuring its lasting benefits for future generations.
            </p>
        </div>
    </div>


    <div class="contact-info my-4">
    <div class="details d-flex justify-content-center align-items-center">
        <!-- Logos -->
        <div class="d-flex flex-row align-items-center me-4" style="gap: 20px;">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo 1" class="img-fluid shadow-sm" style="max-width: 80px;">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo 2" class="img-fluid shadow-sm" style="max-width: 80px;">
        </div>

        <!-- Contact Information -->
        <div class="info text-start">
            <p class="mb-1"><strong>Contact Details:</strong></p>
            <p class="mb-0">✉️ <a href="mailto:ries_bt@southernleytestateu.edu.ph" class="text-decoration-none text-primary">ries_bt@southernleytestateu.edu.ph</a></p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
