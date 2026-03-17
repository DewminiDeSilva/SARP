<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Youth Proposal Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --yp-primary: #126926;
            --yp-primary-dark: #0d4d1f;
            --yp-primary-light: rgba(18, 105, 38, 0.08);
            --yp-border: #e2e8f0;
            --yp-text: #1e293b;
            --yp-muted: #64748b;
            --yp-bg: #f8fafc;
            --yp-card: #fff;
            --yp-radius: 12px;
            --yp-radius-sm: 8px;
            --yp-shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 12px rgba(18,105,38,0.06);
            --yp-shadow-sm: 0 1px 2px rgba(0,0,0,.04);
        }

        body {
            background: linear-gradient(180deg, #f1f5f9 0%, #e2e8f0 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--yp-text);
        }

        .frame { display: flex; padding-top: 70px; min-height: 100vh; }
        .left-column { flex: 0 0 20%; border-right: 1px solid var(--yp-border); background: var(--yp-card); }
        .right-column { flex: 0 0 80%; padding: 24px; transition: flex 0.3s ease; }
        .left-column.hidden { display: none; }

        .yp-frame-wrap {
            max-width: 100%;
            margin: 0 auto;
            padding: 24px;
            background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 20px;
            box-shadow: var(--yp-shadow-sm);
        }

        .custom-frame.yp-show-frame {
            background: var(--yp-card);
            border: 1px solid rgba(18, 105, 38, 0.1);
            border-radius: 20px;
            padding: 32px 40px;
            box-shadow: var(--yp-shadow);
        }

        .header-title {
            color: var(--yp-primary);
            text-align: center;
            margin-bottom: 28px;
            font-weight: 800;
            font-size: 1.85rem;
            letter-spacing: -0.02em;
            text-shadow: 0 1px 2px rgba(0,0,0,.04);
        }

        /* Info rows - card style */
        .yp-show-frame .info {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 12px 16px;
            margin-bottom: 2px;
            background: #fafbfc;
            border-radius: var(--yp-radius-sm);
            border: 1px solid transparent;
            transition: background .2s, border-color .2s;
        }
        .yp-show-frame .info:hover { background: var(--yp-primary-light); border-color: rgba(18,105,38,0.12); }
        .yp-show-frame .info label {
            font-weight: 600;
            color: var(--yp-muted);
            font-size: 0.8125rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            min-width: 140px;
            flex-shrink: 0;
        }
        .yp-show-frame .info p {
            margin: 0;
            font-size: 0.9375rem;
            color: var(--yp-text);
            line-height: 1.5;
        }

        .yp-show-frame .yp-section-title {
            font-size: 1.125rem;
            color: var(--yp-primary);
            font-weight: 700;
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--yp-primary);
            letter-spacing: -0.01em;
        }

        .yp-show-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; margin-bottom: 4px; }
        .yp-show-row-3 .info { margin-bottom: 0; }
        .yp-show-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .yp-show-row-2 > div {
            background: #fafbfc;
            border-radius: var(--yp-radius);
            padding: 16px 20px;
            border: 1px solid var(--yp-border);
        }
        .yp-show-row-2 h5 { color: var(--yp-primary); font-size: 1rem; margin-bottom: 12px; font-weight: 700; }

        .yp-show-center {
            text-align: center;
            padding: 14px 16px;
            margin-bottom: 4px;
            background: linear-gradient(135deg, var(--yp-primary-light) 0%, rgba(18,105,38,0.04) 100%);
            border-radius: var(--yp-radius-sm);
            border: 1px solid rgba(18,105,38,0.15);
        }
        .yp-show-center label { font-weight: 600; color: var(--yp-muted); font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 0.03em; margin-right: 8px; }
        .yp-show-center strong { color: var(--yp-primary); font-size: 1rem; }

        .yp-compact .info { padding: 10px 14px; }
        .yp-compact .custom-frame.yp-show-frame { padding: 24px 32px; }

        /* Section blocks */
        .yp-show-frame .my-4 {
            margin-top: 28px !important;
            margin-bottom: 28px !important;
            padding: 20px 24px;
            background: #fafbfc;
            border-radius: var(--yp-radius);
            border: 1px solid var(--yp-border);
        }
        .yp-show-frame .my-4 h5 {
            color: var(--yp-primary);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 14px;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(18,105,38,0.2);
        }

        /* Tables */
        .yp-show-frame .table {
            border-radius: var(--yp-radius-sm);
            overflow: hidden;
            box-shadow: var(--yp-shadow-sm);
            font-size: 0.9rem;
        }
        .yp-show-frame .table thead th {
            background: linear-gradient(180deg, var(--yp-primary) 0%, var(--yp-primary-dark) 100%);
            color: #fff;
            font-weight: 600;
            padding: 12px 16px;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-size: 0.8125rem;
        }
        .yp-show-frame .table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            border-color: var(--yp-border);
        }
        .yp-show-frame .table tbody tr:nth-child(even) { background: #f8fafc; }
        .yp-show-frame .table tbody tr:hover { background: var(--yp-primary-light); }
        .yp-show-frame .table-secondary th { background: #e2e8f0; color: var(--yp-text); font-size: 0.9rem; }

        /* Lists */
        .clean-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        .clean-item {
            padding: 8px 0 8px 20px;
            position: relative;
            color: var(--yp-text);
            font-size: 0.9375rem;
            line-height: 1.5;
            border-bottom: 1px solid #f1f5f9;
        }
        .clean-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: var(--yp-primary);
            border-radius: 50%;
        }

        /* Implementation Plan – PDF format with icon */
        .yp-pdf-section .yp-pdf-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
        .yp-pdf-item {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            background: #fff;
            border: 2px solid var(--yp-border);
            border-radius: var(--yp-radius);
            color: var(--yp-text);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 600;
            transition: border-color .2s, background .2s, box-shadow .2s, transform .1s;
        }
        .yp-pdf-item:hover {
            border-color: var(--yp-primary);
            background: var(--yp-primary-light);
            box-shadow: 0 4px 12px rgba(18,105,38,0.15);
            transform: translateY(-2px);
        }
        .yp-pdf-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #fff;
            border-radius: var(--yp-radius-sm);
            font-size: 1.25rem;
        }
        .yp-pdf-item:hover .yp-pdf-icon {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        }
        .yp-pdf-name { flex: 1; color: inherit; }
        .yp-pdf-badge {
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 4px 8px;
            background: rgba(220, 38, 38, 0.12);
            color: #b91c1c;
            border-radius: 6px;
        }
        .yp-pdf-item:hover .yp-pdf-badge {
            background: rgba(220, 38, 38, 0.2);
        }
        .yp-pdf-empty {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            color: var(--yp-muted);
            font-size: 0.9375rem;
        }
        .yp-pdf-empty i { font-size: 1.25rem; }

        /* Buttons */
        .btn-secondary {
            background: var(--yp-primary);
            border: none;
            color: #fff;
            padding: 10px 16px;
            border-radius: var(--yp-radius-sm);
            font-weight: 600;
            transition: background .2s;
        }
        .btn-secondary:hover { background: var(--yp-primary-dark); color: #fff; }

        .btn-back {
            display: inline-flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 24px;
            border-radius: var(--yp-radius-sm);
            overflow: hidden;
            position: relative;
            background: var(--yp-primary);
            font-weight: 600;
            transition: background .2s;
        }
        .btn-back:hover { background: var(--yp-primary-dark); color: #fff; }
        .btn-back img { width: 45px; margin-right: 5px; transition: transform 0.3s ease; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background: var(--yp-primary-dark); color: white; padding: 4px 8px; border-radius: 4px; transition: opacity 0.3s, transform 0.3s; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }

        #sidebarToggle {
            background: var(--yp-primary);
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: var(--yp-radius-sm);
            cursor: pointer;
            margin-right: 12px;
            transition: background .2s;
        }
        #sidebarToggle:hover { background: var(--yp-primary-dark); }

        @media (max-width: 992px) {
            .yp-show-row-3 { grid-template-columns: 1fr 1fr; }
            .yp-show-row-2 { grid-template-columns: 1fr; }
        }
        @media (max-width: 576px) {
            .yp-show-row-3 { grid-template-columns: 1fr; }
            .custom-frame.yp-show-frame { padding: 20px 24px; }
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

        <div class="yp-frame-wrap yp-compact">
        <div class="custom-frame yp-show-frame">
            <div class="yp-section-title">Youth Proposal Details</div>
            <div class="info"><label>Name of the Youth:</label> <p>{{ $youth_proposal->organization_name }}</p></div>
            <div class="info"><label>Nature of the Business:</label> <p>{{ $youth_proposal->business_title ?? 'N/A' }}</p></div>
            <div class="yp-show-center"><label>Business Type:</label> <strong>{{ $youth_proposal->business_type ?? 'N/A' }}</strong></div>
            <div class="yp-show-row-3">
                <div class="info"><label>NIC Number:</label> <p>{{ $youth_proposal->nic_number ?? 'N/A' }}</p></div>
                <div class="info"><label>Birth Date:</label> <p>{{ $youth_proposal->birth_date ? $youth_proposal->birth_date->format('m/d/Y') : 'N/A' }}</p></div>
                <div class="info"><label>Age:</label> <p>@if($youth_proposal->birth_date) {{ $youth_proposal->birth_date->age }} years @else N/A @endif</p></div>
            </div>
            <div class="info"><label>Address:</label> <p>{{ $youth_proposal->address ?? 'N/A' }}</p></div>
            <div class="yp-show-row-3">
                <div class="info"><label>Telephone (Office):</label> <p>{{ $youth_proposal->office_phone ?? 'N/A' }}</p></div>
                <div class="info"><label>Mobile Phone:</label> <p>{{ $youth_proposal->mobile_phone ?? 'N/A' }}</p></div>
                <div class="info"><label>Email:</label> <p>{{ $youth_proposal->email ?? 'N/A' }}</p></div>
            </div>
            <div class="yp-show-row-3">
                <div class="info"><label>Market Analysis:</label> <p>{{ $youth_proposal->market_problem ?? 'N/A' }}</p></div>
                <div class="info"><label>Business Objectives:</label> <p>{{ $youth_proposal->business_objectives ?? 'N/A' }}</p></div>
                <div class="info"><label>Category:</label> <p>{{ $youth_proposal->category ?? 'N/A' }}</p></div>
            </div>
            <div class="info"><label>Registration Details:</label> <p>{{ $youth_proposal->registration_details ?? 'N/A' }}</p></div>
            <div class="info"><label>Contact Person:</label> <p>{{ $youth_proposal->contact_person ?? 'N/A' }}</p></div>
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

            <div class="yp-show-row-2 my-3">
                <div>
                    <h5><strong>Expected Outputs</strong></h5>
                    <ul class="clean-list">
                        @forelse (json_decode($outputs, true) ?? [] as $output)
                            <li class="clean-item">{{ $output }}</li>
                        @empty
                            <li class="clean-item">No outputs provided</li>
                        @endforelse
                    </ul>
                </div>
                <div>
                    <h5><strong>Expected Outcomes</strong></h5>
                    <ul class="clean-list">
                        @forelse (json_decode($outcomes, true) ?? [] as $outcome)
                            <li class="clean-item">{{ $outcome }}</li>
                        @empty
                            <li class="clean-item">No outcomes provided</li>
                        @endforelse
                    </ul>
                </div>
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

            <div class="my-4 yp-pdf-section">
                <h5><strong>Implementation Plan (Gantt Chart PDFs)</strong></h5>
                @php $plans = is_array($youth_proposal->implementation_plans) ? $youth_proposal->implementation_plans : (json_decode($youth_proposal->implementation_plans ?? '[]', true) ?? []); @endphp
                @if(!empty($plans))
                    <div class="yp-pdf-list">
                        @foreach($plans as $i => $plan)
                            <a href="{{ asset('storage/' . ($plan['path'] ?? $plan)) }}" target="_blank" rel="noopener" class="yp-pdf-item">
                                <span class="yp-pdf-icon"><i class="fas fa-file-pdf"></i></span>
                                <span class="yp-pdf-name">{{ $plan['name'] ?? 'Plan ' . ($i+1) }}</span>
                                <span class="yp-pdf-badge">PDF</span>
                            </a>
                        @endforeach
                    </div>
                @elseif($youth_proposal->implementation_plan)
                    <a href="{{ asset('storage/' . $youth_proposal->implementation_plan) }}" target="_blank" rel="noopener" class="yp-pdf-item">
                        <span class="yp-pdf-icon"><i class="fas fa-file-pdf"></i></span>
                        <span class="yp-pdf-name">View Implementation Plan</span>
                        <span class="yp-pdf-badge">PDF</span>
                    </a>
                @else
                    <p class="yp-pdf-empty"><i class="fas fa-file-circle-xmark"></i> No file uploaded.</p>
                @endif
            </div>

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
