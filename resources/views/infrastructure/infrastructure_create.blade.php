<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infrastructure Registration</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Your custom CSS -->
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

        /* Adjust button width to fit the content */
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }

        /* Center align labels */
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }

        /* Adjust dropdown button text alignment */
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
            border-color: darkgreen !important; /* Override the border-primary color */
        }

        h2 {
            font-family: sans-serif; /* Change to your desired font */
            font-weight: bold;
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

</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">

    <a href="{{ route('infrastructure.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
        <h2 class="header-title" style="color: green;">Infrastructure Details</h2>
        </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

            <form action="{{ route('infrastructure.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">ASC</label>
                            <select id="ascDropdown" name="as_centre" class="btn btn-success dropdown-toggle" required>
                                <option value="">Select ASC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <!-- Inside create and edit blade files -->




                        <div class="col">
                            <div class="dropdown">
                                <label for="infrastructure_status">Infrastructure Status</label>
                                <select class="form-control btn btn-success" name="status" data-bs-toggle="dropdown" aria-expanded="false" required>
                                    <option value="">Infrastructure Status</option>
                                    <option value="Identified">Identified</option>
                                    <option value="Started">Started</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Finished">Finished</option>
                                    <option value="PIR Completed">PIR Completed</option>
                                    <option value="Survey Completed">Survey Completed</option>
                                    <option value="Engineering Serveys">Engineering Serveys</option>
                                    <option value="Drawings and Designs Completed">Drawings and Designs Completed</option>
                                    <option value="BOQ Completed">BOQ Completed</option>
                                    <option value="Ratification meeting completed">Ratification meeting completed</option>
                                    <option value="Bidding documents completed">Bidding documents completed</option>
                                    <option value="IFAD no objection received">IFAD no objection received</option>
                                    <option value="Paper advertised">Paper advertised</option>
                                    <option value="Evalution of bids">Evalution of bids</option>
                                    <option value="Agreement Sign">Agreement Sign</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                                <label for="agency">Implementing Agency</label>
                                <select class="form-control btn btn-success" name="agency" data-bs-toggle="dropdown" aria-expanded="false" required>
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
                                <label for="cascade">Cascade Name</label>
                                <select class="form-control btn btn-success" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                                    <option value="">Select Cascade name</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="type_of_infrastructure" class="form-label">Type of Infrastructure</label>
                      <input type="text" class="form-control" name="type_of_infrastructure" id="type_of_infrastructure" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="infrastructure_progress" class="form-label">Infrastructure Progress</label>
                      <input type="text" class="form-control" id="infrastructureProgress" name="infrastructure_progress" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="river_basin" class="form-label">River Basin</label>
                    <input type="text" class="form-control" name="river_basin" id="river_basin" required>
                </div>

                <div class="mb-3">
                    <label for="infrastructure_description" class="form-label">Infrastructure Description</label>
                    <textarea class="form-control" id="infrastructure_description" name="infrastructure_description" rows="3" required></textarea>
                </div>

                <h2 class="mt-5 mb-4">Contract Information</h2>

                <div class="mb-3">
                    <label for="contractor" class="form-label">Contractor Name</label>
                    <input type="text" class="form-control" id="contractor" name="contractor" required>
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment</label>
                    <input type="text" class="form-control" id="payment" name="payment" required>
                </div>
                <div class="mb-3">
                    <label for="eot" class="form-label">EOT</label>
                    <input type="text" class="form-control" id="eot" name="eot" required>
                </div>
                <div class="mb-3">
                    <label for="contract_period" class="form-label">Construction Period (Months)</label>
                    <input type="text" class="form-control" id="contract_period" name="contract_period" required>
                </div>
                <div class="mb-3">
                    <label for="no_of_family" class="form-label">Number Of Family Members</label>
                    <input type="text" class="form-control" id="no_of_family" name="no_of_family" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <input type="text" class="form-control" id="remarks" name="remarks" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Infrastructure type, ASC, and Cascade names --}}
<script>

  $(document).ready(function () {
      // Fetch infrastructure types from the API endpoint
      $.get('/infrastructure-types', function (data) {
          // Populate the dropdown menu with infrastructure types
          $.each(data, function (index, infrastructure) {
              $('#infrastructureTypeDropdown').append($('<option>', {
                  value: infrastructure.type_of_infrastructure,
                  text: infrastructure.type_of_infrastructure
              }));
          });
      });

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
  });
</script>

<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
      // Add '%' sign to infrastructure progress input
      $('#infrastructureProgress').on('blur', function() {
          let value = $(this).val();
          if (value && !value.includes('%')) {
              $(this).val(value + '%');
          }
      });
  });
</script>

</body>
</html>
