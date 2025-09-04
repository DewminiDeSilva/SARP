<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Forest - Index</title>

    <!-- Bootstrap CSS/JS (same as beneficiary index) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .frame { display:flex; flex-direction:row; justify-content:space-between; width:100%; }
        .right-column { flex:0 0 80%; padding:20px; }
        .left-column { flex:0 0 20%; border-right:1px solid #dee2e6; }

        .pagination .page-item { margin:0 0px; }
        .pagination .page-link { padding:5px 10px; }
        .page-item { background-color:#fff; padding:0; }
        .pagination:hover { border-color:#fff; background-color:#fff; }
        .page-item:hover { border-color:#fff; background-color:#fff; cursor:pointer; }
        .page-link { color:#28a745; }
        .page-item.active .page-link { color:#fff; background-color:#126926; border-color:#126926; }

        .submitbtton{ color:#fff; background-color:#198754; border-color:#198754; }
        .submitbtton:active, .submitbtton:hover { background-color:#145c32; border-color:#145c32; color:#fff; }

        .buttonline { white-space:nowrap; }
        .button-a { margin-right:10px; }
        .button-group { white-space:nowrap; }
        .button-group a, .button-group form { display:inline-block; margin-right:10px; }
        .button-group form button { margin-right:0; }

        .btn-back { display:inline-flex; align-items:center; justify-content:center; color:#fff; border:none; padding:10px 50px; border-radius:4px; text-decoration:none; font-size:14px; transition:.3s; cursor:pointer; position:relative; overflow:hidden; }
        .btn-back img { width:45px; margin-right:5px; transition:.3s; position:relative; z-index:1; }
        .btn-back .btn-text { opacity:0; visibility:hidden; position:absolute; right:25px; background:#1e8e1e; color:#fff; padding:4px 8px; border-radius:4px; transition:.3s; z-index:0; }
        .btn-back:hover .btn-text { opacity:1; visibility:visible; transform:translateX(-5px); padding:10px 20px; border-radius:20px; }
        .btn-back:hover img { transform:translateX(-50px); }
        .card-header { font-weight:bold; text-align:center; background-color:#c7eef1; color:#0d0e0d; }

        .entries-container { display:flex; align-items:center; gap:.5rem; }
        .form-select { width:auto; }

        .sidebar { transition: transform .3s ease; }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle { background:#126926; color:#fff; border:none; padding:10px; border-radius:5px; cursor:pointer; }
        #sidebarToggle:hover { background:#0a4818; }
        .left-column.hidden { display:none; }
        .right-column { transition:flex .3s ease, padding .3s ease; }
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
            <!-- Sidebar Toggle Button -->
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

           
            <a href="{{ url()->previous() }}" class="btn-back ms-2">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


        <div class="container-fluid">
            <div class="center-heading" style="text-align: center;">
                <h1>Agro Forest Details</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <!-- Entries per page -->
            <div class="entries-container my-3">
                <label for="entriesSelect">Show</label>
                <select id="entriesSelect" class="form-select form-select-sm mx-2">
                    <option value="10"  {{ ($agroForests->perPage() ?? 10) == 10 ? 'selected' : '' }}>10</option>
                    <option value="25"  {{ ($agroForests->perPage() ?? 10) == 25 ? 'selected' : '' }}>25</option>
                    <option value="50"  {{ ($agroForests->perPage() ?? 10) == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ ($agroForests->perPage() ?? 10) == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span>entries</span>
            </div>
 <a href="{{ route('agro-forest.create') }}" class="btn submitbtton ms-2">+ Add New</a>
            <!-- Table -->
            <div class="row table-container">
                <div class="col">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Beat Name</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>GN Division</th>
                                <!-- <th>Tank</th> -->
                            
                                <th>No of plants</th>
                                <!-- <th>Longitude</th>
                                <th>Latitude</th> -->
                                <th>Establish Amount</th>
                                <th>Project Proposal (PDF)</th>
                                <th>Actions</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($agroForests as $i => $row)
                            @php
                                // Build proposal URL if file was uploaded (stored on 'public' disk)
                                $proposalUrl = $row->project_proposal_path
                                    ? asset('storage/' . $row->project_proposal_path)
                                    : null;

                                // Sum plants from related species (controller eager-loads 'species')
                                $plantsTotal = optional($row->species)->sum('no_of_plants');
                            @endphp
                            <tr>
                                <!-- <td>{{ $agroForests->firstItem() + $i }}</td> -->
                                 <td>{{ $row->replanting_forest_beat_name }}</td>
                                <td>{{ $row->province_name }}</td>
                                <td>{{ $row->district }}</td>
                                <td>{{ $row->gn_division_name ?? $row->gn_division }}</td>
                                <!-- <td>{{ $row->tank_name ?? $row->tank_name_1 }}</td> -->
                                
                              <td>{{ $row->total_plants ? number_format($row->total_plants) : '—' }}</td>
                                <!-- <td>{{ $row->gps_longitude }}</td>
                                <td>{{ $row->gps_latitude }}</td> -->
                                <td>{{ $row->establish_cost }}</td>
                                  <td>
                                    @if($proposalUrl)
                                        <div class="d-flex flex-wrap gap-1">
                                            <a href="{{ $proposalUrl }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-file-pdf me-1"></i> View
                                            </a>
                                            <!-- <a href="{{ $proposalUrl }}" download class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-download me-1"></i> Download
                                            </a> -->
                                        </div>
                                    @else
                                        <span class="text-muted">No file</span>
                                    @endif
                                </td>
                                <td class="buttonline">
                                    <a href="{{ route('agro-forest.show', $row->id) }}" class="btn btn-info btn-sm">View</a>
                                </td>
                                <td class="button-group">
                                    <a href="{{ route('agro-forest.edit', $row->id) }}" class="btn btn-primary btn-sm"
                                       style="background-color: green;border: 2px solid green;">
                                        <img src="{{ asset('assets/images/edit4.png') }}" alt="Edit" style="width: 20px; height: 20px;">
                                    </a>

                                    <form action="{{ route('agro-forest.destroy', $row->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <img src="{{ asset('assets/images/delete1.png') }}" alt="Delete" style="width: 20px; height: 20px;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-muted">No records found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @php
                $currentPage = $agroForests->currentPage();
                $lastPage    = $agroForests->lastPage();
                $startPage   = max($currentPage - 2, 1);
                $endPage     = min($currentPage + 2, $lastPage);

                $startingNumber = $agroForests->firstItem() ?? 0;
                $endingNumber   = $agroForests->lastItem() ?? 0;
                $total          = $agroForests->total();
            @endphp

            <nav aria-label="Agro pagination">
                <ul class="pagination">
                    <li class="page-item {{ $agroForests->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $agroForests->previousPageUrl() }}">Previous</a>
                    </li>

                    @if ($startPage > 1)
                        <li class="page-item"><a class="page-link" href="{{ $agroForests->url(1) }}">1</a></li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $agroForests->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $agroForests->url($lastPage) }}">{{ $lastPage }}</a></li>
                    @endif

                    <li class="page-item {{ $agroForests->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $agroForests->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div id="tableInfo" class="text-right">
                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS (same pattern as beneficiary index) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // entries per page
    document.getElementById('entriesSelect').addEventListener('change', function () {
        const perPage  = this.value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', perPage);
        window.location.search = urlParams.toString();
    });

    // sidebar collapse like beneficiary page
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('hidden');
                if (sidebar.classList.contains('hidden')) {
                    content.style.flex = '0 0 100%';
                    content.style.padding = '20px';
                } else {
                    content.style.flex = '0 0 80%';
                    content.style.padding = '20px';
                }
            });
        }
    });
</script>
</body>
</html>
