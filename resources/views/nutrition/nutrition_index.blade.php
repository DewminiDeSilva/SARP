<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nutrition Program List</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Custom Styles -->
    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .btn-custom {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-custom:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }

        .table-container {
            overflow-x: auto;
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
        gap: 10px; /* Adjust the gap between buttons as needed */
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
    </style>

    <style>

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

        <div class="">
            <h2 style="color: green; font-weight: bold; text-align: center;">Nutrition Program List</h2>

            <!-- Add New Program Button -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('nutrition.create') }}" class="btn btn-custom" style="background-color: green; border-color: green;">Add New Program</a>
                <a href="{{ route('downloadnutrition.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>

            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form for Nutrition -->
                    <form action="{{ route('nutrition.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>

                    <!-- Search form for Nutrition -->
                    <form method="GET" action="{{ route('nutrition.search') }}" class="form-inline">
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
                        <!-- Dynamically handle selected per-page option -->
                        <option value="10" {{ $nutritionPrograms->perPage() == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $nutritionPrograms->perPage() == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $nutritionPrograms->perPage() == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $nutritionPrograms->perPage() == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>
                        </div>

            <!-- Table for displaying Nutrition Program records -->
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Program Type</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Program Conductor</th>
                            <th>Cost</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>DS Division</th>
                            <th>GN Division</th>
                            <th>ASC</th>
                            <th>Cascade Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nutritionPrograms as $program)
                            <tr>
                                <td>{{ $program->program_type }}</td>
                                <td>{{ $program->date }}</td>
                                <td>{{ $program->location }}</td>
                                <td>{{ $program->program_conductor }}</td>
                                <td>{{ number_format($program->cost_of_training_program, 2) }}</td>
                                <td>{{ $program->province_name }}</td>
                                <td>{{ $program->district_name }}</td>
                                <td>{{ $program->ds_division_name }}</td>
                                <td>{{ $program->gn_division_name }}</td>
                                <td>{{ $program->asc_name }}</td>
                                <td>{{ $program->cascade_name }}</td>
                                <td>{{ $program->description }}</td>

                                <td  class="button-container">

                                <a href="{{ route('nutrition.show', $program->id) }}">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">View participants</button>
                                    </a>

                                    <!-- Add Trainee Button -->
                                    <a href="{{ route('nutrition_trainee.create', ['nutrition_id' => $program->id]) }}">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">Add Participants</button>
                                    </a>

                                    <a href="{{ route('nutrition.edit', $program->id) }}"  class="btn btn-danger edit-button" title="Edit">
                                        <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                    </a>

                                    <form action="{{ route('nutrition.destroy', $program->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger custom-button" onclick="return confirm('Are you sure you want to delete this record?');">
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
        <li class="page-item {{ $nutritionPrograms->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $nutritionPrograms->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>

        @php
            $currentPage = $nutritionPrograms->currentPage();
            $lastPage = $nutritionPrograms->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
        @endphp

        @if ($startPage > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $nutritionPrograms->url(1) }}">1</a>
            </li>
            @if ($startPage > 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = $startPage; $i <= $endPage; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $nutritionPrograms->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $nutritionPrograms->url($lastPage) }}">{{ $lastPage }}</a>
            </li>
        @endif

        <li class="page-item {{ $nutritionPrograms->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $nutritionPrograms->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>

@php
    $currentPage = $nutritionPrograms->currentPage();
    $perPage = $nutritionPrograms->perPage();
    $total = $nutritionPrograms->total();
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
<script>
    document.getElementById('entriesSelect').addEventListener('change', function() {
        let entries = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('entries', entries);
        window.location.href = url.href;
    });
</script>

</body>
</html>
