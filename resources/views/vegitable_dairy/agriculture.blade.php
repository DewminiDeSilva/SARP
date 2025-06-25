<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARP APP</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        /* Custom styles for your application */
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
        /* Add more custom styles as needed */
    </style>


<style>
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



        .button-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .custom-button {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            background-size: cover;
            background-position: center;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .custom-button:hover {
            transform: scale(1.05);
            font-size: 1.5rem; /* Slightly increase font size on hover */
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
        @if(session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-success">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            </div>
        </div>
        </div>
        @endif

    <div class="d-flex align-items-center mb-3">

<!-- Sidebar Toggle Button -->
<button id="sidebarToggle" class="btn btn-secondary mr-2">
    <i class="fas fa-bars"></i>
</button>


</div>
        <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
            <h3 style="font-size: 2rem; color: green;">Add Agriculture</h3>
        </div>
        </br>

        <!-- Button Grid -->
        <div class="button-grid">
            @if(auth()->user()->hasPermission('vegitable', 'add'))
            <button onclick="window.location.href='{{ route('vegitable.create') }}';" class="custom-button" style="background-image: url('assets/images/vegetables.jpg'); font-size: 2rem; font-weight: bold;">
                Vegitables
            </button>
            @endif
            @if(auth()->user()->hasPermission('fruit', 'add'))
            <button onclick="window.location.href='{{ route('fruit.create') }}';" class="custom-button" style="background-image: url('assets/images/fruits.png'); font-size: 2rem; font-weight: bold;">
                Fruits
            </button>
            @endif
            @if(auth()->user()->hasPermission('homegarden', 'add'))
            <button onclick="window.location.href='{{ route('homegarden.create') }}';" class="custom-button" style="background-image: url('assets/images/homegarden.jpeg'); font-size: 2rem; font-weight: bold;">
                Home Garden
            </button>
            @endif
            @if(auth()->user()->hasPermission('other_crops', 'add'))
            <button class="custom-button" onclick="window.location.href='{{ route('other_crops.create') }}';" style="background-image: url('assets/images/others.jpg'); font-size: 2rem; font-weight: bold;">
            Cereals/Legumes
            </button>
            @endif
        </div>



        <div class="container mt-5">
    <h1 class="text-center">Agriculture Data</h1>

    <!-- Vegetables Table -->
    <h3>Registered Vegetables</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Vegetable Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vegitables as $vegitable)
            <tr>

                <td>{{ $vegitable->crop_name }}</td>
                <td>{{ $vegitable->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Fruits Table -->
    <h3>Registered Fruits</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Fruit Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fruits as $fruit)
            <tr>

                <td>{{ $fruit->fruit_name }}</td>
                <td>{{ $fruit->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Home Gardens Table -->
    <h3>Registered Home Gardens</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Home Garden Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homegardens as $homegarden)
            <tr>

                <td>{{ $homegarden->homegarden_name }}</td>
                <td>{{ $homegarden->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Other Crops Table -->
    <h3>Registered Cereals/Legumes Crops</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Crop Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($crops as $crop)
            <tr>

                <td>{{ $crop->crop_name }}</td>
                <td>{{ $crop->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
    </div>


<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable();
    });
</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


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
    $(document).ready(function () {
        @if(session('success'))
            $('#successModal').modal('show');

            // Auto-close the modal after 4 seconds
            setTimeout(function () {
                $('#successModal').modal('hide');
            }, 4000);
        @endif
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</body>
</html>
