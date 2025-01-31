<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
        }
        .beneficiary-section,
        .family-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .beneficiary-section h1,
        .family-section h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .beneficiary-details,
        .family-members {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .beneficiary-details p,
        .family-member p {
            margin: 5px 0;
        }
        .icon-container {
            margin-top: 10px;
        }
        .icon-container a {
            margin-right: 10px;
        }

        .showcontainer {
            position: absolute;
            right: 20px;
            left: 400px;
        }

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            /*padding: 20px;*/
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        /* Family Member Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
    </style>

<style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 7px;
        }
        .tank-section {
            background-color: #F0F0F0;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Black shadow */
        }
        .tank-section h1 {
            text-align: left;
            margin-bottom: 30px;
        }
        .tank-details .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .tank-details .info label {
            font-weight: bold;
            width: 30%;
        }
        .tank-details .info p {
            width: 70%;
            margin: 0;
        }
        .tank-details .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        .tank-details .info img {
            margin-right: 5px;
            width: 50px;
            height: 50px;
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #C1FFAC;
        }

        .card-body {
            padding: 15px;

        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        /* Additional spacing for the cards */
        .row.mt-4 {
            margin-top: 1.5rem;
        }
    </style>

<style>

.custom-frame {
            border: 2px solid rgba(0, 128, 0, 0.2);
            background-color: rgba(0, 128, 0, 0.2);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            /*align-items: center;*/
            justify-content: center;
            margin: 20px auto; /* Center horizontally and add vertical margin */
            max-width: 800px; /* Optional: set a maximum width */
        }

        .header-row {
            background-color: #129310;
        }
    </style>

<style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

    }
</style>

<style>
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
}

</style>

</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <div class="d-flex align-items-center mb-3">

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<!-- Back Button -->
    <a href="{{ route('beneficiary.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>



        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Beneficiary Details</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Beneficiary Details Section -->
                    <div class="tank-section custom-frame">


                            <div class="tank-details">
                                    <div class="info">
                                        <label>ID:</label>
                                        <p>{{$beneficiary->id}}</p>
                                    </div>
                                    <div class="info">
                                        <label>Name with Initials:</label>
                                        <p>{{$beneficiary->name_with_initials}}</p>
                                    </div>

                                    <div class="info">
                                        <label>NIC:</label>
                                        <p>{{$beneficiary->nic}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Phone:</label>
                                        <p>{{$beneficiary->phone}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Tank Name :</label>
                                        <p>{{$beneficiary->tank_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Gender:</label>
                                        <p>{{$beneficiary->gender}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Date of Birth:</label>
                                        <p>{{$beneficiary->dob}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Address:</label>
                                        <p>{{$beneficiary->address}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Province Name:</label>
                                        <p>{{$beneficiary->province_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>District Name:</label>
                                        <p>{{$beneficiary->district_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>DS Division Name:</label>
                                        <p>{{$beneficiary->ds_division_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>GN Division Name:</label>
                                        <p>{{$beneficiary->gn_division_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>ASC:</label>
                                        <p>{{$beneficiary->as_center}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Cascade Name:</label>
                                        <p>{{$beneficiary->cascade_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>AI Division:</label>
                                        <p>{{$beneficiary->ai_division}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Number of Family Members:</label>
                                        <p>{{$beneficiary->number_of_family_members}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Head of Householder Name:</label>
                                        <p>{{$beneficiary->head_of_householder_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Householder Number:</label>
                                        <p>{{$beneficiary->householder_number}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Income Source:</label>
                                        <p>{{$beneficiary->income_source}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Average Income:</label>
                                        <p>{{$beneficiary->average_income}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Monthly Household Expenses:</label>
                                        <p>{{$beneficiary->monthly_household_expenses}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Household Level Assets:</label>
                                        <p>{{$beneficiary->household_level_assets_description}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Bank Name:</label>
                                        <p>{{$beneficiary->bank_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Bank Branch:</label>
                                        <p>{{$beneficiary->bank_branch}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Account Number:</label>
                                        <p>{{$beneficiary->account_number}}</p>
                                    </div>

                                    <div class="info">
    <label>Latitude:</label>
    <p id="latitude">{{$beneficiary->latitude ?? 'N/A'}}</p>
</div>
<div class="info">
    <label>Longitude:</label>
    <p id="longitude">{{$beneficiary->longitude ?? 'N/A'}}</p>
</div>
<div class="info">
<div id="map" style="width: 100%; height: 400px; margin-top: 20px;"></div>
    <label>View on Google Maps:</label>
    @if ($beneficiary->latitude && $beneficiary->longitude)
        <a href="https://www.google.com/maps?q={{ $beneficiary->latitude }},{{ $beneficiary->longitude }}"
           target="_blank"
           class="btn btn-primary">
            Open in Google Maps
        </a>
    @else
        <p style="color: red;">Location not available</p>
    @endif
</div>

    <hr>

    <!-- Display Input1: Agriculture/Livestock -->
    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Agriculture/Livestock:</strong>
        </div>
        <div class="col-md-6">
            {{ $beneficiary->input1 ?? 'N/A' }}
        </div>
    </div>

    <!-- Display Input2 and Input3 based on Input1 -->
    @if ($beneficiary->input1 === 'agriculture')
        <!-- Agriculture Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Crop Category:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input2 ?? 'N/A' }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Crop Name:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input3 ?? 'N/A' }}
            </div>
        </div>
    @elseif ($beneficiary->input1 === 'livestock')
        <!-- Livestock Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Livestock Type:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input2 ?? 'N/A' }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Production Focus:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input3 ?? 'N/A' }}
            </div>
        </div>
    @else
        <!-- Default Section for No Data -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Details:</strong>
            </div>
            <div class="col-md-6">
                No details available.
            </div>
        </div>
    @endif
</div>

                                </div>
                            </div>
                        </div>



                </div>
                <!-- Family Member Details Section -->
                <div class="">
                        <h2 style="color: green;">Family Members</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name with Initials</th>
                                    <th>NIC</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Youth</th>
                                    <th>Education</th>
                                    <th>Income Source</th>
                                    <th>Income</th>
                                    <th>Nutrition Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($beneficiary->families as $familyMember)

                                    <tr>
                                        <td>{{$familyMember->name_with_initials}}</td>
                                        <td>{{$familyMember->nic}}</td>
                                        <td>{{$familyMember->phone}}</td>
                                        <td>{{$familyMember->gender}}</td>
                                        <td>{{$familyMember->dob}}</td>
                                        <td>{{$familyMember->youth}}</td>
                                        <td>{{$familyMember->education}}</td>
                                        <td>{{$familyMember->income_source}}</td>
                                        <td>{{$familyMember->income}}</td>
                                        <td>{{$familyMember->nutrition_level}}</td>
                                        <td  class="button-container" style="display: flex; gap: 5px; align-items: center;">
                                            <a href='/family/{{$familyMember->id}}/edit' class="btn btn-primary btn-sm">Edit</a>
                                            <form action="/family/{{ $familyMember->id }}" method="POST" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const latitude = parseFloat(document.getElementById("latitude").innerText);
        const longitude = parseFloat(document.getElementById("longitude").innerText);

        // Default location (fallback if no data)
        const defaultLocation = [7.8731, 80.7718]; // Sri Lanka coordinates

        const mapCenter = (latitude && longitude) ? [latitude, longitude] : defaultLocation;

        // Initialize the map
        const map = L.map("map").setView(mapCenter, 10);

        // Add OpenStreetMap tiles
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 18,
            attribution: '© OpenStreetMap contributors',
        }).addTo(map);

        // Add a marker if coordinates are valid
        if (latitude && longitude) {
            L.marker([latitude, longitude])
                .addTo(map)
                .bindPopup("Beneficiary Location")
                .openPopup();
        } else {
            document.getElementById("map").innerHTML =
                "<p style='color: red; text-align: center;'>Location not available</p>";
        }
    });
</script>
<script>
    function initMap() {
        const latitude = parseFloat(document.getElementById('latitude').innerText);
        const longitude = parseFloat(document.getElementById('longitude').innerText);

        // Default location if no data
        const location = (latitude && longitude) ? { lat: latitude, lng: longitude } : { lat: 0, lng: 0 };

        // Initialize the map
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: location,
        });

        // Add marker if coordinates are valid
        if (latitude && longitude) {
            new google.maps.Marker({
                position: location,
                map: map,
                title: 'Beneficiary Location',
            });
        } else {
            document.getElementById('map').innerHTML = '<p style="color: red; text-align: center;">Location not available</p>';
        }
    }
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });
    });
</script>

</body>
</html>
