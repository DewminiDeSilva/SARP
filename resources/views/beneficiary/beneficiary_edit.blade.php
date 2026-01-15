<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Beneficiary</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
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
            padding: 8px 12px !important;
            height: auto !important;
            min-height: 38px !important;
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .frame {
            display: flex;
            min-height: 100vh;
            padding-top: 70px;
        }

        .left-column {
            flex: 0 0 20%;
            background: #fff;
            border-right: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .left-column.hidden {
            display: none;
        }

        .right-column {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 30px 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: var(--shadow-lg);
        }

        .page-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 32px;
            letter-spacing: 0.5px;
        }

        .form-container {
            background: white;
            border-radius: 15px;
            padding: 50px;
            box-shadow: var(--shadow-lg);
            margin-bottom: 40px;
        }

        .section-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 20px 35px;
            border-radius: 12px;
            margin: -50px -50px 40px -50px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-header i {
            font-size: 28px;
        }

        .section-header h3 {
            margin: 0;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
        }

        .form-label {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-label.required::after {
            content: " *";
            color: #dc3545;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 8px 12px;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
            min-height: 38px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
            outline: none;
        }

        .form-control:disabled,
        .form-select:disabled {
            background-color: #e9ecef;
            opacity: 0.7;
            cursor: not-allowed;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .form-check:hover {
            background: #f8f9fa;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .form-check-label {
            font-weight: 500;
            cursor: pointer;
            margin: 0;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 15px 50px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        #sidebarToggle:hover {
            background: var(--primary-dark);
        }

        .info-badge {
            display: inline-block;
            padding: 5px 12px;
            background: #e7f3ff;
            color: #0066cc;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }

        .readonly-field {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            color: #6c757d;
        }

        .form-check {
            padding: 15px;
            font-size: 16px;
        }

        .form-check-label {
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .right-column {
                padding: 20px;
            }
            
            .form-container {
                padding: 30px 20px;
            }

            .page-header {
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

            .form-control,
            .form-select {
                font-size: 16px;
                padding: 12px 15px;
            }
        }

        .card-section {
            background: #f8f9fa;
            border-left: 5px solid var(--primary-color);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .form-group.has-icon .form-control {
            padding-right: 45px;
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
                <h2><i class="fas fa-user-edit me-2"></i>Edit Beneficiary Information</h2>
            </div>

            <form action="{{ route('beneficiary.update', $beneficiary->id) }}" method="POST" enctype="multipart/form-data" id="beneficiaryForm">
                @csrf
                @method('PUT')

                <!-- SECTION 1: BENEFICIARY LOCATION -->
                <div class="form-container">
                    <div class="section-header">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Beneficiary Location</h3>
                    </div>

                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tankDropdown" class="form-label">Tank Name</label>
                                <select id="tankDropdown" class="form-select" name="tank_name" disabled>
                                    <option selected>{{ $beneficiary->tank_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="tank_name" value="{{ $beneficiary->tank_name }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="provinceDropdown" class="form-label">Province Name</label>
                                <select id="provinceDropdown" class="form-select" name="province_name" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->province_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="province_name" value="{{ $beneficiary->province_name }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="districtDropdown" class="form-label">District Name</label>
                                <select class="form-select" id="districtDropdown" name="district_name" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->district_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="district_name" value="{{ $beneficiary->district_name }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="dsDivisionDropdown" class="form-label">Divisional Secretariat Division (DSD)</label>
                                <select class="form-select" id="dsDivisionDropdown" name="ds_division_name" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->ds_division_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="ds_division_name" value="{{ $beneficiary->ds_division_name }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="gnDropdown" class="form-label">Grama Niladhari Division (GND)</label>
                                <select class="form-select" id="gnDropdown" name="gn_division_name" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->gn_division_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="gn_division_name" value="{{ $beneficiary->gn_division_name }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="ascDropdown" class="form-label">Agriculture Service Centre (ASC)</label>
                                <select class="form-select" id="ascDropdown" name="as_center" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->as_center ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="as_center" value="{{ $beneficiary->as_center }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="cascadeDropdown" class="form-label">Cascade Name</label>
                                <select class="form-select" id="cascadeDropdown" name="cascade_name" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option selected>{{ $beneficiary->cascade_name ?? 'N/A' }}</option>
                                </select>
                                <input type="hidden" name="cascade_name" value="{{ $beneficiary->cascade_name }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="ai_division" class="form-label">Agrarian Instructor Division (AID)</label>
                                <input type="text" class="form-control" id="ai_division" name="ai_division" value="{{ $beneficiary->ai_division ?? '' }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $beneficiary->latitude ?? '' }}" placeholder="Enter Latitude" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $beneficiary->longitude ?? '' }}" placeholder="Enter Longitude" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: BENEFICIARY INFORMATION -->
                <div class="form-container">
                    <div class="section-header">
                        <i class="fas fa-user"></i>
                        <h3>Beneficiary Information</h3>
                    </div>

                    <div class="form-section">
                        <!-- Project Type Display -->
                        <div class="card-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Type of Project</label>
                                    <input type="text" class="form-control readonly-field" value="{{ $beneficiary->project_type ?? 'N/A' }}" readonly>
                                </div>
                            </div>

                            @if ($beneficiary->project_type === 'resilience')
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Agriculture/Livestock</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input1 ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                @if ($beneficiary->input1 === 'agriculture')
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Crop Category</label>
                                            <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input2 ?? 'N/A' }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Crop Name</label>
                                            <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input3 ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                @elseif ($beneficiary->input1 === 'livestock')
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Livestock Type</label>
                                            <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input2 ?? 'N/A' }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Production Focus</label>
                                            <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input3 ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                @endif
                            @elseif ($beneficiary->project_type === 'youth')
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Youth Enterprises Project Name</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input3 ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                            @elseif ($beneficiary->project_type === '4p')
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">4P Project - Business Concept Title</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $beneficiary->eoi_business_title ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">4P Project Category</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $beneficiary->eoi_category ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                            @elseif ($beneficiary->project_type === 'nutrition')
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Nutrition Program Name</label>
                                        <input type="text" class="form-control readonly-field" value="{{ $beneficiary->input1 ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Personal Information -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nic" class="form-label">NIC Number</label>
                                <input type="text" class="form-control" id="nic" name="nic" value="{{ $beneficiary->nic }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="name_with_initials" class="form-label">Name with Initials</label>
                                <input type="text" class="form-control" id="name_with_initials" name="name_with_initials" value="{{ $beneficiary->name_with_initials }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="{{ $beneficiary->dob }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control readonly-field" id="age" name="age" value="{{ $beneficiary->age }}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $beneficiary->gender == 'male' ? 'checked' : '' }} {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $beneficiary->gender == 'female' ? 'checked' : '' }} {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ $beneficiary->gender == 'other' ? 'checked' : '' }} {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                            @if($beneficiary->project_type === '4p')
                                <input type="hidden" name="gender" value="{{ $beneficiary->gender }}">
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="education" class="form-label">Highest Education Level</label>
                                <select class="form-select" id="education" name="education" {{ $beneficiary->project_type === '4p' ? 'disabled' : '' }}>
                                    <option value="{{ $beneficiary->education }}" selected>{{ $beneficiary->education }}</option>
                                </select>
                                @if($beneficiary->project_type === '4p')
                                    <input type="hidden" name="education" value="{{ $beneficiary->education }}">
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $beneficiary->email }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Numbers</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $beneficiary->phone }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $beneficiary->address }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="number_of_family_members" class="form-label">Number of Family Members</label>
                                <input type="number" class="form-control" id="number_of_family_members" name="number_of_family_members" value="{{ $beneficiary->number_of_family_members }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="head_of_householder_name" class="form-label">Head of Householder Name</label>
                                <input type="text" class="form-control" id="head_of_householder_name" name="head_of_householder_name" value="{{ $beneficiary->head_of_householder_name }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="householder_number" class="form-label">Number of Householder in Common Area</label>
                                <input type="text" class="form-control" id="householder_number" name="householder_number" value="{{ $beneficiary->householder_number }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="type_of_water_resource" class="form-label">Type of Water Resource</label>
                                <input type="text" class="form-control" id="type_of_water_resource" name="type_of_water_resource" value="{{ $beneficiary->type_of_water_resource }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="land_ownership_total_extent" class="form-label">Land Ownership (Total Extent)</label>
                                <input type="text" class="form-control" id="land_ownership_total_extent" name="land_ownership_total_extent" value="{{ $beneficiary->land_ownership_total_extent }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="land_ownership_proposed_cultivation_area" class="form-label">Proposed Cultivation Area</label>
                                <input type="text" class="form-control" id="land_ownership_proposed_cultivation_area" name="land_ownership_proposed_cultivation_area" value="{{ $beneficiary->land_ownership_proposed_cultivation_area }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="income_source" class="form-label">Income Source</label>
                                <input type="text" class="form-control" id="income_source" name="income_source" value="{{ $beneficiary->income_source }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="average_income" class="form-label">Average Income</label>
                                <input type="text" class="form-control" id="average_income" name="average_income" value="{{ $beneficiary->average_income }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="monthly_household_expenses" class="form-label">Monthly Household Expenses</label>
                                <input type="text" class="form-control" id="monthly_household_expenses" name="monthly_household_expenses" value="{{ $beneficiary->monthly_household_expenses }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="household_level_assets_description" class="form-label">Household Level Assets Description</label>
                                <input type="text" class="form-control" id="household_level_assets_description" name="household_level_assets_description" value="{{ $beneficiary->household_level_assets_description }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="community_based_organization" class="form-label">Community-Based Organization</label>
                                <input type="text" class="form-control" id="community_based_organization" name="community_based_organization" value="{{ $beneficiary->community_based_organization }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="training_details_description" class="form-label">Training Details Description</label>
                                <input type="text" class="form-control" id="training_details_description" name="training_details_description" value="{{ $beneficiary->training_details_description }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: BENEFICIARY BANK INFORMATION -->
                <div class="form-container">
                    <div class="section-header">
                        <i class="fas fa-university"></i>
                        <h3>Beneficiary Bank Information</h3>
                    </div>

                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $beneficiary->bank_name }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                            
                            <div class="form-group">
                                <label for="bank_branch" class="form-label">Bank Branch</label>
                                <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="{{ $beneficiary->bank_branch }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $beneficiary->account_number }}" {{ $beneficiary->project_type === '4p' ? 'readonly' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save me-2"></i>Update Beneficiary
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function() {
            $("#dob").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0',
                changeYear: true,
                yearRange: '-100:+0',
                onSelect: function() {
                    calculateAge();
                }
            });

            function calculateAge() {
                var dob = $("#dob").datepicker("getDate");
                if (dob) {
                    var today = new Date();
                    var age = today.getFullYear() - dob.getFullYear();
                    var m = today.getMonth() - dob.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }
                    $("#age").val(age);
                }
            }

            if ($("#dob").val()) {
                calculateAge();
            }
        });

        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            const sidebar = document.querySelector('.left-column');
            const content = document.querySelector('.right-column');
            sidebar.classList.toggle('hidden');
        });

        // Form submission with AJAX
        $('#beneficiaryForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: 'PUT',
                data: formData,
                success: function(response) {
                    alert('Beneficiary updated successfully!');
                    window.location.href = '/beneficiary';
                },
                error: function(xhr) {
                    alert('Error updating beneficiary. Please try again.');
                    console.error(xhr.responseText);
                }
            });
        });

        // Dynamic dropdowns (if needed)
        $(document).ready(function() {
            $.get('/tanks', function(data) {
                $.each(data, function(index, tank) {
                    $('#tankDropdown').append($('<option>', {
                        value: tank.tank_name,
                        text: tank.tank_name
                    }));
                });
            });

            $.get('/asc', function(data) {
                $.each(data, function(index, asc) {
                    $('#ascDropdown').append($('<option>', {
                        value: asc.asc_name,
                        text: asc.asc_name
                    }));
                });
            });

            $.get('/cascades', function(data) {
                $.each(data, function(index, cascade) {
                    $('#cascadeDropdown').append($('<option>', {
                        value: cascade.cascade_name,
                        text: cascade.cascade_name
                    }));
                });
            });
        });
    </script>
</body>
</html>
