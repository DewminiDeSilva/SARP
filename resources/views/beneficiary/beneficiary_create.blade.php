<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('assets/css/beneficiary_create.css')}} ">
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
.custom-border {
    border: 2px solid green;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-color: darkgreen !important;
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
    width: 550px; /* Set a consistent width for dropdowns */

}

.greenbackground {
    background-color: #198754; /* Green background color */
    color: #fff; /* White text color for contrast */
    border: 1px solid #198754; /* Matching border color */
}

.greenbackground option {
    background-color: #198754; /* Green background for options */
    color: #fff; /* White text color for options */
}

/* Maintain green background for selected option */
.greenbackground option:checked {
    background-color: #145c32; /* Darker green for selected option */
    color: #fff; /* White text color for selected option */
}

.greenbackground:focus {
    border-color: #145c32; /* Darker green border on focus */
    box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.25); /* Subtle shadow to match green theme */
}

.dropdown-label {
    text-align: left;
    font-size: 16px;
}



.form-row {
    display: flex;
    justify-content: space-between; /* Distributes space between items */
    flex-wrap: wrap; /* Allows wrapping if needed */
    margin-bottom: 20px; /* Space between rows */
}

.form-group {
    flex: 1; /* Allows form groups to grow equally */
    margin-right: 15px; /* Space between the two form groups */
}

.form-group:last-child {
    margin-right: 0; /* Remove margin for the last item */
}

.form-control {
    width: 550px; /* Ensure dropdowns take full width of their container */
}

.form-label {
    display: block; /* Ensures the label takes full width */
    margin-bottom: 5px; /* Space between label and select input */
}

.three-dropdown-row {
    display: flex;
    justify-content: space-between;
    gap: 15px; /* Space between the dropdowns */
    margin-bottom: 20px; /* Space below the row */
}

.three-dropdown-row .dropdown {
    flex: 1;
}

.three-dropdown-row .form-control,
.three-dropdown-row .dropdown-toggle {
    width: 100%; /* Ensure full width within each dropdown container */
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

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Beneficiary Registration</h2>
        </div>



    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
               Beneficiary Details successfully Registerd.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    <div class="container mt-5 border rounded p-4 custom-border" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
    <form action="{{ route('beneficiary.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Tank and Province -->
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
                <label for="dsDivisionDropdown" class="form-label dropdown-label">DS Division</label>
                <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" required>
                    <option value="">Select DS Division</option>
                </select>
                <input type="hidden" id="dsDivisionName" name="ds_division_name">
            </div>
        </div>

        <div class="col">
            <div class="dropdown">
                <label for="gndDropdown" class="form-label dropdown-label">GN Division</label>
                <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                    <option value="">Select GN Division</option>
                </select>
                <input type="hidden" id="gndName" name="gn_division_name">
            </div>
        </div>

    </div>

</br>

    <div class="three-dropdown-row">

        <div class="col">
            <div class="dropdown">
                <label for="ascDropdown" class="form-label dropdown-label">Select ASC</label>
                <select class="btn btn-success dropdown-toggle" id="ascDropdown" name="as_center" required>
                    <option value="">Select ASC</option>
                </select>
            </div>
        </div>

        <div class="col">
            <div class="dropdown">
                <label for="tankDropdown" class="form-label dropdown-label">Select Tank Name</label>
                <select id="tankDropdown" class="btn btn-success dropdown-toggle" name="tank_name" required>
                    <option value="" class="greenbackground">Select Tank</option>
                </select>
            </div>
        </div>

        <div class="col">
            <div class="dropdown">
                <label for="tank" class="form-label dropdown-label">Cascade Name</label>
                <select class="form-control btn btn-success" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                    <option value="">Select Cascade name</option>
                </select>
            </div>
        </div>


    </div>







    <!-- GND and ASC -->
    <div class="form-row">

        <div class="form-group">
            <label for="ai_division">AI Division</label>
            <input type="text" class="form-control" name="ai_division" placeholder="Enter AI Division" required>
        </div>

        <div class="form-group">
            <label for="nic">Beneficiary NIC</label>
            <input type="text" class="form-control" name="nic" placeholder="Enter Beneficiary NIC" required>
        </div>

    </div>

    <!-- NIC, Name with Initials, Gender, DOB, Address, and Age -->
    <div class="form-row">

        <div class="form-group">
            <label for="name_with_initials">Name with Initials</label>
            <input type="text" class="form-control" name="name_with_initials" placeholder="Enter Name with Initials" required>
        </div>

        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control datepicker-container" id="dob" name="dob" placeholder="Select Date of Birth" required>
        </div>
    </div>

    <!-- Gender -->
    <div class="form-group">
        <label>Gender</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
        <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
        <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="other" value="other" required>
        <label class="form-check-label" for="other">Other</label>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="Age" readonly>
        </div>

        <div class="form-group">
        <label for="education">Education Level</label>
            <select class="form-control" name="education" required>
                <option value="">Select Education Level</option>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="Higher Secondary">Higher Secondary</option>
                <option value="Graduate">Graduate</option>
                <option value="Post Graduate">Post Graduate</option>
                <option value="Others">Others</option>
            </select>
        </div>

    </div>









    <!-- Phone, Address, and Family Members Count -->
    <div class="form-row">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
        </div>

        <div class="form-group">
            <label for="phone">Mobile Number</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number(s)">
            <small class="form-text text-muted">Separate multiple numbers with comma (,)</small>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
        </div>

        <div class="form-group">
            <label for="number_of_family_members">Number of Family Members</label>
            <input type="number" class="form-control" name="number_of_family_members" placeholder="Enter Number of Family Members" required>
        </div>

    </div>

    <!-- Land Ownership and Coordinates -->
    <div class="form-row">
        <div class="form-group">
            <label for="land_ownership_total_extent">Land Ownership (Total Extent)</label>
            <input type="text" class="form-control" name="land_ownership_total_extent" placeholder="Enter Total Land Extent" required>
        </div>
        <div class="form-group">
            <label for="land_ownership_proposed_cultivation_area">Proposed Cultivation Area</label>
            <input type="text" class="form-control" name="land_ownership_proposed_cultivation_area" placeholder="Enter Proposed Cultivation Area" required>
        </div>
    </div>

    <!-- Latitude and Longitude -->
    <div class="form-row">
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" name="latitude" placeholder="Enter Latitude">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" name="longitude" placeholder="Enter Longitude">
        </div>
    </div>

    <!-- Income Source and Assets -->
    <div class="form-row">
        <div class="form-group">
            <label for="income_source">Income Source</label>
            <input type="text" class="form-control" name="income_source" placeholder="Enter Income Source" required>
        </div>
        <div class="form-group">
            <label for="average_income">Average Income</label>
            <input type="text" class="form-control" name="average_income" placeholder="Enter Average Income" required>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="monthly_household_expenses">Monthly Household Expenses</label>
            <input type="text" class="form-control" name="monthly_household_expenses" placeholder="Enter Monthly Household Expenses" required>
        </div>
        <div class="form-group">
            <label for="household_level_assets_description">Household Level Assets Description</label>
            <input type="text" class="form-control" name="household_level_assets_description" placeholder="Enter Household Level Assets" required>
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
                <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name" required>
            </div>
            <div class="form-group">
                <label for="bank_branch">Bank Branch</label>
                <input type="text" class="form-control" name="bank_branch" placeholder="Enter Bank Branch" required>
            </div>
            <div class="form-group">
                <label for="account_number">Account Number</label>
                <input type="text" class="form-control" name="account_number" placeholder="Enter Account Number" required>
            </div>
        </div>
    </div>

</br>

    <div class="form-row">
        <div class="form-group">
            <label for="head_of_householder_name">Head of Householder Name</label>
            <input type="text" class="form-control" name="head_of_householder_name" placeholder="Enter Head of Householder Name" required>
        </div>
        <div class="form-group">
            <label for="householder_number">Householder Number</label>
            <input type="text" class="form-control" name="householder_number" placeholder="Enter Householder Number" required>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="form-row">

        <div class="form-group">
            <label for="type_of_water_resource">Type of Water Resource</label>
            <input type="text" class="form-control" name="type_of_water_resource" placeholder="Enter Type of Water Resource" required>
        </div>
        <div class="form-group">
            <label for="training_details_description">Training Details Description</label>
            <input type="text" class="form-control" name="training_details_description" placeholder="Enter Training Details Description">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group">
            <label for="community_based_organization">Community-Based Organization</label>
            <input type="text" class="form-control" name="community_based_organization" placeholder="Enter Community-Based Organization">
        </div>

    </div>

    <!-- Submit Button -->
    <div class="d-flex justify-content-center align-items-center">
        <button type="submit" name="button" class="btn submitbtton mt-3">Submit</button>
    </div>

    </form>


        </div>

        </div>
<!-- Success message div -->
<div id="successMessage" class="alert alert-success mt-3" style="display: none;">
    <strong>Success!</strong> Beneficiary registration completed successfully.
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
            // Populate the province dropdown
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
        $('#provinceName').val($(this).find('option:selected').text()); // Store province name in hidden input

        if (provinceId !== '') {
            // Clear and reset the district dropdown
            $('#districtDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select District'
            }));

            // Fetch districts from the selected province
            $.ajax({
                url: '/provinces/' + provinceId + '/districts',
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, district) {
                        $('#districtDropdown').append($('<option>', {
                            value: district.id,
                            text: district.district
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
    });

    // Fetch DS Divisions based on selected district
    $('#districtDropdown').change(function() {
        var districtId = $(this).val();
        $('#districtName').val($(this).find('option:selected').text()); // Store district name in hidden input

        if (districtId !== '') {
            // Clear and reset the DS Division dropdown
            $('#dsDivisionDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select DS Division'
            }));

            // Fetch DS Divisions from the selected district
            $.ajax({
                url: '/districts/' + districtId + '/ds-divisions',
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, dsDivision) {
                        $('#dsDivisionDropdown').append($('<option>', {
                            value: dsDivision.id,
                            text: dsDivision.division
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
    });

    // Fetch GN Divisions based on selected DS Division
    $('#dsDivisionDropdown').change(function() {
        var dsDivisionId = $(this).val();
        $('#dsDivisionName').val($(this).find('option:selected').text()); // Store DS Division name in hidden input

        if (dsDivisionId !== '') {
            // Clear and reset the GN Division dropdown
            $('#gndDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select GN Division'
            }));

            // Fetch GN Divisions from the selected DS Division
            $.ajax({
                url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, gnd) {
                        $('#gndDropdown').append($('<option>', {
                            value: gnd.id,
                            text: gnd.gn_division_name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
    });

    // Store the GN Division name in hidden input
    $('#gndDropdown').change(function() {
        $('#gndName').val($(this).find('option:selected').text());
    });
});

</script>




    </div>
    </div>
</body>
</html>
