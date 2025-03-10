<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Dashboard</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
        appearance: auto; /* Ensures the dropdown uses the default arrow */
    -webkit-appearance: auto; /* Vendor prefix for better browser support */
    -moz-appearance: auto; /* Vendor prefix for Firefox */
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
            /* width: 18; */
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

    <a href="{{ route('agriculture.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>


    </div>
        <div class="container-fluid">

            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Agriculture</h1>
            </div>


        <div class="container">
        <div class="justify-content-center">

        <div class="container mt-4">
    <div class="d-flex justify-content-center">

        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Total Crops Registered
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalCrops }}</h5>
            </div>
        </div>

        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Total Beneficiaries Doing Crops
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalBeneficiaries }}</h5>
            </div>
        </div>

        <!-- Remove margin-right from the last card to avoid extra spacing on the right -->
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                Total GN Divisions Involved
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalGnDivisions }}</h5>
            </div>
        </div>

    </div>
</div>


        </div>
    </div>
    </br>

        <div class="container-fluid">

          

            <!-- Success Message Popup -->
            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        alert('{{ session('success') }}');
                    });
                </script>
            @endif

            <!-- Entries Selector and Summary Cards -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="entries-container">
                    <label for="entriesSelect">Show</label>
                    <select id="entriesSelect" class=" custom-select-sm form-control form-control-sm mx-2" onchange="updateEntries()">
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>

            </div>

            <form method="GET" action="{{ route('agriculture.index') }}" class="form-inline">
            <input type="text" name="search" class="form-control form-control-sm" 
            value="{{ request('search') }}" style="width: 250px;">
           <button type="submit" class="btn btn-success btn-sm ml-2">Search</button>
           @if(request('search'))
               <a href="{{ route('agriculture.index') }}" class="btn btn-secondary btn-sm ml-2">Clear</a>
            @endif
             </form>
            <br>
            <!-- Beneficiaries Table -->
            <div class="row table-container">
                <div class="col">
                    <table id="beneficiariesTable" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">NIC</th>
                                <th scope="col">Beneficiary Name With Initials</th>
                                <th scope="col">GN Division</th>
                                <th scope="col">Crop Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiaries as $beneficiary)
                                <tr>
                                    <td>{{ $beneficiary->nic }}</td>
                                    <td>{{ $beneficiary->name_with_initials }}</td>
                                    <td>{{ $beneficiary->gn_division_name }}</td>
                                    <td>{{ $beneficiary->input3 }}</td>
                                    <td class="buttonline">
                                        <div class="button-group">
                                            <a href="{{ route('agriculture.showByBeneficiary', $beneficiary->id) }}" class="btn btn-info btn-sm">View Details</a>
                                            <a href="{{ route('agriculture.create', ['beneficiaryId' => $beneficiary->id]) }}" class="btn btn-info btn-sm">Add Agriculture Data</a>
                                            <a href="{{ route('crops.by.gn.division', ['gn_division_id' => $beneficiary->gn_division_name]) }}" class="btn btn-info btn-sm">View Crops</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </br>

         <div id="tableInfo" class="text-left"></div>

            <!-- Pagination Section for Beneficiaries -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $beneficiaries->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $beneficiaries->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>

                    @php
                        $currentPage = $beneficiaries->currentPage();
                        $lastPage = $beneficiaries->lastPage();
                        $startPage = max($currentPage - 2, 1);
                        $endPage = min($currentPage + 2, $lastPage);
                    @endphp

                    @if ($startPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $beneficiaries->url(1) }}">1</a>
                        </li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $beneficiaries->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $beneficiaries->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    <li class="page-item {{ $beneficiaries->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $beneficiaries->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const url = new URL(window.location.href);
        url.searchParams.set('entries', entries);
        window.location.href = url.href;
    }

    $(document).ready(function() {
    const totalBeneficiaries = {{ $beneficiaries->total() }}; // Laravel total
    const perPage = {{ $beneficiaries->perPage() }}; // Laravel items per page
    const currentPage = {{ $beneficiaries->currentPage() }}; // Laravel current page

    $('#beneficiariesTable').DataTable({
        "paging": false,
        "searching": false,
        "info": false
    });

    const tableInfo = document.getElementById('tableInfo');

    // Calculate starting and ending entries
    const startEntry = (currentPage - 1) * perPage + 1;
    const endEntry = Math.min(currentPage * perPage, totalBeneficiaries);

    // Update the table info dynamically
    tableInfo.innerHTML = `Showing ${startEntry} to ${endEntry} of ${totalBeneficiaries} entries`;
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
