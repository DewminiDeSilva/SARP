<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>livestock Details for Beneficiary: {{ $beneficiary->first_name }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Total Acres Cultivated</th>
                    <th>Fatmer Contribution</th>
                    <th>Actions</th> <!-- New Actions column -->
                </tr>
            </thead>
            <tbody>
                @forelse ($crops as $crop)
                <tr>
                    <td>{{ $crop->category}}</td>
                    <td>{{ $crop->sub_category}}</td>
                    <td>{{ $crop->total_beneficiaries}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No livestocks found for this GN Division.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </body>
    </html>
    