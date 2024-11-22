<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Root Variables for consistent colors and values */
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
        :root {
            --primary-green: #28a745;
            --primary-blue: #007bff;
            --border-color: #dee2e6;
            --card-border: #e0e0e0;
            --text-dark: #333;
            --text-muted: #666;
            --card-bg: #ffffff;
            --card-header-bg: rgb(204, 241, 241);
            --shadow-color: rgba(0, 0, 0, 0.05);
        }

        /* Layout Styles */
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid var(--border-color);
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        .container {
            flex: 0 0 80%;
            padding: 20px;
        }

        /* Heading Styles */
        h2 {
            color: var(--primary-green);
            margin-bottom: 20px;
            text-align: center;
        }

        /* Table Styles */
        .table-responsive {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 0.75rem;
        }

        .table-bordered {
            border: 1px solid var(--border-color);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Button Styles */
        .btn-sm {
            margin: 2px;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .btn-green {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-green:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: white;
        }

        .btn-blue {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-blue:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: white;
        }

        /* Summary Cards Section */
        .card-summary {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            padding: 10px;
        }

        .card-summary .card {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px var(--shadow-color);
            transition: transform 0.3s ease;
        }

        .card-summary .card:hover {
            transform: translateY(-5px);
        }

        .card-summary .card .card-header {
            background-color: var(--card-header-bg);
            padding: 15px;
            text-align: center;
            font-weight: 600;
            color: var(--text-dark);
            border-bottom: 1px solid var(--card-border);
        }

        .card-summary .card .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-summary .card h3 {
            font-size: 32px;
            margin: 10px 0;
            color: var(--text-dark);
            font-weight: bold;
        }

        .card-summary .card p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .frame {
                flex-direction: column;
            }

            .left-column,
            .right-column {
                flex: 0 0 100%;
            }

            .card-summary {
                flex-direction: column;
                gap: 15px;
            }

            .card-summary .card {
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
            }

        }

        /* Inline button container */
.btninline {
    display: inline-flex;
    gap: 5px; /* Add some space between buttons if needed */
}
    </style>
</head>
<body>
    <div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC')
        </div>

        <div class="right-column">

        <div class="col-md-12 text-center">
        <h2 class="header-title" style="color: green;">Beneficiary List</h2>
        </div>

            <div class="card-summary">
                <div class="card">
                    <div class="card-header">Livestock Statistics</div>
                    <div class="card-body">
                        <h3>{{ $totalLivestocks }}</h3>
                        <p>Total Livestocks Registered</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Beneficiary Statistics</div>
                    <div class="card-body">
                        <h3>{{ $totalBeneficiaries }}</h3>
                        <p>Total Beneficiaries Doing Livestocks</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Division Statistics</div>
                    <div class="card-body">
                        <h3>{{ $totalGnDivisions }}</h3>
                        <p>Total GN Divisions Involved</p>
                    </div>
                </div>
            </div>
            <form method="GET" action="{{ route('beneficiary.searchLivestock') }}" class="form-inline">
    <div class="input-group">
        <input 
            type="text" 
            class="form-control" 
            name="search" 
            placeholder="Search Beneficiaries" 
            value="{{ request('search') }}" 
        >
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </div>
    </div>
</form>




            <div class="row table-container">
                <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NIC</th>
                                <th scope="col">Name with Initials</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Phone</th>
                                <th scope="col">GN Division</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiaries as $beneficiary)
                            <tr>
                                <td>{{ $beneficiary->nic }}</td>
                                <td>{{ $beneficiary->name_with_initials }}</td>
                                <td>{{ $beneficiary->address }}</td>
                                <td>{{ $beneficiary->dob }}</td>
                                <td>{{ $beneficiary->gender }}</td>
                                <td>{{ $beneficiary->age }}</td>
                                <td>{{ $beneficiary->phone }}</td>
                                <td>{{ $beneficiary->gn_division_name }}</td>
                                <td class="btninline">
                                    @if($beneficiary->id)
                                        <a href="{{ route('livestocks.create', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-green btn-sm">Add Livestock</a>
                                        <a href="{{ route('livestocks.list', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-blue btn-sm">View Livestock</a>
                                    @else
                                        <span class="text-muted">No ID available</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Section -->
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

@php
                            $currentPage = $beneficiaries->currentPage();
                            $perPage = $beneficiaries->perPage();
                            $total = $beneficiaries->total();
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
        </div>
    </div>
</body>
</html>
