<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tank Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            max-width: 1000px;
            margin: auto;
            padding-top: 7px;
            margin-bottom: 10px;
        }
        .tank-section {
            background-color: #F0F0F0;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Black shadow */
        }
        .tank-section h1 {
            text-align: left;
            margin-bottom: 30px;
        }
        .tank-details .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .tank-details .info label {
            font-weight: bold;
            width: 30%;
        }
        .tank-details .info p {
            width: 70%;
            margin: 0;
        }
        .tank-details .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        .tank-details .info img {
            margin-right: 5px;
            width: 50px;
            height: 50px;
        }
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

        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color:rgb(119, 213, 130);
        }

        .card-body {
            padding: 15px;

        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        /* Additional spacing for the cards */
        .row.mt-4 {
            margin-top: 1.5rem;
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
            max-width: 1000px; /* Optional: set a maximum width */

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
    .construction-images {
        text-align: center;
        margin-top: 20px;
    }

    .image-container {
        margin-bottom: 30px;
        display: inline-block;
    }

    .animated-image {
        width: 500px; /* Set a fixed width */
        height: 400px; /* Set a fixed height */
        object-fit: cover; /* Ensures image covers the area without distortion */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .animated-image:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .animated-image:hover::after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 255, 0, 0.2);
        z-index: -1;
    }

    h3 {
        color: #4CAF50;
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


	<a href="{{ route('tank_rehabilitation.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>




        <div class="col-md-12 text-center">
        <h2 class="header-title" style="color: green;">Tank Details View</h2>
        </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Tank Details Section -->
                        <div class="tank-section my-4 custom-frame">

                            <div class="tank-details">
                                <div class="info">
                                    <label>Tank Id:</label>
                                    <p>{{$tankRehabilitation->tank_id}}</p>
                                </div>
                                <div class="info">
                                    <label>Tank Name:</label>
                                    <p>{{$tankRehabilitation->tank_name}}</p>
                                </div>
                                <div class="info">
                                    <label>River Basin:</label>
                                    <p>{{$tankRehabilitation->river_basin}}</p>
                                </div>
                                <div class="info">
                                    <label>Cascade Name:</label>
                                    <p>{{$tankRehabilitation->cascade_name}}</p>
                                </div>
                                <div class="info">
                                    <label>Province:</label>
                                    <p>{{$tankRehabilitation->province_name}}</p>
                                </div>
                                <div class="info">
                                    <label>District:</label>
                                    <p>{{$tankRehabilitation->district}}</p>
                                </div>
                                <div class="info">
                                    <label>DS Division:</label>
                                    <p>{{$tankRehabilitation->ds_division_name}}</p>
                                </div>
                                <div class="info">
                                    <label>GN Division:</label>
                                    <p>{{$tankRehabilitation->gn_division_name}}</p>
                                </div>
                                <div class="info">
                                    <label>AS Centre:</label>
                                    <p>{{$tankRehabilitation->as_centre}}</p>
                                </div>
                                <div class="info">
                                    <label>Agency:</label>
                                    <p>{{$tankRehabilitation->agency}}</p>
                                </div>
                            </div>
                            </div>

                            <div class="tank-section my-4 custom-frame">

                            <div class="tank-details">
                                <div class="info">
                                    <label>No. of Families:</label>
                                    <p>{{$tankRehabilitation->no_of_family}}</p>
                                </div>

                            </div>
                            </div>

                            <div class="tank-section my-4 custom-frame">
                            <div class="tank-details">

                                <div class="info">
                                    <label>Longitude:</label>
                                    <p>{{$tankRehabilitation->longitude}}</p>
                                </div>
                                <div class="info">
                                    <label>Latitude:</label>
                                    <p>{{$tankRehabilitation->latitude}}</p>
                                </div>
                                <div class="info">
                                    <label>Location:</label>
                                    <p>
                                        <a href="https://www.google.com/maps/search/?api=1&query={{$tankRehabilitation->latitude}},{{$tankRehabilitation->longitude}}" target="_blank">
                                        <img src="{{ asset('assets/images/Map_icon.png') }}" alt="Google Maps">
                                        View on Google Maps
                                        </a>
                                    </p>
                                </div>
                            </div>
                            </div>
                                <!-- <div class="info">
                                    <label>Progress:</label>
                                    <p>{{$tankRehabilitation->progress}}</p>
                                </div> -->
                            <div class="tank-section my-4 custom-frame">
                            <div class="tank-details">
                                <div class="info">
                                    <label>Contractor:</label>
                                    <p>{{$tankRehabilitation->contractor}}</p>
                                </div>
                                <div class="info">
                                    <label>Total Contract Value:</label>
                                    <p>{{ number_format($tankRehabilitation->payment, 2) }}</p>
                                </div>
                                <div class="info">
                                    <label>EOT:</label>
                                    <p>{{$tankRehabilitation->eot}}</p>
                                </div>
                                <div class="info">
                                    <label>Contract Period:</label>
                                    <p>{{$tankRehabilitation->contract_period}}</p>
                                </div>
                                <div class="info">
                                    <label>Status:</label>
                                    <p>{{$tankRehabilitation->status}}</p>
                                </div>
                                <div class="info">
                                    <label>Remarks:</label>
                                    <p>{{$tankRehabilitation->remarks}}</p>
                                </div>
                                <!-- <div class="d-flex justify-content-center mt-4"> -->

                                <!-- New fields -->
                        <div class="info"><label>Open Reference Number:</label><p>{{ $tankRehabilitation->open_ref_no }}</p></div>
                        <div class="info"><label>Awarded Date:</label><p>{{ $tankRehabilitation->awarded_date }}</p></div>

                        <div class="info"><label>Cumulative Paid Amount:</label><p>RS.{{ number_format($tankRehabilitation->payment, 2) }}</p></div>
                        <div class="info"><label>Paid Advanced Amount:</label><p>RS.{{ number_format($tankRehabilitation->paid_advanced_amount, 2) }}</p></div>

                        <div class="info"><label>Recommended IPC Number:</label><p>{{ $tankRehabilitation->recommended_ipc_no }}</p></div>
                        <div class="info"><label>Recommended IPC Amount:</label><p>{{ number_format($tankRehabilitation->recommended_ipc_amount, 2) }}</p></div>



</div>
</div>
                            </div>


                                <!-- Add two horizontal cards below Remarks -->
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Physical Progress Report is at</br> <span id="currentDate1"></span></h5>
                                                <p class="card-text">Status: {{$tankRehabilitation->status}}</p>
                                                <p class="card-text">Progress: {{$tankRehabilitation->progress}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Finance Progress as at</br> <span id="currentDate2"></span></h5>


                                                <p class="card-text">Paid Amount: Rs.{{number_format($tankRehabilitation->payment, 2)}}</p>


                                                <p class="card-text">Percentage: {{$percentage}}%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more tank details here if needed -->

                <div class="tank-section my-4 custom-frame">
                    <div class="tank-details">
                        <!-- Image fields -->
                        <div class="construction-images">

                        <div class="col-md-12 text-center">
                        <h2 class="header-title" style="color: green;">Construction Images</h2>
                        </div>

                            @if($tankRehabilitation)
                            <div  class="image-container">
                            <div class="image-row">
                                <h3>Pre Construction Image</h3>

                                <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->pre_construction_image) }}" alt="Pre Construction Image">
                            </div>
                            </div>
</br>

                            <div class="image-container">
                            <div class="image-row">
                                <h3>During Construction Image</h3>
                                <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->during_construction_image) }}" alt="During Construction Image">
                            </div>
                            </div>
</br>

                            <div class="image-container">
                            <div class="image-row">
                                <h3>Post Construction Image</h3>
                                <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->post_construction_image) }}" alt="Post Construction Image">
                            </div>
                            </div>
                        @endif
                    </div>
                </div>
                </div>
                                </div>
            </div>
        </div>
    </div>
    </div>

</div>

    <script>
     // Function to get the current date in YYYY-MM-DD format
function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

// Function to display the current date in the specified span
function displayCurrentDate() {
    const currentDate1 = document.getElementById("currentDate1");
    const currentDate2 = document.getElementById("currentDate2");
    const currentDate = getCurrentDate();
    currentDate1.textContent = currentDate;
    currentDate2.textContent = currentDate;
}

// Call the function to display the current date
displayCurrentDate();

    </script>
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
