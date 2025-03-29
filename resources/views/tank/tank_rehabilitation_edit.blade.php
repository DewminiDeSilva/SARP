<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tank Edit</title>
    <!-- Include Bootstrap CSS and other required libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom styles */
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

        .custom-border {
            border-color: darkgreen !important;
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
        <h2 class="header-title" style="color: green;">Edit Tank Details</h2>
        </div>
</br>

  <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

        <form action="/tank_rehabilitation/{{ $tankRehabilitation->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <div class="dropdown">
                        <label for="province" class="form-label dropdown-label">Province</label>
                        <input type="text" class="form-control" id="province" name="province_name" value="{{ $tankRehabilitation->province_name }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="district" class="form-label dropdown-label">District</label>
                        <input type="text" class="form-control" id="district" name="district" value="{{ $tankRehabilitation->district }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="dsd" class="form-label dropdown-label">DSD</label>
                        <input type="text" class="form-control" id="ds_division" name="ds_division_name" value="{{ $tankRehabilitation->ds_division_name }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="gnd" class="form-label dropdown-label">GND</label>
                        <input type="text" class="form-control" id="gn_division" name="gn_division_name" value="{{ $tankRehabilitation->gn_division_name }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <label for="asc"  class="form-label dropdown-label">ASC</label>
                        <input type="text" class="form-control" id="as_centre" name="as_centre" value="{{ $tankRehabilitation->as_centre }}" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="river_basin" class="form-label dropdown-label">River Basin</label>
                            <select class="form-control btn btn-success" name="river_basin" id="river_basin" required>
                                <option value="">Select River Basin</option>
                                <option value="Mee Oya" {{ $tankRehabilitation->river_basin == 'Mee Oya' ? 'selected' : '' }}>Mee Oya</option>
                                <option value="Daduru Oya" {{ $tankRehabilitation->river_basin == 'Daduru Oya' ? 'selected' : '' }}>Daduru Oya</option>
                                <option value="Malwathu Oya" {{ $tankRehabilitation->river_basin == 'Malwathu Oya' ? 'selected' : '' }}>Malwathu Oya</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                            <div class="dropdown">
                                <label for="tank">Tank Status</label>
                                <select class="form-control btn btn-success" name="status" required>
                                    <option value="">Tank Status</option>
                                    <option value="Identified" {{ $tankRehabilitation->status == 'Identified' ? 'selected' : '' }}>Identified</option>
                                    <option value="Started" {{ $tankRehabilitation->status == 'Started' ? 'selected' : '' }}>Started</option>
                                    <option value="On Going" {{ $tankRehabilitation->status == 'On Going' ? 'selected' : '' }}>On Going</option>
                                    <option value="Completed" {{ $tankRehabilitation->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="PIR Completed" {{ $tankRehabilitation->status == 'PIR Completed' ? 'selected' : '' }}>PIR Completed</option>
                                    <option value="Survey Completed" {{ $tankRehabilitation->status == 'Survey Completed' ? 'selected' : '' }}>Survey Completed</option>
                                    <option value="Engineering Serveys" {{ $tankRehabilitation->status == 'Engineering Serveys' ? 'selected' : '' }}>Engineering Serveys</option>
                                    <option value="Drawings and Designs Completed" {{ $tankRehabilitation->status == 'Drawings and Designs Completed' ? 'selected' : '' }}>Drawings and Designs Completed</option>
                                    <option value="BOQ Completed" {{ $tankRehabilitation->status == 'BOQ Completed' ? 'selected' : '' }}>BOQ Completed</option>
                                    <option value="Ratification meeting completed" {{ $tankRehabilitation->status == 'Ratification meeting completed' ? 'selected' : '' }}>Ratification meeting completed</option>
                                    <option value="Bidding documents completed" {{ $tankRehabilitation->status == 'Bidding documents completed' ? 'selected' : '' }}>Bidding documents completed</option>
                                    <option value="IFAD no objection received" {{ $tankRehabilitation->status == 'IFAD no objection received' ? 'selected' : '' }}>IFAD no objection received</option>
                                    <option value="Paper advertised" {{ $tankRehabilitation->status == 'Paper advertised' ? 'selected' : '' }}>Paper advertised</option>
                                    <option value="Evalution of bids" {{ $tankRehabilitation->status == 'Evalution of bids' ? 'selected' : '' }}>Evalution of bids</option>
                                    <option value="Agreement Sign" {{ $tankRehabilitation->status == 'Agreement Sign' ? 'selected' : '' }}>Agreement Sign</option>
                                </select>
                                
                                
                            </div>
                        </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="tank">Implementing Agency</label>
                            <select class="form-control btn btn-secondary"  name="agency" data-bs-toggle="dropdown" aria-expanded="false" required  style="background-color: green; color: white;">
                                <option value="{{ $tankRehabilitation->agency }}">{{ $tankRehabilitation->agency }}</option>
                                <!-- Agency options -->
                            </select>
                        </div>
                    </div>
                   
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tank_id" class="form-label">Tank Id</label>
                    <input type="text" class="form-control" name="tank_id" id="tank_id" value="{{ $tankRehabilitation->tank_id }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tankProgress" class="form-label">Tank Progress</label>
                    <input type="text" class="form-control" id="tankProgress" name="progress" value="{{ $tankRehabilitation->progress }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="contractor" class="form-label">Tank Name</label>
                    <input type="text" class="form-control" name="tank_name" value="{{ $tankRehabilitation->tank_name }}" required>
                </div>
                

            <h2 class="text-center mt-5" style="font-family: Arial, sans-serif; font-weight: bold;">Contract Information</h2>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="contractor" class="form-label">Contractor Name</label>
                <input type="text" class="form-control" name="contractor" value="{{ $tankRehabilitation->contractor }}" required>
            </div>

            <div class="col-md-6 mb-3">
            <label for="accountNumberInput" class="form-label">Payment</label>
            <input type="text" class="form-control" id="payment" name="payment" value="{{ $tankRehabilitation->payment }}" required>
          </div>
            </div>

            <div class="row">
          <div class="col-md-6 mb-3">
            <label for="eotInput" class="form-label">EOT</label>
            <input type="text" class="form-control" id="" name="eot" value="{{ $tankRehabilitation->eot }}" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="constructionPeriodInput" class="form-label">Construction Period (Months)</label>
            <input type="text" class="form-control" id="" name="contract_period" value="{{ $tankRehabilitation->contract_period }}" required>
          </div>
            </div>

            <div class="row">
          <div class="col-md-6 mb-3">
            <label for="constructionPeriodInput" class="form-label">Number Of Family Members</label>
            <input type="text" class="form-control" id="" name="no_of_family" value="{{ $tankRehabilitation->no_of_family }}" required>
          </div>

          <!-- New Fields -->
          <div class="col-md-6 mb-3">
                <label for="open_ref_no" class="form-label">Open Reference Number</label>
                <input type="text" class="form-control" id="open_ref_no" name="open_ref_no" value="{{ $tankRehabilitation->open_ref_no }}">
            </div>
            </div>

          <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="latitudeInput" class="form-label">Latitude</label>
                  <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $tankRehabilitation->latitude }}" required>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="longitudeInput" class="form-label">Longitude</label>
                  <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $tankRehabilitation->longitude }}" required>
              </div>
          </div>



          <div class="row">
            <div class="col-md-6 mb-3">
                <label for="awarded_date" class="form-label">Awarded Date</label>
                <input type="date" class="form-control" id="awarded_date" name="awarded_date" value="{{ $tankRehabilitation->awarded_date }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="cumulative_amount" class="form-label">Cumulative Paid Amount</label>
                <input type="text" class="form-control" id="cumulative_amount" name="cumulative_amount" value="{{ $tankRehabilitation->cumulative_amount }}" required>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="paid_advanced_amount" class="form-label">Paid Advanced Amount</label>
                <input type="text" class="form-control" id="paid_advanced_amount" name="paid_advanced_amount" value="{{ $tankRehabilitation->paid_advanced_amount }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="recommended_ipc_no" class="form-label">Recommended IPC Number</label>
                <input type="text" class="form-control" id="recommended_ipc_no" name="recommended_ipc_no" value="{{ $tankRehabilitation->recommended_ipc_no }}" required>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="recommended_ipc_amount" class="form-label">Recommended IPC Amount</label>
                <input type="text" class="form-control" id="recommended_ipc_amount" name="recommended_ipc_amount" value="{{ $tankRehabilitation->recommended_ipc_amount }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="longitudeInput" class="form-label">Remarks</label>
                <input type="text" class="form-control" id="" name="remarks" value="{{ $tankRehabilitation->remarks }}" required>
            </div>
            </div>

            <!-- Image Fields -->
            <h2 class="mt-5 mb-4">Construction Images</h2>
            <div class="mb-3">
                <label for="image_pre_construction" class="form-label">Pre-Construction Image</label>
                <input type="file" class="form-control" name="image_pre_construction" id="image_pre_construction">
            </div>

            <div class="mb-3">
                <label for="image_during_construction" class="form-label">During Construction Image</label>
                <input type="file" class="form-control" name="image_during_construction" id="image_during_construction">
            </div>

            <div class="mb-3">
                <label for="image_post_construction" class="form-label">Post Construction Image</label>
                <input type="file" class="form-control" name="image_post_construction" id="image_post_construction">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>


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
        });

        $(document).ready(function () {
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
        });
    </script>

    <!--  JavaScript to cascade dropdown -->
    <script>
        $(document).ready(function() {
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
                                    text: gnd.gn_division
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

        $(document).ready(function () {
      // Add '%' sign to tank progress input
      $('#tankProgress').on('blur', function() {
          let value = $(this).val();
          if (value && !value.includes('%')) {
              $(this).val(value + '%');
          }
      });
  });
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
