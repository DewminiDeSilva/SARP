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

        <!-- Table for Uploaded Files -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Uploaded File</th>
                        <th>Upload Date</th>
                        <th>Download</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td><strong>Version {{ $file->version }}</strong></td>
                            <td>{{ $file->created_at->format('Y-m-d') }}</td>
                            <td>
                            <a href="{{ route('awpb.download', $file->id) }}" class="btn btn-success btn-sm">
                                    Download
                                </a>
                            </td>
                            </td>
                            <td>
                                <a href="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode(asset('storage/' . $file->file_path)) }}"
                                target="_blank"
                                class="btn btn-primary btn-sm">
                                View
                                </a>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @if(isset($metadata[$file->id]))
            <table class="metadata-table">
                <tr>
                    <th>File Name</th>
                    <td>{{ $metadata[$file->id]['file_name'] }}</td>
                </tr>
                <tr>
                    <th>File Size</th>
                    <td>{{ $metadata[$file->id]['file_size'] }}</td>
                </tr>
                <tr>
                    <th>Total Sheets</th>
                    <td>{{ $metadata[$file->id]['total_sheets'] }}</td>
                </tr>
                <tr>
                    <th>Sheet Names</th>
                    <td>{{ implode(', ', $metadata[$file->id]['sheet_names']) }}</td>
                </tr>
                <tr>
                    <th>First 5 Rows (Sheet 1)</th>
                    <td>
                        <pre>{{ json_encode($metadata[$file->id]['preview_rows'], JSON_PRETTY_PRINT) }}</pre>
                    </td>
                </tr>
            </table>
        @endif


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

            var encodedUrl = encodeURIComponent(fileUrl);
            var viewerUrl = "https://docs.google.com/gview?url=" + encodedUrl + "&embedded=true";

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
