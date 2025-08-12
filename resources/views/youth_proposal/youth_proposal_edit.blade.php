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
            color: #343a40;
        }

        #sidebarToggle {
            background-color: #126926;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #sidebarToggle:hover {
            background-color: #0a4818;
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
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>    
        </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
            <h3 style="font-size: 2rem; color: green;">Youth Proposal Edit</h3>


            <form action="{{ route('youth-proposals.update', $proposal->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')

                <!-- Form fields here -->
                <!-- Keep all your existing form fields as-is below -->

                {{-- Your existing fields go here (unchanged) --}}
                <!-- ... All form fields from previous version ... -->

                  <div class="mb-3">
                      <label class="form-label">Name of the Organization</label>
                      <input type="text" class="form-control" name="organization_name" value="{{ old('organization_name', $proposal->organization_name) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Registration Details (if any)</label>
                      <input type="text" class="form-control" name="registration_details" value="{{ old('registration_details', $proposal->registration_details) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Contact Person</label>
                      <input type="text" class="form-control" name="contact_person" value="{{ old('contact_person', $proposal->contact_person) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" name="address">{{ old('address', $proposal->address) }}</textarea>
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Telephone (Office)</label>
                      <input type="text" class="form-control" name="office_phone" value="{{ old('office_phone', $proposal->office_phone) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Mobile Phone</label>
                      <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone', $proposal->mobile_phone) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email', $proposal->email) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Name of the value changing</label>
                      <textarea class="form-control" name="market_problem">{{ old('market_problem', $proposal->market_problem) }}</textarea>
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Business Concept Title</label>
                      <input type="text" class="form-control" name="business_title" value="{{ old('business_title', $proposal->business_title) }}">
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Business Objectives</label>
                      <textarea class="form-control" name="business_objectives">{{ old('business_objectives', $proposal->business_objectives) }}</textarea>
                  </div>
                      
                  <div class="mb-3">
                      <label class="form-label">Category</label>
                      <input type="text" name="category" class="form-control" value="{{ old('category', $proposal->category) }}">
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
                    
                {{-- ✅ Expected Outputs --}}
                @php
                    $outputs = json_decode($proposal->expected_outputs, true) ?? [];
                @endphp
                <div class="mb-3">
                    <label class="form-label">Expected Outputs</label>
                    <div id="outputs-wrapper">
                        @if(empty($outputs))
                            <div class="input-group mb-2">
                                <input type="text" name="expected_outputs[]" class="form-control" placeholder="Enter expected output">
                                <button type="button" class="btn btn-success add-output">+</button>
                            </div>
                        @else
                            @foreach($outputs as $i => $out)
                                <div class="input-group mb-2">
                                    <input type="text" name="expected_outputs[]" class="form-control"
                                           value="{{ old("expected_outputs.$i", $out) }}" placeholder="Enter expected output">
                                    @if($i === 0)
                                        <button type="button" class="btn btn-success add-output">+</button>
                                    @else
                                        <button type="button" class="btn btn-danger remove-field">-</button>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                    
                {{-- ✅ Expected Outcomes --}}
                @php
                    $outcomes = json_decode($proposal->expected_outcomes, true) ?? [];
                @endphp
                <div class="mb-3">
                    <label class="form-label">Expected Outcomes</label>
                    <div id="outcomes-wrapper">
                        @if(empty($outcomes))
                            <div class="input-group mb-2">
                                <input type="text" name="expected_outcomes[]" class="form-control" placeholder="Enter expected outcome">
                                <button type="button" class="btn btn-success add-outcome">+</button>
                            </div>
                        @else
                            @foreach($outcomes as $i => $out)
                                <div class="input-group mb-2">
                                    <input type="text" name="expected_outcomes[]" class="form-control"
                                           value="{{ old("expected_outcomes.$i", $out) }}" placeholder="Enter expected outcome">
                                    @if($i === 0)
                                        <button type="button" class="btn btn-success add-outcome">+</button>
                                    @else
                                        <button type="button" class="btn btn-danger remove-field">-</button>
                                    @endif
                                </div>
                            @endforeach
                        @endif
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
                    
                {{-- ✅ Implementation Plan (PDF Upload) --}}
                <div class="mb-3">
                    <label class="form-label">Upload Implementation Plan (Gantt Chart PDF)</label>
                    @if(!empty($proposal->implementation_plan))
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $proposal->implementation_plan) }}" target="_blank">View current implementation plan</a>
                        </div>
                    @endif
                    <input type="file" name="implementation_plan" class="form-control">
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
                    
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4 px-4">Update</button>
                </div>


            </form>
        </div>
    </div>
</div>

<!-- Sidebar toggle logic -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
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
