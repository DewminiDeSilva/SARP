<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($album) }}</title>
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
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .album-container {
            margin-top: 30px;
        }

        .album-title {
            text-align: left;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2c3e50;

        }

        .folder-card {
            position: relative;
            height: 150px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .folder-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .folder-card-title {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .delete-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px; /* Change to rectangle */
            padding: 5px 10px; /* Add padding for text */
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            z-index: 10;
        }

        .delete-button:hover {
            background-color: #b02a37;
        }

        .new-folder-card {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #ddd;
            border-radius: 10px;
            height: 150px;
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .new-folder-card:hover {
            border-color: #007bff;
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


	<a href="{{ route('gallery.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

</div>



    <div class="container album-container">
        <h1 class="album-title">{{ ucfirst($album) }}</h1>

        <!-- Create Folder -->
        <div class="row">
            @if(auth()->user()->hasPermission('gallery', 'add'))
            <div class="col-md-3 mb-4">
                <div class="new-folder-card" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                    + New Folder
                </div>
            </div>
            @endif

            <!-- Folder Cards -->
            @foreach($folders as $folder)
                <div class="col-md-3 mb-4">
                    <div class="folder-card">
                        @if(auth()->user()->hasPermission('gallery', 'view'))
                        <a href="{{ route('gallery.folder', [$album, $folder->id]) }}" class="stretched-link">
                            <h5 class="folder-card-title">{{ $folder->folder_name }}</h5>
                        </a>
                        @endif

                        <!-- Delete Button -->
                         @if(auth()->user()->hasPermission('gallery', 'delete'))
                        <button class="delete-button" data-bs-toggle="modal" data-bs-target="#deleteFolderModal-{{ $folder->id }}">Delete</button>
                        @endif
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteFolderModal-{{ $folder->id }}" tabindex="-1" aria-labelledby="deleteFolderModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteFolderModalLabel">Delete Folder</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the folder "{{ $folder->folder_name }}"? This action cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('folder.destroy', [$album, $folder->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Create Folder Modal -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel">Create New Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('folder.store', $album) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="folderName" class="form-label">Folder Name</label>
                            <input type="text" class="form-control" id="folderName" name="name" placeholder="Folder Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="folderDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="folderDescription" name="description" placeholder="Folder Description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
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
