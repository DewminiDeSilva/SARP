<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add youth data - {{ $proposal->business_title ?? $proposal->organization_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .btn-back { display: inline-flex; align-items: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
        .view-button { color: white; background-color: #60C267; }
        .view-button:hover { border-color: green; color: white; }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column" style="padding:70px;">
        <div class="d-flex align-items-center mb-3">
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposal.agreementSigned') }}" class="btn-back" style="background-color: #126926;">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <div class="text-center mb-4">
            <h2 style="font-size: 2rem; color: green;">Add youth data</h2>
            <p class="text-muted mb-0">{{ $proposal->business_title ?? $proposal->organization_name }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-light"><strong>Register new beneficiary</strong></div>
            <div class="card-body">
                <p class="mb-2">Create a new beneficiary and link them to this youth proposal.</p>
                <a href="{{ route('beneficiary.create', ['youth_proposal_id' => $proposal->id]) }}" class="btn view-button">
                    <i class="fas fa-plus-circle"></i> Register new beneficiary
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('d-none');
                content.style.flex = sidebar.classList.contains('d-none') ? '0 0 100%' : '0 0 80%';
            });
        }
    });
</script>
</body>
</html>
