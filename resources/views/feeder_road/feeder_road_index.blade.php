<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feeder Road Development</title>
 <!-- Add jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

 <!-- Add Bootstrap JS -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <!-- Inter — match beneficiary summary typography -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&display=swap" rel="stylesheet">

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
            background-color: white; /* White background */
            color: orange;
            border: 2px solid transparent; /* Initially no border */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            box-sizing: border-box; /* Ensures padding is included in width and height */
            /*padding: 10px;*/
            transition: border 0.3s ease, background-color 0.3s ease; /* Smooth transition for border and background color */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
        }

        .edit-button:hover {
            border-color: orange; /* Border appears on hover */
            background-color: #ffeeba; /* Slightly darker light yellow on hover */
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
            /*padding: 10px;*/
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
/* Style checkboxes nicely */
input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    transform: scale(1.1);
    accent-color: green;
}

/* Align the checkbox column properly */
table th:first-child, table td:first-child {
    text-align: center;
    vertical-align: middle;
}

/* Add hover effect for rows */
.table tbody tr:hover {
    background-color: #f2fdf2; /* Light green shade */
}

/* Style for the Delete Selected button */
#deleteSelectedBtn {
    background-color: #dc3545; /* Bootstrap red */
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-right: 10px;
}

#deleteSelectedBtn:hover {
    background-color: #c82333;
}

/* Tank summary row — same visual language as beneficiary_index summary cards */
.sarp-tank-summary .summary-card {
    animation: sarpTankFadeInUp 0.6s ease-out;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
@keyframes sarpTankFadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.sarp-ben-summary-font {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.sarp-summary-metric-lg {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 900;
    font-size: clamp(2.5rem, 5.5vw, 3.25rem);
    line-height: 1.05;
    letter-spacing: 0.04em;
    font-variant-numeric: tabular-nums;
    color: #ffffff;
    text-shadow: 0 2px 0 rgba(0, 0, 0, 0.18), 0 4px 20px rgba(0, 0, 0, 0.25);
    -webkit-font-smoothing: antialiased;
}
.sarp-summary-card-title {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 800;
    font-size: 1rem;
    letter-spacing: 0.1em;
    line-height: 1.35;
    text-transform: uppercase;
    color: #ffffff;
    -webkit-font-smoothing: antialiased;
}

/* Tank module — modern page title (aligned with beneficiary_index header feel) */
.sarp-tank-page-header {
    position: relative;
    text-align: center;
    margin-bottom: 28px;
    padding: 44px 28px 48px;
    border-radius: 20px;
    overflow: hidden;
    background: linear-gradient(135deg, #0c4a6e 0%, #0e7490 42%, #0f766e 100%);
    box-shadow:
        0 10px 40px rgba(12, 74, 110, 0.38),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    animation: sarpTankHeaderIn 0.65s ease-out;
}
@keyframes sarpTankHeaderIn {
    from { opacity: 0; transform: translateY(-14px); }
    to { opacity: 1; transform: translateY(0); }
}
.sarp-tank-page-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 18% 35%, rgba(255, 255, 255, 0.14) 0%, transparent 45%),
        radial-gradient(circle at 88% 75%, rgba(20, 184, 166, 0.35) 0%, transparent 48%),
        linear-gradient(135deg, rgba(255, 255, 255, 0.06) 0%, transparent 55%);
    pointer-events: none;
}
.sarp-tank-page-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg,
        transparent 0%,
        rgba(255, 255, 255, 0.28) 22%,
        rgba(255, 255, 255, 0.55) 50%,
        rgba(255, 255, 255, 0.28) 78%,
        transparent 100%);
}
.sarp-tank-header-bg-overlay {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.09) 1px, transparent 1px);
    background-size: 28px 28px;
    animation: sarpTankHeaderGrid 22s linear infinite;
    opacity: 0.22;
    pointer-events: none;
}
@keyframes sarpTankHeaderGrid {
    0% { transform: translate(0, 0); }
    100% { transform: translate(28px, 28px); }
}
.sarp-tank-header-content {
    position: relative;
    z-index: 2;
}
.sarp-tank-header-icon-wrap {
    margin-bottom: 16px;
    display: inline-block;
    animation: sarpTankIconFloat 3.2s ease-in-out infinite;
}
@keyframes sarpTankIconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.sarp-tank-header-main-icon {
    font-size: 56px;
    color: #fff;
    text-shadow: 0 4px 18px rgba(0, 0, 0, 0.25);
    filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.2));
}
.sarp-tank-header-title {
    margin: 0;
    padding: 0;
}
.sarp-tank-header-title-text {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    display: inline-block;
    color: #ffffff;
    font-size: clamp(1.65rem, 4vw, 2.35rem);
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.28), 0 4px 14px rgba(0, 0, 0, 0.18);
    -webkit-font-smoothing: antialiased;
}
.sarp-tank-header-subtitle {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    color: rgba(255, 255, 255, 0.94);
    font-size: 1.05rem;
    margin: 14px 0 0;
    font-weight: 500;
    letter-spacing: 0.03em;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}
.sarp-tank-header-decoration {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 22px;
}
.sarp-tank-deco-line {
    width: 56px;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.55), transparent);
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.25);
}
.sarp-tank-deco-dot {
    width: 8px;
    height: 8px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 0 12px rgba(255, 255, 255, 0.5);
    animation: sarpTankDotPulse 2.2s ease-in-out infinite;
}
@keyframes sarpTankDotPulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.25); opacity: 0.85; }
}
@media (max-width: 768px) {
    .sarp-tank-page-header {
        padding: 32px 18px 38px;
        margin-bottom: 22px;
    }
    .sarp-tank-header-main-icon {
        font-size: 44px;
    }
    .sarp-tank-header-subtitle {
        font-size: 0.95rem;
    }
}
@media (prefers-reduced-motion: reduce) {
    .sarp-tank-page-header,
    .sarp-tank-header-icon-wrap,
    .sarp-tank-deco-dot {
        animation: none !important;
    }
    .sarp-tank-header-bg-overlay {
        animation: none !important;
    }
}

        /* Table filters (aligned with tank module toolbar) */
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

/* Full-screen map modal below fixed header (header uses z-index ~99999) */
body.modal-open .modal-backdrop {
    z-index: 100090 !important;
}
.feeder-map-modal {
    z-index: 100100 !important;
}
.feeder-map-modal .modal-dialog {
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 0;
    max-width: none;
    width: 100%;
    height: calc(100vh - 70px);
    transform: none !important;
}
.feeder-map-modal.show .modal-dialog {
    transform: none !important;
}
.feeder-map-modal .modal-content {
    height: 100%;
    border: none;
    border-radius: 0;
    display: flex;
    flex-direction: column;
}
.feeder-map-modal .modal-header {
    flex: 0 0 auto;
    border-bottom: 1px solid #dee2e6;
}
.feeder-map-modal .modal-body {
    flex: 1 1 auto;
    padding: 0;
    overflow: hidden;
    position: relative;
    min-height: 0;
}
#feederRoadMap {
    height: 100%;
    width: 100%;
    min-height: 320px;
    z-index: 1;
}
.leaflet-container .leaflet-popup-pane {
    z-index: 10050 !important;
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


	<a href="{{ route('feeder_road_development.index') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-arrow-left"></i> Back to list
    </a>


</div>

            <div class="container-fluid">
                <div class="sarp-tank-page-header" role="banner">
                    <div class="sarp-tank-header-bg-overlay" aria-hidden="true"></div>
                    <div class="sarp-tank-header-content">
                        <div class="sarp-tank-header-icon-wrap" aria-hidden="true">
                            <i class="fas fa-road sarp-tank-header-main-icon"></i>
                        </div>
                        <h1 class="sarp-tank-header-title">
                            <span class="sarp-tank-header-title-text">Feeder Road Development Details</span>
                        </h1>
                        <p class="sarp-tank-header-subtitle">Track feeder road progress, implementation status, and household coverage.</p>
                        <div class="sarp-tank-header-decoration" aria-hidden="true">
                            <span class="sarp-tank-deco-line"></span>
                            <span class="sarp-tank-deco-dot"></span>
                            <span class="sarp-tank-deco-line"></span>
                        </div>
                    </div>
                </div>

                <!-- Summary cards — one row on large screens (same pattern as beneficiary_index) -->
                <div class="container mt-4 sarp-tank-summary px-0 px-sm-2">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="summary-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3); height: 100%; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(102, 126, 234, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(102, 126, 234, 0.3)';">
                                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                                    <i class="fas fa-database" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Total Feeder Roads
                                </div>
                                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                                    {{ number_format($records->total()) }}
                                </div>
                                <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Count of records matching your search and filters.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="summary-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3); height: 100%; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(79, 172, 254, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(79, 172, 254, 0.3)';">
                                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                                    <i class="fas fa-hard-hat" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Ongoing
                                </div>
                                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                                    {{ number_format($ongoingCount ?? 0) }}
                                </div>
                                <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Ongoing roads in the same filtered set.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="summary-card" style="background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(67, 206, 162, 0.3); height: 100%; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(67, 206, 162, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(67, 206, 162, 0.3)';">
                                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                                    <i class="fas fa-check-circle" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Completed
                                </div>
                                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                                    {{ number_format($completedCount ?? 0) }}
                                </div>
                                <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Completed roads in the same filtered set.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="summary-card" style="background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(247, 151, 30, 0.3); height: 100%; cursor: default;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(247, 151, 30, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(247, 151, 30, 0.3)';">
                                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                                    <i class="fas fa-home" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Number of Household
                                </div>
                                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                                    {{ number_format($totalHouseholds ?? 0) }}
                                </div>
                                <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Sum of No. of Family for the same filtered set.</p>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- View Map Button -->
    <div class="row justify-content-center mt-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#mapModal" style="width: 200px;">All Feeder Roads Map<br>Sri Lanka</button>
    </div>
</div>

<!-- Map Modal: full area below app header -->
<div class="modal fade feeder-map-modal" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true">
    <div class="modal-dialog feeder-map-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title" id="mapModalLabel">Feeder Road Locations — Sri Lanka</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="feederRoadMap"></div>
            </div>
        </div>
    </div>
</div>


        <div class="right-column">

            <div class="container-fluid">


                <div class="d-flex justify-content-between mb-3">
                @if(auth()->user()->hasPermission('feeder_road_development', 'add'))
                    <a href="{{route('feeder_road_development.create')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Add Feeder Road Details</a>
                @endif
                    <a href="{{route('feeder_road_development.reportExcel')}}" class="btn btn-primary" style="background-color: green; border-color: green;">Download Excel Report</a>
                    <a href="{{route('feeder_road_development.download_template')}}" class="btn btn-outline-primary" style="border-color: green; color: green;">Download Excel Template</a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Excel upload -->
                    @if(auth()->user()->hasPermission('feeder_road_development', 'upload_csv'))
                    <form action="{{ route('feeder_road_development.upload_excel') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                        @csrf
                        <!-- <button id="deleteSelectedBtn" class="btn btn-danger" title="Delete selected tanks">
                            Delete Selected
                        </button> -->

                        <div class="form-group mr-2">
                            <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" required>
                        </div>

                        <button type="submit" class="btn btn-success">Upload Excel</button>

                    </form>
                    @endif
                    <!-- Search form -->
                    <form method="GET" action="{{ route('feeder_road_development.index') }}" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search', '') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                        @if(request('entries'))
                            <input type="hidden" name="entries" value="{{ request('entries') }}">
                        @endif
                        @foreach (['filter_tank', 'filter_completion', 'filter_ds', 'filter_asc', 'filter_gn'] as $fk)
                            @if (request()->filled($fk))
                                <input type="hidden" name="{{ $fk }}" value="{{ request($fk) }}">
                            @endif
                        @endforeach
                    </form>
                </div>

                <div class="beneficiary-filter-toolbar">
                    <div class="filter-toolbar-top">
                        <button class="btn filter-toggle-btn" type="button" data-toggle="collapse" data-target="#feederRoadFilterCollapse" aria-expanded="{{ ($activeFilterCount ?? 0) > 0 ? 'true' : 'false' }}" aria-controls="feederRoadFilterCollapse">
                            <i class="fas fa-filter"></i>
                            <span>Filters</span>
                            @if(($activeFilterCount ?? 0) > 0)
                                <span class="filter-badge">{{ $activeFilterCount }}</span>
                            @endif
                        </button>
                        <span class="filter-toolbar-hint d-none d-md-inline">Narrow the list and summaries by feeder road name, completion, and location.</span>
                    </div>
                    <div class="collapse {{ ($activeFilterCount ?? 0) > 0 ? 'show' : '' }}" id="feederRoadFilterCollapse">
                        <div class="beneficiary-filter-card">
                            <form method="GET" action="{{ route('feeder_road_development.index') }}" id="feederRoadFilterForm" class="beneficiary-filter-panel">
                                @if(request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                @if(request('entries'))
                                    <input type="hidden" name="entries" value="{{ request('entries') }}">
                                @endif
                                <div class="beneficiary-filter-row">
                                    <div class="beneficiary-filter-field beneficiary-filter-field--tank">
                                        <label class="beneficiary-filter-label" for="filter_tank"><i class="fas fa-road" aria-hidden="true"></i> Feeder road</label>
                                        <select name="filter_tank" id="filter_tank" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by feeder road name">
                                            <option value="">All roads</option>
                                            @foreach ($filterTankOptions ?? [] as $name)
                                                <option value="{{ $name }}" {{ request('filter_tank') === $name ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="beneficiary-filter-field beneficiary-filter-field--completion">
                                        <label class="beneficiary-filter-label" for="filter_completion"><i class="fas fa-check-double" aria-hidden="true"></i> Completed</label>
                                        <select name="filter_completion" id="filter_completion" class="form-control form-control-sm beneficiary-filter-select" aria-label="Filter by completion">
                                            <option value="">All types</option>
                                            <option value="completed" {{ request('filter_completion') === 'completed' ? 'selected' : '' }}>Completed</option>
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
                                        <a href="{{ route('feeder_road_development.index', request()->only(['search', 'entries'])) }}" class="btn-filter-clear">
                                            <i class="fas fa-undo mr-1"></i>Clear
                                        </a>
                                    </div>
                                </div>
                                <p class="filter-hint"><i class="fas fa-info-circle mr-1"></i>Use <strong>Completed</strong> to show only completed or ongoing works. Select <strong>DSD</strong> then <strong>Apply</strong> to refresh ASC; then <strong>ASC</strong> and <strong>Apply</strong> for GN. Filters combine (AND). Summary cards use the same filtered set.</p>
                            </form>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->hasPermission('feeder_road_development', 'delete'))
                <form id="bulkDeleteForm" action="{{ route('feeder_road_development.bulk_delete') }}" method="POST">
                    @csrf
                    <button type="submit" id="deleteSelectedBtn" class="btn btn-danger" title="Delete selected tanks">
                        Delete Selected
                    </button>
                </form>
                @endif
</br>


                <!-- Success Message Popup -->
                @if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
    });
</script>
@endif

                @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#28a745'
        }).then(() => {
            window.location.href = "{{ route('feeder_road_development.index') }}";
        });
    });
</script>
@endif





                <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="entries-container">
                                <label for="entriesSelect">Show</label>
                                <select id="entriesSelect" class="custom-select custom-select-sm form-control form-control-sm mx-2">
                                    <option value="10" {{ $records->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $records->perPage() == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ $records->perPage() == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $records->perPage() == 100 ? 'selected' : '' }}>100</option>
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
                                @if(auth()->user()->hasPermission('feeder_road_development', 'delete'))
                                    <th>
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    @endif
                                    <th>Feeder Road ID</th>
                                    <th>Feeder Road Name</th>
                                    <th>River Basin</th>
                                    <th>Cascade Name</th>
                                  <!--  <th>Province</th>
                                    <th>District</th>
                                    <th>DS Division</th>
                                    <th>GN Division</th>
                                    <th>AS Centre</th>
                                    <th>Agency</th>
                                    <th>No. of Family</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th> -->
                                    <th>Feeder Road Progress</th>
                                    <!-- <th>Contractor</th> -->
                                    <!-- <th>Open Ref No</th> New field -->
                                    <th>Awarded Date</th> <!-- New field -->
                                    <th>Cumulative Paid Amount (Rs.)</th> <!-- New field -->
                                    <!-- <th>Paid Advanced Amount</th> 
                                    <th>Recommended IPC No</th> 
                                    <th>Recommended IPC Amount</th> -->
                                    <!-- <th>Payment</th> -->
                                    <!-- <th>EOT</th> -->
                                    <!-- <th>Contract Period</th> -->
                                    <th>Implementation Status</th>
                                    <!-- <th>Remarks</th> -->
                                    <!-- <th>Image</th> -->
                                    <th style="width: 150px; background-color: #fff3cd; text-align: center;">Last Updated</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                <tr>
                                @if(auth()->user()->hasPermission('feeder_road_development', 'delete'))
                                    <td>
                                        <input type="checkbox" class="record-checkbox" name="selected_ids[]" value="{{ $record->id }}">
                                    </td>
                                    @endif

                                    <td>{{ $record->feeder_road_id }}</td>
                                    <td>{{ $record->feeder_road_name }}</td>
                                    <td>{{ $record->river_basin }}</td>
                                    <td>{{ $record->cascade_name }}</td>
                                    <td>{{ $record->feeder_road_progress }}</td>
                                    <td>{{ $record->awarded_date }}</td>
                                    <td>{{ !empty($record->cumulative_amount) && is_numeric($record->cumulative_amount) ? number_format((float) $record->cumulative_amount, 2) : 'N/A' }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td style="background-color: #fff3cd; font-size: 12px; text-align: center;">
                                        {{ \Carbon\Carbon::parse($record->updated_at)->timezone('Asia/Colombo')->format('Y-m-d H:i') }}
                                    </td>

                                    <td class="button-container">

                                    <a href="{{ route('feeder_road_development.show', $record->id) }}" class="btn btn-danger button view-button" title="View">
                                    <img src="{{ asset('assets/images/view.png') }}" alt="View Icon" style="width: 16px; height: 16px;">
                                    </a>



                                    @if(auth()->user()->hasPermission('feeder_road_development', 'edit'))
                                    <a href="/feeder_road_development/{{ $record->id }}/edit" title="Update">
                                        <button type="button" class="btn btn-success update-confirm" data-url="/feeder_road_development/{{ $record->id }}/edit" style="height: 40px; width: 120px; font-size: 16px;">
                                            Update
                                        </button>
                                    </a>
                                    @endif

                                    @if(auth()->user()->hasPermission('feeder_road_development', 'delete'))
                                    <form class="delete-form d-inline" method="POST" action="{{ route('feeder_road_development.destroy', $record->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger custom-button delete-confirm" title="Delete">
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
                                <li class="page-item {{ $records->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $records->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                @php
                                    $currentPage = $records->currentPage();
                                    $lastPage = $records->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $records->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $records->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $records->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $records->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>


                        @php
                            $currentPage = $records->currentPage();
                            $perPage = $records->perPage();
                            $total = $records->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>
                        <script>

                            $(document).ready(function () {
                                    // SweetAlert delete confirmation
                                    $(document).on('click', '.delete-confirm', function (e) {
                                        e.preventDefault();

                                        const form = $(this).closest('form');

                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to undo this delete!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit();
                                            }
                                        });
                                    });
                                });
                                // UPDATE Confirm
                            $(document).on('click', '.update-confirm', function (e) {
                                e.preventDefault();
                                const url = $(this).data('url');
                                Swal.fire({
                                    title: 'Proceed to update?',
                                    text: "Do you want to update this record?",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonColor: '#28a745',
                                    cancelButtonColor: '#6c757d',
                                    confirmButtonText: 'Yes, go ahead!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url;
                                    }
                                });
                            });


                            </script>

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


                            });
                        </script>
<script>
    $(document).ready(function () {
        var feederMap = null;
        var locations = @json($locations);

        $('#mapModal').on('shown.bs.modal', function () {
            if (!feederMap) {
                feederMap = L.map('feederRoadMap', { scrollWheelZoom: true }).setView([7.8731, 80.7718], 8);
                L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 18,
                    minZoom: 6
                }).addTo(feederMap);

                var latLngs = [];
                locations.forEach(function (loc) {
                    var lat = parseFloat(loc.latitude);
                    var lng = parseFloat(loc.longitude);
                    if (isNaN(lat) || isNaN(lng)) {
                        return;
                    }
                    latLngs.push([lat, lng]);
                    var name = loc.feeder_road_name != null ? String(loc.feeder_road_name) : '';
                    var fid = loc.feeder_road_id != null ? String(loc.feeder_road_id) : '';
                    var prog = loc.feeder_road_progress != null ? String(loc.feeder_road_progress) : '';
                    var st = loc.status != null ? String(loc.status) : '';
                    var html = '<div style="min-width:200px;"><strong>Feeder Road Name:</strong> ' + name + '<br>' +
                        '<strong>Feeder Road ID:</strong> ' + fid + '<br>' +
                        '<strong>Progress:</strong> ' + prog + '<br>' +
                        '<strong>Status:</strong> ' + st + '</div>';
                    L.marker([lat, lng]).addTo(feederMap).bindPopup(html);
                });
                if (latLngs.length > 0) {
                    var bounds = L.latLngBounds(latLngs[0], latLngs[0]);
                    latLngs.forEach(function (ll) {
                        bounds.extend(ll);
                    });
                    feederMap.fitBounds(bounds, { padding: [28, 28], maxZoom: 14 });
                }
            }
            setTimeout(function () {
                if (feederMap) {
                    feederMap.invalidateSize();
                }
            }, 200);
        });
    });
</script>
<script>
    $(document).ready(function () {
    // Select/Deselect all checkboxes
    $('#selectAll').click(function () {
        $('.record-checkbox').prop('checked', this.checked);
    });

    // Handle bulk delete
    $('#deleteSelectedBtn').click(function (e) {
        e.preventDefault(); // Prevent form submission

        let selectedIds = [];
        $('.record-checkbox:checked').each(function () {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Records Selected',
                text: 'Please select at least one record to delete.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the selected records.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform AJAX request to delete
                $.ajax({
                    url: '{{ route("feeder_road_development.bulk_delete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selectedIds
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.success,
                            confirmButtonColor: '#28a745'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong while deleting records.',
                            confirmButtonColor: '#d33'
                        });
                    }
                });
            }
        });
    });
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
