<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youth Training Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* EOI-style CSS structure (same as youth/EOI module) */
        :root { --ytoa-primary: #126926; --ytoa-primary-dark: #0d4d1f; --ytoa-border: #e2e8f0; --ytoa-text: #1e293b; }
        body { background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
        .frame { display: flex; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid var(--ytoa-border); background: #fafbfa; }
        .left-column.hidden { display: none; }
        .right-column { flex: 0 0 80%; padding: 24px; transition: flex 0.3s ease; }
        .ytoa-frame-wrap { max-width: 100%; margin: 0 auto; padding: 20px; background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 16px; }
        .ytoa-center-heading { text-align: center; font-size: 1.75rem; font-weight: 700; color: var(--ytoa-primary); margin-bottom: 1.5rem; }
        .entries-container { display: flex; align-items: center; }
        .entries-container label { margin-bottom: 0; }
        .entries-container select { display: inline-block; width: auto; }
        .custom-button { background-color: #f5c6cb; color: red; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; padding: 10px; width: 60px; height: 40px; box-sizing: border-box; border-radius: 8px; }
        .custom-button:hover { border-color: red; }
        .edit-button { background-color: #ffeeba; color: orange; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; width: 60px; height: 40px; box-sizing: border-box; border-radius: 8px; }
        .edit-button:hover { border-color: orange; }
        .view-button { background-color: #c3e6cb; color: green; border: 2px solid transparent; display: flex; align-items: center; justify-content: center; width: 60px; height: 40px; box-sizing: border-box; border-radius: 8px; }
        .view-button:hover { border-color: green; }
        .green-header { background: linear-gradient(180deg, var(--ytoa-primary) 0%, var(--ytoa-primary-dark) 100%); color: white; padding: 10px; margin-bottom: 20px; font-weight: bold; border-radius: 10px; }
        .thead-green th { background: linear-gradient(180deg, var(--ytoa-primary) 0%, var(--ytoa-primary-dark) 100%) !important; color: white !important; text-align: center; }
        .card-header { font-weight: bold; text-align: center; background: rgba(18,105,38,0.12); color: var(--ytoa-text); border-radius: 10px 10px 0 0; }
        .pagination .page-item { margin: 0 2px; }
        .pagination .page-link { padding: 5px 10px; }
        .page-link { color: var(--ytoa-primary); }
        .page-item.active .page-link { z-index: 3; color: #fff; background-color: var(--ytoa-primary); border-color: var(--ytoa-primary); }
        .program-name { max-width: 300px; }
        .table th, .table td { border: 1px solid var(--ytoa-border); padding: 8px; text-align: left; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; background: var(--ytoa-primary); }
        .btn-back:hover { background: var(--ytoa-primary-dark); color: #fff; }
        #sidebarToggle { background: var(--ytoa-primary); color: white; border: none; padding: 10px; border-radius: 8px; cursor: pointer; }
        #sidebarToggle:hover { background: var(--ytoa-primary-dark); }
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
        <div class="d-flex align-items-center mb-3 gap-2">
            <button id="sidebarToggle" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-training.index') }}" class="btn-back"><i class="fas fa-arrow-left me-2"></i>Back</a>
        </div>

        <div class="ytoa-frame-wrap">
            <div class="container-fluid">
                <div class="ytoa-center-heading">
                    <h1>Youth Training Program Details</h1>
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
                                <p class="card-text">Total number of youth training programs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    @if(auth()->user()->hasPermission('youth_training', 'add'))
                    <a href="{{ route('youth-training.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Youth Training Program</a>
                    @endif
                    <a href="{{ route('youth-training.download.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    @if(auth()->user()->hasPermission('youth_training', 'upload_csv'))
                    <form action="{{ route('youth-training.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>
                    @endif
                    <form method="GET" action="{{ route('youth-training.index') }}" class="form-inline">
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
                            <option value="10" {{ $youthTrainings->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $youthTrainings->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $youthTrainings->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $youthTrainings->perPage() == 100 ? 'selected' : '' }}>100</option>
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
                                @foreach ($youthTrainings as $yt)
                                <tr>
                                    <td class="program-name">{{ $yt->program_name }}</td>
                                    <td>{{ $yt->program_number }}</td>
                                    <td>{{ $yt->crop_name }}</td>
                                    <td class="program-name">{{ $yt->date }}</td>
                                    <td>{{ $yt->venue }}</td>
                                    <td>{{ $yt->training_program_cost }}</td>
                                    <td>{{ $yt->as_center }}</td>
                                    <td class="button-container">
                                    @if(auth()->user()->hasPermission('youth_training_participants', 'add'))
                                    <a href="{{ route('youth-training-participants.create', $yt->id) }}" title="Add Participant">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">Add Participants</button>
                                    </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('youth_training_participants', 'view'))
                                    <a href="{{ route('youth-training-participants.list', $yt->id) }}" title="View Participants">
                                        <button class="btn btn-success" style="height: 40px; width: 120px; font-size: 16px;">View Details</button>
                                    </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('youth_training', 'edit'))
                                        <a href="{{ route('youth-training.edit', $yt->id) }}" class="btn btn-danger edit-button" title="Edit">
                                            <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                        </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('youth_training', 'delete'))
                                        <form action="{{ route('youth-training.destroy', $yt->id) }}" method="POST">
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
                                <li class="page-item {{ $youthTrainings->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $youthTrainings->previousPageUrl() }}">Previous</a>
                                </li>
                                @php $currentPage = $youthTrainings->currentPage(); $lastPage = $youthTrainings->lastPage(); $startPage = max($currentPage - 2, 1); $endPage = min($currentPage + 2, $lastPage); @endphp
                                @if ($startPage > 1)
                                    <li class="page-item"><a class="page-link" href="{{ $youthTrainings->url(1) }}">1</a></li>
                                    @if ($startPage > 2)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                                @endif
                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $youthTrainings->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                                    <li class="page-item"><a class="page-link" href="{{ $youthTrainings->url($lastPage) }}">{{ $lastPage }}</a></li>
                                @endif
                                <li class="page-item {{ $youthTrainings->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $youthTrainings->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

                        @php
                            $currentPage = $youthTrainings->currentPage();
                            $perPage = $youthTrainings->perPage();
                            $total = $youthTrainings->total();
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
                window.location = '{{ route('youth-training.index') }}?entries=' + perPage + (window.location.search.indexOf('search=') !== -1 ? '&' + window.location.search.slice(1) : '');
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
