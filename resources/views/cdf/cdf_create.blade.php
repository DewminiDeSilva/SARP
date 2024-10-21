<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CDF Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
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
    </style>
</head>
<body>


    <div class="container mt-5">
        <h2>CDF Registration</h2>
        <form class="form-horizontal" method="POST" action="{{ route('cdf.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="province" class="form-label dropdown-label">Province</label>
                        <select id="provinceDropdown" name="province" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select Province</option>
                        </select>
                        <input type="hidden" id="provinceName" name="province_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="district" class="form-label dropdown-label">District</label>
                        <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select District</option>
                        </select>
                        <input type="hidden" id="districtName" name="district_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="dsd" class="form-label dropdown-label">DSD</label>
                        <select id="dsDivisionDropdown" name="ds_division" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select DSD</option>
                        </select>
                        <input type="hidden" id="dsDivisionName" name="ds_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="gnd" class="form-label dropdown-label">GND</label>
                        <select id="gndDropdown" name="gn_division_name" class="btn btn-success dropdown-toggle" required>
                            <option value="">Select GND</option>
                        </select>
                        <input type="hidden" id="gndName" name="gn_division_name">
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="asc" class="form-label dropdown-label">ASC</label>
                        <select id="ascDropdown" name="as_center" class="btn btn-success dropdown-toggle" required>
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
            <div class="row mt-3">
                <div class="col">
                    <label for="cdfName" class="form-label">CDF Name</label>
                    <input type="text" id="cdfName" name="cdf_name" class="form-control" required>
                </div>
                <div class="col">
                    <label for="cdfAddress" class="form-label">CDF Address</label>
                    <input type="text" id="cdfAddress" name="cdf_address" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
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



</body>
</html>
