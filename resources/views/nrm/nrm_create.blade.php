<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training Programme Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/training_create.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
      </style>

<style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

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
     
    <a href="{{ route('nrm.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>




</div>

        <div class="container mt-5 border rounded border-primary p-4">
            <form class="form-horizontal" method="POST" action="/nrmtraining">
                @csrf
                <div class="col-md-12 text-center">
                    <h2>NRM Training Programme Registration</h2>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="form-label dropdown-label">Province Name</label>
                            <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Province</option>
                            </select>
                            <input type="hidden" id="provinceName" name="province_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="form-label dropdown-label">District Name</label>
                            <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" id="districtName" name="district">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="dsd" class="form-label dropdown-label">Divisional Secretariat (DSD)</label>
                            <select id="dsDivisionDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select DSD</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="dsDivisionName" name="ds_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="gnd" class="form-label dropdown-label">Grama Niladhari Division (GND)</label>
                            <select id="gndDropdown" class="btn btn-success dropdown-toggle">
                                <option value="">Select GND</option>
                                <option value="N/A">N/A</option>
                            </select>
                            <input type="hidden" id="gndName" name="gn_division_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">Agriculture Service Centre (ASC)</label>
                            <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle">
                                <option value="">Select ASC</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Rest of the Form Fields -->

                <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="venue">Venue</label> <!-- Changed from 'Place' to 'Venue' -->
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_name">Training Program Name</label> <!-- Changed from dropdown to text input -->
                            <input type="text" class="form-control" id="program_name" name="program_name" placeholder="Enter Training Program Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="program_number">Program Number</label> <!-- Changed from dropdown to text input -->
                            <input type="text" class="form-control" id="program_number" name="program_number" placeholder="Enter Training Program Number" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="crop_name">Crop Name</label> <!-- Changed from dropdown to text input -->
                            <input type="text" class="form-control" id="crop_name" name="crop_name" placeholder="Enter Crop Name" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="startDate">Date of Conducted</label>
                            <input type="text" class="form-control" id="startDate" name="date" placeholder="Select Date" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name">Resource Person Name</label> <!-- Changed from 'Conductor Name' -->
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" placeholder="Enter Resource Person Name" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment">Resource Person Payment</label> <!-- New field -->
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" placeholder="Enter Resource Person Payment" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost">Training Program Cost</label> <!-- Changed from 'Conductor Payment' -->
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
</script>

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
