<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nutrition Program List</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .btn-custom {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-custom:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }

        .table-container {
            overflow-x: auto;
        }

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

    .button-container {
        display: flex;
        gap: 10px; /* Adjust the gap between buttons as needed */
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
    </style>

    <style>

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
        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1; /* Blue color example */
            color: #0d0e0d; /* Text color */
        }
        .summary-card-container {
    display: flex;
    justify-content: center; /* Centers horizontally */
    align-items: center; /* Centers vertically */

    margin: 0 auto; /* Centers the container */
    width: 100%; /* Full width */
    position: relative; /* Allows positioning adjustments */
    z-index: 10; /* Ensures the cards appear above other elements */
}

.summary-card {
    width: 25%; /* Adjust the width of each card */
    background-color: #e3f7fc; /* Light blue background */
    border: 1px solid #ddd; /* Light border */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Add a deeper shadow for a floating effect */
    padding: 20px; /* Inner padding */
    text-align: center; /* Center-align content */
    font-family: Arial, sans-serif; /* Simple font */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

.summary-card h4 {
    background-color: #b3e5fc; /* Slightly darker blue for the heading */
    color: #000; /* Black text */
    font-size: 1.25rem; /* Medium font size */
    margin: 0;
    padding: 10px 0; /* Add padding to heading */
    border-radius: 6px 6px 0 0; /* Round only the top corners */
    font-weight: bold; /* Bold text */
}

.summary-card .number {
    font-size: 2.5rem; /* Larger font size for numbers */
    font-weight: bold; /* Bold text for numbers */
    color: #333; /* Dark gray text */
    margin: 10px 0; /* Space around the number */
}

.summary-card p {
    color: #555; /* Gray text color */
    font-size: 1rem; /* Normal font size */
    margin: 0; /* No margin */
    padding: 5px 0; /* Add space inside the paragraph */
}

.card-header {
    font-weight: bold;
    text-align: center;
    background-color: #c7eef1; /* Blue color example */
    color: #0d0e0d; /* Text color */
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


	<a href="{{ route('nutrition.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>



        <div class="">
            <h2 style="color: green; font-weight: bold; text-align: center;">Nutrition Program List</h2>


            <div class="container">
                <div class="justify-content-center">
                    <div class="container mt-4">
                        <div class="d-flex justify-content-center">

                            <div class="card text-center" style="width: 18rem; margin-right: 20px;">
                                <div class="card-header">
                                    Total Nutrition Programs
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$totalNutritionPrograms  }}</h5>
                                    <p>Total nutrition programs currently in the system.</p>
                                </div>
                            </div>
                            <!-- Total Cost Card -->
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                Total Cost
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ number_format($totalCost, 2) }}</h5>
                <p>Total cost of all nutrition programs.</p>
                        </div>
                    </div>
                </div>
            </div>

        </br>
    </div>

</div>

            <!-- Add New Program Button -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('nutrition.create') }}" class="btn btn-custom" style="background-color: green; border-color: green;">Add New Program</a>
                <a href="{{ route('downloadnutrition.csv') }}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>

            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- CSV Upload Form for Nutrition -->
                    <form action="{{ route('nutrition.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <input type="file" name="csv_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Upload CSV</button>
                    </form>

                    <!-- Search form for Nutrition -->
                    <form method="GET" action="{{ route('nutrition.search') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="entries-container">
                    <label for="entriesSelect">Show</label>
                    <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                        <!-- Dynamically handle selected per-page option -->
                        <option value="10" {{ $nutritionPrograms->perPage() == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $nutritionPrograms->perPage() == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $nutritionPrograms->perPage() == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $nutritionPrograms->perPage() == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <label for="entriesSelect">entries</label>
                </div>

            </div>



            <!-- Table for displaying Nutrition Program records -->
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Program Type</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Program Conductor</th>
                            <th>Cost</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>DS Division</th>
                            <th>GN Division</th>
                            <th>ASC</th>
                            <th>Cascade Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nutritionPrograms as $program)
                            <tr>
                                <td>{{ $program->program_type }}</td>
                                <td>{{ $program->date }}</td>
                                <td>{{ $program->location }}</td>
                                <td>{{ $program->program_conductor }}</td>
                                <td>{{ number_format($program->cost_of_training_program, 2) }}</td>
                                <td>{{ $program->province_name }}</td>
                                <td>{{ $program->district_name }}</td>
                                <td>{{ $program->ds_division_name }}</td>
                                <td>{{ $program->gn_division_name }}</td>
                                <td>{{ $program->asc_name }}</td>
                                <td>{{ $program->cascade_name }}</td>
                                <td>{{ $program->description }}</td>

                                <td  class="button-container">

                                <a href="{{ route('nutrition.show', $program->id) }}">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">View participants</button>
                                    </a>

                                    <!-- Add Trainee Button -->
                                    <a href="{{ route('nutrition_trainee.create', ['nutrition_id' => $program->id]) }}">
                                        <button class="btn btn-success" style="height: 40px; width: 150px; font-size: 16px;">Add Participants</button>
                                    </a>

                                    <a href="{{ route('nutrition.edit', $program->id) }}"  class="btn btn-danger edit-button" title="Edit">
                                        <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit Icon" style="width: 16px; height: 16px;">
                                    </a>

                                    <form action="{{ route('nutrition.destroy', $program->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger custom-button" onclick="return confirm('Are you sure you want to delete this record?');">
                                            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ $nutritionPrograms->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $nutritionPrograms->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>

        @php
            $currentPage = $nutritionPrograms->currentPage();
            $lastPage = $nutritionPrograms->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
        @endphp

        @if ($startPage > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $nutritionPrograms->url(1) }}">1</a>
            </li>
            @if ($startPage > 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = $startPage; $i <= $endPage; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $nutritionPrograms->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $nutritionPrograms->url($lastPage) }}">{{ $lastPage }}</a>
            </li>
        @endif

        <li class="page-item {{ $nutritionPrograms->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $nutritionPrograms->nextPageUrl() }}">Next</a>
        </li>
    </ul>
   </nav>

  @php
    $currentPage = $nutritionPrograms->currentPage();
    $perPage = $nutritionPrograms->perPage();
    $total = $nutritionPrograms->total();
    $startingNumber = ($currentPage - 1) * $perPage + 1;
    $endingNumber = min($total, $currentPage * $perPage);
  @endphp

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div id="tableInfo" class="text-right">
        <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
    </div>
  </div>




        </div>
    </div>
  </div>
  <script>
    document.getElementById('entriesSelect').addEventListener('change', function() {
        let entries = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('entries', entries);
        window.location.href = url.href;
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
