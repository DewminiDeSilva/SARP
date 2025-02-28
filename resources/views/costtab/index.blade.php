<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cost Tab Files</title>

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

<style>
    .sidebar {
        transition: transform 0.3s ease;
    }

    .sidebar.hidden {
        transform: translateX(-100%);
    }

    #sidebarToggle {
        background-color: #126926;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818;
    }

    .left-column.hidden {
        display: none;
    }

    .right-column {
        transition: flex 0.3s ease, padding 0.3s ease;
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



    </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">List of Cost Tab PDFs</h2>
        </div>

        <a href="{{ route('costtab.create') }}" class="btn btn-success">
        <i class="fas fa-upload"></i> Upload New PDF
    </a>

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
                                <a href="{{ route('costtab.download', $file->id) }}" class="btn btn-success btn-sm">
                                    Download
                                </a>
                            </td>
                            <td>
    <a href="{{ asset('storage/cost_tab/' . basename($file->file_path)) }}"
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

        <!-- Frame to display the selected PDF version -->
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

            $('#file-viewer').attr('src', fileUrl);
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
            sidebar.classList.toggle('hidden');

            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%';
                content.style.padding = '20px';
            } else {
                content.style.flex = '0 0 80%';
                content.style.padding = '20px';
            }
        });
    });
</script>

</body>
</html>
