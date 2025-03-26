<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Member</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        .container {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

        .frame {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
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


    <script>
    $(function() {
        // Initialize datepicker
        $("#dob").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: '0', // Restrict selection to today or earlier
            changet: function(selectedDate) {
                calcYear: true, // Allow changing year
            yearRange: '-100:+0', // Allow selection of dates up to 100 years ago
            onSeleculateAge(selectedDate); // Calculate age when date is selected
            }
        });

        function calculateAge(selectedDate) {
            var dob = new Date(selectedDate);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var month = today.getMonth() - dob.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            // Update the youth field based on age
            if (age < 35) {
                $("#youth").val("Youth");
            } else {
                $("#youth").val("Not Youth");
            }
        }
    });
</script>

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


<a href="{{ route('cdf.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>




        <div class="center-heading text-center">
            <h1 style="font-size: 2.5rem; color: green;">Edit CDF Member</h1>
        </div>
    <div class="container">

        <form action="{{ route('cdfmembers.update', $cdfMember->id) }}" method="POST">
             @csrf
             @method('PUT')
             <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cdf_name">CDF Name</label>
                            <input type="text" class="form-control" id="cdf_name" name="cdf_name" value="{{ $cdfMember->cdf_name }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cdf_name">CDF Address</label>
                            <input type="text" class="form-control" id="cdf_address" name="cdf_address" value="{{ $cdfMember->cdf_address }}" required>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="member_name">Member Name</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $cdfMember->member_name }}" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="member_nic">NIC Number</label>
                            <input type="text" class="form-control" id="member_nic" name="member_nic" value="{{ $cdfMember->member_nic }}" required>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $cdfMember->address }}" required>
            </div>

            <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $cdfMember->contact_number }}" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ $cdfMember->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $cdfMember->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <!-- Add other gender options if needed -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $cdfMember->dob }}" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="youth">Youth</label>
                            <input type="text" class="form-control" id="youth" name="youth" value="{{ $cdfMember->youth }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" value="{{ $cdfMember->position }}" required>
                        </div>
                    </div>


                    <div class="col">
                        <div class="form-group">
                            <label for="representing_organization">Representing Organization</label>
                            <input type="text" class="form-control" id="representing_organization" name="representing_organization" value="{{ $cdfMember->representing_organization }}" required>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <a href="{{ route('cdfmembers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
        </form>
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
