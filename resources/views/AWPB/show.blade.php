<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AWPB Files for {{ $year }}</title>

    <!-- Include Bootstrap & jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/awpb.css') }}">

    <style>
        .iframe-container {
            width: 100%;
            height: 600px;
            border: 2px solid #198754;
            margin-top: 20px;
            display: none;
        }
        .iframe-title {
            font-size: 18px;
            font-weight: bold;
            color: green;
            margin-top: 10px;
            display: none;
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
    </div>
    <div class="right-column">
    <div class="d-flex align-items-center mb-3">

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>


    <a href="{{ route('awpb.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">List of AWPB {{ $year }}</h2>
        </div>

        <div class="list-group mt-4">
            @foreach($files as $file)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-file-excel"></i> Version {{ $file->version }}</span>
                    <div>
                        <!-- Download Button -->
                        <a href="{{ route('awpb.download', $file->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-download"></i> Download
                        </a>

                        <!-- View Button -->
                        <!-- <button class="btn btn-primary btn-sm view-file-btn"
                            data-file="{{ asset('storage/' . $file->file_path) }}"
                            data-version="Version {{ $file->version }}">
                            <i class="fas fa-eye"></i> View
                        </button> -->
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Frame to display the selected Excel version -->
        <div class="text-center">
            <p class="iframe-title" id="iframe-title"></p>
            <iframe id="file-viewer" class="iframe-container"></iframe>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.view-file-btn').click(function() {
            var fileUrl = $(this).data('file');
            var versionTitle = $(this).data('version');

            // Convert file path for Google Docs Viewer
            var encodedUrl = encodeURIComponent(fileUrl);
            var viewerUrl = "https://docs.google.com/gview?url=" + encodedUrl + "&embedded=true";

            // Show the file in the iframe
            $('#file-viewer').attr('src', viewerUrl);
            $('#iframe-title').text(versionTitle).show();
            $('#file-viewer').show();
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

</body>
</html>
