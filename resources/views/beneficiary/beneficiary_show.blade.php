<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Global styles - Standard 1x font sizes and smaller inputs */
        body {
            font-size: 14px !important;
        }
        
        /* Make all inputs smaller */
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="time"],
        input[type="tel"],
        input[type="url"],
        textarea,
        select,
        .form-control,
        .form-select {
            font-size: 14px !important;
            padding: 6px 10px !important;
            height: auto !important;
        }
        
        /* Standard font sizes */
        h1 { font-size: 24px !important; }
        h2 { font-size: 20px !important; }
        h3 { font-size: 18px !important; }
        h4 { font-size: 16px !important; }
        h5 { font-size: 14px !important; }
        h6 { font-size: 12px !important; }
        p, div, span, td, th, label {
            font-size: 14px !important;
        }
        
        :root {
            --primary-color: #198754;
            --primary-dark: #145c32;
            --secondary-color: #f8f9fa;
            --border-color: #dee2e6;
            --text-color: #212529;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
            --shadow-lg: 0 4px 20px rgba(0,0,0,0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }

        .frame {
            display: flex;
            min-height: 100vh;
            padding-top: 70px;
        }

        .left-column {
            flex: 0 0 20%;
            background: #ffffff;
            border-right: 3px solid var(--primary-color);
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(25, 135, 84, 0.2);
        }

        .left-column.hidden {
            display: none;
        }

        .right-column {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            background: transparent;
        }

        .page-header {
            background: #ffffff;
            color: #212529;
            padding: 30px 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 3px solid #212529;
            position: relative;
        }

        .page-header::before {
            display: none;
        }

        .page-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: 0.5px;
            color: #212529;
        }

        .page-header h2 i {
            color: #212529;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .btn-action {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: #ffffff;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
        }

        .btn-edit:hover {
            background: var(--primary-color);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.5);
        }

        .btn-print {
            background: #ffffff;
            color: #212529;
            border: 2px solid #212529;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-print:hover {
            background: #212529;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-download {
            background: #ffffff;
            color: #198754;
            border: 2px solid #198754;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
        }

        .btn-download:hover {
            background: #198754;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.5);
        }

        .info-container {
            background: #ffffff;
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            border: 2px solid #dee2e6;
        }

        .section-header {
            background: #ffffff;
            color: #212529;
            padding: 20px 35px;
            border-radius: 12px;
            margin: -50px -50px 40px -50px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 3px solid #212529;
            border-bottom: 4px solid #212529;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .section-header::before {
            display: none;
        }

        .section-header i {
            font-size: 28px;
            color: #212529;
        }

        .section-header h3 {
            margin: 0;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #212529;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .info-item {
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            border: 2px solid #dee2e6;
            transition: all 0.3s ease;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .info-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            background: #f8f9fa;
            border-color: #adb5bd;
        }

        .info-label {
            font-weight: 700;
            color: #212529;
            font-size: 21px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label::before {
            content: '';
            width: 6px;
            height: 6px;
            background: #6c757d;
            border-radius: 50%;
            display: inline-block;
        }

        .info-value {
            font-size: 30px;
            color: #212529;
            font-weight: 600;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .info-value:empty::before {
            content: "N/A";
            color: #6c757d;
            font-style: italic;
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
            margin-bottom: 20px;
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

        #sidebarToggle {
            background: #ffffff;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
        }

        #sidebarToggle:hover {
            background: var(--primary-color);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.5);
        }


        #map {
            width: 100%;
            height: 500px;
            border-radius: 10px;
        }

        .project-badge {
            display: inline-block;
            padding: 8px 20px;
            background: #e7f3ff;
            color: #0066cc;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 700;
            margin-top: 15px;
        }

        .project-info-section {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            border: 2px solid #dee2e6;
            margin-top: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .project-info-section h5 {
            font-size: 22px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .project-info-section h5 i {
            color: var(--primary-color);
            font-size: 24px;
        }

        .family-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #dee2e6;
        }

        .family-table thead {
            background: #f8f9fa;
            color: #212529;
        }

        .family-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #dee2e6;
            color: #212529;
        }

        .family-table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            color: #212529;
        }

        .family-table tbody tr:hover {
            background: #e9ecef;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary-sm {
            background: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary-sm:hover {
            background: var(--primary-dark);
            color: white;
        }

        .btn-danger-sm {
            background: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger-sm:hover {
            background: #c82333;
            color: white;
        }

        .alert {
            padding: 20px 25px;
            font-size: 16px;
            border-radius: 10px;
            border-left: 5px solid;
            border-top: 2px solid var(--primary-color);
            border-right: 2px solid var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border-color: #ffc107;
        }

        .btn-action {
            font-size: 16px;
            padding: 12px 25px;
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .right-column {
                padding: 20px;
            }
            
            .info-container {
                padding: 30px 20px;
            }

            .page-header {
                flex-direction: column;
                gap: 15px;
                padding: 25px 20px;
            }

            .page-header h2 {
                font-size: 24px;
            }

            .section-header {
                padding: 15px 20px;
                margin: -30px -20px 30px -20px;
            }

            .section-header h3 {
                font-size: 20px;
            }

            .info-item {
                padding: 20px;
                min-height: 100px;
            }

            .info-label {
                font-size: 18px;
            }

            .info-value {
                font-size: 24px;
            }
        }

        .readonly-badge {
            display: inline-block;
            padding: 8px 15px;
            background: #e9ecef;
            color: #212529;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            border: 2px solid var(--primary-color);
        }

        /* Print Styles for A4 - One Page */
        @media print {
            @page {
                size: A4;
                margin: 0.5cm;
            }

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            body {
                background: white !important;
                font-size: 8pt;
                padding: 0;
                margin: 0;
            }

            /* Hide header and navigation */
            body > header,
            body > nav,
            .navbar,
            [class*="header"]:not(.page-header):not(.section-header),
            .left-column,
            .btn-back,
            #sidebarToggle,
            .action-buttons,
            .btn-action,
            .d-flex.align-items-center,
            .frame > div:first-child {
                display: none !important;
            }

            .frame {
                padding-top: 0 !important;
                display: block !important;
            }

            .right-column {
                padding: 0 !important;
                width: 100% !important;
                margin: 0 !important;
            }

            .page-header {
                page-break-after: avoid;
                margin-bottom: 8px !important;
                padding: 8px 10px !important;
                border: 2px solid #000 !important;
            }

            .page-header h2 {
                font-size: 12pt !important;
                margin: 0 !important;
            }

            .info-container {
                page-break-inside: avoid;
                margin-bottom: 8px !important;
                padding: 8px !important;
                border: 1px solid #000 !important;
                box-shadow: none !important;
            }

            .section-header {
                margin: -8px -8px 6px -8px !important;
                padding: 5px 10px !important;
                border: 2px solid #000 !important;
            }

            .section-header h3 {
                font-size: 10pt !important;
                margin: 0 !important;
            }

            .section-header i {
                font-size: 10pt !important;
            }

            .info-grid {
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 4px !important;
                margin-bottom: 0 !important;
            }

            .info-item {
                padding: 4px 6px !important;
                min-height: auto !important;
                margin-bottom: 0 !important;
                border: 1px solid #ccc !important;
                page-break-inside: avoid;
            }

            .info-label {
                font-size: 6pt !important;
                margin-bottom: 2px !important;
            }

            .info-value {
                font-size: 7pt !important;
                line-height: 1.2 !important;
            }

            .project-info-section {
                margin-top: 6px !important;
                padding: 6px !important;
                border: 1px solid #ccc !important;
            }

            .project-info-section h5 {
                font-size: 8pt !important;
                margin-bottom: 4px !important;
            }

            .project-info-section .info-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 4px !important;
            }

            .map-container {
                display: none !important;
            }

            .family-table {
                font-size: 6pt !important;
                margin-top: 6px !important;
            }

            .family-table th,
            .family-table td {
                padding: 3px !important;
                font-size: 6pt !important;
            }

            .alert {
                display: none !important;
            }

            /* Force single page */
            .info-container,
            .page-header {
                page-break-inside: avoid;
                page-break-after: avoid;
            }

            /* Compact spacing */
            .info-container:last-child {
                margin-bottom: 0 !important;
            }
        }

        .map-container {
            border: 2px solid #dee2e6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Black border style for Beneficiary Information - Part 1 heading */
        .section-header-black {
            background: #ffffff !important;
            border: 3px solid #212529 !important;
            border-bottom: 4px solid #212529 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
        }

        .section-header-black::before {
            display: none !important;
        }

        .section-header-black i {
            color: #212529 !important;
        }

        .section-header-black h3 {
            color: #212529 !important;
        }
</style>
</head>
<body>
@include('dashboard.header')
    
    <div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
    </div>
        
    <div class="right-column">
    <div class="d-flex align-items-center mb-3">
                <button id="sidebarToggle" class="btn">
		<i class="fas fa-bars"></i>
	</button>
    <a href="{{ route('beneficiary.index') }}" class="btn-back">
                    <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>

            <div class="page-header">
                <h2><i class="fas fa-user me-2"></i>{{ $beneficiary->name_with_initials ?? 'Beneficiary' }} - Details</h2>
                <div class="action-buttons">
                    <button onclick="window.print()" class="btn-action btn-print">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button onclick="downloadBeneficiaryDetails()" class="btn-action btn-download">
                        <i class="fas fa-download"></i> Download
                    </button>
                    @if(auth()->user()->hasPermission('beneficiary', 'edit'))
                        <a href="{{ route('beneficiary.edit', $beneficiary->id) }}" class="btn-action btn-edit" onclick="return confirm('Are you sure you want to edit this beneficiary?')">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    @endif
                </div>
            </div>

            <!-- SECTION 1: BENEFICIARY INFORMATION - PART 1 -->
            <div class="info-container">
                <div class="section-header section-header-black">
                    <i class="fas fa-user"></i>
                    <h3>Beneficiary Information - Part 1</h3>
                                    </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">ID</div>
                        <div class="info-value">#{{ $beneficiary->id }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">NIC Number</div>
                        <div class="info-value">{{ $beneficiary->nic ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Name with Initials</div>
                        <div class="info-value">{{ $beneficiary->name_with_initials ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Gender</div>
                        <div class="info-value">{{ ucfirst($beneficiary->gender ?? 'N/A') }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value">{{ $beneficiary->dob ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Age</div>
                        <div class="info-value">{{ $beneficiary->age ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Email address</div>
                        <div class="info-value">{{ $beneficiary->email ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Phone Numbers</div>
                        <div class="info-value">{{ $beneficiary->phone ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Address</div>
                        <div class="info-value">{{ $beneficiary->address ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Highest Education Level</div>
                        <div class="info-value">{{ $beneficiary->education ?? 'N/A' }}</div>
                    </div>
                                    </div>

                <!-- Project Type Information -->
                <div class="project-info-section">
                    <h5><i class="fas fa-project-diagram"></i>Project Information</h5>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Type of Project</div>
                            <div class="info-value">
                                {{ ucfirst($beneficiary->project_type ?? 'N/A') }}
                            </div>
                        </div>

                        @if ($beneficiary->project_type === 'Resilience Project' || $beneficiary->project_type === 'resilience')
                            <div class="info-item">
                                <div class="info-label">Agriculture/Livestock</div>
                                <div class="info-value">{{ ucfirst($beneficiary->input1 ?? 'N/A') }}</div>
                            </div>
                            @if ($beneficiary->input1 === 'agriculture')
                                <div class="info-item">
                                    <div class="info-label">Crop Category</div>
                                    <div class="info-value">{{ $beneficiary->input2 ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Crop Name</div>
                                    <div class="info-value">{{ $beneficiary->input3 ?? 'N/A' }}</div>
                                </div>
                            @elseif ($beneficiary->input1 === 'livestock')
                                <div class="info-item">
                                    <div class="info-label">Livestock Type</div>
                                    <div class="info-value">{{ $beneficiary->input2 ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Production Focus</div>
                                    <div class="info-value">{{ $beneficiary->input3 ?? 'N/A' }}</div>
                                </div>
                            @endif
                        @elseif ($beneficiary->project_type === 'Youth Enterprise' || $beneficiary->project_type === 'youth')
                            <div class="info-item">
                                <div class="info-label">Youth Enterprises Project Name</div>
                                <div class="info-value">{{ $beneficiary->input3 ?? 'N/A' }}</div>
                            </div>
                        @elseif ($beneficiary->project_type === '4P Projects' || $beneficiary->project_type === '4p')
                            <div class="info-item">
                                <div class="info-label">4P Project - Business Concept Title</div>
                                <div class="info-value">{{ $beneficiary->input2 ?? $beneficiary->eoi_business_title ?? 'N/A' }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">4P Project Category</div>
                                <div class="info-value">{{ $beneficiary->input3 ?? $beneficiary->eoi_category ?? 'N/A' }}</div>
                            </div>
                        @elseif ($beneficiary->project_type === 'Nutrition Programs' || $beneficiary->project_type === 'nutrition')
                            <div class="info-item">
                                <div class="info-label">Nutrition Program Name</div>
                                <div class="info-value">{{ $beneficiary->input3 ?? 'N/A' }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                                    </div>

            <!-- SECTION 2: BENEFICIARY INFORMATION - PART 2 -->
            <div class="info-container">
                <div class="section-header section-header-black">
                    <i class="fas fa-user"></i>
                    <h3>Beneficiary Information - Part 2</h3>
                                    </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Number of Family Members</div>
                        <div class="info-value">{{ $beneficiary->number_of_family_members ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Head of Householder Name</div>
                        <div class="info-value">{{ $beneficiary->head_of_householder_name ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Number of Householder in Common Area</div>
                        <div class="info-value">{{ $beneficiary->householder_number ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Income Source</div>
                        <div class="info-value">{{ $beneficiary->income_source ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Average Income</div>
                        <div class="info-value">{{ $beneficiary->average_income ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Monthly Household Expenses</div>
                        <div class="info-value">{{ $beneficiary->monthly_household_expenses ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Household Level Assets</div>
                        <div class="info-value">{{ $beneficiary->household_level_assets_description ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Type of Water Resource</div>
                        <div class="info-value">{{ $beneficiary->type_of_water_resource ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Community-Based Organization</div>
                        <div class="info-value">{{ $beneficiary->community_based_organization ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Training Details</div>
                        <div class="info-value">{{ $beneficiary->training_details_description ?? 'N/A' }}</div>
                                    </div>

                    <div class="info-item">
                        <div class="info-label">Land Ownership (Total Extent)</div>
                        <div class="info-value">{{ $beneficiary->land_ownership_total_extent ?? 'N/A' }}</div>
</div>

                    <div class="info-item">
                        <div class="info-label">Proposed Cultivation Area</div>
                        <div class="info-value">{{ $beneficiary->land_ownership_proposed_cultivation_area ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: BENEFICIARY LOCATION - PART 1 -->
            <div class="info-container">
                <div class="section-header section-header-black">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Beneficiary Location - Part 1</h3>
            </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Tank Name</div>
                        <div class="info-value">{{ $beneficiary->tank_name ?? 'N/A' }}</div>
        </div>
                    
                    <div class="info-item">
                        <div class="info-label">Province Name</div>
                        <div class="info-value">{{ $beneficiary->province_name ?? 'N/A' }}</div>
            </div>
                    
                    <div class="info-item">
                        <div class="info-label">District Name</div>
                        <div class="info-value">{{ $beneficiary->district_name ?? 'N/A' }}</div>
            </div>
                    
                    <div class="info-item">
                        <div class="info-label">Divisional Secretariat Division (DSD)</div>
                        <div class="info-value">{{ $beneficiary->ds_division_name ?? 'N/A' }}</div>
        </div>
                    
                    <div class="info-item">
                        <div class="info-label">Grama Niladhari Division (GND)</div>
                        <div class="info-value">{{ $beneficiary->gn_division_name ?? 'N/A' }}</div>
        </div>
        </div>
    </div>

            <!-- SECTION 4: BENEFICIARY LOCATION - PART 2 -->
            <div class="info-container">
                <div class="section-header section-header-black">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Beneficiary Location - Part 2</h3>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Agriculture Service Centre (ASC)</div>
                        <div class="info-value">{{ $beneficiary->as_center ?? 'N/A' }}</div>
        </div>
                    
                    <div class="info-item">
                        <div class="info-label">Cascade Name</div>
                        <div class="info-value">{{ $beneficiary->cascade_name ?? 'N/A' }}</div>
        </div>
                    
                    <div class="info-item">
                        <div class="info-label">Agrarian Instructor Division (AID)</div>
                        <div class="info-value">{{ $beneficiary->ai_division ?? 'N/A' }}</div>
    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Latitude</div>
                        <div class="info-value" id="latitude">{{ $beneficiary->latitude ?? 'N/A' }}</div>
        </div>
                    
                    <div class="info-item">
                        <div class="info-label">Longitude</div>
                        <div class="info-value" id="longitude">{{ $beneficiary->longitude ?? 'N/A' }}</div>
        </div>
    </div>

                @if ($beneficiary->latitude && $beneficiary->longitude)
                    <div class="map-container mt-4">
                        <div id="map"></div>
        </div>
                    <div class="mt-4 text-center">
                        <a href="https://www.google.com/maps?q={{ $beneficiary->latitude }},{{ $beneficiary->longitude }}" 
                           target="_blank" 
                           class="btn-action btn-edit">
                            <i class="fas fa-external-link-alt"></i> Open in Google Maps
                        </a>
        </div>
                @else
                    <div class="alert alert-warning mt-4" style="font-size: 16px; padding: 20px;">
                        <i class="fas fa-exclamation-triangle me-2"></i><strong>Location coordinates not available</strong>
    </div>
@endif
            </div>

            <!-- SECTION 5: BENEFICIARY BANK INFORMATION -->
            <div class="info-container">
                <div class="section-header section-header-black">
                    <i class="fas fa-university"></i>
                    <h3>Beneficiary Bank Information</h3>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Bank Name</div>
                        <div class="info-value">{{ $beneficiary->bank_name ?? 'N/A' }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Bank Branch</div>
                        <div class="info-value">{{ $beneficiary->bank_branch ?? 'N/A' }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Account Number</div>
                        <div class="info-value">{{ $beneficiary->account_number ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>

            <!-- Family Members Section -->
            @if($beneficiary->families && $beneficiary->families->count() > 0)
                <div class="info-container">
                    <div class="section-header">
                        <i class="fas fa-users"></i>
                        <h3>Family Members</h3>
                </div>

                    <table class="family-table">
                            <thead>
                                <tr>
                                    <th>Name with Initials</th>
                                    <th>NIC</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Youth</th>
                                    <th>Education</th>
                                    <th>Income Source</th>
                                    <th>Income</th>
                                    <th>Nutrition Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($beneficiary->families as $familyMember)
                                <tr>
                                    <td>{{ $familyMember->name_with_initials ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->nic ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->phone ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($familyMember->gender ?? 'N/A') }}</td>
                                    <td>{{ $familyMember->dob ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->youth ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->education ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->income_source ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->income ?? 'N/A' }}</td>
                                    <td>{{ $familyMember->nutrition_level ?? 'N/A' }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                        @if(auth()->user()->hasPermission('family', 'edit'))
                                                <a href="/family/{{ $familyMember->id }}/edit" class="btn-sm btn-primary-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                        @endif
                                        @if(auth()->user()->hasPermission('family', 'delete'))
                                                <form action="/family/{{ $familyMember->id }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn-sm btn-danger-sm" onclick="return confirm('Are you sure you want to delete this family member?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                            </form>
                                            @endif
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            @endif
        </div>
    </div>

<script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            const sidebar = document.querySelector('.left-column');
            sidebar.classList.toggle('hidden');
        });

        // Initialize map if coordinates are available
    document.addEventListener("DOMContentLoaded", function () {
            const latitude = parseFloat(document.getElementById("latitude")?.innerText);
            const longitude = parseFloat(document.getElementById("longitude")?.innerText);

            if (latitude && longitude && !isNaN(latitude) && !isNaN(longitude)) {
                const map = L.map("map").setView([latitude, longitude], 13);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 18,
            attribution: '© OpenStreetMap contributors',
        }).addTo(map);

            L.marker([latitude, longitude])
                .addTo(map)
                .bindPopup("Beneficiary Location")
                .openPopup();
        } else {
            document.getElementById("map").innerHTML =
                    "<div style='display: flex; align-items: center; justify-content: center; height: 100%; color: #6c757d;'><i class='fas fa-map-marker-alt' style='font-size: 48px;'></i><p style='margin-left: 15px;'>Location not available</p></div>";
            }
    });

        // Download Beneficiary Details as PDF
        function downloadBeneficiaryDetails() {
            // Hide elements that shouldn't be in the print
            const originalDisplay = {
                sidebar: document.querySelector('.left-column').style.display,
                buttons: document.querySelector('.action-buttons').style.display,
                backButton: document.querySelector('.btn-back')?.style.display
            };

            // Hide non-printable elements
            document.querySelector('.left-column').style.display = 'none';
            document.querySelector('.action-buttons').style.display = 'none';
            if (document.querySelector('.btn-back')) {
                document.querySelector('.btn-back').style.display = 'none';
            }
            if (document.getElementById('sidebarToggle')) {
                document.getElementById('sidebarToggle').style.display = 'none';
            }

            // Trigger print dialog
            window.print();

            // Restore elements after print
            setTimeout(() => {
                document.querySelector('.left-column').style.display = originalDisplay.sidebar || '';
                document.querySelector('.action-buttons').style.display = originalDisplay.buttons || '';
                if (document.querySelector('.btn-back')) {
                    document.querySelector('.btn-back').style.display = originalDisplay.backButton || '';
                }
                if (document.getElementById('sidebarToggle')) {
                    document.getElementById('sidebarToggle').style.display = '';
                }
            }, 500);
        }
</script>
</body>
</html>
