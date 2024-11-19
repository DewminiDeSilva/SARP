<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Application Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

.frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        .custom-frame {
            border: 2px solid rgba(0, 128, 0, 0.2);
            background-color: rgba(0, 128, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;

        }
        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="section-title">Beneficiary Application Details</h2>
    <div class="frame">
    <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>
    <div class="right-column">
    <!-- Personal Information -->
    <div class="custom-frame">
        <h4>Personal Information</h4>
        <div class="row">
            <div class="col-md-5">
                <strong>Full Name:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->full_name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Address:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->address }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Phone Number:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->phone_number }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>NIC Number:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->nic_number }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Date of Birth:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->dob }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Email:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Age:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->age }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Gender:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ ucfirst($beneForm->gender) }}</p>
            </div>
        </div>
    </div>

    <!-- Household Information -->
    <div class="custom-frame">
        <h4>Household Information</h4>
        <div class="row">
            <div class="col-md-5">
                <strong>Head of Household:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->head_of_household ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Number of Household Members:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->number_of_household_members }}</p>
            </div>
        </div>
    </div>

    <!-- Location Information -->
    <div class="custom-frame">
        <h4>Location Information</h4>
        <div class="row">
            <div class="col-md-5">
                <strong>District:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->district }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Gramaniladhari Division:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->gramaniladhari_division }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Divisional Secretariat:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->divisional_secretariat }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Agrarian Service Division:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->agrarian_service_division }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Cascade Name:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->cascade_name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Tank Name:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->tank_name }}</p>
            </div>
        </div>
    </div>

    <!-- Land & Cultivation Information -->
    <div class="custom-frame">
        <h4>Land & Cultivation Information</h4>
        <div class="row">
            <div class="col-md-5">
                <strong>Land Size (in acres):</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->land_size }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Proposed Cultivation Area (in acres):</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->proposed_cultivation_area }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Ownership Type:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->ownership_type }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <strong>Have you grown this crop before?</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->grown_crop_before ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Participated in training before?</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->participated_training_before ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Are there buyers for the harvest sale?</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->harvest_sale_buyers ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Buyer Details:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->buyer_details }}</p>
            </div>
        </div>
    </div>

    <!-- Machinery Information -->
    <div class="custom-frame">
        <h4>Machinery Information</h4>
        <div class="row">
            <div class="col-md-5">
                <strong>Machinery:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ implode(', ', $beneForm->machinery_number ?? []) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Registered in FO/PO/Coop?</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->registered_in_fo ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>FO/PO/Coop Name:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->fo_name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Registration Number:</strong>
            </div>
            <div class="col-md-7">
                <p>{{ $beneForm->registration_number }}</p>
            </div>
        </div>
    </div>

    </div>
</div>

</body>
</html>
