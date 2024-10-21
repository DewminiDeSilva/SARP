<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Family Member</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/family_create.css') }}">
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

            // Pre-fill youth field based on current dob
            calculateAge("{{ $family->dob }}");
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
                       Family Member Details successfully updated.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="/family/{{ $family->id }}" method="POST">
                <div class="col-md-12">
                    <h2 class="mb-4">Edit Family Member</h2>
                </div>

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name_with_initials">Name with Initials</label>
                    <input type="text" name="name_with_initials" id="name_with_initials" class="form-control" value="{{ $family->name_with_initials }}" required>
                </div>

                <div class="form-group">
                    <label for="nic">Family Member NIC</label>
                    <input type="text" name="nic" id="nic" class="form-control" value="{{ $family->nic }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $family->phone }}" required>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $family->gender == 'Male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $family->gender == 'Female' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ $family->gender == 'Other' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob" value="{{ $family->dob }}" placeholder="Select Date of Birth" required>
                </div>

                <div class="form-group">
                    <label for="youth">Youth</label>
                    <input type="text" name="youth" id="youth" class="form-control" value="{{ $family->youth }}" readonly>
                </div>

                <div class="form-group">
                    <label for="education">Education Level</label>
                    <select class="form-control" id="education" name="education" required>
                        <option value="">Select Education Level</option>
                        <option value="Primary" {{ $family->education == 'Primary' ? 'selected' : '' }}>Primary</option>
                        <option value="Secondary" {{ $family->education == 'Secondary' ? 'selected' : '' }}>Secondary</option>
                        <option value="Higher Secondary" {{ $family->education == 'Higher Secondary' ? 'selected' : '' }}>Higher Secondary</option>
                        <option value="Graduate" {{ $family->education == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                        <option value="Post Graduate" {{ $family->education == 'Post Graduate' ? 'selected' : '' }}>Post Graduate</option>
                        <option value="Others" {{ $family->education == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="income_source">Income Source</label>
                    <input type="text" name="income_source" id="income_source" class="form-control" value="{{ $family->income_source }}" required>
                </div>

                <div class="form-group">
                    <label for="income">Income</label>
                    <input type="text" name="income" id="income" class="form-control" value="{{ $family->income }}" required>
                </div>

                <div class="form-group">
                    <label for="nutrition_level">Nutrition Level</label>
                    <input type="text" name="nutrition_level" id="nutrition_level" class="form-control" value="{{ $family->nutrition_level }}" required>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
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

                    // Automatically close the modal after 2 seconds
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                        // Redirect to the beneficiary show page after modal is closed
                        window.location.href = '/beneficiary/' + {{ $family->beneficiary_id }};
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>
