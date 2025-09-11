<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add New Monthly Progress Report</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />
  <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

        /* Modern Form Styling */
        .modern-form {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .form-control, .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
            transition: all 0.2s ease;
            background-color: #f9fafb;
        }

        .form-control:focus, .form-select:focus {
            border-color: #1e8e1e;
            box-shadow: 0 0 0 3px rgba(30, 142, 30, 0.1);
            background-color: white;
            outline: none;
        }

        .form-control:hover, .form-select:hover {
            border-color: #9ca3af;
            background-color: white;
        }

        .modern-upload-btn {
            background: linear-gradient(135deg, #1e8e1e 0%, #167a1a 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(30, 142, 30, 0.3);
            transition: all 0.2s ease;
        }

        .modern-upload-btn:hover {
            background: linear-gradient(135deg, #167a1a 0%, #0f6614 100%);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(30, 142, 30, 0.4);
        }

        .modern-upload-btn:active {
            transform: translateY(0);
        }

        .page-title {
            color: #1e8e1e;
            font-weight: 700;
            font-size: 2.25rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: block;
            padding: 1rem;
            background: #f3f4f6;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            text-align: center;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .file-input-label:hover {
            border-color: #1e8e1e;
            background: #f0f9ff;
            color: #1e8e1e;
        }

        .file-input-label i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .file-name-display {
            margin-top: 1rem;
            padding: 0.75rem;
            background: #f0f9ff;
            border: 2px solid #1e8e1e;
            border-radius: 8px;
            color: #1e8e1e;
            font-weight: 600;
            display: none;
        }

        .file-name-display.show {
            display: block;
        }

        .file-name-display i {
            margin-right: 0.5rem;
            color: #1e8e1e;
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
        <h3 class="page-title">Add New Monthly Progress Report</h3>

    <form action="{{ route('progress.monthly.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
      @csrf

      <div class="row g-4">
        <div class="col-md-4">
          <label class="form-label">Year</label>
          <select name="period_year" class="form-select" required>
            <option value="">-- Select Year --</option>
            @foreach($years as $y)
              <option value="{{ $y }}" @selected(old('period_year')==$y)>{{ $y }}</option>
            @endforeach
          </select>
          @error('period_year') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Month</label>
          <select name="period_month" class="form-select" required>
            <option value="">-- Select Month --</option>
            @foreach($months as $m)
              <option value="{{ $m }}" @selected(old('period_month')==$m)>{{ date('F', mktime(0,0,0,$m,1)) }}</option>
            @endforeach
          </select>
          @error('period_month') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Institution</label>
          <input type="text" name="institution" class="form-control" value="{{ old('institution') }}" required>
          @error('institution') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4">
          <label class="form-label">Date of Submission</label>
          <input type="date" name="submission_date" class="form-control" value="{{ old('submission_date') }}">
          @error('submission_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-8">
          <label class="form-label">Choose File (Progress Report)</label>
          <div class="file-input-wrapper">
            <label class="file-input-label">
              <i class="fas fa-cloud-upload-alt"></i>
              <span>Click to select file or drag and drop</span>
              <input type="file" name="file" required>
            </label>
          </div>
          <div class="file-name-display" id="fileNameDisplay">
            <i class="fas fa-file-pdf"></i>
            <span id="selectedFileName">No file selected</span>
          </div>
          @error('file') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
      </div>

      <div class="mt-4 d-flex gap-2">
        <button type="submit" class="modern-upload-btn">
          <i class="fas fa-upload me-2"></i>Upload Report
        </button>
      </div>
    </form>
  </div>
</div>

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

        // File upload functionality
        const fileInput = document.querySelector('input[type="file"]');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const selectedFileName = document.getElementById('selectedFileName');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2); // Convert to MB
                
                selectedFileName.textContent = `${fileName} (${fileSize} MB)`;
                fileNameDisplay.classList.add('show');
            } else {
                selectedFileName.textContent = 'No file selected';
                fileNameDisplay.classList.remove('show');
            }
        });
    });
</script>
</body>
</html>
