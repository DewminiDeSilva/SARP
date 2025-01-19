<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARP APP - Other Crops Registration</title>
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
        .submitbtton{
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
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

    <!-- form -->
    <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
        <h3 style="font-size: 2rem; color: green;">Cereals/Legumes Crop Registration</h3>
    </br>
        <form class="form-horizontal" method="POST" action="{{ route('other_crops.store') }}">
            @csrf

            <div class="col">
                <label for="crop_name" class="form-label dropdown-label">Crop Name</label>
                <input type="text" id="crop_name" name="crop_name" class="form-control" required>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="text-center">
                        <button type="submit" class="btn submitbtton">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Success message div -->
    <div id="successMessage" class="alert alert-success mt-3" style="display: none;">
        <strong>Success!</strong> Crop registration completed successfully.
    </div>

    <script>
        $(document).ready(function() {
            // Handle form submission
            $('form').submit(function(event) {
                // Prevent default form submission behavior
                event.preventDefault();

                // Perform AJAX form submission
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Show success modal
                        $('#successModal').modal('show');

                        // Automatically close the modal after 5 seconds
                        setTimeout(function() {
                            $('#successModal').modal('hide');
                        }, 6000);

                        // Optionally, reset the form fields
                        $('form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <!-- Pagination links -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
