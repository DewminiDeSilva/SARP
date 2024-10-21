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

    <!-- Custom styles -->
    <style>
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

</head>
<body>

<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('nutrition.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

        <div class="container mt-5 border rounded border p-4 custom-border">
            <h2 style="color: green; font-weight: bold; text-align: center;">Create Nutrition Program</h2>

            <form action="{{ route('nutrition.store') }}" method="POST">
                @csrf

            <div class="row">

                <div class="col">
                    <div class="dropdown">
                        <label for="province_name" class="form-label dropdown-label">Province</label>
                        <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select Province</option>
                        </select>
                        <input type="hidden" class="form-control" id="provinceName" name="province_name" required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="district_name" class="form-label dropdown-label">District</label>
                        <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select District</option>
                        </select>
                        <input type="hidden" class="form-control" id="districtName" name="district_name"  required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="ds_division_name" class="form-label dropdown-label">DS Division</label>
                        <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select DSD</option>
                        </select>
                        <input type="hidden" class="form-control" id="dsDivisionName" name="ds_division_name" required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="gn_division_name" class="form-label dropdown-label">GN Division</label>
                        <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select GND</option>
                        </select>
                        <input type="hidden" id="gndName" name="gn_division_name" placeholder="Enter GN Division" required>
                    </div>
                </div>

                <div class="col">
                    <div class="dropdown">
                        <label for="asc_name" class="form-label dropdown-label">ASC</label>
                        <select id="ascDropdown" name="asc_name" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select ASC</option>
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
                    <label for="program_conductor">Program Conductor</label>
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
    // Fetch ASC names from the API endpoint
    $.get('/asc', function (data) {
        // Populate the dropdown menu with ASC names
        $.each(data, function (index, asc) {
            $('#ascDropdown').append($('<option>', {
                value: asc.asc_name,
                text: asc.asc_name
            }));
        });
    });

    // Fetch cascade names from the API endpoint
    $.get('/cascades', function (data) {
        // Populate the dropdown menu with cascade names
        $.each(data, function (index, cascade) {
            $('#cascadeDropdown').append($('<option>', {
                value: cascade.cascade_name,
                text: cascade.cascade_name
            }));
        });
    });

    // Fetch provinces
    $.ajax({
        url: '/provinces',
        type: 'GET',
        success: function(data) {
            // Populate province dropdown
            $.each(data, function(index, province) {
                $('#provinceDropdown').append($('<option>', {
                    value: province.id,
                    text: province.name
                }));
            });
        }
    });

    // Fetch districts based on selected province
    $('#provinceDropdown').change(function() {
        var provinceId = $(this).val();

        // Check if a province is selected
        if (provinceId !== '') {
            // Clear the district and DS Division dropdowns
            $('#districtDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select District'
            }));
            $('#dsDivisionDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select DS Division'
            }));
            $('#gndDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select GND'
            }));

            // Fetch districts only if a valid province ID is selected
            $.ajax({
                url: '/provinces/' + provinceId + '/districts',
                type: 'GET',
                success: function(data) {
                    // Populate district dropdown
                    $.each(data, function(index, district) {
                        $('#districtDropdown').append($('<option>', {
                            value: district.id,
                            text: district.district
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error - show a message to the user or handle it as needed
                }
            });
        } else {
            // Clear the district and DS Division dropdowns if no province is selected
            $('#districtDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select District'
            }));
            $('#dsDivisionDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select DS Division'
            }));
            $('#gndDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select GND'
            }));
        }
        // Reset hidden fields
        $('#provinceName').val('');
        $('#districtName').val('');
        $('#dsDivisionName').val('');
        $('#gndName').val('');
    });

    // Fetch DS Divisions based on selected district
    $('#districtDropdown').change(function() {
        var districtId = $(this).val();

        // Check if a district is selected
        if (districtId !== '') {
            // Fetch DS Divisions only if a valid district ID is selected
            $.ajax({
                url: '/districts/' + districtId + '/ds-divisions',
                type: 'GET',
                success: function(data) {
                    // Clear the DS Division dropdown
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));

                    // Populate DS Division dropdown
                    $.each(data, function(index, dsDivision) {
                        $('#dsDivisionDropdown').append($('<option>', {
                            value: dsDivision.id,
                            text: dsDivision.division
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error - show a message to the user or handle it as needed
                }
            });
        } else {
            // Clear the DS Division dropdown if no district is selected
            $('#dsDivisionDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select DS Division'
            }));
        }
        // Reset hidden field
        $('#dsDivisionName').val('');
    });

    // Fetch GNDs based on selected DS Division
    $('#dsDivisionDropdown').change(function() {
        var dsDivisionId = $(this).val();

        // Check if a DS Division is selected
        if (dsDivisionId !== '') {
            // Fetch GNDs only if a valid DS Division ID is selected
            $.ajax({
                url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    // Clear the GND dropdown
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));

                    // Populate GND dropdown
                    $.each(data, function(index, gnd) {
                        $('#gndDropdown').append($('<option>', {
                            value: gnd.id,
                            text: gnd.gn_division_name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error - show a message to the user or handle it as needed
                }
            });
        } else {
            // Clear the GND dropdown if no DS Division is selected
            $('#gndDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select GND'
            }));
        }
        // Reset hidden field
        $('#gndName').val('');
    });

    // Update hidden fields when options are selected
    $('#provinceDropdown').change(function() {
        $('#provinceName').val($(this).find('option:selected').text());
    });

    $('#districtDropdown').change(function() {
        $('#districtName').val($(this).find('option:selected').text());
    });

    $('#dsDivisionDropdown').change(function() {
        $('#dsDivisionName').val($(this).find('option:selected').text());
    });

    $('#gndDropdown').change(function() {
        $('#gndName').val($(this).find('option:selected').text());
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</body>
</html>
