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

        /* Adjust button width to fit the content */
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }

        /* Center align labels */
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
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

        .submitbtton{
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

        /*pagination css*/
        .pagination .page-item {
            margin:  0px; /* Adjust the margin to reduce space */
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
            flex-direction: column;
            align-items: center;
        }

        .pagination-container nav {
            margin-bottom: 10px; /* Adjust spacing as needed */
        }

        #tableInfo {
            text-align: center;
            width: 100%;
        }

        .addmember {
            background-color: white; /* White background */
            color: white; /* White color */
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            /*transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: green; /* Slightly darker light yellow on hover */
        }

        .addmember:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
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
    <!-- form -->
    <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
        <h3 style="font-size: 2rem; color: green;">Aqua Culture Registration</h3>
    </br>
        <form class="form-horizontal" method="POST" action="{{ route('aquaculture.store') }}">
            @csrf


            <div class="col">
                    <label for="aquaculture_name" class="form-label dropdown-label">Aqua Culture Name</label>
                    <input type="text" id="aquaculture_name" name="aquaculture_name" class="form-control" required>
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
    <strong>Success!</strong> Farmer Organization registration completed successfully.
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

                // Automatically close the modal after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 6000);

                // Optionally, reset the form fields
                $('form')[0].reset();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // You can display an error message here if needed
            }
        });
    });
});

</script>




                <!-- Pagination links -->


    <!-- Add Bootstrap JS and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- JavaScript for handling entry selection and pagination -->
    <script>


        function updateEntries() {
            const entries = document.getElementById('entriesSelect').value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('entries', entries);
            window.location.search = urlParams.toString();
        }
    </script>


    <!--form script-->




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>




<style>
        .ui-datepicker {
            font-size: 14px; /* Adjust font size */
            background: #f0f0f0; /* Background color */
            border: 1px solid #ddd; /* Border style */
            padding: 10px; /* Padding around calendar */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        }
        .ui-datepicker-header {
            background: green; /* Header background color */
            color: white; /* Header text color */
            border-bottom: 1px solid #005bb5; /* Header border */
            padding: 10px; /* Header padding */
        }
        .ui-datepicker-title {
            font-size: 16px; /* Title font size */
            font-weight: bold; /* Title font weight */
        }
        .ui-datepicker-prev, .ui-datepicker-next {
            background: green; /* Prev/Next button background */
            color: white; /* Prev/Next button text color */
            border-radius: 4px; /* Prev/Next button corners */
            padding: 5px; /* Prev/Next button padding */
            margin: 0 10px; /* Space around the buttons */
        }
        .ui-datepicker-calendar th {
            background: green; /* Table header background */
            color: #333; /* Table header text color */
        }
        .ui-datepicker-calendar td {
            padding: 8px; /* Table cell padding */
            border-radius: 4px; /* Table cell corners */
        }
        .ui-datepicker-calendar .ui-state-hover {
            background: #d6e9f8; /* Hover background */
        }
        .ui-datepicker-calendar .ui-state-active {
            background: #0073e6; /* Active date background */
            color: white; /* Active date text color */
        }
    </style>
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
