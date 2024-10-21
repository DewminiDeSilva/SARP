<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARP APP</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom styles for your application */
        .entries-container {
            display: flex;
            align-items: center;
        }
        .entries-container label {
            margin-bottom: 0;
        }
        .entries-container select {
            display: inline-block;
            width: auto;
        }
        /* Add more custom styles as needed */
    </style>
    <style>
        .container {
            margin-top: 50px;
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

        /* Adjust button width to fit the content */
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }

        /* Center align labels */
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
    </style>

<style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
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

        .submitbtton{
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
        }

        .button-container {
        display: flex;
        gap: 10px; /* Adjust the gap between buttons as needed */
    }

    .custom-button {
            background-color: white;
            color: red;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: border 0.3s ease; /* Smooth transition for border */
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            background-color: #f5c6cb;
        }

        .custom-button:hover {
            border-color: red; /* Border appears on hover */
            background-color: #f5c6cb;
        }

        .edit-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .edit-button:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .view-button {
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }

        .view-button:hover {
            border-color: green; /* Border appears on hover */
            background-color: #60C267; /* Slightly darker light yellow on hover */
        }

        /*pagination css*/
        .pagination .page-item {
            margin:  0px; /* Adjust the margin to reduce space */
        }
        .pagination .page-link {
            padding: 5px 10px; /* Adjust padding to control button size */
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }

        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color : #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }

        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .pagination-container nav {
            margin-bottom: 10px; /* Adjust spacing as needed */
        }

        #tableInfo {
            text-align: center;
            width: 100%;
        }

        .addmember {
            background-color: white; /* White background */
            color: white; /* White color */
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            /*transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: green; /* Slightly darker light yellow on hover */
        }

        .addmember:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .custom-border {
            border-color: darkgreen !important;
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

    <a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>


        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Farmer Organization Registration</h2>
        </div>

    <!-- form -->
    <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">

    </br>
        <form class="form-horizontal" method="POST" action="{{ route('farmerorganization.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="province" class="form-label dropdown-label">Province</label>
                        <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select Province</option>
                        </select>
                        <input type="hidden" id="provinceName" name="province_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="district" class="form-label dropdown-label">District</label>
                        <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select District</option>
                        </select>
                        <input type="hidden" id="districtName" name="district_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="dsd" class="form-label dropdown-label">DSD</label>
                        <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select DSD</option>
                        </select>
                        <input type="hidden" id="dsDivisionName" name="ds_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="gnd" class="form-label dropdown-label">GND</label>
                        <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select GND</option>
                        </select>
                        <input type="hidden" id="gndName" name="gn_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="asc" class="form-label dropdown-label">ASC</label>
                        <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select ASC</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="tank" class="form-label dropdown-label">Select Tank Name</label>
                        <select class="form-control btn btn-success" id="tankDropdown" name="tank_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                            <option value="">Select Tank</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="dropdown">
                        <label for="cascadeDropdown" class="form-label dropdown-label">Cascade Name</label>
                        <select class="form-control btn btn-success" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                            <option value="">Select Cascade name</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="registration_number" class="form-label dropdown-label">Registration Number</label>
                    <input type="text" id="registration_number" name="registration_number" class="form-control" required>
                </div>
                <div class="col">
                    <label for="organization_name" class="form-label dropdown-label">Farmer Organization Name</label>
                    <input type="text" id="organization_name" name="organization_name" class="form-control" required>
                </div>

            </div>
    </br>

            <div class="col">
                    <label for="address" class="form-label dropdown-label">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

            <div class="row mt-3">

                <div class="col">
                    <label for="registration_institute" class="form-label dropdown-label">Registration Institute</label>
                    <input type="text" id="registration_institute" name="registration_institute" class="form-control" required>
                </div>
                <div class="col">
                    <label for="edate" class="form-label dropdown-label">Establish Date</label>

                    <input type="text" class="form-control" id="dob" name="edate" placeholder="Select Established Date" required>
                    <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="datepicker-trigger" alt="calendar">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                <div class="text-center">
                    <button type="submit" class="btn submitbtton">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Success message div -->
<div id="successMessage" class="alert alert-success mt-3" style="display: none;">
    <strong>Success!</strong> Farmer Organization registration completed successfully.
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
});

</script>




                <!-- Pagination links -->


    <!-- Add Bootstrap JS and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- JavaScript for handling entry selection and pagination -->
    <script>


        function updateEntries() {
            const entries = document.getElementById('entriesSelect').value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('entries', entries);
            window.location.search = urlParams.toString();
        }
    </script>


    <!--form script-->

    <script>

        $(document).ready(function () {
            // Fetch tank names from the API endpoint
            $.get('/tanks', function (data) {
                // console.log(data);
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>





<script>
    $(function() {
        // Initialize datepicker
        $("#dob").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: '0', // Restrict selection to today or earlier
            changeYear: true, // Allow changing year
            yearRange: '-100:+0', // Allow selection of dates up to 100 years ago
            onSelect: function() {
                calculateAge();
            }
        });

        // Function to calculate age
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

        // Call calculateAge function initially to set the age based on the initial dob value
        calculateAge();
    });
</script>









<style>
        .ui-datepicker {
            font-size: 14px; /* Adjust font size */
            background: #f0f0f0; /* Background color */
            border: 1px solid #ddd; /* Border style */
            padding: 10px; /* Padding around calendar */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        }
        .ui-datepicker-header {
            background: green; /* Header background color */
            color: white; /* Header text color */
            border-bottom: 1px solid #005bb5; /* Header border */
            padding: 10px; /* Header padding */
        }
        .ui-datepicker-title {
            font-size: 16px; /* Title font size */
            font-weight: bold; /* Title font weight */
        }
        .ui-datepicker-prev, .ui-datepicker-next {
            background: green; /* Prev/Next button background */
            color: white; /* Prev/Next button text color */
            border-radius: 4px; /* Prev/Next button corners */
            padding: 5px; /* Prev/Next button padding */
            margin: 0 10px; /* Space around the buttons */
        }
        .ui-datepicker-calendar th {
            background: green; /* Table header background */
            color: #333; /* Table header text color */
        }
        .ui-datepicker-calendar td {
            padding: 8px; /* Table cell padding */
            border-radius: 4px; /* Table cell corners */
        }
        .ui-datepicker-calendar .ui-state-hover {
            background: #d6e9f8; /* Hover background */
        }
        .ui-datepicker-calendar .ui-state-active {
            background: #0073e6; /* Active date background */
            color: white; /* Active date text color */
        }
    </style>






</body>
</html>
