<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EOI Beneficiaries</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
       
        .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; }
        .sidebar.hidden { transform: translateX(-100%); }
        .left-column.hidden { display: none; }
        .right-column { transition: flex 0.3s ease, padding 0.3s ease; }
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
        <!-- <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('expressions.evaluation_completed') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div> -->
         <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('expressions.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span>Back</span>
            </a>
        </div>


        <div class="center-heading text-center">
            <h1 style="font-size: 2.5rem; color: green;">Registered Beneficiaries - {{  $eoi->eoi_business_title }} ({{ $eoi->category }})</h1>
        </div>

        @if ($beneficiaries->isEmpty())
            <div class="alert alert-warning mt-4">No beneficiaries found for this EOI title and category.</div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>NIC</th>
                            <th>Name with Initials</th>
                            <th>GN Division</th>
                            <th>Business Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->nic }}</td>
                            <td>{{ $beneficiary->name_with_initials }}</td>
                            <td>{{ $beneficiary->gn_division_name }}</td>
                            <td>{{ $beneficiary->eoi_business_title }}</td>
                            <td>{{ $beneficiary->eoi_category }}</td>
                            <td>
                                <a href="{{ route('eoi_form.create', $beneficiary->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus-circle"></i> Add EOI Data
                                </a>
                                        @if($beneficiary->eoiForm)
            <a href="{{ route('eoi_form.show', $beneficiary->id) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i> View EOI Data
            </a>
        @endif


                            </td>
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
