<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tank Rehabilitation Edit</title>

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
        transition: transform 0.3s ease;
    }

    .sidebar.hidden {
        transform: translateX(-100%);
    }

    #sidebarToggle {
        background-color: #126926;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818;
    }

    .left-column.hidden {
        display: none;
    }
    .right-column {
        transition: flex 0.3s ease, padding 0.3s ease;
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Edit Tank Details</h2>
        </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form action="/tank_rehabilitation/{{ $tankRehabilitation->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Line 1: Province to GND -->
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
                </div>

                <!-- Line 2: ASC -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">ASC</label>
                            <input type="text" class="form-control" id="as_centre" name="as_centre" value="{{ $tankRehabilitation->as_centre }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Line 3: River Basin, Tank Status, Implementing Agency, Cascade Name -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="river_basin" class="form-label dropdown-label">River Basin</label>
                            <select class="btn btn-success dropdown-toggle" name="river_basin" id="river_basin" required>
                                <option value="">Select River Basin</option>
                                <option value="Mee Oya" {{ $tankRehabilitation->river_basin == 'Mee Oya' ? 'selected' : '' }}>Mee Oya</option>
                                <option value="Daduru Oya" {{ $tankRehabilitation->river_basin == 'Daduru Oya' ? 'selected' : '' }}>Daduru Oya</option>
                                <option value="Malwathu Oya" {{ $tankRehabilitation->river_basin == 'Malwathu Oya' ? 'selected' : '' }}>Malwathu Oya</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="dropdown">
                            <label for="status" class="form-label dropdown-label">Tank Status</label>
                            <select class="btn btn-success dropdown-toggle" name="status" id="status" required>
                                <option value="">Tank Status</option>
                                <option value="Identified" {{ $tankRehabilitation->status == 'Identified' ? 'selected' : '' }}>Identified</option>
                                <option value="Started" {{ $tankRehabilitation->status == 'Started' ? 'selected' : '' }}>Started</option>
                                <option value="On Going" {{ $tankRehabilitation->status == 'On Going' ? 'selected' : '' }}>On Going</option>
                                <option value="Completed" {{ $tankRehabilitation->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="PIR Completed" {{ $tankRehabilitation->status == 'PIR Completed' ? 'selected' : '' }}>PIR Completed</option>
                                <option value="Survey Completed" {{ $tankRehabilitation->status == 'Survey Completed' ? 'selected' : '' }}>Survey Completed</option>
                                <option value="Engineering Surveys" {{ $tankRehabilitation->status == 'Engineering Surveys' ? 'selected' : '' }}>Engineering Surveys</option>
                                <option value="Drawings and Designs Completed" {{ $tankRehabilitation->status == 'Drawings and Designs Completed' ? 'selected' : '' }}>Drawings and Designs Completed</option>
                                <option value="BOQ Completed" {{ $tankRehabilitation->status == 'BOQ Completed' ? 'selected' : '' }}>BOQ Completed</option>
                                <option value="Ratification meeting completed" {{ $tankRehabilitation->status == 'Ratification meeting completed' ? 'selected' : '' }}>Ratification meeting completed</option>
                                <option value="Bidding documents completed" {{ $tankRehabilitation->status == 'Bidding documents completed' ? 'selected' : '' }}>Bidding documents completed</option>
                                <option value="IFAD no objection received" {{ $tankRehabilitation->status == 'IFAD no objection received' ? 'selected' : '' }}>IFAD no objection received</option>
                                <option value="Paper advertised" {{ $tankRehabilitation->status == 'Paper advertised' ? 'selected' : '' }}>Paper advertised</option>
                                <option value="Evaluation of bids" {{ $tankRehabilitation->status == 'Evaluation of bids' ? 'selected' : '' }}>Evaluation of bids</option>
                                <option value="Agreement Sign" {{ $tankRehabilitation->status == 'Agreement Sign' ? 'selected' : '' }}>Agreement Sign</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="dropdown">
                            <label for="agency" class="form-label dropdown-label">Implementing Agency</label>
                            <select class="btn btn-success dropdown-toggle" name="agency" id="agency" required>
                                <option value="">Implementing Agency</option>
                                <option value="Central(ID)" {{ $tankRehabilitation->agency == 'Central(ID)' ? 'selected' : '' }}>Central(ID)</option>
                                <option value="DAD" {{ $tankRehabilitation->agency == 'DAD' ? 'selected' : '' }}>DAD</option>
                                <option value="PID" {{ $tankRehabilitation->agency == 'PID' ? 'selected' : '' }}>PID</option>
                                <option value="ID" {{ $tankRehabilitation->agency == 'ID' ? 'selected' : '' }}>ID</option>
                                <option value="DI" {{ $tankRehabilitation->agency == 'DI' ? 'selected' : '' }}>DI</option>
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
                        <input type="text" class="form-control" name="tank_id" id="tank_id" value="{{ $tankRehabilitation->tank_id }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tankProgress" class="form-label">Tank Progress</label>
                        <input type="text" class="form-control" id="tankProgress" name="progress" value="{{ $tankRehabilitation->progress }}" placeholder="e.g., 50%" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tank_name" class="form-label">Tank Name</label>
                        <input type="text" class="form-control" id="tank_name" name="tank_name" value="{{ $tankRehabilitation->tank_name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_of_family" class="form-label">Number of Household</label>
                        <input type="text" class="form-control" id="no_of_family" name="no_of_family" value="{{ $tankRehabilitation->no_of_family }}" required>
                    </div>
                </div>

                <h2 class="mt-5 mb-4 text-center">Contract Information</h2>

                <!-- First line: Contractor Name, Contract Amount (Rs), Awarded Date -->
                <div class="row">
                <div class="col-4 form-group">
                    <label for="contractor" class="form-label">Contractor Name</label>
                    <input type="text" class="form-control" id="contractor" name="contractor" value="{{ $tankRehabilitation->contractor }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="payment" class="form-label">Contract Amount (Rs)</label>
                    <input type="text" class="form-control" id="payment" name="payment" value="{{ $tankRehabilitation->payment }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="awarded_date" class="form-label">Awarded Date</label>
                    <input type="date" class="form-control" id="awarded_date" name="awarded_date" value="{{ $tankRehabilitation->awarded_date }}" required>
                </div>
                </div>

                <div class="row">
                <div class="col-4 form-group">
                    <label for="eot" class="form-label">EOT (Extension of Time)</label>
                    <input type="text" class="form-control" id="eot" name="eot" value="{{ $tankRehabilitation->eot }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="contract_period" class="form-label">Construction Period (Months)</label>
                    <input type="text" class="form-control" id="contract_period" name="contract_period" value="{{ $tankRehabilitation->contract_period }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="open_ref_no" class="form-label">Open Reference Number</label>
                    <input type="text" class="form-control" id="open_ref_no" name="open_ref_no" value="{{ $tankRehabilitation->open_ref_no }}" required>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $tankRehabilitation->latitude }}" placeholder="e.g., 7.8731" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $tankRehabilitation->longitude }}" placeholder="e.g., 80.7718" required>
                    </div>
                </div>

                <div class="row">
                <div class="col-4 form-group">
                    <label for="paid_advanced_amount" class="form-label">Paid Advanced Amount (Rs)</label>
                    <input type="text" class="form-control" id="paid_advanced_amount" name="paid_advanced_amount" value="{{ $tankRehabilitation->paid_advanced_amount }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="recommended_ipc_no" class="form-label">Recommended IPC Number</label>
                    <input type="text" class="form-control" id="recommended_ipc_no" name="recommended_ipc_no" value="{{ $tankRehabilitation->recommended_ipc_no }}" required>
                </div>

                <div class="col-4 form-group">
                    <label for="recommended_ipc_amount" class="form-label">Recommended IPC Amount (Rs)</label>
                    <input type="text" class="form-control" id="recommended_ipc_amount" name="recommended_ipc_amount" value="{{ $tankRehabilitation->recommended_ipc_amount }}" required>
                </div>
                </div>

                <div class="row">
                <div class="col-12 form-group">
                    <label for="cumulative_amount" class="form-label">Cumulative Paid Amount (Rs)</label>
                    <input type="text" class="form-control" id="cumulative_amount" name="cumulative_amount" value="{{ $tankRehabilitation->cumulative_amount }}" required>
                </div>
                </div>

                <div class="row">
                <div class="col-12 form-group">
                    <label for="remarks" class="form-label">Remarks <span class="text-muted">(Optional)</span></label>
                    <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter any additional remarks...">{{ $tankRehabilitation->remarks }}</textarea>
                </div>
                </div>

                <!-- Image uploads -->
                <h2 class="mt-5 mb-4 text-center">Construction Images</h2>

                <div class="mb-3">
                    <label for="image_pre_construction" class="form-label">Pre-Construction Image</label>
                    <input type="file" class="form-control" name="image_pre_construction" id="image_pre_construction">
                    @if($tankRehabilitation->pre_construction_image)
                        <small class="text-muted">Current: <a href="{{ asset('storage/' . $tankRehabilitation->pre_construction_image) }}" target="_blank">View Image</a></small>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="image_during_construction" class="form-label">During Construction Image</label>
                    <input type="file" class="form-control" name="image_during_construction" id="image_during_construction">
                    @if($tankRehabilitation->during_construction_image)
                        <small class="text-muted">Current: <a href="{{ asset('storage/' . $tankRehabilitation->during_construction_image) }}" target="_blank">View Image</a></small>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="image_post_construction" class="form-label">Post Construction Image</label>
                    <input type="file" class="form-control" name="image_post_construction" id="image_post_construction">
                    @if($tankRehabilitation->post_construction_image)
                        <small class="text-muted">Current: <a href="{{ asset('storage/' . $tankRehabilitation->post_construction_image) }}" target="_blank">View Image</a></small>
                    @endif
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
        
        // Set selected value if exists
        @if($tankRehabilitation->cascade_name)
            $('#cascadeDropdown').val('{{ $tankRehabilitation->cascade_name }}');
        @endif
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');

            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%';
                content.style.padding = '20px';
            } else {
                content.style.flex = '0 0 80%';
                content.style.padding = '20px';
            }
        });
    });
</script>
</body>
</html>
