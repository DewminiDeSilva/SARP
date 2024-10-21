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
    </style>
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="container">
            <div class="center-heading" style="text-align: center;">
                <h1>Grievances Details</h1>
            </div>
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
                                <th>ASC</th>
                                <th>Cascade Name</th>
                                <th>Tank Name</th>
                                <th>Date Received</th>
                                <th>Sub Project Name</th>
                                <th>Sub Project GN Division</th>
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
                                <td>{{ $grievance->asc }}</td>
                                <td>{{ $grievance->cascade_name }}</td>
                                <td>{{ $grievance->tank_name }}</td>
                                <td>{{ $grievance->date_received }}</td>
                                <td>{{ $grievance->sub_project_name }}</td>
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
