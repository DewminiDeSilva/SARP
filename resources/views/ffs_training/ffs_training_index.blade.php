<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FFS Training Program</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
        .button-container {
            display: flex;
            gap: 10px;
        }
        .custom-button {
            background-color: white;
            color: red;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: border 0.3s ease;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            background-color: #f5c6cb;
        }
        .custom-button:hover {
            border-color: red;
            background-color: #f5c6cb;
        }
        .edit-button {
            background-color: white;
            color: orange;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            transition: border 0.3s ease, background-color 0.3s ease;
            background-color: #ffeeba;
        }
        .edit-button:hover {
            border-color: orange;
            background-color: #ffeeba;
        }
        .view-button {
            background-color: white;
            color: green;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            transition: border 0.3s ease, background-color 0.3s ease;
            background-color: #c3e6cb;
        }
        .view-button:hover {
            border-color: green;
            background-color: #c3e6cb;
        }
        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1;
            color: #0d0e0d;
        }
        .pagination .page-item {
            margin: 0 2px;
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
            color: #28a745;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
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
    .program-name {
            max-width: 300px; /* Adjust this value as needed */
        }



        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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

        <a href="{{ route('ffs-training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h1 style="font-size: 2.5rem; color: green;">FFS Training Program Details</h1>
                </div>

                <!-- Card Section -->
                <div class="container">
                    <div class="row justify-content-center mt-4">
                        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                            <div class="card-header">
                                Total Program Cost
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ number_format($totalProgramCost, 2) }}</h5>
                                <p class="card-text">Total value of all FFS training program costs.</p>
                            </div>
                        </div>

                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-header">
                                Number of Programs
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $ffsTrainings->total() }}</h5>
                                <p class="card-text">Total number of FFS training programs.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Actions and Search Section -->
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('ffs-training.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add FFS Training Program</a>
                    <a href="{{ route('downloadffs-training.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form -->
                    <form action="{{ route('ffs-training.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>
                    <!-- Search form -->
                    <form method="GET" action="{{ route('searchFFSTraining') }}" class="form-inline">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>
</form>

                </div>

                <!-- Success Message Popup -->
                @if(session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            alert('{{ session('success') }}');
                        });
                    </script>
                @endif

                <!-- Entries Per Page and Table Info -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="entries-container">
                        <label for="entriesSelect">Show</label>
                        <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                            <option value="10" {{ $ffsTrainings->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $ffsTrainings->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $ffsTrainings->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $ffsTrainings->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <label for="entriesSelect">entries</label>
                    </div>
                    <div id="tableInfo" class="text-right"></div>
                </div>

                <!-- Table Section -->
                <div class="row table-container">
                    <div class="col">
                        <div class="table-responsive">
                        <table id="ffsTrainingTable" class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="program-name">Program</th>
                                    <th class="program-name">Program Number</th>
                                    <th class="program-name">Date</th>
                                    <th>Venue</th>
                                    <th>Resource Person</th>
                                    <!-- <th>Program Cost</th> -->
                                    <th>Resource Person Payment</th>
                                    <th>District</th>
                                    <!-- <th>DSD</th>
                                    <th>GND</th> -->
                                    <th>ASC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ffsTrainings as $ffsTraining)
                                <tr>
                                    <td class="program-name">{{ $ffsTraining->program_name }}</td>
                                    <td class="program-name">{{ $ffsTraining->program_number }}</td>
                                    <td class="program-name">{{ $ffsTraining->date }}</td>
                                    <td>{{ $ffsTraining->venue }}</td>
                                    <td>{{ $ffsTraining->resource_person_name }}</td>
                                    <!-- <td>{{ $ffsTraining->training_program_cost }}</td> -->
                                    <td>{{ $ffsTraining->resource_person_payment }}</td>
                                    <td>{{ $ffsTraining->district }}</td>
                                    <!-- <td>{{ $ffsTraining->ds_division_name }}</td>
                                    <td>{{ $ffsTraining->gn_division_name}}</td> -->
                                    <td>{{ $ffsTraining->as_center}}</td>
                                    <td class="button-container">
                                        <a href="{{ route('ffs-participants.create', $ffsTraining->id) }}" title="Add Participant">
                                            <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">Add Participants</button>
                                        </a>
                                        <a href="{{ route('ffs-participants.list', $ffsTraining->id) }}" title="View Participants">
                                            <button class="btn btn-success" style="height: 40px; width: 120px; font-size: 16px;">View Details</button>
                                        </a>
                                        <a href="/ffs-training/{{ $ffsTraining->id }}/edit" class="btn btn-danger edit-button" title="Edit">
                                            <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                        </a>
                                        <form action="/ffs-training/{{ $ffsTraining->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger custom-button" title="Delete">
                                                <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <!-- Pagination Links -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item {{ $ffsTrainings->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $ffsTrainings->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                @php
                                    $currentPage = $ffsTrainings->currentPage();
                                    $lastPage = $ffsTrainings->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp
                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $ffsTrainings->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif
                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $ffsTrainings->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $ffsTrainings->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif
                                <li class="page-item {{ $ffsTrainings->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $ffsTrainings->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

                        @php
                            $currentPage = $ffsTrainings->currentPage();
                            $perPage = $ffsTrainings->perPage();
                            $total = $ffsTrainings->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>

                        <!-- Delete Confirmation Script -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.querySelectorAll('.delete-btn').forEach(button => {
                                    button.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        if (confirm('Are you sure you want to delete this record?')) {
                                            const url = this.getAttribute('data-url');
                                            fetch(url, {
                                                method: 'DELETE',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    alert(data.success);
                                                    this.closest('tr').remove();
                                                } else {
                                                    alert('Error deleting record.');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                alert('An error occurred. Please try again.');
                                            });
                                        }
                                    });
                                });

                                @if(session('success'))
                                    alert('{{ session('success') }}');
                                @endif
                            });
                        </script>

                        <!-- Entries Per Page Script -->
                        <script>
                            $(document).ready(function() {
                                $('#entriesSelect').change(function() {
                                    var perPage = $(this).val();
                                    window.location = '{{ route('ffs-training.index') }}?entries=' + perPage;
                                });
                            });
                        </script>

                        <!-- Table Entries Info Script -->
                        <script>
                            function updateEntries() {
                                const entries = document.getElementById('entriesSelect').value;
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set('entries', entries);
                                window.location.search = urlParams.toString();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
