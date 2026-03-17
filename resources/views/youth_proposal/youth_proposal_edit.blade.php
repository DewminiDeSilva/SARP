<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Proposal Edit</title>

    <!-- CSS & JS Libraries -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
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
            transition: flex 0.3s ease, padding 0.3s ease;
        }

        .left-column.hidden {
            display: none;
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

        .custom-border {
            border-color: darkgreen !important;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.125rem;
            margin-bottom: 8px;
        }

        #sidebarToggle {
            background-color: #126926;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #sidebarToggle:hover { background-color: #0a4818; }
        .yp-frame-wrap { max-width: 100%; margin: 0 auto; padding: 16px; background: linear-gradient(180deg, #f8fafc 0%, #f5f7fb 100%); border-radius: 16px; }
        .yp-form-card { background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 6px 24px rgba(18,105,38,0.06); border: 1px solid rgba(18,105,38,0.1); padding: 32px 40px; }
        .yp-title { font-size: 1.75rem; font-weight: 700; color: #1e293b; margin-bottom: 28px; padding-bottom: 14px; border-bottom: 3px solid #126926; text-align: center; letter-spacing: -0.02em; }
        .yp-submit-wrap { margin-top: 2rem; display: flex; justify-content: center; align-items: center; }
        .yp-label { font-weight: 600; color: #1e293b; font-size: 1.125rem; margin-bottom: 8px; display: block; }
        .yp-input { border-radius: 10px; border: 1px solid #e2e8f0; padding: 10px 14px; transition: border-color .2s, box-shadow .2s; }
        .yp-input:focus { border-color: #126926; box-shadow: 0 0 0 3px rgba(18,105,38,0.15); outline: none; }
        .yp-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
        .yp-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 992px) { .yp-row-3 { grid-template-columns: 1fr 1fr; } .yp-row-2 { grid-template-columns: 1fr; } }
        @media (max-width: 576px) { .yp-row-3 { grid-template-columns: 1fr; } }
        .yp-field { margin-bottom: 18px; }
        .yp-radio-group { display: flex; gap: 12px; flex-wrap: wrap; }
        .yp-radio-group .yp-radio-option {
            position: relative; display: flex; align-items: center; justify-content: center;
            min-width: 140px; padding: 12px 20px; border: 2px solid #e2e8f0; border-radius: 10px;
            background: #fff; cursor: pointer; transition: border-color .2s, background .2s, box-shadow .2s;
            font-weight: 600; color: #475569;
        }
        .yp-radio-group .yp-radio-option:hover { border-color: #cbd5e1; background: #f8fafc; }
        .yp-radio-group input { position: absolute; opacity: 0; width: 0; height: 0; }
        .yp-radio-group .yp-radio-wrap { margin: 0; cursor: pointer; }
        .yp-radio-group input:checked + .yp-radio-option { border-color: #126926; background: rgba(18,105,38,0.08); color: #126926; box-shadow: 0 0 0 1px #126926; }
        .yp-radio-group-wrap { display: flex; justify-content: center; align-items: center; }
        .yp-required::after { content: ' *'; color: #dc2626; }
        .yp-error { font-size: 0.8125rem; color: #dc2626; margin-top: 4px; }
        .yp-input.is-invalid { border-color: #dc2626; }
        .yp-compact .yp-form-card { padding: 20px 28px; }
        .yp-compact .yp-field { margin-bottom: 12px; }
        .yp-compact .yp-section-title { margin: 16px 0 10px; }
        .yp-section-title { font-size: 1.25rem; font-weight: 700; color: #126926; margin: 24px 0 14px; }
        .yp-age-display { font-weight: 600; color: #126926; padding: 8px 12px; background: rgba(18,105,38,0.08); border-radius: 8px; }
        .yp-pdf-row { display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px; align-items: end; margin-bottom: 12px; }
        .yp-btn-add { background: #126926; color: #fff; border: none; border-radius: 8px; padding: 6px 14px; font-weight: 600; }
        .yp-btn-remove { background: #dc3545; color: #fff; border: none; border-radius: 6px; padding: 4px 10px; }
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
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>    
        </div>

        <div class="yp-frame-wrap yp-compact">
        <div class="yp-form-card">
            <h3 class="yp-title">Youth Proposal Edit</h3>
            <form action="{{ route('youth-proposals.update', $proposal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-danger py-2 px-3 mb-3" role="alert" style="border-radius:10px;font-size:0.9rem;">
                        <strong>Please correct the errors below.</strong>
                        <ul class="mb-0 mt-1 ps-3">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
                    </div>
                @endif

                <div class="yp-row-2">
                    <div class="yp-field">
                        <label class="yp-label yp-required">Name of the Youth</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('organization_name') ? 'is-invalid' : '' }}" name="organization_name" value="{{ old('organization_name', $proposal->organization_name) }}">
                        @error('organization_name') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label yp-required">Nature of the Business</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('business_title') ? 'is-invalid' : '' }}" name="business_title" value="{{ old('business_title', $proposal->business_title) }}">
                        @error('business_title') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="yp-field">
                    <label class="yp-label">New Business / Existing Business</label>
                    <div class="yp-radio-group-wrap">
                        <div class="yp-radio-group" role="radiogroup">
                            <label class="yp-radio-wrap">
                                <input type="radio" name="business_type" value="New Business" {{ old('business_type', $proposal->business_type) == 'New Business' ? 'checked' : '' }}>
                                <span class="yp-radio-option">New Business</span>
                            </label>
                            <label class="yp-radio-wrap">
                                <input type="radio" name="business_type" value="Existing Business" {{ old('business_type', $proposal->business_type) == 'Existing Business' ? 'checked' : '' }}>
                                <span class="yp-radio-option">Existing Business</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">NIC Number</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('nic_number') ? 'is-invalid' : '' }}" name="nic_number" value="{{ old('nic_number', $proposal->nic_number) }}" placeholder="NIC">
                        @error('nic_number') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Birth date</label>
                        <input type="date" class="form-control yp-input {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" name="birth_date" id="birth_date" value="{{ old('birth_date', $proposal->birth_date ? $proposal->birth_date->format('Y-m-d') : '') }}" title="mm/dd/yyyy">
                        @error('birth_date') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Age</label>
                        <div id="age_display" class="yp-age-display">@if($proposal->birth_date){{ $proposal->birth_date->age }} years @else — years @endif</div>
                    </div>
                </div>
                <div class="yp-field">
                    <label class="yp-label">Address</label>
                    <textarea class="form-control yp-input" name="address" rows="2">{{ old('address', $proposal->address) }}</textarea>
                </div>
                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">Telephone (Office)</label>
                        <input type="text" class="form-control yp-input" name="office_phone" value="{{ old('office_phone', $proposal->office_phone) }}">
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Mobile Phone Number</label>
                        <input type="text" class="form-control yp-input" name="mobile_phone" value="{{ old('mobile_phone', $proposal->mobile_phone) }}">
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Email</label>
                        <input type="email" class="form-control yp-input" name="email" value="{{ old('email', $proposal->email) }}">
                    </div>
                </div>
                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">Market Analysis</label>
                        <textarea class="form-control yp-input {{ $errors->has('market_problem') ? 'is-invalid' : '' }}" name="market_problem" rows="2">{{ old('market_problem', $proposal->market_problem) }}</textarea>
                        @error('market_problem') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Business Objectives</label>
                        <textarea class="form-control yp-input {{ $errors->has('business_objectives') ? 'is-invalid' : '' }}" name="business_objectives" rows="2">{{ old('business_objectives', $proposal->business_objectives) }}</textarea>
                        @error('business_objectives') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Category</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" value="{{ old('category', $proposal->category) }}">
                        @error('category') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                      
                  {{-- Risks & Mitigations --}}
                  @php
                      $riskFactors = json_decode($proposal->risk_factors, true);
                      $risks = $riskFactors['risks'] ?? [''];
                      $mitigations = $riskFactors['mitigations'] ?? [''];
                  @endphp
                      
                  <div class="mb-3">
                      <label class="form-label">Project Risks & Mitigation</label>
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Risk</th>
                                  <th>Mitigation Measure</th>
                                  <th><button type="button" class="btn btn-success add-risk">+</button></th>
                              </tr>
                          </thead>
                          <tbody id="risk-table">
                              @foreach($risks as $index => $risk)
                                  <tr>
                                      <td><input type="text" name="risks[]" class="form-control" value="{{ old('risks.' . $index, $risk) }}"></td>
                                      <td><input type="text" name="mitigations[]" class="form-control" value="{{ old('mitigations.' . $index, $mitigations[$index] ?? '') }}"></td>
                                      <td><button type="button" class="btn btn-danger remove-risk">-</button></td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>

                {{-- Investment Breakdown --}}
                @php
                    $investments = json_decode($proposal->investment_breakdown, true) ?? [['component' => '', 'cost' => '']];
                @endphp

                <div class="mb-3">
                    <label class="form-label">Total Investment and Breakdown</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Project Activity/Component</th>
                                <th>Estimated Cost (Rs.)</th>
                                <th><button type="button" class="btn btn-success add-investment">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="investment-table">
                            @foreach($investments as $i => $investment)
                                <tr>
                                    <td><input type="text" name="investment_breakdown[{{ $i }}][component]" class="form-control" value="{{ old('investment_breakdown.' . $i . '.component', $investment['component']) }}"></td>
                                    <td><input type="number" name="investment_breakdown[{{ $i }}][cost]" class="form-control" value="{{ old('investment_breakdown.' . $i . '.cost', $investment['cost']) }}"></td>
                                    <td><button type="button" class="btn btn-danger remove-investment">-</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <label class="form-label">Background information</label>
                    <textarea class="form-control" name="background_info">{{ old('background_info', $proposal->background_info) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project Justification</label>
                    <textarea class="form-control" name="project_justification">{{ old('project_justification', $proposal->project_justification) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project Benefits</label>
                    <textarea class="form-control" name="project_benefits">{{ old('project_benefits', $proposal->project_benefits) }}</textarea>
                </div>


                {{-- ✅ Project Coverage Table --}}
                @php
                    $coverage = json_decode($proposal->project_coverage, true) ?? [];
                @endphp
                <div class="mb-3">
                    <label class="form-label">Project Coverage</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Area</th>
                                <th>No. of Farmers</th>
                                <th>Acreage</th>
                                <th><button type="button" class="btn btn-success add-coverage">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="coverage-table">
                            @if(empty($coverage))
                                <tr>
                                    <td><input type="text" name="project_coverage[0][area]" class="form-control"></td>
                                    <td><input type="number" name="project_coverage[0][farmers]" class="form-control"></td>
                                    <td><input type="number" name="project_coverage[0][acreage]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger remove-coverage">-</button></td>
                                </tr>
                            @else
                                @foreach($coverage as $i => $row)
                                    <tr>
                                        <td>
                                            <input type="text" name="project_coverage[{{ $i }}][area]" class="form-control"
                                                   value="{{ old("project_coverage.$i.area", $row['area'] ?? '') }}">
                                        </td>
                                        <td>
                                            <input type="number" name="project_coverage[{{ $i }}][farmers]" class="form-control"
                                                   value="{{ old("project_coverage.$i.farmers", $row['farmers'] ?? '') }}">
                                        </td>
                                        <td>
                                            <input type="number" name="project_coverage[{{ $i }}][acreage]" class="form-control"
                                                   value="{{ old("project_coverage.$i.acreage", $row['acreage'] ?? '') }}">
                                        </td>
                                        <td><button type="button" class="btn btn-danger remove-coverage">-</button></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                    
                    
                <!-- <div class="mb-3">
                    <label class="form-label">Expected Outputs</label>
                    <textarea class="form-control" name="expected_outputs"></textarea>
                </div> -->
                    
                {{-- Expected Outputs | Expected Outcomes (one row) --}}
                @php
                    $outputs = json_decode($proposal->expected_outputs, true) ?? [];
                    $outcomes = json_decode($proposal->expected_outcomes, true) ?? [];
                @endphp
                <div class="yp-row-2">
                    <div class="yp-field">
                        <div class="yp-section-title">Expected Outputs</div>
                        <div id="outputs-wrapper">
                            @if(empty($outputs))
                                <div class="input-group mb-2">
                                    <input type="text" name="expected_outputs[]" class="form-control yp-input" placeholder="Expected output">
                                    <button type="button" class="btn yp-btn-add add-output">+</button>
                                </div>
                            @else
                                @foreach($outputs as $i => $out)
                                    <div class="input-group mb-2">
                                        <input type="text" name="expected_outputs[]" class="form-control yp-input" value="{{ old("expected_outputs.$i", $out) }}" placeholder="Expected output">
                                        @if($i === 0)
                                            <button type="button" class="btn yp-btn-add add-output">+</button>
                                        @else
                                            <button type="button" class="btn yp-btn-remove remove-field">−</button>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="yp-field">
                        <div class="yp-section-title">Expected Outcomes</div>
                        <div id="outcomes-wrapper">
                            @if(empty($outcomes))
                                <div class="input-group mb-2">
                                    <input type="text" name="expected_outcomes[]" class="form-control yp-input" placeholder="Expected outcome">
                                    <button type="button" class="btn yp-btn-add add-outcome">+</button>
                                </div>
                            @else
                                @foreach($outcomes as $i => $out)
                                    <div class="input-group mb-2">
                                        <input type="text" name="expected_outcomes[]" class="form-control yp-input" value="{{ old("expected_outcomes.$i", $out) }}" placeholder="Expected outcome">
                                        @if($i === 0)
                                            <button type="button" class="btn yp-btn-add add-outcome">+</button>
                                        @else
                                            <button type="button" class="btn yp-btn-remove remove-field">−</button>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                    
                {{-- ✅ Funding Source Table --}}
                @php
                    $funding = json_decode($proposal->funding_source, true) ?? [];
                @endphp
                <div class="mb-3">
                    <label class="form-label">Funding Source</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type of Fund</th>
                                <th>Own Fund (Rs.)</th>
                                <th>Credit Fund (Rs.)</th>
                                <th>
                                    <button type="button" class="btn btn-success add-fund">+</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="funding-table">
                            @if(empty($funding))
                                <tr>
                                    <td><input type="text" name="funding_source[0][type]" class="form-control"></td>
                                    <td><input type="number" name="funding_source[0][own]" class="form-control"></td>
                                    <td><input type="number" name="funding_source[0][credit]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger remove-fund">-</button></td>
                                </tr>
                            @else
                                @foreach($funding as $i => $row)
                                    <tr>
                                        <td><input type="text" name="funding_source[{{ $i }}][type]" class="form-control"
                                                   value="{{ old("funding_source.$i.type", $row['type'] ?? '') }}"></td>
                                        <td><input type="number" name="funding_source[{{ $i }}][own]" class="form-control"
                                                   value="{{ old("funding_source.$i.own", $row['own'] ?? '') }}"></td>
                                        <td><input type="number" name="funding_source[{{ $i }}][credit]" class="form-control"
                                                   value="{{ old("funding_source.$i.credit", $row['credit'] ?? '') }}"></td>
                                        <td><button type="button" class="btn btn-danger remove-fund">-</button></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                    
                <div class="yp-section-title">Upload Implementation Plan (Gantt Chart PDF)</div>
                <div class="yp-field">
                    @php $existingPlans = is_array($proposal->implementation_plans) ? $proposal->implementation_plans : (json_decode($proposal->implementation_plans, true) ?? []); @endphp
                    @if(!empty($existingPlans))
                        <p class="mb-2"><strong>Existing PDFs:</strong></p>
                        @foreach($existingPlans as $i => $plan)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . ($plan['path'] ?? $plan)) }}" target="_blank">{{ $plan['name'] ?? 'Plan ' . ($i+1) }}</a>
                            </div>
                        @endforeach
                    @elseif($proposal->implementation_plan)
                        <p class="mb-2"><a href="{{ asset('storage/' . $proposal->implementation_plan) }}" target="_blank">View current PDF</a></p>
                    @endif
                    <div id="pdf-rows-edit">
                        <div class="yp-pdf-row">
                            <div>
                                <label class="yp-label">Name</label>
                                <input type="text" class="form-control yp-input" name="implementation_plan_names[]" placeholder="Plan name">
                            </div>
                            <div>
                                <label class="yp-label">Upload PDF</label>
                                <input type="file" class="form-control yp-input" name="implementation_plan_files[]" accept=".pdf">
                            </div>
                            <div><button type="button" class="btn yp-btn-add add-pdf-row-edit">+ Add PDF</button></div>
                        </div>
                    </div>
                </div>
                    
                {{-- ✅ Assistance Required Table --}}
                @php
                    $assist = json_decode($proposal->assistance_required, true) ?? [];
                @endphp
                <div class="mb-3">
                    <label class="form-label">Assistance Required</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type of Assistance</th>
                                <th>SARP (Rs.)</th>
                                <th>Other (Rs.)</th>
                                <th>
                                    <button type="button" class="btn btn-success add-assistance">+</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="assistance-table">
                            @if(empty($assist))
                                <tr>
                                    <td><input type="text" name="assistance_required[0][type]" class="form-control"></td>
                                    <td><input type="number" name="assistance_required[0][sarp]" class="form-control"></td>
                                    <td><input type="number" name="assistance_required[0][other]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger remove-assistance">-</button></td>
                                </tr>
                            @else
                                @foreach($assist as $i => $row)
                                    <tr>
                                        <td><input type="text" name="assistance_required[{{ $i }}][type]" class="form-control"
                                                   value="{{ old("assistance_required.$i.type", $row['type'] ?? '') }}"></td>
                                        <td><input type="number" name="assistance_required[{{ $i }}][sarp]" class="form-control"
                                                   value="{{ old("assistance_required.$i.sarp", $row['sarp'] ?? '') }}"></td>
                                        <td><input type="number" name="assistance_required[{{ $i }}][other]" class="form-control"
                                                   value="{{ old("assistance_required.$i.other", $row['other'] ?? '') }}"></td>
                                        <td><button type="button" class="btn btn-danger remove-assistance">-</button></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                    
                <div class="yp-submit-wrap">
                    <button type="submit" class="btn btn-success px-4 py-2" style="border-radius:12px;font-weight:600;">Update</button>
                </div>


            </form>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
        });
        var birthInput = document.getElementById('birth_date');
        var ageDisplay = document.getElementById('age_display');
        if (birthInput && ageDisplay) {
            function updateAge() {
                var val = birthInput.value;
                if (!val) return;
                var birth = new Date(val);
                var today = new Date();
                var age = today.getFullYear() - birth.getFullYear();
                var m = today.getMonth() - birth.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
                ageDisplay.textContent = age + ' years';
            }
            birthInput.addEventListener('change', updateAge);
            birthInput.addEventListener('input', updateAge);
        }
        document.querySelectorAll('.add-pdf-row-edit').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var row = document.createElement('div');
                row.className = 'yp-pdf-row';
                row.innerHTML = '<div><label class="yp-label">Name</label><input type="text" class="form-control yp-input" name="implementation_plan_names[]" placeholder="Plan name"></div><div><label class="yp-label">Upload PDF</label><input type="file" class="form-control yp-input" name="implementation_plan_files[]" accept=".pdf"></div><div><button type="button" class="btn yp-btn-remove remove-pdf-row">− Remove</button></div>';
                document.getElementById('pdf-rows-edit').appendChild(row);
            });
        });
        document.getElementById('pdf-rows-edit').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-pdf-row')) e.target.closest('.yp-pdf-row').remove();
        });
    });
</script>

<!-- Form logic (Add/Remove rows) -->
<script>
    $(document).ready(function () {
        $('.add-risk').on('click', function () {
            $('#risk-table').append(`
                <tr>
                    <td><input type="text" name="risks[]" class="form-control"></td>
                    <td><input type="text" name="mitigations[]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger remove-risk">-</button></td>
                </tr>
            `);
        });

        $(document).on('click', '.remove-risk', function () {
            $(this).closest('tr').remove();
        });

        $('.add-investment').on('click', function () {
            let index = $('#investment-table tr').length;
            $('#investment-table').append(`
                <tr>
                    <td><input type="text" name="investment_breakdown[${index}][component]" class="form-control"></td>
                    <td><input type="number" name="investment_breakdown[${index}][cost]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger remove-investment">-</button></td>
                </tr>
            `);
        });

        $(document).on('click', '.remove-investment', function () {
            $(this).closest('tr').remove();
        });
    });
</script>
<script>
$(document).ready(function () {
    // Project Coverage
    $('.add-coverage').on('click', function () {
        let index = $('#coverage-table tr').length;
        $('#coverage-table').append(`
            <tr>
                <td><input type="text" name="project_coverage[${index}][area]" class="form-control" required></td>
                <td><input type="number" name="project_coverage[${index}][farmers]" class="form-control" required></td>
                <td><input type="number" name="project_coverage[${index}][acreage]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger remove-coverage">-</button></td>
            </tr>
        `);
    });

    $(document).on('click', '.remove-coverage', function () {
        $(this).closest('tr').remove();
    });

    // Expected Outputs
    $('.add-output').on('click', function () {
        $('#outputs-wrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="expected_outputs[]" class="form-control" placeholder="Enter expected output" required>
                <button type="button" class="btn btn-danger remove-field">-</button>
            </div>
        `);
    });

    // Expected Outcomes
    $('.add-outcome').on('click', function () {
        $('#outcomes-wrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="expected_outcomes[]" class="form-control" placeholder="Enter expected outcome" required>
                <button type="button" class="btn btn-danger remove-field">-</button>
            </div>
        `);
    });

    $(document).on('click', '.remove-field', function () {
        $(this).closest('.input-group').remove();
    });

    // Funding Source
    $('.add-fund').on('click', function () {
        let index = $('#funding-table tr').length;
        $('#funding-table').append(`
            <tr>
                <td><input type="text" name="funding_source[${index}][type]" class="form-control"></td>
                <td><input type="number" name="funding_source[${index}][own]" class="form-control"></td>
                <td><input type="number" name="funding_source[${index}][credit]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger remove-fund">-</button></td>
            </tr>
        `);
    });

    $(document).on('click', '.remove-fund', function () {
        $(this).closest('tr').remove();
    });

    // Assistance Required
    $('.add-assistance').on('click', function () {
        let index = $('#assistance-table tr').length;
        $('#assistance-table').append(`
            <tr>
                <td><input type="text" name="assistance_required[${index}][type]" class="form-control" required></td>
                <td><input type="number" name="assistance_required[${index}][sarp]" class="form-control" required></td>
                <td><input type="number" name="assistance_required[${index}][other]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger remove-assistance">-</button></td>
            </tr>
        `);
    });

    $(document).on('click', '.remove-assistance', function () {
        $(this).closest('tr').remove();
    });
});
</script>


</body>
</html>
