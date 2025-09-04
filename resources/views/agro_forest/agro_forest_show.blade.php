<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agro Forest — Details</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- ***** SAME CSS FROM YOUR EOI PAGE ***** -->
  <style>
    .frame { display:flex; flex-direction:row; justify-content:space-between; width:100%; }
    .left-column { flex:0 0 20%; border-right:1px solid #dee2e6; }
    .right-column { flex:0 0 80%; padding:20px; transition:flex .3s ease, padding .3s ease; }
    .sidebar { transition: transform .3s ease; }
    .left-column.hidden { display:none; }

    #sidebarToggle{ background-color:#126926; color:#fff; border:none; padding:10px; border-radius:5px; cursor:pointer; }
    #sidebarToggle:hover{ background-color:#0a4818; }

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

    .submitbtton{ color:#fff; background-color:#198754; border-color:#198754; }
    .submitbtton:active, .submitbtton:hover{ background-color:#145c32; border-color:#145c32; color:#fff; }

    .custom-button, .edit-button, .view-button{
      width:60px; height:40px; display:flex; align-items:center; justify-content:center; border:2px solid transparent;
      transition:border .3s ease, background-color .3s ease;
    }
    .custom-button{ color:red; background:#f5c6cb; } .custom-button:hover{ border-color:red; }
    .edit-button{ color:orange; background:#ffeeba; } .edit-button:hover{ border-color:orange; }
    .view-button{ color:#fff; background:#60C267; } .view-button:hover{ border-color:green; }
    .action-buttons{ display:flex; gap:10px; }

    td{ vertical-align:middle; white-space:nowrap; }

    .pagination .page-link{ padding:5px 10px; }
    .page-item{ background:#fff; padding:0; }
    .pagination:hover{ border-color:#fff; background:#fff; }
    .page-item:hover{ border-color:#fff; background:#fff; cursor:pointer; }
    .page-link{ color:#28a745; }
    .page-item.active .page-link{ z-index:3; color:#fff; background:#126926; border-color:#126926; }
  </style>

  <style>
    /* keep status badge styles here (not used on view page, but retained to match your EOI css pack) */
    .status-badge{ display:inline-block; padding:5px 10px; font-size:.9rem; border-radius:10px; color:#fff; cursor:pointer; transition:transform .3s ease; }
    .status-badge:hover{ transform:scale(1.05); }
    .badge-evaluation-completed{ background:#28a745; }
    .badge-other{ background:#6c757d; }
    .status-select{
      appearance:none; background:#f9f9f9; border:1px solid #ccc; padding:5px 10px; font-size:.9rem; border-radius:8px;
      box-shadow:0 2px 5px rgba(0,0,0,.1); transition:all .3s ease; width:150px;
    }
    .status-select:hover{ background:#f1f1f1; border-color:#28a745; }
  </style>

  <style>
    .stats-wrap{ display:grid; grid-template-columns:repeat(12,1fr); gap:16px; margin-bottom:16px; }
    @media (max-width:991.98px){ .stats-wrap{ grid-template-columns:repeat(6,1fr);} }
    @media (max-width:575.98px){ .stats-wrap{ grid-template-columns:repeat(2,1fr);} }
    .stat-card{
      grid-column:span 4; border:1px solid #dee2e6; border-radius:8px; background:#fff; overflow:hidden;
      box-shadow:0 2px 6px rgba(0,0,0,.04); transition:transform .15s ease, box-shadow .15s ease;
    }
    .stat-card:hover{ transform:translateY(-2px); box-shadow:0 6px 14px rgba(0,0,0,.06); }
    .stat-head{
      background:#d6f1f5; padding:10px 14px; font-weight:600; color:#234b5a; border-bottom:1px solid #cfe7ec;
      border-top-left-radius:8px; border-top-right-radius:8px;
    }
    .stat-body{ padding:16px; text-align:center; font-size:1.25rem; color:#2c3e50; }

    .search-form .form-label{ font-weight:600; font-size:.85rem; }
    .search-form .form-control{ font-size:.9rem; padding:6px 8px; }
    .search-form .btn{ padding:6px 14px; font-size:.9rem; }
    .form-select-sm,.form-control-sm{ font-size:.875rem; padding:.25rem .5rem; }
    .btn-sm{ font-size:.875rem; padding:.25rem .75rem; }

    td{ vertical-align:middle; white-space:normal; word-wrap:break-word; max-width:300px; }
  </style>
  <!-- ***** /EOI CSS ***** -->
</head>
<body>

@include('dashboard.header')

<div class="frame" style="padding-top:70px;">
  <div class="left-column">
    @include('dashboard.dashboardC')
    @csrf
  </div>

  <div class="right-column">

    <!-- Top bar -->
    <div class="d-flex align-items-center mb-3">
      <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
      </button>

      <a href="{{ route('agro-forest.index') }}" class="btn-back ml-2 mr-auto">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back">
        <span class="btn-text">Back</span>
      </a>
      

      <div class="action-buttons">
        <a href="{{ route('agro-forest.edit', $agro_forest->id) }}" class="btn btn-sm edit-button" title="Edit">
          <img src="{{ asset('assets/images/edit2.png') }}" alt="Edit" style="width:16px;height:16px;">
        </a>
        <form action="{{ route('agro-forest.destroy', $agro_forest->id) }}" method="POST" id="deleteForm" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm custom-button" title="Delete">
            <img src="{{ asset('assets/images/delete.png') }}" alt="Delete" style="width:16px;height:16px;">
          </button>
        </form>
      </div>
    </div>

    <div class="container-fluid">
      <h2 class="text-success text-center mb-3">Agro Forest — Details</h2>

      @if (session('success')) <div class="alert alert-success mt-2">{{ session('success') }}</div> @endif
      @if (session('error'))   <div class="alert alert-danger  mt-2">{{ session('error') }}</div>   @endif

      <!-- Details card -->
      <div class="border rounded p-4" style="border-color:#126926;">
        <!-- Location & Admin -->
        <div class="row">
          <div class="col-md-6">
            <p><strong class="text-success">River Basin:</strong> {{ $agro_forest->river_basin ?? '-' }}</p>
            <p><strong class="text-success">Province:</strong> {{ $agro_forest->province_name ?? '-' }}</p>
            <p><strong class="text-success">District:</strong> {{ $agro_forest->district ?? '-' }}</p>
            <p><strong class="text-success">GN Division:</strong> {{ $agro_forest->gn_division_name ?? '-' }}</p>
          </div>
          <div class="col-md-6">
            <p><strong class="text-success">Tank Name:</strong> {{ $agro_forest->tank_name ?? '-' }}</p>
            <p><strong class="text-success">Replanting Forest Beat:</strong> {{ $agro_forest->replanting_forest_beat_name ?? '-' }}</p>
          </div>
        </div>

        <!-- Physical & Financial -->
        <div class="row">
          <div class="col-md-6">
            <p><strong class="text-success">Number of Hectares (Ha):</strong>
              {{ $agro_forest->number_of_hectares !== null ? number_format($agro_forest->number_of_hectares, 2) : '-' }}
            </p>
            <p><strong class="text-success">Establish Cost (Rs.):</strong>
              {{ $agro_forest->establish_cost !== null ? number_format($agro_forest->establish_cost, 2) : '-' }}
            </p>
          </div>
          <div class="col-md-6">
            <p><strong class="text-success">GPS Longitude:</strong> {{ $agro_forest->gps_longitude ?? '-' }}</p>
            <p><strong class="text-success">GPS Latitude:</strong> {{ $agro_forest->gps_latitude ?? '-' }}</p>
            @if(!is_null($agro_forest->gps_latitude) && !is_null($agro_forest->gps_longitude))
              <a class="btn btn-success btn-sm"
                 target="_blank"
                 href="https://www.google.com/maps/search/?api=1&query={{ $agro_forest->gps_latitude }},{{ $agro_forest->gps_longitude }}">
                 <i class="fa fa-map-marker-alt mr-1"></i> Open in Google Maps
              </a>
            @endif
          </div>
        </div>

        <!-- Proposal -->
        <hr>
        <h5 class="text-success">Project Proposal</h5>
        @php
          $proposalUrl = $agro_forest->project_proposal_path ? asset('storage/' . $agro_forest->project_proposal_path) : null;
        @endphp
        @if($proposalUrl)
          <a href="{{ $proposalUrl }}" class="btn btn-outline-primary btn-sm" target="_blank">
            <i class="fa fa-file-pdf mr-1"></i> View Proposal (PDF)
          </a>
        @else
          <span class="text-muted">No proposal uploaded.</span>
        @endif>

        <!-- Species -->
        <hr>
        <h5 class="text-success">Species</h5>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th style="width:70%;">Species Name</th>
                <th style="width:30%;">No. of Plants</th>
              </tr>
            </thead>
            <tbody>
              @forelse($agro_forest->species as $sp)
                <tr>
                  <td>{{ $sp->species_name ?? '-' }}</td>
                  <td>{{ $sp->no_of_plants !== null ? number_format($sp->no_of_plants) : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center text-muted">No species recorded.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Nurseries -->
        <hr>
        <h5 class="text-success">Nursery Locations</h5>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-light"><tr><th>Location</th></tr></thead>
            <tbody>
              @forelse($agro_forest->nurseries as $n)
                <tr><td>{{ $n->location ?? '-' }}</td></tr>
              @empty
                <tr><td class="text-center text-muted">No nursery locations recorded.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div><!-- /card -->
    </div><!-- /container-fluid -->
  </div><!-- /right-column -->
</div><!-- /frame -->

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Sidebar toggle (same logic as EOI) -->
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

    // delete confirm
    document.getElementById('deleteForm')?.addEventListener('submit', function (e) {
      if (!confirm('Are you sure you want to delete this record?')) e.preventDefault();
    });
  });
</script>
</body>
</html>
