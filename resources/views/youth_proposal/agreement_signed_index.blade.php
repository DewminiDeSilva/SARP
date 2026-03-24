<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agreement Signed Youth Proposals</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- <style>
        /* Reuse your styles here (same as original EOI index) */
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; transition: flex 0.3s ease, padding 0.3s ease; }
        .left-column.hidden { display: none; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        #sidebarToggle:hover { background-color: #0a4818; }
        .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }
        td { vertical-align: middle; white-space: nowrap; }
        .pagination .page-link { padding: 5px 10px; }
        .page-link { color: #28a745; }
        .page-item.active .page-link { color: #fff; background-color: #126926; border-color: #126926; }
    </style> -->

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
    .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }

    /* —— Agreement signed: modern table & actions —— */
    :root {
        --ag-primary: #126926;
        --ag-primary-dark: #0d4d1f;
        --ag-accent: #60C267;
        --ag-surface: #ffffff;
        --ag-muted: #64748b;
        --ag-border: #e2e8f0;
        --ag-row-hover: #f0fdf4;
        --ag-radius: 12px;
        --ag-shadow: 0 1px 3px rgba(0,0,0,.06), 0 10px 40px -12px rgba(18,105,38,.12);
    }

    .agreement-page-heading h1 {
        font-weight: 800;
        letter-spacing: -0.02em;
        color: var(--ag-primary) !important;
    }

    .agreement-card {
        background: var(--ag-surface);
        border-radius: var(--ag-radius);
        box-shadow: var(--ag-shadow);
        border: 1px solid rgba(18,105,38,0.1);
        overflow: visible;
        margin-top: 1.5rem;
    }

    .agreement-table-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: var(--ag-radius) var(--ag-radius) 0 0;
    }

    .agreement-table {
        margin-bottom: 0 !important;
        border: none !important;
        font-size: 0.9375rem;
    }

    .agreement-table thead th {
        background: linear-gradient(135deg, var(--ag-primary) 0%, var(--ag-primary-dark) 100%);
        color: #fff !important;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        border: none !important;
        padding: 14px 16px !important;
        vertical-align: middle;
        white-space: nowrap;
    }

    .agreement-table tbody td {
        border-color: var(--ag-border) !important;
        padding: 14px 16px !important;
        vertical-align: middle !important;
    }

    .agreement-table tbody tr {
        transition: background-color 0.15s ease;
    }

    .agreement-table tbody tr:hover {
        background-color: var(--ag-row-hover);
    }

    .agreement-table tbody tr:nth-child(even) {
        background-color: #fafcfb;
    }

    .agreement-table tbody tr:nth-child(even):hover {
        background-color: var(--ag-row-hover);
    }

    .agreement-table .cell-id {
        font-weight: 700;
        color: var(--ag-primary);
        font-variant-numeric: tabular-nums;
    }

    .agreement-table .cell-text {
        max-width: 220px;
        line-height: 1.45;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        background: rgba(18,105,38,0.12);
        color: var(--ag-primary-dark);
        border: 1px solid rgba(18,105,38,0.2);
        white-space: nowrap;
    }

    .status-pill i { font-size: 0.7rem; opacity: 0.9; }

    /* Beneficiary details — always visible (no collapse) */
    .beneficiary-details-block {
        border: 1px solid var(--ag-border);
        border-radius: 10px;
        margin-bottom: 10px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0,0,0,.04);
    }

    .beneficiary-details-block:last-child { margin-bottom: 0; }

    .beneficiary-details-block .bd-head {
        padding: 10px 14px;
        font-weight: 700;
        color: #1e293b;
        background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid var(--ag-border);
        font-size: 0.9rem;
    }

    .beneficiary-details-block .bd-head i {
        color: var(--ag-primary);
        margin-right: 8px;
    }

    .beneficiary-details-block .bd-body {
        padding: 12px 14px 14px;
        font-size: 0.875rem;
        line-height: 1.55;
        color: #334155;
    }

    .beneficiary-details-block .bd-body .lbl {
        color: var(--ag-muted);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .beneficiary-empty {
        padding: 12px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px dashed var(--ag-border);
        color: var(--ag-muted);
        font-size: 0.875rem;
    }

    /* Inline action buttons (no dropdown) */
    .agreement-actions-cell {
        vertical-align: middle !important;
        min-width: 200px;
    }

    .agreement-actions-stack {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
    }

    .agreement-actions-stack .btn-action-row {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        align-items: center;
    }

    .btn-agreement-view {
        background: linear-gradient(135deg, var(--ag-primary) 0%, var(--ag-primary-dark) 100%);
        color: #fff !important;
        border: none;
        font-weight: 600;
        font-size: 0.8125rem;
        padding: 8px 14px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(18,105,38,0.22);
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
    }

    .btn-agreement-view:hover {
        color: #fff !important;
        filter: brightness(1.06);
        box-shadow: 0 4px 12px rgba(18,105,38,0.28);
    }

    .btn-agreement-outline {
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.8125rem;
        padding: 6px 12px;
        border: 1px solid #cbd5e1;
        color: #334155 !important;
        background: #fff;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-agreement-outline:hover {
        background: #f8fafc;
        border-color: var(--ag-primary);
        color: var(--ag-primary-dark) !important;
    }

    .btn-agreement-add {
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.8125rem;
        padding: 6px 12px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-agreement-data {
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.8125rem;
        padding: 6px 12px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .agreement-beneficiary-label {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--ag-muted);
        margin-top: 4px;
        margin-bottom: 2px;
    }

    .agreement-footer-meta {
        padding: 16px 20px;
        background: #f8fafc;
        border-top: 1px solid var(--ag-border);
        font-size: 0.875rem;
        color: var(--ag-muted);
        border-radius: 0 0 var(--ag-radius) var(--ag-radius);
    }

    @media (max-width: 992px) {
        .agreement-table .cell-text { max-width: none; }
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

    <div class="right-column" style="padding:70px;">
        <div class="d-flex align-items-center mb-3">

            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
           <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


            <div class="center-heading text-center mt-4 agreement-page-heading">
                <h1 style="font-size: 2.4rem;">Agreement Signed Youth Proposals</h1>
                <p class="text-muted mb-0">Beneficiary details and youth data are managed on this page.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3 border-0 shadow-sm">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mt-3 border-0 shadow-sm">{{ session('error') }}</div>
            @endif

            <div class="agreement-card">
                <div class="agreement-table-wrap">
                <table class="table agreement-table">
                    <thead>
                        <tr>
                            <th style="width: 56px;">ID</th>
                            <th>Name of the Youth</th>
                            <th>Nature of the Business</th>
                            <th>Contact Person</th>
                            <th>Mobile Phone</th>
                            <th>Status</th>
                            <th style="min-width: 260px;">Beneficiary details</th>
                            <th style="min-width: 220px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($signedProposals as $proposal)
                        <tr>
                            <td class="cell-id">{{ $proposal->id }}</td>
                            <td class="cell-text"><strong>{{ $proposal->organization_name }}</strong></td>
                            <td class="cell-text">{{ $proposal->business_title ?? '—' }}</td>
                            <td class="cell-text">{{ $proposal->contact_person ?? '—' }}</td>
                            <td class="cell-text">{{ $proposal->mobile_phone ?? '—' }}</td>
                            <td>
                                <span class="status-pill"><i class="fas fa-file-signature"></i> {{ $proposal->status }}</span>
                            </td>
                            <td>
                                @forelse ($proposal->beneficiaries as $beneficiary)
                                    <div class="beneficiary-details-block">
                                        <div class="bd-head">
                                            <i class="fas fa-user"></i>{{ $beneficiary->name_with_initials ?? '—' }}
                                        </div>
                                        <div class="bd-body">
                                            <div class="mb-1"><span class="lbl">Name with initials</span><br><strong>{{ $beneficiary->name_with_initials ?? '—' }}</strong></div>
                                            <div class="mb-1"><span class="lbl">Type of project</span><br>{{ $beneficiary->project_type ?? '—' }}</div>
                                            <div class="mb-1"><span class="lbl">NIC</span><br>{{ $beneficiary->nic ?? '—' }}</div>
                                            <div class="mb-1"><span class="lbl">Phone</span><br>{{ $beneficiary->phone ?? '—' }}</div>
                                            <div class="mb-0"><span class="lbl">Address</span><br>{{ \Illuminate\Support\Str::limit($beneficiary->address ?? '—', 120) }}</div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="beneficiary-empty mb-0">No beneficiary linked to this proposal yet.</div>
                                @endforelse
                            </td>
                            <td class="agreement-actions-cell">
                                <div class="agreement-actions-stack">
                                    <a href="{{ route('youth-proposals.show', $proposal->id) }}" class="btn-agreement-view">
                                        <i class="fas fa-eye"></i> View Youth Proposal
                                    </a>
                                    @foreach ($proposal->beneficiaries as $beneficiary)
                                        @if($proposal->beneficiaries->count() > 1)
                                            <div class="agreement-beneficiary-label">{{ $beneficiary->name_with_initials ?? 'Beneficiary' }}</div>
                                        @endif
                                        <div class="btn-action-row">
                                            <a href="{{ route('beneficiary.show', $beneficiary->id) }}" class="btn-agreement-outline">
                                                <i class="fas fa-id-card"></i> Beneficiary
                                            </a>
                                            @if($beneficiary->youthForm)
                                                <a href="{{ route('youth_form.show', $beneficiary->id) }}" class="btn btn-sm btn-info btn-agreement-data text-white">
                                                    <i class="fas fa-file-alt"></i> View youth data
                                                </a>
                                            @else
                                                <a href="{{ route('youth_form.create', $beneficiary->id) }}" class="btn btn-sm btn-success btn-agreement-add">
                                                    <i class="fas fa-plus-circle"></i> ADD DATA
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No proposals found with status &quot;Agreement Signed&quot;.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                </div>

                <div class="agreement-footer-meta d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        Showing {{ $signedProposals->firstItem() ?? 0 }} to {{ $signedProposals->lastItem() ?? 0 }} of {{ $signedProposals->total() }} entries
                    </div>
                    <div class="mt-2 mt-md-0">
                        {{ $signedProposals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar toggle script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('d-none');
            content.style.flex = sidebar.classList.contains('d-none') ? '0 0 100%' : '0 0 80%';
        });
    });
</script>

</body>
</html>
