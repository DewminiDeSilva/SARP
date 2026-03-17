<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Livestock Training Participants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .table th, .table td { text-align: center; }
        .card-header { font-weight: bold; text-align: center; background-color: #c7eef1; color: #0d0e0d; }
        /* Pagination - same as beneficiary index and other modules */
        .pagination .page-item { margin: 0; }
        .pagination .page-link { padding: 5px 10px; }
        .page-item { background-color: white; padding: 0; }
        .pagination:hover { border-color: #fff; background-color: #fff; }
        .page-item:hover { border-color: #fff; background-color: #fff; cursor: pointer; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { z-index: 3; color: #fff; background-color: #126926; border-color: #126926; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; position: relative; overflow: hidden; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        .custom-frame { border: 2px solid rgba(0, 128, 0, 0.2); background-color: rgba(0, 128, 0, 0.2); padding: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 600px; }
        .section-header { background-color: #28a745; color: white; padding: 8px; margin-top: 20px; font-weight: bold; border-radius: 4px; }
        .thead-green th, .header-row { background-color: #28a745 !important; color: white !important; text-align: center; }
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
        <a href="{{ route('livestock-training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Livestock Training Program – Members</h2>
        </div>

        <div>
            <div class="my-4 custom-frame">
                <div class="row">
                    <div class="col-md-5"><strong>Program Name:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $livestockTraining->program_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Venue:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $livestockTraining->venue }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Date:</strong></div>
                    <div class="col-md-7"><p>{{ $livestockTraining->date }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Resource Person:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $livestockTraining->resource_person_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Province:</strong></div>
                    <div class="col-md-7"><p>{{ $livestockTraining->province_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>District:</strong></div>
                    <div class="col-md-7"><p>{{ $livestockTraining->district }}</p></div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
                        <div class="card-header">Total Participants</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalParticipants }}</h5>
                        </div>
                    </div>
                    <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
                        <div class="card-header">Male</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $maleCount ?? 0 }}</h5>
                        </div>
                    </div>
                    <div class="card text-center" style="width: 14rem; margin: 0 10px 10px 0;">
                        <div class="card-header">Female</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $femaleCount ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('livestock-training-participants.create', $livestockTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Participant</a>
                <a href="{{ route('livestock-training-participants.download_csv', $livestockTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ route('livestock-training-participants.upload_csv', $livestockTraining->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>
                <form method="GET" action="{{ route('livestock-training-participants.search', $livestockTraining->id) }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Participants" name="search" value="{{ $search ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-container">
                <table class="table table-bordered">
                    <thead class="thead-green">
                        <tr class="header-row">
                            <th style="color: white;">Name</th>
                            <th style="color: white;">NIC</th>
                            <th style="color: white;">Address/Institution</th>
                            <th style="color: white;">Contact Number</th>
                            <th style="color: white;">Gender</th>
                            <th style="color: white;">Designation</th>
                            <th style="color: white;">Age</th>
                            <th style="color: white;">Youth Status</th>
                            <th style="color: white;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->nic }}</td>
                                <td>{{ $participant->address_institution }}</td>
                                <td>{{ $participant->contact_number }}</td>
                                <td>{{ ucfirst($participant->gender) }}</td>
                                <td>{{ $participant->designation }}</td>
                                <td>{{ $participant->age }}</td>
                                <td>{{ $participant->youth }}</td>
                                <td>
                                    <form action="{{ route('livestock-training-participants.destroy', [$livestockTraining->id, $participant->id]) }}" method="POST" class="delete-participant-form" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @php
                $currentPage = $participants->currentPage();
                $lastPage = $participants->lastPage();
                $startPage = max($currentPage - 2, 1);
                $endPage = min($currentPage + 2, $lastPage);
                $perPage = $participants->perPage();
                $total = $participants->total();
                $startingNumber = ($currentPage - 1) * $perPage + 1;
                $endingNumber = min($total, $currentPage * $perPage);
            @endphp
            <nav aria-label="Page navigation" class="mt-3">
                <ul class="pagination justify-content-center flex-wrap">
                    <li class="page-item {{ $participants->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $participants->previousPageUrl() }}">Previous</a>
                    </li>
                    @if ($startPage > 1)
                        <li class="page-item"><a class="page-link" href="{{ $participants->url(1) }}">1</a></li>
                        @if ($startPage > 2)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                    @endif
                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $participants->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                        <li class="page-item"><a class="page-link" href="{{ $participants->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif
                    <li class="page-item {{ $participants->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $participants->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
            <p class="text-muted small mb-0 mt-2">Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.left-column');
    const content = document.querySelector('.right-column');
    const toggleButton = document.getElementById('sidebarToggle');
    if (toggleButton) toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
        content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
        content.style.padding = '20px';
    });
    document.querySelectorAll('.delete-participant-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this participant?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it'
                }).then(function(result) {
                    if (result.isConfirmed) form.submit();
                });
            } else {
                if (confirm('Are you sure you want to delete this participant?')) form.submit();
            }
        });
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
