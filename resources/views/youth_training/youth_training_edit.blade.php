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
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; background-color: #f0f4f7; border-radius: 10px; padding: 30px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); }
        .section-header { background-color: #28a745; color: white; padding: 8px; margin-top: 20px; font-weight: bold; border-radius: 4px; }
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .dropdown { margin-bottom: 20px; }
        .dropdown-label { text-align: center; font-size: 18px; font-weight: bold; }
        .form-control[readonly] { background-color: #e9ecef; opacity: 1; }
        .submit-btn { background-color: #28a745; border-color: #28a745; padding: 10px 20px; font-size: 16px; font-weight: bold; }
        .submit-btn:hover { background-color: #218838; border-color: #1e7e34; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; position: relative; overflow: hidden; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; z-index: 1; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        #sidebarToggle:hover { background-color: #0a4818; }
        .left-column.hidden { display: none; }
        .right-column { transition: flex 0.3s ease, padding 0.3s ease; }
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
        <a href="{{ route('youth-training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
    </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Edit Youth Training Program</h2>
        </div>

        <div class="container mt-5">
            <form class="form-horizontal" method="POST" action="{{ route('youth-training.update', $youthTraining->id) }}">
                @csrf
                @method('PUT')

                <div class="section-header">Location</div>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Province</label>
                            <input type="text" name="province_name" class="form-control" value="{{ $youthTraining->province_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">District</label>
                            <input type="text" name="district" class="form-control" value="{{ $youthTraining->district }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">DSD</label>
                            <input type="text" name="ds_division_name" class="form-control" value="{{ $youthTraining->ds_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">GND</label>
                            <input type="text" name="gn_division_name" class="form-control" value="{{ $youthTraining->gn_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">ASC</label>
                            <input type="text" name="as_center" class="form-control" value="{{ $youthTraining->as_center }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="section-header">Program Details</div>
                <div class="container mt-3">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" value="{{ $youthTraining->venue }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name">Training Program Type</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" value="{{ $youthTraining->program_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_number">Program Number</label>
                            <input type="text" class="form-control" id="program_number" name="program_number" value="{{ $youthTraining->program_number }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="crop_name">Crop Name</label>
                            <input type="text" class="form-control" id="crop_name" name="crop_name" value="{{ $youthTraining->crop_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="startDate">Start Date</label>
                            <input type="text" class="form-control" id="startDate" name="date" value="{{ $youthTraining->date }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name">Resource Person Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" value="{{ $youthTraining->resource_person_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost">Training Program Cost</label>
                            <input type="text" class="form-control" id="training_program_cost" name="training_program_cost" value="{{ $youthTraining->training_program_cost }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment">Resource Person Payment</label>
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" value="{{ $youthTraining->resource_person_payment }}" required>
                        </div>
                        <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-success submit-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
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
