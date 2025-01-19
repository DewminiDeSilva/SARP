<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Grievance</title>
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
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <div class="col-md-12 text-center">
        <h2 class="header-title" style="color: green;">Grievance Registration</h2>
    </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('grievances.store') }}" method="POST">




                @csrf
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="nic">NIC</label>
                        <input type="text" name="nic" id="nic" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject" class="form-control" required>
                        <option value="Engineering">Engineering</option>
                        <option value="Social">Social</option>
                        <option value="Environment">Environment</option>
                        <option value="Climate">Climate</option>
                        <option value="Nutrition">Nutrition</option>
                        <option value="Agriculture & Livestock">Agriculture & Livestock</option>
                        <option value="Value Change">Value Change</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grievance_description">Grievance Description</label>
                    <textarea name="grievance_description" id="grievance_description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="province">Province</label>
                    <input type="text" name="province" id="province" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" name="district" id="district" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="dsd">DSD</label>
                    <input type="text" name="dsd" id="dsd" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gnd">GND</label>
                    <input type="text" name="gnd" id="gnd" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="asc">ASC</label>
                    <input type="text" name="asc" id="asc" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cascade_name">Cascade Name</label>
                    <input type="text" name="cascade_name" id="cascade_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tank_name">Tank Name</label>
                    <input type="text" name="tank_name" id="tank_name" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label for="sub_project_name">Sub Project Name</label>
                        <input type="text" name="sub_project_name" id="sub_project_name" class="form-control" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="sub_project_gn_division">Sub Project GN Division</label>
                        <input type="text" name="sub_project_gn_division" id="sub_project_gn_division" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
