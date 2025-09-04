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
        .dropdown-label, .bold-label { font-weight: bold; }
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

            <h2 class="text-center" style="color: green;">Agro Forest — Create</h2>

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
                     <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="river_basin" class="form-label dropdown-label">River Basin</label>
                            <select class="form-control btn btn-success" name="river_basin" id="river_basin" required>
                                <option value="">Select River Basin</option>
                                <option value="Mee Oya">Mee Oya</option>
                                <option value="Daduru Oya">Daduru Oya</option>
                                <option value="Malwathu Oya">Malwathu Oya</option>
                            </select>
                        </div>
                    </div>
                    <!-- Province / District / GN Division -->
                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                                <label for="provinceDropdown" class="form-label dropdown-label">Province</label>
                                <!-- name MUST be province_name (controller expects string) -->
                                <select id="provinceDropdown" name="province_name" class="form-control">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="dropdown">
                                <label for="districtDropdown" class="form-label dropdown-label">District</label>
                                <!-- name MUST be district (controller expects string) -->
                                <select id="districtDropdown" name="district" class="form-control">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>
                       <div class="col">
  <div class="dropdown">
    <label for="gndDropdown1" class="form-label dropdown-label">GN Division</label>
    <select id="gndDropdown1" name="gn_division_name" class="form-control">
      <option value="">Select GN Division</option>
    </select>
    <br>

    <label for="gndDropdown2" class="form-label dropdown-label">GN Division 2</label>
    <select id="gndDropdown2" name="gn_division_name_2" class="form-control">
      <option value="">Select GN Division 2</option>
    </select>
    <br>

    <label for="gndDropdown3" class="form-label dropdown-label">GN Division 3</label>
    <select id="gndDropdown3" name="gn_division_name_3" class="form-control">
      <option value="">Select GN Division 3</option>
    </select>
  </div>
</div>

                       
                        </div>
                    </div>

                    <br>

                    <div class="three-dropdown-row">
                        <div class="col">
                            <div class="dropdown">
                                <label for="tankDropdown" class="form-label dropdown-label">Select Tank Name</label>
                                <!-- name MUST be tank_name (controller expects string) -->
                                <select id="tankDropdown" class="btn btn-success dropdown-toggle greenbackground" name="tank_name">
                                    <option value="">Select Tank</option>
                                </select>
                            </div>
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
                                $oldNames  = old('species_names_arr', ['']);
                                $oldCounts = old('species_counts_arr', ['']);
                            @endphp
                            @foreach($oldNames as $i => $n)
                                <tr>
                                    <td><input type="text" name="species_names_arr[]" class="form-control" value="{{ $n }}"></td>
                                    <td><input type="number" name="species_counts_arr[]" class="form-control" value="{{ $oldCounts[$i] ?? '' }}"></td>
                                    <td>
                                        @if($i === array_key_first($oldNames))
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
                    <h5 class="mt-3">Nursery Locations</h5>
                    <table class="table table-bordered" id="nurseryTable">
                        <thead class="table-success">
                            <tr>
                                <th>Location</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $oldNursery = old('nursery_locations_extra', ['']);
                            @endphp
                            @foreach($oldNursery as $i => $loc)
                                <tr>
                                    <td><input type="text" name="nursery_locations_extra[]" class="form-control" value="{{ $loc }}"></td>
                                    <td>
                                        @if($i === array_key_first($oldNursery))
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
                        <label class="bold-label">Establish Cost</label>
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

            // Nursery add/remove
            $('#nurseryTable').on('click', '.addNursery', function () {
                const row = `
                    <tr>
                        <td><input type="text" name="nursery_locations_extra[]" class="form-control"></td>
                        <td><button type="button" class="btn btn-sm btn-danger removeRow">Remove</button></td>
                    </tr>`;
                $('#nurseryTable tbody').append(row);
            });

            // Remove row (works for both species & nursery)
            $(document).on('click', '.removeRow', function () {
                $(this).closest('tr').remove();
            });

            // Tanks
            $.get('/tanks', function (data) {
                $('#tankDropdown').empty().append('<option value="">Select Tank</option>');
                $.each(data, function (index, tank) {
                    $('#tankDropdown').append(
                        $('<option>', { value: tank.tank_name, text: tank.tank_name })
                    );
                });
            });

            // Provinces (value should be province NAME to match controller)
            $.ajax({
                url: '/provinces',
                type: 'GET',
                success: function (data) {
                    $('#provinceDropdown').empty().append('<option value="">Select Province</option>');
                    $.each(data, function (i, province) {
                        // expecting { id, name }
                        $('#provinceDropdown').append(
                            $('<option>', { value: province.name, text: province.name, 'data-id': province.id })
                        );
                    });
                }
            });

            // Districts: fetch by province id, submit district NAME as value
            $('#provinceDropdown').on('change', function () {
                const provId = $(this).find(':selected').data('id') || '';
                $('#districtDropdown').empty().append('<option value="">Select District</option>');

                if (provId) {
                    $.ajax({
                        url: '/provinces/' + encodeURIComponent(provId) + '/districts',
                        type: 'GET',
                        success: function (data) {
                            $.each(data, function (i, district) {
                                // expecting { id, district }
                                $('#districtDropdown').append(
                                    $('<option>', { value: district.district, text: district.district })
                                );
                            });
                        },
                        error: function (xhr) { console.error(xhr.responseText); }
                    });
                }
            });

//             // GN Divisions (value is the name)
//             // GN Divisions (all)
// $.get("{{ url('/gn-divisions') }}", function (data) {
//     $('#gndDropdown').empty().append('<option value="">Select GN Division</option>');
//     $.each(data, function (i, gnd) {
//         $('#gndDropdown').append(
//             $('<option>', { value: gnd.gn_division_name, text: gnd.gn_division_name })
//         );
//     });
// });

$.get("{{ url('/gn-divisions') }}", function(data) {
    // Build option HTML once
    let options = '<option value="">Select GN Division</option>';
    $.each(data, function(i, gnd) {
        options += `<option value="${gnd.gn_division_name}">${gnd.gn_division_name}</option>`;
    });

    // Fill all dropdowns
    $('#gndDropdown1').html(options);
    $('#gndDropdown2').html(options);
    $('#gndDropdown3').html(options);
});


        });
    </script>
</body>
</html>
