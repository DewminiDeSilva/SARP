<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tank details</title>
 <!-- Add jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

 <!-- Add Bootstrap JS -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

 <style>
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

    .frame {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }

    .left-column {
        flex: 0 0 20%;
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
    }

    .icon-action {
        display: inline-block;
        margin-right: 5px;
    }

    .icon-action .fas {
        font-size: 1.2rem;
    }

    .icon-action .fas.fa-edit {
        color: green;
    }

    .icon-action .fas.fa-eye {
        color: blue;
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


	<a href="{{ route('tank_rehabilitation.index') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-arrow-left"></i> Back to Tank List
    </a>
    

</div>

            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h1 style="font-size: 2.5rem; color: green;">Tank Rehabilitation Details</h1>
                </div>

                <div class="container">
    <div class="row justify-content-center mt-4">
        <!-- Total Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Total Tanks
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $tankRehabilitations->total() }}</h5>
                <p class="card-text">Total tanks currently in the system.</p>
            </div>
        </div>

        <!-- Ongoing Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Ongoing
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $ongoingCount }}</h5>
                <p class="card-text">Tanks currently undergoing rehabilitation.</p>
            </div>
        </div>

        <!-- Completed Tanks Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Completed
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $completedCount }}</h5>
                <p class="card-text">Tanks that have completed rehabilitation.</p>
            </div>
        </div>
    </div>

    <!-- View Map Button -->
    <div class="row justify-content-center mt-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#mapModal" style="width: 200px;">All Tanks View Map<br>Srilanka</button>
    </div>
</div>

<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Tank Locations Map</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Map Container -->
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>


        <div class="right-column">

            <div class="container-fluid">


                <div class="d-flex justify-content-between mb-3">
                    <a href="{{route('tank_rehabilitation.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Tank Details</a>
                    <a href="{{route('downloadtank.csv')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form -->
                    <form action="{{ route('tank_rehabilitation.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <button id="deleteSelectedBtn" class="btn btn-danger">
                            Delete Selected
                        </button>
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                       
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                        
                        
                    </form>
                    <!-- Search form -->
                    <form method="GET" action="{{ route('searchTank') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                
                <!-- Success Message Popup -->
                @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#28a745'
        }).then(() => {
            window.location.href = "{{ route('tank_rehabilitation.index') }}";
        });
    });
</script>
@endif





                <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="entries-container">
                                <label for="entriesSelect">Show</label>
                                <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                    <option value="10" {{ $tankRehabilitations->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $tankRehabilitations->perPage() == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ $tankRehabilitations->perPage() == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $tankRehabilitations->perPage() == 100 ? 'selected' : '' }}>100</option>
                                </select>
                                <label for="entriesSelect">entries</label>
                            </div>
                            <div id="tableInfo" class="text-right"></div>
                        </div>

                <div class="row table-container">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th>Tank Id</th>
                                    <th>Tank Name</th>
                                    <th>River Basin</th>
                                    <th>Cascade Name</th>
                                  <!--  <th>Province</th>
                                    <th>District</th>
                                    <th>DS Division</th>
                                    <th>GN Division</th>
                                    <th>AS Centre</th>
                                    <th>Agency</th>
                                    <th>No. of Family</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th> -->
                                    <th>Progress</th>
                                    <!-- <th>Contractor</th> -->
                                    <!-- <th>Open Ref No</th> New field -->
                                    <th>Awarded Date</th> <!-- New field -->
                                    <th>Cumulative Paid Amount</th> <!-- New field -->
                                    <th>Paid Advanced Amount</th> <!-- New field -->
                                    <th>Recommended IPC No</th> <!-- New field -->
                                    <th>Recommended IPC Amount</th> <!-- New field -->
                                    <!-- <th>Payment</th> -->
                                    <!-- <th>EOT</th> -->
                                    <!-- <th>Contract Period</th> -->
                                    <th>Status</th>
                                    <!-- <th>Remarks</th> -->
                                    <!-- <th>Image</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tankRehabilitations as $tankRehabilitation)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="record-checkbox" name="selected_ids[]" value="{{ $tankRehabilitation->id }}">
                                    </td>
                                    
                                    <td>{{ $tankRehabilitation->tank_id }}</td>
                                    <td>{{ $tankRehabilitation->tank_name }}</td>
                                    <td>{{ $tankRehabilitation->river_basin }}</td>
                                    <td>{{ $tankRehabilitation->cascade_name }}</td>
                                    <!-- <td>{{ $tankRehabilitation->province }}</td>
                                    <td>{{ $tankRehabilitation->district }}</td>
                                    <td>{{ $tankRehabilitation->ds_division }}</td>
                                    <td>{{ $tankRehabilitation->gn_division }}</td>
                                    <td>{{ $tankRehabilitation->as_centre }}</td>
                                    <td>{{ $tankRehabilitation->agency }}</td>
                                    <td>{{ $tankRehabilitation->no_of_family }}</td>
                                    <td>{{ $tankRehabilitation->longitude }}</td>
                                    <td>{{ $tankRehabilitation->latitude }}</td> -->
                                    <td>{{ $tankRehabilitation->progress }}</td>
                                    <!-- <td>{{ $tankRehabilitation->contractor }}</td> -->
                                    <!-- <td>{{ $tankRehabilitation->open_ref_no }}</td> New field -->
                                    <td>{{ $tankRehabilitation->awarded_date }}</td> <!-- New field -->
                                    <td>RS.{{ !empty($tankRehabilitation->cumulative_amount) && is_numeric($tankRehabilitation->cumulative_amount) ? number_format((float) $tankRehabilitation->cumulative_amount, 2) : 'N/A' }}</td>
                                    <td>{{ $tankRehabilitation->paid_advanced_amount }}</td> <!-- New field -->
                                    <td>{{ $tankRehabilitation->recommended_ipc_no }}</td> <!-- New field -->
                                    <td>{{ number_format($tankRehabilitation->recommended_ipc_amount, 2) }}</td>
                                    
                                    <!-- <td>{{ $tankRehabilitation->payment }}</td> -->
                                    <!-- <td>{{ $tankRehabilitation->eot }}</td> -->
                                    <!-- <td>{{ $tankRehabilitation->contract_period }}</td> -->
                                    <td>{{ $tankRehabilitation->status }}</td>
                                    <!-- <td>{{ $tankRehabilitation->remarks }}</td> -->

                                    <!-- <td>
                                        @if($tankRehabilitation->image_path)
                                            <img src="{{ asset('storage/' . $tankRehabilitation->image_path) }}" alt="Tank Image" style="width: 100px;">
                                        @else
                                            No Image
                                        @endif
                                    </td> -->

                                    <td class="button-container">

                                    <a href="{{ route('tank_rehabilitation.show', $tankRehabilitation->id) }}" class="btn btn-danger button view-button" title="View">
                                    <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                    </a>

                                     
                                        

                                    <a href="/tank_rehabilitation/{{ $tankRehabilitation->id }}/edit" title="Update">
                                        <button type="button" class="btn btn-success update-confirm" data-url="/tank_rehabilitation/{{ $tankRehabilitation->id }}/edit" style="height: 40px; width: 120px; font-size: 16px;">
                                            Update
                                        </button>
                                    </a>


                                    <form class="delete-form d-inline" method="POST" action="{{ route('tank_rehabilitation.destroy', $tankRehabilitation->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger custom-button delete-confirm" title="Delete">
                                            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
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
                                <li class="page-item {{ $tankRehabilitations->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $tankRehabilitations->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $tankRehabilitations->currentPage();
                                    $lastPage = $tankRehabilitations->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $tankRehabilitations->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tankRehabilitations->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $tankRehabilitations->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $tankRehabilitations->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $tankRehabilitations->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>


                        @php
                            $currentPage = $tankRehabilitations->currentPage();
                            $perPage = $tankRehabilitations->perPage();
                            $total = $tankRehabilitations->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>
                        <script>

                            $(document).ready(function () {
                                    // SweetAlert delete confirmation
                                    $(document).on('click', '.delete-confirm', function (e) {
                                        e.preventDefault();
                            
                                        const form = $(this).closest('form');
                            
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to undo this delete!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit();
                                            }
                                        });
                                    });
                                });
                                // UPDATE Confirm
                            $(document).on('click', '.update-confirm', function (e) {
                                e.preventDefault();
                                const url = $(this).data('url');
                                Swal.fire({
                                    title: 'Proceed to update?',
                                    text: "Do you want to update this record?",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonColor: '#28a745',
                                    cancelButtonColor: '#6c757d',
                                    confirmButtonText: 'Yes, go ahead!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url;
                                    }
                                });
                            });
                            
                               
                            </script>
                            
                        <!-- Delete yes no script -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Handle delete button click
                                document.querySelectorAll('.delete-btn').forEach(button => {
                                    button.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        if (confirm('Are you sure you want to delete this record?')) {
                                            const url = this.getAttribute('data-url');
                                            fetch(url, {
                                                method: 'DELETE',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    alert(data.success);
                                                    this.closest('tr').remove();
                                                } else {
                                                    alert('Error deleting record.');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                alert('An error occurred. Please try again.');
                                            });
                                        }
                                    });
                                });

                                
                            });
                        </script>
<script>
    $(document).ready(function () {
        // Initialize the map, center on Sri Lanka
        var map = L.map('map').setView([7.8731, 80.7718], 8); // Coordinates of Sri Lanka

        // Use a detailed tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18, // Allow closer zoom for better details
            minZoom: 6   // Set minimum zoom level for better control
        }).addTo(map);

        // Tank locations passed from the controller
        var tankLocations = @json($tankLocations);

        // Add markers for each tank
        tankLocations.forEach(function (tank) {
            if (tank.latitude && tank.longitude) {
                // Create a marker
                var marker = L.marker([tank.latitude, tank.longitude]).addTo(map);

                // Create the popup content
                var popupContent = `
                    <div>
                        <strong>Tank Name:</strong> ${tank.tank_name}<br>
                        <strong>Tank ID:</strong> ${tank.tank_id}<br>
                        <strong>Progress:</strong> ${tank.progress}<br>
                        <strong>Status:</strong> ${tank.status}<br>
                    </div>
                `;

                // Bind the popup to the marker
                marker.bindPopup(popupContent);
            }
        });

        // Fix map rendering issue inside Bootstrap modal
        $('#mapModal').on('shown.bs.modal', function () {
            setTimeout(function () {
                map.invalidateSize(); // Adjust map size after modal display
            }, 10);
        });
    });
</script>
<script>
    $(document).ready(function () {
    // Select/Deselect all checkboxes
    $('#selectAll').click(function () {
        $('.record-checkbox').prop('checked', this.checked);
    });

    // Handle bulk delete
    $('#deleteSelectedBtn').click(function (e) {
        e.preventDefault(); // Prevent form submission

        let selectedIds = [];
        $('.record-checkbox:checked').each(function () {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Records Selected',
                text: 'Please select at least one record to delete.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the selected records.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform AJAX request to delete
                $.ajax({
                    url: '{{ route("tank_rehabilitation.bulk_delete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selectedIds
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.success,
                            confirmButtonColor: '#28a745'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong while deleting records.',
                            confirmButtonColor: '#d33'
                        });
                    }
                });
            }
        });
    });
});

</script>





                        <script>
                            $(document).ready(function() {
                                $('#entriesSelect').change(function() {
                                    var perPage = $(this).val(); // Get selected value
                                    window.location = '{{ route('tank_rehabilitation.index') }}?entries=' + perPage; // Redirect with selected value
                                    //var url = new URL(window.location.href);
                                    //url.searchParams.set('entries', perPage);
                                    //window.location.href = url.toString(); // Redirect with selected value
                                });
                            });
                        </script>

                        <script>
                            function updateEntries() {
                                const entries = document.getElementById('entriesSelect').value;
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set('entries', entries);
                                window.location.search = urlParams.toString();
                            }
                        </script>
                    </div>
                </div>

            </div>
        </div>
        <script>
    $(document).ready(function () {
        // Initialize the map, center on Sri Lanka
        var map = L.map('map').setView([7.8731, 80.7718], 8); // Coordinates of Sri Lanka

        // Use a more detailed tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18, // Allow closer zoom for better details
            minZoom: 6   // Set minimum zoom level for better control
        }).addTo(map);

        // Tank locations passed from the controller
        var tankLocations = @json($tankLocations);

        // Add markers for each tank
        tankLocations.forEach(function (tank) {
            if (tank.latitude && tank.longitude) {
                L.marker([tank.latitude, tank.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>${tank.tank_name}</strong>`);
            }
        });

        // Fix map rendering issue inside Bootstrap modal
        $('#mapModal').on('shown.bs.modal', function () {
            setTimeout(function () {
                map.invalidateSize(); // Adjust map size after modal display
            }, 10);
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
