<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Training Programme Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .frame { display: flex; flex-direction: row; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .dropdown { margin-bottom: 20px; display: flex; flex-direction: column; align-items: center; }
        .dropdown-toggle { min-width: 250px; }
        .dropdown-label { text-align: center; font-size: 20px; }
        .custom-border { border-color: darkgreen !important; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 50px; text-decoration: none; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
        .sidebar.hidden { transform: translateX(-100%); }
        .left-column.hidden { display: none; }
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
            <a href="{{ route('agriculture-training.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>
        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Agriculture Training Programme Registration</h2>
        </div>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form method="POST" action="{{ route('agriculture-training.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Province Name</label>
                            <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Province</option>
                            </select>
                            <input type="hidden" id="provinceName" name="province_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">District Name</label>
                            <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" id="districtName" name="district">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Divisional Secretariat (DSD)</label>
                            <select id="dsDivisionDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select DSD</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="dsDivisionName" name="ds_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Grama Niladhari Division (GND)</label>
                            <select id="gndDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select GND</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="gndName" name="gn_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Agriculture Service Centre (ASC)</label>
                            <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle">
                                <option value="">Select ASC</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name">Training Program Name</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" placeholder="Enter Training Program Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="startDate">Date of Conducted</label>
                            <input type="text" class="form-control" id="startDate" name="date" placeholder="Select Date" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name">Resource Person Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" placeholder="Enter Resource Person Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment">Resource Person Payment</label>
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" placeholder="Enter Resource Person Payment" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost">Training Program Cost</label>
                            <input type="text" class="form-control" id="training_program_cost" name="training_program_cost" placeholder="Enter Training Program Cost" required>
                        </div>
                        <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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
document.getElementById('sidebarToggle')?.addEventListener('click', function() { document.querySelector('.left-column').classList.toggle('hidden'); });
</script>
</body>
</html>
