<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Beneficiary Applications</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

        .table-container {
            margin-top: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .btn-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .custom-frame {
            border: 2px solid rgba(0, 128, 0, 0.2);
            background-color: rgba(0, 128, 0, 0.2);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 20px auto;
            max-width: 600px;
        }

        .header-row {
            background-color: #129310;
        }

        .btn-success:hover {
        background-color: #218838 !important; /* Darker green for hover */
        color: white;
    }

        .btninline {
            display: inline-flex;
            gap: 5px; /* Add some space between buttons if needed */
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


    </style>

</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

        <a href="{{ route('bene-form.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">
                Beneficiary Application Form Details
            </h2>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('bene-form.search') }}" class="form-inline mb-4">
            <input type="text" class="form-control mr-2" name="query" placeholder="Search Beneficiaries" required>
            <button type="submit" class="btn btn-success">Search</button>
        </form>

        <!-- Beneficiary Form Details Card -->


        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Actions and Search Section -->
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('bene-form.create') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Beneficiary</a>
            <!-- <a href="" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a> -->
        </div>

        <!-- Beneficiaries Table -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr class="header-row">
                        <th style="color: white;">Full Name</th>
                        <th style="color: white;">NIC</th>
                        <th style="color: white;">Address</th>
                        <th style="color: white;">Phone Number</th>
                        <th style="color: white;">Email</th>
                        <th style="color: white;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneForms as $beneForm)
                    <tr>
                        <td>{{ $beneForm->full_name }}</td>
                        <td>{{ $beneForm->nic_number }}</td>
                        <td>{{ $beneForm->address }}</td>
                        <td>{{ $beneForm->phone_number }}</td>
                        <td>{{ $beneForm->email }}</td>
                        <td class="btninline">
                            <a href="{{ route('bene-form.show', $beneForm->id) }}">
                                <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px; background-color: #28a745; color: white;">View Details</button>
                            </a>
                            <form action="{{ route('bene-form.destroy', $beneForm->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>
