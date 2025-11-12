<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tank Rehabilitation Registration</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Beautiful Simple CSS Styles */
        body {
            background: linear-gradient(to bottom, #f5f7fa 0%, #e8ecf1 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .dropdown {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dropdown-menu {
            min-width: auto;
            max-height: 250px;
            overflow-y: auto;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .dropdown-item {
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            transform: translateX(5px);
        }

        .dropdown-toggle {
            min-width: 200px;
            transition: all 0.3s ease;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .dropdown-label {
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
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
            background-color: #ffffff;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 25px;
        }

        .custom-border {
            border-color: #28a745 !important;
            border-width: 2px !important;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 0.5px;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #28a745, #20c997);
            border-radius: 2px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .form-control {
            border-radius: 6px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            outline: none;
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: #28a745;
        }

        .btn-success {
            border-radius: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(40, 167, 69, 0.3);
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
        }

        .header-title {
            color: #28a745 !important;
            font-size: 2.2rem;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="file"] {
            border: 2px dashed #28a745;
            border-radius: 6px;
            padding: 12px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        input[type="file"]:hover {
            background-color: #e8f5e9;
            border-color: #20c997;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        /* Smooth animations */
        * {
            transition: background-color 0.2s ease, border-color 0.2s ease;
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


	<a href="{{ route('tank_rehabilitation.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

</div>




        <div class="col-md-12 text-center">
    <h2 class="header-title" style="color: green;">Tank Details</h2>
    </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

            <form action="{{ route('tank_rehabilitation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Line 1: Province to GND -->
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
                            <select id="districtDropdown" name="district" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" id="districtName" name="district">
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
                </div>

                <!-- Line 2: ASC -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">ASC</label>
                            <select id="ascDropdown" name="as_centre" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select ASC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Line 3: River Basin, Tank Status, Implementing Agency, Cascade Name - Same style as Province to ASC -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="river_basin" class="form-label dropdown-label">River Basin</label>
                            <select class="btn btn-success dropdown-toggle" name="river_basin" id="river_basin" required>
                                <option value="">Select River Basin</option>
                                <option value="Mee Oya">Mee Oya</option>
                                <option value="Daduru Oya">Daduru Oya</option>
                                <option value="Malwathu Oya">Malwathu Oya</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="dropdown">
                            <label for="status" class="form-label dropdown-label">Tank Status</label>
                            <select class="btn btn-success dropdown-toggle" name="status" id="status" required>
                                <option value="">Tank Status</option>
                                <option value="Identified">Identified</option>
                                <option value="Started">Started</option>
                                <option value="On Going">On Going</option>
                                <option value="Completed">Completed</option>
                                <option value="PIR Completed">PIR Completed</option>
                                <option value="Survey Completed">Survey Completed</option>
                                <option value="Engineering Surveys">Engineering Surveys</option>
                                <option value="Drawings and Designs Completed">Drawings and Designs Completed</option>
                                <option value="BOQ Completed">BOQ Completed</option>
                                <option value="Ratification meeting completed">Ratification meeting completed</option>
                                <option value="Bidding documents completed">Bidding documents completed</option>
                                <option value="IFAD no objection received">IFAD no objection received</option>
                                <option value="Paper advertised">Paper advertised</option>
                                <option value="Evaluation of bids">Evaluation of bids</option>
                                <option value="Agreement Sign">Agreement Sign</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="dropdown">
                            <label for="agency" class="form-label dropdown-label">Implementing Agency</label>
                            <select class="btn btn-success dropdown-toggle" name="agency" id="agency" required>
                                <option value="">Implementing Agency</option>
                                <option value="Central(ID)">Central(ID)</option>
                                <option value="DAD">DAD</option>
                                <option value="PID">PID</option>
                                <option value="ID">ID</option>
                                <option value="DI">DI</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="dropdown">
                            <label for="cascadeDropdown" class="form-label dropdown-label">Cascade Name</label>
                            <select class="btn btn-success dropdown-toggle" id="cascadeDropdown" name="cascade_name" required>
                                <option value="">Select Cascade Name</option>
                            </select>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tank_id" class="form-label">Tank ID</label>
                        <input type="text" class="form-control" name="tank_id" id="tank_id" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tankProgress" class="form-label">Tank Progress</label>
                        <input type="text" class="form-control" id="tankProgress" name="progress" placeholder="e.g., 50%" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tank_name" class="form-label">Tank Name</label>
                        <input type="text" class="form-control" id="tank_name" name="tank_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_of_family" class="form-label">Number of Household</label>
                        <input type="text" class="form-control" id="no_of_family" name="no_of_family" required>
                    </div>
                </div>
                

                <h2 class="mt-5 mb-4 text-center">Contract Information</h2>

                <!-- First line: Contractor Name, Contract Amount (Rs), Awarded Date -->
                <div class="row">
                <div class="col-4 form-group">
                    <label for="contractor" class="form-label">Contractor Name</label>
                    <input type="text" class="form-control" id="contractor" name="contractor" required>
                </div>

                <div class="col-4 form-group">
                    <label for="payment" class="form-label">Contract Amount (Rs)</label>
                    <input type="text" class="form-control" id="payment" name="payment" required>
                </div>

                <div class="col-4 form-group">
                    <label for="awarded_date" class="form-label">Awarded Date</label>
                    <input type="date" class="form-control" id="awarded_date" name="awarded_date" required>
                </div>
                </div>

                <div class="row">
                <div class="col-4 form-group">
                    <label for="eot" class="form-label">EOT (Extension of Time)</label>
                    <input type="text" class="form-control" id="eot" name="eot" required>
                </div>

                <div class="col-4 form-group">
                    <label for="contract_period" class="form-label">Construction Period (Months)</label>
                    <input type="text" class="form-control" id="contract_period" name="contract_period" required>
                </div>

                <div class="col-4 form-group">
                    <label for="open_ref_no" class="form-label">Open Reference Number</label>
                    <input type="text" class="form-control" id="open_ref_no" name="open_ref_no" required>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="e.g., 7.8731" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="e.g., 80.7718" required>
                    </div>
                </div>

                <div class="row">
                <div class="col-4 form-group">
                    <label for="paid_advanced_amount" class="form-label">Paid Advanced Amount (Rs)</label>
                    <input type="text" class="form-control" id="paid_advanced_amount" name="paid_advanced_amount" required>
                </div>

                <div class="col-4 form-group">
                    <label for="recommended_ipc_no" class="form-label">Recommended IPC Number</label>
                    <input type="text" class="form-control" id="recommended_ipc_no" name="recommended_ipc_no" required>
                </div>

                <div class="col-4 form-group">
                    <label for="recommended_ipc_amount" class="form-label">Recommended IPC Amount (Rs)</label>
                    <input type="text" class="form-control" id="recommended_ipc_amount" name="recommended_ipc_amount" required>
                </div>
                </div>

                <div class="row">
                <div class="col-12 form-group">
                    <label for="cumulative_amount" class="form-label">Cumulative Paid Amount (Rs)</label>
                    <input type="text" class="form-control" id="cumulative_amount" name="cumulative_amount" required>
                </div>
                </div>

                <div class="row">
                <div class="col-12 form-group">
                    <label for="remarks" class="form-label">Remarks <span class="text-muted">(Optional)</span></label>
                    <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter any additional remarks..."></textarea>
                </div>
                </div>

                <!-- Image uploads -->
                <h2 class="mt-5 mb-4 text-center">Construction Images</h2>

                <div class="mb-3">
                    <label for="pre_construction_image" class="form-label">Pre-Construction Image</label>
                    <input type="file" class="form-control" name="pre_construction_image" id="pre_construction_image">
                </div>

                <div class="mb-3">
                    <label for="during_construction_image" class="form-label">During Construction Image</label>
                    <input type="file" class="form-control" name="during_construction_image" id="during_construction_image">
                </div>

                <div class="mb-3">
                    <label for="post_construction_image" class="form-label">Post Construction Image</label>
                    <input type="file" class="form-control" name="post_construction_image" id="post_construction_image">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




{{-- Tank names and asc --}}
<script>
  $(document).ready(function () {
      // Add '%' sign to tank progress input
      $('#tankProgress').on('blur', function() {
          let value = $(this).val();
          if (value && !value.includes('%')) {
              $(this).val(value + '%');
          }
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
            // Populate the province dropdown
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
        $('#provinceName').val($(this).find('option:selected').text()); // Store province name in hidden input

        if (provinceId !== '') {
            // Clear and reset the district dropdown
            $('#districtDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select District'
            }));

            // Fetch districts from the selected province
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
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
    });

    // Fetch DS Divisions based on selected district
    $('#districtDropdown').change(function() {
        var districtId = $(this).val();
        $('#districtName').val($(this).find('option:selected').text()); // Store district name in hidden input

        if (districtId !== '') {
            // Clear and reset the DS Division dropdown
            $('#dsDivisionDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select DS Division'
            }));

            // Fetch DS Divisions from the selected district
            $.ajax({
                url: '/districts/' + districtId + '/ds-divisions',
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, dsDivision) {
                        $('#dsDivisionDropdown').append($('<option>', {
                            value: dsDivision.id,
                            text: dsDivision.division
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
    });

    // Fetch GN Divisions based on selected DS Division
    $('#dsDivisionDropdown').change(function() {
        var dsDivisionId = $(this).val();
        $('#dsDivisionName').val($(this).find('option:selected').text()); // Store DS Division name in hidden input

        if (dsDivisionId !== '') {
            // Clear and reset the GN Division dropdown
            $('#gndDropdown').empty().append($('<option>', {
                value: '',
                text: 'Select GN Division'
            }));

            // Fetch GN Divisions from the selected DS Division
            $.ajax({
                url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, gnd) {
                        $('#gndDropdown').append($('<option>', {
                            value: gnd.id,
                            text: gnd.gn_division_name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error for debugging
                }
            });
        }
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


<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Function to handle dropdown item selection
  document.querySelectorAll('.dropdown-menu a.dropdown-item').forEach(item => {
    item.addEventListener('click', event => {
      const dropdownMenu = event.target.closest('.dropdown-menu');
      const button = dropdownMenu.previousElementSibling;
      button.textContent = event.target.textContent;
    });
  });

  function filterDropdown(inputId, dropdownId) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    ul = document.getElementById(dropdownId);
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; i++) {
      if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
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
