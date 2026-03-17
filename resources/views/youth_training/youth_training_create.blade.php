<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youth Training Programme Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* EOI-style CSS structure (same as youth/EOI module) */
        :root { --ytoa-primary: #126926; --ytoa-primary-dark: #0d4d1f; --ytoa-border: #e2e8f0; --ytoa-text: #1e293b; }
        body { background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
        .frame { display: flex; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid var(--ytoa-border); background: #fafbfa; }
        .left-column.hidden { display: none; }
        .right-column { flex: 0 0 80%; padding: 24px; transition: flex 0.3s ease; }
        .ytoa-frame-wrap { max-width: 100%; margin: 0 auto; padding: 20px; background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 16px; }
        .ytoa-form-card { background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 6px 24px rgba(18,105,38,0.06); border: 1px solid rgba(18,105,38,0.1); padding: 32px 40px; }
        .ytoa-title { font-size: 1.75rem; font-weight: 700; color: var(--ytoa-text); margin-bottom: 28px; padding-bottom: 14px; border-bottom: 3px solid var(--ytoa-primary); text-align: center; letter-spacing: -0.02em; }
        .ytoa-label { font-weight: 600; color: var(--ytoa-text); font-size: 1.125rem; margin-bottom: 8px; display: block; padding-left: 12px; border-left: 4px solid var(--ytoa-primary); line-height: 1.4; }
        .ytoa-form-card .form-control { border-radius: 10px; border: 1px solid var(--ytoa-border); padding: 10px 14px; transition: border-color .2s, box-shadow .2s; }
        .ytoa-form-card .form-control:focus { border-color: var(--ytoa-primary); box-shadow: 0 0 0 3px rgba(18,105,38,0.15); outline: none; }
        .section-header { background: linear-gradient(180deg, var(--ytoa-primary) 0%, var(--ytoa-primary-dark) 100%); color: white; padding: 12px 16px; margin-top: 24px; margin-bottom: 16px; font-weight: 700; border-radius: 10px; font-size: 1.1rem; }
        .dropdown { margin-bottom: 20px; display: flex; flex-direction: column; align-items: center; }
        .dropdown-toggle { min-width: 250px; border-radius: 10px; }
        .dropdown-label { text-align: center; font-size: 1rem; font-weight: 600; padding-left: 12px; border-left: 4px solid var(--ytoa-primary); margin-bottom: 8px; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; background: var(--ytoa-primary); }
        .btn-back:hover { background: var(--ytoa-primary-dark); color: #fff; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
        #sidebarToggle { background: var(--ytoa-primary); color: #fff; border: none; padding: 10px; border-radius: 8px; }
        #sidebarToggle:hover { background: var(--ytoa-primary-dark); }
        .ytoa-submit-wrap { margin-top: 2rem; display: flex; justify-content: center; align-items: center; }
        .btn-success { background: var(--ytoa-primary); border-color: var(--ytoa-primary); border-radius: 12px; padding: 12px 32px; font-weight: 600; }
        .btn-success:hover { background: var(--ytoa-primary-dark); border-color: var(--ytoa-primary-dark); }
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
            <a href="{{ route('youth-training.index') }}" class="btn-back"><i class="fas fa-arrow-left me-2"></i>Back</a>
        </div>

        <div class="ytoa-frame-wrap">
        <div class="ytoa-form-card">
            <h2 class="ytoa-title">Youth Training Programme Registration</h2>

            <form class="form-horizontal" method="POST" action="{{ route('youth-training.store') }}">
                @csrf

                <div class="section-header">Location</div>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="dropdown-label">Province Name</label>
                            <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Province</option>
                            </select>
                            <input type="hidden" id="provinceName" name="province_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="dropdown-label">District Name</label>
                            <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" id="districtName" name="district">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="dsd" class="dropdown-label">Divisional Secretariat (DSD)</label>
                            <select id="dsDivisionDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select DSD</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="dsDivisionName" name="ds_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="gnd" class="dropdown-label">Grama Niladhari Division (GND)</label>
                            <select id="gndDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select GND</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="gndName" name="gn_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="dropdown-label">Agriculture Service Centre (ASC)</label>
                            <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle">
                                <option value="">Select ASC</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="section-header">Program Details</div>
                <div class="container mt-3">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue" class="ytoa-label">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name" class="ytoa-label">Training Program Name</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" placeholder="Enter Training Program Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_number" class="ytoa-label">Program Number</label>
                            <input type="text" class="form-control" id="program_number" name="program_number" placeholder="Enter Training Program Number" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="crop_name" class="ytoa-label">Crop Name</label>
                            <input type="text" class="form-control" id="crop_name" name="crop_name" placeholder="Enter Crop Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="startDate" class="ytoa-label">Date of Conducted</label>
                            <input type="text" class="form-control" id="startDate" name="date" placeholder="Select Date" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name" class="ytoa-label">Resource Person Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" placeholder="Enter Resource Person Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment" class="ytoa-label">Resource Person Payment</label>
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" placeholder="Enter Resource Person Payment" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost" class="ytoa-label">Training Program Cost</label>
                            <input type="text" class="form-control" id="training_program_cost" name="training_program_cost" placeholder="Enter Training Program Cost" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="ytoa-submit-wrap">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function resetDsGndAsc() {
        $('#dsDivisionDropdown').empty().append($('<option>', { value: '', text: 'Select DSD' })).append($('<option>', { value: 'N/A', text: 'N/A' }));
        $('#gndDropdown').empty().append($('<option>', { value: '', text: 'Select GND' })).append($('<option>', { value: 'N/A', text: 'N/A' }));
        $('#dsDivisionName').val(''); $('#gndName').val('');
    }
    $.ajax({ url: '/provinces', type: 'GET', success: function(data) {
        if (data && data.length) { $.each(data, function(i, p) { $('#provinceDropdown').append($('<option>', { value: p.id, text: p.name || p.province_name || p.id })); }); }
    }, error: function() { $('#provinceDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); }});
    $('#provinceDropdown').change(function() {
        var id = $(this).val();
        $('#provinceName').val($(this).find('option:selected').text());
        $('#districtDropdown').empty().append($('<option>', { value: '', text: 'Select District' }));
        resetDsGndAsc();
        $('#districtName').val('');
        if (!id || id === '') return;
        $.ajax({ url: '/provinces/' + id + '/districts', type: 'GET', success: function(data) {
            $('#districtDropdown').find('option:not(:first)').remove();
            if (data && data.length) $.each(data, function(i, d) { $('#districtDropdown').append($('<option>', { value: d.id, text: d.district || d.name || d.id })); });
        }, error: function() { $('#districtDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); }});
    });
    $('#districtDropdown').change(function() {
        var id = $(this).val();
        $('#districtName').val($(this).find('option:selected').text());
        resetDsGndAsc();
        if (!id || id === '') return;
        $.ajax({ url: '/districts/' + id + '/ds-divisions', type: 'GET', success: function(data) {
            $('#dsDivisionDropdown').empty().append($('<option>', { value: '', text: 'Select DSD' })).append($('<option>', { value: 'N/A', text: 'N/A' }));
            if (data && data.length) $.each(data, function(i, d) { $('#dsDivisionDropdown').append($('<option>', { value: d.id, text: d.division || d.name || d.id })); });
        }, error: function() { $('#dsDivisionDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); }});
    });
    $('#dsDivisionDropdown').change(function() {
        var id = $(this).val();
        var text = $(this).find('option:selected').text();
        $('#dsDivisionName').val(text);
        $('#gndDropdown').empty().append($('<option>', { value: '', text: 'Select GND' })).append($('<option>', { value: 'N/A', text: 'N/A' }));
        $('#gndName').val('');
        if (!id || id === '' || id === 'N/A') { $('#gndName').val(text); return; }
        $.ajax({ url: '/ds-divisions/' + id + '/gn-divisions', type: 'GET', success: function(data) {
            $('#gndDropdown').empty().append($('<option>', { value: '', text: 'Select GND' })).append($('<option>', { value: 'N/A', text: 'N/A' }));
            if (data && data.length) $.each(data, function(i, g) { $('#gndDropdown').append($('<option>', { value: g.id, text: g.gn_division_name || g.name || g.id })); });
        }, error: function() { $('#gndDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); }});
    });
    $('#gndDropdown').change(function() { $('#gndName').val($(this).find('option:selected').text()); });
    $.get('/asc').done(function(data) {
        if (data && data.length) { $.each(data, function(i, asc) { var v = asc.asc_name || asc.name; if (v) $('#ascDropdown').append($('<option>', { value: v, text: v })); }); }
    }).fail(function() { $('#ascDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); });
});
$("#startDate").datepicker({ dateFormat: 'yy-mm-dd' });
</script>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif
</body>
</html>
