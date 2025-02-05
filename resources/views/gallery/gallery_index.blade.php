<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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
        /* Gallery Container */
        .gallery-container {
            margin-top: 30px;
        }

        /* Title Styling */
        .gallery-title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        /* Card Styling */
        .gallery-card {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 400px;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-size: cover;
            background-position: center;
        }

        .gallery-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        /* Overlay Effect */
        .gallery-card-body {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .gallery-card:hover .gallery-card-body {
            background: rgba(0, 0, 0, 0.8);
        }

        .gallery-card-title {
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Button Reset */
        .btn-link {
            display: block;
            width: 100%;
            height: 100%;
            padding: 0;
            border: none;
            background: none;
            text-align: left;
            text-decoration: none;
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
    <div class="container gallery-container">

    <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Gallery</h2>
        </div>
        <div class="row g-4">
            @foreach($albums as $name => $album)
                <div class="col-md-4 col-lg-3">
                    <form action="{{ route('gallery.album', $album['key']) }}" method="GET">
                        <button type="submit" class="btn btn-link">
                            <div class="card gallery-card shadow-sm" style="background-image: url('{{ asset($album['image']) }}');">
                                <div class="gallery-card-body">
                                    <h5 class="gallery-card-title">{{ $name }}</h5>
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
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
