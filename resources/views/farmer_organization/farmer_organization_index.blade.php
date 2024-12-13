<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDF Project Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

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
            align-items: flex-start
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

        .lock {
      position: fixed;
      top: 0;
      width: 100%;
      /*z-index: 1000;*/
    }

    .text-left {
            text-align: left;
        }

        .justify-content-start {
        justify-content: flex-start !important;
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
        .summary-card-container {
    display: flex;
    justify-content: center; /* Centers horizontally */
    align-items: center; /* Centers vertically */
    
    margin: 0 auto; /* Centers the container */
    width: 100%; /* Full width */
    position: relative; /* Allows positioning adjustments */
    z-index: 10; /* Ensures the cards appear above other elements */
}

.summary-card {
    width: 25%; /* Adjust the width of each card */
    background-color: #e3f7fc; /* Light blue background */
    border: 1px solid #ddd; /* Light border */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Add a deeper shadow for a floating effect */
    padding: 20px; /* Inner padding */
    text-align: center; /* Center-align content */
    font-family: Arial, sans-serif; /* Simple font */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

.summary-card h4 {
    background-color: #b3e5fc; /* Slightly darker blue for the heading */
    color: #000; /* Black text */
    font-size: 1.25rem; /* Medium font size */
    margin: 0;
    padding: 10px 0; /* Add padding to heading */
    border-radius: 6px 6px 0 0; /* Round only the top corners */
    font-weight: bold; /* Bold text */
}

.summary-card .number {
    font-size: 2.5rem; /* Larger font size for numbers */
    font-weight: bold; /* Bold text for numbers */
    color: #333; /* Dark gray text */
    margin: 10px 0; /* Space around the number */
}

.summary-card p {
    color: #555; /* Gray text color */
    font-size: 1rem; /* Normal font size */
    margin: 0; /* No margin */
    padding: 5px 0; /* Add space inside the paragraph */
}

.card-header {
    font-weight: bold;
    text-align: center;
    background-color: #c7eef1; /* Blue color example */
    color: #0d0e0d; /* Text color */
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

    <a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

    <!-- table -->
    <div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="text-center">
                <h3 style="font-size: 2rem; color: green;">Farmer Organization Details</h3>


            </div>

           
        </div>

        
    </div>

    <div class="container">
        <div class="justify-content-center">
            <div class="container mt-4">
                <div class="d-flex justify-content-center">
        
                    <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                        <div class="card-header">
                            Total Farmer Organizations:
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{  $totalFarmerOrganizations}}</h5>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>

</br>
    

    <!-- Search and CSV Files -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{route('farmerorganization.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add New Organization</a>

        <a href="{{ route('downloadfarmerorganization.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
    </div>


    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- CSV Upload Form -->
        <form action="{{ route('farmerorganization.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
            @csrf
            <div class="form-group mr-2">
                <input type="file" name="csv_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Upload CSV</button>
        </form>
        <!-- Search form -->
        <form method="GET" action="{{ route('searchFarmerOrganization') }}" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

                <!-- Success message handling -->
                @if(session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            alert('{{ session('success') }}');
                        });
                    </script>
                @endif


                <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="entries-container">
                                <label for="entriesSelect">Show</label>
                                <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                    <option value="10" {{ $farmerorganizations->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $farmerorganizations->perPage() == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ $farmerorganizations->perPage() == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $farmerorganizations->perPage() == 100 ? 'selected' : '' }}>100</option>
                                </select>
                                <label for="entriesSelect">entries</label>
                            </div>
                            <div id="tableInfo" class="text-right"></div>
                        </div>


                <!-- Table displaying project details -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Registration Number</th>
                                <th>Farmer Organization Name</th>
                                <th>Address</th>
                                <th>Registration Institute</th>
                                <th>Establish Date</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>DSD</th>
                                <th>GND</th>
                                <th>ASC</th>
                                <th>Tank Name</th>
                                <th>Cascade Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmerorganizations as $farmerorganization)
                            <tr>
                                <td>{{ $farmerorganization->registration_number }}</td>
                                <td>{{ $farmerorganization->organization_name }}</td>
                                <td>{{ $farmerorganization->address }}</td>
                                <td>{{ $farmerorganization->registration_institute }}</td>
                                <td>{{ $farmerorganization->edate }}</td>
                                <td>{{ $farmerorganization->province_name }}</td>
                                <td>{{ $farmerorganization->district_name }}</td>
                                <td>{{ $farmerorganization->ds_division_name }}</td>
                                <td>{{ $farmerorganization->gn_division_name }}</td>
                                <td>{{ $farmerorganization->as_center }}</td>
                                <td>{{ $farmerorganization->tank_name }}</td>
                                <td>{{ $farmerorganization->cascade_name }}</td>

                                <td>
                                <a href="{{ route('farmermember.create', ['farmermember_id' => $farmerorganization->id]) }}" class="btn btn-primary btn-sm button-a addmember">Add Members</a>
                                </td>


                                <td class="button-container">
                                <a href="{{ route('farmerorganization.show', $farmerorganization->id) }}" class="btn btn-danger button view-button" title="View">
                                <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                   </a>
                                    <a href="{{ url('/farmerorganization/' . $farmerorganization->id . '/edit') }}" class="btn btn-danger edit-button" title="Edit">
                                        <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                    </a>

                                    <form action="{{ url('/farmerorganization/' . $farmerorganization->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger custom-button" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
                        </tbody>
                    </table>

                    <div class="pagination-container">
                    <!-- Pagination Links -->
                    {{--<nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item {{ $cdfs->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $cdfs->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $cdfs->currentPage();
                                    $lastPage = $cdfs->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $cdfs->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $cdfs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $cdfs->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $cdfs->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $cdfs->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>



                        @php
                            $currentPage = $cdfs->currentPage();
                            $perPage = $cdfs->perPage();
                            $total = $cdfs->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex align-items-center mb-3 justify-content-start">

                            <div id="tableInfo" class="text-left">

                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>--}}


                <!-- Pagination Links -->
                <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item {{ $farmerorganizations->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $farmerorganizations->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $farmerorganizations->currentPage();
                                    $lastPage = $farmerorganizations->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $farmerorganizations->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $farmerorganizations->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $farmerorganizations->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $farmerorganizations->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $farmerorganizations->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>


                        @php
                            $currentPage = $farmerorganizations->currentPage();
                            $perPage = $farmerorganizations->perPage();
                            $total = $farmerorganizations->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex align-items-center mb-3 justify-content-start">

                            <div id="tableInfo" style="text-align: left;">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>


    <!-- Add Bootstrap JS and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- JavaScript for handling entry selection and pagination -->
    <script>


        function updateEntries() {
            const entries = document.getElementById('entriesSelect').value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('entries', entries);
            window.location.search = urlParams.toString();
        }
    </script>


    <!--form script-->

    <script>
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
                                    text: gnd.gn_division_name
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
    </script>


{{--pagination--}}
<script>
                            $(document).ready(function() {
                                $('#entriesSelect').change(function() {
                                    var perPage = $(this).val(); // Get selected value
                                    window.location = '{{ route('farmerorganization.index') }}?entries=' + perPage; // Redirect with selected value
                                    //var url = new URL(window.location.href);
                                    //url.searchParams.set('entries', perPage);
                                    //window.location.href = url.toString(); // Redirect with selected value
                                });
                            });
                        </script>

                        <script>
                            function updateEntries() {
                                const entries = document.getElementById('entriesSelect').value;
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set('entries', entries);
                                window.location.search = urlParams.toString();
                            }
                        </script>




</body>
</html>
