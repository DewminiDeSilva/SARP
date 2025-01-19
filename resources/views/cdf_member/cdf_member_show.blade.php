<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARP APP/ CDF Member Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        h1, h2 {
            color: #343a40;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        thead th {
            background-color: #343a40;
            color: #fff;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-actions {
            display: flex;
            gap: 10px;
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

        .label {
            width: 150px;
            display: inline-block;
            font-size: 18px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            width: 100%; /* Ensure full width inside the frame */
        }

        .header-row {
            background-color: #129310;
        }

        .btn-warning {
        background-color: green; /* Green background color */
        color: #fff; /* White text color */
        border: none; /* Remove default border */
        padding: 5px 10px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Inline block for styling */
        font-size: 14px; /* Adjust font size */
        transition: background-color 0.3s ease; /* Smooth transition */
    }
    .btn-warning:hover {
        background-color: darkgreen; /* Dark green on hover */
        color: #fff; /* White text color */
    }
    </style>

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
    <div class="container">



    <a href="{{ route('cdf.index') }}" class="btn-back">
    <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
</a>


    <br>
        <h1 class="text-center" style="color: green;">CDF Member Details View</h1>
        <div class="my-4 custom-frame">
        <div class="info-row">
            <p><strong class="label">CDF Name:</strong> {{ $cdf->cdf_name }}</p>
        </div>
        <div class="info-row">
            <p><strong class="label">CDF Address:</strong> {{ $cdf->cdf_address }}</p>
        </div>
        </div>

        <h2 style="color: green;">Members in the Same CDF</h2>
        <table class="table-bordered">
            <thead>
                <tr  class="header-row">
                    <th class="header-row">CDF Name</th>
                    <th class="header-row">CDF Address</th>
                    <th class="header-row">Member Name</th>
                    <th class="header-row">NIC Number</th>
                    <th class="header-row">Address</th>
                    <th class="header-row">Contact Number</th>
                    <th class="header-row">Gender</th>
                    <th class="header-row">Date of Birth</th>
                    <th class="header-row">Youth</th>
                    <th class="header-row">Position</th>
                    <th class="header-row">Representing Organization</th>
                    <th class="header-row">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($membersInSameCDF as $member)
                    <tr>
                        <td>{{ $member->cdf_name }}</td>
                        <td>{{ $member->cdf_address }}</td>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->member_nic }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->contact_number }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->dob }}</td>
                        <td>{{ $member->youth }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->representing_organization }}</td>
                        <td class="btn-actions">
                            <!-- Edit Button -->
                            <a href="/cdfmembers/{{ $member->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Delete Form -->
                            <form action="/cdfmembers/{{ $member->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</body>
</html>
