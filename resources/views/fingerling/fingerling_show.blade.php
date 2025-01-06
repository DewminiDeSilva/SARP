<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerlings Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dropdown-menu {
            min-width: auto;
        }
        .dropdown-item {
            padding: 10px;
            font-size: 16px;
        }
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
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
        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
        }
        .button-container {
            display: flex;
            gap: 10px; /* Adjust the gap between buttons as needed */
            align-items: center;
            justify-content: center;
        }
        .custom-button {
            background-color: white;
            color: red;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: border 0.3s ease; /* Smooth transition for border */
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            background-color: #f5c6cb;
        }
        .custom-button:hover {
            border-color: red; /* Border appears on hover */
            background-color: #f5c6cb;
        }
        .edit-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }
        .edit-button:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }
        .view-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }
        .view-button:hover {
            border-color: green; /* Border appears on hover */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }
        .pagination .page-item {
            margin: 0px; /* Adjust the margin to reduce space */
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
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #tableInfo {
            text-align: left;
        }
    </style>


<style>
    .top-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.top-left {
    flex: 1;
    display: flex;
    justify-content: flex-start;
}

.top-right {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}

.bottom-left {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px; /* Adds space between the two buttons */
    margin-bottom: 20px;
}

</style>

<style>
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
            background: none;
            position: relative;
            z-index: 1;
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
            z-index: 0;
        }

        .btn-back:hover .btn-text {
            opacity: 1;
            visibility: visible;
            transform: translateX(-5px);
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-back:hover img {
            transform: translateX(-50px);
        }

        .btn-action.edit {
            background-color: #ffd32c;
        }

        .btn-action.delete {
            background-color: #FF746C;
        }

        .btn-action i {
            color: white;
            font-size: 1rem;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        .btn-action {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            transition: all 0.3s ease;
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

    <a href="{{ route('fingerling.index') }}" class="btn-back">
    <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
</a>


    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 style="font-size: 2rem; color: green;">Fingerlings Details</h3>
                </div>
            </div>
        </div>

        <!-- Generate and Upload CSV, Add ASC Button -->
        <div class="top-section">
            <div class="top-left">
            <a href="{{ route('fingerling.create', $tank->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Fingerlings</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                <th>Tank Name</th>
                    <th>Livestock Type</th>
                    <th>Stocking Type</th>
                    <th>Stocking Date</th>
                    <th>Variety</th>
                    <th>Stock Number</th>
                    <th>Harvest Date</th>
                    <th>Variety Harvest (kg)</th>
                    <th>Cumulative Amount (kg)</th>
                    <th>Unit Price (Rs.)</th>
                    <th>Total Income (Rs.)</th>
                    <th>Wholesale Quantity (kg)</th>
                    <th>Wholesale Unit Price (Rs.)</th>
                    <th>Wholesale Total Income (Rs.)</th>
                    <th>Actions</th>
                </tr>
                    </thead>
                    <tbody>
                    @foreach ($fingerlings as $fingerling)
                    <tr>
                        <td>{{ $fingerling->tank->tank_name ?? 'N/A' }}</td>
                        <td>{{ $fingerling->livestock_type }}</td>
                        <td>{{ $fingerling->stocking_type }}</td>
                        <td>{{ $fingerling->stocking_date }}</td>
                        <td>
                            @if (!empty($fingerling->stocking_details) && is_string($fingerling->stocking_details))
                                @php
                                    $stockingDetails = json_decode($fingerling->stocking_details, true);
                                @endphp
                                @if (is_array($stockingDetails))
                                    @foreach ($stockingDetails as $detail)
                                        <p>{{ $detail['variety'] ?? 'N/A' }}</p>
                                    @endforeach
                                @else
                                    <p>N/A</p>
                                @endif
                            @else
                                <p>N/A</p>
                            @endif
                        </td>
                        <td>
                            @if (!empty($fingerling->stocking_details) && is_string($fingerling->stocking_details))
                                @php
                                    $stockingDetails = json_decode($fingerling->stocking_details, true);
                                @endphp
                                @if (is_array($stockingDetails))
                                    @foreach ($stockingDetails as $detail)
                                        <p>{{ $detail['stock_number'] ?? 'N/A' }}</p>
                                    @endforeach
                                @else
                                    <p>N/A</p>
                                @endif
                            @else
                                <p>N/A</p>
                            @endif
                        </td>


                        <td>{{ $fingerling->harvest_date }}</td>
                        <td>{{ $fingerling->variety_harvest_kg ?? 'N/A' }}</td>
                        <td>{{ $fingerling->amount_cumulative_kg ?? 'N/A' }}</td>
                        <td>{{ $fingerling->unit_price_rs ?? 'N/A' }}</td>
                        <td>{{ $fingerling->total_income_rs ?? 'N/A' }}</td>
                        <td>{{ $fingerling->wholesale_quantity_kg ?? 'N/A' }}</td>
                        <td>{{ $fingerling->wholesale_unit_price_rs ?? 'N/A' }}</td>
                        <td>{{ $fingerling->wholesale_total_income_rs ?? 'N/A' }}</td>
                        <td class="button-container">
                            <!-- <a href="{{ route('fingerling.edit', $fingerling->id) }}" class="btn btn-warning btn-sm">Edit</a> -->
                            <!-- Edit Button -->
                    <a href="{{ route('fingerling.edit', $fingerling->id) }}" class="btn-action edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                        
                            <!-- Delete Button -->
                            <form action="{{ route('fingerling.destroy', $fingerling->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action delete" title="Delete" onclick="return confirm('Are you sure you want to delete this staff profile?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<!-- Add Bootstrap JS and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('table').DataTable();
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
</script> -->
</body>
</html>
