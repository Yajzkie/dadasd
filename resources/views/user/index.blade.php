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
<div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
                <div class="content-wrapper">
                 <div id="map" style="height: 100%; position: relative; margin: 0 auto; "></div>
                 <div class="modal fade" id="consentModal" tabindex="-1" aria-labelledby="consentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="consentModalLabel">Data Privacy Consent</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="fs-5">
                                        All of the information that the respondents will provide will be treated as confidential and will only be used for research purposes.
                                        We are committed to protecting your personal information and respecting your privacy.
                                        Any personal information provided will be treated with confidentiality.
                                    </p> 
                                    
                                    <p class="text-muted">
                                        By clicking <strong>"I Agree"</strong>, you consent to the collection and processing of your data for research and monitoring purposes, in accordance with applicable data privacy laws.
                                    </p>
                                    <div class="text-center my-3">
                                        <img src="{{ asset('images/cots1.jpg') }}" class="img-fluid rounded" alt="Species 1">
                                    </div>
                                    <p>
                                        About the cots: detailed description goes here, explaining their significance and use in a clear manner.
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
                <h5 class="modal-title" id="locationModalLabel"></h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('user-save-location') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <!-- Form Fields -->
                <div class="form-group">
                    <label for="name">Name: (Ngalan)</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="optional">
                </div>
                <div class="form-group">
                    <label for="date_of_sighting">Date of COTS Sighting: (Petsa sa Pagkakita sa COTS)</label>
                    <input type="date" class="form-control" id="date_of_sighting" name="date_of_sighting" required>
                </div>
                <div class="form-group">
                    <label for="time_of_sighting">Time of COTS Sighting: (Oras sa Pagkakita sa COTS)</label>
                    <input type="time" class="form-control" id="time_of_sighting" name="time_of_sighting" required>
                </div>
                <div class="form-group">
                    <label for="municipality">Municipality Where COTS sighted (Munisipyo diin nakita ang COTS)</label>
                    <select class="form-control" id="municipality" name="municipality" required>
                            <option value="Bontoc">Bontoc</option>
                            <option value="Tomas Oppus">Tomas Oppus</option> 
                            <option value="Sogod">Sogod</option>
                            <option value="Malitbog">Malitbog</option>
                            <option value="Liloan">Liloan</option>
                            <option value="Libagon">Libagon</option>
                            <option value="Padre burgos">Padre Burgos</option>
                            <option value="San Francisco">San Francisco</option>
                            <option value="Limasawa">Limasawa</option>
                            <option value="Panaon">Panaon</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="barangay">Barangay:</label>
                    <input type="text" class="form-control" id="barangay" name="barangay" required>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between" style="margin-top: 15px;">
                    <label class="me-3" style="min-width: 150px;">Size of COTS inside a <br>10 x 10m area(kadak-on sa COTS)</label>
                    <label class="me-3" style="min-width: 150px;">Number  of COTS inside a <br>10 x 10m area(kadaghanon sa COTS)</label>
                </div>

                <!-- Add margin-top to space out the "Early Juvenile" field -->
                <div class="form-group d-flex align-items-center justify-content-between" style="margin-top: 15px;">
                    <label for="early_juvenile" class="me-3" style="min-width: 150px;">1-5cm:</label>
                    <input type="number" class="form-control" id="early_juvenile" name="early_juvenile" min="1"  placeholder="Enter number of COTS">
                </div>

                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="juvenile" class="me-3" style="min-width: 150px;">6-15cm:</label>
                    <input type="number" class="form-control" id="juvenile" name="juvenile" min="0"  placeholder="Enter number of COTS">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="sub_adult" class="me-3" style="min-width: 150px;">15-25cm:</label>
                    <input type="number" class="form-control" id="sub_adult" name="sub_adult" min="0"  placeholder="Enter number of COTS">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="adult" class="me-3" style="min-width: 150px;">25-35cm:</label>
                    <input type="number" class="form-control" id="adult" name="adult" min="0"  placeholder="Enter number of COTS">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="adult" class="me-3" style="min-width: 150px;">>35cm:</label>
                    <input type="number" class="form-control" id="late_adult" name="late_adult" min="0"  placeholder="Enter number of COTS">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="adult" class="me-3" style="min-width: 150px;">Total Cots:</label>
                    <input type="number" class="form-control" id="number_of_cots" name="number_of_cots" min="0" >
                </div>
                <div class="form-group">
                    <label for="activity_type">Type of Activity: (Tipo sa Aktibidad)</label>
                    <select class="form-control" id="activity_type" name="activity_type">
                        <option value="Fishing">Fishing: spearfishing / Gleaning</option>
                        <option value="Recreational diving">Recreational: Scuba Diving / Snorkeling / Free Diving / Swimming</option>
                        <option value="Research">research</option>
                        <option value="Cots collection">COTS Collection</option>
                        <option value="other">Other</option>
                    </select>
                    <!-- Custom input for "Other" activity -->
                    <input type="text" class="form-control mt-2 d-none" id="custom_activity" name="custom_activity" placeholder="Please specify activity">
                </div>
                <div class="form-group">
                    <label for="observer_category">Observer Category: (Kategoriya sa Obserbador)</label>
                    <select class="form-control" id="observer_category" name="observer_category">
                        <option value="Fisherfolks">Fisherfolks</option>
                        <option value="Barangay residents">Barangay Residents</option>
                        <option value="Local government">Local Government Unit (LGU)</option>
                        <option value="Advocacy groups">Advocacy Group (ex. Dap ag boys)</option>
                        <option value="Researcher">Researcher</option>
                        <option value="other">Other</option>
                    </select>
                    <!-- Custom input for "Other" observer -->
                    <input type="text" class="form-control mt-2 d-none" id="custom_observer" name="custom_observer" placeholder="Please specify observer category">
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude: (Latitud)</label>
                    <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude: (Longhitud)</label>
                    <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo: (Litrato)</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="description">Additional Comments or Observations: (Dugang nga mga Komentaryo o Observasyon)</label>
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
                        [
                        124.98882706137022,10.398399643957603],
                        [124.96538337058183,10.38719952081739],
                        [124.95600589426613,10.347007542865796],
                        [124.97074192847674,10.29890218090081],
                        [124.97141174821303,10.263312667596836],
                        [124.97141174821303,10.205965592498274],
                        [124.98212886400279,10.159816761533278],
                        [124.99820453768757,10.119595918359465],
                        [125.01026129294985,10.085305317819461],
                        [125.00892165347574,10.032543423636369],
                        [125.01495003110864,9.996924282406624],
                        [125.07389416794933,9.884104645319326],
                        [125.18709370347563,9.870246924008114],
                        [125.27082117058052,9.870906828729844],
                        [125.27617972847554,9.904560213998522],
                        [125.2547454968975,9.965259545956073],
                        [125.19178244163419,10.068158647849856],
                        [125.13953650216087,10.103769941717204],
                        [125.13082884558139,10.195417877137956],
                        [125.01762931005521,10.400376094583976],
                        [125.0028932758446,10.403011342620147],
                        [124.98882706137022,10.398399643957603]  
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
            opacity: 0,        // Make the border fully transparent
            fillOpacity: 0     // No fill color
        };
    }
}).addTo(map);

// Fit map to the new polygon bounds
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
        let lateadult = parseInt(document.getElementById('late_adult').value) || 0;


        // Calculate the total
        let total = earlyJuvenile + juvenile + subAdult + adult + lateadult;

        // Update the total field
        document.getElementById('number_of_cots').value = total;
    }

    // Attach the updateTotal function to the input event for each relevant field
    document.getElementById('early_juvenile').addEventListener('input', updateTotal);
    document.getElementById('juvenile').addEventListener('input', updateTotal);
    document.getElementById('sub_adult').addEventListener('input', updateTotal);
    document.getElementById('adult').addEventListener('input', updateTotal);
    document.getElementById('late_adult').addEventListener('input', updateTotal);


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

@endsection