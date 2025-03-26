<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} "> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/family_index.css')}} ">
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
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




</div>
    <div class="container">

        <div class="center-heading" style="text-align: center;">
            <h1>Beneficiary Famaily Members Details</h1>
        </div>


        <div class="d-flex justify-content-between mb-3">
                    <a href="{{route('tank_rehabilitation.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add</a>
                    <a href="{{route('downloadtank.csv')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form -->
                    <form action="{{ route('tank_rehabilitation.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
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




        <div class="row table-container">
            <div class="col">
            <div class="container-fluid">
            <table class="table table-bordered" style="width: 100%">
</div>
        <thead class="thead-light">
            <tr>

                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">gender</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Youth</th>


                <th scope="col">Education</th>
                <th scope="col">Employment</th>
                <th scope="col">Nutrition Level</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($families as $family)
            <tr>
                <td>{{ $family->first_name }}</td>
                <td>{{ $family->last_name }}</td>
                <td>{{ $family->phone }}</td>
                <td>{{ $family->gender }}</td>
                <td>{{ $family->dob }}</td>
                <td>{{ $family->youth }}</td>
                <td>{{ $family->education }}</td>
                <td>{{ $family->employment }}</td>
                <td>{{ $family->nutrition_level }}</td>

                <td>
                    {{-- <button class="btn btn-primary edit-family-btn" data-toggle="modal" data-target="#editFamilyModal" data-family-id="{{ $family->id }}">Edit</button> --}}
                    {{-- <a href="/family/{{ $family->id }}/edit">Edit</a>
                    <form action="/family/{{ $family->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <form action="/crud/{{$crud->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
                    <a href="/family/{{ $family->id }}/delete

                        <button type="submit">Delete</button> --}}
                        <div class="d-flex">
                        <a class="btn btn-primary  mr-2" href='family/{{$family->id}}/edit'>Edit</a>

                        <form action="/family/{{ $family->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</a>
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
                                <li class="page-item {{ $families->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $families->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $families->currentPage();
                                    $lastPage = $families->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $families->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $families->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $families->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $families->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $families->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>


                        @php
                            $currentPage = $families->currentPage();
                            $perPage = $families->perPage();
                            $total = $families->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>

    <script>
        // JavaScript to handle edit button click and populate form fields
        $(document).ready(function() {
            $('.edit-family-btn').click(function() {
                // Get family ID from data attribute
                var familyId = $(this).data('family-id');
                // Ajax call to fetch family details
                $.ajax({
                    url: '/family/' + familyId + '/edit',
                    method: 'GET',
                    success: function(response) {
                        // Populate form fields with fetched data
                        $('#edit_first_name').val(response.first_name);
                        $('#edit_last_name').val(response.last_name);
                        $('#edit_phone').val(response.phone);
                        $('#edit_gender').val(response.genfer);
                        $('#edit_dob').val(response.dob);
                        $('#edit_youth').val(response.youth);
                        $('#edit_education').val(response.education);
                        $('#edit_employment').val(response.employment);
                        $('#edit_nutrition_level').val(response.nutrition_level);

                        // Populate other fields similarly
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
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


    </div>
    </div>
</body>
</html>
