<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the image container */
        .img-container {
            display: flex;
            justify-content: center; /* Horizontally center the images */
            align-items: center;
            gap: 30px; /* Space between images */
            margin-top: 20px;
        }

        .img-container img {
            border-radius: 15px;
            height: auto;
            max-width: 100%; /* Ensures the images don't exceed the container width */
            width: 150px; /* Adjust the width of the images */
        }

        .btn-large {
            width: 100%;
            height: 200px;
            font-size: 24px;
        }

        .container {
            margin-top: 50px;
        }

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
    </style>
</head>
<body>
@include('dashboard.header')
<div style="padding-top: 70px;">
    <!-- Center the images in a flexbox container -->
    <div class="img-container">
        <img src="{{ asset('assets/images/b12.png') }}" alt="Image 1">
        <img src="{{ asset('assets/images/r1.jpeg') }}" alt="Image 2">
        <img src="{{ asset('assets/images/sarp2.png') }}" alt="Image 3">
    </div>

    <div class="frame">
        <div class="left-column">
            @include('dashboard.dashboardC') <!-- Dashboard section included -->
            @csrf
        </div>

        <div class="right-column">
            <div class="container text-center">
                <div class="row">
                    <!-- Beneficiary Registration Form Button -->
                    <div class="col-md-6">
                        <a href="{{ route('bene-form.create') }}" class="btn btn-primary btn-large">
                            Beneficiary Registration Form
                        </a>
                    </div>
                    <!-- Beneficiary View Button -->
                    <div class="col-md-6">
                        <a href="{{ route('bene-form.index') }}" class="btn btn-success btn-large">
                            Beneficiary View
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
