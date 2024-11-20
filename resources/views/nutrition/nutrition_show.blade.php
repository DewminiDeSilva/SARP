<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nutrition Program Details</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
        }
        .beneficiary-section,
        .family-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .beneficiary-section h1,
        .family-section h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .beneficiary-details,
        .family-members {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .beneficiary-details p,
        .family-member p {
            margin: 5px 0;
        }
        .icon-container {
            margin-top: 10px;
        }
        .icon-container a {
            margin-right: 10px;
        }
        .showcontainer {
            position: absolute;
            right: 20px;
            left: 350px;
            top: 50px
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }
    </style>

    <style>
        .inline-buttons {
    display: inline-block;
}

.btn-green {
    background-color: green;
    color: white;
    border: none;
}

.btn-red {
    background-color: red;
    color: white;
    border: none;
}

.button-spacing {
    margin-right: 5px;
}

.button-container {
    display: flex;
    align-items: center;
}

.btn-green:hover {
    background-color: darkgreen;
    color: white;
}

.btn-red:hover {
    background-color: darkred;
    color: white;
}

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

        <a href="{{ route('nutrition.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="">
    </br>
            <h2 style="color: green; font-weight: bold; text-align: center;">Nutrition Program Details</h2>

            <!-- Display Nutrition Details -->

            <div  class="my-4 custom-frame">
                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Program Type:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->program_type }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Date:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->date }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Location:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->location }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Program Conductor:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->program_conductor }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Cost of Training Program:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->cost_of_training_program }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Province:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->province_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>District:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->district_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>DS Division:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->ds_division_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>GN Division:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->gn_division_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>ASC:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->asc_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Cascade Name:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->cascade_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Description:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{ $nutrition->description }}</p>
                                    </div>
                                </div>


                            </div>


                            </br>

    <h2 style="color: green;">Nutrition Program Participants</h2>

            <!-- Actions and Search Section -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('nutrition_trainee.create', $nutrition->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Participant</a>
                <a href="{{ route('nutrition_trainee.download_csv', $nutrition->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Download CSV Report</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- CSV Upload Form -->
                <form action="{{ route('nutrition_trainee.upload_csv', $nutrition->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>



                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <!-- Search form -->
                <form method="GET" action="{{ route('nutrition_trainee.search', $nutrition->id) }}" class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Participants" name="search" value="{{ old('search', $searchTerm ?? '') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>


            </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="header-row">
                    <th style="color: white;">Full Name</th>
                    <th style="color: white;">NIC</th>
                    <th style="color: white;">Address</th>
                    <th style="color: white;">Date of Birth</th>
                    <th style="color: white;">Gender</th>
                    <th style="color: white;">Mobile</th>
                    <th style="color: white;">Education Level</th>
                    <th style="color: white;">Income Level</th>
                    <th style="color: white;">Special Remark</th>
                    <th style="color: white;">Actions</th>
                </tr>
            </thead>

            <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{ $trainee->full_name }}</td>
                    <td>{{ $trainee->nic }}</td>
                    <td>{{ $trainee->address }}</td>
                    <td>{{ $trainee->dob }}</td>
                    <td>{{ $trainee->gender }}</td>
                    <td>{{ $trainee->mobile }}</td>
                    <td>{{ $trainee->education_level }}</td>
                    <td>{{ $trainee->income_level }}</td>
                    <td>{{ $trainee->special_remark }}</td>

                    <td>
                        <a href="{{ route('nutrition_trainee.edit', $trainee->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('nutrition_trainee.destroy', $trainee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
