
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Forest — View</title>

    <!-- Bootstrap 5 + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery + Bootstrap bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .custom-border { border: 2px solid green; box-shadow: 0 4px 12px rgba(0,0,0,0.3); border-color: darkgreen !important; }
        .frame { display:flex; flex-direction:row; justify-content:space-between; width:100%; }
        .right-column { flex:0 0 80%; padding:20px; }
        .left-column  { flex:0 0 20%; border-right:1px solid #dee2e6; }
        .btn-back { display:inline-flex; align-items:center; gap:8px; text-decoration:none; }
        .btn-back img { width:24px; height:24px; }
        .btn-text { font-weight:600; }
        .label-col { width: 260px; font-weight: 600; color:#145c32; }
        .value-col { word-break: break-word; }
        .section-title { color: green; border-bottom: 1px dashed #198754; padding-bottom: .25rem; margin-bottom: .75rem; }
        .kv-row { display:flex; align-items:flex-start; padding:.35rem 0; border-bottom: 1px solid #f2f2f2; }
        .kv-row:last-child { border-bottom:none; }
        .badge-tag { background:#e8f5e9; color:#145c32; border:1px solid #c8e6c9; }
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

            <a href="{{ route('agro-forest.index') }}" class="btn-back me-2">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

            @if(isset($agro_forest->id))
                <a href="{{ route('agro-forest.edit', $agro_forest->id) }}" class="btn btn-success">
                    <i class="fa fa-pen-to-square me-1"></i> Edit
                </a>
            @endif
        </div>

        <h2 class="text-center" style="color: green;">Agro Forest — Details</h2>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <div class="container mt-4 border rounded p-4 custom-border">

            {{-- LOCATION BLOCK --}}
            <h5 class="section-title"><i class="fa fa-location-dot me-2"></i>Location</h5>
            <div class="kv-row">
                <div class="label-col">River Basin</div>
                <div class="value-col">{{ $agro_forest->river_basin ?? '—' }}</div>
            </div>
            <div class="kv-row">
                <div class="label-col">Province</div>
                <div class="value-col">{{ $agro_forest->province_name ?? '—' }}</div>
            </div>
            <div class="kv-row">
                <div class="label-col">District</div>
                <div class="value-col">{{ $agro_forest->district ?? '—' }}</div>
            </div>
            <div class="kv-row">
                <div class="label-col">DS Division</div>
                <div class="value-col">{{ $agro_forest->ds_division_name ?? '—' }}</div>
            </div>
            <div class="kv-row">
                <div class="label-col">GN Division(s)</div>
                <div class="value-col">
                    @php
                        $gns = array_filter([
                            $agro_forest->gn_division_name ?? null,
                            $agro_forest->gn_division_name_2 ?? null,
                            $agro_forest->gn_division_name_3 ?? null,
                        ]);
                    @endphp

                    @if(count($gns))
                        @foreach($gns as $gn)
                            <span class="badge badge-tag me-1">{{ $gn }}</span>
                        @endforeach
                    @else
                        —
                    @endif
                </div>
            </div>
            <div class="kv-row">
                <div class="label-col">Tank(s)</div>
                <div class="value-col">
                    @php
                        $tanks = array_filter([
                            $agro_forest->tank_name ?? null,
                            $agro_forest->tank_name_2 ?? null,
                            $agro_forest->tank_name_3 ?? null,
                        ]);
                    @endphp
                    @if(count($tanks))
                        @foreach($tanks as $t)
                            <span class="badge badge-tag me-1"><i class="fa fa-water me-1"></i>{{ $t }}</span>
                        @endforeach
                    @else
                        —
                    @endif
                </div>
            </div>

            {{-- CORE FIELDS --}}
            <h5 class="section-title mt-4"><i class="fa fa-tree me-2"></i>Plantation / Site</h5>
            <div class="kv-row">
                <div class="label-col">Replanting Forest Beat Name</div>
                <div class="value-col">{{ $agro_forest->replanting_forest_beat_name ?? '—' }}</div>
            </div>
            <div class="kv-row">
                <div class="label-col">Number of Hectares (Ha)</div>
                <div class="value-col">
                    @if(isset($agro_forest->number_of_hectares))
                        {{ number_format((float)$agro_forest->number_of_hectares, 2) }}
                    @else
                        —
                    @endif
                </div>
            </div>
            <div class="kv-row">
                <div class="label-col">GPS (Longitude, Latitude)</div>
                <div class="value-col">
                    @php
                        $lon = trim((string)($agro_forest->gps_longitude ?? ''));
                        $lat = trim((string)($agro_forest->gps_latitude ?? ''));
                        $hasGps = $lon !== '' && $lat !== '';
                    @endphp
                    @if($hasGps)
                        <code>{{ $lon }}</code>, <code>{{ $lat }}</code>
                        <a class="ms-2" target="_blank"
                           href="https://www.google.com/maps/search/?api=1&query={{ urlencode($lat . ',' . $lon) }}">
                            <i class="fa fa-map-location-dot me-1"></i>Open in Maps
                        </a>
                    @else
                        —
                    @endif
                </div>
            </div>

            {{-- SPECIES --}}
            <h5 class="section-title mt-4"><i class="fa fa-seedling me-2"></i>Species Details</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-success">
                    <tr>
                        <th>Species Name</th>
                        <th class="text-end">No. of Plants</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $speciesRows = $agro_forest->species ?? collect();
                    @endphp
                    @forelse($speciesRows as $sp)
                        <tr>
                            <td>{{ $sp->species_name ?? '—' }}</td>
                            <td class="text-end">
                                @if(isset($sp->no_of_plants))
                                    {{ number_format((float)$sp->no_of_plants) }}
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="text-center text-muted">No species recorded.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- NURSERY LOCATIONS --}}
            <h5 class="section-title mt-4"><i class="fa fa-warehouse me-2"></i>Plant Nursery Location</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-success">
                    <tr>
                        <th>Location</th>
                        <th class="text-end">No. of Plants</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $nurseries = $agro_forest->nurseries ?? collect();
                    @endphp
                    @forelse($nurseries as $n)
                        <tr>
                            <td>{{ (is_array($n) ? ($n['location'] ?? '') : ($n->location ?? '')) ?: '—' }}</td>
                            <td class="text-end">
                                @php $np = is_array($n) ? ($n['plants'] ?? null) : ($n->number_of_plants ?? null); @endphp
                                {{ isset($np) && $np !== '' ? number_format((float)$np) : '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="text-center text-muted">No nursery entries.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- COST / PROPOSAL / OTHER NUMBERS --}}
            <h5 class="section-title mt-4"><i class="fa fa-file-invoice-dollar me-2"></i>Financials & Documents</h5>
            <div class="kv-row">
                <div class="label-col">Establish Cost</div>
                <div class="value-col">
                    @if(isset($agro_forest->establish_cost))
                        {{ number_format((float)$agro_forest->establish_cost, 2) }}
                    @else
                        —
                    @endif
                </div>
            </div>

            <div class="kv-row">
                <div class="label-col">Paid Amount</div>
                <div class="value-col">
                    {{ ($agro_forest->paid_amount ?? '') !== '' ? $agro_forest->paid_amount : '—' }}
                </div>
            </div>

            <div class="kv-row">
                <div class="label-col">Number of Trees (Plan)</div>
                <div class="value-col">
                    @php
                        // Mind the typo in edit form ("nno_of_trees_plans"), we trust the model field here:
                        $treesPlan = $agro_forest->no_of_trees_plans ?? null;
                    @endphp
                    {{ isset($treesPlan) ? number_format((float)$treesPlan) : '—' }}
                </div>
            </div>

            @php
                $proposalUrl = $agro_forest->project_proposal_path
                    ? asset('storage/' . $agro_forest->project_proposal_path)
                    : null;
            @endphp
            <div class="kv-row">
                <div class="label-col">Project Proposal (PDF)</div>
                <div class="value-col">
                    @if($proposalUrl)
                        <a href="{{ $proposalUrl }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                            <i class="fa fa-file-pdf me-1"></i> View
                        </a>
                        <a href="{{ $proposalUrl }}" download class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-download me-1"></i> Download
                        </a>
                    @else
                        <span class="text-muted">Not uploaded</span>
                    @endif
                </div>
            </div>

            {{-- ACTIONS --}}
            <!-- <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('agro-forest.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="fa fa-list me-1"></i> All Records
                </a>
                @if(isset($agro_forest->id))
                    <a href="{{ route('agro-forest.edit', $agro_forest->id) }}" class="btn btn-success">
                        <i class="fa fa-pen-to-square me-1"></i> Edit
                    </a>
                @endif
            </div> -->
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#sidebarToggle').on('click', function () {
            $('.left-column').toggleClass('d-none');
        });
    });
</script>
</body>
</html>
