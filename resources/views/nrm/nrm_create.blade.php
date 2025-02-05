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
                            <input type="hidden" id="districtName" name="district">
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
                      console.log(data);
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

<script>
    $("#startDate").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $(document).ready(function () {
        $.get('/asc', function (data) {
            $.each(data, function (index, asc) {
                $('#ascDropdown').append($('<option>', {
                    value: asc.asc_name,
                    text: asc.asc_name
                }));
            });
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
