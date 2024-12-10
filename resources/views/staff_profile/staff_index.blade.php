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


    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

        .btn-back {
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
        }

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


    </style>
</head>
<body>
    <div class="frame">
        <!-- Include Dashboard -->
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>

        <div class="right-column">
            <!-- Back Button -->
            
            <div class="container">
            <a href="{{ route('dashboard') }}" class="btn-back mb-3">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>

                <h1 class="text-center mb-4" style="color: green;">Staff Profiles</h1>

                <!-- Add and CSV Actions -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('staff_profile.create') }}" class="btn btn-primary">Add Staff Profile</a>
                    
                </div>
                <div class="row">
            <!-- Total Staff -->
            <div class="row justify-content-center">
    <!-- Total Staff -->
    <div class="col-md-6 mb-4">
        <div class="card summary-card text-center">
            <div class="card-header summary-card-header bg-success text-white">
                Total Staff Members
            </div>
            <div class="card-body text-center summary-card-body">
                <h3>{{ $totalStaff }}</h3>
            </div>
        </div>
    </div>
</div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('searchstaff') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
<p>

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
    <button 
        type="button" 
        class="btn btn-sm status-toggle {{ $staffProfile->status === 'in_service' ? 'btn-success' : 'btn-danger' }}" 
        data-id="{{ $staffProfile->id }}" 
        data-status="{{ $staffProfile->status }}">
        {{ $staffProfile->status === 'in_service' ? 'In Service' : 'Resigned' }}
    </button>
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

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Showing {{ $staffProfiles->firstItem() }} to {{ $staffProfiles->lastItem() }} of {{ $staffProfiles->total() }} entries
                    </div>
                    <div>
                        {{ $staffProfiles->links() }}
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

        // Show SweetAlert confirmation
        Swal.fire({
            title: '<span style="color:#126926;">Are you sure?</span>',
            html: `<span style="color:#555;">Do you want to <b style="color:${currentStatus === 'in_service' ? '#d9534f' : '#5cb85c'};">${currentStatus === 'in_service' ? 'resign' : 'reinstate'}</b> this person?</span>`,
            icon: 'warning',
            iconColor: '#ffcc00',
            showCancelButton: true,
            confirmButtonColor: '#126926', // Confirm button color
            cancelButtonColor: '#d9534f', // Cancel button color
            confirmButtonText: '<b>Yes</b>',
            cancelButtonText: '<b>No</b>',
            customClass: {
                popup: 'custom-swal-popup', // Custom popup class
                title: 'custom-swal-title', // Custom title class
                content: 'custom-swal-content', // Custom content class
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
                                .text(response.new_status === 'in_service' ? 'In Service' : 'Resigned')
                                .data('status', response.new_status);

                            // Show SweetAlert success message
                            Swal.fire({
                                title: '<span style="color:#5cb85c;">Success!</span>',
                                html: `<span style="color:#555;">Status updated to <b>${response.new_status === 'in_service' ? 'In Service' : 'Resigned'}</b>.</span>`,
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




</body>
</html>
