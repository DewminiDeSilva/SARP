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
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">
        <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
            <h3 style="font-size: 2rem; color: green;">Add Live Stock</h3>
        </div>
        </br>

        <!-- Button Grid -->
        <div class="button-grid">
            <button onclick="window.location.href='{{ route('dairy.create') }}';" class="custom-button" style="background-image: url('assets/images/dairy.png'); font-size: 2rem; font-weight: bold;">
                Dairy
            </button>
            <button onclick="window.location.href='{{ route('poultary.create') }}';" class="custom-button" style="background-image: url('assets/images/poultary.jpg'); font-size: 2rem; font-weight: bold;">
                Poultary
            </button>
            <button onclick="window.location.href='{{ route('goat.create') }}';" class="custom-button" style="background-image: url('assets/images/goat.jpg'); font-size: 2rem; font-weight: bold;">
                Goat Rearing
            </button>
            <button onclick="window.location.href='{{ route('aquaculture.create') }}';" class="custom-button" style="background-image: url('assets/images/aquaculture.jpg'); font-size: 2rem; font-weight: bold;">
                Aqua Culture
            </button>
        </div>
        <div class="container mt-5">
    <h1 class="text-center">Livestock Data</h1>



    <!-- Dairy Table -->
    <h3 class="mt-5">Dairy</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Dairy Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dairies as $dairy)
            <tr>

                <td>{{ $dairy->dairy_name }}</td>
                <td>{{ $dairy->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Poultry Table -->
    <h3 class="mt-5">Poultry</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Poultry Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($poultaries as $poultary)
            <tr>

                <td>{{ $poultary->poultary_name }}</td>
                <td>{{ $poultary->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Goat Rearing Table -->
    <h3 class="mt-5">Goat Rearing</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Goat Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goats as $goat)
            <tr>

                <td>{{ $goat->goat_name }}</td>
                <td>{{ $goat->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Aqua Culture Table -->
    <h3 class="mt-5">Aqua Culture</h3>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Aqua Culture Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aquacultures as $aquaculture)
            <tr>

                <td>{{ $aquaculture->aquaculture_name }}</td>
                <td>{{ $aquaculture->created_at->format('Y-m-d') }}</td>
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


</body>
</html>
