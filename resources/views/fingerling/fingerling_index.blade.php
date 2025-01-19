<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fingerling Details</title>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
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
    }
    .btn-back:hover .btn-text {
        opacity: 1;
        visibility: visible;
        transform: translateX(-5px);
    }
    .btn-back:hover img {
        transform: translateX(-50px);
    }
    .pagination .page-item {
        margin: 0 0px;
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
        color : #28a745;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #126926;
        border-color: #126926;
    }
</style>
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
    </div>
    <div class="right-column">
        <a href="{{ route('fingerling.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Fingerling Tank Details</h1>
            </div>

            <form method="GET" action="{{ route('fingerling.searchFingerling') }}" class="form-inline">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="Search Tanks"
                        value="{{ request('search') }}"
                    >
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
                </div>
            </form>

            <div class="row table-container mt-4">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Tank ID</th>
                                <th>Tank Name</th>
                                <th>DS Division</th>
                                <th>GN Division</th>
                                <th>AS Centre</th>
                                <th>River Basin</th>
                                <th>Cascade Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanks as $tank)
                            <tr>
                                <!-- Show Earlier Tank ID -->
                                <td>{{ $tank->tank_id }}</td> <!-- Shows 19/11/T/W/11 -->

                                <td>{{ $tank->tank_name }}</td>
                                <td>{{ $tank->ds_division_name }}</td>
                                <td>{{ $tank->gn_division_name }}</td>
                                <td>{{ $tank->as_centre }}</td>
                                <td>{{ $tank->river_basin }}</td>
                                <td>{{ $tank->cascade_name }}</td>
                                <td class="buttonline">
                                    <!-- View Data Button -->
                                    <a href="{{ route('fingerling.show', ['tank_id' => $tank->id]) }}" class="btn btn-info btn-sm">View Data</a>

                                    <!-- Add Data Button -->
                                    <a href="{{ route('fingerling.create', $tank->id) }}" class="btn btn-primary btn-sm button-a">Add Data</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $tanks->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $tanks->previousPageUrl() }}">Previous</a>
                            </li>
                            @php
                                $currentPage = $tanks->currentPage();
                                $lastPage = $tanks->lastPage();
                                $startPage = max($currentPage - 2, 1);
                                $endPage = min($currentPage + 2, $lastPage);
                            @endphp
                            @if ($startPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tanks->url(1) }}">1</a>
                                </li>
                                @if ($startPage > 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                            @endif
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tanks->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ($endPage < $lastPage)
                                @if ($endPage < $lastPage - 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tanks->url($lastPage) }}">{{ $lastPage }}</a>
                                </li>
                            @endif
                            <li class="page-item {{ $tanks->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $tanks->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>

                    @php
                        $currentPage = $tanks->currentPage();
                        $perPage = $tanks->perPage();
                        $total = $tanks->total();
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
