<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Profiles</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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

        /* .btn-back {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: darkgreen;
        } */

        .card-header {
            background-color: #126926;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #126926;
            border-color: #126926;
        }

        .table thead th {
            background-color: #126926;
            color: white;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }

        .btn-action {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-action.view {
            background-color: #60c267;
            text-decoration: none; /* Removes underline */
        }

        .btn-action.edit {
            background-color: #ffeeba;
        }

        .btn-action.delete {
            background-color: #f5c6cb;
        }

        .btn-action i {
            color: white;
            font-size: 1rem;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }
        .summary-card {
    border: 2px solid green;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.summary-card-header {
    font-size: 1rem;
    font-weight: bold;
}

.summary-card-body h3 {
    font-size: 1.5rem;
    color: green;
    margin: 0;
}
.custom-swal-popup {
    border: 2px solid #126926; /* Green border */
    border-radius: 15px; /* Rounded corners */
    background-color: #f8f9fa; /* Light background */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
}

/* Customize SweetAlert title */
.custom-swal-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #126926; /* Green color */
}

/* Customize SweetAlert content */
.custom-swal-content {
    font-size: 1rem;
    color: #555; /* Dark gray content */
}

/* Customize SweetAlert buttons */
.swal2-confirm {
    background-color: #126926 !important; /* Green button */
    border: none !important;
    color: white !important;
    font-weight: bold !important;
    padding: 10px 20px !important;
    border-radius: 5px !important;
    transition: all 0.3s ease-in-out;
}

.swal2-confirm:hover {
    background-color: #0f5823 !important; /* Darker green on hover */
}

.swal2-cancel {
    background-color: #d9534f !important; /* Red button */
    border: none !important;
    color: white !important;
    font-weight: bold !important;
    padding: 10px 20px !important;
    border-radius: 5px !important;
    transition: all 0.3s ease-in-out;
}

.swal2-cancel:hover {
    background-color: #b52b27 !important; /* Darker red on hover */
}

/* Success popup customization */
.custom-swal-success-popup {
    border: 2px solid #5cb85c; /* Success green border */
}

/* Error popup customization */
.custom-swal-error-popup {
    border: 2px solid #d9534f; /* Error red border */
}

.btn-success {
    background-color: green;
}

.card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1; /* Blue color example */
            color: #0d0e0d; /* Text color */
        }

        .pagination .page-item {
            margin: 0 0px; /* Adjust the margin to reduce space */
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
        <!-- Include Dashboard -->
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

    <a href="{{ route('staff_profile.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>


            <div class="col-md-12 text-center">
                <h2 class="header-title" style="color: green;">Staff Profiles</h2>
            </div>

                <!-- Add and CSV Actions -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('staff_profile.create') }}" class="btn btn-success">Add Staff Profile</a>

                </div>



    <div class="row justify-content-center mt-4">
    <div class="container mt-4">
    <div class="d-flex justify-content-center">
        <!-- Total Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
            Total Staff Members
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalStaff }}</h5>

            </div>
        </div>

        <!-- Ongoing Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
            Male Staff Members
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $maleStaff }}</h5>

            </div>
        </div>

        <!-- Completed Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
            Female Staff Members
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $femaleStaff }}</h5>

            </div>
        </div>
    </div>
    </div>
    </div>

</br>
                <!-- Search Form -->
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                            <form method="GET" action="{{ route('searchstaff') }}" class="form-inline">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>



                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Staff Profiles Table -->
                <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name with Initials</th>
            <th>NIC Number</th>
            <th>Designation</th>
            <th>Contact Number</th>
            <th>Salary</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffProfiles as $staffProfile)
            <tr>
                <!-- Display Staff Photo -->
                <td>
                    @if($staffProfile->photo)
                        <img src="{{ asset('storage/' . $staffProfile->photo) }}" alt="Staff Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        <img src="{{ asset('assets/images/default-user.png') }}" alt="Default Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif
                </td>
                <td>{{ $staffProfile->name_with_initials }}</td>
                <td>{{ $staffProfile->nic_number }}</td>
                <td>{{ $staffProfile->designation }}</td>
                <td>{{ $staffProfile->contact_number }}</td>
                <td>{{ $staffProfile->salary ? 'LKR ' . number_format($staffProfile->salary, 2) : 'N/A' }}</td>
                <td>
    @if ($staffProfile->status === 'in_service')
        <button
            type="button"
            class="btn btn-sm status-toggle btn-success"
            data-id="{{ $staffProfile->id }}"
            data-status="{{ $staffProfile->status }}">
            In Service
        </button>
    @else
    <button
        type="button"
        class="btn btn-sm status-toggle {{ $staffProfile->status === 'in_service' ? 'btn-success' : 'btn-danger' }}"
        data-id="{{ $staffProfile->id }}"
        data-status="{{ $staffProfile->status }}">

        {{ $staffProfile->status === 'in_service' ? 'In Service' : 'Resigned' }}
    </button>
    @endif
</td>





                <td>
                    <!-- View Button -->
                    <a href="{{ route('staff_profile.show', $staffProfile->id) }}" class="btn-action view" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <!-- Edit Button -->
                    <a href="{{ route('staff_profile.edit', $staffProfile->id) }}" class="btn-action edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('staff_profile.destroy', $staffProfile->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action delete" title="Delete" onclick="return confirm('Are you sure you want to delete this staff profile?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
<nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item {{ $staffProfiles->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $staffProfiles->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $staffProfiles->currentPage();
                                    $lastPage = $staffProfiles->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $staffProfiles->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $staffProfiles->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $staffProfiles->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $staffProfiles->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $staffProfiles->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Showing {{ $staffProfiles->firstItem() }} to {{ $staffProfiles->lastItem() }} of {{ $staffProfiles->total() }} entries
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).on('click', '.status-toggle', function () {
    let button = $(this);
    let staffId = button.data('id');
    let currentStatus = button.data('status');

    // Always show "Action Blocked" message for resigned status
    if (currentStatus === 'resigned') {
        Swal.fire({
            title: '<span style="color:#d9534f;">Action Blocked</span>',
            html: '<span style="color:#555;">This staff member is already resigned. No further changes allowed.</span>',
            icon: 'info',
            iconColor: '#d9534f',
            timer: 2000,
            showConfirmButton: false,
            customClass: {
                popup: 'custom-swal-error-popup'
            }
        });
        return;
    }

    // Show SweetAlert confirmation for other statuses
    Swal.fire({
        title: '<span style="color:#126926;">Are you sure?</span>',
        html: `<span style="color:#555;">Do you want to <b style="color:${currentStatus === 'in_service' ? '#d9534f' : '#5cb85c'};">${currentStatus === 'in_service' ? 'resign' : 'reinstate'}</b> this person?</span>`,
        icon: 'warning',
        iconColor: '#ffcc00',
        showCancelButton: true,
        confirmButtonColor: '#126926',
        cancelButtonColor: '#d9534f',
        confirmButtonText: '<b>Yes</b>',
        cancelButtonText: '<b>No</b>',
        customClass: {
            popup: 'custom-swal-popup',
            title: 'custom-swal-title',
            content: 'custom-swal-content',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request
            $.ajax({
                url: `/staff_profile/${staffId}/status`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        // Update button appearance and text
                        button
                            .toggleClass('btn-success btn-danger')
                            .text(response.new_status === 'in_service' ? 'Okay' : 'Resigned')
                            .data('status', response.new_status);

                        // Show SweetAlert success message
                        Swal.fire({
                            title: '<span style="color:#5cb85c;">Success!</span>',
                            html: `<span style="color:#555;">Status updated to <b>${response.new_status === 'in_service' ? 'Okay' : 'Resigned'}</b>.</span>`,
                            icon: 'success',
                            iconColor: '#5cb85c',
                            timer: 2000,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'custom-swal-success-popup'
                            }
                        });
                    }
                },
                error: function () {
                    // Show SweetAlert error message
                    Swal.fire({
                        title: '<span style="color:#d9534f;">Error!</span>',
                        html: '<span style="color:#555;">Failed to update status. Please try again.</span>',
                        icon: 'error',
                        iconColor: '#d9534f',
                        timer: 2000,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'custom-swal-error-popup'
                        }
                    });
                }
            });
        }
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
