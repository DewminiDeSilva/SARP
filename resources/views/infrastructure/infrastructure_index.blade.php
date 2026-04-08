<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Infrastructure Details</title>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- font Noto Sans-->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
    }

    .icon-action {
        display: inline-block;
        margin-right: 5px;
    }

    .icon-action .fas {
        font-size: 1.2rem;
    }

    .icon-action .fas.fa-edit {
        color: green;
    }

    .icon-action .fas.fa-eye {
        color: blue;
    }

    .button-container {
        display: flex;
        gap: 10px; /* Adjust the gap between buttons as needed */
    }

    .custom-button {
        background-color: white;
        color: red;
        border: 2px solid transparent; /* Initially no border */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        transition: border 0.3s ease; /* Smooth transition for border */
        width: 60px; /* Set a fixed width */
        height: 40px; /* Set a fixed height */
        box-sizing: border-box; /* Ensures padding is included in width and height */
        background-color: #f5c6cb;
    }

    .custom-button:hover {
        border-color: red; /* Border appears on hover */
        background-color: #f5c6cb;
    }

    .edit-button {
    background-color: #28a745 !important; /* Green background */
    color: white !important;
    border: none !important;
    width: 120px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    box-shadow: none !important;
}

.edit-button:hover {
    background-color: #218838 !important; /* Darker green on hover */
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
}


    .view-button {
        background-color: white; /* White background */
        color: orange;
        border: 2px solid transparent; /* Initially no border */
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px; /* Set a fixed width */
        height: 40px; /* Set a fixed height */
        box-sizing: border-box; /* Ensures padding is included in width and height */
        transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
        background-color: #60C267; /* Slightly darker light yellow on hover */
    }

    .view-button:hover {
        border-color: green; /* Border appears on hover */
        background-color: #60C267; /* Slightly darker light yellow on hover */
    }

    .card-header {
        font-weight: bold;
        text-align: center;
        background-color: #c7eef1; /* Blue color example */
        color: #0d0e0d; /* Text color */
    }

    .pagination .page-item {
        margin: 0 0px; /* Adjust the margin to reduce space */
    }
    .pagination .page-link {
        padding: 5px 10px; /* Adjust padding to control button size */
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

        /* Table filters (aligned with tank / beneficiary toolbar) */
        .beneficiary-filter-toolbar {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 0;
            margin: 20px 0 12px;
            box-shadow: none;
            text-align: left;
        }
        .beneficiary-filter-toolbar .filter-toolbar-top {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px 14px;
            margin-bottom: 2px;
        }
        .beneficiary-filter-toolbar .filter-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 18px;
            border: 2px solid #126926;
            background: #fff;
            color: #126926;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(18, 105, 38, 0.12);
        }
        .beneficiary-filter-toolbar .filter-toggle-btn:hover {
            background: #126926;
            color: #fff;
            box-shadow: 0 4px 14px rgba(18, 105, 38, 0.25);
        }
        .beneficiary-filter-toolbar .filter-badge {
            background: #126926;
            color: #fff;
            font-size: 11px;
            min-width: 22px;
            height: 22px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }
        .beneficiary-filter-toolbar .filter-toggle-btn:hover .filter-badge {
            background: #fff;
            color: #126926;
        }
        .beneficiary-filter-toolbar .filter-toolbar-hint {
            color: #64748b !important;
            font-size: 13px !important;
            font-weight: 500;
        }
        .beneficiary-filter-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 4px 22px rgba(15, 23, 42, 0.07), 0 1px 3px rgba(15, 23, 42, 0.04), inset 0 1px 0 rgba(255, 255, 255, 0.9);
            padding: 14px 16px 12px;
            margin-top: 12px;
            position: relative;
            overflow: hidden;
        }
        .beneficiary-filter-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #126926 0%, #22c55e 45%, #0d9488 100%);
            opacity: 0.92;
        }
        .beneficiary-filter-panel .beneficiary-filter-row {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: flex-end;
            gap: 10px 12px;
            overflow-x: auto;
            overflow-y: visible;
            padding: 4px 2px 6px;
            margin: 0 -2px;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
        }
        .beneficiary-filter-field {
            flex: 1 1 0;
            min-width: 118px;
        }
        .beneficiary-filter-field--tank {
            min-width: 140px;
        }
        .beneficiary-filter-field--completion {
            min-width: 168px;
            flex: 1.15 1 0;
        }
        .beneficiary-filter-panel label.beneficiary-filter-label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 5px;
            font-size: 10px !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            white-space: nowrap;
        }
        .beneficiary-filter-panel label.beneficiary-filter-label i {
            color: #126926;
            font-size: 11px;
            opacity: 0.9;
        }
        .beneficiary-filter-panel select.beneficiary-filter-select {
            display: block;
            width: 100%;
            max-width: 100%;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            min-height: 38px;
            border-radius: 11px;
            border: 1px solid rgba(15, 23, 42, 0.1);
            font-family: inherit;
            font-size: 12.5px !important;
            font-weight: 500 !important;
            line-height: 1.35;
            color: #0f172a !important;
            padding: 8px 38px 8px 13px !important;
            cursor: pointer;
            background-color: #f1f5f9;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%23126926' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"), linear-gradient(165deg, #ffffff 0%, #f8fafc 42%, #f1f5f9 100%);
            background-repeat: no-repeat, no-repeat;
            background-position: right 11px center, 0 0;
            background-size: 15px 15px, 100% 100%;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9), 0 1px 2px rgba(15, 23, 42, 0.05);
        }
        .beneficiary-filter-panel select.beneficiary-filter-select:focus {
            border-color: #126926;
            outline: none;
            box-shadow: 0 0 0 3px rgba(18, 105, 38, 0.22);
        }
        .beneficiary-filter-actions {
            flex: 0 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 8px;
            padding-left: 4px;
            margin-left: 2px;
            border-left: 1px solid #e2e8f0;
        }
        .beneficiary-filter-actions .btn-filter-apply {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 9px;
            padding: 7px 16px;
            font-weight: 600;
            font-size: 12px !important;
            border: none;
            background: linear-gradient(135deg, #15803d 0%, #126926 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(18, 105, 38, 0.3);
        }
        .beneficiary-filter-actions .btn-filter-clear {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            padding: 7px 14px;
            font-weight: 600;
            font-size: 12px !important;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b !important;
            text-decoration: none;
        }
        .beneficiary-filter-actions .btn-filter-clear:hover {
            border-color: #cbd5e1;
            color: #126926;
            background: #f8fafc;
        }
        .beneficiary-filter-panel .filter-hint {
            font-size: 11px !important;
            color: #94a3b8 !important;
            margin: 8px 0 0;
            padding-top: 8px;
            border-top: 1px solid #f1f5f9;
            line-height: 1.45;
            text-align: left;
        }
        .beneficiary-filter-panel .filter-hint i {
            color: #126926;
            opacity: 0.75;
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

<style>
        /* Fixed Header */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to bottom,rgb(76, 167, 88), #a8d5ba); /* Vertical gradient */
            color: black; /* Text color */
            z-index: 1000; /* Ensures header stays above other elements */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 20px; /* Adjust this value for more/less curve */
            border-bottom-right-radius: 20px; /* Adjust this value for more/less curve */
        }

        /* Logo and Text */
        .fixed-header .logo-container {
            display: flex;
            align-items: center;
            font-family: 'Noto Sans', sans-serif; /* Apply Noto Sans font */
            font-size: 1.8rem; /* Adjust the font size */
            margin: 0;
            color: black; /* Text color */
            font-weight: bold; /* Ensure the title stands out */
            text-align: center;
        }

        .fixed-header img {
            height: 40px;
            margin-right: 10px;
        }

        /* Profile Section */
        .fixed-header .profile {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .fixed-header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Padding to prevent overlap */
        .content {
            margin-top: 80px; /* Adjust based on header height */
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 15px; /* Add space between the logos */
        }

        .ministry-logo, .ifad-logo, .sharp-logo {
            height: 50px; /* Ensure all logos are of the same height */
            max-width: 70px; /* Limit the width to ensure proportions are maintained */
        }

        /* Custom width for the Ministry logo */
        .custom-ministry-logo {
            max-width: 120px; /* Adjust the width as needed */
        }

        .count {
    font-size: 2.5rem;
    font-weight: bold;
    color: green;
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


    <a href="{{ route('infrastructure.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>
        <div class="container-fluid">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Infrastructure Details</h1>
            </div>

            <div class="container">
    <div class="row justify-content-center mt-4">
        <!-- Total Infrastructures Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Total Infrastructures
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="count" data-target="{{ $totalInfrastructures }}">0</span></h5>
                <p class="card-text">Count matching your search and filters.</p>
            </div>
        </div>

        <!-- Ongoing Infrastructures Card -->
        <div class="card text-center" style="width: 18rem; margin-right: 20px;">
            <div class="card-header">
                Ongoing
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="count" data-target="{{ $ongoingCount }}">0</span></h5>
                <p class="card-text">Ongoing (status) in the same filtered set.</p>
            </div>
        </div>

        <!-- Completed Infrastructures Card -->
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                Completed
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="count" data-target="{{ $completedCount }}">0</span></h5>
                <p class="card-text">Finished (completed) in the same filtered set.</p>
            </div>
        </div>
    </div>
</div>


            <div class="right-column">
                <div class="container-fluid top-left">
                    <div class="d-flex justify-content-between mb-3">
                        @if(auth()->user()->hasPermission('infrastructure', 'add'))
                        <a href="{{route('infrastructure.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Infrastructure</a>
                        @endif
                        @sarpMutate('infrastructure')
                        <a href="{{route('downloadInfrastructure.csv')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Generate CSV Report</a>
                        @endsarpMutate
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- CSV Upload Form -->
                        @if(auth()->user()->hasPermission('infrastructure', 'upload_csv'))
                        <form action="{{ route('infrastructure.upload_csv') }}" method="POST" enctype="multipart/form-data" class="form-inline">

                            @csrf
                            <div class="form-group mr-2">
                                <input type="file" name="csv_file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Upload CSV</button>
                        </form>
                        @endif
                        <!-- Search form -->
                        <form method="GET" action="{{ route('infrastructure.index') }}" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search','') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                            @if(request('entries'))
                                <input type="hidden" name="entries" value="{{ request('entries') }}">
                            @endif
                            @foreach (['filter_type', 'filter_completion', 'filter_ds', 'filter_asc', 'filter_gn'] as $fk)
                                @if (request()->filled($fk))
                                    <input type="hidden" name="{{ $fk }}" value="{{ request($fk) }}">
                                @endif
                            @endforeach
                        </form>
                    </div>

                    <div class="beneficiary-filter-toolbar">
                        <div class="filter-toolbar-top">
                            <button class="btn filter-toggle-btn" type="button" data-toggle="collapse" data-target="#infrastructureFilterCollapse" aria-expanded="{{ ($activeFilterCount ?? 0) > 0 ? 'true' : 'false' }}" aria-controls="infrastructureFilterCollapse">
                                <i class="fas fa-filter"></i>
                                <span>Filters</span>
                                @if(($activeFilterCount ?? 0) > 0)
                                    <span class="filter-badge">{{ $activeFilterCount }}</span>
                                @endif
                            </button>
                            <span class="filter-toolbar-hint d-none d-md-inline">Narrow the list and summaries by type, completion, and location.</span>
                        </div>
                        <div class="collapse {{ ($activeFilterCount ?? 0) > 0 ? 'show' : '' }}" id="infrastructureFilterCollapse">
                            <div class="beneficiary-filter-card">
                                <form method="GET" action="{{ route('infrastructure.index') }}" class="beneficiary-filter-panel">
                                    @if(request('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    @if(request('entries'))
                                        <input type="hidden" name="entries" value="{{ request('entries') }}">
                                    @endif
                                    <div class="beneficiary-filter-row">
                                        <div class="beneficiary-filter-field beneficiary-filter-field--tank">
                                            <label class="beneficiary-filter-label" for="filter_type"><i class="fas fa-water" aria-hidden="true"></i> Type</label>
                                            <select name="filter_type" id="filter_type" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by infrastructure type">
                                                <option value="">All types</option>
                                                @foreach ($filterTypeOptions ?? [] as $t)
                                                    <option value="{{ $t }}" {{ request('filter_type') === $t ? 'selected' : '' }}>{{ $t }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="beneficiary-filter-field beneficiary-filter-field--completion">
                                            <label class="beneficiary-filter-label" for="filter_completion"><i class="fas fa-check-double" aria-hidden="true"></i> Completed</label>
                                            <select name="filter_completion" id="filter_completion" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by completion">
                                                <option value="">Any status</option>
                                                <option value="completed" {{ request('filter_completion') === 'completed' ? 'selected' : '' }}>Finished</option>
                                                <option value="ongoing" {{ request('filter_completion') === 'ongoing' ? 'selected' : '' }}>On Going</option>
                                            </select>
                                        </div>
                                        <div class="beneficiary-filter-field">
                                            <label class="beneficiary-filter-label" for="filter_ds"><i class="fas fa-map-marked-alt" aria-hidden="true"></i> DSD</label>
                                            <select name="filter_ds" id="filter_ds" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by DS division">
                                                <option value="">All DS</option>
                                                @foreach ($filterDsOptions ?? [] as $ds)
                                                    <option value="{{ $ds }}" {{ request('filter_ds') === $ds ? 'selected' : '' }}>{{ $ds }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="beneficiary-filter-field">
                                            <label class="beneficiary-filter-label" for="filter_asc"><i class="fas fa-building" aria-hidden="true"></i> ASC</label>
                                            <select name="filter_asc" id="filter_asc" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by ASC">
                                                <option value="">All ASC</option>
                                                @foreach ($filterAscOptions ?? [] as $asc)
                                                    <option value="{{ $asc }}" {{ request('filter_asc') === $asc ? 'selected' : '' }}>{{ $asc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="beneficiary-filter-field">
                                            <label class="beneficiary-filter-label" for="filter_gn"><i class="fas fa-map-pin" aria-hidden="true"></i> GND</label>
                                            <select name="filter_gn" id="filter_gn" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by GN division">
                                                <option value="">All GN</option>
                                                @foreach ($filterGnOptions ?? [] as $gn)
                                                    <option value="{{ $gn }}" {{ request('filter_gn') === $gn ? 'selected' : '' }}>{{ $gn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="beneficiary-filter-actions">
                                            <button type="submit" class="btn-filter-apply">
                                                <i class="fas fa-check mr-1"></i>Apply
                                            </button>
                                            <a href="{{ route('infrastructure.index', request()->only(['search', 'entries'])) }}" class="btn-filter-clear">
                                                <i class="fas fa-undo mr-1"></i>Clear
                                            </a>
                                        </div>
                                    </div>
                                    <p class="filter-hint"><i class="fas fa-info-circle mr-1"></i>Use <strong>Completed</strong> to show only Finished or On Going. Select <strong>DSD</strong> then <strong>Apply</strong> to refresh ASC; then <strong>ASC</strong> and <strong>Apply</strong> for GN. Filters combine (AND). Summary cards use the same filtered set.</p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message Popup -->
                    @if(session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                alert('{{ session('success') }}');
                            });
                        </script>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="entries-container">
                            <label for="entriesSelect">Show</label>
                            <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                <option value="10" {{ $infrastructures->perPage() == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ $infrastructures->perPage() == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $infrastructures->perPage() == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $infrastructures->perPage() == 100 ? 'selected' : '' }}>100</option>
                            </select>
                            <label for="entriesSelect">entries</label>
                        </div>
                        <div id="tableInfo" class="text-right"></div>
                    </div>

                    <div class="row table-container">
                        <div class="col">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Type of Infrastructure</th>
                                        <th>Infrastructure Progress</th>
                                        <th>Infrastructure Description</th>
                                        <th>Contractor</th>
                                        <th>Payment</th>
                                        <th>EOT</th>
                                        <th>Contract Period</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infrastructures as $infrastructure)
                                    <tr>
                                        <td>{{ $infrastructure->type_of_infrastructure }}</td>
                                        <td>{{ $infrastructure->infrastructure_progress }}</td>
                                        <td>{{ $infrastructure->infrastructure_description }}</td>
                                        <td>{{ $infrastructure->contractor }}</td>
                                        <td>{{ $infrastructure->payment }}</td>
                                        <td>{{ $infrastructure->eot }}</td>
                                        <td>{{ $infrastructure->contract_period }}</td>
                                        <td>{{ $infrastructure->status }}</td>
                                        <td>{{ $infrastructure->remarks }}</td>
                                        <td class="button-container">
                                            @if(auth()->user()->hasPermission('infrastructure', 'view'))
                                            <a href="{{ route('infrastructure.show', $infrastructure->id) }}" class="btn btn-danger button view-button" title="View">
                                                <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                            </a>
                                            @endif

                                            @if(auth()->user()->hasPermission('infrastructure', 'edit'))
                                            <a href="/infrastructure/{{ $infrastructure->id }}/edit"
                                            class="btn btn-success edit-button"
                                            style="height: 40px; width: 120px; font-size: 16px; display: flex; align-items: center; justify-content: center;"
                                            title="Edit">
                                            Update
                                            </a>
                                            @endif

                                            @if(auth()->user()->hasPermission('infrastructure', 'delete'))
                                            <form id="delete-form-{{ $infrastructure->id }}" action="/infrastructure/{{ $infrastructure->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger custom-button" title="Delete" onclick="confirmDelete({{ $infrastructure->id }})">
        <img src="{{ asset('assets/images/delete.png') }}" alt="Delete Icon" style="width: 16px; height: 16px;">
    </button>
</form>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item {{ $infrastructures->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $infrastructures->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>

                                    @php
                                        $currentPage = $infrastructures->currentPage();
                                        $lastPage = $infrastructures->lastPage();
                                        $startPage = max($currentPage - 2, 1);
                                        $endPage = min($currentPage + 2, $lastPage);
                                    @endphp

                                    @if ($startPage > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $infrastructures->url(1) }}">1</a>
                                        </li>
                                        @if ($startPage > 2)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                    @endif

                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $infrastructures->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($endPage < $lastPage)
                                        @if ($endPage < $lastPage - 1)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $infrastructures->url($lastPage) }}">{{ $lastPage }}</a>
                                        </li>
                                    @endif

                                    <li class="page-item {{ $infrastructures->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $infrastructures->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            @php
                                $currentPage = $infrastructures->currentPage();
                                $perPage = $infrastructures->perPage();
                                $total = $infrastructures->total();
                                $startingNumber = ($currentPage - 1) * $perPage + 1;
                                $endingNumber = min($total, $currentPage * $perPage);
                            @endphp

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div id="tableInfo" class="text-right">
                                    <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                                </div>
                            </div>

                            <!-- Delete yes no script -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Handle delete button click
                                    document.querySelectorAll('.delete-btn').forEach(button => {
                                        button.addEventListener('click', function(event) {
                                            event.preventDefault();
                                            if (confirm('Are you sure you want to delete this record?')) {
                                                const url = this.getAttribute('data-url');
                                                fetch(url, {
                                                    method: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    }
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        alert(data.success);
                                                        this.closest('tr').remove();
                                                    } else {
                                                        alert('Error deleting record.');
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    alert('An error occurred. Please try again.');
                                                });
                                            }
                                        });
                                    });

                                    // Display success message if available
                                    @if(session('success'))
                                        alert('{{ session('success') }}');
                                    @endif
                                });
                            </script>

                            <script>
                                $(document).ready(function() {
                                    $('#entriesSelect').change(function() {
                                        var perPage = $(this).val();
                                        var urlParams = new URLSearchParams(window.location.search);
                                        urlParams.set('entries', perPage);
                                        window.location.search = urlParams.toString();
                                    });
                                });
                            </script>

                            <script>
                                function updateEntries() {
                                    const entries = document.getElementById('entriesSelect').value;
                                    const urlParams = new URLSearchParams(window.location.search);
                                    urlParams.set('entries', entries);
                                    window.location.search = urlParams.toString();
                                }
                            </script>

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
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.count');

        counters.forEach(counter => {
            counter.innerText = '0';
            const updateCounter = () => {
                const target = +counter.getAttribute('data-target');
                const current = +counter.innerText;
                const increment = Math.ceil(target / 100); // smaller = slower

                if (current < target) {
                    counter.innerText = `${Math.min(current + increment, target)}`;
                    setTimeout(updateCounter, 30); // delay between updates
                } else {
                    counter.innerText = target;
                }
            };
            updateCounter();
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('update_success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('update_success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        @if(session('update_fail'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('update_fail') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Handle delete confirmation
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this record?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    // Show success message after delete
    @if(session('delete_success'))
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: '{{ session('delete_success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    // Show error message if delete failed
    @if(session('delete_fail'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('delete_fail') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
</script>

@if(session('create_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('create_success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

@if(session('create_fail'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('create_fail') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif


                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>
</body>
</html>
