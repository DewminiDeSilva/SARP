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

    @include('partials.sarp_green_theme')

    
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
            <button type="button" id="sidebarToggle" class="btn mr-2"><i class="fas fa-bars"></i></button>
            <a href="javascript:void(0);" onclick="window.history.back();" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>


        <div class="center-heading text-center">
            <h1 class="sarp-page-title">Registered Beneficiaries - {{  $eoi->business_title }} ({{ $eoi->category }})</h1>
        </div>

        @if ($beneficiaries->isEmpty())
            <div class="alert alert-sarp-muted mt-4">No beneficiaries found for this EOI title and category.</div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped table-sarp-green">
                    <thead>
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
                                    <i class="fas fa-plus-circle"></i> Add Data
                                </a>
                                <a href="{{ route('eoi_form.show', $beneficiary->id) }}" class="btn btn-sm btn-sarp-outline ml-1">
                                    <i class="fas fa-eye"></i> View EOI Data
                                </a>
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
