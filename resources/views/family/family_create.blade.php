<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family Member Create</title>

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

/* Family Member Modal Styling */
.family-modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.family-modal-header {
    background: linear-gradient(135deg, #198754 0%, #145c32 100%);
    color: white;
    border-bottom: none;
    padding: 20px 25px;
}

.family-modal-header .modal-title {
    font-size: 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.family-modal-header .btn-close-white {
    filter: brightness(0) invert(1);
    opacity: 0.9;
}

.family-modal-header .btn-close-white:hover {
    opacity: 1;
}

.family-modal-body {
    padding: 30px;
    background: #f8f9fa;
}

.family-modal-body .form-group {
    margin-bottom: 20px;
}

.family-modal-body label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.family-modal-body label i {
    color: #198754;
    width: 20px;
}

.family-modal-body .form-control {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.family-modal-body .form-control:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
    outline: none;
}

.family-modal-body .form-check-group {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 8px;
}

.family-modal-body .form-check {
    margin: 0;
}

.family-modal-body .form-check-input {
    width: 18px;
    height: 18px;
    margin-top: 0.25rem;
    cursor: pointer;
}

.family-modal-body .form-check-input:checked {
    background-color: #198754;
    border-color: #198754;
}

.family-modal-body .form-check-label {
    margin-left: 8px;
    cursor: pointer;
    font-weight: 500;
}

.family-modal-footer {
    border-top: 2px solid #e0e0e0;
    padding: 20px 25px;
    background: white;
}

.family-modal-footer .btn {
    padding: 10px 30px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.family-modal-footer .btn-success {
    background: linear-gradient(135deg, #198754 0%, #145c32 100%);
    border: none;
    color: white;
}

.family-modal-footer .btn-success:hover {
    background: linear-gradient(135deg, #145c32 0%, #0d3d1f 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
}

.family-modal-footer .btn-secondary {
    background: #6c757d;
    border: none;
    color: white;
}

.family-modal-footer .btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
}

/* Trigger Button Styling */
.btn-primary.btn-lg {
    background: linear-gradient(135deg, #198754 0%, #145c32 100%);
    border: none;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-primary.btn-lg:hover {
    background: linear-gradient(135deg, #145c32 0%, #0d3d1f 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(25, 135, 84, 0.4);
}

.btn-primary.btn-lg i {
    font-size: 18px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .family-modal-body {
        padding: 20px;
    }
    
    .family-modal-body .row {
        margin: 0;
    }
    
    .family-modal-body .col-md-6 {
        padding: 0 10px;
        margin-bottom: 15px;
    }
    
    .family-modal-footer {
        flex-direction: column;
        gap: 10px;
    }
    
    .family-modal-footer .btn {
        width: 100%;
        justify-content: center;
    }
}

</style>

    <script>
        $(function() {
            // Initialize datepicker when modal is shown
            $('#familyMemberModal').on('shown.bs.modal', function () {
            // Initialize datepicker
            $("#dob").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0',
                changeYear: true,
                yearRange: '-100:+0',
                onSelect: function(selectedDate) {
                    calculateAge(selectedDate); // Calculate age when date is selected
                }
                });
            });

            function calculateAge(selectedDate) {
                var dob = new Date(selectedDate);
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                var month = today.getMonth() - dob.getMonth();
                if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                if (age < 35) {
                    $("#youth").val("Youth");
                } else {
                    $("#youth").val("Not Youth");
                }
            }

            // Reset form when modal is closed
            $('#familyMemberModal').on('hidden.bs.modal', function () {
                $('#familyMemberForm')[0].reset();
                $("#youth").val('');
            });
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


	<a href="{{ route('beneficiary.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

    </div>

    <!-- Button to trigger modal -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#familyMemberModal">
            <i class="fas fa-user-plus"></i> Add Family Member
        </button>
    </div>

    <!-- Family Member Registration Modal -->
    <div class="modal fade" id="familyMemberModal" tabindex="-1" aria-labelledby="familyMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content family-modal-content">
                <div class="modal-header family-modal-header">
                    <h5 class="modal-title" id="familyMemberModalLabel">
                        <i class="fas fa-users"></i> Family Member Registration
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body family-modal-body">
                    <form class="form-horizontal" id="familyMemberForm" action="/family" method="POST">
                @csrf
                        <input type="hidden" name="beneficiary_id" value="{{ $beneficiaryId }}">

                        <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="name_with_initials"><i class="fas fa-user"></i> Name with Initials</label>
                    <input type="text" name="name_with_initials" id="name_with_initials" class="form-control" required>
                                </div>
                </div>

                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="nic"><i class="fas fa-id-card"></i> Family Member NIC</label>
                    <input type="text" name="nic" id="nic" class="form-control" required>
                                </div>
                            </div>
                </div>

                        <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="phone"><i class="fas fa-phone"></i> Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>
                </div>

                            <div class="col-md-6">
                <div class="form-group">
                                    <label><i class="fas fa-venus-mars"></i> Gender</label>
                                    <div class="form-check-group">
                                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" required>
                        <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>

                        <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="dob"><i class="fas fa-calendar"></i> Date Of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" required>
                                </div>
                </div>

                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="youth"><i class="fas fa-child"></i> Youth Status</label>
                    <input type="text" name="youth" id="youth" class="form-control" readonly>
                                </div>
                            </div>
                </div>

                        <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="education"><i class="fas fa-graduation-cap"></i> Education Level</label>
                    <select class="form-control" id="education" name="education" required>
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

                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="income_source"><i class="fas fa-briefcase"></i> Income Source</label>
                    <input type="text" name="income_source" id="income_source" class="form-control" required>
                                </div>
                            </div>
                </div>

                        <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="income"><i class="fas fa-dollar-sign"></i> Income</label>
                    <input type="text" name="income" id="income" class="form-control" required>
                                </div>
                </div>

                            <div class="col-md-6">
                <div class="form-group">
                                    <label for="nutrition_level"><i class="fas fa-apple-alt"></i> Nutrition Level</label>
                    <input type="text" name="nutrition_level" id="nutrition_level" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer family-modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button type="submit" name="button" class="btn btn-success">
                                <i class="fas fa-check"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">
                        <i class="fas fa-check-circle"></i> Success
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <p class="mb-0">Family member registered successfully!</p>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

<!-- Success message div -->
<script>
    $(document).ready(function() {
        $('#familyMemberForm').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    // Close the family member modal
                    $('#familyMemberModal').modal('hide');
                    
                    // Show success modal
                    $('#successModal').modal('show');

                    // Automatically close success modal and redirect after 2 seconds
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                        // Redirect to the beneficiary show page after modal is closed
                        var beneficiaryId = $('input[name="beneficiary_id"]').val();
                        window.location.href = '/beneficiary/' + beneficiaryId;
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }
            });
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

</body>
</html>
