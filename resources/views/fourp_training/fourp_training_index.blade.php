<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>4P Training Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .entries-container { display: flex; align-items: center; }
        .entries-container label { margin-bottom: 0; }
        .entries-container select { display: inline-block; width: auto; }
        .button-container { display: flex; gap: 10px; }
        .custom-button { background-color: #f5c6cb; color: red; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; padding: 10px; width: 60px; height: 40px; box-sizing: border-box; }
        .custom-button:hover { border-color: red; background-color: #f5c6cb; }
        .edit-button { background-color: #ffeeba; color: orange; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; width: 60px; height: 40px; box-sizing: border-box; }
        .edit-button:hover { border-color: orange; background-color: #ffeeba; }
        .view-button { background-color: #c3e6cb; color: green; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; width: 60px; height: 40px; box-sizing: border-box; }
        .view-button:hover { border-color: green; background-color: #c3e6cb; }
        .section-header { background-color: #28a745; color: white; padding: 8px; margin-top: 20px; font-weight: bold; border-radius: 4px; }
        .green-header { background-color: #28a745; color: white; padding: 10px; margin-bottom: 20px; font-weight: bold; border-radius: 5px; }
        .thead-green th { background-color: #28a745 !important; color: white !important; text-align: center; }
        .card-header { font-weight: bold; text-align: center; background-color: #c7eef1; color: #0d0e0d; }
        .pagination .page-item { margin: 0 2px; }
        .pagination .page-link { padding: 5px 10px; }
        .page-item { background-color: white; padding: 0px; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { z-index: 3; color: #fff; background-color: #126926; border-color: #126926; }
        .program-name { max-width: 300px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; position: relative; overflow: hidden; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; position: relative; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        #sidebarToggle:hover { background-color: #0a4818; }
        .left-column.hidden { display: none; }
        .right-column { transition: flex 0.3s ease, padding 0.3s ease; }
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
            <a href="{{ route('4p-training.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h1 style="font-size: 2.5rem; color: green;">4P Training Program Details</h1>
                </div>

                <div class="container">
                    <div class="row justify-content-center mt-4">
                        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                            <div class="card-header">Total Program Cost</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ number_format($totalProgramCost, 2) }}</h5>
                                <p class="card-text">Total value of all training program costs.</p>
                            </div>
                        </div>
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-header">Number of Programs</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $totalPrograms }}</h5>
                                <p class="card-text">Total number of 4P training programs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    @if(auth()->user()->hasPermission('fourp_training', 'add'))
                    <a href="{{ route('4p-training.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add 4P Training Program</a>
                    @endif
                    <a href="{{ route('4p-training.download.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    @if(auth()->user()->hasPermission('fourp_training', 'upload_csv'))
                    <form action="{{ route('4p-training.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>
                    @endif
                    <form method="GET" action="{{ route('4p-training.index') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->get('search') }}" required>
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
                            <option value="10" {{ $fourpTrainings->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $fourpTrainings->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $fourpTrainings->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $fourpTrainings->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <label for="entriesSelect">entries</label>
                    </div>
                </div>

                <div class="row table-container">
                    <div class="col">
                        <div class="table-responsive">
                        <table id="trainingTable" class="table table-bordered">
                            <thead class="thead-green">
                                <tr>
                                    <th class="program-name">Program</th>
                                    <th>Program Number</th>
                                    <th>Crop Name</th>
                                    <th class="program-name">Date</th>
                                    <th>Venue</th>
                                    <th>Program Cost</th>
                                    <th>ASC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fourpTrainings as $ft)
                                <tr>
                                    <td class="program-name">{{ $ft->program_name }}</td>
                                    <td>{{ $ft->program_number }}</td>
                                    <td>{{ $ft->crop_name }}</td>
                                    <td class="program-name">{{ $ft->date }}</td>
                                    <td>{{ $ft->venue }}</td>
                                    <td>{{ $ft->training_program_cost }}</td>
                                    <td>{{ $ft->as_center }}</td>
                                    <td class="button-container">
                                    @if(auth()->user()->hasPermission('fourp_training_participants', 'add'))
                                    <a href="{{ route('4p-training-participants.create', $ft->id) }}" title="Add Participant">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">Add Participants</button>
                                    </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('fourp_training_participants', 'view'))
                                    <a href="{{ route('4p-training-participants.list', $ft->id) }}" title="View Participants">
                                        <button class="btn btn-success" style="height: 40px; width: 120px; font-size: 16px;">View Details</button>
                                    </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('fourp_training', 'edit'))
                                        <a href="{{ route('4p-training.edit', $ft->id) }}" class="btn btn-danger edit-button" title="Edit">
                                            <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                        </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('fourp_training', 'delete'))
                                        <form action="{{ route('4p-training.destroy', $ft->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger custom-button" title="Delete">
                                                <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item {{ $fourpTrainings->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $fourpTrainings->previousPageUrl() }}">Previous</a>
                                </li>
                                @php $currentPage = $fourpTrainings->currentPage(); $lastPage = $fourpTrainings->lastPage(); $startPage = max($currentPage - 2, 1); $endPage = min($currentPage + 2, $lastPage); @endphp
                                @if ($startPage > 1)
                                    <li class="page-item"><a class="page-link" href="{{ $fourpTrainings->url(1) }}">1</a></li>
                                    @if ($startPage > 2)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                                @endif
                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $fourpTrainings->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                                    <li class="page-item"><a class="page-link" href="{{ $fourpTrainings->url($lastPage) }}">{{ $lastPage }}</a></li>
                                @endif
                                <li class="page-item {{ $fourpTrainings->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $fourpTrainings->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

                        @php
                            $currentPage = $fourpTrainings->currentPage();
                            $perPage = $fourpTrainings->perPage();
                            $total = $fourpTrainings->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#entriesSelect').change(function() {
                var perPage = $(this).val();
                window.location = '{{ route('4p-training.index') }}?entries=' + perPage + (window.location.search.indexOf('search=') !== -1 ? '&' + window.location.search.slice(1) : '');
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');
        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            content.style.padding = '20px';
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 2500,
            showConfirmButton: false
        });
    </script>
    @endif
</body>
</html>
