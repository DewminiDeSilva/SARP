<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Participants</title>
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
    </style>

<style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

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
            /*align-items: center;*/
            justify-content: center;
            margin: 20px auto; /* Center horizontally and add vertical margin */
            max-width: 600px; /* Optional: set a maximum width */
        }

        .header-row {
            background-color: #129310;
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

        <a href="{{ route('training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">
                    Training Program Details
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
                            <p style="word-wrap: break-word; max-width: 300px;"> {{ $training->program_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Venue:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $training->venue }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Date:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Resource Person:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $training->resource_person_name }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <strong>Training Program Cost:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->training_program_cost }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Resource Person Payment:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->resource_person_payment }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Province:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->province_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>District:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->district }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>DS Division:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->ds_division_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>GN Division:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->gn_division_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>ASC Center:</strong>
                        </div>
                        <div class="col-md-7">
                            <p>{{ $training->as_center }}</p>
                        </div>
                    </div>

                </div>
            </div>
    </br>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Actions and Search Section -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('participants.create', $training->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Participant</a>
                <a href="{{ route('participants.download_csv', $training->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- CSV Upload Form -->
                <form action="{{ route('participants.upload_csv', $training->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>

                <!-- Search form -->
                <form method="GET" action="{{ route('participants.search', $training->id) }}" class="form-inline">
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
                        @foreach ($participants as $participant)
                            <tr>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->nic }}</td>
                                <td>{{ $participant->address_institution }}</td>
                                <td>{{ $participant->contact_number }}</td>
                                <td>{{ ucfirst($participant->gender) }}</td>
                                <td>{{ $participant->designation }}</td>
                                <td>{{ $participant->age }}</td>
                                <td>{{ $participant->youth }}</td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('participants.destroy', [$training->id, $participant->id]) }}" method="POST" style="display: inline-block;">
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
