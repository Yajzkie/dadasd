@extends('layouts.app')

@section('content')
<style>
    /* Modal Overlay */
    .modal.fade .modal-dialog {
        transform: scale(0.8);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .modal.fade.show .modal-dialog {
        transform: scale(1);
        opacity: 1;
    }

    /* Modal Content */
    .modal-content {
        border-radius: 12px;
        border: none;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background: linear-gradient(145deg, #f3f4f6, #ffffff);
    }

    .modal-header p {
    font-size: 0.9rem;
    color: #ffffff;
    margin: 0;
    padding-top: 5px;
    }


    /* Modal Header */
    .modal-header {
        background-color: #0056b3;
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        border-bottom: none;
        padding: 16px 24px;
    }
    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
    }
    .btn-close {
        color: white;
        opacity: 0.8;
    }
    .btn-close:hover {
        opacity: 1;
    }

    /* Modal Form */
    .form-group label {
        color: #333;
        font-weight: 500;
        margin-bottom: 8px;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        transition: box-shadow 0.3s ease;
    }
    .form-control:focus {
        box-shadow: 0 0 8px rgba(0, 86, 179, 0.2);
    }

    /* Modal Buttons */
    .btn-primary {
        background-color: #0056b3;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #004494;
    }
    .btn-secondary {
        border: none;
        background-color: transparent;
        color: #0056b3;
        transition: color 0.3s ease;
    }
    .btn-secondary:hover {
        color: #004494;
    }
</style>

<body>
<div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
                <div class="content-wrapper">
                    <div id="map" style="height: 100%;"></div>
                    <!-- Consent Modal -->
                        <div class="modal fade" id="consentModal" tabindex="-1" aria-labelledby="consentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="consentModalLabel">Data Privacy Consent</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            By clicking "I Agree," you consent to the collection and processing of your data for research and monitoring purposes, in accordance with applicable data privacy laws.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="agreeConsent">I Agree</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- Modal -->
                    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="locationModalLabel">Data Privacy Consent</h5>
                    <p style="font-size: 0.9rem; margin-top: 8px;">
                        By providing the information below, you consent to the collection and processing of your data for research and monitoring purposes, in accordance with applicable data privacy laws.
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-save-location') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="optional">
                    </div>
                    <div class="form-group">
                        <label for="date_of_sighting">Date of COTS Sighting:</label>
                        <input type="date" class="form-control" id="date_of_sighting" name="date_of_sighting" required>
                    </div>
                    <div class="form-group">
                        <label for="time_of_sighting">Time of COTS Sighting:</label>
                        <input type="time" class="form-control" id="time_of_sighting" name="time_of_sighting" required>
                    </div>
                    <div class="form-group">
                        <label for="municipality">Municipality Where COTS sighted</label>
                        <select class="form-control" id="municipality" name="municipality">
                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between" style="margin-top: 15px;">
                        <label class="me-3" style="min-width: 150px;">Size of COTS</label>
                        <label class="me-3" style="min-width: 150px;">Number  of COTS</label>
                    </div>

                    <!-- Add margin-top to space out the "Early Juvenile" field -->
                    <div class="form-group d-flex align-items-center justify-content-between" style="margin-top: 15px;">
                        <label for="early_juvenile" class="me-3" style="min-width: 150px;">Early Juvenile:</label>
                        <input type="number" class="form-control" id="early_juvenile" name="early_juvenile" min="1"  placeholder="Enter number of COTS">
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between">
                        <label for="juvenile" class="me-3" style="min-width: 150px;">Juvenile:</label>
                        <input type="number" class="form-control" id="juvenile" name="juvenile" min="1"  placeholder="Enter number of COTS">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <label for="sub_adult" class="me-3" style="min-width: 150px;">Sub Adult:</label>
                        <input type="number" class="form-control" id="sub_adult" name="sub_adult" min="1"  placeholder="Enter number of COTS">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <label for="adult" class="me-3" style="min-width: 150px;">Adult:</label>
                        <input type="number" class="form-control" id="adult" name="adult" min="1"  placeholder="Enter number of COTS">
                    </div>
                    <div class="form-group">
                        <label>total of cots:</label>
                        <input type="number" class="form-control" id="number_of_cots" name="number_of_cots" min="1"  placeholder="Enter number of COTS">
                    </div>
                    <div class="form-group">
                        <label for="activity_type">Type of Activity:</label>
                        <select class="form-control" id="activity_type" name="activity_type">
                            <option value="fishing/namasol">Fishing</option>
                            <option value="underwater photography">Underwater Photography / Video</option>
                            <option value="snorkeling">Snorkeling / Free Diving / Swimming</option>
                            <option value="recreational diving">Recreational / Scuba Diving</option>
                            <option value="shore gleaning">Shore gleaning</option>
                            <option value="spear fishing">Spear fishing</option>
                            <option value="other">Other</option>
                        </select>
                        <!-- Custom input for "Other" activity -->
                        <input type="text" class="form-control mt-2 d-none" id="custom_activity" name="custom_activity" placeholder="Please specify activity">
                    </div>
                    <div class="form-group">
                        <label for="observer_category">Observer Category:</label>
                        <select class="form-control" id="observer_category" name="observer_category">
                            <option value="fisherfolks">Fisherfolks</option>
                            <option value="barangay residents">Barangay Residents</option>
                            <option value="local government">Local Government Unit (LGU)</option>
                            <option value="independent researcher">Independent Researcher</option>
                            <option value="independent researcher">SLSU Researcher</option>
                            <option value="other">Other</option>
                        </select>
                        <!-- Custom input for "Other" observer -->
                        <input type="text" class="form-control mt-2 d-none" id="custom_observer" name="custom_observer" placeholder="Please specify observer category">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="description">Additional Comments or Observations:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Location</button>
                </div>
            </form>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <script>
    // Initialize the map
    var map = L.map('map').setView([10.306812602471465, 125.00810623168947], 12);

    // OSM layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    // Add Locate control
    L.control.locate().addTo(map);


    var geoJsonPolygon = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "properties": {},
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [125.02515501453013, 10.032553784991762],
                        [125.07184554869963, 10.021157495386717],
                        [125.13576332178366, 10.06206684363552],
                        [125.13451438400216, 10.091963662272903],
                        [125.12872705924485, 10.10960592645001],
                        [125.12729010074577, 10.134239745256242],
                        [125.13009829477699, 10.16480296150926],
                        [125.12699340233667, 10.18049036986909],
                        [125.09447303153883, 10.206218871355304],
                        [125.05659584579479, 10.297631416255442],
                        [125.0258533519555, 10.395425569187012],
                        [124.97762164587272, 10.397836935939551],
                        [124.9567179468848, 10.381001121502038],
                        [124.96679966471498, 10.251174429415457],
                        [124.97227916647046, 10.19319895491995],
                        [124.99563995681876, 10.145185088583375],
                        [125.02515501453013, 10.032553784991762]  // Back to the start
                    ]
                ]
            }
        }
    ]
};
// Add the slightly larger GeoJSON polygon to the map
var polygon = L.geoJSON(geoJsonPolygon, {
    style: function () {
        return {
            color: "#0000FF",  // Border color (still defined, but will be invisible)
            weight: 2,         // Border thickness
            opacity: 1,        // Make the border fully transparent
            fillOpacity: 0     // No fill color
        };
    }
}).addTo(map);

// Fit map to the new polygon bounds
map.fitBounds(polygon.getBounds());


// Add smaller GeoJSON polygon to the map
var polygon = L.geoJSON(geoJsonPolygon, {
    style: function () {
        return {
            color: "#0000FF",  // Border color (still defined, but will be invisible)
            weight: 2,         // Border thickness
            opacity: 1,        // Make the border fully transparent
            fillOpacity: 0     // No fill color
        };
    }
}).addTo(map);

// Fit map to smaller polygon bounds
map.fitBounds(polygon.getBounds());

    // Loop through each location from the backend and add markers
    @foreach ($locations as $location)
        var marker{{ $location->id }} = L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map);
    @endforeach

// Global marker variable for new markers
var marker;

// Click event to place a new marker
map.on('click', function (e) {
    var clickedPoint = e.latlng;

    // Check if the clicked point is inside the polygon
    var inside = false;
    polygon.eachLayer(function (layer) {
        if (layer.getBounds().contains(clickedPoint)) {
            inside = true;
        }
    });

    if (inside) {
        if (marker) {
            map.removeLayer(marker); // Remove existing marker
        }
        marker = L.marker(clickedPoint).addTo(map); // Place new marker

        // Temporarily store the coordinates
        document.getElementById('latitude').value = clickedPoint.lat;
        document.getElementById('longitude').value = clickedPoint.lng;

        // Show the consent modal
        $('#consentModal').modal('show');
    } else {
        alert("You can only place markers inside the sogod bay.");
    }
});

// Handle "Agree" button click in consent modal
document.getElementById('agreeConsent').addEventListener('click', function () {
    $('#consentModal').modal('hide'); // Hide consent modal
    $('#locationModal').modal('show'); // Show location modal
});

// Handle "Cancel" button in consent modal
document.querySelector('.btn-secondary[data-bs-dismiss="modal"]').addEventListener('click', function () {
    if (marker) {
        map.removeLayer(marker); // Remove marker if consent is not given
        marker = null;
    }
    });
</script>

<script>
    // Function to toggle custom input visibility based on selection
    document.getElementById('activity_type').addEventListener('change', function() {
        var activitySelect = document.getElementById('activity_type');
        var customActivityInput = document.getElementById('custom_activity');
        if (activitySelect.value === 'other') {
            customActivityInput.classList.remove('d-none');
        } else {
            customActivityInput.classList.add('d-none');
        }
    });

    document.getElementById('observer_category').addEventListener('change', function() {
        var observerSelect = document.getElementById('observer_category');
        var customObserverInput = document.getElementById('custom_observer');
        if (observerSelect.value === 'other') {
            customObserverInput.classList.remove('d-none');
        } else {
            customObserverInput.classList.add('d-none');
        }
    });

    // When the form is submitted, append the custom input value if provided
    document.querySelector('form').addEventListener('submit', function() {
        // If "Other" is selected for activity type and custom input is provided
        var activitySelect = document.getElementById('activity_type');
        var customActivityInput = document.getElementById('custom_activity');
        if (activitySelect.value === 'other' && customActivityInput.value) {
            activitySelect.value = customActivityInput.value; // Override the value with the custom input
        }

        // If "Other" is selected for observer category and custom input is provided
        var observerSelect = document.getElementById('observer_category');
        var customObserverInput = document.getElementById('custom_observer');
        if (observerSelect.value === 'other' && customObserverInput.value) {
            observerSelect.value = customObserverInput.value; // Override the value with the custom input
        }
    });
</script>
<script>
    // Function to update the total of COTS
    function updateTotal() {
        // Get values from the input fields and parse them as integers (default to 0 if empty)
        let earlyJuvenile = parseInt(document.getElementById('early_juvenile').value) || 0;
        let juvenile = parseInt(document.getElementById('juvenile').value) || 0;
        let subAdult = parseInt(document.getElementById('sub_adult').value) || 0;
        let adult = parseInt(document.getElementById('adult').value) || 0;

        // Calculate the total
        let total = earlyJuvenile + juvenile + subAdult + adult;

        // Update the total field
        document.getElementById('number_of_cots').value = total;
    }

    // Attach the updateTotal function to the input event for each relevant field
    document.getElementById('early_juvenile').addEventListener('input', updateTotal);
    document.getElementById('juvenile').addEventListener('input', updateTotal);
    document.getElementById('sub_adult').addEventListener('input', updateTotal);
    document.getElementById('adult').addEventListener('input', updateTotal);

</script>

    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
@endsection
