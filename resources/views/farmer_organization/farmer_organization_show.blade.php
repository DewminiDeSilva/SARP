<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SARP APP</title>
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
            left: 350px;
        }
        .frame {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }
.right-column {
    flex: 0 0 80%;
    padding: 20px;
    }

    .left-column {
        flex: 0 0 20%;
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }
    </style>

    <style>
        .inline-buttons {
    display: inline-block;
}

.btn-green {
    background-color: green;
    color: white;
    border: none;
}

.btn-red {
    background-color: red;
    color: white;
    border: none;
}

.button-spacing {
    margin-right: 5px;
}

.button-container {
    display: flex;
    align-items: center;
}

.btn-green:hover {
    background-color: darkgreen;
    color: white;
}

.btn-red:hover {
    background-color: darkred;
    color: white;
}

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
            max-width: 600px; /* Optional: set a maximum width */
        }

        .header-row {
            background-color: #129310;
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


</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>
        <div class="right-column">

        <a href="{{ route('farmerorganization.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Farmer Organization Members Details</h2>
        </div>

            <div class="showcontainer">
                <div class="row">
                    <div class="col-12">
                        <!-- Beneficiary Details Section -->
                        <div class="">

                            <div  class="my-4 custom-frame">
                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Organization Name:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{$farmerOrganization->organization_name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Registration Number:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{$farmerOrganization->registration_number}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <strong>Address:</strong>
                                    </div>
                                    <div class="col-md-7">
                                        <p>{{$farmerOrganization->address}}</p>
                                    </div>
                                </div>
                            </div>

                            </div>
                            <!-- Family Member Details Section -->
</br>

    <h2 style="color: green;">Farmer Organization Members</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="header-row">
                    <th style="color: white;">Name</th>
                    <th style="color: white;">ID</th>
                    <th style="color: white;">Position</th>
                    <th style="color: white;">Contact</th>
                    <th style="color: white;">Address</th>
                    <th style="color: white;">Gender</th>
                    <th style="color: white;">DOB</th>
                    <th style="color: white;">Youth</th>
                    <th style="color: white;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($farmerOrganization->members as $farmerMember)
                <tr>
                    <td>{{ $farmerMember->member_name }}</td>
                    <td>{{ $farmerMember->member_id }}</td>
                    <td>{{ $farmerMember->member_position }}</td>
                    <td>{{ $farmerMember->contact_number }}</td>
                    <td>{{ $farmerMember->address }}</td>
                    <td>{{ $farmerMember->gender }}</td>
                    <td>{{ $farmerMember->dob }}</td>
                    <td>{{ $farmerMember->youth }}</td>
                    <td>
                    <div class="button-container">
                        <a class="btn btn-green btn-sm button-spacing inline-buttons" href='/farmermember/{{ $farmerMember->id }}/edit'>Edit</a>
                        <form action="/farmermember/{{ $farmerMember->id }}" method="POST" class="inline-buttons">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red btn-sm">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


                            <!-- Pagination Links -->

                            <script>
                                // JavaScript to handle edit button click and populate form fields
                                $(document).ready(function() {
                                    $('.edit-family-btn').click(function() {
                                        // Get family ID from data attribute
                                        var familyId = $(this).data('family-id');
                                        // Ajax call to fetch family details
                                        $.ajax({
                                            url: '/family/' + familyId + '/edit',
                                            method: 'GET',
                                            success: function(response) {
                                                // Populate form fields with fetched data
                                                $('#edit_first_name').val(response.first_name);
                                                $('#edit_last_name').val(response.last_name);
                                                $('#edit_phone').val(response.phone);
                                                $('#edit_gender').val(response.gender);
                                                $('#edit_dob').val(response.dob);
                                                $('#edit_youth').val(response.youth);
                                                $('#edit_education').val(response.education);
                                                $('#edit_employment').val(response.employment);
                                                $('#edit_nutrition_level').val(response.nutrition_level);
                                                // Populate other fields similarly
                                            },
                                            error: function(xhr, status, error) {
                                                // Handle errors
                                            }
                                        });
                                    });
                                });
                            </script>
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
