<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmer Member Edit</title>
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
        /* Optional: Style for calendar icon */
        .ui-datepicker-trigger {
            margin-left: 5px;
            cursor: pointer;
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

    .border-green {
        border-color: green !important;
    }

    .shadow-custom {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="center-heading" style="text-align: center;">
            <h1 style="font-size: 2.5rem; color: green;">Farmer Organization Member Details Edit</h1>
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
               Farmer Organization Member Details Edit successfully Edited.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="container mt-5 border rounded border-primary p-4 border-green shadow-custom">
        
        <form class="form-horizontal" method="POST" action="{{ route('farmer_member.update', $farmer_member->id) }}">

    @csrf
    @method('PUT')



            <div class="row">
                <div class="col-md-12">


                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="member_name">Member Name</label>
                        <input type="text" class="form-control"  name="member_name" value="{{ $farmer_member->member_name }}" placeholder="Enter Name" required>
                        </div>

                        <div class="col-md-6">
                        <label for="member_id">Member ID Number</label>
                        <input type="text" class="form-control"  name="member_id" value="{{$farmer_member->member_id}}" placeholder="Enter Member ID Number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="member_position">Member Position</label>
                        <input type="text" class="form-control" id="member_position" name="member_position" value="{{$farmer_member->member_position}}" placeholder="Member Position" required>
                        </div>
                        <div class="col-md-6">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$farmer_member->contact_number}}" placeholder="Contact Number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$farmer_member->address}}" placeholder="Address" required>
                </div>

                <div class="form-group">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $farmer_member->gender == 'Male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $farmer_member->gender == 'Female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ $farmer_member->gender == 'Other' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob" value="{{$farmer_member->dob}}" placeholder="Select Date of Birth" required>

                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="ui-datepicker-trigger" alt="calendar">
                        </div>

                        <div class="col-md-6">
                        <label for="age">Youth</label>
                        <input type="text" class="form-control" id="youth" name="youth" value="{{$farmer_member->youth}}" placeholder="Youth" readonly >
                        </div>
                    </div>


                    <div class="text-center">
                    <button type="submit" class="btn submitbtton">Save Changes</button>
                    </div>
</form>
<!-- Success message js -->
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

                    // Automatically close the modal after 2 seconds
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                        // Redirect to the farmer organization show page
                        window.location.href = '{{ route('farmerorganization.show', $farmer_member->farmerorganization_id) }}';
                    }, 2000);

                    // Optionally, reset the form fields
                    $('form')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
