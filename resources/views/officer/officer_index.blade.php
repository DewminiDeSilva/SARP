<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Officers for Grievance</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="container mt-5">
            <h2>{{ $grievance->name }}</h2>
            <h3>Grievance Description : {{ $grievance->grievance_description }}</h3>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Institution</th>
                        <th>Actions Taken</th>
                        <th>Action Taken Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($officers as $officer)
                        <tr>
                            <td>{{ $officer->id }}</td>
                            <td>{{ $officer->name }}</td>
                            <td>{{ $officer->designation }}</td>
                            <td>{{ $officer->institution }}</td>
                            <td>{{ $officer->actions_taken }}</td>
                            <td>{{ $officer->action_taken_date }}</td>
                            <td>{{ $officer->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $officers->links() }}
                </ul>
            </nav>
            <a href="{{ route('grievances.index') }}" class="btn btn-primary">Back to Grievances</a>
        </div>
    </div>
</div>
</body>
</html>
