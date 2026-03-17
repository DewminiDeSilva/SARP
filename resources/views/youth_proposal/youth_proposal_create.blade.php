<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Proposal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        :root { --yp-primary: #126926; --yp-primary-dark: #0d4d1f; --yp-border: #e2e8f0; --yp-text: #1e293b; --yp-muted: #64748b; }
        body { background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
        .frame { display: flex; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid var(--yp-border); background: #fafbfa; }
        .left-column.hidden { display: none; }
        .right-column { flex: 0 0 80%; padding: 24px; transition: flex 0.3s ease; }
        .yp-frame-wrap { max-width: 100%; margin: 0 auto; padding: 20px; background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 16px; }
        .yp-form-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 6px 24px rgba(18,105,38,0.06);
            border: 1px solid rgba(18,105,38,0.1);
            padding: 32px 40px;
        }
        .yp-title { font-size: 1.75rem; font-weight: 700; color: var(--yp-text); margin-bottom: 28px; padding-bottom: 14px; border-bottom: 3px solid var(--yp-primary); text-align: center; letter-spacing: -0.02em; }
        .yp-label { font-weight: 600; color: var(--yp-text); font-size: 1.125rem; margin-bottom: 8px; display: block; }
        .yp-input { border-radius: 10px; border: 1px solid var(--yp-border); font-size: 0.9375rem; padding: 10px 14px; transition: border-color .2s, box-shadow .2s; }
        .yp-input:focus { border-color: var(--yp-primary); box-shadow: 0 0 0 3px rgba(18,105,38,0.15); outline: none; }
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
        .yp-section-title { font-size: 1.25rem; font-weight: 700; color: #126926; margin: 24px 0 14px; padding-bottom: 6px; }
        .yp-table { font-size: 0.9rem; }
        .yp-table .form-control { border-radius: 6px; }
        .yp-btn-add { background: #126926; color: #fff; border: none; border-radius: 8px; padding: 6px 14px; font-weight: 600; }
        .yp-btn-add:hover { background: #0d4d1f; color: #fff; }
        .yp-btn-remove { background: #dc3545; color: #fff; border: none; border-radius: 6px; padding: 4px 10px; }
        .yp-pdf-row { display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px; align-items: end; margin-bottom: 12px; }
        .yp-pdf-row .form-control { border-radius: 8px; }
        .yp-age-display { font-weight: 600; color: #126926; padding: 8px 12px; background: rgba(18,105,38,0.08); border-radius: 8px; }
        #sidebarToggle { background: #126926; color: #fff; border: none; padding: 10px; border-radius: 8px; }
        #sidebarToggle:hover { background: #0d4d1f; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; background: #126926; }
        .btn-back:hover { background: #0d4d1f; color: #fff; }
        .btn-submit-yp { background: linear-gradient(135deg, #126926 0%, #0d4d1f 100%); color: #fff; border: none; padding: 12px 32px; border-radius: 12px; font-weight: 600; }
        .btn-submit-yp:hover { background: linear-gradient(135deg, #0d4d1f 0%, #083d18 100%); color: #fff; }
        .yp-submit-wrap { margin-top: 2rem; display: flex; justify-content: center; align-items: center; }
        .yp-radio-group-wrap { display: flex; justify-content: center; align-items: center; }
        .yp-required::after { content: ' *'; color: #dc2626; }
        .yp-error { font-size: 0.8125rem; color: #dc2626; margin-top: 4px; }
        .yp-input.is-invalid { border-color: #dc2626; }
        .yp-compact .yp-form-card { padding: 20px 28px; }
        .yp-compact .yp-field { margin-bottom: 12px; }
        .yp-compact .yp-section-title { margin: 16px 0 10px; }
        .yp-compact textarea.yp-input { min-height: 60px; rows: 2; }
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
        <div class="d-flex align-items-center mb-3 gap-2">
            <button id="sidebarToggle" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.index') }}" class="btn-back"><i class="fas fa-arrow-left me-2"></i>Back</a>
        </div>

        <div class="yp-frame-wrap yp-compact">
        <div class="yp-form-card">
            <h3 class="yp-title">Youth Proposal</h3>
            <form action="{{ route('youth-proposals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger py-2 px-3 mb-3" role="alert" style="border-radius:10px;font-size:0.9rem;">
                        <strong>Please correct the errors below.</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <div class="yp-row-2">
                    <div class="yp-field">
                        <label class="yp-label yp-required">Name of the Youth</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('organization_name') ? 'is-invalid' : '' }}" name="organization_name" placeholder="Full name" value="{{ old('organization_name') }}">
                        @error('organization_name') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label yp-required">Nature of the Business</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('business_title') ? 'is-invalid' : '' }}" name="business_title" placeholder="Nature of the business" value="{{ old('business_title') }}">
                        @error('business_title') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="yp-field">
                    <label class="yp-label">New Business / Existing Business</label>
                    <div class="yp-radio-group-wrap">
                        <div class="yp-radio-group" role="radiogroup">
                            <label class="yp-radio-wrap">
                                <input type="radio" name="business_type" value="New Business">
                                <span class="yp-radio-option">New Business</span>
                            </label>
                            <label class="yp-radio-wrap">
                                <input type="radio" name="business_type" value="Existing Business">
                                <span class="yp-radio-option">Existing Business</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">NIC Number</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('nic_number') ? 'is-invalid' : '' }}" name="nic_number" placeholder="NIC">
                        @error('nic_number') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Birth date</label>
                        <input type="date" class="form-control yp-input {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" name="birth_date" id="birth_date" title="mm/dd/yyyy">
                        @error('birth_date') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Age</label>
                        <div id="age_display" class="yp-age-display">— years</div>
                    </div>
                </div>

                <div class="yp-field">
                    <label class="yp-label">Address</label>
                    <textarea class="form-control yp-input" name="address" rows="2" placeholder="Address"></textarea>
                </div>

                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">Telephone (Office)</label>
                        <input type="text" class="form-control yp-input" name="office_phone" placeholder="Office">
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Mobile Phone Number</label>
                        <input type="text" class="form-control yp-input" name="mobile_phone" placeholder="Mobile">
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Email</label>
                        <input type="email" class="form-control yp-input" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="yp-row-3">
                    <div class="yp-field">
                        <label class="yp-label">Market Analysis</label>
                        <textarea class="form-control yp-input {{ $errors->has('market_problem') ? 'is-invalid' : '' }}" name="market_problem" rows="2" placeholder="Market Analysis"></textarea>
                        @error('market_problem') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Business Objectives</label>
                        <textarea class="form-control yp-input {{ $errors->has('business_objectives') ? 'is-invalid' : '' }}" name="business_objectives" rows="2" placeholder="Business Objectives"></textarea>
                        @error('business_objectives') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="yp-field">
                        <label class="yp-label">Category</label>
                        <input type="text" class="form-control yp-input {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" placeholder="Category">
                        @error('category') <span class="yp-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="yp-section-title">Project Risks & Mitigation</div>
                <div class="yp-field">
                    <table class="table yp-table">
                        <thead>
                            <tr>
                                <th>Risk</th>
                                <th>Mitigation Measure</th>
                                <th style="width:80px"><button type="button" class="btn yp-btn-add add-risk">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="risk-table">
                            <tr>
                                <td><input type="text" name="risks[]" class="form-control"></td>
                                <td><input type="text" name="mitigations[]" class="form-control"></td>
                                <td><button type="button" class="btn yp-btn-remove remove-risk">−</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="yp-section-title">Upload Implementation Plan (Gantt Chart PDF)</div>
                <div class="yp-field">
                    <div id="pdf-rows">
                        <div class="yp-pdf-row">
                            <div>
                                <label class="yp-label">Name</label>
                                <input type="text" class="form-control yp-input" name="implementation_plan_names[]" placeholder="Plan name">
                            </div>
                            <div>
                                <label class="yp-label">Upload PDF</label>
                                <input type="file" class="form-control yp-input" name="implementation_plan_files[]" accept=".pdf">
                            </div>
                            <div><button type="button" class="btn yp-btn-add add-pdf-row">+ Add PDF</button></div>
                        </div>
                    </div>
                </div>

                <div class="yp-section-title">Total Investment and Breakdown</div>
                <div class="yp-field">
                    <table class="table yp-table">
                        <thead>
                            <tr>
                                <th>Project Activity/Component</th>
                                <th>Estimated Cost (Rs.)</th>
                                <th style="width:80px"><button type="button" class="btn yp-btn-add add-investment">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="investment-table">
                            <tr>
                                <td><input type="text" name="investment_breakdown[0][component]" class="form-control"></td>
                                <td><input type="number" name="investment_breakdown[0][cost]" class="form-control"></td>
                                <td><button type="button" class="btn yp-btn-remove remove-investment">−</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="yp-field">
                    <label class="yp-label">Registration Details (if any)</label>
                    <input type="text" class="form-control yp-input" name="registration_details" placeholder="Registration details">
                </div>
                <div class="yp-field">
                    <label class="yp-label">Contact Person</label>
                    <input type="text" class="form-control yp-input" name="contact_person" placeholder="Contact person">
                </div>

                <div class="yp-field">
                    <label class="yp-label">Background information</label>
                    <textarea class="form-control yp-input" name="background_info" rows="3"></textarea>
                </div>
                <div class="yp-field">
                    <label class="yp-label">Project Justification</label>
                    <textarea class="form-control yp-input" name="project_justification" rows="3"></textarea>
                </div>
                <div class="yp-field">
                    <label class="yp-label">Project Benefits</label>
                    <textarea class="form-control yp-input" name="project_benefits" rows="3"></textarea>
                </div>

                <div class="yp-section-title">Project Coverage</div>
                <div class="yp-field">
                    <table class="table yp-table">
                        <thead>
                            <tr>
                                <th>Area</th>
                                <th>No. of Farmers</th>
                                <th>Acreage</th>
                                <th style="width:80px"><button type="button" class="btn yp-btn-add add-coverage">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="coverage-table">
                            <tr>
                                <td><input type="text" name="project_coverage[0][area]" class="form-control"></td>
                                <td><input type="number" name="project_coverage[0][farmers]" class="form-control"></td>
                                <td><input type="number" name="project_coverage[0][acreage]" class="form-control"></td>
                                <td><button type="button" class="btn yp-btn-remove remove-coverage">−</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="yp-row-2">
                    <div class="yp-field">
                        <div class="yp-section-title">Expected Outputs</div>
                        <div id="outputs-wrapper">
                            <div class="input-group mb-2">
                                <input type="text" name="expected_outputs[]" class="form-control yp-input" placeholder="Expected output">
                                <button type="button" class="btn yp-btn-add add-output">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="yp-field">
                        <div class="yp-section-title">Expected Outcomes</div>
                        <div id="outcomes-wrapper">
                            <div class="input-group mb-2">
                                <input type="text" name="expected_outcomes[]" class="form-control yp-input" placeholder="Expected outcome">
                                <button type="button" class="btn yp-btn-add add-outcome">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yp-section-title">Funding Source</div>
                <div class="yp-field">
                    <table class="table yp-table">
                        <thead>
                            <tr>
                                <th>Type of Fund</th>
                                <th>Own Fund (Rs.)</th>
                                <th>Credit Fund (Rs.)</th>
                                <th style="width:80px"><button type="button" class="btn yp-btn-add add-fund">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="funding-table">
                            <tr>
                                <td><input type="text" name="funding_source[0][type]" class="form-control"></td>
                                <td><input type="number" name="funding_source[0][own]" class="form-control"></td>
                                <td><input type="number" name="funding_source[0][credit]" class="form-control"></td>
                                <td><button type="button" class="btn yp-btn-remove remove-fund">−</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="yp-section-title">Assistance Required</div>
                <div class="yp-field">
                    <table class="table yp-table">
                        <thead>
                            <tr>
                                <th>Type of Assistance</th>
                                <th>SARP (Rs.)</th>
                                <th>Other (Rs.)</th>
                                <th style="width:80px"><button type="button" class="btn yp-btn-add add-assistance">+</button></th>
                            </tr>
                        </thead>
                        <tbody id="assistance-table">
                            <tr>
                                <td><input type="text" name="assistance_required[0][type]" class="form-control"></td>
                                <td><input type="number" name="assistance_required[0][sarp]" class="form-control"></td>
                                <td><input type="number" name="assistance_required[0][other]" class="form-control"></td>
                                <td><button type="button" class="btn yp-btn-remove remove-assistance">−</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="yp-submit-wrap">
                    <button type="submit" class="btn btn-submit-yp">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.left-column');
    const content = document.querySelector('.right-column');
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
        content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
    });

    // Age from birth date
    const birthInput = document.getElementById('birth_date');
    const ageDisplay = document.getElementById('age_display');
    function updateAge() {
        const val = birthInput.value;
        if (!val) { ageDisplay.textContent = '— years'; return; }
        const birth = new Date(val);
        const today = new Date();
        let age = today.getFullYear() - birth.getFullYear();
        const m = today.getMonth() - birth.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
        ageDisplay.textContent = age + ' years';
    }
    birthInput.addEventListener('change', updateAge);
    birthInput.addEventListener('input', updateAge);

    // Add/remove risk
    document.querySelector('.add-risk').addEventListener('click', function () {
        const tbody = document.getElementById('risk-table');
        const tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="text" name="risks[]" class="form-control"></td><td><input type="text" name="mitigations[]" class="form-control"></td><td><button type="button" class="btn yp-btn-remove remove-risk">−</button></td>';
        tbody.appendChild(tr);
    });
    document.getElementById('risk-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-risk')) e.target.closest('tr').remove();
    });

    // Add PDF row
    document.querySelector('.add-pdf-row').addEventListener('click', function () {
        const row = document.createElement('div');
        row.className = 'yp-pdf-row';
        row.innerHTML = '<div><label class="yp-label">Name</label><input type="text" class="form-control yp-input" name="implementation_plan_names[]" placeholder="Plan name"></div><div><label class="yp-label">Upload PDF</label><input type="file" class="form-control yp-input" name="implementation_plan_files[]" accept=".pdf"></div><div><button type="button" class="btn yp-btn-remove remove-pdf-row">− Remove</button></div>';
        document.getElementById('pdf-rows').appendChild(row);
    });
    document.getElementById('pdf-rows').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-pdf-row')) e.target.closest('.yp-pdf-row').remove();
    });

    // Investment
    document.querySelector('.add-investment').addEventListener('click', function () {
        const tbody = document.getElementById('investment-table');
        const idx = tbody.querySelectorAll('tr').length;
        const tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="text" name="investment_breakdown[' + idx + '][component]" class="form-control"></td><td><input type="number" name="investment_breakdown[' + idx + '][cost]" class="form-control"></td><td><button type="button" class="btn yp-btn-remove remove-investment">−</button></td>';
        tbody.appendChild(tr);
    });
    document.getElementById('investment-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-investment')) e.target.closest('tr').remove();
    });

    // Coverage
    document.querySelector('.add-coverage').addEventListener('click', function () {
        const tbody = document.getElementById('coverage-table');
        const idx = tbody.querySelectorAll('tr').length;
        const tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="text" name="project_coverage[' + idx + '][area]" class="form-control"></td><td><input type="number" name="project_coverage[' + idx + '][farmers]" class="form-control"></td><td><input type="number" name="project_coverage[' + idx + '][acreage]" class="form-control"></td><td><button type="button" class="btn yp-btn-remove remove-coverage">−</button></td>';
        tbody.appendChild(tr);
    });
    document.getElementById('coverage-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-coverage')) e.target.closest('tr').remove();
    });

    // Outputs
    document.querySelector('.add-output').addEventListener('click', function () {
        const wrap = document.getElementById('outputs-wrapper');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = '<input type="text" name="expected_outputs[]" class="form-control yp-input" placeholder="Expected output"><button type="button" class="btn yp-btn-remove remove-field">−</button>';
        wrap.appendChild(div);
    });
    // Outcomes
    document.querySelector('.add-outcome').addEventListener('click', function () {
        const wrap = document.getElementById('outcomes-wrapper');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = '<input type="text" name="expected_outcomes[]" class="form-control yp-input" placeholder="Expected outcome"><button type="button" class="btn yp-btn-remove remove-field">−</button>';
        wrap.appendChild(div);
    });
    document.getElementById('outputs-wrapper').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-field')) e.target.closest('.input-group').remove();
    });
    document.getElementById('outcomes-wrapper').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-field')) e.target.closest('.input-group').remove();
    });

    // Funding
    document.querySelector('.add-fund').addEventListener('click', function () {
        const tbody = document.getElementById('funding-table');
        const idx = tbody.querySelectorAll('tr').length;
        const tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="text" name="funding_source[' + idx + '][type]" class="form-control"></td><td><input type="number" name="funding_source[' + idx + '][own]" class="form-control"></td><td><input type="number" name="funding_source[' + idx + '][credit]" class="form-control"></td><td><button type="button" class="btn yp-btn-remove remove-fund">−</button></td>';
        tbody.appendChild(tr);
    });
    document.getElementById('funding-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-fund')) e.target.closest('tr').remove();
    });

    // Assistance
    document.querySelector('.add-assistance').addEventListener('click', function () {
        const tbody = document.getElementById('assistance-table');
        const idx = tbody.querySelectorAll('tr').length;
        const tr = document.createElement('tr');
        tr.innerHTML = '<td><input type="text" name="assistance_required[' + idx + '][type]" class="form-control"></td><td><input type="number" name="assistance_required[' + idx + '][sarp]" class="form-control"></td><td><input type="number" name="assistance_required[' + idx + '][other]" class="form-control"></td><td><button type="button" class="btn yp-btn-remove remove-assistance">−</button></td>';
        tbody.appendChild(tr);
    });
    document.getElementById('assistance-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-assistance')) e.target.closest('tr').remove();
    });
});
</script>
</body>
</html>
