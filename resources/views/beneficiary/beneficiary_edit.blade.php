<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Beneficiary</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <script>
        $(function() {
            $("#dob").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0',
                changeYear: true,
                yearRange: '-100:+0',
                onSelect: function() {
                    calculateAge();
                }
            });

            function calculateAge() {
                var dob = $("#dob").datepicker("getDate");
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                var m = today.getMonth() - dob.getMonth();

                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }

                $("#age").val(age);
            }

            calculateAge();
        });
    </script>

    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-label, .bold-label {
            font-weight: bold;
        }

        .color-label {
            color: green;
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
            border-right: 1px solid #dee2e6;
        }

        .datepicker-container {
            position: relative;
            display: inline-block;
        }

        .bg-green {
            background-color: green;
        }

        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }

        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dropdown-menu {
            min-width: auto;
        }

        .dropdown-item {
            padding: 10px;
            font-size: 16px;
        }

        .dropdown-toggle {
            min-width: 250px;
        }

        .form-control {
            width: 550px;
        }

        .greenbackground {
            background-color: #198754;
            color: #fff;
            border: 1px solid #198754;
        }

        .greenbackground option {
            background-color: #198754;
            color: #fff;
        }

        .greenbackground option:checked {
            background-color: #145c32;
            color: #fff;
        }

        .greenbackground:focus {
            border-color: #145c32;
            box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.25);
        }

        .dropdown-label {
            text-align: left;
            font-size: 16px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            margin-right: 15px;
        }

        .form-group:last-child {
            margin-right: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
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
select[disabled] {
    color: #000 !important; /* Force black text */
    background-color: #e9ecef; /* Optional: light gray background */
    opacity: 1; /* Override default opacity */
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

        <!-- Back Button -->
        <a href="{{ route('beneficiary.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

    </div>



        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Edit Beneficiary</h2>
        </div>

        <div class="container mt-5 border rounded border p-4 custom-border">
            <form action="{{ route('beneficiary.update', $beneficiary->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tank Name and Province -->
<div class="form-row">
    <div class="form-group">
        <label for="tankDropdown" class="form-label dropdown-label color-label col-form-label">Select Tank Name</label>
        <select id="tankDropdown" class="form-control greenbackground" name="tank_name" disabled>
            <option selected>{{ $beneficiary->tank_name ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="tank_name" value="{{ $beneficiary->tank_name }}">
    </div>
    <div class="form-group">
        <label for="provinceDropdown" class="form-label dropdown-label color-label col-form-label">Province</label>
        <select id="provinceDropdown" class="form-control greenbackground" name="province_name" disabled>
            <option selected>{{ $beneficiary->province_name ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="province_name" value="{{ $beneficiary->province_name }}">
    </div>
</div>

<!-- District and DS Division -->
<div class="form-row">
    <div class="form-group">
        <label for="districtDropdown" class="form-label bold-label color-label">District</label>
        <select class="form-control greenbackground" id="districtDropdown" name="district_name" disabled>
            <option selected>{{ $beneficiary->district_name ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="district_name" value="{{ $beneficiary->district_name }}">
    </div>
    <div class="form-group">
        <label for="dsDivisionDropdown" class="form-label bold-label color-label">DS Division</label>
        <select class="form-control greenbackground" id="dsDivisionDropdown" name="ds_division_name" disabled>
            <option selected>{{ $beneficiary->ds_division_name ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="ds_division_name" value="{{ $beneficiary->ds_division_name }}">
    </div>
</div>

<!-- GN Division and ASC -->
<div class="form-row">
    <div class="form-group">
        <label for="gnDropdown" class="form-label bold-label color-label">GN Division</label>
        <select class="form-control greenbackground" id="gnDropdown" name="gn_division_name" disabled>
            <option selected>{{ $beneficiary->gn_division_name ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="gn_division_name" value="{{ $beneficiary->gn_division_name }}">
    </div>
    <div class="form-group">
        <label for="ascDropdown" class="form-label bold-label color-label">ASC</label>
        <select class="form-control greenbackground" id="ascDropdown" name="as_center" disabled>
            <option selected>{{ $beneficiary->as_center ?? 'N/A' }}</option>
        </select>
        <input type="hidden" name="as_center" value="{{ $beneficiary->as_center }}">
    </div>
</div>

<!-- Cascade Name -->
<div class="form-group">
    <label for="cascadeDropdown" class="form-label bold-label color-label">Cascade Name</label>
    <select class="form-control greenbackground" id="cascadeDropdown" name="cascade_name" disabled>
        <option selected>{{ $beneficiary->cascade_name ?? 'N/A' }}</option>
    </select>
    <input type="hidden" name="cascade_name" value="{{ $beneficiary->cascade_name }}">
</div>


                <!-- ✅ YOUTH ENTERPRISE SECTION (EDIT MODE) -->
                <div class="form-group mt-3" id="youthEnterpriseProjectName" style="{{ old('project_type', $beneficiary->project_type) === 'youth' ? '' : 'display: none;' }}">
                    <label for="youth_proposal_id">Youth Enterprises Project Name</label>
                    <select name="youth_proposal_id" id="youth_proposal_id" class="form-control">
                        <option value="">-- Select Youth Enterprise --</option>
                        @foreach($agreementSignedYouth as $proposal)
                            <option value="{{ $proposal->id }}" 
                                {{ (old('youth_proposal_id', $beneficiary->youth_proposal_id) == $proposal->id) ? 'selected' : '' }}>
                                {{ $proposal->organization_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- NIC, Name with Initials, Gender, DOB, Address, and Age -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nic">Beneficiary NIC</label>
                        <input type="text" class="form-control" name="nic" value="{{ $beneficiary->nic }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name_with_initials">Name with Initials</label>
                        <input type="text" class="form-control" name="name_with_initials" value="{{ $beneficiary->name_with_initials }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control datepicker-container" id="dob" name="dob" value="{{ $beneficiary->dob }}" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $beneficiary->age }}" readonly>
                    </div>
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $beneficiary->gender == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $beneficiary->gender == 'female' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ $beneficiary->gender == 'other' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>

                <!-- Education Level -->
                <div class="form-group">
                    <label for="education">Education Level</label>
                    <select class="form-control" name="education" required>
                        <option value="{{ $beneficiary->education }}" selected>{{ $beneficiary->education }}</option>
                    </select>
                </div>

                <!-- Email, Phone, Address, and Family Members -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $beneficiary->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Mobile Number</label>
                        <input type="text" class="form-control" name="phone" value="{{ $beneficiary->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $beneficiary->address }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="number_of_family_members">Number of Family Members</label>
                    <input type="number" class="form-control" name="number_of_family_members" value="{{ $beneficiary->number_of_family_members }}" required>
                </div>

                <!-- Land Ownership and Coordinates -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="land_ownership_total_extent">Land Ownership (Total Extent)</label>
                        <input type="text" class="form-control" name="land_ownership_total_extent" value="{{ $beneficiary->land_ownership_total_extent }}" required>
                    </div>
                    <div class="form-group">
                        <label for="land_ownership_proposed_cultivation_area">Proposed Cultivation Area</label>
                        <input type="text" class="form-control" name="land_ownership_proposed_cultivation_area" value="{{ $beneficiary->land_ownership_proposed_cultivation_area }}" required>
                    </div>
                </div>

                <!-- Latitude and Longitude -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" value="{{ $beneficiary->latitude }}">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" value="{{ $beneficiary->longitude }}">
                    </div>
                </div>

                <!-- Income, Assets, Water Resources, and More -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="income_source">Income Source</label>
                        <input type="text" class="form-control" name="income_source" value="{{ $beneficiary->income_source }}" required>
                    </div>
                    <div class="form-group">
                        <label for="average_income">Average Income</label>
                        <input type="text" class="form-control" name="average_income" value="{{ $beneficiary->average_income }}" required>
                    </div>
                    <div class="form-group">
                        <label for="monthly_household_expenses">Monthly Household Expenses</label>
                        <input type="text" class="form-control" name="monthly_household_expenses" value="{{ $beneficiary->monthly_household_expenses }}" required>
                    </div>
                    <div class="form-group">
                        <label for="household_level_assets_description">Household Level Assets Description</label>
                        <input type="text" class="form-control" name="household_level_assets_description" value="{{ $beneficiary->household_level_assets_description }}" required>
                    </div>
                </div>

                <!-- Bank Details -->
                <div class="card">
                    <div class="card-header bg-green text-white">
                        <h5 class="card-title mb-0">Bank Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" value="{{ $beneficiary->bank_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bank_branch">Bank Branch</label>
                            <input type="text" class="form-control" name="bank_branch" value="{{ $beneficiary->bank_branch }}" required>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" class="form-control" name="account_number" value="{{ $beneficiary->account_number }}" required>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="head_of_householder_name">Head of Householder Name</label>
                        <input type="text" class="form-control" name="head_of_householder_name" value="{{ $beneficiary->head_of_householder_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="householder_number">Householder Number</label>
                        <input type="text" class="form-control" name="householder_number" value="{{ $beneficiary->householder_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="type_of_water_resource">Type of Water Resource</label>
                        <input type="text" class="form-control" name="type_of_water_resource" value="{{ $beneficiary->type_of_water_resource }}" required>
                    </div>
                    <div class="form-group">
                        <label for="training_details_description">Training Details Description</label>
                        <input type="text" class="form-control" name="training_details_description" value="{{ $beneficiary->training_details_description }}">
                    </div>

                    <div class="form-group">
                        <label for="community_based_organization">Community-Based Organization</label>
                        <input type="text" class="form-control" name="community_based_organization" value="{{ $beneficiary->community_based_organization }}">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn submitbtton mt-3">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Success message div -->
<div id="successMessage" class="alert alert-success mt-3" style="display: none;">
    <strong>Success!</strong> Beneficiary registration updated successfully.
</div>
<script>
 $(document).ready(function() {
    // Handle form submission
    $('form').submit(function(event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Perform AJAX form submission
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                // Show success modal
                $('#successModal').modal('show');

                // Automatically close the modal after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    $('#successModal').modal('hide');
                    // Redirect to beneficiary index page after modal is closed
                    window.location.href = '/beneficiary';
                }, 6000);

                // Optionally, reset the form fields
                $('form')[0].reset();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // You can display an error message here if needed
            }
        });
    });

    // Close modal button action
    $('#successModal .btn-secondary').click(function() {
        $('#successModal').modal('hide');
        // Redirect to beneficiary index page after modal is closed
        window.location.href = '/beneficiary';
    });
});


</script>
        <script>
            $(document).ready(function () {
                // Fetch tank names from the API endpoint
                $.get('/tanks', function (data) {
                    // Populate the dropdown menu with tank names
                    $.each(data, function (index, tank) {
                        $('#tankDropdown').append($('<option>', {
                            value: tank.tank_name,
                            text: tank.tank_name
                        }));
                    });
                });
            });

            $(document).ready(function () {
                // Fetch ASC names from the API endpoint
                $.get('/asc', function (data) {
                    // Populate the dropdown menu with ASC names
                    $.each(data, function (index, asc) {
                        $('#ascDropdown').append($('<option>', {
                            value: asc.asc_name,
                            text: asc.asc_name
                        }));
                    });
                });
            });
        </script>


        {{-- dynamicalyy get dsd gnd --}}

<script>
        $(document).ready(function() {
            // Fetch provinces
            $.ajax({
                url: '/provinces',
                type: 'GET',
                success: function(data) {
                    // Populate province dropdown
                    $.each(data, function(index, province) {
                        $('#provinceDropdown').append($('<option>', {
                            value: province.id,
                            text: province.name
                        }));
                    });
                }
            });

            $(document).ready(function () {
             // Fetch cascade names from the API endpoint
                $.get('/cascades', function (data) {
                    // Populate the dropdown menu with cascade names
                    $.each(data, function (index, cascade) {
                        $('#cascadeDropdown').append($('<option>', {
                            value: cascade.cascade_name,
                            text: cascade.cascade_name
                        }));
                    });
                });
            });

            // Fetch districts based on selected province
            $('#provinceDropdown').change(function() {
                var provinceId = $(this).val();

                // Check if a province is selected
                if (provinceId !== '') {
                    // Clear the district and DS Division dropdowns
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));

                    // Fetch districts only if a valid province ID is selected
                    $.ajax({
                        url: '/provinces/' + provinceId + '/districts',
                        type: 'GET',
                        success: function(data) {
                            // Populate district dropdown
                            $.each(data, function(index, district) {
                                $('#districtDropdown').append($('<option>', {
                                    value: district.id,
                                    text: district.district
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the district and DS Division dropdowns if no province is selected
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden fields
                $('#provinceName').val('');
                $('#districtName').val('');
                $('#dsDivisionName').val('');
                $('#gndName').val('');
            });

            // Fetch DS Divisions based on selected district
            $('#districtDropdown').change(function() {
                var districtId = $(this).val();

                // Check if a district is selected
                if (districtId !== '') {
                    // Fetch DS Divisions only if a valid district ID is selected
                    $.ajax({
                        url: '/districts/' + districtId + '/ds-divisions',
                        type: 'GET',
                        success: function(data) {
                            // Clear the DS Division dropdown
                            $('#dsDivisionDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select DS Division'
                            }));

                            // Populate DS Division dropdown
                            $.each(data, function(index, dsDivision) {
                                $('#dsDivisionDropdown').append($('<option>', {
                                    value: dsDivision.id,
                                    text: dsDivision.division
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the DS Division dropdown if no district is selected
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                }
                // Reset hidden field
                $('#dsDivisionName').val('');
            });

            // Fetch GNDs based on selected DS Division
            $('#dsDivisionDropdown').change(function() {
                var dsDivisionId = $(this).val();

                // Check if a DS Division is selected
                if (dsDivisionId !== '') {
                    // Fetch GNDs only if a valid DS Division ID is selected
                    $.ajax({
                        url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            // Clear the GND dropdown
                            $('#gndDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select GND'
                            }));

                            // Populate GND dropdown
                            $.each(data, function(index, gnd) {
                                $('#gndDropdown').append($('<option>', {
                                    value: gnd.id,
                                    text: gnd.gn_division_name
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the GND dropdown if no DS Division is selected
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden field
                $('#gndName').val('');
            });

            // Update hidden fields when options are selected
            $('#provinceDropdown').change(function() {
                $('#provinceName').val($(this).find('option:selected').text());
            });

            $('#districtDropdown').change(function() {
                $('#districtName').val($(this).find('option:selected').text());
            });

            $('#dsDivisionDropdown').change(function() {
                $('#dsDivisionName').val($(this).find('option:selected').text());
            });

            $('#gndDropdown').change(function() {
                $('#gndName').val($(this).find('option:selected').text());
            });
        });
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


    </div>
    </div>
</body>
</html>
