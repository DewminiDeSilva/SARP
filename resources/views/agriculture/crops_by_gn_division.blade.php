<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops by GN Division</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table thead {
            background-color: #343a40;
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            font-weight: bold;
        }

        .no-crops {
            text-align: center;
            color: #dc3545;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="table-container">
            <h2>Crops Cultivated in {{ $gn_division_name }}</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Crop Name</th>
                            <th>Total Acres</th>
                            <th>Total Beneficiaries</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($crops as $crop)
                        <tr>
                            <td>{{ $crop->crop_name }}</td>
                            <td>{{ $crop->total_acres }}</td>
                            <td>{{ $crop->total_beneficiaries }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="no-crops">No crops found for this GN Division.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>