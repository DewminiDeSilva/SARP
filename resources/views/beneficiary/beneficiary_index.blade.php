<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} ">    overrite navbar need to check        --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .pagination .page-item {
            margin: 0 0px; /* Adjust the margin to reduce space */
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


        .buttonline {
            white-space: nowrap; /* Prevent line breaks within the table cell */
        }

        .button-a {
            margin-right: 10px; /* Optional: Add some space between the buttons */
        }

        .button-group {
    white-space: nowrap; /* Prevent line breaks within the table cell */
}

.button-group a, .button-group form {
    display: inline-block; /* Ensure both links and forms are inline */
    margin-right: 10px; /* Optional: Add space between the buttons */
}

.button-group form button {
    margin-right: 0; /* Remove the margin from the last button */
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
        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1; /* Blue color example */
            color: #0d0e0d; /* Text color */
        }


        .pagination .page-item {
            margin: 0 0px; /* Adjust the margin to reduce space */
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
        .entries-container {
    display: flex;
    align-items: center;
    gap: 0.5rem; /* Add spacing between elements */
}
.form-select {
    width: auto; /* Ensure dropdown adjusts based on content */
}

    </style>
</head>
<body>

    {{-- <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;"> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>
        <div class="right-column">
        <a href="{{ route('beneficiary.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>




    <div class="container-fluid">
        <div class="center-heading" style="text-align: center;">
            <h1>Beneficiary Details</h1>
        </div>


        <div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Total Beneficiaries Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Beneficiaries<br>
                    Registration
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $beneficiaries->total() }}</h4>
                    <p class="card-text">Total Beneficiaries currently in the system.</p>
                </div>
            </div>
        </div>

        <!-- Crop Names Summary Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-header">
                    View Crop Name/Production Focus
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $input3Summary->count() ?? 0 }}</h5>
                    <p class="card-text">Click below to view the Crop Name/Production Focus summary.</p>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#input3SummaryModal">View</button>
                </div>
            </div>
        </div>

        <!-- Tank Names Summary Card -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-header">
                    View Tank Name
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $tankNameSummary->count() ?? 0 }}</h5>
                    <p class="card-text">Click below to view the Tank Name summary.</p>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tankNameSummaryModal">View</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Crop Name Summary -->
<div class="modal fade" id="input3SummaryModal" tabindex="-1" aria-labelledby="input3SummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input3SummaryModalLabel">Summary of Beneficiaries by Crop Name/Production Focus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Crop Name/Production Focus</th>
                            <th>Count</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($input3Summary as $summary)
                            <tr>
                                <td>{{ $summary->input3 }}</td>
                                <td>{{ $summary->count }}</td>
                                <!-- <td><a href="" class="btn btn-info btn-sm">View</a></td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Tank Name Summary -->
<div class="modal fade" id="tankNameSummaryModal" tabindex="-1" aria-labelledby="tankNameSummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tankNameSummaryModalLabel">Summary of Beneficiaries by Tank Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tank Name</th>
                            <th>Count</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tankNameSummary as $summary)
                            <tr>
                                <td>{{ $summary->tank_name }}</td>
                                <td>{{ $summary->count }}</td>
                                <!-- <td><a href="" class="btn btn-info btn-sm">View</a></td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Input3 Summary (Crop Names) -->
<div class="modal fade" id="input3SummaryModal" tabindex="-1" aria-labelledby="input3SummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input3SummaryModalLabel">Summary of Beneficiaries by Crop Name/Production Focus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Crop Name/Production Focus</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($input3Summary as $summary)
                            <tr>
                                <td>{{ $summary->input3 }}</td>
                                <td>{{ $summary->count }}</td>
                                <td><a href="" class="btn btn-info btn-sm">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tankNameSummaryModal" tabindex="-1" aria-labelledby="tankNameSummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tankNameSummaryModalLabel">Summary of Beneficiaries by Tank Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tank Name</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tankNameSummary as $summary)
                            <tr>
                                <td>{{ $summary->tank_name }}</td>
                                <td>{{ $summary->count }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




              <!-- CSV Upload Form -->
            <form action="{{ route('beneficiary.uploadCsv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
             @csrf
             <div class="form-group mr-2">
             <input type="file" name="csv_file" class="form-control" required>
             </div>
            <button type="submit" class="btn btn-success">Upload CSV</button>
             </form>

                 </br>


                <!-- Search form -->
                <form method="GET" action="{{ route('search') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
    </br>

                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                      <a href="{{ route('beneficiary.create') }}" class="btn submitbtton"> + Add New </button>
                       <a href="{{route('download.csv')}}"  class="btn submitbtton">Generate CSV Report</a>
                </div>

            </div>



        </div>

        <!-- Success Message Popup -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('{{ session('success') }}');
        });
    </script>
@endif

<div class="entries-container">
    <label for="entriesSelect">Show</label>
    <select id="entriesSelect" class="form-select form-select-sm mx-2">
        <option value="10" {{ $beneficiaries->perPage() == 10 ? 'selected' : '' }}>10</option>
        <option value="25" {{ $beneficiaries->perPage() == 25 ? 'selected' : '' }}>25</option>
        <option value="50" {{ $beneficiaries->perPage() == 50 ? 'selected' : '' }}>50</option>
        <option value="100" {{ $beneficiaries->perPage() == 100 ? 'selected' : '' }}>100</option>
    </select>
    <span>entries</span>
</div>


<div class="row table-container">
    <div class="col">
        <table id="beneficiariesTable" class="table table-bordered table-sm">
            <thead class="thead-light">
                <!-- Table headers here -->
            </thead>
            <tbody>
                <!-- Table rows here -->
            </tbody>
        </table>
    </div>
</div>

        <div class="row table-container">
            <div class="col">

                <table id="beneficiariesTable" class="table table-bordered  table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">NIC</th>
                            <th scope="col">Name with Initials</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Crop Name/Production Focus
                            </th>
                            <th scope="col">Tank Name</th>
                            <!-- <th scope="col">Education</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Bank Branch</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Land Ownership (Total Extent)</th>
                            <th scope="col">Proposed Cultivation Area</th>
                            <th scope="col">Province</th>
                            <th scope="col">District</th>
                            <th scope="col">DS Division</th>
                            <th scope="col">GN Division</th>
                            <th scope="col">ASC</th>
                            <th scope="col">Tank Name</th>
                            <th scope="col">Cascade Name</th>
                            <th scope="col">AI Division</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Number of Family Members</th>
                            <th scope="col">Head of Householder Name</th>
                            <th scope="col">Householder Number</th>
                            <th scope="col">Income Source</th>
                            <th scope="col">Average Income</th>
                            <th scope="col">Monthly Household Expenses</th>
                            <th scope="col">Household Level Assets Description</th>
                            <th scope="col">Community-Based Organization</th>
                            <th scope="col">Type of Water Resource</th>
                            <th scope="col">Training Details Description</th> -->
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->nic }}</td>
                            <td>{{ $beneficiary->name_with_initials }}</td>
                            <td>{{ $beneficiary->gender }}</td>
                            <td>{{ $beneficiary->dob }}</td>
                            <td>{{ $beneficiary->age }}</td>
                            <td>{{ $beneficiary->address }}</td>
                            <td>{{ $beneficiary->phone }}</td>
                            <td>{{ $beneficiary->input3 }}</td>
                            <td>{{ $beneficiary->tank_name }}</td>
                            <!-- <td>{{ $beneficiary->education }}</td>
                            <td>{{ $beneficiary->bank_name }}</td>
                            <td>{{ $beneficiary->bank_branch }}</td>
                            <td>{{ $beneficiary->account_number }}</td>
                            <td>{{ $beneficiary->land_ownership_total_extent }}</td>
                            <td>{{ $beneficiary->land_ownership_proposed_cultivation_area }}</td>
                            <td>{{ $beneficiary->province_name }}</td>
                            <td>{{ $beneficiary->district_name }}</td>
                            <td>{{ $beneficiary->ds_division_name }}</td>
                            <td>{{ $beneficiary->gn_division_name }}</td>
                            <td>{{ $beneficiary->tank_name }}</td>
                            <td>{{ $beneficiary->as_center }}</td>
                            <td>{{ $beneficiary->cascade_name }}</td>
                            <td>{{ $beneficiary->ai_division }}</td>
                            <td>{{ $beneficiary->latitude }}</td>
                            <td>{{ $beneficiary->longitude }}</td>
                            <td>{{ $beneficiary->number_of_family_members }}</td>
                            <td>{{ $beneficiary->head_of_householder_name }}</td>
                            <td>{{ $beneficiary->householder_number }}</td>
                            <td>{{ $beneficiary->income_source }}</td>
                            <td>{{ $beneficiary->average_income }}</td>
                            <td>{{ $beneficiary->monthly_household_expenses }}</td>
                            <td>{{ $beneficiary->household_level_assets_description }}</td>
                            <td>{{ $beneficiary->community_based_organization }}</td>
                            <td>{{ $beneficiary->type_of_water_resource }}</td>
                            <td>{{ $beneficiary->training_details_description }}</td> -->
                            <td class="buttonline">
                                <a href="{{ route('beneficiary.show', $beneficiary->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('family/create', ['beneficiaryId' => $beneficiary->id]) }}" class="btn btn-primary btn-sm button-a">Add Members</a>
                            </td>
                            <td class="button-group">
                                <a href="beneficiary/{{ $beneficiary->id }}/edit" class="btn btn-primary btn-sm" style="background-color: green;border: 2px solid green;">
                                    <img src="{{ asset('assets/images/edit4.png') }}" alt="Edit Icon" style="width: 20px; height: 20px;">
                                </a>
                                <form action="beneficiary/{{ $beneficiary->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <img src="{{ asset('assets/images/delete1.png') }}" alt="Delete Icon" style="width: 20px; height: 20px;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>




<!-- Pagination Section -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ $beneficiaries->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $beneficiaries->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>

        @php
                                    $currentPage = $beneficiaries->currentPage();
                                    $lastPage = $beneficiaries->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $beneficiaries->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $beneficiaries->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $beneficiaries->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $beneficiaries->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $beneficiaries->nextPageUrl() }}">Next</a>
                                </li>
    </ul>
</nav>

@php
                            $currentPage = $beneficiaries->currentPage();
                            $perPage = $beneficiaries->perPage();
                            $total = $beneficiaries->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>




    @foreach ($beneficiaries as $beneficiary)
    {{-- popup modal --}}
    <!-- Bootstrap modal code -->
{{-- <div class="modal fade" id="editBeneficiary" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true"> --}}
 <!-- Modal for editing beneficiary -->
 <div class="modal fade" id="editBeneficiary{{ $beneficiary->id }}" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBeneficiaryLabel">Edit Beneficiary Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit form goes here -->
                <form id="editBeneficiaryForm" method="POST" action="{{ route('beneficiary.update', $beneficiary->id) }}">
                    {{-- <form class="form-horizontal" id="editBeneficiaryForm" method="POST" action="/beneficiary/{{$beneficiary->id}}"> --}}
                    @csrf
                    @method('PUT')
                    <!-- Form fields for editing beneficiary details -->

                    <div class="form-group">
                        <label for="editNic">NIC</label>
                        <input type="text" class="form-control" name="nic">
                    </div>
                    <div class="form-group">
                        <label for="editFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="editlastName">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="editDob">Date Of Birth</label>
                        <input type="text" class="form-control" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="editGender">Gender</label>
                        <input type="text" class="form-control" name="gender">
                    </div>
                    <div class="form-group">
                        <label for="editAge">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="editIncome">Income</label>
                        <input type="text" class="form-control" name="income">
                    </div>
                    <div class="form-group">
                        <label for="editFamilyMembersCount">Family Members Count</label>
                        <input type="text" class="form-control" name="family_members_count">
                    </div>
                    <div class="form-group">
                        <label for="editEducation">Education Level</label>
                        <input type="text" class="form-control" name="education">
                    </div>
                    <div class="form-group">
                        <label for="editLandOwnership">Land Ownership </label>
                        <input type="text" class="form-control" name="land_ownership">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach









<script>
    $(document).ready(function() {
        $('#entriesSelect').change(function() {
            var perPage = $(this).val(); // Get selected value
            window.location = '{{ route('beneficiary.index') }}?entries=' + perPage; // Redirect with selected value
        });
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
    document.getElementById('entriesSelect').addEventListener('change', function () {
    const perPage = this.value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('entries', perPage);
    window.location.search = urlParams.toString();
});

</script>




<style>
    body {
        text-align: center;
        color: green;
    }

    h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 40px;
    }
</style>



</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


{{-- <script>



    let chart = bb.generate({
        data: {
            columns: [
                ["Male", {{ $maleCount }}],
                ["Female", {{ $femaleCount }}],
            ],
            type: "pie",
            onclick: function (d, i) {
                console.log("onclick", d, i);
            },
            onover: function (d, i) {
                console.log("onover", d, i);
            },
            onout: function (d, i) {
                console.log("onout", d, i);
            },
        },
        donut: {
            title: "Beneficiaries by Gender",
        },
        bindto: "#donut-chart",
    });
</script> --}}

            {{-- <a href="{{ route('beneficiary/create') }}" class="btn btn-primary">Add Beneficiary</a> --}}
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

            </div>
            </div>

        </body>
</html>
