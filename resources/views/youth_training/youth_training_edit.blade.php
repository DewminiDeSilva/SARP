<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Youth Training Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        .ytoa-form-card .form-control { border-radius: 10px; border: 1px solid var(--ytoa-border); padding: 10px 14px; }
        .ytoa-form-card .form-control:focus { border-color: var(--ytoa-primary); box-shadow: 0 0 0 3px rgba(18,105,38,0.15); outline: none; }
        .form-control[readonly] { background-color: #f1f5f9; opacity: 1; }
        .section-header { background: linear-gradient(180deg, var(--ytoa-primary) 0%, var(--ytoa-primary-dark) 100%); color: white; padding: 12px 16px; margin-top: 24px; margin-bottom: 16px; font-weight: 700; border-radius: 10px; font-size: 1.1rem; }
        .dropdown { margin-bottom: 20px; }
        .dropdown-label { font-weight: 600; padding-left: 12px; border-left: 4px solid var(--ytoa-primary); margin-bottom: 8px; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; background: var(--ytoa-primary); }
        .btn-back:hover { background: var(--ytoa-primary-dark); color: #fff; }
        #sidebarToggle { background: var(--ytoa-primary); color: #fff; border: none; padding: 10px; border-radius: 8px; }
        #sidebarToggle:hover { background: var(--ytoa-primary-dark); }
        .ytoa-submit-wrap { margin-top: 2rem; display: flex; justify-content: center; }
        .submit-btn { background: var(--ytoa-primary); border: none; padding: 12px 32px; border-radius: 12px; font-weight: 600; }
        .submit-btn:hover { background: var(--ytoa-primary-dark); }
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
            <h2 class="ytoa-title">Edit Youth Training Program</h2>

            <form class="form-horizontal" method="POST" action="{{ route('youth-training.update', $youthTraining->id) }}">
                @csrf
                @method('PUT')

                <div class="section-header">Location</div>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label class="dropdown-label">Province</label>
                            <input type="text" name="province_name" class="form-control" value="{{ $youthTraining->province_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="dropdown-label">District</label>
                            <input type="text" name="district" class="form-control" value="{{ $youthTraining->district }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="dropdown-label">DSD</label>
                            <input type="text" name="ds_division_name" class="form-control" value="{{ $youthTraining->ds_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="dropdown-label">GND</label>
                            <input type="text" name="gn_division_name" class="form-control" value="{{ $youthTraining->gn_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="dropdown-label">ASC</label>
                            <input type="text" name="as_center" class="form-control" value="{{ $youthTraining->as_center }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="section-header">Program Details</div>
                <div class="container mt-3">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue" class="ytoa-label">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" value="{{ $youthTraining->venue }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name" class="ytoa-label">Training Program Type</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" value="{{ $youthTraining->program_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_number" class="ytoa-label">Program Number</label>
                            <input type="text" class="form-control" id="program_number" name="program_number" value="{{ $youthTraining->program_number }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="crop_name" class="ytoa-label">Crop Name</label>
                            <input type="text" class="form-control" id="crop_name" name="crop_name" value="{{ $youthTraining->crop_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="startDate" class="ytoa-label">Start Date</label>
                            <input type="text" class="form-control" id="startDate" name="date" value="{{ $youthTraining->date }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name" class="ytoa-label">Resource Person Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" value="{{ $youthTraining->resource_person_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost" class="ytoa-label">Training Program Cost</label>
                            <input type="text" class="form-control" id="training_program_cost" name="training_program_cost" value="{{ $youthTraining->training_program_cost }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment" class="ytoa-label">Resource Person Payment</label>
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" value="{{ $youthTraining->resource_person_payment }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="ytoa-submit-wrap">
                                <button type="submit" class="btn submit-btn">Update</button>
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
