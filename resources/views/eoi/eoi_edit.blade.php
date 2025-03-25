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
                <form action="{{ route('expressions.update', $expression->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Input Fields --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Name of the Organization</label>
                            <input type="text" class="form-control" name="organization_name" value="{{ $expression->organization_name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Registration Details (if any)</label>
                            <input type="text" class="form-control" name="registration_details" value="{{ $expression->registration_details }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" value="{{ $expression->contact_person }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" class="form-control" name="mobile_phone" value="{{ $expression->mobile_phone }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="2" required>{{ $expression->address }}</textarea>
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
                        <textarea class="form-control" name="market_problem" required>{{ $expression->market_problem }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business Concept Title</label>
                        <input type="text" class="form-control" name="business_title" value="{{ $expression->business_title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business Objectives</label>
                        <textarea class="form-control" name="business_objectives" required>{{ $expression->business_objectives }}</textarea>
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

                    {{-- Textareas --}}
                    @foreach ([
                        'background_info' => 'Background Information',
                        'project_justification' => 'Project Justification',
                        'project_benefits' => 'Project Benefits',
                        'project_coverage' => 'Project Coverage',
                        'expected_outputs' => 'Expected Outputs',
                        'expected_outcomes' => 'Expected Outcomes',
                        'funding_source' => 'Funding Source',
                        'implementation_plan' => 'Implementation Plan',
                        'assistance_required' => 'Assistance Required'
                    ] as $field => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <textarea class="form-control" name="{{ $field }}">{{ $expression->$field }}</textarea>
                        </div>
                    @endforeach

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
</body>
</html>
