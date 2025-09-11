<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Progress Reports</title>
  <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Optional: Bootstrap 5 for styling -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />

  <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-color: darkgreen !important;
        }
        .submit-button {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submit-button:hover {
            background-color: #145c32;
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

        /* Modern Progress Report Buttons */
        .progress-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 20px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .progress-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
            color: white;
            text-decoration: none;
        }

        .progress-btn:active {
            transform: translateY(0);
        }

        .btn-monthly {
            background: linear-gradient(135deg, #5D8736 0%, #4a6e2b 100%);
        }

        .btn-quarterly {
            background: linear-gradient(135deg, #347433 0%, #2a5d29 100%);
        }

        .btn-annual {
            background: linear-gradient(135deg, #3E7B27 0%, #336621 100%);
        }

        .btn-outline-monthly {
            background: white;
            color: #5D8736;
            border: 2px solid #5D8736;
        }

        .btn-outline-quarterly {
            background: white;
            color: #347433;
            border: 2px solid #347433;
        }

        .btn-outline-annual {
            background: white;
            color: #3E7B27;
            border: 2px solid #3E7B27;
        }

        .btn-outline-monthly:hover {
            background: #5D8736;
            color: white;
        }

        .btn-outline-quarterly:hover {
            background: #347433;
            color: white;
        }

        .btn-outline-annual:hover {
            background: #3E7B27;
            color: white;
        }

        .progress-icon {
            margin-right: 12px;
            font-size: 20px;
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
        @csrf
    </div>

    <div class="right-column">

    <div class="d-flex align-items-center mb-3">

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<a href="{{ route('progress.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>
  <div class="container py-4">
    <h3 style="font-size: 2rem; color: green; text-align: center;">Progress Reports</h3>

</br>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
      <!-- Row 1 -->
      <div class="col-md-6">
        <a href="{{ route('progress.monthly.create') }}" class="progress-btn btn-monthly w-100">
          <i class="fas fa-plus-circle progress-icon"></i>
          Add New Monthly Progress Report
        </a>
      </div>
      <div class="col-md-6">
        <a href="{{ route('progress.monthly.index') }}" class="progress-btn btn-outline-monthly w-100">
          <i class="fas fa-eye progress-icon"></i>
          View Monthly Progress Reports
        </a>
      </div>

      <!-- Row 2 -->
      <div class="col-md-6">
        <a href="{{ route('progress.quarterly.create') }}" class="progress-btn btn-quarterly w-100">
          <i class="fas fa-plus-circle progress-icon"></i>
          Add New Quarter Progress Report
        </a>
      </div>
      <div class="col-md-6">
        <a href="{{ route('progress.quarterly.index') }}" class="progress-btn btn-outline-quarterly w-100">
          <i class="fas fa-eye progress-icon"></i>
          View Quarter Progress Reports
        </a>
      </div>

      <!-- Row 3 -->
      <div class="col-md-6">
        <a href="{{ route('progress.annual.create') }}" class="progress-btn btn-annual w-100">
          <i class="fas fa-plus-circle progress-icon"></i>
          Add New Annual Progress Report
        </a>
      </div>
      <div class="col-md-6">
        <a href="{{ route('progress.annual.index') }}" class="progress-btn btn-outline-annual w-100">
          <i class="fas fa-eye progress-icon"></i>
          View Annual Progress Reports
        </a>
      </div>
    </div>
  </div>
    </div>

  <!-- Optional: Bootstrap JS (if you need JS features) -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>

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
