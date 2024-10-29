<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Dashboard</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            border-right: 1px solid #dee2e6;
        }
        .pagination .page-item {
            margin: 0;
        }
        .pagination .page-link {
            padding: 5px 10px;
            color: #28a745;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }
        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }
        .buttonline {
            white-space: nowrap;
        }
        .button-group a, .button-group form {
            display: inline-block;
            margin-right: 10px;
        }
        .card-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card-summary .card {
            flex: 1;
            margin: 0 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-summary .card h3 {
            margin: 0;
            font-size: 24px;
        }
        .card-summary .card p {
            margin: 0;
            font-size: 16px;
            color: #6c757d;
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
        <div class="container-fluid">
            <div class="center-heading" style="text-align: center;">
                <h1>Agriculture</h1>
            </div>

            <!-- Search form -->
            <form method="GET" action="{{ route('agriculture.search') }}" class="form-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <!-- Success Message Popup -->
            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        alert('{{ session('success') }}');
                    });
                </script>
            @endif

            <!-- Entries Selector and Summary Cards -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="entries-container">
                    <label for="entriesSelect">Show</label>
                    <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2" onchange="updateEntries()">
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>
                <div id="tableInfo" class="text-right"></div>
            </div>

            <div class="card-summary">
                <div class="card">
                    <h3>{{ $totalCrops }}</h3>
                    <p>Total Crops Registered</p>
                </div>
                <div class="card">
                    <h3>{{ $totalBeneficiaries }}</h3>
                    <p>Total Beneficiaries Doing Crops</p>
                </div>
                <div class="card">
                    <h3>{{ $totalGnDivisions }}</h3>
                    <p>Total GN Divisions Involved</p>
                </div>
            </div>

            <!-- Beneficiaries Table -->
            <div class="row table-container">
                <div class="col">
                    <table id="beneficiariesTable" class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">NIC</th>
                                <th scope="col">Beneficiary Name With Initials</th>
                                <th scope="col">GN Division</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiaries as $beneficiary)
                                <tr>
                                    <td>{{ $beneficiary->nic }}</td>
                                    <td>{{ $beneficiary->name_with_initials }}</td>
                                    <td>{{ $beneficiary->gn_division_name }}</td>
                                    <td class="buttonline">
                                        <div class="button-group">
                                            <a href="{{ route('agriculture.showByBeneficiary', $beneficiary->id) }}" class="btn btn-info btn-sm">View Details</a>
                                            <a href="{{ route('agriculture.create', ['beneficiaryId' => $beneficiary->id]) }}" class="btn btn-info btn-sm">Add Agriculture Data</a>
                                            <a href="{{ route('crops.by.gn.division', ['gn_division_id' => $beneficiary->gn_division_name]) }}" class="btn btn-info btn-sm">View Crops</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Section for Beneficiaries -->
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
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const url = new URL(window.location.href);
        url.searchParams.set('entries', entries);
        window.location.href = url.href;
    }

    $(document).ready(function() {
        $('#beneficiariesTable').DataTable({
            "paging": false,
            "searching": false,
            "info": false
        });

        const entriesSelect = document.getElementById('entriesSelect');
        const tableInfo = document.getElementById('tableInfo');

        entriesSelect.addEventListener('change', function() {
            updateEntries();
        });

        const pageInfo = $('#beneficiariesTable').DataTable().page.info();
        tableInfo.innerHTML = `Showing ${pageInfo.start + 1} to ${pageInfo.end} of ${pageInfo.recordsTotal} entries`;
    });
</script>
</body>
</html>
