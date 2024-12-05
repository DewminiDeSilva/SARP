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

<style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 7px;
        }
        .tank-section {
            background-color: #F0F0F0;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Black shadow */
        }
        .tank-section h1 {
            text-align: left;
            margin-bottom: 30px;
        }
        .tank-details .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .tank-details .info label {
            font-weight: bold;
            width: 30%;
        }
        .tank-details .info p {
            width: 70%;
            margin: 0;
        }
        .tank-details .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        .tank-details .info img {
            margin-right: 5px;
            width: 50px;
            height: 50px;
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

        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #C1FFAC;
        }

        .card-body {
            padding: 15px;

        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        /* Additional spacing for the cards */
        .row.mt-4 {
            margin-top: 1.5rem;
        }
    </style>

<style>

.custom-frame {
            border: 2px solid rgba(0, 128, 0, 0.2);
            background-color: rgba(0, 128, 0, 0.2);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            /*align-items: center;*/
            justify-content: center;
            margin: 20px auto; /* Center horizontally and add vertical margin */
            max-width: 800px; /* Optional: set a maximum width */
        }

        .header-row {
            background-color: #129310;
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
        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Beneficiary Details</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Beneficiary Details Section -->
                    <div class="tank-section custom-frame">


                            <div class="tank-details">
                                    <div class="info">
                                        <label>ID:</label>
                                        <p>{{$beneficiary->id}}</p>
                                    </div>
                                    <div class="info">
                                        <label>Name with Initials:</label>
                                        <p>{{$beneficiary->name_with_initials}}</p>
                                    </div>

                                    <div class="info">
                                        <label>NIC:</label>
                                        <p>{{$beneficiary->nic}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Phone:</label>
                                        <p>{{$beneficiary->phone}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Gender:</label>
                                        <p>{{$beneficiary->gender}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Date of Birth:</label>
                                        <p>{{$beneficiary->dob}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Address:</label>
                                        <p>{{$beneficiary->address}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Province Name:</label>
                                        <p>{{$beneficiary->province_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>District Name:</label>
                                        <p>{{$beneficiary->district_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>DS Division Name:</label>
                                        <p>{{$beneficiary->ds_division_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>GN Division Name:</label>
                                        <p>{{$beneficiary->gn_division_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>ASC:</label>
                                        <p>{{$beneficiary->as_center}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Cascade Name:</label>
                                        <p>{{$beneficiary->cascade_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>AI Division:</label>
                                        <p>{{$beneficiary->ai_division}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Number of Family Members:</label>
                                        <p>{{$beneficiary->number_of_family_members}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Head of Householder Name:</label>
                                        <p>{{$beneficiary->head_of_householder_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Householder Number:</label>
                                        <p>{{$beneficiary->householder_number}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Income Source:</label>
                                        <p>{{$beneficiary->income_source}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Average Income:</label>
                                        <p>{{$beneficiary->average_income}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Monthly Household Expenses:</label>
                                        <p>{{$beneficiary->monthly_household_expenses}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Household Level Assets:</label>
                                        <p>{{$beneficiary->household_level_assets_description}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Bank Name:</label>
                                        <p>{{$beneficiary->bank_name}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Bank Branch:</label>
                                        <p>{{$beneficiary->bank_branch}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Account Number:</label>
                                        <p>{{$beneficiary->account_number}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Latitude:</label>
                                        <p>{{$beneficiary->latitude}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Longitude:</label>
                                        <p>{{$beneficiary->longitude}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Community-Based Organization:</label>
                                        <p>{{$beneficiary->community_based_organization}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Type of Water Resource:</label>
                                        <p>{{$beneficiary->type_of_water_resource}}</p>
                                    </div>

                                    <div class="info">
                                        <label>Training Details:</label>
                                        <p>{{$beneficiary->training_details_description}}</p>
                                    </div>
                                    <div class="container">
    
    <hr>

    <!-- Display Input1: Agriculture/Livestock -->
    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Agriculture/Livestock:</strong>
        </div>
        <div class="col-md-6">
            {{ $beneficiary->input1 ?? 'N/A' }}
        </div>
    </div>

    <!-- Display Input2 and Input3 based on Input1 -->
    @if ($beneficiary->input1 === 'agriculture')
        <!-- Agriculture Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Crop Category:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input2 ?? 'N/A' }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Crop Name:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input3 ?? 'N/A' }}
            </div>
        </div>
    @elseif ($beneficiary->input1 === 'livestock')
        <!-- Livestock Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Livestock Type:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input2 ?? 'N/A' }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Production Focus:</strong>
            </div>
            <div class="col-md-6">
                {{ $beneficiary->input3 ?? 'N/A' }}
            </div>
        </div>
    @else
        <!-- Default Section for No Data -->
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Details:</strong>
            </div>
            <div class="col-md-6">
                No details available.
            </div>
        </div>
    @endif
</div>

                                </div>
                            </div>
                        </div>


                    <!-- Family Member Details Section -->
                    <div class="">
                        <h2 style="color: green;">Family Members</h2>
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
                                        <td  class="button-container">
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
