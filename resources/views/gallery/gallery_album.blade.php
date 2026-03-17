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
            border-right: 1px solid rgba(18, 105, 38, 0.12);
            background: #fafbfa;
        }

        .right-column { flex: 0 0 80%; padding: 20px; }
        body { background-color: #f0f4f2; }
        .album-container { margin-top: 30px; }

        /* Album/District name - big letter size, line colour, nice font */
        .album-title {
            text-align: left;
            font-size: 2.35rem;
            font-weight: 800;
            margin-bottom: 0;
            padding-bottom: 18px;
            margin-bottom: 28px;
            color: #1a3d1a;
            letter-spacing: 0.02em;
            line-height: 1.25;
            border-bottom: 4px solid #126926;
            border-left: 5px solid #126926;
            padding-left: 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        @media (min-width: 768px) {
            .album-title { font-size: 2.85rem; }
        }
        @media (min-width: 992px) {
            .album-title { font-size: 3rem; }
        }

        .folder-card {
            position: relative;
            height: 150px;
            border-radius: 12px;
            overflow: hidden;
            background: linear-gradient(145deg, #f8faf8 0%, #eef5ee 100%);
            box-shadow: 0 2px 12px rgba(18, 105, 38, 0.08);
            border: 1px solid rgba(18, 105, 38, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .folder-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(18, 105, 38, 0.18);
            border-color: rgba(18, 105, 38, 0.25);
        }

        .folder-card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a3d1a;
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
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: box-shadow 0.2s ease;
            z-index: 10;
        }

        .delete-button:hover { box-shadow: 0 2px 10px rgba(220, 53, 69, 0.4); }

        .new-folder-card {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed rgba(18, 105, 38, 0.4);
            border-radius: 12px;
            height: 150px;
            color: #126926;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(145deg, #f5f9f5 0%, #e8f0e8 100%);
            transition: all 0.3s ease;
        }
        .new-folder-card:hover {
            border-color: #126926;
            background: linear-gradient(145deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #0d4d1f;
            box-shadow: 0 4px 16px rgba(18, 105, 38, 0.2);
        }
        .new-folder-card i { font-size: 32px; margin-bottom: 8px; opacity: 0.9; }
        /* Create Folder Modal - nice popup */
        #createFolderModal .modal-content { border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); border: none; }
        #createFolderModal .modal-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #fff; border-radius: 12px 12px 0 0; padding: 16px 20px; }
        #createFolderModal .modal-header .btn-close { filter: brightness(0) invert(1); }
        #createFolderModal .modal-title { font-weight: 600; }
        #createFolderModal .modal-body { padding: 24px; }
        #createFolderModal .form-label { font-weight: 600; color: #1a3d1a; display: block; text-align: center; }
        #createFolderModal .form-control { border-radius: 8px; border: 1px solid #dee2e6; text-align: center; }
        #createFolderModal .form-control:focus { border-color: #126926; box-shadow: 0 0 0 0.2rem rgba(18, 105, 38, 0.25); }
        #createFolderModal .description-field .form-label { color: #126926; font-size: 0.9rem; }
        #createFolderModal .modal-footer { padding: 16px 24px; border-top: 1px solid #eee; }
        #createFolderModal .btn-primary { background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%); border: none; border-radius: 8px; padding: 10px 24px; font-weight: 600; }
        #createFolderModal .btn-primary:hover { background: linear-gradient(135deg, #0d4d1f 0%, #083d18 100%); }
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
                    <i class="fas fa-folder-plus"></i><br>New Folder
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

                        @if(auth()->user()->hasPermission('gallery', 'delete'))
                        <form id="deleteFolderForm-{{ $folder->id }}" action="{{ route('folder.destroy', [$album, $folder->id]) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" class="delete-button btn-delete-folder" data-form-id="deleteFolderForm-{{ $folder->id }}" data-folder-name="{{ $folder->folder_name }}">Delete</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Create Folder Modal - popup form -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel"><i class="fas fa-folder-plus me-2"></i>Create New Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('folder.store', $album) }}" method="POST">
                    @csrf
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
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
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
