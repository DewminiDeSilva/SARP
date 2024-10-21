<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Trainee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

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
            border-right: 1px solid #dee2e6;
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

<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">

    <a href="{{ route('nutrition.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3>Edit Trainee Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('nutrition_trainee.update', $trainee->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $trainee->full_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nic">NIC</label>
                        <input type="text" class="form-control" id="nic" name="nic" value="{{ $trainee->nic }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $trainee->address }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $trainee->dob }}" required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $trainee->age }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label><br>
                        <input type="radio" id="male" name="gender" value="Male" {{ $trainee->gender == 'Male' ? 'checked' : '' }} required> Male
                        <input type="radio" id="female" name="gender" value="Female" {{ $trainee->gender == 'Female' ? 'checked' : '' }} required> Female
                        <input type="radio" id="other" name="gender" value="Other" {{ $trainee->gender == 'Other' ? 'checked' : '' }} required> Other
                    </div>

                    <div class="form-group">
                        <label for="mobile_number">Mobile</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $trainee->mobile_number }}" required>
                    </div>

                    <div class="form-group">
                        <label for="education_level">Education Level</label>
                        <select class="form-control" id="education_level" name="education_level" required>
                            <option value="Grade 8 Pass" {{ $trainee->education_level == 'Grade 8 Pass' ? 'selected' : '' }}>Grade 8 Pass</option>
                            <option value="O/L" {{ $trainee->education_level == 'O/L' ? 'selected' : '' }}>O/L</option>
                            <option value="A/L" {{ $trainee->education_level == 'A/L' ? 'selected' : '' }}>A/L</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="income_level">Income Level</label>
                        <input type="text" class="form-control" id="income_level" name="income_level" value="{{ $trainee->income_level }}" required>
                    </div>

                    <div class="form-group">
                        <label for="special_remark">Special Remark</label>
                        <textarea class="form-control" id="special_remark" name="special_remark">{{ $trainee->special_remark }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
