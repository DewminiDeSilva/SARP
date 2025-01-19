<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shareholder</title>
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

        .text-danger {
            color: red;
            font-size: 0.875em;
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

</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('agro.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

                <div class="col-md-12 text-center">
                    <h2  class="header-title" style="color: green;">Shareholder Registration</h2>
                </div>
    </br>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('shareholder.store', $agro->id) }}" method="POST" class="form-horizontal">
                @csrf


                <div class="row">
                    <div class="col-6 form-group">
                        <label for="name">Shareholder Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">*{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                        <label for="nic">NIC</label>
                        <input type="text" name="nic" id="nic" class="form-control" value="{{ old('nic') }}" required>
                        @if ($errors->has('nic'))
                            <span class="text-danger">*{{ $errors->first('nic') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                <div class="col-6 form-group">
                    <label for="position">Position</label>
                    <select name="position" id="position" class="form-control" required>
                        <option value="">Select Position</option>
                        <option value="Chairman" {{ old('position') == 'Chairman' ? 'selected' : '' }}>Chairman</option>
                        <option value="Director" {{ old('position') == 'Director' ? 'selected' : '' }}>Director</option>
                        <option value="Executive Committee" {{ old('position') == 'Executive Committee' ? 'selected' : '' }}>Executive Committee</option>
                        <option value="Shareholder" {{ old('position') == 'Shareholder' ? 'selected' : '' }}>Shareholder</option>
                    </select>
                    @if ($errors->has('position'))
                        <span class="text-danger">*{{ $errors->first('position') }}</span>
                    @endif
                </div>

                <div class="col-6 form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="text-danger">*{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
                        @if ($errors->has('date_of_birth'))
                            <span class="text-danger">*{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required>
                        @if ($errors->has('age'))
                            <span class="text-danger">*{{ $errors->first('age') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
                        @if ($errors->has('contact_number'))
                            <span class="text-danger">*{{ $errors->first('contact_number') }}</span>
                        @endif
                    </div>


                    <div class="col-6 form-group">
                        <label for="number_of_shares">Number of Shares</label>
                        <input type="number" name="number_of_shares" id="number_of_shares" class="form-control" value="{{ old('number_of_shares') }}" required>
                        @if ($errors->has('number_of_shares'))
                            <span class="text-danger">*{{ $errors->first('number_of_shares') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="share_capital">Share Capital</label>
                        <input type="number" step="0.01" name="share_capital" id="share_capital" class="form-control" value="{{ old('share_capital') }}" required>
                        @if ($errors->has('share_capital'))
                            <span class="text-danger">*{{ $errors->first('share_capital') }}</span>
                        @endif
                    </div>


                <div class="col-6 form-group">
                    <label for="current_status">Current Status</label>
                    <select name="current_status" id="current_status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="Active" {{ old('current_status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('current_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if ($errors->has('current_status'))
                        <span class="text-danger">*{{ $errors->first('current_status') }}</span>
                    @endif
                </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
