<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASC Project Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
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
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .submitbtton {
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
            align-items: center;
            justify-content: center;
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
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }
        .view-button:hover {
            border-color: green; /* Border appears on hover */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }
        .pagination .page-item {
            margin: 0px; /* Adjust the margin to reduce space */
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
            justify-content: space-between;
            align-items: center;
        }
        #tableInfo {
            text-align: left;
        }
    </style>


<style>
    .top-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.top-left {
    flex: 1;
    display: flex;
    justify-content: flex-start;
}

.top-right {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}

.bottom-left {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px; /* Adds space between the two buttons */
    margin-bottom: 20px;
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

    <a href="{{ route('asc_registration.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 style="font-size: 2rem; color: green;">ASC Project Details</h3>
                </div>
            </div>
        </div>

        

           

    <div class="container">
        <div class="justify-content-center">
            <div class="container mt-4">
                <div class="d-flex justify-content-center">
        
                    <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                        <div class="card-header">
                            Number of ASC
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalASCs}}</h5>
                            <p>Total ASC records currently in the system.</p>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>


        
        

        <!-- Generate and Upload CSV, Add ASC Button -->
        <div class="top-section">
            <div class="top-left">
                <a href="{{ route('asc_registration.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add ASC</a>
            </div>
            <div class="top-right">
                <form method="GET" action="{{ route('searchASC') }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bottom-left">
            <a href="{{ route('downloadAscCsv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
            <form action="{{ route('uploadAscCsv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                @csrf
                <div class="form-group mr-2">
                    <input type="file" name="csv_file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Upload CSV</button>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Province Name</th>
                        <th>District Name</th>
                        <th>DS Division Name</th>
                        <th>GN Division Name</th>
                        <th>ASC</th>
                        <th>ASC Name</th>
                        <th>Officer Incharge</th>
                        <th>Contact Email</th>
                        <th>Contact Number</th>
                        <th>Services Available</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ascRegistrations as $ascRegistration)
                    <tr>
                        <td>{{ $ascRegistration->province_name }}</td>
                        <td>{{ $ascRegistration->district_name }}</td>
                        <td>{{ $ascRegistration->ds_division_name }}</td>
                        <td>{{ $ascRegistration->gn_division_name }}</td>
                        <td>{{ $ascRegistration->as_center }}</td>
                        <td>{{ $ascRegistration->asc_name }}</td>
                        <td>{{ $ascRegistration->officer_incharge }}</td>
                        <td>{{ $ascRegistration->contact_email }}</td>
                        <td>{{ $ascRegistration->contact_number }}</td>
                        <td>{{ $ascRegistration->services_available }}</td>
                        <td class="button-container">
                            <a href="/asc_registration/{{ $ascRegistration->id }}/edit" class="btn btn-danger edit-button" title="Edit">
                                <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                            </a>
                            <form action="/asc_registration/{{ $ascRegistration->id }}" method="POST" style="display:inline;">
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
        <div class="pagination-container">
            <div id="tableInfo">
                @php
                    $currentPage = $ascRegistrations->currentPage();
                    $perPage = $ascRegistrations->perPage();
                    $total = $ascRegistrations->total();
                    $startingNumber = ($currentPage - 1) * $perPage + 1;
                    $endingNumber = min($total, $currentPage * $perPage);
                @endphp
                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $ascRegistrations->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $ascRegistrations->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    @php
                        $currentPage = $ascRegistrations->currentPage();
                        $lastPage = $ascRegistrations->lastPage();
                        $startPage = max($currentPage - 2, 1);
                        $endPage = min($currentPage + 2, $lastPage);
                    @endphp
                    @if ($startPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $ascRegistrations->url(1) }}">1</a>
                        </li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif
                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $ascRegistrations->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $ascRegistrations->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif
                    <li class="page-item {{ $ascRegistrations->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $ascRegistrations->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('table').DataTable();
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
</script> -->
</body>
</html>
