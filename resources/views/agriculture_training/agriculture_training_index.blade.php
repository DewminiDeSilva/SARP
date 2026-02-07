<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Training Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .entries-container { display: flex; align-items: center; }
        .entries-container label { margin-bottom: 0; }
        .button-container { display: flex; gap: 10px; flex-wrap: wrap; }
        .custom-button { background-color: #f5c6cb; color: red; border: 2px solid transparent; width: 60px; height: 40px; display: flex; align-items: center; justify-content: center; }
        .edit-button { background-color: #ffeeba; color: orange; width: 60px; height: 40px; display: flex; align-items: center; justify-content: center; }
        .card-header { font-weight: bold; text-align: center; background-color: #c7eef1; color: #0d0e0d; }
        .program-name { max-width: 200px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
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
        .page-link { color: #28a745; }
        .page-item.active .page-link { color: #fff; background-color: #126926; border-color: #126926; }
        .sidebar { transition: transform 0.3s ease; }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        .left-column.hidden { display: none; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 50px; border-radius: 4px; text-decoration: none; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
    </style>
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('agriculture-training.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>
        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Agriculture Training Program Details</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                        <div class="card-header">Total Program Cost</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ number_format($totalProgramCost ?? 0, 2) }}</h5>
                            <p class="card-text">Total value of all agriculture training program costs.</p>
                        </div>
                    </div>
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-header">Number of Programs</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $trainings->total() }}</h5>
                            <p class="card-text">Total number of agriculture training programs.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('agriculture-training.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Agriculture Training Program</a>
                <a href="{{ route('agriculture-training.downloadCsv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ route('agriculture-training.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" accept=".csv,.txt,.xlsx,.xls" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV / Excel</button>
                </form>
                <form method="GET" action="{{ route('agriculture-training.search') }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ $search ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            @if(session('success'))
                <script>document.addEventListener('DOMContentLoaded', function() { alert('{{ session('success') }}'); });</script>
            @endif
            @if(session('error'))
                <script>document.addEventListener('DOMContentLoaded', function() { alert('{{ session('error') }}'); });</script>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="entries-container">
                    <label for="entriesSelect">Show</label>
                    <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                        <option value="10" {{ ($trainings->perPage() ?? 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ ($trainings->perPage() ?? 10) == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ ($trainings->perPage() ?? 10) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ ($trainings->perPage() ?? 10) == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>
            </div>
            <div class="row table-container">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <!-- <th>Agriculture ID</th> -->
                                    <th class="program-name">Program</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Resource Person</th>
                                    <th>Program Cost</th>
                                    <th>Resource Person Payment</th>
                                    <th>District</th>
                                    <th>DSD</th>
                                    <th>GND</th>
                                    <th>ASC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainings as $training)
                                <tr>
                                    <!-- <td>{{ $training->agriculture_data_id }}</td> -->
                                    <td class="program-name">{{ $training->program_name }}</td>
                                    <td>{{ $training->date }}</td>
                                    <td>{{ $training->venue }}</td>
                                    <td>{{ $training->resource_person_name }}</td>
                                    <td>{{ $training->training_program_cost }}</td>
                                    <td>{{ $training->resource_person_payment }}</td>
                                    <td>{{ $training->district }}</td>
                                    <td>{{ $training->ds_division_name }}</td>
                                    <td>{{ $training->gn_division_name }}</td>
                                    <td>{{ $training->as_center }}</td>
                                    <td class="button-container">
                                        <a href="{{ route('agriculture-training.edit', $training) }}" class="btn edit-button" title="Edit">
                                            <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit" style="width: 16px; height: 16px;">
                                        </a>
                                        <form action="{{ route('agriculture-training.destroy', $training) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn custom-button" title="Delete" onclick="return confirm('Are you sure?');">
                                                <img src="{{ asset('assets/images/delete.png') }}" alt="Delete" style="width: 16px; height: 16px;">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(isset($trainings) && method_exists($trainings, 'links'))
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item {{ $trainings->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $trainings->previousPageUrl() }}">Previous</a>
                            </li>
                            <li class="page-item active">
                                <span class="page-link">{{ $trainings->currentPage() }}</span>
                            </li>
                            <li class="page-item {{ $trainings->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $trainings->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                    @endif
                    @php
                        if (isset($trainings) && method_exists($trainings, 'total')) {
                            $currentPage = $trainings->currentPage();
                            $perPage = $trainings->perPage();
                            $total = $trainings->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        } else {
                            $startingNumber = $endingNumber = $total = 0;
                        }
                    @endphp
                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#entriesSelect').change(function() {
        var perPage = $(this).val();
        window.location = '{{ route('agriculture-training.index') }}?entries=' + perPage;
    });
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.querySelector('.left-column').classList.toggle('hidden');
    });
});
</script>
</body>
</html>
