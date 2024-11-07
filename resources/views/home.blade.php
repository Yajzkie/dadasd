<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COTS Southern Leyte')</title>

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>


<body>
    <div class="nav">
        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</a>

    </div>
    <div>
    <div class="header">
        <h1>Welcome to [Your Website Name]</h1>
        <p>Your go-to resource for Commercial Off-The-Shelf (COTS) solutions. Explore our comprehensive range of COTS products designed to streamline your operations, reduce costs, and enhance efficiency. From software to hardware, our expert-curated selections meet diverse needs with proven reliability and performance. Get insights and make informed decisions with our detailed reports available at the end of each product description. Dive in and discover how COTS can transform your business today!</p>
    </div>

    <div class="content">
        <h2>Most Dangerous Species</h2>
        <div class="species-images">
            <img src="{{ asset('images/cots1.jpg') }}" alt="Species 1">
            <img src="{{ asset('images/cots2.jpg') }}" alt="Species 2">
            <img src="{{ asset('images/cots1.jpg') }}" alt="Species 3">
        </div>

        <div class="map">
            <img src="{{ asset('images/maps.png') }}" alt="Map of Southern Leyte">
            <p>Southern Leyte, a stunning province in the Philippines, faces significant challenges related to its marine ecosystem. The area has been struggling with illegal fishing practices that threaten its rich biodiversity and disrupt the balance of its underwater habitats. Additionally, an outbreak of Crown-of-Thorns Starfish (COTS) has exacerbated the problem, as these invasive predators damage coral reefs and further strain the local marine environment. Efforts to address these issues are crucial for preserving Southern Leyte’s unique marine life and ensuring the health of its ecosystems for future generations.</p>
        </div>
    </div>

    <div class="contact-info">
        <div class="details">
            <div class="img">
                <img src="{{ asset('images/logo1.jpg') }}" alt="Logo 1">
                <img src="{{ asset('images/logo3.jpg') }}" alt="Logo 2">
                <p>
                    In Partnership with: <br> 
                    <span style="font-weight: bold;">SOUTHERN LEYTE UNIVERSITY-BONTOC CAMPUS, <br>
                    RESEARCH, INNOVATION AND EXTENSION SERVICES -SLSU BONTOC and <br>
                    Bureau of Fisheries and Aquatic Resources</span>
                </p>
            </div>  
            <div class="info">
                <p><strong>Contact Details:</strong></p>
                <p>📞 <span style="font-weight: bold;">0993023200445</span></p>
                <p>✉️ <span style="font-weight: bold;">dssdks@gmail.com</span></p>
            </div>        
            
        </div>
    </div>  



<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">{{ __('Login to Sneat') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="app-brand justify-content-center mb-4">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <!-- SVG Logo Here -->
                        </span>
                        <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                    </a>
                </div>
                <p class="mb-4 text-center">Please sign in to your account and start the adventure</p>

                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <small>{{ __('Forgot Your Password?') }}</small>
                            </a>
                            @endif
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autocomplete="current-password">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Login') }}</button>
                    </div>
                </form>

                <p class="text-center">
                    <span>{{ __('New on our platform?') }}</span>
                    <a href="{{ route('register') }}">
                        <span>{{ __('Create an account') }}</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
    <div class="footer">
        <p>ALL RIGHTS RESERVED 2024</p>
    </div>
</body>
</html>
