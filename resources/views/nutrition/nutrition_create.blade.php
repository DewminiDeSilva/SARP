<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Nutrition Program</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery UI for Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dropdown-menu {
            min-width: auto;
        }
        .dropdown-item {
            padding: 10px;
            font-size: 16px;
        }
        .dropdown-toggle {
            min-width: 250px;
        }
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }
        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submitbtton:active, .submitbtton:hover {
            background-color: #145c32;
            border-color: #145c32;
            color: #fff;
        }
    </style>

<style>
        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            height: auto;
            margin-right: 5px;
            transition: transform 0.3s ease;
            background: none;
            position: relative;
            z-index: 1;
        }

        .btn-back .btn-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            right: 25px;
            background-color: #1e8e1e;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
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
    </style>

<style>
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
}

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

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<a href="{{ route('nutrition.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

</div>



        <div class="container mt-5 border rounded border p-4 custom-border">
            <h2 style="color: green; font-weight: bold; text-align: center;">Create Nutrition Program</h2>

            <form action="{{ route('nutrition.store') }}" method="POST">
                @csrf

            <div class="row">

                <div class="col">
                    <div class="dropdown">
                        <label for="province_name" class="form-label dropdown-label">Province Name</label>
                        <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select Province</option>
                        </select>
                        <input type="hidden" class="form-control" id="provinceName" name="province_name" required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="district_name" class="form-label dropdown-label">District Name</label>
                        <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select District</option>
                        </select>
                        <input type="hidden" class="form-control" id="districtName" name="district_name" required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="ds_division_name" class="form-label dropdown-label">Divisional Secretariat (DSD)</label>
                        <select id="dsDivisionDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select DSD</option>
                                <option value="N/A">N/A</option>
                        </select>
                        <input type="hidden" class="form-control" id="dsDivisionName" name="ds_division_name">
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="gn_division_name" class="form-label dropdown-label">Grama Niladhari Division (GND)</label>
                        <select id="gndDropdown" class="btn btn-success dropdown-toggle">
                            <option value="">Select GND</option>
                            <option value="N/A">N/A</option>
                        </select>
                        <input type="hidden" id="gndName" name="gn_division_name" placeholder="Enter GN Division">
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="asc_name" class="form-label dropdown-label">Agriculture Service Centre (ASC)</label>
                        <select id="ascDropdown" name="asc_name" class="btn btn-success dropdown-toggle">
                            <option value="">Select ASC</option>
                            <option value="N/A">N/A</option>
                        </select>

                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="dropdown">
                        <label for="cascadeDropdown" class="form-label dropdown-label">Cascade Name</label>
                        <select class="form-control btn btn-success" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                            <option value="">Select Cascade name</option>
                        </select>

                    </div>
                </div>
            </div>

                <div class="form-group">
                    <label for="program_type">Program Type</label>
                    <input type="text" class="form-control" id="program_type" name="program_type" placeholder="Enter Program Type" required>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="Select Date" required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" required>
                </div>

                <div class="form-group">
                    <label for="program_conductor">Resource Person</label>
                    <input type="text" class="form-control" id="program_conductor" name="program_conductor" placeholder="Enter Program Conductor" required>
                </div>

                <div class="form-group">
                    <label for="cost_of_training_program">Cost of the Training Program</label>
                    <input type="number" step="0.01" class="form-control" id="cost_of_training_program" name="cost_of_training_program" placeholder="Enter Cost" required>
                </div>



                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description (Optional)"></textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn submitbtton mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        // Initialize datepicker
        $("#date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-100:+10"
        });
    });
</script>


<!--form script-->

<script>

$(document).ready(function () {
    // Fetch tank names from the API endpoint
    $.get('/tanks', function (data) {
        // console.log(data);
        // Populate the dropdown menu with tank names
        $.each(data, function (index, tank) {
            $('#tankDropdown').append($('<option>', {
                value: tank.tank_name,
                text: tank.tank_name
            }));
        });
    });
});

$(document).ready(function () {
    $.get('/asc').done(function (data) {
        if (data && data.length) {
            $.each(data, function (index, asc) {
                var v = asc.asc_name || asc.name;
                if (v) $('#ascDropdown').append($('<option>', { value: v, text: v }));
            });
        }
    }).fail(function() { $('#ascDropdown').append($('<option>', { value: 'N/A', text: 'N/A' })); });

    $.get('/cascades', function (data) {
        $.each(data, function (index, cascade) {
            $('#cascadeDropdown').append($('<option>', {
                value: cascade.cascade_name,
                text: cascade.cascade_name
            }));
        });
    });

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
});
</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });
    });
</script>


</body>
</html>
