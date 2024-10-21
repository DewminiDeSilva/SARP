<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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

        .container {
            flex: 0 0 80%;
            padding: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-sm {
            margin: 2px;
        }
        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .btn-green {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        .btn-blue {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        .card {
    border-left: 5px solid #28a745;
}
.card-title {
    color: #28a745;
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
        </div>

        <div class="right-column">

            <div class="card">
                <h3>{{ $totalLivestocks }}</h3>
                <p>Total Livestocks Registered</p>
            </div>

            <div class="card">
                <h3>{{ $totalBeneficiaries }}</h3>
                <p>Total Beneficiaries Doing livestocks</p>
            </div>
            <div class="card">
                <h3>{{ $totalGnDivisions }}</h3>
                <p>Total GN Divisions Involved</p>
            </div>
        

        <div class="container">
            <h2 class="text-center">Beneficiary List</h2>



            <!-- Search Form -->


            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NIC</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
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
                            <td>{{ $beneficiary->first_name }}</td>
                            <td>{{ $beneficiary->last_name }}</td>
                            <td>{{ $beneficiary->address }}</td>
                            <td>{{ $beneficiary->dob }}</td>
                            <td>{{ $beneficiary->gender }}</td>
                            <td>{{ $beneficiary->age }}</td>
                            <td>{{ $beneficiary->phone }}</td>
                            <td>{{ $beneficiary->gn_division_name }}</td>
                            <td>
                                @if($beneficiary->id)
                                    <a href="{{ route('livestocks.create', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-green btn-sm">
                                        Add Livestock
                                    </a>
                                    <a href="{{ route('livestocks.list', ['beneficiary_id' => $beneficiary->id]) }}" class="btn btn-blue btn-sm">View Livestock</a>
                                @else
                                    <span class="text-muted">No ID available</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
        </div>
    </div>
</body>
</html>
