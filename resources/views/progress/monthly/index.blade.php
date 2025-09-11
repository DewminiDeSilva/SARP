<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Monthly Progress Reports</title>
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

        /* Modern Table Styling */
        .modern-table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .modern-table {
            margin: 0;
        }

        .modern-table thead th {
            background: linear-gradient(135deg, #1e8e1e 0%, #167a1a 100%);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            padding: 1rem;
            border: none;
            text-align: left;
        }

        .modern-table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            font-size: 1rem;
            vertical-align: middle;
        }

        .modern-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .modern-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Modern Button Styling */
        .modern-btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-view {
            background: white;
            color: #1e8e1e;
            border: 2px solid #1e8e1e;
        }

        .btn-view:hover {
            background: #1e8e1e;
            color: white;
        }

        .btn-download {
            background: linear-gradient(135deg, #1e8e1e 0%, #167a1a 100%);
            color: white;
            border: none;
        }

        .btn-download:hover {
            background: linear-gradient(135deg, #167a1a 0%, #0f6614 100%);
            color: white;
            transform: translateY(-1px);
        }

        .btn-add-new {
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

        .btn-add-new:hover {
            background: linear-gradient(135deg, #167a1a 0%, #0f6614 100%);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(30, 142, 30, 0.4);
        }

        /* Modern Tab Styling */
        .modern-tabs .nav-pills { gap: 12px; }

.modern-tabs .nav-pills .nav-link {
  background: #1e8e1e;
  color: #fff;
  border-radius: 12px;
  padding: 0.65rem 1.25rem;
  box-shadow: 0 4px 12px rgba(30,142,30,.2);
}

.modern-tabs .nav-pills .nav-link:hover { filter: brightness(0.95); transform: translateY(-1px); }

.modern-tabs .nav-pills .nav-link.active {
  background: linear-gradient(135deg, #1e8e1e 0%, #0f6614 100%);
  box-shadow: 0 6px 16px rgba(30,142,30,.35);
}



        /* Page Title */
        .page-title {
            color: #1e8e1e;
            font-weight: 700;
            font-size: 2.25rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Empty State */
        .empty-state {
            padding: 3rem 2rem;
            text-align: center;
            color: #6b7280;
            font-size: 1.1rem;
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
    <h3 class="page-title">Monthly Progress Reports</h3>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ==================== YEAR TABS ADDED ==================== --}}
    @php
        $years = range(2021, 2027);
    @endphp

    <div class="modern-tabs">
        <ul class="nav nav-pills mb-4 justify-content-center" id="yearTabs" role="tablist">

            @foreach($years as $i => $y)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($i===0) active @endif"
                            id="tab-{{ $y }}"
                            data-bs-toggle="tab"
                            data-bs-target="#pane-{{ $y }}"
                            type="button"
                            role="tab"
                            aria-controls="pane-{{ $y }}"
                            aria-selected="{{ $i===0 ? 'true' : 'false' }}">
                        {{ $y }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content" id="yearTabsContent">
        @foreach($years as $i => $y)
            @php
                $yearReports = $reports->where('period_year', $y);
            @endphp

            <div class="tab-pane fade @if($i===0) show active @endif" id="pane-{{ $y }}" role="tabpanel" aria-labelledby="tab-{{ $y }}">
                <div class="modern-table-container">
                  @if($yearReports->count() > 0)
                  <table class="table modern-table">
                    <thead>
                      <tr>
                        <th style="width: 25%">Month</th>
                        <th style="width: 10%">Version</th>
                        <th style="width: 30%">Institution</th>
                        <th style="width: 20%">Date of Submission</th>
                        <th style="width: 15%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($yearReports as $r)
                        <tr>
                          <td>{{ date('F', mktime(0,0,0,$r->period_month,1)) }} {{ $r->period_year }}</td>
                          <td>v{{ $r->version }}</td>
                          <td>{{ $r->institution }}</td>
                          <td>{{ optional($r->submission_date)->format('Y-m-d') }}</td>
                          <td class="d-flex gap-2">
                            <a class="modern-btn btn-view" href="{{ route('progress.file.view', $r->id) }}" target="_blank">
                                <i class="fas fa-eye"></i>View
                            </a>
                            <a class="modern-btn btn-download" href="{{ route('progress.file.download', $r->id) }}">
                                <i class="fas fa-download"></i>Download
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <div class="empty-state">
                        <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                        <p>No monthly reports available for {{ $y }}</p>
                    </div>
                  @endif
                </div>
            </div>
        @endforeach
    </div>
    {{-- ================== /YEAR TABS ADDED ===================== --}}

    <div class="mt-4 d-flex gap-2">
      <a href="{{ route('progress.monthly.create') }}" class="btn-add-new">
          <i class="fas fa-plus-circle me-2"></i>Add New Monthly Report
      </a>
    </div>
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
    });
</script>
</body>
</html>
