<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SARP APP</title>


    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} "> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/family_index.css')}} ">
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
    
</head>
<body>
<div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>
        <div class="right-column">

        <a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

    <div class="container">

        <div class="center-heading" style="text-align: center;">
            <h1 style="font-size: 2.5rem; color: green;">Farmer Organization Members Details</h1>
        </div>













        <div class="row table-container">
            <div class="col">
            <div class="container-fluid">
            <table class="table table-bordered" style="width: 100%">
</div>
        <thead class="thead-light">
            <tr>

                <th scope="col">Member Name</th>
                <th scope="col">Member ID Number</th>
                <th scope="col">Member Position</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Youth</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($farmer_members as $farmer_member)
            <tr>
                <td>{{ $farmer_member->member_name }}</td>
                <td>{{ $farmer_member->member_id }}</td>
                <td>{{ $farmer_member->member_position }}</td>
                <td>{{ $farmer_member->contact_number }}</td>
                <td>{{ $farmer_member->address }}</td>
                <td>{{ $farmer_member->gender }}</td>
                <td>{{ $farmer_member->dob }}</td>
                <td>{{ $farmer_member->youth }}</td>


                <td>

                        <div class="d-flex">
                        <a class="btn btn-primary  mr-2" href='farmer_member/{{$farmer_member->id}}/edit'>Edit</a>

                        <form action="{{ route('farmermember.destroy', $farmer_member->id) }}" method="POST">
                          @csrf
                         @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
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
                                <li class="page-item {{ $farmer_members->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $farmer_members->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $farmer_members->currentPage();
                                    $lastPage = $farmer_members->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $farmer_members->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $farmer_members->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $farmer_members->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $farmer_members->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $farmer_members->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>


                        @php
                            $currentPage = $farmer_members->currentPage();
                            $perPage = $farmer_members->perPage();
                            $total = $farmer_members->total();
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


    </div>
    </div>
</body>
</html>
