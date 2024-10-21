<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
        }
        .beneficiary-section,
        .family-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .beneficiary-section h1,
        .family-section h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .beneficiary-details,
        .family-members {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .beneficiary-details p,
        .family-member p {
            margin: 5px 0;
        }
        .icon-container {
            margin-top: 10px;
        }
        .icon-container a {
            margin-right: 10px;
        }

        .showcontainer {
            position: absolute;
            right: 20px;
            left: 400px;
        }

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            /*padding: 20px;*/
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        /* Family Member Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
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
        <div class="container showcontainer">
            <div class="row">
                <div class="col-12">
                    <!-- Beneficiary Details Section -->
                    <div class="beneficiary-section">
                        <h1 style="color: green;">Beneficiary Details</h1>
                            <div class="beneficiary-details">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4>ID:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->id}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Name with Initials:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->name_with_initials}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>NIC:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->nic}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Phone:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->phone}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Gender:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->gender}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Date of Birth:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->dob}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Address:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->address}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Province Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->province_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>District Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->district_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>DS Division Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->ds_division_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>GN Division Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->gn_division_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>ASC:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->as_center}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Cascade Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->cascade_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>AI Division:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->ai_division}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Number of Family Members:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->number_of_family_members}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Head of Householder Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->head_of_householder_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Householder Number:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->householder_number}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Income Source:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->income_source}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Average Income:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->average_income}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Monthly Household Expenses:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->monthly_household_expenses}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Household Level Assets:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->household_level_assets_description}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Bank Name:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->bank_name}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Bank Branch:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->bank_branch}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Account Number:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->account_number}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Latitude:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->latitude}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Longitude:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->longitude}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Community-Based Organization:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->community_based_organization}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Type of Water Resource:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->type_of_water_resource}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h4>Training Details:</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <p>{{$beneficiary->training_details_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- Family Member Details Section -->
                    <div class="family-section">
                        <h2 style="color: green;">Family Members:</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name with Initials</th>
                                    <th>NIC</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Youth</th>
                                    <th>Education</th>
                                    <th>Income Source</th>
                                    <th>Income</th>
                                    <th>Nutrition Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($beneficiary->families as $familyMember)

                                    <tr>
                                        <td>{{$familyMember->name_with_initials}}</td>
                                        <td>{{$familyMember->nic}}</td>
                                        <td>{{$familyMember->phone}}</td>
                                        <td>{{$familyMember->gender}}</td>
                                        <td>{{$familyMember->dob}}</td>
                                        <td>{{$familyMember->youth}}</td>
                                        <td>{{$familyMember->education}}</td>
                                        <td>{{$familyMember->income_source}}</td>
                                        <td>{{$familyMember->income}}</td>
                                        <td>{{$familyMember->nutrition_level}}</td>
                                        <td>
                                            <a href='/family/{{$familyMember->id}}/edit' class="btn btn-primary btn-sm">Edit</a>
                                            <form action="/family/{{ $familyMember->id }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
