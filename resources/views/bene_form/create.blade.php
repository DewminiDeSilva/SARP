<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Beneficiary Application Form</title>
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

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            color: green;
        }

        .card {
            margin-bottom: 20px;
        }
        /* Container for centering the images */




    </style>
</head>
<body>
    <div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>
        <div class="right-column">

            <a href="" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
            <div class="img" style="text-align: center;">
    <img src="{{ asset('assets/images/b12.png') }}" alt="SARP Logo" style="width: 1in; height: 1in; border-radius: 15px;">
    <img src="{{ asset('assets/images/r1.jpeg') }}" alt="SARP Logo" style="width: 1in; height: 1in; border-radius: 15px;">
    <img src="{{ asset('assets/images/sarp2.png') }}" alt="SARP Logo" style="width: 1in; height: 1in; border-radius: 15px;">
</div>

            <div class="card-header section-title">
            <div class="center-heading text-center">
                <h3 style="color: green;">කෘෂිකර්ම, ඉඩම්, පශු සම්පත්, වාරි මාර්ග, ධීවර හා ජලජ සම්පත් අමාත්‍යාංශය</h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">கமத்தொழில், காணி, கால்நடை, நீர்ப்பாசன, மீன்பிடி மற்றும் நீரியல்வளங்கள் அமைச்சு
                </h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">Ministry of Agriculture, Lands, Livestock, Irrigation, Fisheries and Aquatic Resources</h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">කෘෂිකර්ම අංශය / விவசாய பிரிவு / Agriculture Division</h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">කුඩා පරිමාණ කෘෂි ව්‍යාපාර සඳහා වන අහිතකර බලපෑම් අවම කිරීමේ ව්‍යාපෘතිය </h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">சிறியளவிலான விவசாய வணிகம் மற்றும் மீண்டெழல் கருத்திட்டம் </h3>
            </div>

            <div class="center-heading text-center">
                <h3 style="color: green;">Smallholder Agribusiness and Resilience Project </h3>
            </div>

            <div class="col-md-12 text-center">
            <div class="card-header section-title">
                <h2 class="section-title">ප්‍රතිලාභී අයදුම්පත්‍රය / Beneficiary Application Form / பயனாளி விண்ணப்பப் படிவம்</h2>
            </div>
            </div>
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

            <br>

            <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form action="{{ route('bene-form.store') }}" method="POST">

            @csrf

                    <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header section-title">Personal Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="nic_number">NIC Number</label>
                                    <input type="text" class="form-control" id="nic_number" name="nic_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="whatsapp_number">WhatsApp Number</label>
                                    <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                <label for="gender">Gender</label><br>
                                    <input type="radio" id="male" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required> Male
                                    <input type="radio" id="female" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required> Female
                                    <input type="radio" id="other" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }} required> Other
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Level -->
                    <div class="card">
                        <div class="card-header section-title">Education Level</div>
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="education_level[]" value="Up to grade 8">
                                <label class="form-check-label">Up to grade 8</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="education_level[]" value="Up to O/L">
                                <label class="form-check-label">Up to O/L</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="education_level[]" value="Diploma">
                                <label class="form-check-label">Diploma</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="education_level[]" value="Degrees">
                                <label class="form-check-label">Degrees</label>
                            </div>
                        </div>
                    </div>

                    <!-- Household Information -->
                    <div class="card">
                        <div class="card-header section-title">Household Information</div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="head_of_household">Are you the Head of Household?</label><br>
                            <input type="radio" id="head_yes" name="head_of_household" value="1" {{ old('head_of_household') == '1' ? 'checked' : '' }} required> Yes
                            <input type="radio" id="head_no" name="head_of_household" value="0" {{ old('head_of_household') == '0' ? 'checked' : '' }} required> No
</div>


                            <div class="form-group">
                                <label for="number_of_household_members">Number of Household Members</label>
                                <input type="number" class="form-control" id="number_of_household_members" name="number_of_household_members" required>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="card">
                        <div class="card-header section-title">Location Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="district">District</label>
                                    <input type="text" class="form-control" id="district" name="district" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="gramaniladhari_division">Gramaniladhari Division</label>
                                    <input type="text" class="form-control" id="gramaniladhari_division" name="gramaniladhari_division" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="divisional_secretariat">Divisional Secretariat</label>
                                    <input type="text" class="form-control" id="divisional_secretariat" name="divisional_secretariat" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="agrarian_service_division">Agrarian Service Division</label>
                                    <input type="text" class="form-control" id="agrarian_service_division" name="agrarian_service_division" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="cascade_name">Cascade Name</label>
                                    <input type="text" class="form-control" id="cascade_name" name="cascade_name" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="tank_name">Tank Name</label>
                                    <input type="text" class="form-control" id="tank_name" name="tank_name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Water Facility Information -->
                    <div class="card">
                        <div class="card-header section-title">Water Facility Information</div>
                        <div class="card-body">
                            <label>Water facility for crop land</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="water_facility[]" value="Cultivation Well">
                                <label class="form-check-label">Cultivation Well</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="water_facility[]" value="Ponds">
                                <label class="form-check-label">Ponds</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="water_facility[]" value="Lakes">
                                <label class="form-check-label">Lakes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="water_facility[]" value="Canals">
                                <label class="form-check-label">Canals</label>
                            </div>
                            <div class="form-group">
                                <label for="other_water_facility">Other (specify)</label>
                                <input type="text" class="form-control" id="other_water_facility" name="other_water_facility">
                            </div>
                        </div>
                    </div>

                    <!-- Land Ownership -->
                    <div class="card">
                        <div class="card-header section-title">Land Ownership</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="land_size">Land Size (in acres)</label>
                                    <input type="number" class="form-control" id="land_size" name="land_size" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="proposed_cultivation_area">Acres proposed to be cultivated</label>
                                    <input type="number" class="form-control" id="proposed_cultivation_area" name="proposed_cultivation_area" required>
                                </div>
                            </div>

                            <label>Type of Ownership</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Permanent Deeds" required>
                                <label class="form-check-label">Permanent Deeds</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Temporary Licenses" required>
                                <label class="form-check-label">Temporary Licenses</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ownership_type" value="By Generation" required>
                                <label class="form-check-label">By Generation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ownership_type" value="Swarna Boomi" required>
                                <label class="form-check-label">Swarna Boomi</label>
                            </div>
                        </div>
                    </div>

                    <!-- Cultivation Information -->
                    <div class="card">
                        <div class="card-header section-title">Cultivation Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="grown_crop_before">Have I grown the crop before?</label><br>
                                <input type="radio" id="grown_yes" name="grown_crop_before" value="Yes" {{ old('grown_crop_before') == 'Yes' ? 'checked' : '' }} required> Yes
                                <input type="radio" id="grown_no" name="grown_crop_before" value="No" {{ old('grown_crop_before') == 'No' ? 'checked' : '' }} required> No
                            </div>
                            <div class="form-group">
                                <label for="participated_training_before">Have I participated in training for the crop before?</label><br>
                                <input type="radio" id="training_yes" name="participated_training_before" value="Yes" {{ old('participated_training_before') == 'Yes' ? 'checked' : '' }} required> Yes
                                <input type="radio" id="training_no" name="participated_training_before" value="No" {{ old('participated_training_before') == 'No' ? 'checked' : '' }} required> No
                            </div>
                            <div class="form-group">
                                <label for="harvest_sale_buyers">Are there buyers for the harvest sale?</label><br>
                                <input type="radio" id="buyers_yes" name="harvest_sale_buyers" value="Yes" {{ old('harvest_sale_buyers') == 'Yes' ? 'checked' : '' }} required> Yes
                                <input type="radio" id="buyers_no" name="harvest_sale_buyers" value="No" {{ old('harvest_sale_buyers') == 'No' ? 'checked' : '' }} required> No
                            </div>

                            <div class="form-group">
                                <label for="buyer_details">Buyer details</label>
                                <input type="text" class="form-control" id="buyer_details" name="buyer_details">
                            </div>
                            <div class="form-group">
                                <label for="buyer_type">Who are the buyers?</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="buyer_type[]" value="Wholesalers">
                                    <label class="form-check-label">Wholesalers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="buyer_type[]" value="Retailers">
                                    <label class="form-check-label">Retailers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="buyer_type[]" value="Home Buyers">
                                    <label class="form-check-label">Home Buyers</label>
                                </div>
                                <div class="form-group">
                                    <label for="other_buyer_type">Other</label>
                                    <input type="text" class="form-control" id="other_buyer_type" name="other_buyer_type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="will_store_harvest">Will part of the harvest be stored for the next cropping season?</label><br>
                                <input type="radio" id="store_yes" name="will_store_harvest" value="Yes" {{ old('will_store_harvest') == 'Yes' ? 'checked' : '' }} required> Yes
                                <input type="radio" id="store_no" name="will_store_harvest" value="No" {{ old('will_store_harvest') == 'No' ? 'checked' : '' }} required> No
                            </div>
                            <div class="form-group">
                                <label for="store_method">If yes, how will it be done?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="store_method[]" value="Store at home">
                                    <label class="form-check-label">Store at home</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="store_method[]" value="Buy it next year">
                                    <label class="form-check-label">Buy it next year</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="store_method[]" value="Other">
                                    <label class="form-check-label">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Equipment and Machinery -->
                    <div class="card">
                        <div class="card-header section-title">Equipment and Machinery</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name of Machinery</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2-wheel tractors</td>
                                        <td><input type="number" class="form-control" name="machinery_number[2-wheel tractors]"></td>
                                    </tr>

                                    <tr>
                                        <td>Agricultural Tractors</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Agricultural Tractors]"></td>
                                    </tr>
                                    <tr>
                                        <td>Combine Harvesters</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Combine Harvesters]"></td>
                                    </tr>
                                    <tr>
                                        <td>Sprayer</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Sprayer]"></td>
                                    </tr>
                                    <tr>
                                        <td>Bush Cutters</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Bush Cutters]"></td>
                                    </tr>
                                    <tr>
                                        <td>Grass Choppers</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Grass Choppers]"></td>
                                    </tr>
                                    <tr>
                                        <td>Water Pump</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Water Pump]"></td>
                                    </tr>
                                    <tr>
                                        <td>Cultivator</td>
                                        <td><input type="number" class="form-control" name="machinery_number[Cultivator]"></td>
                                    </tr>
                                    <tr>
                                        <td>Other</td>
                                        <td>
                                            <input type="text" class="form-control" name="machinery_other_name" placeholder="Specify other machinery">
                                            <input type="number" class="form-control mt-1" name="machinery_number[Other]" placeholder="Enter number">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <label for="registered_in_fo">Registered in FO/PO/Coop?</label><br>
                                <input type="radio" id="fo_yes" name="registered_in_fo" value="Yes" {{ old('registered_in_fo') == 'Yes' ? 'checked' : '' }} required> Yes
                                <input type="radio" id="fo_no" name="registered_in_fo" value="No" {{ old('registered_in_fo') == 'No' ? 'checked' : '' }} required> No
                            </div>

                            <div class="form-group">
                                <label for="fo_name">FO/PO/Coop Name</label>
                                <input type="text" class="form-control" id="fo_name" name="fo_name">
                            </div>

                            <div class="form-group">
                                <label for="registration_number">Registration Number</label>
                                <input type="text" class="form-control" id="registration_number" name="registration_number">
                            </div>

                            <div class="form-group">
                                <label for="sign_date">Sign Date</label>
                                <input type="date" class="form-control" id="sign_date" name="sign_date">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
