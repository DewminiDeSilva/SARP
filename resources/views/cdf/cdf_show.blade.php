<!-- resources/views/cdf/cdf_show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDF Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
        }

        .left-column {
            width: 250px;
            background-color: #2c3e50;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
        }

        .left-column a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .left-column a:hover {
            background-color: #34495e;
        }

        .content {
            margin-left: 270px; /* Adjust according to left-column width */
            padding: 20px;
            width: calc(100% - 270px);
        }

        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        h2 {
            color: #4CAF50;
            margin-top: 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
@include('dashboard.header')
    <div class="content" style="padding-top: 70px;">
        <h1>{{ $cdf->cdf_name }} Details</h1>
        <p><strong>Address:</strong> {{ $cdf->cdf_address }}</p>
        <p><strong>Province:</strong> {{ $cdf->province_name }}</p>
        <p><strong>District:</strong> {{ $cdf->district_name }}</p>
        <p><strong>DS Division:</strong> {{ $cdf->ds_division_name }}</p>
        <p><strong>GN Division:</strong> {{ $cdf->gn_division_name }}</p>
        <p><strong>AS Center:</strong> {{ $cdf->as_center }}</p>

        <h2>Members in the Same CDF</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Member Address</th>
                    <th>NIC Number</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Youth</th>
                    <th>Position</th>
                    <th>Representing Organization</th>
                    <!-- Add other member fields as necessary -->
                </tr>
            </thead>
            <tbody>
                @foreach ($membersInSameCDF as $member)
                    <tr>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->member_nic }}</td>
                        <td>{{ $member->contact_number }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->dob }}</td>
                        <td>{{ $member->youth }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->representing_organization }}</td>
                        <!-- Add other member fields as necessary -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('cdf.index') }}" class="back-link">Back to List</a>
    </div>
</body>
</html>
