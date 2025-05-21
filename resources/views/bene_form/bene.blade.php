<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Center the image container */
        .img-container {
            display: flex;
            justify-content: center; /* Horizontally center the images */
            align-items: center;
            gap: 30px; /* Space between images */
            margin-top: 20px;
        }

        .img-container img {
            border-radius: 15px;
            height: auto;
            max-width: 100%; /* Ensures the images don't exceed the container width */
            width: 150px; /* Adjust the width of the images */
        }

        .btn-large {
            width: 100%;
            height: 200px;
            font-size: 24px;
        }

        .container {
            margin-top: 50px;
        }

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
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
<div style="padding-top: 70px;">


    <div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC') <!-- Dashboard section included -->
            @csrf
        </div>

        <div class="right-column">

        <div class="d-flex align-items-center mb-3">

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>



    </div>

    <!-- Center the images in a flexbox container -->
    <div class="img-container">
        <img src="{{ asset('assets/images/b12.png') }}" alt="Image 1">
        <img src="{{ asset('assets/images/r1.jpeg') }}" alt="Image 2">
        <img src="{{ asset('assets/images/sarp2.png') }}" alt="Image 3">
    </div>


            <div class="container text-center">
                <div class="row">
                    <!-- Beneficiary Registration Form Button -->
                    <div class="col-md-6">
                        @if(auth()->user()->hasPermission('bene_form', 'add'))

                        <a href="{{ route('bene-form.create') }}" class="btn btn-primary btn-large">
                            Beneficiary Registration Form
                        </a>
                        @endif
                    </div>
                    <!-- Beneficiary View Button -->
                    @if(auth()->user()->hasPermission('bene_form', 'view'))
                        <div class="col-md-6">
                            <a href="{{ route('bene-form.index') }}" class="btn btn-success btn-large">
                                Beneficiary View
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
