<!-- resources/views/nutrition_trainee/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Trainees</title>
    <!-- Bootstrap CSS -->
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
    <h1>Nutrition Trainees List</h1>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>NIC</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Education Level</th>
                <th>Income Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{ $trainee->full_name }}</td>
                    <td>{{ $trainee->nic }}</td>
                    <td>{{ $trainee->address }}</td>
                    <td>{{ $trainee->dob }}</td>
                    <td>{{ $trainee->gender }}</td>
                    <td>{{ $trainee->mobile }}</td>
                    <td>{{ $trainee->education_level }}</td>
                    <td>{{ $trainee->income_level }}</td>
                    <td>
                        <a href="{{ route('nutrition_trainee.edit', $trainee->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('nutrition_trainee.destroy', $trainee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $trainees->links() }}
</div>
    </div>

</body>
</html>
