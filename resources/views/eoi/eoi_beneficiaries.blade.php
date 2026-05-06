<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EOI Beneficiaries</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inter (match tank rehabilitation summary typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&display=swap" rel="stylesheet">

    @include('partials.sarp_green_theme')

    <style>
        /* Match tank_rehabilitation_index summary CSS (scoped to this page) */
        .eoi-beneficiaries-page .sarp-tank-summary .summary-card {
            animation: sarpTankFadeInUp 0.6s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        @keyframes sarpTankFadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .eoi-beneficiaries-page .sarp-ben-summary-font {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .eoi-beneficiaries-page .sarp-summary-metric-lg {
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
        .eoi-beneficiaries-page .sarp-summary-card-title {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            font-weight: 800;
            font-size: 1rem;
            letter-spacing: 0.1em;
            line-height: 1.35;
            text-transform: uppercase;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }

        .eoi-beneficiaries-page .beneficiary-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin: 10px 0 6px;
        }
        .eoi-beneficiaries-page .beneficiary-toolbar .form-control-sm {
            min-width: 220px;
        }
    </style>
</head>
<body>

@include('dashboard.header')

<div class="frame eoi-beneficiaries-page" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">
        <!-- <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('expressions.evaluation_completed') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div> -->
         <div class="d-flex align-items-center mb-3">
            <button type="button" id="sidebarToggle" class="btn mr-2"><i class="fas fa-bars"></i></button>
            <a href="javascript:void(0);" onclick="window.history.back();" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


        <div class="center-heading text-center">
            <h1 class="sarp-page-title">Registered Beneficiaries - {{  $eoi->business_title }} ({{ $eoi->category }})</h1>
        </div>

        <!-- Summary cards (same pattern as tank_rehabilitation_index) -->
        <div class="container mt-4 sarp-tank-summary px-0 px-sm-2">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="summary-card"
                         style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3); height: 100%; cursor: default;"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(102, 126, 234, 0.4)';"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(102, 126, 234, 0.3)';">
                        <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                            <i class="fas fa-user-group" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Total Beneficiaries
                        </div>
                        <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                            {{ number_format($totalBeneficiaries ?? ($beneficiaries->total() ?? 0)) }}
                        </div>
                        <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Count of beneficiaries matching your search.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="summary-card"
                         style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3); height: 100%; cursor: default;"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(79, 172, 254, 0.4)';"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(79, 172, 254, 0.3)';">
                        <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                            <i class="fas fa-map-pin" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i> Number of GND
                        </div>
                        <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                            {{ number_format($uniqueGndCount ?? 0) }}
                        </div>
                        <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Unique GN divisions in the same list.</p>
                    </div>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('eoi.beneficiaries', $eoi->id) }}" class="beneficiary-toolbar">
            <div class="d-flex align-items-center">
                <label class="mb-0 mr-2">Show</label>
                <select name="entries" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                    @foreach([10,25,50,100] as $n)
                        <option value="{{ $n }}" {{ (int)($entries ?? 25) === $n ? 'selected' : '' }}>{{ $n }}</option>
                    @endforeach
                </select>
                <span class="ml-2">entries</span>
            </div>

            <div class="d-flex align-items-center">
                <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control form-control-sm mr-2" placeholder="Search NIC / name / GND...">
                <button type="submit" class="btn btn-success btn-sm">Search</button>
                @if(!empty($search))
                    <a class="btn btn-sarp-outline btn-sm ml-2" href="{{ route('eoi.beneficiaries', $eoi->id) }}">Clear</a>
                @endif
            </div>
        </form>

        @if (($beneficiaries->total() ?? 0) === 0)
            <div class="alert alert-sarp-muted mt-4">No beneficiaries found for this EOI title and category.</div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped table-sarp-green">
                    <thead>
                        <tr>
                            <th>NIC</th>
                            <th>Name with Initials</th>
                            <th>GN Division</th>
                            <th>Business Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->nic }}</td>
                            <td>{{ $beneficiary->name_with_initials }}</td>
                            <td>{{ $beneficiary->gn_division_name }}</td>
                            <td>{{ $beneficiary->eoi_business_title }}</td>
                            <td>{{ $beneficiary->eoi_category }}</td>
                            <td>
                                <a href="{{ route('eoi_form.create', $beneficiary->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus-circle"></i> Add Data
                                </a>
                                <a href="{{ route('eoi_form.show', $beneficiary->id) }}" class="btn btn-sm btn-sarp-outline ml-1">
                                    <i class="fas fa-eye"></i> View EOI Data
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
                <div class="text-muted" style="font-size: 0.9rem;">
                    Showing {{ $beneficiaries->firstItem() ?? 0 }} to {{ $beneficiaries->lastItem() ?? 0 }} of {{ $beneficiaries->total() ?? 0 }} entries
                </div>
                <div>
                    {{ $beneficiaries->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            content.style.padding = '20px';
        });
    });
</script>

</body>
</html>
