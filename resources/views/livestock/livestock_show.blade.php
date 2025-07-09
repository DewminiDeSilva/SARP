<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    <div class="container mt-5">
        <h2>livestock  {{ $beneficiary->first_name }}</h2>

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
    </div>
    </div>
    </body>
    </html>
