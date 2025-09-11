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

        <h2 class="text-center" style="color: green;">Agro Forest — Edit</h2>

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
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="provinceDropdown" class="form-label dropdown-label">Province</label>
                            <select id="provinceDropdown" name="province_name" class="form-control">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="districtDropdown" class="form-label dropdown-label">District</label>
                            <select id="districtDropdown" name="district" class="form-control">
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="gndDropdown" class="form-label dropdown-label">GN Division (Optional)</label>
                            <select id="gndDropdown" name="gn_division_name" class="form-control">
                                <option value="">Select GN Division</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="three-dropdown-row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="tankDropdown" class="form-label dropdown-label">Select Tank Name</label>
                            <select id="tankDropdown" class="btn btn-success dropdown-toggle greenbackground" name="tank_name">
                                <option value="">Select Tank</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Other basic fields --}}
               @php
    $riverBasins = ['Mee Oya', 'Daduru Oya', 'Malwathu Oya'];
    $currentBasin = old('river_basin', $agro_forest->river_basin);
@endphp

<div class="form-group mb-3">
    <label for="river_basin" class="form-label dropdown-label">River Basin</label>
    <select class="form-control btn btn-success" name="river_basin" id="river_basin" required>
        <option value="">Select River Basin</option>
        @foreach ($riverBasins as $rb)
            <option value="{{ $rb }}" {{ $currentBasin === $rb ? 'selected' : '' }}>
                {{ $rb }}
            </option>
        @endforeach
    </select>
</div>

                <div class="form-group mb-3">
                    <label class="bold-label">Replanting Forest Beat Name</label>
                    <input type="text" class="form-control" name="replanting_forest_beat_name" value="{{ old('replanting_forest_beat_name', $agro_forest->replanting_forest_beat_name) }}">
                </div>

                <div class="form-group mb-3">
                    <label class="bold-label">Number of Hectares (Ha)</label>
                    <input type="number" step="0.01" class="form-control" name="number_of_hectares" value="{{ old('number_of_hectares', $agro_forest->number_of_hectares) }}">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label class="bold-label">GPS Longitude</label>
                        <input type="text" class="form-control" name="gps_longitude" value="{{ old('gps_longitude', $agro_forest->gps_longitude) }}">
                    </div>
                    <div class="form-group col">
                        <label class="bold-label">GPS Latitude</label>
                        <input type="text" class="form-control" name="gps_latitude" value="{{ old('gps_latitude', $agro_forest->gps_latitude) }}">
                    </div>
                </div>

                {{-- Optional extra tank names if you use them --}}
                <div class="form-row">
                    <div class="form-group col">
                        <label class="bold-label">Tank Name 2 (Optional)</label>
                        <input type="text" class="form-control" name="tank_name_2" value="{{ old('tank_name_2', $agro_forest->tank_name_2) }}">
                    </div>
                    <div class="form-group col">
                        <label class="bold-label">Tank Name 3 (Optional)</label>
                        <input type="text" class="form-control" name="tank_name_3" value="{{ old('tank_name_3', $agro_forest->tank_name_3) }}">
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

                {{-- Nursery --}}
                <h5 class="mt-3">Nursery Locations</h5>
                <table class="table table-bordered" id="nurseryTable">
                    <thead class="table-success">
                        <tr>
                            <th>Location</th>
                            <th style="width:120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nurseryLocs = old('nursery_locations_extra') ?? $agro_forest->nurseries->pluck('location')->toArray();
                            if (empty($nurseryLocs)) { $nurseryLocs = ['']; }
                        @endphp
                        @foreach($nurseryLocs as $i => $loc)
                            <tr>
                                <td><input type="text" name="nursery_locations_extra[]" class="form-control" value="{{ $loc }}"></td>
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
                    <input type="number" step="0.01" class="form-control" name="establish_cost" value="{{ old('establish_cost', $agro_forest->establish_cost) }}">
                </div>

                <div class="form-group mb-3">
                    <label class="bold-label d-block">Project Proposal (PDF)</label>
                    @php
                        $proposalUrl = $agro_forest->project_proposal_path ? asset('storage/'.$agro_forest->project_proposal_path) : null;
                    @endphp
                    @if($proposalUrl)
                        <div class="mb-2 d-flex flex-wrap gap-2">
                            <a href="{{ $proposalUrl }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-file-pdf me-1"></i> View current
                            </a>
                            <a href="{{ $proposalUrl }}" download class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-download me-1"></i> Download
                            </a>
                        </div>
                        <small class="text-muted d-block mb-2">Upload a new file to replace the current one (optional).</small>
                    @endif
                    <input type="file" class="form-control" name="project_proposal" accept="application/pdf">
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

    // ---- Prefill selects (Province -> District -> GN) ----
    const savedProvince = @json(old('province_name', $agro_forest->province_name));
    const savedDistrict = @json(old('district', $agro_forest->district));
    const savedGN       = @json(old('gn_division_name', $agro_forest->gn_division_name));
    const savedTank     = @json(old('tank_name', $agro_forest->tank_name));

    // Provinces: value = name, data-id = id (to fetch districts)
    $.get('/provinces', function (data) {
        const $prov = $('#provinceDropdown');
        $prov.empty().append('<option value="">Select Province</option>');

        let selectedProvId = null;
        $.each(data, function (i, province) {
            const selected = (province.name === savedProvince) ? 'selected' : '';
            if (selected) selectedProvId = province.id;
            $prov.append(`<option data-id="${province.id}" value="${province.name}" ${selected}>${province.name}</option>`);
        });

        // Load districts if we know the province id
        if (selectedProvId) {
            loadDistricts(selectedProvId, savedDistrict, function () {
                // After districts loaded, load GNs (optional)
                if (savedDistrict) loadGNs(savedDistrict, savedGN);
            });
        }
    });

    // On province change -> reload districts (and clear GN)
    $('#provinceDropdown').on('change', function () {
        const provId = $(this).find(':selected').data('id') || '';
        $('#districtDropdown').empty().append('<option value="">Select District</option>');
        $('#gndDropdown').empty().append('<option value="">Select GN Division</option>');
        if (provId) loadDistricts(provId, null);
    });

    // On district change -> reload GNs
    $('#districtDropdown').on('change', function () {
        const district = $(this).val();
        $('#gndDropdown').empty().append('<option value="">Select GN Division</option>');
        if (district) loadGNs(district, null);
    });

    function loadDistricts(provinceId, selectedDistrict = null, cb = null) {
        $.get(`/provinces/${encodeURIComponent(provinceId)}/districts`, function (data) {
            const $dist = $('#districtDropdown');
            $dist.empty().append('<option value="">Select District</option>');
            $.each(data, function (i, d) {
                const sel = (d.district === selectedDistrict) ? 'selected' : '';
                $dist.append(`<option value="${d.district}" ${sel}>${d.district}</option>`);
            });
            if (cb) cb();
        });
    }

    function loadGNs(districtName, selectedGN = null) {
        $.get('/gn-divisions', { district: districtName }, function (data) {
            const $gnd = $('#gndDropdown');
            $gnd.empty().append('<option value="">Select GN Division</option>');
            $.each(data, function (i, g) {
                const sel = (g.gn_division_name === selectedGN) ? 'selected' : '';
                $gnd.append(`<option value="${g.gn_division_name}" ${sel}>${g.gn_division_name}</option>`);
            });
        });
    }

    // Tanks
    $.get('/tanks', function (data) {
        const $tank = $('#tankDropdown');
        $tank.empty().append('<option value="">Select Tank</option>');
        $.each(data, function (i, t) {
            const sel = (t.tank_name === savedTank) ? 'selected' : '';
            $tank.append(`<option value="${t.tank_name}" ${sel}>${t.tank_name}</option>`);
        });
    });

    $.get("{{ url('/gn-divisions') }}", function (data) {
    $('#gndDropdown').empty().append('<option value="">Select GN Division</option>');
    $.each(data, function (i, gnd) {
        $('#gndDropdown').append(
            $('<option>', { value: gnd.gn_division_name, text: gnd.gn_division_name })
        );
    });
});
});
</script>
</body>
</html>
