<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $folder->folder_name }} - {{ ucfirst($album) }} Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

.frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid rgba(18, 105, 38, 0.12);
            background: #fafbfa;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        /* General Body Styling - soft background */
        body { background-color: #f0f4f2; }

        .container { margin-top: 30px; }

        /* Folder name - big letter size, line colour, nice design */
        .album-header {
            text-align: left;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 4px solid #126926;
            border-left: 5px solid #126926;
            padding-left: 20px;
            margin-left: -5px;
        }
        .album-header h1 {
            font-size: 2.35rem;
            font-weight: 800;
            color: #1a3d1a;
            letter-spacing: 0.02em;
            line-height: 1.25;
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        @media (min-width: 768px) {
            .album-header h1 { font-size: 2.85rem; }
        }
        @media (min-width: 992px) {
            .album-header h1 { font-size: 3rem; }
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
        .uploaded-images { margin-top: 30px; }
        .uploaded-images-title, .uploaded-images h5 {
            font-weight: 700;
            color: #1a3d1a;
            margin-bottom: 16px;
            font-size: 1.2rem;
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
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(18, 105, 38, 0.2);
        }

        .image-container.selected img {
            border: 3px solid #126926;
            box-shadow: 0 4px 16px rgba(18, 105, 38, 0.35);
            transform: scale(1.03);
        }
        .image-container.selected::after {
            content: '\2713';
            position: absolute;
            top: 8px;
            right: 8px;
            width: 28px;
            height: 28px;
            background: #126926;
            color: #fff;
            border-radius: 50%;
            font-size: 16px;
            font-weight: bold;
            line-height: 28px;
            text-align: center;
            z-index: 5;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        .image-container { cursor: pointer; }

        /* Select & delete bar - superb nice, upper only */
        .select-delete-bar {
            margin-bottom: 24px;
            padding: 18px 22px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f7f0 100%);
            border: 2px solid rgba(18, 105, 38, 0.25);
            border-radius: 12px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 16px rgba(18, 105, 38, 0.08);
        }
        .select-delete-bar .select-hint {
            font-size: 1rem;
            color: #1a3d1a;
            font-weight: 600;
            margin: 0;
        }
        .select-delete-bar .select-count {
            font-size: 1rem;
            color: #126926;
            font-weight: 800;
            margin: 0;
            padding: 4px 12px;
            background: rgba(18, 105, 38, 0.12);
            border-radius: 8px;
        }
        .select-delete-bar .btn-clear-selection {
            background: #6c757d;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .select-delete-bar .btn-clear-selection:hover {
            background: #5a6268;
            color: #fff;
        }
        .delete-bar {
            margin-top: 16px;
            margin-bottom: 16px;
            padding: 12px 0;
            border-top: 1px solid #e9ecef;
        }
        .delete-bar button {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .delete-bar button:hover:not(:disabled) {
            background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }
        .delete-bar button:disabled,
        .btn-delete-selected:disabled {
            background: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }
        .btn-delete-selected {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-delete-selected:hover:not(:disabled) {
            background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.35);
        }
        .image-wrapper { position: relative; margin-bottom: 16px; }
        .image-container { margin-bottom: 0; }

    </style>
    <style>
        /* Import button - theme green */
        .import-button {
            width: 200px;
            height: 150px;
            border: 2px dashed rgba(18, 105, 38, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #126926;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .import-button:hover { border-color: #126926; color: #0d4d1f; }
        .import-button span { font-weight: 600; }
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
            background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%);
            color: #fff;
            padding: 4px 8px;
            border-radius: 8px;
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

/* Create Folder modal - same nice popup as album */
#createFolderModal .modal-content { border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); border: none; }
#createFolderModal .modal-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #fff; border-radius: 12px 12px 0 0; padding: 16px 20px; }
#createFolderModal .modal-header .btn-close { filter: brightness(0) invert(1); }
#createFolderModal .modal-title { font-weight: 600; }
#createFolderModal .modal-body { padding: 24px; }
#createFolderModal .form-label { font-weight: 600; color: #1a3d1a; display: block; text-align: center; }
#createFolderModal .form-control { border-radius: 8px; border: 1px solid #dee2e6; text-align: center; }
#createFolderModal .form-control::placeholder { color: #adb5bd; }
#createFolderModal .form-control:focus { border-color: #126926; box-shadow: 0 0 0 0.2rem rgba(18, 105, 38, 0.25); }
#createFolderModal .description-field .form-label { color: #126926; font-size: 0.9rem; }
#createFolderModal .modal-footer { padding: 16px 24px; border-top: 1px solid #eee; }
#createFolderModal .btn-primary { background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%); border: none; border-radius: 8px; padding: 10px 24px; font-weight: 600; }
#createFolderModal .btn-primary:hover { background: linear-gradient(135deg, #0d4d1f 0%, #083d18 100%); }
/* New folder button in header */
.btn-new-folder { background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%); color: #fff; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600; }
.btn-new-folder:hover { background: linear-gradient(135deg, #0d4d1f 0%, #083d18 100%); color: #fff; }
/* Upload Images modal - same colours as create folder popup */
#uploadModal .modal-dialog { max-width: 480px; }
#uploadModal .modal-content { border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); border: none; }
#uploadModal .modal-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #fff; border-radius: 12px 12px 0 0; padding: 16px 20px; }
#uploadModal .modal-header .btn-close { filter: brightness(0) invert(1); }
#uploadModal .modal-title { font-weight: 600; }
#uploadModal .modal-body { padding: 24px; }
#uploadModal .form-label { font-weight: 600; color: #2c3e50; }
#uploadModal .form-control { border-radius: 8px; border: 1px solid #dee2e6; }
#uploadModal .form-control:focus { border-color: #126926; box-shadow: 0 0 0 0.2rem rgba(18, 105, 38, 0.25); }
#uploadModal .modal-footer { padding: 16px 24px; border-top: 1px solid #eee; }
#uploadModal .btn-success { background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%); border: none; border-radius: 8px; padding: 10px 24px; font-weight: 600; }
#uploadModal .btn-success:hover { background: linear-gradient(135deg, #0d4d1f 0%, #083d18 100%); }
#uploadModal .btn-danger { border-radius: 8px; }
#uploadModal #selectedImagesInfo { color: #1a3d1a; font-weight: 500; }
.import-button { border-radius: 12px; background: linear-gradient(135deg, #f5f9f5 0%, #e8f0e8 100%); }
.import-button:hover { background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%); color: #126926; border-color: #126926; box-shadow: 0 4px 12px rgba(18, 105, 38, 0.15); }
.album-header .card { border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
/* Description - big letter size, high label, nice font & CSS */
.folder-description-card {
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(18, 105, 38, 0.1);
    border: 1px solid rgba(18, 105, 38, 0.22);
    border-top: 4px solid #126926;
    background: #fff;
}
.folder-description-body { padding: 32px 40px; }
.folder-description-label {
    font-size: 1.2rem;
    font-weight: 800;
    color: #126926;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 3px solid rgba(18, 105, 38, 0.4);
    display: inline-block;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    line-height: 1.2;
}
.folder-description-text {
    font-size: 1.25rem;
    color: #1a3d1a;
    margin: 0;
    line-height: 1.8;
    max-width: 680px;
    margin-left: auto;
    margin-right: auto;
    letter-spacing: 0.02em;
    font-weight: 500;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}
.folder-description-empty {
    font-size: 1.15rem;
    color: #6b7c6b;
    margin: 0;
    font-style: italic;
    line-height: 1.7;
    font-weight: 500;
}
/* Subfolders grid - theme colours */
.folder-card { position: relative; height: 150px; border-radius: 12px; overflow: hidden; background: linear-gradient(145deg, #f8faf8 0%, #eef5ee 100%); box-shadow: 0 2px 12px rgba(18, 105, 38, 0.08); border: 1px solid rgba(18, 105, 38, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; }
.folder-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(18, 105, 38, 0.18); border-color: rgba(18, 105, 38, 0.25); }
.folder-card-title { font-size: 18px; font-weight: 600; color: #1a3d1a; margin: 0; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; }
.subfolder-delete { position: absolute; bottom: 10px; right: 10px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: #fff; border: none; border-radius: 8px; padding: 5px 12px; font-size: 13px; font-weight: 600; cursor: pointer; z-index: 10; transition: box-shadow 0.2s ease; }
.subfolder-delete:hover { box-shadow: 0 2px 10px rgba(220, 53, 69, 0.4); }
.new-subfolder-card { display: flex; justify-content: center; align-items: center; border: 2px dashed rgba(18, 105, 38, 0.4); border-radius: 12px; height: 150px; color: #126926; font-size: 18px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; background: linear-gradient(145deg, #f5f9f5 0%, #e8f0e8 100%); }
.new-subfolder-card:hover { border-color: #126926; background: linear-gradient(145deg, #e8f5e9 0%, #c8e6c9 100%); color: #0d4d1f; box-shadow: 0 4px 16px rgba(18, 105, 38, 0.2); }
.new-subfolder-card i { font-size: 32px; margin-bottom: 8px; opacity: 0.9; }

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

       <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">

	<div class="d-flex align-items-center gap-2">
		<button id="sidebarToggle" class="btn btn-secondary">
			<i class="fas fa-bars"></i>
		</button>
		<a href="{{ route('gallery.index') }}" class="btn-back">
			<img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
		</a>
	</div>
	@if(auth()->user()->hasPermission('gallery', 'add'))
		<button type="button" class="btn btn-new-folder" data-bs-toggle="modal" data-bs-target="#createFolderModal">
			<i class="fas fa-folder-plus me-1"></i>New Folder
		</button>
	@endif
</div>




    <div class="container">
        <!-- Folder name with coloured line -->
        <div class="album-header">
            <h1>{{ $folder->folder_name }}</h1>
        </div>

        <!-- Subfolders: create folder inside this folder -->
        <div class="mt-4">
            <h5 class="mb-3">Folders</h5>
            <div class="row">
                @if(auth()->user()->hasPermission('gallery', 'add'))
                <div class="col-md-3 mb-4">
                    <div class="new-subfolder-card" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                        <div class="text-center">
                            <i class="fas fa-folder-plus d-block"></i>
                            New Folder
                        </div>
                    </div>
                </div>
                @endif
                @foreach($subfolders ?? [] as $sub)
                <div class="col-md-3 mb-4">
                    <div class="folder-card">
                        @if(auth()->user()->hasPermission('gallery', 'view'))
                        <a href="{{ route('gallery.folder', [$album, $sub->id]) }}" class="stretched-link">
                            <h5 class="folder-card-title">{{ $sub->folder_name }}</h5>
                        </a>
                        @endif
                        @if(auth()->user()->hasPermission('gallery', 'delete'))
                        <form id="deleteSubfolderForm-{{ $sub->id }}" action="{{ route('folder.destroy', [$album, $sub->id]) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" class="subfolder-delete btn-delete-folder" data-form-id="deleteSubfolderForm-{{ $sub->id }}" data-folder-name="{{ $sub->folder_name }}">Delete</button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Description - nice design with line colour -->
        <div class="card mt-4 folder-description-card">
            <div class="card-body text-center folder-description-body">
                <p class="folder-description-label">Description</p>
                @if ($folder->description)
                    <p class="folder-description-text">{{ $folder->description }}</p>
                @else
                    <p class="folder-description-empty">No description available for this folder.</p>
                @endif
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
         @if(auth()->user()->hasPermission('gallery', 'add'))
        <div class="import-button" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <span>+ Import Images</span>
        </div>
        @endif

        <!-- Upload Images Modal (popup - same design as create folder) -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel"><i class="fas fa-cloud-upload-alt me-2"></i>Upload Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="imageUploadForm" action="{{ route('gallery.image.upload', [$album, $folder->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Select images</label>
                                <input type="file" id="imageInput" name="images[]" class="form-control" multiple accept="image/*" required>
                            </div>
                            <div id="selectedImagesInfo" class="mb-3">No images selected.</div>
                            <div class="modal-footer px-0 pb-0 mt-3 pt-3 border-top">
                                <button type="button" id="cancelButton" class="btn btn-secondary" hidden>Cancel</button>
                                <button type="submit" id="uploadButton" class="btn btn-success" disabled><i class="fas fa-upload me-1"></i>Upload Images</button>
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
            <h5 class="uploaded-images-title">Uploaded Images</h5>
            @if(count($images) > 0)
            <div class="select-delete-bar" id="selectDeleteBar">
                <p class="select-hint mb-0">Click images to select for deletion. Click again to deselect.</p>
                <p class="select-count mb-0" id="selectCount">0 selected</p>
                <button type="button" class="btn-clear-selection" id="clearSelectionBtn" style="display: none;"><i class="fas fa-times me-1"></i>Clear selection</button>
                <form id="deleteForm" action="{{ route('gallery.image.delete', [$album, $folder->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="selected_images" id="selectedImages" value="">
                    <button type="button" id="deleteSelectedBtn" class="btn-delete-selected ms-2" disabled><i class="fas fa-trash-alt me-1"></i>Delete selected</button>
                </form>
            </div>
            @endif
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-3 col-sm-4 col-6 mb-4">
                        <div class="image-wrapper">
                            <div class="image-container" data-id="{{ $image->id }}" title="Click to select for deletion">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>

    <!-- Create New Folder Modal (popup) -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel"><i class="fas fa-folder-plus me-2"></i>Create New Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('folder.store', $album) }}" method="POST">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $folder->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="folderName" class="form-label">Folder Name</label>
                            <input type="text" class="form-control" id="folderName" name="name" placeholder="Enter folder name" required>
                        </div>
                        <div class="mb-3 description-field">
                            <label for="folderDescription" class="form-label">Description (optional)</label>
                            <input type="text" class="form-control" id="folderDescription" name="description" placeholder="Short description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check me-1"></i>Create Folder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 for delete confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        const selectCountEl = document.getElementById('selectCount');
        const clearSelectionBtn = document.getElementById('clearSelectionBtn');

        let selectedImages = [];

        function updateSelectionUI() {
            if (selectedImagesInput) selectedImagesInput.value = selectedImages.join(',');
            if (deleteSelectedBtn) deleteSelectedBtn.disabled = selectedImages.length === 0;
            if (selectCountEl) {
                selectCountEl.textContent = selectedImages.length === 0 ? '0 selected' : selectedImages.length + ' image(s) selected';
            }
            if (clearSelectionBtn) clearSelectionBtn.style.display = selectedImages.length > 0 ? 'inline-block' : 'none';
        }

        if (selectedImagesInput && deleteForm) {
            imageContainers.forEach(container => {
                container.addEventListener('click', (e) => {
                    if (e.target.closest('form')) return;
                    const imageId = container.dataset.id;
                    if (container.classList.contains('selected')) {
                        container.classList.remove('selected');
                        selectedImages = selectedImages.filter(id => id !== imageId);
                    } else {
                        container.classList.add('selected');
                        selectedImages.push(imageId);
                    }
                    updateSelectionUI();
                });
            });
            if (deleteSelectedBtn) {
                deleteSelectedBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    var n = selectedImages.length;
                    if (n === 0) return;
                    Swal.fire({
                        title: 'Delete images?',
                        html: 'You are about to delete <strong>' + n + '</strong> selected image(s).<br>This cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete',
                        cancelButtonText: 'Cancel'
                    }).then(function(result) {
                        if (result.isConfirmed && deleteForm) {
                            deleteForm.submit();
                        }
                    });
                });
            }
            if (clearSelectionBtn) {
                clearSelectionBtn.addEventListener('click', () => {
                    imageContainers.forEach(c => c.classList.remove('selected'));
                    selectedImages = [];
                    updateSelectionUI();
                });
            }
        }
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

        document.querySelectorAll('.btn-delete-folder').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var formId = this.getAttribute('data-form-id');
                var folderName = this.getAttribute('data-folder-name') || 'this folder';
                Swal.fire({
                    title: 'Delete folder?',
                    html: 'Delete <strong>' + folderName + '</strong> and all its contents?<br>This cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete'
                }).then(function(result) {
                    if (result.isConfirmed && formId) {
                        var form = document.getElementById(formId);
                        if (form) form.submit();
                    }
                });
            });
        });
    });
</script>
</body>
</html>
