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
            margin-left: 5px;
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

        .add-member-buttons, .action-buttons {
    display: flex;
    gap: 10px; /* Adds space between buttons */
}

td {
    white-space: nowrap; /* Prevents content from wrapping */
    vertical-align: middle; /* Ensures vertical alignment */
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
            width: 120px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            /*transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: green; /* Slightly darker light yellow on hover */
        }

        .addmember:hover {
            border-color: #155E2C; /* Border appears on hover */
            background-color: #155E2C; /* Slightly darker light yellow on hover */
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
    /* Summary Section Styles */
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

    <a href="{{ route('cdf.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    {{-- <!-- form -->
    <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
        <h3 style="font-size: 2rem; color: green;">CDF Registration</h3>
    </br>
        <form class="form-horizontal" method="POST" action="{{ route('cdf.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="province" class="form-label dropdown-label">Province</label>
                        <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select Province</option>
                        </select>
                        <input type="hidden" id="provinceName" name="province_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="district" class="form-label dropdown-label">District</label>
                        <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select District</option>
                        </select>
                        <input type="hidden" id="districtName" name="district_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="dsd" class="form-label dropdown-label">DSD</label>
                        <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select DSD</option>
                        </select>
                        <input type="hidden" id="dsDivisionName" name="ds_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="gnd" class="form-label dropdown-label">GND</label>
                        <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select GND</option>
                        </select>
                        <input type="hidden" id="gndName" name="gn_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="asc" class="form-label dropdown-label">ASC</label>
                        <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select ASC</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="dropdown">
                        <label for="cascadeDropdown" class="form-label dropdown-label">Cascade Name</label>
                        <select class="form-control btn btn-success" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                            <option value="">Select Cascade name</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="cdfName" class="form-label dropdown-label">CDF Name</label>
                    <input type="text" id="cdfName" name="cdf_name" class="form-control" required>
                </div>
                <div class="col">
                    <label for="cdfAddress" class="form-label dropdown-label">CDF Address</label>
                    <input type="text" id="cdfAddress" name="cdf_address" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <button type="submit" class="btn submitbtton">Submit</button>
                </div>
            </div>
        </form>
    </div> --}}

    <!-- table -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="center-heading text-center">
                    <h3 style="font-size: 2rem; color: green; text-align: left;">CDF Project Details</h3>
                </div>
            </div>
        </div>
       
        {{-- <div class="summary-card-container">
            <div class="summary-card">
                <h4>Total CDF Records</h4>
                <div class="number">{{ $totalCDFs }}</div>
                <p>Total records currently in the system.</p>
            </div>
        </div> --}}

        <div class="container">
            <div class="justify-content-center">
                <div class="container mt-4">
                    <div class="d-flex justify-content-center">
            
                        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                            <div class="card-header">
                                Total CDF Records
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $totalCDFs }}</h5>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>

    </br>
        

    

        <!--serch and csv files-->

        <div class="d-flex justify-content-between mb-3">
                    <!--<a href="{{route('cdf.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add</a>-->
                    <a href="{{route('downloadcdf.csv')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form -->
                    <form action="{{ route('cdf.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>
                    <!-- Search form -->
                    <form method="GET" action="{{ route('searchCDF') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="entries-container">
                                <label for="entriesSelect">Show</label>
                                <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                    <option value="10" {{ $cdfs->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $cdfs->perPage() == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ $cdfs->perPage() == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $cdfs->perPage() == 100 ? 'selected' : '' }}>100</option>
                                </select>
                                <label for="entriesSelect">entries</label>
                            </div>
                            <div id="tableInfo" class="text-right"></div>
                        </div>




        <div class="row mt-4">
            <div class="col-md-12">
                <!-- Add New Project and Generate Report buttons -->


                <!-- Upload CSV form and Search form -->

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

                <!-- Table displaying project details -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>CDF Name</th>
                                <th>CDF Address</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>DSD</th>
                                <th>GND</th>
                                <th>ASC</th>

                                <th>Add Member</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cdfs as $cdf)
                            <tr>
                                 <td>{{ $cdf->cdf_name }}</td>
                                <td>{{ $cdf->cdf_address }}</td>
                                <td>{{ $cdf->province_name }}</td>
                                <td>{{ $cdf->district_name }}</td>
                                <td>{{ $cdf->ds_division_name }}</td>
                                <td>{{ $cdf->gn_division_name }}</td>
                                <td>{{ $cdf->as_center }}</td>


                                <td>
                                <div class="add-member-buttons">
                                <a href="{{ route('cdfmembers.create', ['cdf_name' => $cdf->cdf_name, 'cdf_address' => $cdf->cdf_address]) }}" class="btn btn-primary btn-sm button-a addmember" type="button">Add Members</a>
                                <a href="{{ route('cdf.showMembers', ['cdf_name' => $cdf->cdf_name, 'cdf_address' => $cdf->cdf_address]) }}" class="btn btn-sm btn-info addmember">View members</a>
                                </div>
                                </td>
                                <td>
                                <div class="action-buttons">

                                    {{--<a href="{{ route('cdf.show', $cdf->id) }}" class="btn btn-danger button view-button" title="View">
                                        <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                    </a>--}}

                                    <a href="/cdf/{{ $cdf->id }}/edit" class="btn btn-danger edit-button" title="Edit">
                                        <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                    </a>

                                    <form action="/cdf/{{ $cdf->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger custom-button" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                        </button>
                                    </form>
                    </div>
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
                    <nav aria-label="Page navigation example">
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

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">

                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>


                <!-- Pagination links -->


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

<script>
    // Update the number of entries displayed when the dropdown value changes
    document.getElementById('entriesSelect').addEventListener('change', function() {
        updateEntries();
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
</script>





</body>
</html>
