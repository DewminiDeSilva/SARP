<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Shareholders</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            margin-top:30px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .card-body h5 {
            font-weight: bold;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .card-body .detail-item {
            margin-bottom: 15px;
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
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
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

    <div class="d-flex align-items-center mb-3">

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<a href="{{ route('agro.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>



    <div class="col-md-12 text-center">
    <h2 class="header-title" style="color: green;">Enterprise Details</h2>
    </div>

        <div>
            <div class="col-md-12">
                <div>

                <div class="my-4 custom-frame">
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Enterprise Name:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->enterprise_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Description of Certificates:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->description_of_certificates }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Nature of Business:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->nature_of_business }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Products Available:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->products_available }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Yield Collection Details:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->yield_collection_details }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>Marketing Information:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->marketing_information }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong>List of Distributors:</strong>
                        </div>
                        <div class="col-md-7">
                            <p style="word-wrap: break-word; max-width: 300px;">{{ $agro->list_of_distributors }}</p>
                        </div>
                    </div>
                </div>



                </div>

                @if(auth()->user()->hasPermission('shareholder', 'add'))
                <div class="btn-container">
                    <a href="{{ route('shareholder.create', $agro->id) }}" class="btn btn-success">Add New Shareholder</a>
                </div>
                @endif
                <!-- Executive Staff Section -->
                <div class="col-md-12 text-center">
                    <h3 class="header-title" style="color: green;">Executive Staff</h3>
                </div>
                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="header-row">
                                <th style="color: white;">Executive Name</th>
                                <th style="color: white;">Position</th>
                                <th style="color: white;">NIC</th>
                                <th style="color: white;">Gender</th>
                                <th style="color: white;">Date of Birth</th>
                                <th style="color: white;">Age</th>
                                <th style="color: white;">Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agro->shareholders->whereIn('position', ['Chairman', 'Director', 'Executive Committee']) as $executive)
                                <tr>
                                    <td>{{ $executive->name }}</td>
                                    <td>{{ $executive->position }}</td>
                                    <td>{{ $executive->nic }}</td>
                                    <td>{{ ucfirst($executive->gender) }}</td>
                                    <td>{{ $executive->date_of_birth }}</td>
                                    <td>{{ $executive->age }}</td>
                                    <td>{{ $executive->contact_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </br>

                <!-- Shareholders Section -->
                <div class="col-md-12 text-center">
                    <h3 class="header-title" style="color: green;">Shareholders</h3>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="header-row">
                                <th style="color: white;">Shareholder Name</th>
                                <th style="color: white;">Position</th>
                                <th style="color: white;">NIC</th>
                                <th style="color: white;">Gender</th>
                                <th style="color: white;">Date of Birth</th>
                                <th style="color: white;">Age</th>
                                <th style="color: white;">Contact Number</th>
                                <th style="color: white;">Number of Shares</th>
                                <th style="color: white;">Share Capital</th>
                                <th style="color: white;">Current Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agro->shareholders->whereNotIn('position', ['Chairman', 'Director', 'Executive Committee']) as $shareholder)
                                <tr>
                                    <td>{{ $shareholder->name }}</td>
                                    <td>{{ $shareholder->position }}</td>
                                    <td>{{ $shareholder->nic }}</td>
                                    <td>{{ ucfirst($shareholder->gender) }}</td>
                                    <td>{{ $shareholder->date_of_birth }}</td>
                                    <td>{{ $shareholder->age }}</td>
                                    <td>{{ $shareholder->contact_number }}</td>
                                    <td>{{ $shareholder->number_of_shares }}</td>
                                    <td>{{ $shareholder->share_capital }}</td>
                                    <td>{{ $shareholder->current_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });
    });
</script>
</body>
</html>
