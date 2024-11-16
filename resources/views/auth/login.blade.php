<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COTS Southern Leyte')</title>
    <style>
        /* Include your CSS here */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .header {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            height: 100vh;
            position: relative;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 57px;
        }

        .header h1 {
            font-size: 2.5em;
            margin-top: 20px;
        }

        .header p {
            max-width: 20%;
            margin: auto 80px 20px auto;
            font-size: 1.3em;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0);
            border-radius: 5px;
            text-align: left;
        }

        .login-btn-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .btn-login {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .content {
            padding: 20px;
            background-color: #e0f7fa;
            text-align: center;
            height: auto;
        }

        .content h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        .content .species-images img {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin: 10px;
            border-radius: 5px;
        }

        .contact-info {
            padding: 20px;
            background-color: #b2ebf2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-info .details {
            text-align: left;
        }

        .contact-info .details .img {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        .contact-info .details img {
            width: 150px;
            height: auto;
        }

        .contact-info .details .info p {
            text-align: center;
            display: flex;
        }

        .map {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin: 20px auto;
            flex-wrap: wrap;
        }

        .map img {
            width: 100%;
            max-width: 48%;
            height: auto;
            margin-bottom: 20px;
        }

        .map p {
            max-width: 48%;
            font-size: 1.5em;
            padding: 10px;
            background-color: rgb(224, 247, 250);
            border-radius: 5px;
            text-align: left;
            margin-left: auto;
        }

        .footer {
            padding: 10px;
            background-color: #555;
            color: white;
            font-size: 0.9em;
            text-align: center;
            position: initial;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .header p {
                font-size: 1em;
            }

            .content h2 {
                font-size: 1.5em;
            }

            .contact-info .details div {
                flex-direction: column;
            }

            .contact-info .details img {
                width: 40px;
            }

            .map p {
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.5em;
            }

            .header p {
                font-size: 0.9em;
            }

            .content h2 {
                font-size: 1.2em;
            }

            .contact-info .details img {
                width: 30px;
            }

            .map p {
                font-size: 0.8em;
            }
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>

    <div class="login-btn-container">
        <a type="button" class="btn-login btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
    </div>
    
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login to Sneat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="header">
        <h1>Welcome to Coral Protector</h1>
        <p>Your go-to resource for Commercial Off-The-Shelf (COTS) solutions. Explore our comprehensive range of COTS products designed to streamline your operations, reduce costs, and enhance efficiency. From software to hardware, our expert-curated selections meet diverse needs with proven reliability and performance. Get insights and make informed decisions with our detailed reports available at the end of each product description. Dive in and discover how COTS can transform your business today!</p>    </div>

    <div class="content">
        <h2>Most Dangerous Species</h2>
        <div class="species-images">
            <img src="{{ asset('images/cots1.jpg') }}" alt="Species 1">
            <img src="{{ asset('images/cots2.jpg') }}" alt="Species 2">
            <img src="{{ asset('images/cots1.jpg') }}" alt="Species 3">
        </div>

        <div class="map">
            <img src="{{ asset('images/maps.png') }}" alt="Map of Southern Leyte">
            <p>Southern Leyte, a stunning province in the Philippines, faces significant challenges related to its marine ecosystem. The area has been struggling with illegal fishing practices that threaten its rich biodiversity and disrupt the balance of its underwater habitats. Additionally, an outbreak of Crown-of-Thorns Starfish (COTS) has exacerbated the problem, as these invasive predators damage coral reefs and further strain the local marine environment. Efforts to address these issues are crucial for preserving Southern Leyte’s unique marine life and ensuring the health of its ecosystems for future generations.</p>        </div>
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
                </p>            </div>  
            <div class="info">
                <p><strong>Contact Details:</strong></p>
                <p>📞 <strong>0993023200445</strong></p>
                <p>✉️ <strong>dssdks@gmail.com</strong></p>
            </div>        
        </div>
    </div>  

    <div class="footer">
        <p>ALL RIGHTS RESERVED 2024</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
