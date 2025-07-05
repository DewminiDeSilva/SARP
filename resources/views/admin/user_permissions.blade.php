<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Permissions</title>

    <!-- Bootstrap CSS (optional, or replace with your framework CSS) -->
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
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

<style>
        /* Fixed Header */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to bottom,rgb(76, 167, 88), #a8d5ba); /* Vertical gradient */
            color: black; /* Text color */
            z-index: 1000; /* Ensures header stays above other elements */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 20px; /* Adjust this value for more/less curve */
            border-bottom-right-radius: 20px; /* Adjust this value for more/less curve */
        }

        /* Logo and Text */
        .fixed-header .logo-container {
            display: flex;
            align-items: center;
            font-family: 'Noto Sans', sans-serif; /* Apply Noto Sans font */
            font-size: 1.8rem; /* Adjust the font size */
            margin: 0;
            color: black; /* Text color */
            font-weight: bold; /* Ensure the title stands out */
            text-align: center;
        }

        .fixed-header img {
            height: 40px;
            margin-right: 10px;
        }

        .fixed-header h1 {
            font-size: 1.5rem;
            margin: 0;
            color: black; /* Header text color */
        }

        /* Profile Section */
        .fixed-header .profile {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .fixed-header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Padding to prevent overlap */
        .content {
            margin-top: 80px; /* Adjust based on header height */
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 15px; /* Add space between the logos */
        }

        .ministry-logo, .ifad-logo, .sharp-logo {
            height: 50px; /* Ensure all logos are of the same height */
            max-width: 70px; /* Limit the width to ensure proportions are maintained */
        }

        /* Custom width for the Ministry logo */
        .custom-ministry-logo {
            max-width: 120px; /* Adjust the width as needed */
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

<style>
/* Style checkboxes to appear green when checked */
input[type="checkbox"] {
    accent-color: #1e8e1e; /* Green color */
    width: 18px;
    height: 18px;
    cursor: pointer;
}

/* Optional: Add a green border around unchecked checkboxes */
input[type="checkbox"]:not(:checked) {
    border: 2px solid #1e8e1e;
    background-color: white;
    width: 18px;
    height: 18px;
}
</style>

<style>

/* General checkbox styling */
table td input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

/* Column 2 = View */
table td:nth-child(2) input[type="checkbox"] {
    accent-color: #1e8e1e; /* Green */
}

/* Column 3 = Add */
table td:nth-child(3) input[type="checkbox"] {
    accent-color: #1e60d3; /* Blue */
}

/* Column 4 = Edit */
table td:nth-child(4) input[type="checkbox"] {
    accent-color: #17a2b8; /* Red */
}

/* Column 5 = Delete */
table td:nth-child(5) input[type="checkbox"] {
    accent-color: #c0392b; /* Orange */
}

/* Column 6 = Upload CSV */
table td:nth-child(6) input[type="checkbox"] {
    accent-color: #8e44ad; /* Purple */
}

    </style>

</head>
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


    <a href="{{  route('admin.admin.users') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    </div>
<body class="bg-light text-dark">

    <div class="container">
        <h2 class="mb-4">Assign Permissions to: {{ $user->name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.assign.permissions', $user->id) }}">
            @csrf

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Module</th>
                            @foreach ($actions as $action)
                                 <th class="col-{{ $action }}">{{ ucfirst($action) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td class="text-start">{{ ucfirst(str_replace('_', ' ', $module)) }}</td>
                                @foreach ($actions as $action)
                                    <td>
                                        <input type="checkbox" name="permissions[]"
                                               value="{{ $module }}|{{ $action }}"
                                               {{ $user->hasPermission($module, $action) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-success">Save Permissions</button>
        </form>
    </div>

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
