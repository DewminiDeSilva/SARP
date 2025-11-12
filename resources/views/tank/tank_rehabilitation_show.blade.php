<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tank Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Beautiful Simple CSS Styles - Matching Create Form */
        body {
            background: linear-gradient(to bottom, #f5f7fa 0%, #e8ecf1 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background-color: #ffffff;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 25px;
        }

        .custom-border {
            border-color: #28a745 !important;
            border-width: 2px !important;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 0.5px;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #28a745, #20c997);
            border-radius: 2px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding: 12px 0;
            transition: background-color 0.2s ease;
        }

        .info-row:hover {
            background-color: #f8f9fa;
        }

        .info-row label {
            font-weight: 600;
            color: #495057;
            width: 35%;
            margin: 0;
        }

        .info-row p {
            width: 65%;
            margin: 0;
            color: #2c3e50;
        }

        .info-row a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #28a745;
            transition: color 0.2s ease;
        }

        .info-row a:hover {
            color: #20c997;
        }

        .info-row img {
            margin-right: 8px;
            width: 40px;
            height: 40px;
        }

        .header-title {
            color: #28a745 !important;
            font-size: 2.2rem;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            background: linear-gradient(135deg, #77d582 0%, #5cb85c 100%);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 8px;
            color: #fff;
        }

        .construction-images {
            text-align: center;
            margin-top: 30px;
        }

        .image-container {
            margin-bottom: 40px;
            display: inline-block;
        }

        .animated-image {
            width: 500px;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .animated-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        h3 {
            color: #28a745;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .section-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

<style>
    .sidebar {
        transition: transform 0.3s ease;
    }

    .sidebar.hidden {
        transform: translateX(-100%);
    }

    #sidebarToggle {
        background-color: #126926;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818;
    }

    .left-column.hidden {
        display: none;
    }
    .right-column {
        transition: flex 0.3s ease, padding 0.3s ease;
    }
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
            <!-- Sidebar Toggle Button -->
            <button id="sidebarToggle" class="btn btn-secondary mr-2">
                <i class="fas fa-bars"></i>
            </button>

            <a href="{{ route('tank_rehabilitation.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Tank Details View</h2>
        </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <!-- Tank Details Section -->
            <div class="section-container">
                <h2 class="mb-4 text-center">Tank Details</h2>
                <div class="info-row">
                    <label>Tank ID:</label>
                    <p>{{$tankRehabilitation->tank_id ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Tank Name:</label>
                    <p>{{$tankRehabilitation->tank_name ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>River Basin:</label>
                    <p>{{$tankRehabilitation->river_basin ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Cascade Name:</label>
                    <p>{{$tankRehabilitation->cascade_name ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Province:</label>
                    <p>{{$tankRehabilitation->province_name ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>District:</label>
                    <p>{{$tankRehabilitation->district ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>DS Division:</label>
                    <p>{{$tankRehabilitation->ds_division_name ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>GN Division:</label>
                    <p>{{$tankRehabilitation->gn_division_name ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>AS Centre:</label>
                    <p>{{$tankRehabilitation->as_centre ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Agency:</label>
                    <p>{{$tankRehabilitation->agency ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Number of Household:</label>
                    <p>{{$tankRehabilitation->no_of_family ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Longitude:</label>
                    <p>{{$tankRehabilitation->longitude ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Latitude:</label>
                    <p>{{$tankRehabilitation->latitude ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Location:</label>
                    <p>
                        <a href="https://www.google.com/maps/search/?api=1&query={{$tankRehabilitation->latitude}},{{$tankRehabilitation->longitude}}" target="_blank">
                            <img src="{{ asset('assets/images/Map_icon.png') }}" alt="Google Maps">
                            View on Google Maps
                        </a>
                    </p>
                </div>
            </div>

            <!-- Contract Information Section -->
            <div class="section-container">
                <h2 class="mb-4 text-center">Contract Information</h2>
                <div class="info-row">
                    <label>Contractor Name:</label>
                    <p>{{$tankRehabilitation->contractor ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Contract Amount (Rs):</label>
                    <p>{{ is_numeric($tankRehabilitation->payment) ? number_format((float) $tankRehabilitation->payment, 2) : 'N/A' }}</p>
                </div>
                <div class="info-row">
                    <label>Awarded Date:</label>
                    <p>{{$tankRehabilitation->awarded_date ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>EOT (Extension of Time):</label>
                    <p>{{$tankRehabilitation->eot ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Construction Period (Months):</label>
                    <p>{{$tankRehabilitation->contract_period ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Open Reference Number:</label>
                    <p>{{$tankRehabilitation->open_ref_no ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Cumulative Paid Amount (Rs):</label>
                    <p>{{ !empty($tankRehabilitation->cumulative_amount) && is_numeric($tankRehabilitation->cumulative_amount) ? number_format((float) $tankRehabilitation->cumulative_amount, 2) : 'N/A' }}</p>
                </div>
                <div class="info-row">
                    <label>Paid Advanced Amount (Rs):</label>
                    <p>{{ !empty($tankRehabilitation->paid_advanced_amount) && is_numeric($tankRehabilitation->paid_advanced_amount) ? number_format((float) $tankRehabilitation->paid_advanced_amount, 2) : 'N/A' }}</p>
                </div>
                <div class="info-row">
                    <label>Recommended IPC Number:</label>
                    <p>{{$tankRehabilitation->recommended_ipc_no ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Recommended IPC Amount (Rs):</label>
                    <p>{{ !empty($tankRehabilitation->recommended_ipc_amount) && is_numeric($tankRehabilitation->recommended_ipc_amount) ? number_format((float) $tankRehabilitation->recommended_ipc_amount, 2) : 'N/A' }}</p>
                </div>
                <div class="info-row">
                    <label>Status:</label>
                    <p>{{$tankRehabilitation->status ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Progress:</label>
                    <p>{{$tankRehabilitation->progress ?? 'N/A'}}</p>
                </div>
                <div class="info-row">
                    <label>Remarks:</label>
                    <p>{{$tankRehabilitation->remarks ?? 'N/A'}}</p>
                </div>
            </div>

            <!-- Progress Cards -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Physical Progress Report as at <span id="currentDate1"></span></h5>
                            <p class="card-text">Status: {{$tankRehabilitation->status ?? 'N/A'}}</p>
                            <p class="card-text">Progress: {{$tankRehabilitation->progress ?? 'N/A'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Finance Progress as at <span id="currentDate2"></span></h5>
                            <p class="card-text">Paid Amount: Rs. {{ !empty($tankRehabilitation->payment) && is_numeric($tankRehabilitation->payment) ? number_format((float) $tankRehabilitation->payment, 2) : 'N/A' }}</p>
                            <p class="card-text">Percentage: {{$percentage ?? 0}}%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Construction Images Section -->
            <div class="section-container">
                <h2 class="mb-4 text-center">Construction Images</h2>
                <div class="construction-images">
                    @if($tankRehabilitation->pre_construction_image)
                    <div class="image-container">
                        <h3>Pre Construction Image</h3>
                        <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->pre_construction_image) }}" alt="Pre Construction Image">
                    </div>
                    @endif

                    @if($tankRehabilitation->during_construction_image)
                    <div class="image-container">
                        <h3>During Construction Image</h3>
                        <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->during_construction_image) }}" alt="During Construction Image">
                    </div>
                    @endif

                    @if($tankRehabilitation->post_construction_image)
                    <div class="image-container">
                        <h3>Post Construction Image</h3>
                        <img class="animated-image" src="{{ asset('storage/' . $tankRehabilitation->post_construction_image) }}" alt="Post Construction Image">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getCurrentDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function displayCurrentDate() {
        const currentDate1 = document.getElementById("currentDate1");
        const currentDate2 = document.getElementById("currentDate2");
        const currentDate = getCurrentDate();
        if (currentDate1) currentDate1.textContent = currentDate;
        if (currentDate2) currentDate2.textContent = currentDate;
    }

    displayCurrentDate();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');

            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%';
                content.style.padding = '20px';
            } else {
                content.style.flex = '0 0 80%';
                content.style.padding = '20px';
            }
        });
    });
</script>
</body>
</html>
