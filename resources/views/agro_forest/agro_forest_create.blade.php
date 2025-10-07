<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Forest Create</title>

    <!-- Bootstrap 5 + FontAwesome (keep a single Bootstrap version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery + Bootstrap bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .custom-border { border: 2px solid green; box-shadow: 0 4px 12px rgba(0,0,0,0.3); border-color: darkgreen !important; }
        .dropdown-label, .bold-label { font-weight: bold; }
        .submitbtton { color:#fff; background-color:#198754; border-color:#198754; }
        .submitbtton:hover { background-color:#145c32; border-color:#145c32; }
        .remove-btn { cursor: pointer; color: red; font-weight: bold; }

        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-color: darkgreen !important;
        }
        /* .dropdown-label, .bold-label { font-weight: bold; } */
        .dropdown-label{
        display:block;
        text-align:center;
        font-weight:600;
        color:#145c32;
        margin-bottom:6px;
        }

        .row > .col .dropdown{
  display:flex;
  flex-direction:column;
  align-items:center;
}
.custom-border .dropdown .form-control,
#river_basin, /* keep river basin consistent */
#tankDropdown{
  width: 260px;                 /* tweak as you like (250–300px) */
  max-width: 100%;
}

/* green button look for ALL selects in this section */
.custom-border .dropdown .form-control,
#river_basin,
#tankDropdown {
  background-color:#198754;
  color:#fff;
  border: none;
  border-radius:6px;
  padding:.55rem 2.25rem .55rem .9rem;
  line-height:1.25;
  box-shadow:none;
  appearance:none;              /* hide native arrow */
  background-image:
    url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'><path fill='white' d='M10.59.59 6 5.17 1.41.59 0 2l6 6 6-6z'/></svg>");
  background-repeat:no-repeat;
  background-position:right .7rem center;
  background-size:12px 8px;
}

/* hover / focus states to match theme */
.custom-border .dropdown .form-control:hover,
#river_basin:hover,
#tankDropdown:hover{
  background-color:#17784b;
}

.custom-border .dropdown .form-control:focus,
#river_basin:focus,
#tankDropdown:focus{
  outline:0;
  background-color:#145c32;
  box-shadow:0 0 0 .15rem rgba(25,135,84,.25);
}

                .color-label { color: green; }

        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .left-column  { flex: 0 0 20%; border-right: 1px solid #dee2e6; }

        .datepicker-container { position: relative; display: inline-block; }
        .bg-green { background-color: green; }

        .submitbtton { color: #fff; background-color: #198754; border-color: #198754; }
        .submitbtton:active, .submitbtton:hover { background-color: #145c32; border-color: #145c32; color: #fff; }

        .dropdown { margin-bottom: 20px; display: flex; flex-direction: column; align-items: center; }
        .dropdown-menu { min-width: auto; }
        .dropdown-item { padding: 10px; font-size: 16px; }
        .dropdown-toggle { min-width: 250px; }

        .form-control { width: 550px; } /* keep your consistent width */

        .greenbackground { background-color: #198754; color: #fff; border: 1px solid #198754; }
        .greenbackground option { background-color: #198754; color: #fff; }
        .greenbackground option:checked { background-color: #145c32; color: #fff; }
        .greenbackground:focus { border-color: #145c32; box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.25); }

        .dropdown-label { text-align: left; font-size: 16px; }

        .form-row { display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 20px; }
        .form-group { flex: 1; margin-right: 15px; }
        .form-group:last-child { margin-right: 0; }

        .form-label { display: block; margin-bottom: 5px; }

        .three-dropdown-row { display: flex; justify-content: space-between; gap: 15px; margin-bottom: 20px; }
        .three-dropdown-row .dropdown { flex: 1; }
        .three-dropdown-row .form-control, .three-dropdown-row .dropdown-toggle { width: 100%; }

        /* Back button (as in your layout) */
        .btn-back { display: inline-flex; align-items: center; gap: 8px; text-decoration: none; }
        .btn-back img { width: 24px; height: 24px; }
        .btn-text { font-weight: 600; }


        /* Make controls fill their grid column */
.custom-border .dropdown .form-control,
#river_basin, #provinceDropdown, #districtDropdown,
#gndDropdown1, #gndDropdown2, #gndDropdown3, #tankDropdown {
  width: 100%;
}

/* Optional: keep your green button styling */
.custom-border .dropdown .form-control,
#river_basin, #tankDropdown,
#provinceDropdown, #districtDropdown,
#gndDropdown1, #gndDropdown2, #gndDropdown3 {
  background-color:#198754; color:#fff; border:none; border-radius:6px;
  padding:.55rem 2rem .55rem .9rem; line-height:1.25; appearance:none;
  background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'><path fill='white' d='M10.59.59 6 5.17 1.41.59 0 2l6 6 6-6z'/></svg>");
  background-repeat:no-repeat; background-position:right .7rem center; background-size:12px 8px;
}
.custom-border .dropdown .form-control:hover,
#river_basin:hover, #provinceDropdown:hover, #districtDropdown:hover,
#gndDropdown1:hover, #gndDropdown2:hover, #gndDropdown3:hover, #tankDropdown:hover {
  background-color:#17784b;
}
.custom-border .dropdown .form-control:focus,
#river_basin:focus, #provinceDropdown:focus, #districtDropdown:focus,
#gndDropdown1:focus, #gndDropdown2:focus, #gndDropdown3:focus, #tankDropdown:focus {
  outline:0; background-color:#145c32; box-shadow:0 0 0 .15rem rgba(25,135,84,.25);
}

/* Center labels above selects */
.dropdown-label { display:block; text-align:center; font-weight:600; color:#145c32; margin-bottom:6px; }

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

            <h2 class="text-center" style="color: green;">Agro Forest Registration</h2>

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

            <div class="container mt-4 border rounded p-4 custom-border">
                <form action="{{ route('agro-forest.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <!-- Row 1: River Basin + Province + District -->
<div class="row g-3">
  <div class="col-12 col-md-4">
    <label for="river_basin" class="form-label dropdown-label">River Basin</label>
    <select class="form-control" name="river_basin" id="river_basin">
      <option value="">Select River Basin</option>
      <option value="Mee Oya">Mee Oya</option>
      <option value="Daduru Oya">Daduru Oya</option>
      <option value="Malwathu Oya">Malwathu Oya</option>
    </select>
  </div>

  <div class="col-12 col-md-4">
    <label for="provinceDropdown" class="form-label dropdown-label">Province</label>
    <select id="provinceDropdown" name="province_name" class="form-control">
      <option value="">Select Province</option>
    </select>
    <input type="hidden" id="provinceName" name="province_name">
  </div>


 <div class="col">
            <div class="dropdown">
                <label for="district" class="form-label dropdown-label">District</label>
                <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" >
                    <option value="">Select District</option>
                </select>
                <input type="hidden" id="districtName" name="district">
            </div>
        </div>



         <div class="col">
            <div class="dropdown">
                <label for="dsDivisionDropdown" class="form-label dropdown-label">DS Division</label>
                <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" >
                    <option value="">Select DS Division</option>
                </select>
                <input type="hidden" id="dsDivisionName" name="ds_division_name">
            </div>
        </div>

<!-- Row 2: GN 1 + GN 2 + GN 3 -->
<div class="row g-3 mt-2">
 
    <div class="col">
            <div class="dropdown">
                <label for="gndDropdown" class="form-label dropdown-label">GN Division</label>
                <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" >
                    <option value="">Select GN Division 1</option>
                </select>
               <input type="hidden" id="gndName" name="gn_division_name">
            </div>
            </div>

              <div class="col">
            <div class="dropdown">
                <label for="gndDropdown2" class="form-label dropdown-label">GN Division</label>
                <select id="gndDropdown2" name="gn_division_name_2" class="btn btn-success dropdown-toggle" >
                    <option value="">Select GN Division 2</option>
                </select>
               <input type="hidden" id="gndName2" name="gn_division_name_2">
            </div>
        </div>
           <div class="col">
            <div class="dropdown">
                <label for="gndDropdown3" class="form-label dropdown-label">GN Division</label>
                <select id="gndDropdown3" name="gn_division_name_3" class="btn btn-success dropdown-toggle" >
                    <option value="">Select GN Division 3</option>
                </select>
                <input type="hidden" id="gndName3" name="gn_division_name_3">
            </div>
        </div>

    
    </div>
    
    </div>
 
<!-- 
<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label for="tankDropdown" class="form-label dropdown-label">Select Tank Name</label>
    <select name="tank_name" class="form-control tankDropdown">
      <option value="">Select Tank</option>
     
    </select>
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label class="form-label dropdown-label">Select Tank Name</label>
    <select name="tank_name_2" class="form-control tankDropdown">
      <option value="">Select Tank 2</option>
    </select>
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-12 col-md-4 offset-md-4">
    <label class="form-label dropdown-label">Select Tank Name</label>
    <select name="tank_name_3" class="form-control tankDropdown">
      <option value="">Select Tank 3</option>
    </select>
  </div>
</div> -->
{{-- Dynamic Tanks --}}
@php
    // Seed initial rows from old() or existing 3 fields
    $initialTanks = old('tank_names', array_values(array_filter([
        $agro_forest->tank_name ?? null,
        $agro_forest->tank_name_2 ?? null,
        $agro_forest->tank_name_3 ?? null,
    ])));
    if (empty($initialTanks)) { $initialTanks = ['']; }
@endphp

<div class="row g-3 mt-2">
  <div class="col-12 col-md-6 offset-md-3">
    <label class="form-label dropdown-label">Select Tank Name(s)</label>

    <div id="tankRows" class="d-flex flex-column gap-2">
      @foreach($initialTanks as $i => $tVal)
        <div class="input-group tank-row">
          <select name="tank_names[]" class="form-control tankDropdown" data-selected="{{ $tVal }}">
            <option value="">Select Tank</option>
            {{-- options inserted by JS --}}
          </select>
          <button type="button"
                  class="btn btn-outline-success addTankRow {{ $loop->last ? '' : 'd-none' }}">
            <i class="fa fa-plus"></i>
          </button>
          <button type="button"
                  class="btn btn-outline-danger removeTankRow {{ $loop->first && $loop->last ? 'd-none' : '' }}">
            <i class="fa fa-trash"></i>
          </button>
        </div>
      @endforeach
    </div>

    {{-- Template (cloned by JS) --}}
    <template id="tankRowTemplate">
      <div class="input-group tank-row">
        <select name="tank_names[]" class="form-control tankDropdown">
          <option value="">Select Tank</option>
        </select>
        <button type="button" class="btn btn-outline-success addTankRow">
          <i class="fa fa-plus"></i>
        </button>
        <button type="button" class="btn btn-outline-danger removeTankRow">
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </template>

    <small class="text-muted d-block mt-2">Use + to add more tanks and the bin to remove a row.</small>
  </div>
</div>


                    <!-- Core Text/Number fields -->
                    <div class="form-group mb-3">
                        <label class="bold-label">Replanting Forest Beat Name</label>
                        <input type="text" class="form-control" name="replanting_forest_beat_name" value="{{ old('replanting_forest_beat_name') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="bold-label">Number of Hectares (Ha)</label>
                        <input type="number" step="0.01" class="form-control" name="number_of_hectares" value="{{ old('number_of_hectares') }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label class="bold-label">GPS Longitude</label>
                            <input type="text" class="form-control" name="gps_longitude" value="{{ old('gps_longitude') }}">
                        </div>
                        <div class="form-group col">
                            <label class="bold-label">GPS Latitude</label>
                            <input type="text" class="form-control" name="gps_latitude" value="{{ old('gps_latitude') }}">
                        </div>
                    </div>

                    <!-- Species (dynamic) -->
<h5 class="mt-3">Species Details</h5>
<table class="table table-bordered" id="speciesTable">
    <thead class="table-success">
        <tr>
            <th>Species Name</th>
            <th>No. of Plants</th>
            <th style="width: 120px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            // If validation failed → old() values
            $oldNames  = old('species_names_arr');
            $oldCounts = old('species_counts_arr');

            if ($oldNames !== null && $oldCounts !== null) {
                $speciesData = collect($oldNames)->map(function($name, $i) use ($oldCounts) {
                    return ['name' => $name, 'count' => $oldCounts[$i] ?? ''];
                });
            } else {
                // Otherwise → previously stored values from DB
                $speciesData = $replanting->species ?? collect([['name' => '', 'count' => '']]);
            }
        @endphp

        @foreach($speciesData as $i => $species)
            <tr>
                <td>
                    <input type="text" name="species_names_arr[]" class="form-control"
                           value="{{ is_array($species) ? $species['name'] : $species->species_name }}">
                </td>
                <td>
                    <input type="number" name="species_counts_arr[]" class="form-control"
                           value="{{ is_array($species) ? $species['count'] : $species->no_of_plants }}">
                </td>
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
      $oldNurseryLoc = old('nursery_locations_extra', ['']);
      $oldNurseryPlants = old('nursery_plants_extra', ['']);
    @endphp
    @foreach($oldNurseryLoc as $i => $loc)
      <tr>
        <td><input type="text" name="nursery_locations_extra[]" class="form-control" value="{{ $loc }}"></td>
        <td><input type="number" name="nursery_plants_extra[]" class="form-control" value="{{ $oldNurseryPlants[$i] ?? '' }}"></td>
        <td>
          @if($i === array_key_first($oldNurseryLoc))
            <button type="button" class="btn btn-sm btn-success addNursery">Add</button>
          @else
            <button type="button" class="btn btn-sm btn-danger removeRow">Remove</button>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

                    <!-- Costs + File -->
                    <div class="form-group mb-3">
                        <label class="bold-label">Estimated Cost for Reforestration (Rs.Mn)</label>
                        <input type="number" step="0.01" class="form-control" name="establish_cost" value="{{ old('establish_cost') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="bold-label">Reforest Project Proposal (PDF)</label>
                        <input type="file" class="form-control" name="project_proposal" accept="application/pdf">
                    </div>

                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn submitbtton mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div> <!-- /right-column -->
    </div> <!-- /frame -->

    <script>
        $(function () {
            // Sidebar toggle (if your layout uses it)
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
        });

           // Nursery add/remove (with plants)
$('#nurseryTable').on('click', '.addNursery', function () {
  const row = `
    <tr>
      <td><input type="text" name="nursery_locations_extra[]" class="form-control"></td>
      <td><input type="number" name="nursery_plants_extra[]" class="form-control"></td>
      <td><button type="button" class="btn btn-sm btn-danger removeRow">Remove</button></td>
    </tr>`;
  $('#nurseryTable tbody').append(row);
});

            // Remove row (works for both species & nursery)
            $(document).on('click', '.removeRow', function () {
                $(this).closest('tr').remove();
            });

            // Tanks
            // $.get('/tanks', function (data) {
            //     $('#tankDropdown').empty().append('<option value="">Select Tank</option>');
            //     $.each(data, function (index, tank) {
            //         $('#tankDropdown').append(
            //             $('<option>', { value: tank.tank_name, text: tank.tank_name })
            //         );
            //     });
            // });
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

</script>
<script>
(function () {
  let tankList = []; // will hold [{tank_name: "..."}] or strings
  // Load tanks once
  $.get('/tanks', function (data) {
    // Normalize to array of strings: tank_name
    tankList = (data || []).map(function (t) {
      return (typeof t === 'string') ? t : (t.tank_name || '');
    }).filter(Boolean);

    // Populate existing rows
    $('#tankRows .tankDropdown').each(function () {
      const selected = $(this).data('selected') || '';
      populateTankSelect(this, selected);
    });
  });

  function populateTankSelect(selectEl, selectedVal) {
    const $sel = $(selectEl);
    $sel.find('option:not(:first)').remove();
    tankList.forEach(function (name) {
      const $opt = $('<option>', { value: name, text: name });
      if (selectedVal && selectedVal === name) $opt.prop('selected', true);
      $sel.append($opt);
    });
  }

  // Add new row
  $(document).on('click', '.addTankRow', function () {
    const $template = $($('#tankRowTemplate').html());
    // Populate options
    populateTankSelect($template.find('.tankDropdown')[0], '');
    // Append row
    $('#tankRows').append($template);

    // Update buttons: only last row shows the + button
    refreshTankRowButtons();
  });

  // Remove row (keep at least 1)
  $(document).on('click', '.removeTankRow', function () {
    const $rows = $('#tankRows .tank-row');
    if ($rows.length <= 1) return; // don't remove the last one
    $(this).closest('.tank-row').remove();
    refreshTankRowButtons();
  });

  // Ensure only the last row shows the add button; show remove on all if >1
  function refreshTankRowButtons() {
    const $rows = $('#tankRows .tank-row');
    $rows.find('.addTankRow').addClass('d-none');
    $rows.last().find('.addTankRow').removeClass('d-none');

    if ($rows.length === 1) {
      $rows.find('.removeTankRow').addClass('d-none');
    } else {
      $rows.find('.removeTankRow').removeClass('d-none');
    }
  }
})();
</script>


</body>
</html>
