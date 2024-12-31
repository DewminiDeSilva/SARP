<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grievances</title>
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/family_index.css') }}">
    <style>
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

        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1;
            color: #0d0e0d;
        }

        .pagination .page-item {
            margin: 0 0px;
        }

        .pagination .page-link {
            padding: 5px 10px;
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

    </style>
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="container-fluid">
            <div class="center-heading" style="text-align: center;">
                <h1>Grievances Details</h1>
            </div>

            <div class="container mt-4">
                <div class="d-flex justify-content-center">
                    <!-- Total Grievances Card -->
                    <div class="summary-card-container">
                        <div class="summary-card">
                            <h4>Total Grievances</h4>
                            <div class="number">{{ $totalGrievances }}</div>
                            <p>Total grievances currently in the system.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('grievances.create') }}" class="btn btn-success">Add New Grievance</a>
                <a href="{{ route('grievances.report.csv') }}" class="btn btn-primary">Generate CSV Report</a>
            </div>

            <!-- CSV Upload Form -->
            <form action="{{ route('grievances.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline mb-3">
                @csrf
                <div class="form-group mr-2">
                    <input type="file" name="csv_file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Upload CSV</button>
            </form>

            <!-- Search Form -->
            <form method="GET" action="{{ route('searchGrievances') }}" class="form-inline mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="row table-container">
                <div class="col">
                    <table class="table table-bordered" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Address</th>
                                <th>Subject</th>
                                <th>Grievance Description</th>
                                <th>Contact Number</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>DSD</th>
                                <th>GND</th>
                                <!-- <th>ASC</th> -->
                                <!-- <th>Cascade Name</th> -->
                                <!-- <th>Tank Name</th> -->
                                <th>Date Received</th>
                                <!-- <th>Sub Project Name</th> -->
                                <!-- <th>Sub Project GN Division</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grievances as $grievance)
                            <tr>
                                <td>{{ $grievance->id }}</td>
                                <td>{{ $grievance->name }}</td>
                                <td>{{ $grievance->nic }}</td>
                                <td>{{ $grievance->address }}</td>
                                <td>{{ $grievance->subject }}</td>
                                <td>{{ $grievance->grievance_description }}</td>
                                <td>{{ $grievance->contact_number }}</td>
                                <td>{{ $grievance->province }}</td>
                                <td>{{ $grievance->district }}</td>
                                <td>{{ $grievance->dsd }}</td>
                                <td>{{ $grievance->gnd }}</td>
                                <!-- <td>{{ $grievance->asc }}</td> -->
                                <!-- <td>{{ $grievance->cascade_name }}</td> -->
                                <!-- <td>{{ $grievance->tank_name }}</td> -->
                                <!-- <td>{{ $grievance->date_received }}</td> -->
                                <!-- <td>{{ $grievance->sub_project_name }}</td> -->
                                <td>{{ $grievance->sub_project_gn_division }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('officer.create', $grievance->id) }}" class="btn btn-primary mr-2">Action Taken</a>
                                        <a href="{{ route('grievance.officers', $grievance->id) }}" class="btn btn-success">View</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item {{ $grievances->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $grievances->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        @php
                            $currentPage = $grievances->currentPage();
                            $lastPage = $grievances->lastPage();
                            $startPage = max($currentPage - 2, 1);
                            $endPage = min($currentPage + 2, $lastPage);
                        @endphp
                        @if ($startPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $grievances->url(1) }}">1</a>
                            </li>
                            @if ($startPage > 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                        @endif
                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                <a class="page-link" href="{{ $grievances->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        @if ($endPage < $lastPage)
                            @if ($endPage < $lastPage - 1)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item">
                                <a class="page-link" href="{{ $grievances->url($lastPage) }}">{{ $lastPage }}</a>
                            </li>
                        @endif
                        <li class="page-item {{ $grievances->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $grievances->nextPageUrl() }}">Next</a>
                        </li>
                    </ul>
                </nav>
                @php
                    $currentPage = $grievances->currentPage();
                    $perPage = $grievances->perPage();
                    $total = $grievances->total();
                    $startingNumber = ($currentPage - 1) * $perPage + 1;
                    $endingNumber = min($total, $currentPage * $perPage);
                @endphp
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div id="tableInfo" class="text-right">
                        <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('.edit-family-btn').click(function() {
                        var familyId = $(this).data('family-id');
                        $.ajax({
                            url: '/family/' + familyId + '/edit',
                            method: 'GET',
                            success: function(response) {
                                $('#edit_first_name').val(response.first_name);
                                $('#edit_last_name').val(response.last_name);
                                $('#edit_phone').val(response.phone);
                                $('#edit_gender').val(response.gender);
                                $('#edit_dob').val(response.dob);
                                $('#edit_youth').val(response.youth);
                                $('#edit_education').val(response.education);
                                $('#edit_employment').val(response.employment);
                                $('#edit_nutrition_level').val(response.nutrition_level);
                            },
                            error: function(xhr, status, error) {
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>
