<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Create</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/family_create.css')}} ">
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

        .datepicker-container {
            position: relative;
            display: inline-block;
        }

        .green-text {
            color: green;
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

    <script>
        $(function() {
            // Initialize datepicker
            $("#dob").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0', // Restrict selection to today or earlier
                changeYear: true, // Allow changing year
                yearRange: '-100:+0', // Allow selection of dates up to 100 years ago
                onSelect: function(selectedDate) {
                    calculateAge(selectedDate); // Calculate age when date is selected
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

        <a href="{{ route('cdf.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
                        <h2 class="mb-4" style="color: green;">CDF Member Registration</h2>
                    </div>

            <!-- Success Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h2 class="green-text">CDF Member Details successfully Registered.</h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="closeBtn">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
                <form class="form-horizontal" action="{{ route('cdfmembers.store') }}" method="POST" id="cdfForm">
                    @csrf


                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="cdf_name">CDF Name</label>
                            <input type="text" name="cdf_name" id="cdf_name" class="form-control" value="{{ old('cdf_name', request()->get('cdf_name')) }}" readonly required>
                        </div>

                        <div class="col-6 form-group">
                            <label for="cdf_address">CDF Address</label>
                            <input type="text" name="cdf_address" id="cdf_address" class="form-control" value="{{ old('cdf_address', request()->get('cdf_address')) }}" readonly required>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-6 form-group">
                        <label for="member_name">Member Name</label>
                        <input type="text" name="member_name" id="member_name" class="form-control" required>
                    </div>

                    <div class="col-6 form-group">
                        <label for="member_nic">NIC Number</label>
                        <input type="text" name="member_nic" id="member_nic" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="address">Member Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>

                    <div class="col-6 form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                    </div>
                </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" required>
                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="datepicker-trigger" alt="calendar">
                    </div>

                    <div class="col-6 form-group">
                        <label for="youth">Youth</label>
                        <input type="text" name="youth" id="youth" class="form-control" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="position">Position</label>
                        <select class="form-control" id="position" name="position" required>
                            <option value="">Select Position</option>
                            <option value="President">President</option>
                            <option value="Vice President">Vice President</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Vice Secretary">Vice Secretary</option>
                            <option value="Treasurer">Treasurer</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>

                    <div class="col-6 form-group">
                        <label for="representing_organization">Representing Organization</label>
                        <input type="text" name="representing_organization" id="representing_organization" class="form-control" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3" id="submitBtn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cdfForm').submit(function(event) {
                event.preventDefault();

                // Disable the submit button to prevent multiple submissions
                $('#submitBtn').attr('disabled', true);

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#successModal').modal('show');
                        setTimeout(function() {
                            $('#successModal').modal('hide');
                            // Redirect to /cdfmembers after hiding the modal
                            window.location.href = '/cdf';
                        }, 2000);
                        $('#cdfForm')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Re-enable the submit button if there's an error
                        $('#submitBtn').attr('disabled', false);
                    }
                });
            });

            // Redirect to /cdfmembers when Close button is clicked
            $('#closeBtn').click(function() {
                window.location.href = '/cdf';
            });
        });
    </script>

</body>
</html>
