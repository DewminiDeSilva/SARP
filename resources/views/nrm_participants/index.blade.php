<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View NRM Participants</title>
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

        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1; /* Blue color example */
            color: #0d0e0d; /* Text color */
            /* width: 18; */
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

    <style>
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
    </style>

</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('nrm.index') }}" class="btn-back">

            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">
                NRM Training Program Details
            </h2>
        </div>

        <div>
            <!-- Training Program Details Card -->
            <div>

                <div class="my-4 custom-frame">
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Program Name:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;"> {{ $nrmTraining->program_name }}</p>
                        </div>

                    <div class="row">
                        <div class="col-md-5">
                            <strong>Venue:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $nrmTraining->venue }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Date:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Resource Person:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $nrmTraining->resource_person_name }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <strong>Training Program Cost:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->training_program_cost }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Resource Person Payment:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->resource_person_payment }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Province:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->province_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>District:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->district }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>DS Division:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->ds_division_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>GN Division:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->gn_division_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>ASC Center:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $nrmTraining->as_center }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
    <div class="justify-content-center">
        <div class="container mt-4">
            <div class="d-flex justify-content-center">
                <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                    <div class="card-header">
                        Total Participants
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalParticipants }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Actions and Search Section -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('nrm-participants.create', $nrmTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Participant</a>
                <a href="{{ route('nrm-participants.download_csv', $nrmTraining->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- CSV Upload Form -->
                <form action="{{ route('nrm-participants.upload_csv', $nrmTraining->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>

                <!-- Search form -->
                <form method="GET" action="{{ route('nrm-participants.search', $nrmTraining->id) }}" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Participants" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Participants Table -->
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr class="header-row">
                            <th style="color: white;">Name</th>
                            <th style="color: white;">NIC</th>
                            <th style="color: white;">Address/Institution</th>
                            <th style="color: white;">Contact Number</th>
                            <th style="color: white;">Gender</th>
                            <th style="color: white;">Designation</th>
                            <th style="color: white;">Age</th>
                            <th style="color: white;">Youth Status</th>
                            <th style="color: white;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nrmParticipants as $nrmParticipant)
                            <tr>
                                <td>{{ $nrmParticipant->name }}</td>
                                <td>{{ $nrmParticipant->nic }}</td>
                                <td>{{ $nrmParticipant->address_institution }}</td>
                                <td>{{ $nrmParticipant->contact_number }}</td>
                                <td>{{ ucfirst($nrmParticipant->gender) }}</td>
                                <td>{{ $nrmParticipant->designation }}</td>
                                <td>{{ $nrmParticipant->age }}</td>
                                <td>{{ $nrmParticipant->youth }}</td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('nrm-participants.destroy', [$nrmTraining->id, $nrmParticipant->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this participant?')">Delete</button>
                                    </form>
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
