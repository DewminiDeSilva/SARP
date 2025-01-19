<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $folder->folder_name }} - {{ ucfirst($album) }} Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

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
        /* General Body Styling */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        /* Album Header Styling */
        .album-header {
            text-align: left;
            margin-bottom: 30px;
        }

        .album-header h1 {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
        }

        /* File Input Styling */
        #imageInput {
            display: inline-block;
            font-family: Arial, sans-serif;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: rgb(233, 239, 247);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #imageInput:hover {
            background-color: #007bff;
        }

        #imageInput:active {
            background-color: #004085;
        }

        /* Selected Images Info Styling */
        #selectedImagesInfo {
            margin-top: 10px;
            font-weight: bold;
            color: #6c757d;
        }

        /* Upload Button Styling */
        #uploadButton {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #uploadButton:hover {
            background-color: #218838;
        }

        #uploadButton:disabled {
            background-color: #c3e6cb;
            cursor: not-allowed;
        }

        /* Cancel Button Styling */
        .cancel-button {
            display: inline-block;
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cancel-button:hover {
            background-color: #c82333;
        }

        .cancel-button:active {
            background-color: #bd2130;
        }

        .cancel-button:disabled {
            background-color: #f5c6cb;
            cursor: not-allowed;
        }

        /* Uploaded Images Section */
        .uploaded-images {
            margin-top: 30px;
        }

        .uploaded-images h5 {
            font-weight: bold;
            color: #2c3e50;
        }

        /* Image Container Styling */
        .image-container {
            position: relative;
            display: inline-block;
            margin: 10px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .image-container img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .image-container.selected img {
            border: 4px solid #007bff;
            transform: scale(1.1);
        }

        /* Delete Bar Button */
        .delete-bar button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-bar button:hover {
            background-color: #c82333;
        }

        .delete-bar button:disabled {
            background-color: #f5c6cb;
            cursor: not-allowed;
        }
        .text-muted{
            font-weight: bold;
        }

    </style>
    <style>
        /* Button Styling */
        .import-button {
            width: 200px;
            height: 150px;
            border: 2px dashed #dee2e6;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #007bff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .import-button:hover {
            background-color: #f8f9fa;
        }

        /* Center Content */
        .import-button span {
            font-weight: bold;
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
@include('dashboard.header')
     <div class="frame" style="padding-top: 70px;">
       <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
       </div>
       <div class="right-column">


       <a href="{{ route('gallery.album', ['album' => $album]) }}" class="btn-back">

                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

    <div class="container">
        <!-- Album and Folder Header -->
        <div class="album-header">
            <h1>{{ $folder->folder_name }}</h1>
            <br>

        </div>

        <!-- Card Section for Additional Information -->
        <div class="card mt-4">

            <div class="card-body">

                @if ($folder->description)
                <p class="text-muted" >{{ $folder->description }}</p>
            @else
                <p class="text-muted">No description available for this folder.</p>
            @endif
            <br>

            </div>

        </div>

        <!-- Upload Form -->

        <!-- <div class="card mt-4">
            <div class="card-header">
        <h5 class="mt-4">Upload Images</h5>
        <form id="imageUploadForm" action="{{ route('gallery.image.upload', [$album, $folder->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" id="imageInput" name="images[]" multiple required>
            <div id="selectedImagesInfo" class="mt-2 text-info">No images selected.</div>
            <button type="button" id="cancelButton" class="cancel-button" hidden>Cancel</button>
            <button type="submit" id="uploadButton" disabled>Upload Images</button>
        </form> -->


        <div class="container mt-4">
        <!-- Import Images Button -->
        <div class="import-button" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <span>+ Import Images</span>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Upload Form -->
                        <form id="imageUploadForm" action="{{ route('gallery.image.upload', [$album, $folder->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="file" id="imageInput" name="images[]" class="form-control" multiple required>
                            </div>
                            <div id="selectedImagesInfo" class="mt-2 text-info">No images selected.</div>
                            <div class="mt-3">
                                <button type="button" id="cancelButton" class="btn btn-danger" hidden>Cancel</button>
                                <button type="submit" id="uploadButton" class="btn btn-success" disabled>Upload Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Uploaded Images Section -->
        <br>
        <div class="uploaded-images">
            <h5>Uploaded Images</h5>
            <div class="delete-bar">
                <button id="deleteSelectedBtn" disabled>Delete Selected</button>
            </div>
            <form id="deleteForm" action="{{ route('gallery.image.delete', [$album, $folder->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-3 image-container" data-id="{{ $image->id }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="selected_images" id="selectedImages" value="">
            </form>
        </div>
        </div>
        </div>



    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const selectedImagesInfo = document.getElementById('selectedImagesInfo');
        const uploadButton = document.getElementById('uploadButton');
        const cancelButton = document.getElementById('cancelButton');

        // Update the UI when files are selected
        imageInput.addEventListener('change', () => {
            const files = imageInput.files;
            if (files.length > 0) {
                selectedImagesInfo.textContent = `${files.length} image(s) selected.`;
                uploadButton.disabled = false; // Enable the upload button
                cancelButton.hidden = false; // Show the cancel button
            } else {
                selectedImagesInfo.textContent = 'No images selected.';
                uploadButton.disabled = true; // Disable the upload button
                cancelButton.hidden = true; // Hide the cancel button
            }
        });

        // Clear the selected files and reset the input
        cancelButton.addEventListener('click', () => {
            imageInput.value = ''; // Clear the file input
            selectedImagesInfo.textContent = 'No images selected.';
            uploadButton.disabled = true; // Disable the upload button
            cancelButton.hidden = true; // Hide the cancel button
        });

        const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
        const imageContainers = document.querySelectorAll('.image-container');
        const selectedImagesInput = document.getElementById('selectedImages');
        const deleteForm = document.getElementById('deleteForm');

        let selectedImages = [];

        imageContainers.forEach(container => {
            container.addEventListener('click', () => {
                const imageId = container.dataset.id;
                if (container.classList.contains('selected')) {
                    container.classList.remove('selected');
                    selectedImages = selectedImages.filter(id => id !== imageId);
                } else {
                    container.classList.add('selected');
                    selectedImages.push(imageId);
                }

                deleteSelectedBtn.disabled = selectedImages.length === 0;
                selectedImagesInput.value = selectedImages.join(',');
            });
        });

        deleteSelectedBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('Are you sure you want to delete the selected images?')) {
                deleteForm.submit();
            }
        });
    </script>
</body>
</html>
