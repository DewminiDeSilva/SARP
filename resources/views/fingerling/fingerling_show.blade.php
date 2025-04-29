<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerlings Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
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
            min-width: 250px; /* Increase the width */
        }
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        }
        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
        }
        .button-container {
            display: flex;
            gap: 10px; /* Adjust the gap between buttons as needed */
            align-items: center;
            justify-content: center;
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
        .pagination .page-item {
            margin: 0px; /* Adjust the margin to reduce space */
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
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #tableInfo {
            text-align: left;
        }
    </style>


<style>
    .top-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.top-left {
    flex: 1;
    display: flex;
    justify-content: flex-start;
}

.top-right {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}

.bottom-left {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px; /* Adds space between the two buttons */
    margin-bottom: 20px;
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

        .btn-action.edit {
            background-color: #ffd32c;
        }

        .btn-action.delete {
            background-color: #FF746C;
        }

        .btn-action i {
            color: white;
            font-size: 1rem;
        }

        .btn-action:hover {
            transform: scale(1.1);
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

/* Highlighted improvements */
table.table {
        border-collapse: separate;
        border-spacing: 0 10px;
        font-size: 14px;
    }
    table.table th {
        background-color: #e6f2ec;
        text-align: center;
        color: #145c32;
    }
    table.table td {
        background-color: #fdfdfd;
        vertical-align: top;
        padding: 10px;
        border-top: 1px solid #dee2e6;
    }
    .table .sub-detail {
        background-color: #ffffff;
        border-left: 3px solid #28a745;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        text-align: left;
    }
    .table .sub-detail strong {
        color: #145c32;
        font-weight: 600;
        
    }
    .button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px; /* little more breathing space */
    flex-wrap: wrap;
    min-height: 100%;
    padding: 5px 0;
    margin: 0;
}

.btn-action {
    width: 36px;
    height: 36px;
    font-size: 14px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
    color: white;
    border: none;
}

.btn-action.edit {
    background-color: #ffc107; /* Bootstrap warning color */
}

.btn-action.delete {
    background-color: #dc3545; /* Bootstrap danger color */
}

.table td {
    vertical-align: middle !important;
    text-align: center;
    padding: 10px;
    background-color: #fdfdfd;
}

.table td:last-child {
    vertical-align: middle !important;
    text-align: center;
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

    <a href="{{ route('fingerling.index') }}" class="btn-back">
    <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
</a>


    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 style="font-size: 2rem; color: green;">Fingerlings Stocking Details</h3>
                </div>
            </div>
        </div>

        <!-- Generate and Upload CSV, Add ASC Button -->
        <div class="top-section">
            <div class="top-left">
            <a href="{{ route('fingerling.create', $tank->id) }}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Fingerlings</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Tank Name</th>
                <th>Stocking Details</th>
                <th>Harvest Details</th>
                <th>Community Distribution (kg)</th>
                <th>Cumulative Amount (kg)</th>
                <th>Total Income (Rs.)</th>
                <th>Wholesale Quantity (kg)</th>
                <th>No. of Families Benefited</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
@forelse ($fingerlings as $fingerling)
<tr>
    <td class="align-middle text-center">{{ $fingerling->tank->tank_name ?? 'N/A' }}</td>
    <td>
        @php $stockingDetails = is_string($fingerling->stocking_details) ? json_decode($fingerling->stocking_details, true) : null; @endphp
        @if (is_array($stockingDetails))
            @foreach ($stockingDetails as $detail)
                <div class="sub-detail">
                    <strong>Date:</strong> {{ $detail['stocking_date'] ?? 'N/A' }}<br>
                    <strong>Variety:</strong> {{ $detail['variety'] ?? 'N/A' }}<br>
                    <strong>Stock No:</strong> {{ $detail['stock_number'] ?? 'N/A' }}
                </div>
            @endforeach
        @else
            <p class="text-muted">N/A</p>
        @endif
    </td>
    <td>
        @php $harvestDetails = is_string($fingerling->harvest_details) ? json_decode($fingerling->harvest_details, true) : null; @endphp
        @if (is_array($harvestDetails))
            @foreach ($harvestDetails as $detail)
                <div class="sub-detail">
                    <strong>Date:</strong> {{ $detail['harvest_date'] ?? 'N/A' }}<br>
                    <strong>Variety:</strong> {{ $detail['variety'] ?? 'N/A' }}<br>
                    <strong>Harvest (kg):</strong> {{ $detail['variety_harvest_kg'] ?? 'N/A' }}
                </div>
            @endforeach
        @else
            <p class="text-muted">N/A</p>
        @endif
    </td>
    <td class="align-middle text-center">{{ $fingerling->community_distribution_kg ?? 'N/A' }}</td>
    <td class="align-middle text-center">{{ $fingerling->amount_cumulative_kg ?? 'N/A' }}</td>
    <td class="align-middle text-center">{{ $fingerling->total_income_rs ?? 'N/A' }}</td>
    <td class="align-middle text-center">{{ $fingerling->wholesale_quantity_kg ?? 'N/A' }}</td>
    <td class="align-middle text-center">{{ $fingerling->no_of_families_benefited ?? 'N/A' }}</td>
    <td class="align-middle text-center">
    <div class="button-container">
        <a href="{{ route('fingerling.edit', $fingerling->id) }}" class="btn-action edit" title="Edit & Add Harvest Data">
            <i class="fas fa-edit"></i>
        </a>
        <form action="{{ route('fingerling.destroy', $fingerling->id) }}"
      method="POST"
      class="delete-form"
      style="margin:0;">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="btn-action delete"
            title="Delete">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
    </div>
</td>
</tr>
@empty
<tr>
    <td colspan="9" class="text-center text-muted">No fingerlings added yet for this tank.</td>
</tr>
@endforelse
</tbody>

            </table>
        </div>

    </div>
</div>

<!-- Add Bootstrap JS and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('table').DataTable();
    });

    function updateEntries() {
        const entries = document.getElementById('entriesSelect').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('entries', entries);
        window.location.search = urlParams.toString();
    }
</script> -->
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

<script>
$(function(){
  $('.delete-form').on('submit', function(e){
    e.preventDefault();               // stop immediate form submit
    const form = this;

    Swal.fire({
      title: 'Confirm Deletion',
      text: "This will permanently delete the record!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
      confirmButtonColor: '#dc3545',  // theme red
      cancelButtonColor: '#6c757d'    // grey
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();               // now submit for real
      }
    });
  });
});
</script>

</body>
</html>
