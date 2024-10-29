<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Enterprises Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS based on provided template -->
    <style>
        .container {
            margin-top: 50px;
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

        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }

        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
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
        .submitbtton {
            color: #fff;
    background-color: #198754;
    border-color: #198754;
    padding: 6px 12px; /* Adjust padding for balanced look */
    font-size: 16px; /* Font size adjustment */
    height: 38px; /* Match height with input field */
}


.submitbtton:hover,
.submitbtton:active {
    background-color: #145c32;
    border-color: #145c32;
}

.container-fluid h2 {
    color: green;
}

.card {
    border: 1px solid #dee2e6;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-size: 2rem;
    color: #333;
}


        .button-container {
            display: flex;
            gap: 10px;
        }

        .custom-button {
            background-color: white;
            color: red;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: border 0.3s ease;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            background-color: #f5c6cb;
        }

        .custom-button:hover {
            border-color: red;
            background-color: #f5c6cb;
        }

        .edit-button {
            background-color: white;
            color: orange;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            transition: border 0.3s ease, background-color 0.3s ease;
            background-color: #ffeeba;
        }

        .edit-button:hover {
            border-color: orange;
            background-color: #ffeeba;
        }

        .view-button {
            background-color: white;
            color: orange;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 40px;
            box-sizing: border-box;
            transition: border 0.3s ease, background-color 0.3s ease;
            background-color: #60C267;
        }

        .view-button:hover {
            border-color: green;
            background-color: #60C267;
        }

        /* Pagination CSS */
        .pagination .page-item {
            margin: 0px;
        }

        .pagination .page-link {
            padding: 5px 10px;
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
            color: #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }

        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination-container nav {
            margin-bottom: 10px;
        }

        #tableInfo {
            text-align: center;
            width: 100%;
        }

        .addmember {
            background-color: green;
            border-color: green;
            color: white;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            text-align: center;
            width: 150px; /* Widen the button */
            height: 40px; /* Adjust the height */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .addmember:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: white;
        }

        .lock {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .text-left {
            text-align: left;
        }

        .justify-content-start {
            justify-content: flex-start !important;
        }

        .pdf-icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .td{
            vertical-align: middle;
        }
        .upload-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 20px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f1f1f1;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 20px;
            text-align: center;
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
    .file-upload-wrapper {
    display: flex;
    align-items: center; /* Center align items in the flex container */
    gap: 10px; /* Space between the file input and button */
}

.file-input {
    height: 38px; /* Set height to match the button */
    width: 250px; /* Set a fixed width for the file input */
}

.upload-button {
    padding: 6px 12px; /* Adjust padding for balance */
    font-size: 14px; /* Font size adjustment */
    height: 38px; /* Ensure height matches the file input */
    background-color: #198754;
    color: #fff;
    border: 1px solid #198754;
    border-radius: 4px;
    min-width: 120px; /* Set a minimum width for better appearance */
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
    @if (request()->get('page', 1) > 1)
    <a href="{{ route('agro.index', ['page' => 1]) }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back">
        <span class="btn-text">Back</span>
    </a>
     @endif

    </a>
    <div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <h2 style="font-size: 2.5rem; color: green;">Agro Enterprises Details</h2>
        </div>
    </div>

    <!-- Centered Card for Total Enterprises -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-3 text-center">
            <div class="card">
                <div class="card-header">
                    Total Agro Enterprise
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $agros->total() }}</h5>
                    <p class="card-text">Total agro enterprises currently in the system.</p>
                </div>
            </div>
            </div> 
           
    </div>
    
    
    <div class="row mt-4">
    <div class="col-md-3">
        <!-- Upload CSV Form -->
        
        <form action="{{ route('agro.csv.upload') }}" method="POST" enctype="multipart/form-data" class="form-inline">
            @csrf
            <div class="file-upload-wrapper d-flex align-items-start">
                <input type="file" name="csv_file" class="form-control file-input" required>
                <button type="submit" class="btn btn-success upload-button">Upload CSV</button>
            </div>
        </form>

        <!-- Search Form -->
        <form class="form-inline mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <!-- Add New Enterprise Button -->
        <a href="{{ route('agro.create') }}" class="btn submitbtton mb-3">+ Add New Enterprise</a>
    </div>
    
    <!-- Generate CSV Report Button in a Separate Column -->
    <div class="col-md-6 offset-md-3 text-right">
        <a href="{{ route('agro.csv.generate') }}" class="btn submitbtton">Generate CSV Report</a>
    </div>
</div>

            

            <!-- Success message handling -->
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
                        <option value="10" {{ $agros->perPage() == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $agros->perPage() == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $agros->perPage() == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $agros->perPage() == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>
                <div id="tableInfo" class="text-right"></div>
            </div>

            <!-- Table displaying agro enterprise details -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Enterprise Name</th>
                            <th>Registration Number</th>
                            <th>Institute of Registration</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Website Name</th>
                            <th>Business Plan</th>
                            <th>Asset Name</th>
                            <th>Asset Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agros as $agro)
                        <tr>
                            <td style="vertical-align: middle;">{{ $agro->enterprise_name }}</td>
                            <td style="vertical-align: middle;">{{ $agro->registration_number }}</td>
                            <td style="vertical-align: middle;">{{ $agro->institute_of_registration }}</td>
                            <td style="vertical-align: middle;">{{ $agro->address }}</td>
                            <td style="vertical-align: middle;">{{ $agro->email }}</td>
                            <td style="vertical-align: middle;">{{ $agro->phone_number }}</td>
                            <td style="vertical-align: middle;">{{ $agro->website_name }}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                @if($agro->business_plan)
                                    <a href="{{ route('agro.view_pdf', $agro->id) }}?v={{ \Carbon\Carbon::now()->timestamp }}" target="_blank">
                                        <img src="{{ asset('assets/images/myPdf.png') }}" alt="Pdf Icon" style="width: 50px; height: 50px; ">
                                    </a>
                                @else
                                <form action="{{ route('agro.upload_pdf', $agro->id) }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <label for="business_plan">Upload Business Plan (PDF):</label>
                                  <input type="file" name="business_plan" id="business_plan" accept="application/pdf" required>
                                <button type="submit">Upload PDF</button>
                                         </form>
                                @endif
                            </td>
                            <td>
                                @foreach($agro->assets as $asset)
                                    <div style="border-bottom: 1px solid #dee2e6; padding: 5px;">
                                        {{ $asset->asset_name }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($agro->assets as $asset)
                                    <div style="border-bottom: 1px solid #dee2e6; padding: 5px;">
                                        {{ $asset->asset_value }}
                                    </div>
                                @endforeach
                            </td>
                            <td class="button-container"  style="vertical-align: middle; text-align: center; padding: 5px; height: 100%;">
                            <div style="display: flex; justify-content: center; align-items: center; height: 100%; gap: 10px;">
                                <a href="{{ route('shareholder.create', $agro->id) }}" class="btn btn-primary btn-sm button-a addmember">Add Shareholder</a>
                                <a href="{{ route('shareholder.view', $agro->id) }}" title="View Shareholder">
                                    <button class="btn btn-success" style="height: 40px; width: 120px; font-size: 16px;">View Details</button>
                                </a>

                                <a href="{{ url('/agro/' . $agro->id . '/edit') }}" class="btn btn-danger edit-button" title="Edit">
                                    <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                </a>
                                <form action="{{ url('/agro/' . $agro->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger custom-button" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                        <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $agros->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $agros->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>

                    @php
                        $currentPage = $agros->currentPage();
                        $lastPage = $agros->lastPage();
                        $startPage = max($currentPage - 2, 1);
                        $endPage = min($currentPage + 2, $lastPage);
                    @endphp

                    @if ($startPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $agros->url(1) }}">1</a>
                        </li>
                        @if ($startPage > 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ $agros->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $agros->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    <li class="page-item {{ $agros->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $agros->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>

            @php
                $currentPage = $agros->currentPage();
                $perPage = $agros->perPage();
                $total = $agros->total();
                $startingNumber = ($currentPage - 1) * $perPage + 1;
                $endingNumber = min($total, $currentPage * $perPage);
            @endphp

            <div class="d-flex align-items-center mb-3 justify-content-start">
                <div id="tableInfo" style="text-align: left;">
                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- JavaScript for handling entry selection and pagination -->
<script>
    $(document).ready(function() {
        $('#entriesSelect').change(function() {
            var perPage = $(this).val();
            window.location = '{{ route('agro.index') }}?entries=' + perPage;
        });
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
</script>

</body>
</html>
