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
    /* Include provided CSS */
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
</style>
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC') <!-- Include dashboard content if necessary -->
    </div>
    <div class="right-column">
        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Fingerling Tank Details</h1>
            </div>

            <div class="row table-container mt-4">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Tank ID</th>
                                <th>Tank Name</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>DS Division</th>
                                <th>GN Division</th>
                                <th>AS Centre</th>
                                <th>River Basin</th>
                                <th>Cascade Name</th>
                                <th>No. of Families</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanks as $tank)
                            <tr>
                                <td>{{ $tank->tank_id }}</td>
                                <td>{{ $tank->tank_name }}</td>
                                <td>{{ $tank->province_name }}</td>
                                <td>{{ $tank->district }}</td>
                                <td>{{ $tank->ds_division_name }}</td>
                                <td>{{ $tank->gn_division_name }}</td>
                                <td>{{ $tank->as_centre }}</td>
                                <td>{{ $tank->river_basin }}</td>
                                <td>{{ $tank->cascade_name }}</td>
                                <td>{{ $tank->no_of_family }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
