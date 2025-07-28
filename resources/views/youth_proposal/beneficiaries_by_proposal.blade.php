<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beneficiaries by Youth Proposal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; transition: flex 0.3s ease, padding 0.3s ease; }
        .left-column.hidden { display: none; }
        .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }

        .btn-back {
            display: inline-flex; align-items: center; justify-content: center;
            color: #fff; border: none; padding: 10px 50px; border-radius: 4px;
            text-decoration: none; font-size: 14px; cursor: pointer; position: relative;
        }

        .btn-back img { width: 45px; height: auto; margin-right: 5px; transition: transform 0.3s ease; z-index: 1; }
        .btn-back .btn-text {
            opacity: 0; visibility: hidden; position: absolute; right: 25px;
            background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }

        .pagination .page-item { margin: 0; }
        .pagination .page-link { padding: 5px 10px; color: #28a745; }
        .page-item.active .page-link { color: #fff; background-color: #126926; border-color: #126926; }

        .sidebar { transition: transform 0.3s ease; }
        .sidebar.hidden { transform: translateX(-100%); }
        #sidebarToggle {
            background-color: #126926; color: white; border: none;
            padding: 10px; border-radius: 5px; cursor: pointer;
        }
        #sidebarToggle:hover { background-color: #0a4818; }

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
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <div class="text-center mb-4">
            <h2 style="color: green;">Beneficiaries Linked to: <strong>{{ $proposal->organization_name }}</strong></h2>
        </div>

        @if($proposal->beneficiaries->isEmpty())
            <p class="text-danger text-center">No beneficiaries are linked to this proposal.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>NIC</th>
                            <th>Name with Initials</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proposal->beneficiaries as $beneficiary)
                            <tr>
                                <td>{{ $beneficiary->nic }}</td>
                                <td>{{ $beneficiary->name_with_initials }}</td>
                                <td>{{ ucfirst($beneficiary->gender) }}</td>
                                <td>{{ $beneficiary->age }}</td>
                                <td>{{ $beneficiary->phone }}</td>
                                <td>{{ $beneficiary->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
            content.style.padding = '20px';
        });
    });
</script>

</body>
</html>
