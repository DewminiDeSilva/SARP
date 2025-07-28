<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Youth Proposal Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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

        .custom-frame {
            background-color: rgba(0, 128, 0, 0.05);
            border: 2px solid rgba(0, 128, 0, 0.2);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header-title {
            color: green;
            text-align: center;
            margin-bottom: 30px;
        }

        .info {
            display: flex;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .info label {
            font-weight: bold;
            width: 35%;
        }

        .info p {
            width: 65%;
            margin: 0;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-secondary {
            background-color: #1e8e1e;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #166d16;
        }

        /* Back button with animation */
        .btn-back {
            display: inline-flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 50px;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
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
        .clean-list {
    background-color: transparent !important;
    padding-left: 20px;
    list-style-type: disc;
    margin: 0;
}

.clean-item {
    background-color: transparent !important;
    color: #212529; /* or customize */
    font-size: 1rem;
}

    </style>
</head>
<body>
@include('dashboard.header')

<div class="frame">
    <div class="left-column" id="sidebar">
        @include('dashboard.dashboardC')
    </div>

    <div class="right-column" style="padding:70px;" id="mainContent">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back">
                <span class="btn-text">Back</span>
            </a>
        </div>

        <h2 class="header-title">Youth Proposal Details</h2>

        <div class="custom-frame">
            <div class="info"><label>Name of the Organization:</label> <p>{{ $youth_proposal->organization_name }}</p></div>
            <div class="info"><label>Registration Details:</label> <p>{{ $youth_proposal->registration_details ?? 'N/A' }}</p></div>
            <div class="info"><label>Contact Person:</label> <p>{{ $youth_proposal->contact_person }}</p></div>
            <div class="info"><label>Address:</label> <p>{{ $youth_proposal->address }}</p></div>
            <div class="info"><label>Telephone (Office):</label> <p>{{ $youth_proposal->office_phone ?? 'N/A' }}</p></div>
            <div class="info"><label>Mobile Phone:</label> <p>{{ $youth_proposal->mobile_phone }}</p></div>
            <div class="info"><label>Email:</label> <p>{{ $youth_proposal->email ?? 'N/A' }}</p></div>
            <div class="info"><label>Problem in the Marketplace:</label> <p>{{ $youth_proposal->market_problem }}</p></div>
            <div class="info"><label>Business Concept Title:</label> <p>{{ $youth_proposal->business_title }}</p></div>
            <div class="info"><label>Business Objectives:</label> <p>{{ $youth_proposal->business_objectives }}</p></div>
            <div class="info"><label>Category:</label> <p>{{ $youth_proposal->category ?? 'N/A'}}</p></div>
            <div class="info"><label>Background Information:</label> <p>{{ $youth_proposal->background_info ?? 'N/A' }}</p></div>
            <div class="info"><label>Project Justification:</label> <p>{{ $youth_proposal->project_justification ?? 'N/A' }}</p></div>
            <div class="info"><label>Project Benefits:</label> <p>{{ $youth_proposal->project_benefits ?? 'N/A' }}</p></div>

            @php
                $coverage = json_decode($youth_proposal->project_coverage, true) ?? [];
                $outputs = $youth_proposal->expected_outputs ?? [];
                $outcomes = $youth_proposal->expected_outcomes ?? [];
                $funding = json_decode($youth_proposal->funding_source, true) ?? [];
                $assistance = json_decode($youth_proposal->assistance_required, true) ?? [];
            @endphp

            <div class="my-4">
                <h5><strong>Project Coverage</strong></h5>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>Area</th>
                            <th>No. of Farmers</th>
                            <th>Acreage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coverage as $row)
                            <tr>
                                <td>{{ $row['area'] ?? 'N/A' }}</td>
                                <td>{{ $row['farmers'] ?? '0' }}</td>
                                <td>{{ $row['acreage'] ?? '0' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3">No project coverage data</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="my-4">
                <h5><strong>Expected Outputs</strong></h5>
                <ul class="clean-list">
                    @forelse (json_decode($outputs, true) ?? [] as $output)
                        <li class="clean-item">{{ $output }}</li>
                    @empty
                        <li class="clean-item">No outputs provided</li>
                    @endforelse
                </ul>
            </div>

            <div class="my-4">
                <h5><strong>Expected Outcomes</strong></h5>
                <ul class="clean-list">
                    @forelse (json_decode($outcomes, true) ?? [] as $outcome)
                        <li class="clean-item">{{ $outcome }}</li>
                    @empty
                        <li class="clean-item">No outcomes provided</li>
                    @endforelse
                </ul>
            </div>

            @if (!empty($funding))
                <div class="my-4">
                    <h5><strong>Funding Source</strong></h5>
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>Type of Fund</th>
                                <th>Own Fund (Rs.)</th>
                                <th>Credit Fund (Rs.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funding as $fund)
                                <tr>
                                    <td>{{ $fund['type'] ?? 'N/A' }}</td>
                                    <td>{{ number_format($fund['own'] ?? 0, 2) }}</td>
                                    <td>{{ number_format($fund['credit'] ?? 0, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="info"><label>Implementation Plan (PDF)</label></div>
            @if ($youth_proposal->implementation_plan)
                <a href="{{ asset('storage/' . $youth_proposal->implementation_plan) }}" target="_blank">View PDF</a>
            @else
                <p>No file uploaded.</p>
            @endif

            <div class="my-4">
                <h5><strong>Assistance Required</strong></h5>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>Type of Assistance</th>
                            <th>SARP (Rs.)</th>
                            <th>Other (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sarpTotal = 0; $otherTotal = 0; @endphp
                        @forelse ($assistance as $assist)
                            @php
                                $sarp = $assist['sarp'] ?? 0;
                                $other = $assist['other'] ?? 0;
                                $sarpTotal += $sarp;
                                $otherTotal += $other;
                            @endphp
                            <tr>
                                <td>{{ $assist['type'] ?? 'N/A' }}</td>
                                <td>{{ number_format($sarp, 2) }}</td>
                                <td>{{ number_format($other, 2) }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3">No assistance data</td></tr>
                        @endforelse
                        @if (count($assistance))
                            <tr class="table-secondary">
                                <th>Total</th>
                                <th>{{ number_format($sarpTotal, 2) }}</th>
                                <th>{{ number_format($otherTotal, 2) }}</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @php
                $riskData = json_decode($youth_proposal->risk_factors, true);
                $risks = $riskData['risks'] ?? [];
                $mitigations = $riskData['mitigations'] ?? [];
                $investments = json_decode($youth_proposal->investment_breakdown, true) ?? [];
            @endphp

            <div class="my-4">
                <h5><strong>Project Risks & Mitigations</strong></h5>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr><th>Risk</th><th>Mitigation</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($risks as $index => $risk)
                            <tr>
                                <td>{{ $risk }}</td>
                                <td>{{ $mitigations[$index] ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2">No risks provided</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="my-4">
                <h5><strong>Investment Breakdown</strong></h5>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>Project Activity/Component</th>
                            <th>Estimated Cost (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @forelse ($investments as $investment)
                            @php $total += $investment['cost'] ?? 0; @endphp
                            <tr>
                                <td>{{ $investment['component'] ?? 'N/A' }}</td>
                                <td>{{ number_format($investment['cost'] ?? 0, 2) }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2">No investment breakdown provided</td></tr>
                        @endforelse
                        @if (count($investments))
                            <tr class="table-secondary">
                                <th>Total</th>
                                <th>{{ number_format($total, 2) }}</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('mainContent');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
        });
    });
</script>
</body>
</html>
