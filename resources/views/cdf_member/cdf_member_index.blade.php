<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member List</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .container {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            margin-top: 20px;
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
            <div class="container mt-1 border rounded custom-border p-4">
                <div class="col-md-12">
                    <h2 class="mb-4">CDF Member List</h2>
                    <a href="{{ route('cdfmembers.create') }}" class="btn btn-primary mb-4">Add New Member</a>
                </div>
                
                <table class="table table-striped">
    <thead>
        <tr>
            <th>CDF Name</th>
            <th>CDF Address</th> 
            <th>Member Name</th>
            <th>NIC Number</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Youth</th>
            <th>Position</th>
            <th>Representing Organization</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cdfMembers as $cdfMember)
            <tr>
               <td>{{ $cdfMember->cdf_name }}</td>
               <td>{{ $cdfMember->cdf_address }}</td>
                <td>{{ $cdfMember->member_name }}</td>
                <td>{{ $cdfMember->member_nic }}</td>
                <td>{{ $cdfMember->address }}</td>
                <td>{{ $cdfMember->contact_number }}</td>
                <td>{{ $cdfMember->gender }}</td>
                <td>{{ $cdfMember->dob }}</td>
                <td>{{ $cdfMember->youth }}</td>
                <td>{{ $cdfMember->position }}</td>
                <td>{{ $cdfMember->representing_organization }}</td>
                <td>
                @if($cdfMember->cdf_name)
                <a href="{{ route('cdfmembers.samearea.name', ['name' => $cdfMember->cdf_name]) }}" class="btn btn-sm btn-info">View members</a>
               @else
              <span class="btn btn-sm btn-secondary disabled">No Name</span>
               @endif

                    <!-- Edit and Delete actions -->
                    <a href="/cdfmembers/{{$cdfMember->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                     <form action="/cdfmembers/{{ $cdfMember->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this member?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

             
            </div>
        </div>
    </div>
</body>
</html>
