<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Infrastructure Details</title>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- font Noto Sans-->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
<!-- Font Awesome CSS -->
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

<style>
        /* Fixed Header */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to bottom,rgb(76, 167, 88), #a8d5ba); /* Vertical gradient */
            color: black; /* Text color */
            z-index: 1000; /* Ensures header stays above other elements */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 20px; /* Adjust this value for more/less curve */
            border-bottom-right-radius: 20px; /* Adjust this value for more/less curve */
        }

        /* Logo and Text */
        .fixed-header .logo-container {
            display: flex;
            align-items: center;
            font-family: 'Noto Sans', sans-serif; /* Apply Noto Sans font */
            font-size: 1.8rem; /* Adjust the font size */
            margin: 0;
            color: black; /* Text color */
            font-weight: bold; /* Ensure the title stands out */
            text-align: center;
        }

        .fixed-header img {
            height: 40px;
            margin-right: 10px;
        }

        .fixed-header h1 {
            font-size: 1.5rem;
            margin: 0;
            color: black; /* Header text color */
        }

        /* Profile Section */
        .fixed-header .profile {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .fixed-header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Padding to prevent overlap */
        .content {
            margin-top: 80px; /* Adjust based on header height */
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 15px; /* Add space between the logos */
        }

        .ministry-logo, .ifad-logo, .sharp-logo {
            height: 50px; /* Ensure all logos are of the same height */
            max-width: 70px; /* Limit the width to ensure proportions are maintained */
        }

        /* Custom width for the Ministry logo */
        .custom-ministry-logo {
            max-width: 120px; /* Adjust the width as needed */
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


    <a href="{{ route('infrastructure.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>
        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Infrastructure Details</h1>
            </div>

            <div class="container">
    <div class="row justify-content-center mt-4">
        <!-- Total Infrastructures Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Total Infrastructures
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalInfrastructures }}</h5>
                <p class="card-text">Total infrastructures currently in the system.</p>
            </div>
        </div>

        <!-- Ongoing Infrastructures Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Ongoing
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $ongoingCount }}</h5>
                <p class="card-text">Infrastructures currently undergoing progress.</p>
            </div>
        </div>

        <!-- Completed Infrastructures Card -->
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                Completed
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $completedCount }}</h5>
                <p class="card-text">Infrastructures that have completed progress.</p>
            </div>
        </div>
    </div>
</div>


            <div class="right-column">
                <div class="container-fluid top-left">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{route('infrastructure.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Infrastructure</a>
                        <a href="{{route('downloadInfrastructure.csv')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- CSV Upload Form -->
                        <form action="{{ route('infrastructure.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                            @csrf
                            <div class="form-group mr-2">
                                <input type="file" name="csv_file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Upload CSV</button>
                        </form>
                        <!-- Search form -->
                        <form method="GET" action="{{ route('searchInfrastructure') }}" class="form-inline">
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
                                alert('{{ session('success') }}');
                            });
                        </script>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="entries-container">
                            <label for="entriesSelect">Show</label>
                            <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                <option value="10" {{ $infrastructures->perPage() == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ $infrastructures->perPage() == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $infrastructures->perPage() == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $infrastructures->perPage() == 100 ? 'selected' : '' }}>100</option>
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
                                        <th>Type of Infrastructure</th>
                                        <th>Infrastructure Progress</th>
                                        <th>Infrastructure Description</th>
                                        <th>Contractor</th>
                                        <th>Payment</th>
                                        <th>EOT</th>
                                        <th>Contract Period</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infrastructures as $infrastructure)
                                    <tr>
                                        <td>{{ $infrastructure->type_of_infrastructure }}</td>
                                        <td>{{ $infrastructure->infrastructure_progress }}</td>
                                        <td>{{ $infrastructure->infrastructure_description }}</td>
                                        <td>{{ $infrastructure->contractor }}</td>
                                        <td>{{ $infrastructure->payment }}</td>
                                        <td>{{ $infrastructure->eot }}</td>
                                        <td>{{ $infrastructure->contract_period }}</td>
                                        <td>{{ $infrastructure->status }}</td>
                                        <td>{{ $infrastructure->remarks }}</td>
                                        <td class="button-container">
                                            <a href="{{ route('infrastructure.show', $infrastructure->id) }}" class="btn btn-danger button view-button" title="View">
                                                <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                            </a>

                                            <a href="/infrastructure/{{ $infrastructure->id }}/edit" class="btn btn-danger edit-button" title="Edit">
                                                <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                            </a>
                                            <form action="/infrastructure/{{ $infrastructure->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger custom-button" title="Delete">
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
                                    <li class="page-item {{ $infrastructures->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $infrastructures->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>

                                    @php
                                        $currentPage = $infrastructures->currentPage();
                                        $lastPage = $infrastructures->lastPage();
                                        $startPage = max($currentPage - 2, 1);
                                        $endPage = min($currentPage + 2, $lastPage);
                                    @endphp

                                    @if ($startPage > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $infrastructures->url(1) }}">1</a>
                                        </li>
                                        @if ($startPage > 2)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                    @endif

                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $infrastructures->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($endPage < $lastPage)
                                        @if ($endPage < $lastPage - 1)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $infrastructures->url($lastPage) }}">{{ $lastPage }}</a>
                                        </li>
                                    @endif

                                    <li class="page-item {{ $infrastructures->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $infrastructures->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            @php
                                $currentPage = $infrastructures->currentPage();
                                $perPage = $infrastructures->perPage();
                                $total = $infrastructures->total();
                                $startingNumber = ($currentPage - 1) * $perPage + 1;
                                $endingNumber = min($total, $currentPage * $perPage);
                            @endphp

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div id="tableInfo" class="text-right">
                                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                                </div>
                            </div>

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

                                    // Display success message if available
                                    @if(session('success'))
                                        alert('{{ session('success') }}');
                                    @endif
                                });
                            </script>

                            <script>
                                $(document).ready(function() {
                                    $('#entriesSelect').change(function() {
                                        var perPage = $(this).val(); // Get selected value
                                        window.location = '{{ route('infrastructure.index') }}?entries=' + perPage; // Redirect with selected value
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
                </div>
            </div>

        </div>
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
</body>
</html>
