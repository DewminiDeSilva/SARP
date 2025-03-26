<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SARP APP</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




<style>
        /* Custom styles for your application */
        .entries-container {
            display: flex;
            align-items: center;
        }
        .entries-container label {
            margin-bottom: 0;
        }
        .entries-container select {
            display: inline-block;
            width: auto;
        }
        /* Add more custom styles as needed */
    </style>
    <style>
        .container {
            margin-top: 50px;
        }

        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dropdown-menu {
            min-width: auto;
        }

        .dropdown-item {
            padding: 10px;
            font-size: 16px;
        }

        /* Adjust button width to fit the content */
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }

        /* Center align labels */
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
    </style>

<style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }



        .button-container {
        display: flex;
        gap: 10px; /* Adjust the gap between buttons as needed */
    }

    .custom-button {
            background-color: white;
            color: red;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: border 0.3s ease; /* Smooth transition for border */
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            background-color: #f5c6cb;
        }

        .custom-button:hover {
            border-color: red; /* Border appears on hover */
            background-color: #f5c6cb;
        }

        .edit-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .edit-button:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .view-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }

        .view-button:hover {
            border-color: green; /* Border appears on hover */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }

        /*pagination css*/
        .pagination .page-item {
            margin:  0px; /* Adjust the margin to reduce space */
        }
        .pagination .page-link {
            padding: 5px 10px; /* Adjust padding to control button size */
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }

        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color : #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }

        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .pagination-container nav {
            margin-bottom: 10px; /* Adjust spacing as needed */
        }

        #tableInfo {
            text-align: center;
            width: 100%;
        }

        .addmember {
            background-color: white; /* White background */
            color: white; /* White color */
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            /*transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: green; /* Slightly darker light yellow on hover */
        }

        .addmember:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .submitbtton{
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
        }

        .custom-border {
            border-color: darkgreen !important;
        }
    </style>

<style>
        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            height: auto;
            margin-right: 5px;
            transition: transform 0.3s ease;
            background: none;
            position: relative;
            z-index: 1;
        }

        .btn-back .btn-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            right: 25px;
            background-color: #1e8e1e;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
            z-index: 0;
        }

        .btn-back:hover .btn-text {
            opacity: 1;
            visibility: visible;
            transform: translateX(-5px);
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-back:hover img {
            transform: translateX(-50px);
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


    <script>
        $(function() {
            // Initialize datepicker
            $("#dob").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0', // Restrict selection to today or earlier
                changeYear: true, // Allow changing year
                yearRange: '-100:+0' // Allow selection of dates up to 100 years ago
            });
        });
    </script>

</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">

    <div class="left-column">
        @include('dashboard.dashboardC')
    </div>

    <div class="right-column">

    <div class="d-flex align-items-center mb-3">

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>



        <div class="center-heading" style="text-align: center;">
            <h1 style="font-size: 2.5rem; color: green;">Edit Farmer Organization</h1>
        </div>

        <!-- form -->
        <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">

            </br>

            <form class="form-horizontal" method="POST" action="{{ route('farmerorganization.update', $farmerorganization->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="form-label dropdown-label">Province</label>
                            <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle"  onchange="populateDistricts()" required>
                                <option value="">Select Province</option>
                                <!-- Populate with existing data -->
                                <option value="North Central" {{ $farmerorganization->province_name == 'North Central' ? 'selected' : '' }}>North Central</option>
                                <option value="Northern" {{ $farmerorganization->province_name == 'Northern' ? 'selected' : '' }}>Northern</option>
                                <option value="Central" {{ $farmerorganization->province_name == 'Central' ? 'selected' : '' }}>Central</option>
                                <option value="North Western" {{ $farmerorganization->province_name == 'North Western' ? 'selected' : '' }}>North Western</option>
                                <!-- Add other provinces as needed -->
                            </select>
                            <input type="hidden" id="provinceName" name="province_name" value="{{ $farmerorganization->province_name }}">
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="form-label dropdown-label">District</label>
                            <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" onchange="populateDSDs()" required>
                                <option value="" disabled hidden>Select District</option>
                                <!-- Populate with existing data -->
                                <option value="Vavuniya" {{ $farmerorganization->district_name == 'Vavuniya' ? 'selected' : '' }}>Vavuniya</option>
                                <option value="Mannar" {{ $farmerorganization->district_name == 'Mannar' ? 'selected' : '' }}>Mannar</option>
                                <option value="Mathale" {{ $farmerorganization->district_name == 'Mathale' ? 'selected' : '' }}>Mathale</option>
                                <option value="Kurunagala" {{ $farmerorganization->district_name == 'Kurunagala' ? 'selected' : '' }}>Kurunagala</option>
                                <option value="Puttalam" {{ $farmerorganization->district_name == 'Puttalam' ? 'selected' : '' }}>Puttalam</option>
                                <!-- Add other districts as needed -->
                            </select>
                            <input type="hidden" id="districtName" name="district_name" value="{{ $farmerorganization->district_name }}">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="ds_division" class="form-label dropdown-label">DS Division</label>
                            <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" onchange="populateGNDASC()" required>
                                <option value="">Select DS Division</option>
                                <!-- Populate with existing data -->
                                <option value="Medawachchiya" {{ $farmerorganization->ds_division_name == 'Medawachchiya' ? 'selected' : '' }}>Medawachchiya</option>
                                <option value="Rambewa" {{ $farmerorganization->ds_division_name == 'Rambewa' ? 'selected' : '' }}>Rambewa</option>
                                <option value="Thirappane" {{ $farmerorganization->ds_division_name == 'Thirappane' ? 'selected' : '' }}>Thirappane</option>
                                <option value="Galenbidunuwewa" {{ $farmerorganization->ds_division_name == 'Galenbidunuwewa' ? 'selected' : '' }}>Galenbidunuwewa</option>
                                <option value="Palugaswewa" {{ $farmerorganization->ds_division_name == 'Palugaswewa' ? 'selected' : '' }}>Palugaswewa</option>
                                <option value="Mihintale" {{ $farmerorganization->ds_division_name == 'Mihintale' ? 'selected' : '' }}>Mihintale</option>
                                <option value="Mahavilachchiya" {{ $farmerorganization->ds_division_name == 'Mahavilachchiya' ? 'selected' : '' }}>Mahavilachchiya</option>
                                <option value="Na.Nu.Pa" {{ $farmerorganization->ds_division_name == 'Na.Nu.Pa' ? 'selected' : '' }}>Na.Nu.Pa</option>
                                <option value="Ma.Nu.Pa" {{ $farmerorganization->ds_division_name == 'Ma.Nu.Pa' ? 'selected' : '' }}>Ma.Nu.Pa</option>
                                <option value="Nuwaragam Palatha Central" {{ $farmerorganization->ds_division_name == 'Nuwaragam Palatha Central' ? 'selected' : '' }}>Nuwaragam Palatha Central</option>
                                <option value="Wanathavilluwa" {{ $farmerorganization->ds_division_name == 'Wanathavilluwa' ? 'selected' : '' }}>Wanathavilluwa</option>
                                <option value="Pallama" {{ $farmerorganization->ds_division_name == 'Pallama' ? 'selected' : '' }}>Pallama</option>
                                <option value="Anamaduwa" {{ $farmerorganization->ds_division_name == 'Anamaduwa' ? 'selected' : '' }}>Anamaduwa</option>
                                <option value="Nawagaththegama" {{ $farmerorganization->ds_division_name == 'Nawagaththegama' ? 'selected' : '' }}>Nawagaththegama</option>
                                <option value="Vengalacheddikulam" {{ $farmerorganization->ds_division_name == 'Vengalacheddikulam' ? 'selected' : '' }}>Vengalacheddikulam</option>
                                <option value="Vavuniya" {{ $farmerorganization->ds_division_name == 'Vavuniya' ? 'selected' : '' }}>Vavuniya</option>
                                <option value="Vavuniya South" {{ $farmerorganization->ds_division_name == 'Vavuniya South' ? 'selected' : '' }}>Vavuniya South</option>
                                <option value="Giribawa" {{ $farmerorganization->ds_division_name == 'Giribawa' ? 'selected' : '' }}>Giribawa</option>
                                <option value="Polpithigama" {{ $farmerorganization->ds_division_name == 'Polpithigama' ? 'selected' : '' }}>Polpithigama</option>
                                <option value="Galgamuwa" {{ $farmerorganization->ds_division_name == 'Galgamuwa' ? 'selected' : '' }}>Galgamuwa</option>
                                <option value="Ehetuwewa" {{ $farmerorganization->ds_division_name == 'Ehetuwewa' ? 'selected' : '' }}>Ehetuwewa</option>
                                <option value="Kobeigane" {{ $farmerorganization->ds_division_name == 'Kobeigane' ? 'selected' : '' }}>Kobeigane</option>
                                <option value="Ambanpola" {{ $farmerorganization->ds_division_name == 'Ambanpola' ? 'selected' : '' }}>Ambanpola</option>
                                <option value="Nanattan" {{ $farmerorganization->ds_division_name == 'Nanattan' ? 'selected' : '' }}>Nanattan</option>
                                <option value="Manthai West" {{ $farmerorganization->ds_division_name == 'Manthai West' ? 'selected' : '' }}>Manthai West</option>
                                <option value="Musali" {{ $farmerorganization->ds_division_name == 'Musali' ? 'selected' : '' }}>Musali</option>
                                <option value="Mannar Town" {{ $farmerorganization->ds_division_name == 'Mannar Town' ? 'selected' : '' }}>Mannar Town</option>
                                <option value="Yatawatta" {{ $farmerorganization->ds_division_name == 'Yatawatta' ? 'selected' : '' }}>Yatawatta</option>
                                <option value="Dambulla" {{ $farmerorganization->ds_division_name == 'Dambulla' ? 'selected' : '' }}>Dambulla</option>
                                <option value="Galewela" {{ $farmerorganization->ds_division_name == 'Galewela' ? 'selected' : '' }}>Galewela</option>

                                <!-- Add other DS divisions as needed -->
                            </select>
                            <input type="hidden" id="dsDivisionName" name="ds_division_name" value="{{ $farmerorganization->ds_division_name }}">
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="gn_division" class="form-label dropdown-label">GN Division</label>
                            <select id="gnDivisionDropdown" name="gn_division" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select GN Division</option>
                                <!-- Populate with existing data -->
                                <option value="73 - Kidagalegama" {{ $farmerorganization->gn_division_name == '73 - Kidagalegama' ? 'selected' : '' }}>73 - Kidagalegama</option>
                                <option value="Lindawewa" {{ $farmerorganization->gn_division_name == 'Lindawewa' ? 'selected' : '' }}>Lindawewa</option>
                                <option value="Karambankulama" {{ $farmerorganization->gn_division_name == 'Karambankulama' ? 'selected' : '' }}>Karambankulama</option>
                                <option value="68 Madawachchiya East" {{ $farmerorganization->gn_division_name == '68 Madawachchiya East' ? 'selected' : '' }}>68 Madawachchiya East</option>
                                <option value="78 Sangilikanadarawa" {{ $farmerorganization->gn_division_name == '78 Sangilikanadarawa' ? 'selected' : '' }}>78 Sangilikanadarawa</option>
                                <option value="62 - Puleliya" {{ $farmerorganization->gn_division_name == '62 - Puleliya' ? 'selected' : '' }}>62 - Puleliya</option>
                                <option value="Prabodhagama" {{ $farmerorganization->gn_division_name == 'Prabodhagama' ? 'selected' : '' }}>Prabodhagama</option>
                                <option value="Kidawarankulama" {{ $farmerorganization->gn_division_name == 'Kidawarankulama' ? 'selected' : '' }}>Kidawarankulama</option>
                                <option value="Poonewa" {{ $farmerorganization->gn_division_name == 'Poonewa' ? 'selected' : '' }}>Poonewa</option>
                                <option value="Maha Kumbukgollewa" {{ $farmerorganization->gn_division_name == 'Maha Kumbukgollewa' ? 'selected' : '' }}>Maha Kumbukgollewa</option>
                                <option value="Kadawath Rambewa" {{ $farmerorganization->gn_division_name == 'Kadawath Rambewa' ? 'selected' : '' }}>Kadawath Rambewa</option>
                                <option value="42 kidawarankulama" {{ $farmerorganization->gn_division_name == '42 kidawarankulama' ? 'selected' : '' }}>42 kidawarankulama</option>
                                <option value="43 - Prabodagama" {{ $farmerorganization->gn_division_name == '43 - Prabodagama' ? 'selected' : '' }}>43 - Prabodagama</option>
                                <option value="89, -Kallanachiya" {{ $farmerorganization->gn_division_name == '89, -Kallanachiya' ? 'selected' : '' }}>89, -Kallanachiya</option>
                                <option value="98, -Kapiriggama" {{ $farmerorganization->gn_division_name == '98, -Kapiriggama' ? 'selected' : '' }}>98, -Kapiriggama</option>
                                <option value="81, Pihimbiyagollewa" {{ $farmerorganization->gn_division_name == '81, Pihimbiyagollewa' ? 'selected' : '' }}>81, Pihimbiyagollewa</option>
                                <option value="555, -Labunoruwa" {{ $farmerorganization->gn_division_name == '555, -Labunoruwa' ? 'selected' : '' }}>555, -Labunoruwa</option>
                                <option value="184 - Manankattiya" {{ $farmerorganization->gn_division_name == '184 - Manankattiya' ? 'selected' : '' }}>184 - Manankattiya</option>
                                <option value="603 - Horiwila" {{ $farmerorganization->gn_division_name == '603 - Horiwila' ? 'selected' : '' }}>603 - Horiwila</option>
                                <option value="569 - Katukeliyawa" {{ $farmerorganization->gn_division_name == '569 - Katukeliyawa' ? 'selected' : '' }}>569 - Katukeliyawa</option>
                                <option value="566 - Seeppukulama" {{ $farmerorganization->gn_division_name == '566 - Seeppukulama' ? 'selected' : '' }}>566 - Seeppukulama</option>
                                <option value="369-Sadamaleliya" {{ $farmerorganization->gn_division_name == '369-Sadamaleliya' ? 'selected' : '' }}>369-Sadamaleliya</option>
                                <option value="275, -Kawarakkulama" {{ $farmerorganization->gn_division_name == '275, -Kawarakkulama' ? 'selected' : '' }}>275, -Kawarakkulama</option>
                                <option value="Maha Ehetuwewa" {{ $farmerorganization->gn_division_name == 'Maha Ehetuwewa' ? 'selected' : '' }}>Maha Ehetuwewa</option>
                                <option value="305 - Galpottegama" {{ $farmerorganization->gn_division_name == '305 - Galpottegama' ? 'selected' : '' }}>305 - Galpottegama</option>
                                <option value="Alankulama" {{ $farmerorganization->gn_division_name == 'Alankulama' ? 'selected' : '' }}>Alankulama</option>
                                <option value="Kottukachchiya Colony 1" {{ $farmerorganization->gn_division_name == 'Kottukachchiya Colony 1' ? 'selected' : '' }}>Kottukachchiya Colony 1</option>
                                <option value="Mahameddewa" {{ $farmerorganization->gn_division_name == 'Mahameddewa' ? 'selected' : '' }}>Mahameddewa</option>
                                <option value="Rambakanayagama" {{ $farmerorganization->gn_division_name == 'Rambakanayagama' ? 'selected' : '' }}>Rambakanayagama</option>
                                <option value="Miyellewa" {{ $farmerorganization->gn_division_name == 'Miyellewa' ? 'selected' : '' }}>Miyellewa</option>
                                <option value="Amunuwewa" {{ $farmerorganization->gn_division_name == 'Amunuwewa' ? 'selected' : '' }}>Amunuwewa</option>
                                <option value="Wathupola" {{ $farmerorganization->gn_division_name == 'Wathupola' ? 'selected' : '' }}>Wathupola</option>
                                <option value="Mailankulama" {{ $farmerorganization->gn_division_name == 'Mailankulama' ? 'selected' : '' }}>Mailankulama</option>
                                <option value="Unit-9,10" {{ $farmerorganization->gn_division_name == 'Unit-9,10' ? 'selected' : '' }}>Unit-9,10</option>
                                <option value="Periyapuliyalankulam" {{ $farmerorganization->gn_division_name == 'Periyapuliyalankulam' ? 'selected' : '' }}>Periyapuliyalankulam</option>
                                <option value="Sinnasippikulam" {{ $farmerorganization->gn_division_name == 'Sinnasippikulam' ? 'selected' : '' }}>Sinnasippikulam</option>
                                <option value="kankankulam" {{ $farmerorganization->gn_division_name == 'kankankulam' ? 'selected' : '' }}>kankankulam</option>
                                <option value="Kiristhavakulam" {{ $farmerorganization->gn_division_name == 'Kiristhavakulam' ? 'selected' : '' }}>Kiristhavakulam</option>
                                <option value="Neriyakulam" {{ $farmerorganization->gn_division_name == 'Neriyakulam' ? 'selected' : '' }}>Neriyakulam</option>
                                <option value="Cheddikulam" {{ $farmerorganization->gn_division_name == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Muthaliyarkulam" {{ $farmerorganization->gn_division_name == 'Muthaliyarkulam' ? 'selected' : '' }}>Muthaliyarkulam</option>
                                <option value="Periyakaddu" {{ $farmerorganization->gn_division_name == 'Periyakaddu' ? 'selected' : '' }}>Periyakaddu</option>
                                <option value="Andiyapuliankulam" {{ $farmerorganization->gn_division_name == 'Andiyapuliankulam' ? 'selected' : '' }}>Andiyapuliankulam</option>
                                <option value="Kanthasaminager" {{ $farmerorganization->gn_division_name == 'Kanthasaminager' ? 'selected' : '' }}>Kanthasaminager</option>
                                <option value="Sooduventhapulavu" {{ $farmerorganization->gn_division_name == 'Sooduventhapulavu' ? 'selected' : '' }}>Sooduventhapulavu</option>
                                <option value="Kannadi" {{ $farmerorganization->gn_division_name == 'Kannadi' ? 'selected' : '' }}>Kannadi</option>
                                <option value="Asikulam" {{ $farmerorganization->gn_division_name == 'Asikulam' ? 'selected' : '' }}>Asikulam</option>
                                <option value="Kalukunnammaduwa" {{ $farmerorganization->gn_division_name == 'Kalukunnammaduwa' ? 'selected' : '' }}>Kalukunnammaduwa</option>
                                <option value="Allagalla" {{ $farmerorganization->gn_division_name == 'Allagalla' ? 'selected' : '' }}>Allagalla</option>
                                <option value="Sangappalaya" {{ $farmerorganization->gn_division_name == 'Sangappalaya' ? 'selected' : '' }}>Sangappalaya</option>
                                <option value="Wannikuda Wewa" {{ $farmerorganization->gn_division_name == 'Wannikuda Wewa' ? 'selected' : '' }}>Wannikuda Wewa</option>
                                <option value="Gampola" {{ $farmerorganization->gn_division_name == 'Gampola' ? 'selected' : '' }}>Gampola</option>
                                <option value="Aliyawetunawewa" {{ $farmerorganization->gn_division_name == 'Aliyawetunawewa' ? 'selected' : '' }}>Aliyawetunawewa</option>
                                <option value="Niyandawanaya" {{ $farmerorganization->gn_division_name == 'Niyandawanaya' ? 'selected' : '' }}>Niyandawanaya</option>
                                <option value="Galgiriyawa" {{ $farmerorganization->gn_division_name == 'Galgiriyawa' ? 'selected' : '' }}>Galgiriyawa</option>
                                <option value="Kambuwatawana" {{ $farmerorganization->gn_division_name == 'Kambuwatawana' ? 'selected' : '' }}>Kambuwatawana</option>
                                <option value="Ihala Thimbiriyawa" {{ $farmerorganization->gn_division_name == 'Ihala Thimbiriyawa' ? 'selected' : '' }}>Ihala Thimbiriyawa</option>
                                <option value="Kambuwatawana" {{ $farmerorganization->gn_division_name == 'Kambuwatawana' ? 'selected' : '' }}>Kambuwatawana</option>
                                <option value="Nikawewa" {{ $farmerorganization->gn_division_name == 'Nikawewa' ? 'selected' : '' }}>Nikawewa</option>
                                <option value="Moragollagama" {{ $farmerorganization->gn_division_name == 'Moragollagama' ? 'selected' : '' }}>Moragollagama</option>
                                <option value="Kubukkadawala" {{ $farmerorganization->gn_division_name == 'Kubukkadawala' ? 'selected' : '' }}>Kubukkadawala</option>
                                <option value="Serugasyaya" {{ $farmerorganization->gn_division_name == 'Serugasyaya' ? 'selected' : '' }}>Serugasyaya</option>
                                <option value="Nahettikulama" {{ $farmerorganization->gn_division_name == 'Nahettikulama' ? 'selected' : '' }}>Nahettikulama</option>
                                <option value="Madadombe" {{ $farmerorganization->gn_division_name == 'Madadombe' ? 'selected' : '' }}>Madadombe</option>
                                <option value="Thimbiriyawa" {{ $farmerorganization->gn_division_name == 'Thimbiriyawa' ? 'selected' : '' }}>Thimbiriyawa</option>
                                <option value="Hunugallewa" {{ $farmerorganization->gn_division_name == 'Hunugallewa' ? 'selected' : '' }}>Hunugallewa</option>
                                <option value="Ethinimole" {{ $farmerorganization->gn_division_name == 'Ethinimole' ? 'selected' : '' }}>Ethinimole</option>
                                <option value="Galapitadigana" {{ $farmerorganization->gn_division_name == 'Galapitadigana' ? 'selected' : '' }}>Galapitadigana</option>
                                <option value="Ihala Embogama" {{ $farmerorganization->gn_division_name == 'Ihala Embogama' ? 'selected' : '' }}>Ihala Embogama</option>
                                <option value="Kaduruwewa" {{ $farmerorganization->gn_division_name == 'Kaduruwewa' ? 'selected' : '' }}>Kaduruwewa</option>
                                <option value="Eriyawa" {{ $farmerorganization->gn_division_name == 'Eriyawa' ? 'selected' : '' }}>Eriyawa</option>
                                <option value="Ratnadivulwewa" {{ $farmerorganization->gn_division_name == 'Ratnadivulwewa' ? 'selected' : '' }}>Ratnadivulwewa</option>
                                <option value="Hiddewa" {{ $farmerorganization->gn_division_name == 'Hiddewa' ? 'selected' : '' }}>Hiddewa</option>
                                <option value="Mawathagama" {{ $farmerorganization->gn_division_name == 'Mawathagama' ? 'selected' : '' }}>Mawathagama</option>
                                <option value="Bakmeewewa" {{ $farmerorganization->gn_division_name == 'Bakmeewewa' ? 'selected' : '' }}>Bakmeewewa</option>
                                <option value="Sirukkandal" {{ $farmerorganization->gn_division_name == 'Sirukkandal' ? 'selected' : '' }}>Sirukkandal</option>
                                <option value="Ilahadipiddy" {{ $farmerorganization->gn_division_name == 'Ilahadipiddy' ? 'selected' : '' }}>Ilahadipiddy</option>
                                <option value="Vanchiyankulam" {{ $farmerorganization->gn_division_name == 'Vanchiyankulam' ? 'selected' : '' }}>Vanchiyankulam</option>
                                <option value="Isamalaithalvu" {{ $farmerorganization->gn_division_name == 'Isamalaithalvu' ? 'selected' : '' }}>Isamalaithalvu</option>
                                <option value="Valkkaipettankandal" {{ $farmerorganization->gn_division_name == 'Valkkaipettankandal' ? 'selected' : '' }}>Valkkaipettankandal</option>
                                <option value="Parikarikandal" {{ $farmerorganization->gn_division_name == 'Parikarikandal' ? 'selected' : '' }}>Parikarikandal</option>
                                <option value="Razoolputhuveli" {{ $farmerorganization->gn_division_name == 'Razoolputhuveli' ? 'selected' : '' }}>Razoolputhuveli</option>
                                <option value="Ilanthaimoddai" {{ $farmerorganization->gn_division_name == 'Ilanthaimoddai' ? 'selected' : '' }}>Ilanthaimoddai</option>
                                <option value="Minnukkan" {{ $farmerorganization->gn_division_name == 'Minnukkan' ? 'selected' : '' }}>Minnukkan</option>
                                <option value="Pappamoddai" {{ $farmerorganization->gn_division_name == 'Pappamoddai' ? 'selected' : '' }}>Pappamoddai</option>
                                <option value="Veppankulam" {{ $farmerorganization->gn_division_name == 'Veppankulam' ? 'selected' : '' }}>Veppankulam</option>
                                <option value="S.P Potkerni" {{ $farmerorganization->gn_division_name == 'S.P Potkerni' ? 'selected' : '' }}>S.P Potkerni</option>
                                <option value="Veppankulam" {{ $farmerorganization->gn_division_name == 'Veppankulam' ? 'selected' : '' }}>Veppankulam</option>
                                <option value="Puthuveli" {{ $farmerorganization->gn_division_name == 'Puthuveli' ? 'selected' : '' }}>Puthuveli</option>
                                <option value="Maruthamadu" {{ $farmerorganization->gn_division_name == 'Maruthamadu' ? 'selected' : '' }}>Maruthamadu</option>
                                <option value="Poonochchi" {{ $farmerorganization->gn_division_name == 'Poonochchi' ? 'selected' : '' }}>Poonochchi</option>
                                <option value="P.P Potkerni" {{ $farmerorganization->gn_division_name == 'P.P Potkerni' ? 'selected' : '' }}>P.P Potkerni</option>
                                <option value="Kondachchi" {{ $farmerorganization->gn_division_name == 'Kondachchi' ? 'selected' : '' }}>Kondachchi</option>
                                <option value="Pandaraveli" {{ $farmerorganization->gn_division_name == 'Pandaraveli' ? 'selected' : '' }}>Pandaraveli</option>
                                <option value="Arippu west" {{ $farmerorganization->gn_division_name == 'Arippu west' ? 'selected' : '' }}>Arippu west</option>
                                <option value="Koolankulam" {{ $farmerorganization->gn_division_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Akathimurippu" {{ $farmerorganization->gn_division_name == 'Akathimurippu' ? 'selected' : '' }}>Akathimurippu</option>
                                <option value="Sirukkandal" {{ $farmerorganization->gn_division_name == 'Sirukkandal' ? 'selected' : '' }}>Sirukkandal</option>
                                <option value="Ilahadipiddy" {{ $farmerorganization->gn_division_name == 'Ilahadipiddy' ? 'selected' : '' }}>Ilahadipiddy</option>
                                <option value="Vanchiyankulam" {{ $farmerorganization->gn_division_name == 'Vanchiyankulam' ? 'selected' : '' }}>Vanchiyankulam</option>
                                <option value="Parikarikandal" {{ $farmerorganization->gn_division_name == 'Parikarikandal' ? 'selected' : '' }}>Parikarikandal</option>
                                <option value="Isamalaithalvu" {{ $farmerorganization->gn_division_name == 'Isamalaithalvu' ? 'selected' : '' }}>Isamalaithalvu</option>
                                <option value="Razoolputhuveli" {{ $farmerorganization->gn_division_name == 'Razoolputhuveli' ? 'selected' : '' }}>Razoolputhuveli</option>
                                <option value="Ilanthaimoddai" {{ $farmerorganization->gn_division_name == 'Ilanthaimoddai' ? 'selected' : '' }}>Ilanthaimoddai</option>
                                <option value="Puthukkamam" {{ $farmerorganization->gn_division_name == 'Puthukkamam' ? 'selected' : '' }}>Puthukkamam</option>
                                <option value="Periyanavatkulam" {{ $farmerorganization->gn_division_name == 'Periyanavatkulam' ? 'selected' : '' }}>Periyanavatkulam</option>
                                <option value="Udagama West" {{ $farmerorganization->gn_division_name == 'Udagama West' ? 'selected' : '' }}>Udagama West</option>
                                <option value="Aluthwatta" {{ $farmerorganization->gn_division_name == 'Aluthwatta' ? 'selected' : '' }}>Aluthwatta</option>
                                <option value="Mathalapitiya" {{ $farmerorganization->gn_division_name == 'Mathalapitiya' ? 'selected' : '' }}>Mathalapitiya</option>
                                <option value="Mathalapitiya South" {{ $farmerorganization->gn_division_name == 'Mathalapitiya South' ? 'selected' : '' }}>Mathalapitiya South</option>
                                <option value="Raththinda" {{ $farmerorganization->gn_division_name == 'Raththinda' ? 'selected' : '' }}>Raththinda</option>

                                <!-- Add other GN divisions as needed -->
                            </select>
                            <input type="hidden" id="gnDivisionName" name="gn_division_name" value="{{ $farmerorganization->gn_division_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="as_center" class="form-label dropdown-label">ASC</label>
                            <select id="asCenterDropdown" name="as_center" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select ASC</option>
                                <!-- Populate with existing data -->
                                <option value="Galenbidunuwewa" {{ $farmerorganization->as_center == 'Galenbidunuwewa' ? 'selected' : '' }}>Galenbidunuwewa</option>
                                <option value="Elayapaththuwa" {{ $farmerorganization->as_center == 'Elayapaththuwa' ? 'selected' : '' }}>Elayapaththuwa</option>
                                <option value="Thantimale" {{ $farmerorganization->as_center == 'Thantimale' ? 'selected' : '' }}>Thantimale</option>
                                <option value="Athakada" {{ $farmerorganization->as_center == 'Athakada' ? 'selected' : '' }}>Athakada</option>
                                <option value="Medawachchiya" {{ $farmerorganization->as_center == 'Medawachchiya' ? 'selected' : '' }}>Medawachchiya</option>
                                <option value="Poonewa" {{ $farmerorganization->as_center == 'Poonewa' ? 'selected' : '' }}>Poonewa</option>
                                <option value="Punewa" {{ $farmerorganization->as_center == 'Punewa' ? 'selected' : '' }}>Punewa</option>
                                <option value="Mihinthale" {{ $farmerorganization->as_center == 'Mihinthale' ? 'selected' : '' }}>Mihinthale</option>
                                <option value="Gambirigaswewa" {{ $farmerorganization->as_center == 'Gambirigaswewa' ? 'selected' : '' }}>Gambirigaswewa</option>
                                <option value="Anuradhapura" {{ $farmerorganization->as_center == 'Anuradhapura' ? 'selected' : '' }}>Anuradhapura</option>
                                <option value="Palugaswewa" {{ $farmerorganization->as_center == 'Palugaswewa' ? 'selected' : '' }}>Palugaswewa</option>
                                <option value="Kallanchiya" {{ $farmerorganization->as_center == 'Kallanchiya' ? 'selected' : '' }}>Kallanchiya</option>
                                <option value="Thirappane" {{ $farmerorganization->as_center == 'Thirappane' ? 'selected' : '' }}>Thirappane</option>
                                <option value="Anamaduwa" {{ $farmerorganization->as_center == 'Anamaduwa' ? 'selected' : '' }}>Anamaduwa</option>
                                <option value="Nawagaththegama" {{ $farmerorganization->as_center == 'Nawagaththegama' ? 'selected' : '' }}>Nawagaththegama</option>
                                <option value="Serukele" {{ $farmerorganization->as_center == 'Serukele' ? 'selected' : '' }}>Serukele</option>
                                <option value="Wanathawilluwa" {{ $farmerorganization->as_center == 'Wanathawilluwa' ? 'selected' : '' }}>Wanathawilluwa</option>
                                <option value="Cheddikulam" {{ $farmerorganization->as_center == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Kovilkulam" {{ $farmerorganization->as_center == 'Kovilkulam' ? 'selected' : '' }}>Kovilkulam</option>
                                <option value="Kurukkalputhukulam" {{ $farmerorganization->as_center == 'Kurukkalputhukulam' ? 'selected' : '' }}>Kurukkalputhukulam</option>
                                <option value="Madukanda" {{ $farmerorganization->as_center == 'Madukanda' ? 'selected' : '' }}>Madukanda</option>
                                <option value="Ambanpola" {{ $farmerorganization->as_center == 'Ambanpola' ? 'selected' : '' }}>Ambanpola</option>
                                <option value="Ehatuwewa" {{ $farmerorganization->as_center == 'Ehatuwewa' ? 'selected' : '' }}>Ehatuwewa</option>
                                <option value="Maha Nanneriya" {{ $farmerorganization->as_center == 'Maha Nanneriya' ? 'selected' : '' }}>Maha Nanneriya</option>
                                <option value="Galgamuwa" {{ $farmerorganization->as_center == 'Galgamuwa' ? 'selected' : '' }}>Galgamuwa</option>
                                <option value="Thambuththa" {{ $farmerorganization->as_center == 'Thambuththa' ? 'selected' : '' }}>Thambuththa</option>
                                <option value="Kobeigane" {{ $farmerorganization->as_center == 'Kobeigane' ? 'selected' : '' }}>Kobeigane</option>
                                <option value="Rambe" {{ $farmerorganization->as_center == 'Rambe' ? 'selected' : '' }}>Rambe</option>
                                <option value="Moragollagama" {{ $farmerorganization->as_center == 'Moragollagama' ? 'selected' : '' }}>Moragollagama</option>
                                <option value="Uyilankulam" {{ $farmerorganization->as_center == 'Uyilankulam' ? 'selected' : '' }}>Uyilankulam</option>
                                <option value="Manthai" {{ $farmerorganization->as_center == 'Manthai' ? 'selected' : '' }}>Manthai</option>
                                <option value="potkerni" {{ $farmerorganization->as_center == 'potkerni' ? 'selected' : '' }}>potkerni</option>
                                <option value="Silawathurai" {{ $farmerorganization->as_center == 'Silawathurai' ? 'selected' : '' }}>Silawathurai</option>
                                <option value="P.P.Potkeny" {{ $farmerorganization->as_center == 'P.P.Potkeny' ? 'selected' : '' }}>P.P.Potkeny</option>
                                <option value="Murunkan" {{ $farmerorganization->as_center == 'Murunkan' ? 'selected' : '' }}>Murunkan</option>
                                <option value="Nanattan" {{ $farmerorganization->as_center == 'Nanattan' ? 'selected' : '' }}>Nanattan</option>
                                <option value="Uyilankulam" {{ $farmerorganization->as_center == 'Uyilankulam' ? 'selected' : '' }}>Uyilankulam</option>
                                <option value="Yatawatta" {{ $farmerorganization->as_center == 'Yatawatta' ? 'selected' : '' }}>Yatawatta</option>
                                <option value="Walawela" {{ $farmerorganization->as_center == 'Walawela' ? 'selected' : '' }}>Walawela</option>
                                <!-- Add other ASCs as needed -->
                            </select>
                            <input type="hidden" id="asCenterName" name="as_center" value="{{ $farmerorganization->as_center }}">
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="cascade_name" class="form-label dropdown-label">Cascade Name</label>
                            <select id="cascadeNameDropdown" name="cascade_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Cascade Name</option>
                                <!-- Populate with existing data -->
                                <option value="Cascade 1" {{ $farmerorganization->cascade_name == 'Cascade 1' ? 'selected' : '' }}>Cascade 1</option>
                                <option value="N/A" {{ $farmerorganization->cascade_name == 'N/A' ? 'selected' : '' }}>N/A</option>
                                <option value="Manankattiya" {{ $farmerorganization->cascade_name == 'Manankattiya' ? 'selected' : '' }}>Manankattiya</option>
                                <option value="Kuda Halmillawa Ela" {{ $farmerorganization->cascade_name == 'Kuda Halmillawa Ela' ? 'selected' : '' }}>Kuda Halmillawa Ela</option>
                                <option value="Tambiriyawa" {{ $farmerorganization->cascade_name == 'Tambiriyawa' ? 'selected' : '' }}>Tambiriyawa</option>
                                <option value="Dumminnegama" {{ $farmerorganization->cascade_name == 'Dumminnegama' ? 'selected' : '' }}>Dumminnegama</option>
                                <option value="Kardan Kulam" {{ $farmerorganization->cascade_name == 'Kardan Kulam' ? 'selected' : '' }}>Kardan Kulam</option>
                                <option value="Lidawewa" {{ $farmerorganization->cascade_name == 'Lidawewa' ? 'selected' : '' }}>Lidawewa</option>
                                <option value="Medawachchiya Wewa" {{ $farmerorganization->cascade_name == 'Medawachchiya Wewa' ? 'selected' : '' }}>Medawachchiya Wewa</option>
                                <option value="Sangilikanadarawa" {{ $farmerorganization->cascade_name == 'Sangilikanadarawa' ? 'selected' : '' }}>Sangilikanadarawa</option>
                                <option value="Pulleiliya" {{ $farmerorganization->cascade_name == 'Pulleiliya' ? 'selected' : '' }}>Pulleiliya</option>
                                <option value="Nawak Kulam" {{ $farmerorganization->cascade_name == 'Nawak Kulam' ? 'selected' : '' }}>Nawak Kulam</option>
                                <option value="Kidewaran Kulam" {{ $farmerorganization->cascade_name == 'Kidewaran Kulam' ? 'selected' : '' }}>Kidewaran Kulam</option>
                                <option value="Boo Oya" {{ $farmerorganization->cascade_name == 'Boo Oya' ? 'selected' : '' }}>Boo Oya</option>
                                <option value="Katukeliyawa" {{ $farmerorganization->cascade_name == 'Katukeliyawa' ? 'selected' : '' }}>Katukeliyawa</option>
                                <option value="malvatu m̆baya" {{ $farmerorganization->cascade_name == 'malvatu m̆baya' ? 'selected' : '' }}>malvatu m̆baya</option>
                                <option value="Galpoththegama" {{ $farmerorganization->cascade_name == 'Galpoththegama' ? 'selected' : '' }}>Galpoththegama</option>
                                <option value="Pahala Moragollagama wewa" {{ $farmerorganization->cascade_name == 'Pahala Moragollagama wewa' ? 'selected' : '' }}>Pahala Moragollagama wewa</option>
                                <option value="Kawarakkulama" {{ $farmerorganization->cascade_name == 'Kawarakkulama' ? 'selected' : '' }}>Kawarakkulama</option>
                                <option value="Horuwila Wewa" {{ $farmerorganization->cascade_name == 'Horuwila Wewa' ? 'selected' : '' }}>Horuwila Wewa</option>
                                <option value="Kapiriggama Wewa" {{ $farmerorganization->cascade_name == 'Kapiriggama Wewa' ? 'selected' : '' }}>Kapiriggama Wewa</option>
                                <option value="Pihimbiyagollewa Wewa" {{ $farmerorganization->cascade_name == 'Pihimbiyagollewa Wewa' ? 'selected' : '' }}>Pihimbiyagollewa Wewa</option>
                                <option value="Labunoruwa Wewa" {{ $farmerorganization->cascade_name == 'Labunoruwa Wewa' ? 'selected' : '' }}>Labunoruwa Wewa</option>
                                <option value="Siyambalawatta" {{ $farmerorganization->cascade_name == 'Siyambalawatta' ? 'selected' : '' }}>Siyambalawatta</option>
                                <option value="Individual tank.-12" {{ $farmerorganization->cascade_name == 'Individual tank.-12' ? 'selected' : '' }}>Individual tank.-12</option>
                                <option value="Maha wewa" {{ $farmerorganization->cascade_name == 'Maha wewa' ? 'selected' : '' }}>Maha wewa</option>
                                <option value="E /Alankulama" {{ $farmerorganization->cascade_name == 'E /Alankulama' ? 'selected' : '' }}>E /Alankulama</option>
                                <option value="Merungoda" {{ $farmerorganization->cascade_name == 'Merungoda' ? 'selected' : '' }}>Merungoda</option>
                                <option value="Wagayamaduwa" {{ $farmerorganization->cascade_name == 'Wagayamaduwa' ? 'selected' : '' }}>Wagayamaduwa</option>
                                <option value="Kadawala wewa" {{ $farmerorganization->cascade_name == 'Kadawala wewa' ? 'selected' : '' }}>Kadawala wewa</option>
                                <option value="Achirigama" {{ $farmerorganization->cascade_name == 'Achirigama' ? 'selected' : '' }}>Achirigama</option>
                                <option value="Individual tank.-2" {{ $farmerorganization->cascade_name == 'Individual tank.-2' ? 'selected' : '' }}>Individual tank.-2</option>
                                <option value="Kuruluwewa" {{ $farmerorganization->cascade_name == 'Kuruluwewa' ? 'selected' : '' }}>Kuruluwewa</option>
                                <option value="Kal Aru Sub water shed" {{ $farmerorganization->cascade_name == 'Kal Aru Sub water shed' ? 'selected' : '' }}>Kal Aru Sub water shed</option>
                                <option value="Nedungkaraichenaikulam" {{ $farmerorganization->cascade_name == 'Nedungkaraichenaikulam' ? 'selected' : '' }}>Nedungkaraichenaikulam</option>
                                <option value="Koolankulam" {{ $farmerorganization->cascade_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Sinnasippikulam" {{ $farmerorganization->cascade_name == 'Sinnasippikulam' ? 'selected' : '' }}>Sinnasippikulam</option>
                                <option value="Kankankulam" {{ $farmerorganization->cascade_name == 'Kankankulam' ? 'selected' : '' }}>Kankankulam</option>
                                <option value="Kirishthavakulam" {{ $farmerorganization->cascade_name == 'Kirishthavakulam' ? 'selected' : '' }}>Kirishthavakulam</option>
                                <option value="Musalkuththikulam" {{ $farmerorganization->cascade_name == 'Musalkuththikulam' ? 'selected' : '' }}>Musalkuththikulam</option>
                                <option value="Mullikulam" {{ $farmerorganization->cascade_name == 'Mullikulam' ? 'selected' : '' }}>Mullikulam</option>
                                <option value="Cheddikulam" {{ $farmerorganization->cascade_name == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Udaiyarkulam" {{ $farmerorganization->cascade_name == 'Udaiyarkulam' ? 'selected' : '' }}>Udaiyarkulam</option>
                                <option value="Nochchikulam" {{ $farmerorganization->cascade_name == 'Nochchikulam' ? 'selected' : '' }}>Nochchikulam</option>
                                <option value="Nithikulam" {{ $farmerorganization->cascade_name == 'Nithikulam' ? 'selected' : '' }}>Nithikulam</option>
                                <option value="Ranoruwa" {{ $farmerorganization->cascade_name == 'Ranoruwa' ? 'selected' : '' }}>Ranoruwa</option>
                                <option value="Kattaragama" {{ $farmerorganization->cascade_name == 'Kattaragama' ? 'selected' : '' }}>Kattaragama</option>
                                <option value="Palukadawala Wewa" {{ $farmerorganization->cascade_name == 'Palukadawala Wewa' ? 'selected' : '' }}>Palukadawala Wewa</option>
                                <option value="Atharagalla" {{ $farmerorganization->cascade_name == 'Atharagalla' ? 'selected' : '' }}>Atharagalla</option>
                                <option value="Nahettikulama" {{ $farmerorganization->cascade_name == 'Nahettikulama' ? 'selected' : '' }}>Nahettikulama</option>
                                <option value="Andara wewa" {{ $farmerorganization->cascade_name == 'Andara wewa' ? 'selected' : '' }}>Andara wewa</option>
                                <option value="Gampola Wewa" {{ $farmerorganization->cascade_name == 'Gampola Wewa' ? 'selected' : '' }}>Gampola Wewa</option>
                                <option value="Mawathagama" {{ $farmerorganization->cascade_name == 'Mawathagama' ? 'selected' : '' }}>Mawathagama</option>
                                <option value="Pothuwepitiya (makulla gaha mula)" {{ $farmerorganization->cascade_name == 'Pothuwepitiya (makulla gaha mula)' ? 'selected' : '' }}>Pothuwepitiya (makulla gaha mula)</option>
                                <option value="Mahagale Wewa" {{ $farmerorganization->cascade_name == 'Mahagale Wewa' ? 'selected' : '' }}>Mahagale Wewa</option>
                                <option value="Mamunugama" {{ $farmerorganization->cascade_name == 'Mamunugama' ? 'selected' : '' }}>Mamunugama</option>
                                <option value="Adaikkalamoddai" {{ $farmerorganization->cascade_name == 'Adaikkalamoddai' ? 'selected' : '' }}>Adaikkalamoddai</option>
                                <option value="Sinnaudaippu" {{ $farmerorganization->cascade_name == 'Sinnaudaippu' ? 'selected' : '' }}>Sinnaudaippu</option>
                                <option value="Kandal kulam" {{ $farmerorganization->cascade_name == 'Kandal kulam' ? 'selected' : '' }}>Kandal kulam</option>
                                <option value="Alankulam" {{ $farmerorganization->cascade_name == 'Alankulam' ? 'selected' : '' }}>Alankulam</option>
                                <option value="SP Potkerni" {{ $farmerorganization->cascade_name == 'SP Potkerni' ? 'selected' : '' }}>SP Potkerni</option>
                                <option value="Ithikulam" {{ $farmerorganization->cascade_name == 'Ithikulam' ? 'selected' : '' }}>Ithikulam</option>
                                <option value="Sadayappan" {{ $farmerorganization->cascade_name == 'Sadayappan' ? 'selected' : '' }}>Sadayappan</option>
                                <option value="Paliyadikulam" {{ $farmerorganization->cascade_name == 'Paliyadikulam' ? 'selected' : '' }}>Paliyadikulam</option>
                                <option value="Thandikulam" {{ $farmerorganization->cascade_name == 'Thandikulam' ? 'selected' : '' }}>Thandikulam</option>
                                <option value="Koolankulam" {{ $farmerorganization->cascade_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Alankam" {{ $farmerorganization->cascade_name == 'Alankam' ? 'selected' : '' }}>Alankam</option>
                                <option value="Sonaka nedunkulam" {{ $farmerorganization->cascade_name == 'Sonaka nedunkulam' ? 'selected' : '' }}>Sonaka nedunkulam</option>
                                <option value="14th Mile" {{ $farmerorganization->cascade_name == '14th Mile' ? 'selected' : '' }}>14th Mile</option>
                                <option value="11th Mile" {{ $farmerorganization->cascade_name == '11th Mile' ? 'selected' : '' }}>11th Mile</option>
                                <option value="12th Mile" {{ $farmerorganization->cascade_name == '12th Mile' ? 'selected' : '' }}>12th Mile</option>
                                <option value="13th Mile" {{ $farmerorganization->cascade_name == '13th Mile' ? 'selected' : '' }}>13th Mile</option>
                                <option value="Issaimalaithalvu" {{ $farmerorganization->cascade_name == 'Issaimalaithalvu' ? 'selected' : '' }}>Issaimalaithalvu</option>
                                <option value="Kovilkulam" {{ $farmerorganization->cascade_name == 'Kovilkulam' ? 'selected' : '' }}>Kovilkulam</option>
                                <option value="Individual tank" {{ $farmerorganization->cascade_name == 'Individual tank' ? 'selected' : '' }}>Individual tank</option>

                                <!-- Add other cascade names as needed -->
                            </select>
                            <input type="hidden" id="cascadeName" name="cascade_name" value="{{ $farmerorganization->cascade_name }}">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="tank" class="form-label dropdown-label">Select Tank Name</label>
                        <select class="form-control btn btn-success" id="tankDropdown" name="tank_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                            <option value="">Select Tank</option>
                        </select>
                    </div>
                </div>

                <!-- Repeat the same structure for other fields -->

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="registration_number">Registration Number</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $farmerorganization->registration_number }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="organization_name">Organization Name</label>
                            <input type="text" class="form-control" id="organization_name" name="organization_name" value="{{ $farmerorganization->organization_name }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $farmerorganization->address }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="registration_institute">Registration Institute</label>
                            <input type="text" class="form-control" id="registration_institute" name="registration_institute" value="{{ $farmerorganization->registration_institute }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="edate">Establish Date</label>
                            <input type="date" class="form-control" id="edate" name="edate" value="{{ $farmerorganization->edate }}" required>
                        </div>
                    </div>

                </div>


                <div class="text-center">
                <button type="submit" class="btn submitbtton">Update Farmer Organization</button>
                </div>
            </form>
        </div>

    </div>

</div>

<script>
    $(document).ready(function () {
        var selectedTank = "{{ $farmerorganization->tank_name }}";

        // Fetch tank names from the API endpoint
        $.get('/tanks', function (data) {
            // Populate the dropdown menu with tank names
            $.each(data, function (index, tank) {
                var option = $('<option>', {
                    value: tank.tank_name,
                    text: tank.tank_name
                });

                // Check if the current tank is the selected one
                if (tank.tank_name === selectedTank) {
                    option.prop('selected', true);
                }

                $('#tankDropdown').append(option);
            });
        });
    });
</script>

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
