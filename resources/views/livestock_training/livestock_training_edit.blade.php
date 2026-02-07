<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Livestock Training Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .frame { display: flex; flex-direction: row; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .dropdown { margin-bottom: 20px; }
        .dropdown-label { text-align: center; font-size: 18px; font-weight: bold; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; padding: 10px 50px; text-decoration: none; }
        .form-control[readonly] { background-color: #e9ecef; opacity: 1; }
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
            <a href="{{ route('livestock-training.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>
        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Edit Livestock Training Program</h2>
        </div>
        <div class="container mt-5">
            <form method="POST" action="{{ route('livestock-training.update', $training) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">Province</label>
                            <input type="text" name="province_name" class="form-control" value="{{ $training->province_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">District</label>
                            <input type="text" name="district" class="form-control" value="{{ $training->district }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">DSD</label>
                            <input type="text" name="ds_division_name" class="form-control" value="{{ $training->ds_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">GND</label>
                            <input type="text" name="gn_division_name" class="form-control" value="{{ $training->gn_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label class="form-label dropdown-label">ASC</label>
                            <input type="text" name="as_center" class="form-control" value="{{ $training->as_center }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" name="venue" value="{{ $training->venue }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name">Training Program Name</label>
                            <input type="text" class="form-control" name="program_name" value="{{ $training->program_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="startDate">Date</label>
                            <input type="text" class="form-control" id="startDate" name="date" value="{{ $training->date }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name">Resource Person Name</label>
                            <input type="text" class="form-control" name="resource_person_name" value="{{ $training->resource_person_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost">Training Program Cost</label>
                            <input type="text" class="form-control" name="training_program_cost" value="{{ $training->training_program_cost }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment">Resource Person Payment</label>
                            <input type="text" class="form-control" name="resource_person_payment" value="{{ $training->resource_person_payment }}" required>
                        </div>
                        <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$("#startDate").datepicker({ dateFormat: 'yy-mm-dd' });
document.getElementById('sidebarToggle')?.addEventListener('click', function() {
    document.querySelector('.left-column').classList.toggle('hidden');
});
</script>
</body>
</html>
