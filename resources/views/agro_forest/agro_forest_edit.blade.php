<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Forest — Edit</title>

    <!-- Bootstrap 5 + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery + Bootstrap bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .custom-border { border: 2px solid green; box-shadow: 0 4px 12px rgba(0,0,0,0.3); border-color: darkgreen !important; }
        .dropdown-label, .bold-label { font-weight: bold; }
        .submitbtton { color:#fff; background-color:#198754; border-color:#198754; }
        .submitbtton:hover, .submitbtton:active { background-color:#145c32; border-color:#145c32; }
        .frame { display:flex; flex-direction:row; justify-content:space-between; width:100%; }
        .right-column { flex:0 0 80%; padding:20px; }
        .left-column  { flex:0 0 20%; border-right:1px solid #dee2e6; }
        .dropdown { margin-bottom: 20px; display:flex; flex-direction:column; align-items:center; }
        .form-control { width: 550px; }
        .three-dropdown-row { display:flex; justify-content:space-between; gap:15px; margin-bottom:20px; }
        .three-dropdown-row .dropdown { flex:1; }
        .btn-back { display:inline-flex; align-items:center; gap:8px; text-decoration:none; }
        .btn-back img { width:24px; height:24px; }
        .btn-text { font-weight:600; }
        .greenbackground { background-color:#198754; color:#fff; border:1px solid #198754; }
        .greenbackground option { background:#198754; color:#fff; }
        .greenbackground option:checked { background:#145c32; color:#fff; }
        .greenbackground:focus { border-color:#145c32; box-shadow:0 0 0 .2rem rgba(0,255,0,.25); }
        .form-row { display:flex; justify-content:space-between; flex-wrap:wrap; margin-bottom:20px; }
        .form-group { flex:1; margin-right:15px; }
        .form-group:last-child { margin-right:0; }
        th[style*="width"] { width:auto !important; }
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
            <button id="sidebarToggle" class="btn btn-secondary me-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('agro-forest.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <h2 class="text-center" style="color: green;">Agro Forest Edit</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <div class="container mt-4 border rounded p-4 custom-border">
            <form action="{{ route('agro-forest.update', $agro_forest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Province / District / GN (optional) --}}
               <div class="row g-3">
  <div class="col-12 col-md-3">
    <label for="river_basin" class="form-label">River Basin</label>
    <select class="form-select" name="river_basin" id="river_basin" required>
      <option value="">Select River Basin</option>
      <option value="Mee Oya">Mee Oya</option>
      <option value="Daduru Oya">Daduru Oya</option>
      <option value="Malwathu Oya">Malwathu Oya</option>
      <option selected>{{ $agro_forest->river_basin ?? 'N/A' }}</option>
    </select>
  </div>

  <div class="col-12 col-md-3">
    <label for="provinceDropdown" class="form-label">Province</label>
    <select id="provinceDropdown" name="province_id" class="form-select">
      <option value="">Select Province</option>
      <option selected>{{ $agro_forest->province_name ?? 'N/A' }}</option>
    </select>
    <input type="hidden" id="provinceName" name="province_name">
  </div>

  <div class="col-12 col-md-3">
    <label for="districtDropdown" class="form-label">District</label>
    <select id="districtDropdown" name="district_id" class="form-select">
        <option selected>{{ $agro_forest->district?? 'N/A' }}</option>
      <option value="">Select District</option>
    </select>
    <input type="hidden" id="districtName" name="district">
  </div>

  <div class="col-12 col-md-3">
    <label for="dsDivisionDropdown" class="form-label">DS Division</label>
    <select id="dsDivisionDropdown" name="ds_division_id" class="form-select">
      <option value="">Select DS Division</option>
       <option selected>{{ $agro_forest->ds_division_name ?? 'N/A' }}</option>
    </select>
    <input type="hidden" id="dsDivisionName" name="ds_division_name">
  </div>
</div>

<!-- Row 2: GN Divisions -->
<div class="row g-3 mt-2">
  <div class="col-12 col-md-4">
    <label for="gndDropdown" class="form-label">GN Division</label>
    <select id="gndDropdown" name="gn_division_name" class="form-select">
      <option value="">Select GN Division</option>
       <option selected>{{ $agro_forest->gn_division_name ?? 'N/A' }}</option>
    </select>
    <input type="hidden" id="gndName" name="gn_division_name">
  </div>

  <div class="col-12 col-md-4">
    <label for="gndDropdown2" class="form-label">GN Division 2</label>
    <select id="gndDropdown2" name="gn_division_name_2" class="form-select">
      <option value="">Select GN Division 2</option>
      <option selected>{{ $agro_forest->gn_division_name_2 ?? 'N/A' }}</option>
    </select>
    <input type="hidden" id="gndName2" name="gn_division_name_2">
  </div>

  <div class="col-12 col-md-4">
    <label for="gndDropdown3" class="form-label">GN Division 3</label>
    <select id="gndDropdown3" name="gn_division_name_3" class="form-select">
      <option value="">Select GN Division 3</option>
      <option selected>{{ $agro_forest->gn_division_name_2 ?? 'N/A' }}</option>
    </select>
    <input type="hidden" id="gndName3" name="gn_division_name_3">
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label for="tankDropdown" class="form-label dropdown-label">Select Tank Name</label>
    <select name="tank_name" class="form-control tankDropdown">
      <option value="">Select Tank</option>
      <option selected>{{ $agro_forest->tank_name ?? 'N/A' }}</option>
    </select>
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label class="form-label dropdown-label">Select Tank Name 2</label>
    <select name="tank_name_2" class="form-control tankDropdown">
      <option value="">Select Tank 2</option>
        <option selected>{{ $agro_forest->tank_name_2 ?? 'N/A' }}</option>
    </select>
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label class="form-label dropdown-label">Select Tank Name 3</label>
    <select name="tank_name_3" class="form-control tankDropdown">
      <option value="">Select Tank 3</option>
        <option selected>{{ $agro_forest->tank_name_3 ?? 'N/A' }}</option>
    </select>
  </div>
</div>
                 <div class="form-group mb-3">
    <label class="bold-label">Replanting Forest Beat Name</label>
    <input 
        type="text" 
        class="form-control" 
        name="replanting_forest_beat_name" 
        value="{{ old('replanting_forest_beat_name', $agro_forest->replanting_forest_beat_name ?? '') }}">
</div>

<div class="form-group mb-3">
    <label class="bold-label">Number of Hectares (Ha)</label>
    <input 
        type="number" 
        step="0.01" 
        class="form-control" 
        name="number_of_hectares" 
        value="{{ old('number_of_hectares', $agro_forest->number_of_hectares ?? '') }}">
</div>

<div class="form-row">
    <div class="form-group col">
        <label class="bold-label">GPS Longitude</label>
        <input 
            type="text" 
            class="form-control" 
            name="gps_longitude" 
            value="{{ old('gps_longitude', $agro_forest->gps_longitude ?? '') }}">
    </div>
    <div class="form-group col">
        <label class="bold-label">GPS Latitude</label>
        <input 
            type="text" 
            class="form-control" 
            name="gps_latitude" 
            value="{{ old('gps_latitude', $agro_forest->gps_latitude ?? '') }}">
    </div>
</div>

                    
                {{-- Species --}}
                <h5 class="mt-3">Species Details</h5>
                <table class="table table-bordered" id="speciesTable">
                    <thead class="table-success">
                        <tr>
                            <th>Species Name</th>
                            <th>No. of Plants</th>
                            <th style="width:120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $spNames  = old('species_names_arr') ?? $agro_forest->species->pluck('species_name')->toArray();
                            $spCounts = old('species_counts_arr') ?? $agro_forest->species->pluck('no_of_plants')->toArray();
                            if (empty($spNames)) { $spNames = ['']; $spCounts = ['']; }
                        @endphp
                        @foreach($spNames as $i => $n)
                            <tr>
                                <td><input type="text" name="species_names_arr[]" class="form-control" value="{{ $n }}"></td>
                                <td><input type="number" name="species_counts_arr[]" class="form-control" value="{{ $spCounts[$i] ?? '' }}"></td>
                                <td>
                                    @if($loop->first)
                                        <button type="button" class="btn btn-sm btn-success addSpecies">Add</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-danger removeRow">Remove</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

           <!-- Nursery Locations (dynamic) -->
<h5 class="mt-3">Plant Nursery Location</h5>
<table class="table table-bordered" id="nurseryTable">
    <thead class="table-success">
        <tr>
            <th>Location</th>
            <th>No. of Plants</th>
            <th style="width: 120px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            // Case 1: After validation failure → show old inputs
            $oldLocs   = old('nursery_locations_extra');
            $oldPlants = old('nursery_plants_extra');

            if ($oldLocs !== null && $oldPlants !== null) {
                $nurseryData = collect($oldLocs)->map(function($loc, $i) use ($oldPlants) {
                    return ['location' => $loc, 'plants' => $oldPlants[$i] ?? ''];
                });
            } else {
                // Case 2: Edit mode → show saved DB values
                // Assuming $agro_forest->nurseries is a collection/array of models
                $nurseryData = $agro_forest->nurseries && $agro_forest->nurseries->count() > 0
                    ? $agro_forest->nurseries
                    : collect([['location' => '', 'plants' => '']]); // Case 3: default empty row
            }
        @endphp

        @foreach($nurseryData as $i => $nursery)
            <tr>
                <td>
                    <input type="text" name="nursery_locations_extra[]" class="form-control"
                           value="{{ is_array($nursery) ? $nursery['location'] : $nursery->location }}">
                </td>
                <td>
                    <input type="number" name="nursery_plants_extra[]" class="form-control"
                           value="{{ is_array($nursery) ? $nursery['plants'] : $nursery->no_of_plants }}">
                </td>
                <td>
                    @if($loop->first)
                        <button type="button" class="btn btn-sm btn-success addNursery">Add</button>
                    @else
                        <button type="button" class="btn btn-sm btn-danger removeRow">Remove</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            {{-- Cost + Proposal --}}
<div class="form-group mb-3">
    <label class="bold-label">Establish Cost</label>
    <input 
        type="number" 
        step="0.01" 
        class="form-control" 
        name="establish_cost" 
        value="{{ old('establish_cost', $agro_forest->establish_cost ?? '') }}">
</div>


               <div class="form-group mb-3">
    <label class="bold-label d-block">Project Proposal (PDF)</label>
    @php
        $proposalUrl = $agro_forest->project_proposal_path 
            ? asset('storage/' . $agro_forest->project_proposal_path) 
            : null;
    @endphp

    {{-- If file exists, show actions --}}
    @if($proposalUrl)
        <div class="mb-2 d-flex flex-wrap gap-2">
            <a href="{{ $proposalUrl }}" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-file-pdf me-1"></i> View Current
            </a>
            <a href="{{ $proposalUrl }}" download class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-download me-1"></i> Download
            </a>
        </div>
        <small class="text-muted d-block mb-2">
            Upload a new file to replace the current one (optional).
        </small>
    @else
        <small class="text-muted d-block mb-2">
            No proposal uploaded yet. You can upload one below.
        </small>
    @endif

    {{-- Upload new / replacement --}}
    <input 
        type="file" 
        class="form-control" 
        name="project_proposal" 
        accept="application/pdf">
</div>

                   <div class="form-group mb-3">
                        <label class="bold-label">Paid Amount</label>
                        <input type="text" class="form-control" name="paid_amount" value="{{ old('paid_amount') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="bold-label">Number of trees</label>
                        <input type="number" step="0.01" class="form-control" name="no_of_trees_plans" value="{{ old('nno_of_trees_plans') }}">
                    </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn submitbtton mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(function () {
    // Sidebar toggle
    $('#sidebarToggle').on('click', function () {
        $('.left-column').toggleClass('d-none');
    });

    // Species add/remove
    $('#speciesTable').on('click', '.addSpecies', function () {
        const row = `
            <tr>
                <td><input type="text" name="species_names_arr[]" class="form-control"></td>
                <td><input type="number" name="species_counts_arr[]" class="form-control"></td>
                <td><button type="button" class="btn btn-sm btn-danger removeRow">Remove</button></td>
            </tr>`;
        $('#speciesTable tbody').append(row);
    });

    // Nursery add/remove
    $('#nurseryTable').on('click', '.addNursery', function () {
        const row = `
            <tr>
                <td><input type="text" name="nursery_locations_extra[]" class="form-control"></td>
                <td><button type="button" class="btn btn-sm btn-danger removeRow">Remove</button></td>
            </tr>`;
        $('#nurseryTable tbody').append(row);
    });

    // Remove any dynamic row
    $(document).on('click', '.removeRow', function () {
        $(this).closest('tr').remove();
    });

   
});
</script>

    <script>
    
    $(document).ready(function () {

    // Load Provinces
    $.ajax({
        url: '/provinces',
        type: 'GET',
        success: function (data) {
            $('#provinceDropdown').append('<option value="">Select Province</option>');
            $.each(data, function (index, province) {
                $('#provinceDropdown').append($('<option>', {
                    value: province.id,
                    text: province.name
                }));
            });
        }
    });

    // On Province Change
    $('#provinceDropdown').change(function () {
        var selectedName = $(this).find('option:selected').text();
        $('#provinceName').val(selectedName); // Store name

        var provinceId = $(this).val();
        resetDropdown('#districtDropdown', 'Select District');
        resetDropdown('#dsDivisionDropdown', 'Select DS Division');
        resetGNDs();

        if (provinceId !== '') {
            $.ajax({
                url: '/provinces/' + provinceId + '/districts',
                type: 'GET',
                success: function (data) {
                    $.each(data, function (index, district) {
                        $('#districtDropdown').append($('<option>', {
                            value: district.id,
                            text: district.district
                        }));
                    });
                }
            });
        }
    });

    // On District Change
    $('#districtDropdown').change(function () {
        var selectedName = $(this).find('option:selected').text();
        $('#districtName').val(selectedName); // Store name

        var districtId = $(this).val();
        resetDropdown('#dsDivisionDropdown', 'Select DS Division');
        resetGNDs();

        if (districtId !== '') {
            $.ajax({
                url: '/districts/' + districtId + '/ds-divisions',
                type: 'GET',
                success: function (data) {
                    $.each(data, function (index, dsDivision) {
                        $('#dsDivisionDropdown').append($('<option>', {
                            value: dsDivision.id,
                            text: dsDivision.division
                        }));
                    });
                }
            });
        }
    });

    // On DS Division Change
    $('#dsDivisionDropdown').change(function () {
        var selectedName = $(this).find('option:selected').text();
        $('#dsDivisionName').val(selectedName); // Store name

        var dsDivisionId = $(this).val();
        resetGNDs();

        if (dsDivisionId !== '') {
            $.ajax({
                url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                type: 'GET',
                success: function (data) {
                    $.each(data, function (index, gnd) {
                        ['#gndDropdown', '#gndDropdown2', '#gndDropdown3'].forEach(function (dropdownId) {
                            $(dropdownId).append($('<option>', {
                                value: gnd.id,
                                text: gnd.gn_division_name
                            }));
                        });
                    });
                }
            });
        }
    });

    // On GN Division selections: store names
    $('#gndDropdown').change(function () {
        var name = $(this).find('option:selected').text();
        $('#gndName').val(name);
    });

    $('#gndDropdown2').change(function () {
        var name = $(this).find('option:selected').text();
        $('#gndName2').val(name);
    });

    $('#gndDropdown3').change(function () {
        var name = $(this).find('option:selected').text();
        $('#gndName3').val(name);
    });

    // Helpers
    function resetDropdown(selector, placeholder) {
        $(selector).empty().append('<option value="">' + placeholder + '</option>');
    }

    function resetGNDs() {
        ['#gndDropdown', '#gndDropdown2', '#gndDropdown3'].forEach(function (id) {
            resetDropdown(id, 'Select GN Division');
        });

        // Also clear the hidden inputs
        $('#gndName, #gndName2, #gndName3').val('');
    }

});
$.get('/tanks', function (data) {
    // Loop through each dropdown
    $('.tankDropdown').each(function () {
        const dropdown = $(this);
        dropdown.empty().append('<option value="">Select Tank</option>');
        $.each(data, function (index, tank) {
            dropdown.append(
                $('<option>', { value: tank.tank_name, text: tank.tank_name })
            );
        });
    });
});
</script>
</body>
</html>
