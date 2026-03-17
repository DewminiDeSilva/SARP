<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View 4P Training Participants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .table th, .table td { text-align: center; }
        .card-header { font-weight: bold; text-align: center; background-color: #c7eef1; color: #0d0e0d; }
        .pagination .page-link { padding: 5px 10px; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { z-index: 3; color: #fff; background-color: #126926; border-color: #126926; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; position: relative; overflow: hidden; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        .custom-frame { border: 2px solid rgba(0, 128, 0, 0.2); background-color: rgba(0, 128, 0, 0.2); padding: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 600px; }
        .section-header { background-color: #28a745; color: white; padding: 8px; margin-top: 20px; font-weight: bold; border-radius: 4px; }
        .green-header { background-color: #28a745; color: white; padding: 10px; margin-bottom: 20px; font-weight: bold; border-radius: 5px; }
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
        <a href="{{ route('4p-training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">4P Training Program Details</h2>
        </div>

        <div>
            <div class="my-4 custom-frame">
                <div class="row">
                    <div class="col-md-5"><strong>Program Name:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $fourpTraining->program_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Venue:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $fourpTraining->venue }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Date:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->date }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Resource Person:</strong></div>
                    <div class="col-md-7"><p style="word-wrap: break-word; max-width: 300px;">{{ $fourpTraining->resource_person_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Training Program Cost:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->training_program_cost }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Resource Person Payment:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->resource_person_payment }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>Province:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->province_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>District:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->district }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>DS Division:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->ds_division_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>GN Division:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->gn_division_name }}</p></div>
                </div>
                <div class="row">
                    <div class="col-md-5"><strong>ASC Center:</strong></div>
                    <div class="col-md-7"><p>{{ $fourpTraining->as_center }}</p></div>
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
                @if(auth()->user()->hasPermission('fourp_training_participants', 'add'))
                <a href="{{ route('4p-training-participants.create', $fourpTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Participant</a>
                @endif
                <a href="{{ route('4p-training-participants.download_csv', $fourpTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                @if(auth()->user()->hasPermission('fourp_training_participants', 'upload_csv'))
                <form action="{{ route('4p-training-participants.upload_csv', $fourpTraining->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>
                @endif
                <form method="GET" action="{{ route('4p-training-participants.search', $fourpTraining->id) }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Participants" name="search">
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
                                    @if(auth()->user()->hasPermission('fourp_training_participants', 'delete'))
                                    <form action="{{ route('4p-training-participants.destroy', [$fourpTraining->id, $participant->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this participant?')">Delete</button>
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
                    <li class="page-item {{ $participants->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $participants->previousPageUrl() }}">Previous</a>
                    </li>
                    @php $currentPage = $participants->currentPage(); $lastPage = $participants->lastPage(); $startPage = max($currentPage - 2, 1); $endPage = min($currentPage + 2, $lastPage); @endphp
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

            @php
                $currentPage = $participants->currentPage();
                $perPage = $participants->perPage();
                $total = $participants->total();
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
