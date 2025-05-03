<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fingerling Details</title>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .entries-container {
        display: flex;
        align-items: center;
    }
    .entries-container label {
        margin-bottom: 0;
    }
    .entries-container select {
        display: inline-block;
        width: auto;
    }
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
        .pagination .page-item {
            margin: 0 0px;
        }
        .pagination .page-link {
            padding: 5px 10px;
        }
        .page-item {
            background-color: white;
            padding: 0px;
        }
        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }
        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }
        .page-link {
            color : #28a745;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
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
    .btn[disabled] {
        cursor: not-allowed;
        opacity: 0.75;
    }

    .btn[disabled] {
        opacity: 0.7;
        cursor: not-allowed;
    }
    .gap-2 > * {
        margin-right: 0.5rem;
    }


    /* Stylish select */
    .status-select {
        appearance: none;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        width: 150px;
    }

    .status-select:hover {
        background-color: #f1f1f1;
        border-color: #28a745;
    }

    /* Animated option colors */
    .status-select option[value="Full"] {
        background-color: #d4edda; /* Light Green */
    }
    .status-select option[value="Partial"] {
        background-color: #fff3cd; /* Light Yellow */
    }
    .status-select option[value="Not Harvested Yet"] {
        background-color: #e2e3e5; /* Light Grey */
    }
    .status-select option[value="Clear"] {
        background-color: #f8d7da; /* Light Red */
    }

    /* Nice badge transition */
    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        font-size: 0.85rem;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        
    }
    .status-badge:hover {
        transform: scale(1.05);
    }

    .badge-full {
        background-color: #28a745;
    }
    .badge-partial {
        background-color: #ffc107;
    }
    .badge-not-harvested {
        background-color: #6c757d;
    }
    .badge-clear {
        background-color: #dc3545;
    }
    
    /* ── SUMMARY CARD STYLES ───────────────────────────── */
.summary-card {
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 1rem;
}
.summary-card .card-header {
  background-color: #d1ecf1;     /* light teal */
  color: #0c5460;                /* dark teal text */
  text-align: center;
  font-weight: 600;
  padding: 0.75rem;
}
.summary-card .card-body {
  text-align: center;
  padding: 1.25rem;
}
.summary-card .number {
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0.5rem 0;
}
.summary-card .description {
  font-size: 0.875rem;
  color: #555;
}
/* ───────────────────────────────────────────────────── */


</style>

<style>
    /* Make all status badges a bit larger */
    .status-container .badge {
        font-size: 3rem;    /* adjust to taste (1rem = 16px) */
        padding: 0.6em 1em;   /* optional: a bit more breathing room */
    }

    td .status-badge {
  font-size: 0.9rem !important;
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


	<a href="{{ route('fingerling.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

</div>





        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Fingerlings Stocking Details</h1>
            </div>

            <div class="row mb-4 mt-5">
  <div class="col-6 col-md-3">
    <div class="card summary-card">
      <div class="card-header">Stocked Tanks</div>
      <div class="card-body">
        <div class="number">{{ $totalStocked }}</div>
        <div class="description">Tanks where fingerlings were stocked</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card summary-card">
      <div class="card-header">Fully Harvested</div>
      <div class="card-body">
        <div class="number">{{ $fullCount }}</div>
        <div class="description">Tanks harvested completely</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card summary-card">
      <div class="card-header">Partially Harvested</div>
      <div class="card-body">
        <div class="number">{{ $partialCount }}</div>
        <div class="description">Tanks harvested partially</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card summary-card">
      <div class="card-header">Not Yet Harvested</div>
      <div class="card-body">
        <div class="number">{{ $notYetCount }}</div>
        <div class="description">Tanks awaiting first harvest</div>
      </div>
    </div>
  </div>
</div>

<form method="GET" action="{{ route('fingerling.index') }}" class="form-inline mb-3">
  <div class="form-row w-100 align-items-center">
    <!-- Text Search -->
    <div class="col-auto">
      <input
        type="text"
        class="form-control"
        name="search"
        placeholder="Search Tanks"
        value="{{ request('search') }}"
      >
    </div>

    <!-- Status Filter -->
    <div class="col-auto">
      <select name="status" class="form-control">
        <option value="">-- All Statuses --</option>
        @foreach($statusOptions as $opt)
          <option value="{{ $opt }}"
            {{ request('status') === $opt ? 'selected' : '' }}>
            {{ $opt }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Submit -->
    <div class="col-auto">
      <button type="submit" class="btn btn-success">Search</button>
    </div>
  </div>
</form>

            <div class="row table-container mt-4">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Tank ID</th>
                                <th>Tank Name</th>
                                <th>DS Division</th>
                                <th>GN Division</th>
                                <th>AS Centre</th>
                                <th>River Basin</th>
                                <th>Cascade Name</th>
                                <th>Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanks as $tank)
    @php
        // Check if the current tank has fingerling data
        $hasData = $tanksWithFingerlings->contains($tank->id);
    @endphp
    <tr @if($hasData) style="background-color: #fff3cd;" @endif> {{-- Highlight tanks with data --}}
        <td>
            @if($hasData)
                <strong>{{ $tank->tank_id }}</strong> {{-- Bold if data exists --}}
            @else
                {{ $tank->tank_id }}
            @endif
        </td>

                                <td>{{ $tank->tank_name }}</td>
                                <td>{{ $tank->ds_division_name }}</td>
                                <td>{{ $tank->gn_division_name }}</td>
                                <td>{{ $tank->as_centre }}</td>
                                <td>{{ $tank->river_basin }}</td>
                                <td>{{ $tank->cascade_name }}</td>

                                <td class="text-center">
                                    @php
                                        $status = $statuses[$tank->id] ?? null;
                                        $badgeClass = '';

                                        if ($status === 'Full') {
                                            $badgeClass = 'badge-success';
                                        } elseif ($status === 'Partial') {
                                            $badgeClass = 'badge-warning';
                                        } elseif ($status === 'Not Harvested Yet') {
                                            $badgeClass = 'badge-secondary';
                                        }
                                    @endphp
                                    
                                    <div id="status-{{ $tank->id }}">
                                        @if($status)
                                            <span class="badge {{ $badgeClass }} status-badge" style="cursor:pointer;" onclick="toggleDropdown({{ $tank->id }})">
                                                {{ $status }}
                                            </span>
                                        @else
                                            <select class="form-control form-control-sm" onchange="submitStatus(this, {{ $tank->id }})">
                                                <option value="">-- Select Status --</option>
                                                <option value="Full">Full</option>
                                                <option value="Partial">Partial</option>
                                                <option value="Not Harvested Yet">Not Harvested Yet</option>
                                            </select>
                                        @endif
                                    </div>
                                    
                                    <!-- Hidden form -->
                                    <form id="status-form-{{ $tank->id }}" action="{{ route('fingerling.updateStatus', $tank->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        <input type="hidden" name="status" id="status-input-{{ $tank->id }}">
                                    </form>
                                </td>




                                <td class="buttonline text-center">
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        {{-- View Data button (only if tank has fingerling data) --}}
                                        @if ($hasData)
                                            <a href="{{ route('fingerling.show', ['tank_id' => $tank->id]) }}" class="btn btn-info btn-sm">View Data</a>
                                        @endif
                                
                                        {{-- Add Data button (always enabled) --}}
                                        <form action="{{ route('fingerling.create', $tank->id) }}" method="GET" style="display:inline;">
                                            <button type="submit" class="btn btn-primary btn-sm">Add Stocking Data</button>
                                        </form>
                                    </div>
                                </td>
                                
                                
                                 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $tanks->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $tanks->previousPageUrl() }}">Previous</a>
                            </li>
                            @php
                                $currentPage = $tanks->currentPage();
                                $lastPage = $tanks->lastPage();
                                $startPage = max($currentPage - 2, 1);
                                $endPage = min($currentPage + 2, $lastPage);
                            @endphp
                            @if ($startPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tanks->url(1) }}">1</a>
                                </li>
                                @if ($startPage > 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                            @endif
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tanks->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ($endPage < $lastPage)
                                @if ($endPage < $lastPage - 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tanks->url($lastPage) }}">{{ $lastPage }}</a>
                                </li>
                            @endif
                            <li class="page-item {{ $tanks->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $tanks->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>

                    @php
                        $currentPage = $tanks->currentPage();
                        $perPage = $tanks->perPage();
                        $total = $tanks->total();
                        $startingNumber = ($currentPage - 1) * $perPage + 1;
                        $endingNumber = min($total, $currentPage * $perPage);
                    @endphp

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div id="tableInfo" class="text-right">
                            <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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

<script>
    function toggleDropdown(tankId) {
    const statusDiv = document.getElementById('status-' + tankId);

    statusDiv.innerHTML = `
        <select class="status-select" onchange="submitStatus(this, ${tankId})">
            <option value="">-- Select Status --</option>
            <option value="Full">Full</option>
            <option value="Partial">Partial</option>
            <option value="Not Harvested Yet">Not Harvested Yet</option>
            <option value="Clear">Clear Status</option>
        </select>
    `;
}

    function submitStatus(select, tankId) {
        const form = document.getElementById('status-form-' + tankId);
        const input = document.getElementById('status-input-' + tankId);

        input.value = select.value;
        form.submit();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function toggleDropdown(tankId) {
        const statusDiv = document.getElementById('status-' + tankId);

        statusDiv.innerHTML = `
            <select class="form-control form-control-sm" onchange="submitStatus(this, ${tankId})">
                <option value="">-- Select Status --</option>
                <option value="Full">Full</option>
                <option value="Partial">Partial</option>
                <option value="Not Harvested Yet">Not Harvested Yet</option>
                <option value="Clear">Clear Status</option>
            </select>
        `;
    }

    function submitStatus(select, tankId) {
        const selectedValue = select.value;
        const form = document.getElementById('status-form-' + tankId);
        const input = document.getElementById('status-input-' + tankId);

        if (selectedValue === 'Clear') {
            input.value = '';
        } else {
            input.value = selectedValue;
        }

        // Add a fade-out effect BEFORE submitting
        const badgeContainer = document.getElementById('status-' + tankId);
        badgeContainer.style.transition = "opacity 0.5s ease";
        badgeContainer.style.opacity = 0; 

        setTimeout(() => {
            form.submit();
        }, 500); // Wait until the fade finishes
    }

    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        @if(session('cleared'))
            Swal.fire({
                icon: 'success',
                title: 'Cleared!',
                text: '{{ session('cleared') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        // When page loads after update, fade-in effect
        document.querySelectorAll('[id^=status-]').forEach(function(div) {
            div.style.opacity = 0;
            div.style.transition = "opacity 0.5s ease";
            setTimeout(() => {
                div.style.opacity = 1;
            }, 100);
        });
    });
</script>





</body>
</html>
