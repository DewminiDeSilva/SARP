<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Expression of Interest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .frame {
            display: flex;
            padding-top: 70px;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
            transition: flex 0.3s ease;
        }

        .left-column.hidden {
            display: none;
        }

        .card {
            background-color: #f0fdf0;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 30px;
        }

        h2 {
            color: green;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-success, .btn-danger {
            font-size: 14px;
            padding: 5px 12px;
        }

        .btn-primary {
            background-color: #1e8e1e;
            border: none;
        }

        .btn-primary:hover {
            background-color: #166d16;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 50px;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            color: #fff;
        }

        .btn-back img {
            width: 45px;
            margin-right: 5px;
            transition: transform 0.3s ease;
            z-index: 1;
        }

        .btn-back .btn-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            right: 25px;
            background-color: #1e8e1e;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            transition: opacity 0.3s ease, transform 0.3s ease;
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
            background-color: #126926;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 15px;
        }

        #sidebarToggle:hover {
            background-color: #0a4818;
        }
    </style>
</head>
<body>
@include('dashboard.header')

<div class="frame">
    <div class="left-column" id="sidebar">
        @include('dashboard.dashboardC')
    </div>

    <div class="right-column" id="mainContent">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('expressions.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back">
                <span class="btn-text">Back</span>
            </a>
        </div>

        <h2>Edit Expression of Interest</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('expressions.update', $expression->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Input Fields --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Name of the Organization</label>
                            <input type="text" class="form-control" name="organization_name" value="{{ $expression->organization_name }}" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Registration Details (if any)</label>
                            <input type="text" class="form-control" name="registration_details" value="{{ $expression->registration_details }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" value="{{ $expression->contact_person }}" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" class="form-control" name="mobile_phone" value="{{ $expression->mobile_phone }}" >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="2" >{{ $expression->address }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Telephone (Office)</label>
                            <input type="text" class="form-control" name="office_phone" value="{{ $expression->office_phone }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $expression->email }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Problem in the Marketplace</label>
                        <textarea class="form-control" name="market_problem" >{{ $expression->market_problem }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business Concept Title</label>
                        <input type="text" class="form-control" name="business_title" value="{{ $expression->business_title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business Objectives</label>
                        <textarea class="form-control" name="business_objectives" >{{ $expression->business_objectives }}</textarea>
                    </div>
                    
                    <div class="mb-3">
    <label class="form-label">Category</label>
    <input type="text" name="category" class="form-control" 
        value="{{$expression->category}}" >
</div>


                    <div class="mb-3">
    <label class="form-label">Background Information</label>
    <textarea class="form-control" name="background_info" rows="3">{{ $expression->background_info }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Project Justification</label>
    <textarea class="form-control" name="project_justification" rows="3">{{ $expression->project_justification }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Project Benefits</label>
    <textarea class="form-control" name="project_benefits" rows="3">{{ $expression->project_benefits }}</textarea>
</div>


                    {{-- Risk & Investment --}}
                    @php
                        $riskData = json_decode($expression->risk_factors, true);
                        $risks = $riskData['risks'] ?? [];
                        $mitigations = $riskData['mitigations'] ?? [];
                        $investments = json_decode($expression->investment_breakdown, true) ?? [];
                    @endphp

                    <div class="mb-4">
                        <label class="form-label">Project Risks & Mitigation</label>
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Risk</th>
                                    <th>Mitigation</th>
                                    <th><button type="button" class="btn btn-success add-risk">+</button></th>
                                </tr>
                            </thead>
                            <tbody id="risk-table">
                                @foreach ($risks as $index => $risk)
                                    <tr>
                                        <td><input type="text" name="risks[]" class="form-control" value="{{ $risk }}"></td>
                                        <td><input type="text" name="mitigations[]" class="form-control" value="{{ $mitigations[$index] ?? '' }}"></td>
                                        <td><button type="button" class="btn btn-danger remove-risk">-</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Investment Breakdown</label>
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Component</th>
                                    <th>Estimated Cost (Rs.)</th>
                                    <th><button type="button" class="btn btn-success add-investment">+</button></th>
                                </tr>
                            </thead>
                            <tbody id="investment-table">
                                @foreach ($investments as $i => $investment)
                                    <tr>
                                        <td><input type="text" name="investment_breakdown[{{ $i }}][component]" class="form-control" value="{{ $investment['component'] ?? '' }}"></td>
                                        <td><input type="number" name="investment_breakdown[{{ $i }}][cost]" class="form-control" value="{{ $investment['cost'] ?? 0 }}"></td>
                                        <td><button type="button" class="btn btn-danger remove-investment">-</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

@php
    $projectCoverage = json_decode($expression->project_coverage, true) ?? [];
    $expectedOutputs = json_decode($expression->expected_outputs, true) ?? [];
    $expectedOutcomes = json_decode($expression->expected_outcomes, true) ?? [];
    $fundingSource = json_decode($expression->funding_source, true) ?? [];
@endphp

<!-- Project Coverage -->
<div class="mb-4">
    <label class="form-label">Project Coverage</label>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Area</th>
                <th>No. of Farmers</th>
                <th>Acreage</th>
                <th><button type="button" class="btn btn-success add-coverage">+</button></th>
            </tr>
        </thead>
        <tbody id="coverage-table">
            @foreach ($projectCoverage as $index => $coverage)
                <tr>
                    <td><input type="text" name="project_coverage[{{ $index }}][area]" class="form-control" value="{{ $coverage['area'] ?? '' }}"></td>
                    <td><input type="number" name="project_coverage[{{ $index }}][farmers]" class="form-control" value="{{ $coverage['farmers'] ?? 0 }}"></td>
                    <td><input type="number" name="project_coverage[{{ $index }}][acreage]" class="form-control" value="{{ $coverage['acreage'] ?? 0 }}"></td>
                    <td><button type="button" class="btn btn-danger remove-coverage">-</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Expected Outputs -->
<div class="mb-3">
    <label class="form-label">Expected Outputs</label>
    <div id="outputs-wrapper">
        @foreach ($expectedOutputs as $output)
            <div class="input-group mb-2">
                <input type="text" name="expected_outputs[]" class="form-control" value="{{ $output }}">
                <button type="button" class="btn btn-danger remove-output">-</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-success add-output">+ Add Output</button>
</div>

<!-- Expected Outcomes -->
<div class="mb-3">
    <label class="form-label">Expected Outcomes</label>
    <div id="outcomes-wrapper">
        @foreach ($expectedOutcomes as $outcome)
            <div class="input-group mb-2">
                <input type="text" name="expected_outcomes[]" class="form-control" value="{{ $outcome }}">
                <button type="button" class="btn btn-danger remove-outcome">-</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-success add-outcome">+ Add Outcome</button>
</div>

<!-- Funding Source -->
<div class="mb-3">
    <label class="form-label">Funding Source</label>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Type</th>
                <th>Own Fund (Rs.)</th>
                <th>Credit Fund (Rs.)</th>
                <th><button type="button" class="btn btn-success add-fund">+</button></th>
            </tr>
        </thead>
        <tbody id="funding-table">
            @foreach ($fundingSource as $index => $fund)
                <tr>
                    <td><input type="text" name="funding_source[{{ $index }}][type]" class="form-control" value="{{ $fund['type'] ?? '' }}"></td>
                    <td><input type="number" name="funding_source[{{ $index }}][own]" class="form-control" value="{{ $fund['own'] ?? 0 }}"></td>
                    <td><input type="number" name="funding_source[{{ $index }}][credit]" class="form-control" value="{{ $fund['credit'] ?? 0 }}"></td>
                    <td><button type="button" class="btn btn-danger remove-fund">-</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Implementation Plan -->
<div class="mb-3">
    <label class="form-label">Upload Implementation Plan (Gantt Chart PDF)</label>
    <input type="file" class="form-control" name="implementation_plan" accept="application/pdf">

   @if ($expression->implementation_plan)
    <a href="{{ asset('uploads/implementation_plans/' . $expression->implementation_plan) }}" target="_blank" class="btn btn-sm btn-outline-primary">
        View Existing Plan
    </a>
@endif
</div>



                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JS for sidebar toggle & dynamic fields --}}
<script>
    $(document).ready(function () {
        $('#sidebarToggle').click(function () {
            $('#sidebar').toggleClass('hidden');
            $('#mainContent').css('flex', $('#sidebar').hasClass('hidden') ? '0 0 100%' : '0 0 80%');
        });

        $('.add-risk').click(function () {
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

        $('.add-investment').click(function () {
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
    let coverageIndex = {{ count($projectCoverage) }};
    $(document).on('click', '.add-coverage', function () {
        $('#coverage-table').append(`
            <tr>
                <td><input type="text" name="project_coverage[${coverageIndex}][area]" class="form-control"></td>
                <td><input type="number" name="project_coverage[${coverageIndex}][farmers]" class="form-control"></td>
                <td><input type="number" name="project_coverage[${coverageIndex}][acreage]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger remove-coverage">-</button></td>
            </tr>
        `);
        coverageIndex++;
    });

    $(document).on('click', '.remove-coverage', function () {
        $(this).closest('tr').remove();
    });

    // Expected Outputs
    $(document).on('click', '.add-output', function () {
        $('#outputs-wrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="expected_outputs[]" class="form-control">
                <button type="button" class="btn btn-danger remove-output">-</button>
            </div>
        `);
    });
    $(document).on('click', '.remove-output', function () {
        $(this).closest('.input-group').remove();
    });

    // Expected Outcomes
    
    $(document).on('click', '.add-outcome', function () {
        $('#outcomes-wrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="expected_outcomes[]" class="form-control">
                <button type="button" class="btn btn-danger remove-outcome">-</button>
            </div>
        `);
    });
    $(document).on('click', '.remove-outcome', function () {
        $(this).closest('.input-group').remove();
    });

    // Funding Source
    let fundIndex = {{ count($fundingSource) }};
    $(document).on('click', '.add-fund', function () {
        $('#funding-table').append(`
            <tr>
                <td><input type="text" name="funding_source[${fundIndex}][type]" class="form-control"></td>
                <td><input type="number" name="funding_source[${fundIndex}][own]" class="form-control"></td>
                <td><input type="number" name="funding_source[${fundIndex}][credit]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger remove-fund">-</button></td>
            </tr>
        `);
        fundIndex++;
    });
    $(document).on('click', '.remove-fund', function () {
        $(this).closest('tr').remove();
    });
});
</script>

</body>
</html>
