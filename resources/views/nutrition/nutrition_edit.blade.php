<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Nutrition Program</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include jQuery UI for Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

</head>
<body>

<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('nutrition.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    
        <div class="container mt-5 border rounded custom-border p-4">
            <h2 style="color: green; font-weight: bold; text-align: center;">Edit Nutrition Program</h2>

            <!-- Edit Nutrition Form -->
            <form action="{{ route('nutrition.update', $nutrition->id) }}" method="POST">
                @csrf
                @method('PUT')

            <div class="row">
                <!-- Province -->
                <div class="col">
                        <div class="dropdown">
                    <label for="province_name" class="form-label dropdown-label">Province</label>
                    <select id="province" name="province_name" class="btn btn-success dropdown-toggle"  onchange="populateDistricts()" required>
                                <option value="">Select Province</option>
                                <!-- Populate with existing data -->
                                <option value="North Central" {{ $nutrition->province_name == 'North Central' ? 'selected' : '' }}>North Central</option>
                                <option value="Northern" {{ $nutrition->province_name == 'Northern' ? 'selected' : '' }}>Northern</option>
                                <option value="Central" {{ $nutrition->province_name == 'Central' ? 'selected' : '' }}>Central</option>
                                <option value="North Western" {{ $nutrition->province_name == 'North Western' ? 'selected' : '' }}>North Western</option>
                                <!-- Add other provinces as needed -->
                            </select>
                    <input type="hidden" class="form-control" id="province_name" name="province_name" value="{{ $nutrition->province_name }}" required>
                </div>
                </div>

                <!-- District -->
                <div class="col">
                        <div class="dropdown">
                            <label for="district_name" class="form-label dropdown-label">District</label>
                            <select id="districtDropdown" name="district_name" class="btn btn-success dropdown-toggle" onchange="populateDSDs()" required>
                                <option value="" disabled hidden>Select District</option>
                                <!-- Populate with existing data -->
                                <option value="Vavuniya" {{ $nutrition->district_name == 'Vavuniya' ? 'selected' : '' }}>Vavuniya</option>
                                <option value="Mannar" {{ $nutrition->district_name == 'Mannar' ? 'selected' : '' }}>Mannar</option>
                                <option value="Mathale" {{ $nutrition->district_name == 'Mathale' ? 'selected' : '' }}>Mathale</option>
                                <option value="Kurunagala" {{ $nutrition->district_name == 'Kurunagala' ? 'selected' : '' }}>Kurunagala</option>
                                <option value="Puttalam" {{ $nutrition->district_name == 'Puttalam' ? 'selected' : '' }}>Puttalam</option>
                                <!-- Add other districts as needed -->
                            </select>
                            <input type="hidden" class="form-control" id="district_name" name="district_name" value="{{ $nutrition->district_name }}" required>
                        </div>
                </div>

            </div>

                <!-- DS Division -->
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="ds_division_name" class="form-label dropdown-label">DS Division</label>

                        <select id="dsDivisionDropdown" name="ds_division_name" class="btn btn-success dropdown-toggle" onchange="populateGNDASC()" required>
                                <option value="">Select DS Division</option>
                                <!-- Populate with existing data -->
                                <option value="Medawachchiya" {{ $nutrition->ds_division_name == 'Medawachchiya' ? 'selected' : '' }}>Medawachchiya</option>
                                <option value="Rambewa" {{ $nutrition->ds_division_name == 'Rambewa' ? 'selected' : '' }}>Rambewa</option>
                                <option value="Thirappane" {{ $nutrition->ds_division_name == 'Thirappane' ? 'selected' : '' }}>Thirappane</option>
                                <option value="Galenbidunuwewa" {{ $nutrition->ds_division_name == 'Galenbidunuwewa' ? 'selected' : '' }}>Galenbidunuwewa</option>
                                <option value="Palugaswewa" {{ $nutrition->ds_division_name == 'Palugaswewa' ? 'selected' : '' }}>Palugaswewa</option>
                                <option value="Mihintale" {{ $nutrition->ds_division_name == 'Mihintale' ? 'selected' : '' }}>Mihintale</option>
                                <option value="Mahavilachchiya" {{ $nutrition->ds_division_name == 'Mahavilachchiya' ? 'selected' : '' }}>Mahavilachchiya</option>
                                <option value="Na.Nu.Pa" {{ $nutrition->ds_division_name == 'Na.Nu.Pa' ? 'selected' : '' }}>Na.Nu.Pa</option>
                                <option value="Ma.Nu.Pa" {{ $nutrition->ds_division_name == 'Ma.Nu.Pa' ? 'selected' : '' }}>Ma.Nu.Pa</option>
                                <option value="Nuwaragam Palatha Central" {{ $nutrition->ds_division_name == 'Nuwaragam Palatha Central' ? 'selected' : '' }}>Nuwaragam Palatha Central</option>
                                <option value="Wanathavilluwa" {{ $nutrition->ds_division_name == 'Wanathavilluwa' ? 'selected' : '' }}>Wanathavilluwa</option>
                                <option value="Pallama" {{ $nutrition->ds_division_name == 'Pallama' ? 'selected' : '' }}>Pallama</option>
                                <option value="Anamaduwa" {{ $nutrition->ds_division_name == 'Anamaduwa' ? 'selected' : '' }}>Anamaduwa</option>
                                <option value="Nawagaththegama" {{ $nutrition->ds_division_name == 'Nawagaththegama' ? 'selected' : '' }}>Nawagaththegama</option>
                                <option value="Vengalacheddikulam" {{ $nutrition->ds_division_name == 'Vengalacheddikulam' ? 'selected' : '' }}>Vengalacheddikulam</option>
                                <option value="Vavuniya" {{ $nutrition->ds_division_name == 'Vavuniya' ? 'selected' : '' }}>Vavuniya</option>
                                <option value="Vavuniya South" {{ $nutrition->ds_division_name == 'Vavuniya South' ? 'selected' : '' }}>Vavuniya South</option>
                                <option value="Giribawa" {{ $nutrition->ds_division_name == 'Giribawa' ? 'selected' : '' }}>Giribawa</option>
                                <option value="Polpithigama" {{ $nutrition->ds_division_name == 'Polpithigama' ? 'selected' : '' }}>Polpithigama</option>
                                <option value="Galgamuwa" {{ $nutrition->ds_division_name == 'Galgamuwa' ? 'selected' : '' }}>Galgamuwa</option>
                                <option value="Ehetuwewa" {{ $nutrition->ds_division_name == 'Ehetuwewa' ? 'selected' : '' }}>Ehetuwewa</option>
                                <option value="Kobeigane" {{ $nutrition->ds_division_name == 'Kobeigane' ? 'selected' : '' }}>Kobeigane</option>
                                <option value="Ambanpola" {{ $nutrition->ds_division_name == 'Ambanpola' ? 'selected' : '' }}>Ambanpola</option>
                                <option value="Nanattan" {{ $nutrition->ds_division_name == 'Nanattan' ? 'selected' : '' }}>Nanattan</option>
                                <option value="Manthai West" {{ $nutrition->ds_division_name == 'Manthai West' ? 'selected' : '' }}>Manthai West</option>
                                <option value="Musali" {{ $nutrition->ds_division_name == 'Musali' ? 'selected' : '' }}>Musali</option>
                                <option value="Mannar Town" {{ $nutrition->ds_division_name == 'Mannar Town' ? 'selected' : '' }}>Mannar Town</option>
                                <option value="Yatawatta" {{ $nutrition->ds_division_name == 'Yatawatta' ? 'selected' : '' }}>Yatawatta</option>
                                <option value="Dambulla" {{ $nutrition->ds_division_name == 'Dambulla' ? 'selected' : '' }}>Dambulla</option>
                                <option value="Galewela" {{ $nutrition->ds_division_name == 'Galewela' ? 'selected' : '' }}>Galewela</option>

                                <!-- Add other DS divisions as needed -->
                            </select>

                        <input type="hidden" class="form-control" id="dsDivisionName" name="ds_division_name" value="{{ $nutrition->ds_division_name }}" required>
                    </div>
                </div>

                <!-- GN Division -->
                <div class="col">
                    <div class="dropdown">
                        <label for="gn_division_name" class="form-label dropdown-label">GN Division</label>

                        <select id="gnDivisionDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select GN Division</option>
                                <!-- Populate with existing data -->
                                <option value="73 - Kidagalegama" {{ $nutrition->gn_division_name == '73 - Kidagalegama' ? 'selected' : '' }}>73 - Kidagalegama</option>
                                <option value="Lindawewa" {{ $nutrition->gn_division_name == 'Lindawewa' ? 'selected' : '' }}>Lindawewa</option>
                                <option value="Karambankulama" {{ $nutrition->gn_division_name == 'Karambankulama' ? 'selected' : '' }}>Karambankulama</option>
                                <option value="68 Madawachchiya East" {{ $nutrition->gn_division_name == '68 Madawachchiya East' ? 'selected' : '' }}>68 Madawachchiya East</option>
                                <option value="78 Sangilikanadarawa" {{ $nutrition->gn_division_name == '78 Sangilikanadarawa' ? 'selected' : '' }}>78 Sangilikanadarawa</option>
                                <option value="62 - Puleliya" {{ $nutrition->gn_division_name == '62 - Puleliya' ? 'selected' : '' }}>62 - Puleliya</option>
                                <option value="Prabodhagama" {{ $nutrition->gn_division_name == 'Prabodhagama' ? 'selected' : '' }}>Prabodhagama</option>
                                <option value="Kidawarankulama" {{ $nutrition->gn_division_name == 'Kidawarankulama' ? 'selected' : '' }}>Kidawarankulama</option>
                                <option value="Poonewa" {{ $nutrition->gn_division_name == 'Poonewa' ? 'selected' : '' }}>Poonewa</option>
                                <option value="Maha Kumbukgollewa" {{ $nutrition->gn_division_name == 'Maha Kumbukgollewa' ? 'selected' : '' }}>Maha Kumbukgollewa</option>
                                <option value="Kadawath Rambewa" {{ $nutrition->gn_division_name == 'Kadawath Rambewa' ? 'selected' : '' }}>Kadawath Rambewa</option>
                                <option value="42 kidawarankulama" {{ $nutrition->gn_division_name == '42 kidawarankulama' ? 'selected' : '' }}>42 kidawarankulama</option>
                                <option value="43 - Prabodagama" {{ $nutrition->gn_division_name == '43 - Prabodagama' ? 'selected' : '' }}>43 - Prabodagama</option>
                                <option value="89, -Kallanachiya" {{ $nutrition->gn_division_name == '89, -Kallanachiya' ? 'selected' : '' }}>89, -Kallanachiya</option>
                                <option value="98, -Kapiriggama" {{ $nutrition->gn_division_name == '98, -Kapiriggama' ? 'selected' : '' }}>98, -Kapiriggama</option>
                                <option value="81, Pihimbiyagollewa" {{ $nutrition->gn_division_name == '81, Pihimbiyagollewa' ? 'selected' : '' }}>81, Pihimbiyagollewa</option>
                                <option value="555, -Labunoruwa" {{ $nutrition->gn_division_name == '555, -Labunoruwa' ? 'selected' : '' }}>555, -Labunoruwa</option>
                                <option value="184 - Manankattiya" {{ $nutrition->gn_division_name == '184 - Manankattiya' ? 'selected' : '' }}>184 - Manankattiya</option>
                                <option value="603 - Horiwila" {{ $nutrition->gn_division_name == '603 - Horiwila' ? 'selected' : '' }}>603 - Horiwila</option>
                                <option value="569 - Katukeliyawa" {{ $nutrition->gn_division_name == '569 - Katukeliyawa' ? 'selected' : '' }}>569 - Katukeliyawa</option>
                                <option value="566 - Seeppukulama" {{ $nutrition->gn_division_name == '566 - Seeppukulama' ? 'selected' : '' }}>566 - Seeppukulama</option>
                                <option value="369-Sadamaleliya" {{ $nutrition->gn_division_name == '369-Sadamaleliya' ? 'selected' : '' }}>369-Sadamaleliya</option>
                                <option value="275, -Kawarakkulama" {{ $nutrition->gn_division_name == '275, -Kawarakkulama' ? 'selected' : '' }}>275, -Kawarakkulama</option>
                                <option value="Maha Ehetuwewa" {{ $nutrition->gn_division_name == 'Maha Ehetuwewa' ? 'selected' : '' }}>Maha Ehetuwewa</option>
                                <option value="305 - Galpottegama" {{ $nutrition->gn_division_name == '305 - Galpottegama' ? 'selected' : '' }}>305 - Galpottegama</option>
                                <option value="Alankulama" {{ $nutrition->gn_division_name == 'Alankulama' ? 'selected' : '' }}>Alankulama</option>
                                <option value="Kottukachchiya Colony 1" {{ $nutrition->gn_division_name == 'Kottukachchiya Colony 1' ? 'selected' : '' }}>Kottukachchiya Colony 1</option>
                                <option value="Mahameddewa" {{ $nutrition->gn_division_name == 'Mahameddewa' ? 'selected' : '' }}>Mahameddewa</option>
                                <option value="Rambakanayagama" {{ $nutrition->gn_division_name == 'Rambakanayagama' ? 'selected' : '' }}>Rambakanayagama</option>
                                <option value="Miyellewa" {{ $nutrition->gn_division_name == 'Miyellewa' ? 'selected' : '' }}>Miyellewa</option>
                                <option value="Amunuwewa" {{ $nutrition->gn_division_name == 'Amunuwewa' ? 'selected' : '' }}>Amunuwewa</option>
                                <option value="Wathupola" {{ $nutrition->gn_division_name == 'Wathupola' ? 'selected' : '' }}>Wathupola</option>
                                <option value="Mailankulama" {{ $nutrition->gn_division_name == 'Mailankulama' ? 'selected' : '' }}>Mailankulama</option>
                                <option value="Unit-9,10" {{ $nutrition->gn_division_name == 'Unit-9,10' ? 'selected' : '' }}>Unit-9,10</option>
                                <option value="Periyapuliyalankulam" {{ $nutrition->gn_division_name == 'Periyapuliyalankulam' ? 'selected' : '' }}>Periyapuliyalankulam</option>
                                <option value="Sinnasippikulam" {{ $nutrition->gn_division_name == 'Sinnasippikulam' ? 'selected' : '' }}>Sinnasippikulam</option>
                                <option value="kankankulam" {{ $nutrition->gn_division_name == 'kankankulam' ? 'selected' : '' }}>kankankulam</option>
                                <option value="Kiristhavakulam" {{ $nutrition->gn_division_name == 'Kiristhavakulam' ? 'selected' : '' }}>Kiristhavakulam</option>
                                <option value="Neriyakulam" {{ $nutrition->gn_division_name == 'Neriyakulam' ? 'selected' : '' }}>Neriyakulam</option>
                                <option value="Cheddikulam" {{ $nutrition->gn_division_name == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Muthaliyarkulam" {{ $nutrition->gn_division_name == 'Muthaliyarkulam' ? 'selected' : '' }}>Muthaliyarkulam</option>
                                <option value="Periyakaddu" {{ $nutrition->gn_division_name == 'Periyakaddu' ? 'selected' : '' }}>Periyakaddu</option>
                                <option value="Andiyapuliankulam" {{ $nutrition->gn_division_name == 'Andiyapuliankulam' ? 'selected' : '' }}>Andiyapuliankulam</option>
                                <option value="Kanthasaminager" {{ $nutrition->gn_division_name == 'Kanthasaminager' ? 'selected' : '' }}>Kanthasaminager</option>
                                <option value="Sooduventhapulavu" {{ $nutrition->gn_division_name == 'Sooduventhapulavu' ? 'selected' : '' }}>Sooduventhapulavu</option>
                                <option value="Kannadi" {{ $nutrition->gn_division_name == 'Kannadi' ? 'selected' : '' }}>Kannadi</option>
                                <option value="Asikulam" {{ $nutrition->gn_division_name == 'Asikulam' ? 'selected' : '' }}>Asikulam</option>
                                <option value="Kalukunnammaduwa" {{ $nutrition->gn_division_name == 'Kalukunnammaduwa' ? 'selected' : '' }}>Kalukunnammaduwa</option>
                                <option value="Allagalla" {{ $nutrition->gn_division_name == 'Allagalla' ? 'selected' : '' }}>Allagalla</option>
                                <option value="Sangappalaya" {{ $nutrition->gn_division_name == 'Sangappalaya' ? 'selected' : '' }}>Sangappalaya</option>
                                <option value="Wannikuda Wewa" {{ $nutrition->gn_division_name == 'Wannikuda Wewa' ? 'selected' : '' }}>Wannikuda Wewa</option>
                                <option value="Gampola" {{ $nutrition->gn_division_name == 'Gampola' ? 'selected' : '' }}>Gampola</option>
                                <option value="Aliyawetunawewa" {{ $nutrition->gn_division_name == 'Aliyawetunawewa' ? 'selected' : '' }}>Aliyawetunawewa</option>
                                <option value="Niyandawanaya" {{ $nutrition->gn_division_name == 'Niyandawanaya' ? 'selected' : '' }}>Niyandawanaya</option>
                                <option value="Galgiriyawa" {{ $nutrition->gn_division_name == 'Galgiriyawa' ? 'selected' : '' }}>Galgiriyawa</option>
                                <option value="Kambuwatawana" {{ $nutrition->gn_division_name == 'Kambuwatawana' ? 'selected' : '' }}>Kambuwatawana</option>
                                <option value="Ihala Thimbiriyawa" {{ $nutrition->gn_division_name == 'Ihala Thimbiriyawa' ? 'selected' : '' }}>Ihala Thimbiriyawa</option>
                                <option value="Kambuwatawana" {{ $nutrition->gn_division_name == 'Kambuwatawana' ? 'selected' : '' }}>Kambuwatawana</option>
                                <option value="Nikawewa" {{ $nutrition->gn_division_name == 'Nikawewa' ? 'selected' : '' }}>Nikawewa</option>
                                <option value="Moragollagama" {{ $nutrition->gn_division_name == 'Moragollagama' ? 'selected' : '' }}>Moragollagama</option>
                                <option value="Kubukkadawala" {{ $nutrition->gn_division_name == 'Kubukkadawala' ? 'selected' : '' }}>Kubukkadawala</option>
                                <option value="Serugasyaya" {{ $nutrition->gn_division_name == 'Serugasyaya' ? 'selected' : '' }}>Serugasyaya</option>
                                <option value="Nahettikulama" {{ $nutrition->gn_division_name == 'Nahettikulama' ? 'selected' : '' }}>Nahettikulama</option>
                                <option value="Madadombe" {{ $nutrition->gn_division_name == 'Madadombe' ? 'selected' : '' }}>Madadombe</option>
                                <option value="Thimbiriyawa" {{ $nutrition->gn_division_name == 'Thimbiriyawa' ? 'selected' : '' }}>Thimbiriyawa</option>
                                <option value="Hunugallewa" {{ $nutrition->gn_division_name == 'Hunugallewa' ? 'selected' : '' }}>Hunugallewa</option>
                                <option value="Ethinimole" {{ $nutrition->gn_division_name == 'Ethinimole' ? 'selected' : '' }}>Ethinimole</option>
                                <option value="Galapitadigana" {{ $nutrition->gn_division_name == 'Galapitadigana' ? 'selected' : '' }}>Galapitadigana</option>
                                <option value="Ihala Embogama" {{ $nutrition->gn_division_name == 'Ihala Embogama' ? 'selected' : '' }}>Ihala Embogama</option>
                                <option value="Kaduruwewa" {{ $nutrition->gn_division_name == 'Kaduruwewa' ? 'selected' : '' }}>Kaduruwewa</option>
                                <option value="Eriyawa" {{ $nutrition->gn_division_name == 'Eriyawa' ? 'selected' : '' }}>Eriyawa</option>
                                <option value="Ratnadivulwewa" {{ $nutrition->gn_division_name == 'Ratnadivulwewa' ? 'selected' : '' }}>Ratnadivulwewa</option>
                                <option value="Hiddewa" {{ $nutrition->gn_division_name == 'Hiddewa' ? 'selected' : '' }}>Hiddewa</option>
                                <option value="Mawathagama" {{ $nutrition->gn_division_name == 'Mawathagama' ? 'selected' : '' }}>Mawathagama</option>
                                <option value="Bakmeewewa" {{ $nutrition->gn_division_name == 'Bakmeewewa' ? 'selected' : '' }}>Bakmeewewa</option>
                                <option value="Sirukkandal" {{ $nutrition->gn_division_name == 'Sirukkandal' ? 'selected' : '' }}>Sirukkandal</option>
                                <option value="Ilahadipiddy" {{ $nutrition->gn_division_name == 'Ilahadipiddy' ? 'selected' : '' }}>Ilahadipiddy</option>
                                <option value="Vanchiyankulam" {{ $nutrition->gn_division_name == 'Vanchiyankulam' ? 'selected' : '' }}>Vanchiyankulam</option>
                                <option value="Isamalaithalvu" {{ $nutrition->gn_division_name == 'Isamalaithalvu' ? 'selected' : '' }}>Isamalaithalvu</option>
                                <option value="Valkkaipettankandal" {{ $nutrition->gn_division_name == 'Valkkaipettankandal' ? 'selected' : '' }}>Valkkaipettankandal</option>
                                <option value="Parikarikandal" {{ $nutrition->gn_division_name == 'Parikarikandal' ? 'selected' : '' }}>Parikarikandal</option>
                                <option value="Razoolputhuveli" {{ $nutrition->gn_division_name == 'Razoolputhuveli' ? 'selected' : '' }}>Razoolputhuveli</option>
                                <option value="Ilanthaimoddai" {{ $nutrition->gn_division_name == 'Ilanthaimoddai' ? 'selected' : '' }}>Ilanthaimoddai</option>
                                <option value="Minnukkan" {{ $nutrition->gn_division_name == 'Minnukkan' ? 'selected' : '' }}>Minnukkan</option>
                                <option value="Pappamoddai" {{ $nutrition->gn_division_name == 'Pappamoddai' ? 'selected' : '' }}>Pappamoddai</option>
                                <option value="Veppankulam" {{ $nutrition->gn_division_name == 'Veppankulam' ? 'selected' : '' }}>Veppankulam</option>
                                <option value="S.P Potkerni" {{ $nutrition->gn_division_name == 'S.P Potkerni' ? 'selected' : '' }}>S.P Potkerni</option>
                                <option value="Veppankulam" {{ $nutrition->gn_division_name == 'Veppankulam' ? 'selected' : '' }}>Veppankulam</option>
                                <option value="Puthuveli" {{ $nutrition->gn_division_name == 'Puthuveli' ? 'selected' : '' }}>Puthuveli</option>
                                <option value="Maruthamadu" {{ $nutrition->gn_division_name == 'Maruthamadu' ? 'selected' : '' }}>Maruthamadu</option>
                                <option value="Poonochchi" {{ $nutrition->gn_division_name == 'Poonochchi' ? 'selected' : '' }}>Poonochchi</option>
                                <option value="P.P Potkerni" {{ $nutrition->gn_division_name == 'P.P Potkerni' ? 'selected' : '' }}>P.P Potkerni</option>
                                <option value="Kondachchi" {{ $nutrition->gn_division_name == 'Kondachchi' ? 'selected' : '' }}>Kondachchi</option>
                                <option value="Pandaraveli" {{ $nutrition->gn_division_name == 'Pandaraveli' ? 'selected' : '' }}>Pandaraveli</option>
                                <option value="Arippu west" {{ $nutrition->gn_division_name == 'Arippu west' ? 'selected' : '' }}>Arippu west</option>
                                <option value="Koolankulam" {{ $nutrition->gn_division_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Akathimurippu" {{ $nutrition->gn_division_name == 'Akathimurippu' ? 'selected' : '' }}>Akathimurippu</option>
                                <option value="Sirukkandal" {{ $nutrition->gn_division_name == 'Sirukkandal' ? 'selected' : '' }}>Sirukkandal</option>
                                <option value="Ilahadipiddy" {{ $nutrition->gn_division_name == 'Ilahadipiddy' ? 'selected' : '' }}>Ilahadipiddy</option>
                                <option value="Vanchiyankulam" {{ $nutrition->gn_division_name == 'Vanchiyankulam' ? 'selected' : '' }}>Vanchiyankulam</option>
                                <option value="Parikarikandal" {{ $nutrition->gn_division_name == 'Parikarikandal' ? 'selected' : '' }}>Parikarikandal</option>
                                <option value="Isamalaithalvu" {{ $nutrition->gn_division_name == 'Isamalaithalvu' ? 'selected' : '' }}>Isamalaithalvu</option>
                                <option value="Razoolputhuveli" {{ $nutrition->gn_division_name == 'Razoolputhuveli' ? 'selected' : '' }}>Razoolputhuveli</option>
                                <option value="Ilanthaimoddai" {{ $nutrition->gn_division_name == 'Ilanthaimoddai' ? 'selected' : '' }}>Ilanthaimoddai</option>
                                <option value="Puthukkamam" {{ $nutrition->gn_division_name == 'Puthukkamam' ? 'selected' : '' }}>Puthukkamam</option>
                                <option value="Periyanavatkulam" {{ $nutrition->gn_division_name == 'Periyanavatkulam' ? 'selected' : '' }}>Periyanavatkulam</option>
                                <option value="Udagama West" {{ $nutrition->gn_division_name == 'Udagama West' ? 'selected' : '' }}>Udagama West</option>
                                <option value="Aluthwatta" {{ $nutrition->gn_division_name == 'Aluthwatta' ? 'selected' : '' }}>Aluthwatta</option>
                                <option value="Mathalapitiya" {{ $nutrition->gn_division_name == 'Mathalapitiya' ? 'selected' : '' }}>Mathalapitiya</option>
                                <option value="Mathalapitiya South" {{ $nutrition->gn_division_name == 'Mathalapitiya South' ? 'selected' : '' }}>Mathalapitiya South</option>
                                <option value="Raththinda" {{ $nutrition->gn_division_name == 'Raththinda' ? 'selected' : '' }}>Raththinda</option>

                                <!-- Add other GN divisions as needed -->
                            </select>

                        <input type="hidden" class="form-control" id="gnDivisionDropdown" name="gn_division_name" value="{{ $nutrition->gn_division_name }}" required>
                    </div>
                </div>
            </div>

                <!-- ASC -->
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="asc_name" class="form-label dropdown-label">ASC</label>
                        <select id="asCenterDropdown" name="asc_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select ASC</option>
                                <!-- Populate with existing data -->
                                <option value="Galenbidunuwewa" {{ $nutrition->asc_name == 'Galenbidunuwewa' ? 'selected' : '' }}>Galenbidunuwewa</option>
                                <option value="Elayapaththuwa" {{ $nutrition->asc_name == 'Elayapaththuwa' ? 'selected' : '' }}>Elayapaththuwa</option>
                                <option value="Thantimale" {{ $nutrition->asc_name == 'Thantimale' ? 'selected' : '' }}>Thantimale</option>
                                <option value="Athakada" {{ $nutrition->asc_name == 'Athakada' ? 'selected' : '' }}>Athakada</option>
                                <option value="Medawachchiya" {{ $nutrition->asc_name == 'Medawachchiya' ? 'selected' : '' }}>Medawachchiya</option>
                                <option value="Poonewa" {{ $nutrition->asc_name == 'Poonewa' ? 'selected' : '' }}>Poonewa</option>
                                <option value="Punewa" {{ $nutrition->asc_name == 'Punewa' ? 'selected' : '' }}>Punewa</option>
                                <option value="Mihinthale" {{ $nutrition->asc_name == 'Mihinthale' ? 'selected' : '' }}>Mihinthale</option>
                                <option value="Gambirigaswewa" {{ $nutrition->asc_name == 'Gambirigaswewa' ? 'selected' : '' }}>Gambirigaswewa</option>
                                <option value="Anuradhapura" {{ $nutrition->asc_name == 'Anuradhapura' ? 'selected' : '' }}>Anuradhapura</option>
                                <option value="Palugaswewa" {{ $nutrition->asc_name == 'Palugaswewa' ? 'selected' : '' }}>Palugaswewa</option>
                                <option value="Kallanchiya" {{ $nutrition->asc_name == 'Kallanchiya' ? 'selected' : '' }}>Kallanchiya</option>
                                <option value="Thirappane" {{ $nutrition->asc_name == 'Thirappane' ? 'selected' : '' }}>Thirappane</option>
                                <option value="Anamaduwa" {{ $nutrition->asc_name == 'Anamaduwa' ? 'selected' : '' }}>Anamaduwa</option>
                                <option value="Nawagaththegama" {{ $nutrition->asc_name == 'Nawagaththegama' ? 'selected' : '' }}>Nawagaththegama</option>
                                <option value="Serukele" {{ $nutrition->asc_name == 'Serukele' ? 'selected' : '' }}>Serukele</option>
                                <option value="Wanathawilluwa" {{ $nutrition->asc_name == 'Wanathawilluwa' ? 'selected' : '' }}>Wanathawilluwa</option>
                                <option value="Cheddikulam" {{ $nutrition->asc_name == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Kovilkulam" {{ $nutrition->asc_name == 'Kovilkulam' ? 'selected' : '' }}>Kovilkulam</option>
                                <option value="Kurukkalputhukulam" {{ $nutrition->asc_name == 'Kurukkalputhukulam' ? 'selected' : '' }}>Kurukkalputhukulam</option>
                                <option value="Madukanda" {{ $nutrition->asc_name == 'Madukanda' ? 'selected' : '' }}>Madukanda</option>
                                <option value="Ambanpola" {{ $nutrition->asc_name == 'Ambanpola' ? 'selected' : '' }}>Ambanpola</option>
                                <option value="Ehatuwewa" {{ $nutrition->asc_name == 'Ehatuwewa' ? 'selected' : '' }}>Ehatuwewa</option>
                                <option value="Maha Nanneriya" {{ $nutrition->asc_name == 'Maha Nanneriya' ? 'selected' : '' }}>Maha Nanneriya</option>
                                <option value="Galgamuwa" {{ $nutrition->asc_name == 'Galgamuwa' ? 'selected' : '' }}>Galgamuwa</option>
                                <option value="Thambuththa" {{ $nutrition->asc_name == 'Thambuththa' ? 'selected' : '' }}>Thambuththa</option>
                                <option value="Kobeigane" {{ $nutrition->asc_name == 'Kobeigane' ? 'selected' : '' }}>Kobeigane</option>
                                <option value="Rambe" {{ $nutrition->asc_name == 'Rambe' ? 'selected' : '' }}>Rambe</option>
                                <option value="Moragollagama" {{ $nutrition->asc_name == 'Moragollagama' ? 'selected' : '' }}>Moragollagama</option>
                                <option value="Uyilankulam" {{ $nutrition->asc_name == 'Uyilankulam' ? 'selected' : '' }}>Uyilankulam</option>
                                <option value="Manthai" {{ $nutrition->asc_name == 'Manthai' ? 'selected' : '' }}>Manthai</option>
                                <option value="potkerni" {{ $nutrition->asc_name == 'potkerni' ? 'selected' : '' }}>potkerni</option>
                                <option value="Silawathurai" {{ $nutrition->asc_name == 'Silawathurai' ? 'selected' : '' }}>Silawathurai</option>
                                <option value="P.P.Potkeny" {{ $nutrition->asc_name == 'P.P.Potkeny' ? 'selected' : '' }}>P.P.Potkeny</option>
                                <option value="Murunkan" {{ $nutrition->asc_name == 'Murunkan' ? 'selected' : '' }}>Murunkan</option>
                                <option value="Nanattan" {{ $nutrition->asc_name == 'Nanattan' ? 'selected' : '' }}>Nanattan</option>
                                <option value="Uyilankulam" {{ $nutrition->asc_name == 'Uyilankulam' ? 'selected' : '' }}>Uyilankulam</option>
                                <option value="Yatawatta" {{ $nutrition->asc_name == 'Yatawatta' ? 'selected' : '' }}>Yatawatta</option>
                                <option value="Walawela" {{ $nutrition->asc_name == 'Walawela' ? 'selected' : '' }}>Walawela</option>
                                <!-- Add other ASCs as needed -->
                            </select>
                        <input type="hidden" class="form-control" id="asCenterDropdown" name="asc_name" value="{{ $nutrition->asc_name }}" required>
                    </div>
                </div>

                <!-- Cascade Name -->
                <div class="col">
                    <div class="dropdown">
                        <label for="cascade_name" class="form-label dropdown-label">Cascade Name</label>
                        <select id="cascadeNameDropdown" name="cascade_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Cascade Name</option>
                                <!-- Populate with existing data -->
                                <option value="Cascade 1" {{ $nutrition->cascade_name == 'Cascade 1' ? 'selected' : '' }}>Cascade 1</option>
                                <option value="N/A" {{ $nutrition->cascade_name == 'N/A' ? 'selected' : '' }}>N/A</option>
                                <option value="Manankattiya" {{ $nutrition->cascade_name == 'Manankattiya' ? 'selected' : '' }}>Manankattiya</option>
                                <option value="Kuda Halmillawa Ela" {{ $nutrition->cascade_name == 'Kuda Halmillawa Ela' ? 'selected' : '' }}>Kuda Halmillawa Ela</option>
                                <option value="Tambiriyawa" {{ $nutrition->cascade_name == 'Tambiriyawa' ? 'selected' : '' }}>Tambiriyawa</option>
                                <option value="Dumminnegama" {{ $nutrition->cascade_name == 'Dumminnegama' ? 'selected' : '' }}>Dumminnegama</option>
                                <option value="Kardan Kulam" {{ $nutrition->cascade_name == 'Kardan Kulam' ? 'selected' : '' }}>Kardan Kulam</option>
                                <option value="Lidawewa" {{ $nutrition->cascade_name == 'Lidawewa' ? 'selected' : '' }}>Lidawewa</option>
                                <option value="Medawachchiya Wewa" {{ $nutrition->cascade_name == 'Medawachchiya Wewa' ? 'selected' : '' }}>Medawachchiya Wewa</option>
                                <option value="Sangilikanadarawa" {{ $nutrition->cascade_name == 'Sangilikanadarawa' ? 'selected' : '' }}>Sangilikanadarawa</option>
                                <option value="Pulleiliya" {{ $nutrition->cascade_name == 'Pulleiliya' ? 'selected' : '' }}>Pulleiliya</option>
                                <option value="Nawak Kulam" {{ $nutrition->cascade_name == 'Nawak Kulam' ? 'selected' : '' }}>Nawak Kulam</option>
                                <option value="Kidewaran Kulam" {{ $nutrition->cascade_name == 'Kidewaran Kulam' ? 'selected' : '' }}>Kidewaran Kulam</option>
                                <option value="Boo Oya" {{ $nutrition->cascade_name == 'Boo Oya' ? 'selected' : '' }}>Boo Oya</option>
                                <option value="Katukeliyawa" {{ $nutrition->cascade_name == 'Katukeliyawa' ? 'selected' : '' }}>Katukeliyawa</option>
                                <option value="malvatu m̆baya" {{ $nutrition->cascade_name == 'malvatu m̆baya' ? 'selected' : '' }}>malvatu m̆baya</option>
                                <option value="Galpoththegama" {{ $nutrition->cascade_name == 'Galpoththegama' ? 'selected' : '' }}>Galpoththegama</option>
                                <option value="Pahala Moragollagama wewa" {{ $nutrition->cascade_name == 'Pahala Moragollagama wewa' ? 'selected' : '' }}>Pahala Moragollagama wewa</option>
                                <option value="Kawarakkulama" {{ $nutrition->cascade_name == 'Kawarakkulama' ? 'selected' : '' }}>Kawarakkulama</option>
                                <option value="Horuwila Wewa" {{ $nutrition->cascade_name == 'Horuwila Wewa' ? 'selected' : '' }}>Horuwila Wewa</option>
                                <option value="Kapiriggama Wewa" {{ $nutrition->cascade_name == 'Kapiriggama Wewa' ? 'selected' : '' }}>Kapiriggama Wewa</option>
                                <option value="Pihimbiyagollewa Wewa" {{ $nutrition->cascade_name == 'Pihimbiyagollewa Wewa' ? 'selected' : '' }}>Pihimbiyagollewa Wewa</option>
                                <option value="Labunoruwa Wewa" {{ $nutrition->cascade_name == 'Labunoruwa Wewa' ? 'selected' : '' }}>Labunoruwa Wewa</option>
                                <option value="Siyambalawatta" {{ $nutrition->cascade_name == 'Siyambalawatta' ? 'selected' : '' }}>Siyambalawatta</option>
                                <option value="Individual tank.-12" {{ $nutrition->cascade_name == 'Individual tank.-12' ? 'selected' : '' }}>Individual tank.-12</option>
                                <option value="Maha wewa" {{ $nutrition->cascade_name == 'Maha wewa' ? 'selected' : '' }}>Maha wewa</option>
                                <option value="E /Alankulama" {{ $nutrition->cascade_name == 'E /Alankulama' ? 'selected' : '' }}>E /Alankulama</option>
                                <option value="Merungoda" {{ $nutrition->cascade_name == 'Merungoda' ? 'selected' : '' }}>Merungoda</option>
                                <option value="Wagayamaduwa" {{ $nutrition->cascade_name == 'Wagayamaduwa' ? 'selected' : '' }}>Wagayamaduwa</option>
                                <option value="Kadawala wewa" {{ $nutrition->cascade_name == 'Kadawala wewa' ? 'selected' : '' }}>Kadawala wewa</option>
                                <option value="Achirigama" {{ $nutrition->cascade_name == 'Achirigama' ? 'selected' : '' }}>Achirigama</option>
                                <option value="Individual tank.-2" {{ $nutrition->cascade_name == 'Individual tank.-2' ? 'selected' : '' }}>Individual tank.-2</option>
                                <option value="Kuruluwewa" {{ $nutrition->cascade_name == 'Kuruluwewa' ? 'selected' : '' }}>Kuruluwewa</option>
                                <option value="Kal Aru Sub water shed" {{ $nutrition->cascade_name == 'Kal Aru Sub water shed' ? 'selected' : '' }}>Kal Aru Sub water shed</option>
                                <option value="Nedungkaraichenaikulam" {{ $nutrition->cascade_name == 'Nedungkaraichenaikulam' ? 'selected' : '' }}>Nedungkaraichenaikulam</option>
                                <option value="Koolankulam" {{ $nutrition->cascade_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Sinnasippikulam" {{ $nutrition->cascade_name == 'Sinnasippikulam' ? 'selected' : '' }}>Sinnasippikulam</option>
                                <option value="Kankankulam" {{ $nutrition->cascade_name == 'Kankankulam' ? 'selected' : '' }}>Kankankulam</option>
                                <option value="Kirishthavakulam" {{ $nutrition->cascade_name == 'Kirishthavakulam' ? 'selected' : '' }}>Kirishthavakulam</option>
                                <option value="Musalkuththikulam" {{ $nutrition->cascade_name == 'Musalkuththikulam' ? 'selected' : '' }}>Musalkuththikulam</option>
                                <option value="Mullikulam" {{ $nutrition->cascade_name == 'Mullikulam' ? 'selected' : '' }}>Mullikulam</option>
                                <option value="Cheddikulam" {{ $nutrition->cascade_name == 'Cheddikulam' ? 'selected' : '' }}>Cheddikulam</option>
                                <option value="Udaiyarkulam" {{ $nutrition->cascade_name == 'Udaiyarkulam' ? 'selected' : '' }}>Udaiyarkulam</option>
                                <option value="Nochchikulam" {{ $nutrition->cascade_name == 'Nochchikulam' ? 'selected' : '' }}>Nochchikulam</option>
                                <option value="Nithikulam" {{ $nutrition->cascade_name == 'Nithikulam' ? 'selected' : '' }}>Nithikulam</option>
                                <option value="Ranoruwa" {{ $nutrition->cascade_name == 'Ranoruwa' ? 'selected' : '' }}>Ranoruwa</option>
                                <option value="Kattaragama" {{ $nutrition->cascade_name == 'Kattaragama' ? 'selected' : '' }}>Kattaragama</option>
                                <option value="Palukadawala Wewa" {{ $nutrition->cascade_name == 'Palukadawala Wewa' ? 'selected' : '' }}>Palukadawala Wewa</option>
                                <option value="Atharagalla" {{ $nutrition->cascade_name == 'Atharagalla' ? 'selected' : '' }}>Atharagalla</option>
                                <option value="Nahettikulama" {{ $nutrition->cascade_name == 'Nahettikulama' ? 'selected' : '' }}>Nahettikulama</option>
                                <option value="Andara wewa" {{ $nutrition->cascade_name == 'Andara wewa' ? 'selected' : '' }}>Andara wewa</option>
                                <option value="Gampola Wewa" {{ $nutrition->cascade_name == 'Gampola Wewa' ? 'selected' : '' }}>Gampola Wewa</option>
                                <option value="Mawathagama" {{ $nutrition->cascade_name == 'Mawathagama' ? 'selected' : '' }}>Mawathagama</option>
                                <option value="Pothuwepitiya (makulla gaha mula)" {{ $nutrition->cascade_name == 'Pothuwepitiya (makulla gaha mula)' ? 'selected' : '' }}>Pothuwepitiya (makulla gaha mula)</option>
                                <option value="Mahagale Wewa" {{ $nutrition->cascade_name == 'Mahagale Wewa' ? 'selected' : '' }}>Mahagale Wewa</option>
                                <option value="Mamunugama" {{ $nutrition->cascade_name == 'Mamunugama' ? 'selected' : '' }}>Mamunugama</option>
                                <option value="Adaikkalamoddai" {{ $nutrition->cascade_name == 'Adaikkalamoddai' ? 'selected' : '' }}>Adaikkalamoddai</option>
                                <option value="Sinnaudaippu" {{ $nutrition->cascade_name == 'Sinnaudaippu' ? 'selected' : '' }}>Sinnaudaippu</option>
                                <option value="Kandal kulam" {{ $nutrition->cascade_name == 'Kandal kulam' ? 'selected' : '' }}>Kandal kulam</option>
                                <option value="Alankulam" {{ $nutrition->cascade_name == 'Alankulam' ? 'selected' : '' }}>Alankulam</option>
                                <option value="SP Potkerni" {{ $nutrition->cascade_name == 'SP Potkerni' ? 'selected' : '' }}>SP Potkerni</option>
                                <option value="Ithikulam" {{ $nutrition->cascade_name == 'Ithikulam' ? 'selected' : '' }}>Ithikulam</option>
                                <option value="Sadayappan" {{ $nutrition->cascade_name == 'Sadayappan' ? 'selected' : '' }}>Sadayappan</option>
                                <option value="Paliyadikulam" {{ $nutrition->cascade_name == 'Paliyadikulam' ? 'selected' : '' }}>Paliyadikulam</option>
                                <option value="Thandikulam" {{ $nutrition->cascade_name == 'Thandikulam' ? 'selected' : '' }}>Thandikulam</option>
                                <option value="Koolankulam" {{ $nutrition->cascade_name == 'Koolankulam' ? 'selected' : '' }}>Koolankulam</option>
                                <option value="Alankam" {{ $nutrition->cascade_name == 'Alankam' ? 'selected' : '' }}>Alankam</option>
                                <option value="Sonaka nedunkulam" {{ $nutrition->cascade_name == 'Sonaka nedunkulam' ? 'selected' : '' }}>Sonaka nedunkulam</option>
                                <option value="14th Mile" {{ $nutrition->cascade_name == '14th Mile' ? 'selected' : '' }}>14th Mile</option>
                                <option value="11th Mile" {{ $nutrition->cascade_name == '11th Mile' ? 'selected' : '' }}>11th Mile</option>
                                <option value="12th Mile" {{ $nutrition->cascade_name == '12th Mile' ? 'selected' : '' }}>12th Mile</option>
                                <option value="13th Mile" {{ $nutrition->cascade_name == '13th Mile' ? 'selected' : '' }}>13th Mile</option>
                                <option value="Issaimalaithalvu" {{ $nutrition->cascade_name == 'Issaimalaithalvu' ? 'selected' : '' }}>Issaimalaithalvu</option>
                                <option value="Kovilkulam" {{ $nutrition->cascade_name == 'Kovilkulam' ? 'selected' : '' }}>Kovilkulam</option>
                                <option value="Individual tank" {{ $nutrition->cascade_name == 'Individual tank' ? 'selected' : '' }}>Individual tank</option>

                                <!-- Add other cascade names as needed -->
                            </select>
                        <input type="hidden" class="form-control" id="cascadeNameDropdown" name="cascade_name" value="{{ $nutrition->cascade_name }}" required>
                    </div>
                </div>
            </div>

                <!-- Program Type -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="program_type" class="form-label dropdown-label">Program Type</label>
                    <input type="text" class="form-control" id="program_type" name="program_type" value="{{ $nutrition->program_type }}" required>
                </div>
                </div>

                <!-- Date -->

                <div class="col">
                <div class="form-group">
                    <label for="date" class="form-label dropdown-label">Date</label>
                    <input type="text" class="form-control" id="date" name="date" value="{{ $nutrition->date }}" required>
                </div>
                </div>
            </div>

                <!-- Location -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="location" class="form-label dropdown-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $nutrition->location }}" required>
                </div>
                </div>

                <!-- Program Conductor -->
                <div class="col">
                <div class="form-group">
                    <label for="program_conductor" class="form-label dropdown-label">Program Conductor</label>
                    <input type="text" class="form-control" id="program_conductor" name="program_conductor" value="{{ $nutrition->program_conductor }}" required>
                </div>
                </div>
            </div>

                <!-- Cost of Training Program -->
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="cost_of_training_program" class="form-label dropdown-label">Cost of Training Program</label>
                    <input type="number" step="0.01" class="form-control" id="cost_of_training_program" name="cost_of_training_program" value="{{ $nutrition->cost_of_training_program }}" required>
                </div>
                </div>

                <!-- Description -->
                <div class="col">
                <div class="form-group">
                    <label for="description" class="form-label dropdown-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $nutrition->description }}</textarea>
                </div>
                </div>
            </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn submitbtton mt-3">Update Program</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Datepicker Initialization -->
<script>
    $(function() {
        $("#date").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script>
        $(document).ready(function () {
            // Fetch tank names from the API endpoint
            $.get('/tanks', function (data) {
              // console.log(data);
                // Populate the dropdown menu with tank names
                $.each(data, function (index, tank) {
                    $('#tankDropdown').append($('<option>', {
                        value: tank.tank_name,
                        text: tank.tank_name
                    }));
                });
            });
        });

        $(document).ready(function () {
            // Fetch ASC names from the API endpoint
            $.get('/asc', function (data) {
                // Populate the dropdown menu with ASC names
                $.each(data, function (index, asc) {
                    $('#ascDropdown').append($('<option>', {
                        value: asc.asc_name,
                        text: asc.asc_name
                    }));
                });
            });
        });

        $(document).ready(function () {
            // Fetch cascade names from the API endpoint
            $.get('/cascades', function (data) {
                // Populate the dropdown menu with cascade names
                $.each(data, function (index, cascade) {
                    $('#cascadeDropdown').append($('<option>', {
                        value: cascade.cascade_name,
                        text: cascade.cascade_name
                    }));
                });
            });
        });
    </script>

    <!--  JavaScript to cascade dropdown -->
    <script>
        $(document).ready(function() {
            // Fetch provinces
            $.ajax({
                url: '/provinces',
                type: 'GET',
                success: function(data) {
                    // Populate province dropdown
                    $.each(data, function(index, province) {
                        $('#provinceDropdown').append($('<option>', {
                            value: province.id,
                            text: province.name
                        }));
                    });
                }
            });

            // Fetch districts based on selected province
            $('#provinceDropdown').change(function() {
                var provinceId = $(this).val();

                // Check if a province is selected
                if (provinceId !== '') {
                    // Clear the district and DS Division dropdowns
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));

                    // Fetch districts only if a valid province ID is selected
                    $.ajax({
                        url: '/provinces/' + provinceId + '/districts',
                        type: 'GET',
                        success: function(data) {
                            // Populate district dropdown
                            $.each(data, function(index, district) {
                                $('#districtDropdown').append($('<option>', {
                                    value: district.id,
                                    text: district.district
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the district and DS Division dropdowns if no province is selected
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden fields
                $('#provinceName').val('');
                $('#districtName').val('');
                $('#dsDivisionName').val('');
                $('#gndName').val('');
            });

            // Fetch DS Divisions based on selected district
            $('#districtDropdown').change(function() {
                var districtId = $(this).val();

                // Check if a district is selected
                if (districtId !== '') {
                    // Fetch DS Divisions only if a valid district ID is selected
                    $.ajax({
                        url: '/districts/' + districtId + '/ds-divisions',
                        type: 'GET',
                        success: function(data) {
                            // Clear the DS Division dropdown
                            $('#dsDivisionDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select DS Division'
                            }));

                            // Populate DS Division dropdown
                            $.each(data, function(index, dsDivision) {
                                $('#dsDivisionDropdown').append($('<option>', {
                                    value: dsDivision.id,
                                    text: dsDivision.division
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the DS Division dropdown if no district is selected
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                }
                // Reset hidden field
                $('#dsDivisionName').val('');
            });

            // Fetch GNDs based on selected DS Division
            $('#dsDivisionDropdown').change(function() {
                var dsDivisionId = $(this).val();

                // Check if a DS Division is selected
                if (dsDivisionId !== '') {
                    // Fetch GNDs only if a valid DS Division ID is selected
                    $.ajax({
                        url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            // Clear the GND dropdown
                            $('#gndDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select GND'
                            }));

                            // Populate GND dropdown
                            $.each(data, function(index, gnd) {
                                $('#gndDropdown').append($('<option>', {
                                    value: gnd.id,
                                    text: gnd.gn_division
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the GND dropdown if no DS Division is selected
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden field
                $('#gndName').val('');
            });

            // Update hidden fields when options are selected
            $('#provinceDropdown').change(function() {
                $('#provinceName').val($(this).find('option:selected').text());
            });

            $('#districtDropdown').change(function() {
                $('#districtName').val($(this).find('option:selected').text());
            });

            $('#dsDivisionDropdown').change(function() {
                $('#dsDivisionName').val($(this).find('option:selected').text());
            });

            $('#gndDropdown').change(function() {
                $('#gndName').val($(this).find('option:selected').text());
            });
        });

        $(document).ready(function () {
      // Add '%' sign to tank progress input
      $('#tankProgress').on('blur', function() {
          let value = $(this).val();
          if (value && !value.includes('%')) {
              $(this).val(value + '%');
          }
      });
  });
    </script>

</body>
</html>
