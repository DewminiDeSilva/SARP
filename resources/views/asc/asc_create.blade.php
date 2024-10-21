<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASC Registration</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add jQuery UI library -->
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
        .submitbtton {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
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

        .dropdown-label1 {
            text-align: left;
            display: block;
            width: 100%;
            font-weight: bold
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
    </br>

        <a href="{{ route('asc_registration.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">ASC Registration</h2>
        </div>

        <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">

            <br>
            <form class="form-horizontal" method="POST" action="{{ route('asc_registration.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="form-label dropdown-label">Province</label>
                            <select id="provinceDropdown" name="province_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select Province</option>
                            </select>
                            <input type="hidden" id="provinceName" name="province_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="form-label dropdown-label">District</label>
                            <select id="districtDropdown" name="district_name" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" id="districtName" name="district_name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="dsd" class="form-label dropdown-label">DSD</label>
                            <select id="dsDivisionDropdown" name="ds_division_name" class="btn btn-success dropdown-toggle" required>
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
                    <!-- <div class="col">
                        <label for="asc_id" class="form-label dropdown-label">ASC ID</label>
                        <input type="text" id="asc_id" name="asc_id" class="form-control" required>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                            <label for="asc_name" class="form-label dropdown-label1">Agrarian Services Center Name</label>
                            <input type="text" id="asc_name" name="asc_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="dropdown">
                            <label for="officer_incharge" class="form-label dropdown-label1">Officer Incharge Name</label>
                            <input type="text" id="officer_incharge" name="officer_incharge" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                            <label for="contact_email" class="form-label dropdown-label1">Contact Email</label>
                            <input type="email" id="contact_email" name="contact_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                            <label for="contact_number" class="form-label dropdown-label1">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control" required>
                            </div>
                        </div>
                    </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="services_available" class="form-label dropdown-label1">Services Available</label>
                        <textarea id="services_available" name="services_available" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn submitbtton">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Fetch ASC names from the API endpoint
        $.get('/asc', function (data) {
            $.each(data, function (index, asc) {
                $('#ascDropdown').append($('<option>', {
                    value: asc.asc_name,
                    text: asc.asc_name
                }));
            });
        });

        // Fetch provinces
        $.ajax({
            url: '/provinces',
            type: 'GET',
            success: function(data) {
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
            if (provinceId !== '') {
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

                $.ajax({
                    url: '/provinces/' + provinceId + '/districts',
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(index, district) {
                            $('#districtDropdown').append($('<option>', {
                                value: district.id,
                                text: district.district
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
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
            $('#provinceName').val('');
            $('#districtName').val('');
            $('#dsDivisionName').val('');
            $('#gndName').val('');
        });

        // Fetch DS Divisions based on selected district
        $('#districtDropdown').change(function() {
            var districtId = $(this).val();
            if (districtId !== '') {
                $.ajax({
                    url: '/districts/' + districtId + '/ds-divisions',
                    type: 'GET',
                    success: function(data) {
                        $('#dsDivisionDropdown').empty().append($('<option>', {
                            value: '',
                            text: 'Select DS Division'
                        }));
                        $.each(data, function(index, dsDivision) {
                            $('#dsDivisionDropdown').append($('<option>', {
                                value: dsDivision.id,
                                text: dsDivision.division
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#dsDivisionDropdown').empty().append($('<option>', {
                    value: '',
                    text: 'Select DS Division'
                }));
            }
            $('#dsDivisionName').val('');
        });

        // Fetch GNDs based on selected DS Division
        $('#dsDivisionDropdown').change(function() {
            var dsDivisionId = $(this).val();
            if (dsDivisionId !== '') {
                $.ajax({
                    url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                    type: 'GET',
                    success: function(data) {
                        $('#gndDropdown').empty().append($('<option>', {
                            value: '',
                            text: 'Select GND'
                        }));
                        $.each(data, function(index, gnd) {
                            $('#gndDropdown').append($('<option>', {
                                value: gnd.id,
                                text: gnd.gn_division_name
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#gndDropdown').empty().append($('<option>', {
                    value: '',
                    text: 'Select GND'
                }));
            }
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
