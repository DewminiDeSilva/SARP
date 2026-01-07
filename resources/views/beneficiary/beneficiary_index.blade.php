<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} ">    overrite navbar need to check        --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .pagination .page-item {
            margin: 0 0px; /* Adjust the margin to reduce space */
        }
        .pagination .page-link {
            padding: 5px 10px; /* Adjust padding to control button size */
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }

        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color : #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }

        .submitbtton{
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .submitbtton:active,
        .submitbtton:hover {
            background-color: #145c32; /* Dark green background */
            border-color: #145c32; /* Dark green border */
            color: #fff;
        }


        .buttonline {
            white-space: nowrap; /* Prevent line breaks within the table cell */
        }

        .button-a {
            margin-right: 10px; /* Optional: Add some space between the buttons */
        }

        .button-group {
    white-space: nowrap; /* Prevent line breaks within the table cell */
}

.button-group a, .button-group form {
    display: inline-block; /* Ensure both links and forms are inline */
    margin-right: 10px; /* Optional: Add space between the buttons */
}

.button-group form button {
    margin-right: 0; /* Remove the margin from the last button */
}


    </style>
    <style>
        /* Custom Alert Modal Styles */
        .custom-alert-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }
        
        .custom-alert-overlay.show {
            display: flex;
        }
        
        .custom-alert-modal {
            background: white;
            border-radius: 12px;
            padding: 0;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.3s ease-out;
            overflow: hidden;
        }
        
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .custom-alert-header {
            background: linear-gradient(135deg, #198754 0%, #145c32 100%);
            color: white;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        
        .custom-alert-body {
            padding: 30px 20px;
            text-align: center;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }
        
        .custom-alert-footer {
            padding: 15px 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
        
        .custom-alert-btn {
            padding: 10px 30px;
            border: 2px solid #212529;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 100px;
        }
        
        .custom-alert-btn-yes {
            background-color: #ffffff;
            color: #212529;
            border: 2px solid #212529;
        }
        
        .custom-alert-btn-yes:hover {
            background-color: #212529;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .custom-alert-btn-no {
            background-color: #ffffff;
            color: #212529;
            border: 2px solid #212529;
        }
        
        .custom-alert-btn-no:hover {
            background-color: #212529;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .custom-alert-btn:active {
            transform: translateY(0);
        }
        
        /* Professional Management Information System Table Styling */
        .table-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-top: 20px;
            overflow-x: auto;
        }
        
        #beneficiariesTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        #beneficiariesTable thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        #beneficiariesTable thead th {
            padding: 18px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ffffff;
            border: none;
            white-space: nowrap;
            position: relative;
        }
        
        #beneficiariesTable thead th:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 1px;
            background: rgba(255, 255, 255, 0.3);
        }
        
        #beneficiariesTable tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f0f0f0;
        }
        
        #beneficiariesTable tbody tr:nth-child(even) {
            background: #fafbfc;
        }
        
        #beneficiariesTable tbody tr:nth-child(odd) {
            background: #ffffff;
        }
        
        #beneficiariesTable tbody tr:hover {
            background: linear-gradient(90deg, #e8ecff 0%, #f5f7ff 100%) !important;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
            border-left: 4px solid #667eea;
        }
        
        #beneficiariesTable tbody td {
            padding: 16px;
            color: #2d3748;
            font-size: 14px;
            line-height: 1.6;
            vertical-align: middle;
            border: none;
        }
        
        #beneficiariesTable tbody td:first-child {
            font-weight: 600;
            color: #1a202c;
        }
        
        /* Table wrapper styling */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }
        
        /* Professional Button Styling */
        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn-primary, .btn-primary.btn-sm {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border: none;
        }
        
        .btn-primary:hover, .btn-primary.btn-sm:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a3d8f 100%);
            color: #ffffff;
        }
        
        .btn-info, .btn-info.btn-sm {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: #ffffff;
            border: none;
        }
        
        .btn-info:hover, .btn-info.btn-sm:hover {
            background: linear-gradient(135deg, #3d8bfe 0%, #00d9fe 100%);
            color: #ffffff;
        }
        
        .btn-danger, .btn-danger.btn-sm {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: #ffffff;
            border: none;
        }
        
        .btn-danger:hover, .btn-danger.btn-sm:hover {
            background: linear-gradient(135deg, #f85a8a 0%, #fed030 100%);
            color: #ffffff;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
            color: #ffffff;
            border: none;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #20bfc0 0%, #2a0867 100%);
            color: #ffffff;
        }
        
        /* Edit and Delete buttons in table */
        .edit-beneficiary-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 6px 10px !important;
            border-radius: 6px !important;
        }
        
        .edit-beneficiary-btn:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a3d8f 100%) !important;
            color: #ffffff !important;
        }
        
        .delete-beneficiary-btn {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 6px 10px !important;
            border-radius: 6px !important;
        }
        
        .delete-beneficiary-btn:hover {
            background: linear-gradient(135deg, #f85a8a 0%, #fed030 100%) !important;
            color: #ffffff !important;
        }
        
        /* Button group styling */
        .buttonline, .button-group {
            white-space: nowrap;
        }
        
        .buttonline .btn, .button-group .btn {
            margin-right: 8px;
        }
        
        .buttonline .btn:last-child, .button-group .btn:last-child {
            margin-right: 0;
        }
        
        /* Global styles - Standard 1x font sizes and smaller inputs */
        body {
            font-size: 14px !important;
        }
        
        /* Make all inputs smaller */
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="time"],
        input[type="tel"],
        input[type="url"],
        textarea,
        select,
        .form-control {
            font-size: 14px !important;
            padding: 6px 10px !important;
            height: auto !important;
        }
        
        /* Standard font sizes */
        h1 { font-size: 24px !important; }
        h2 { font-size: 20px !important; }
        h3 { font-size: 18px !important; }
        h4 { font-size: 16px !important; }
        h5 { font-size: 14px !important; }
        h6 { font-size: 12px !important; }
        p, div, span, td, th, label {
            font-size: 14px !important;
        }
        
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
        .card-header {
            font-weight: bold;
            text-align: center;
            background-color: #c7eef1; /* Blue color example */
            color: #0d0e0d; /* Text color */
        }

        /* Enhanced Page Header Styling */
        .page-header-section {
            position: relative;
            text-align: center;
            margin-bottom: 40px;
            padding: 50px 30px;
            border-radius: 20px;
            overflow: hidden;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
            box-shadow: 0 10px 40px rgba(30, 60, 114, 0.4), 
                        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            animation: fadeInDown 0.6s ease-out;
            position: relative;
        }

        .page-header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, transparent 100%);
            pointer-events: none;
        }

        .page-header-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.3) 20%, 
                rgba(255, 255, 255, 0.5) 50%, 
                rgba(255, 255, 255, 0.3) 80%, 
                transparent 100%);
        }

        .header-background-overlay {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: backgroundMove 20s linear infinite;
            opacity: 0.3;
        }

        @keyframes backgroundMove {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(30px, 30px);
            }
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-icon-wrapper {
            margin-bottom: 20px;
            display: inline-block;
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .header-main-icon {
            font-size: 64px;
            color: #ffffff;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3),
                         0 0 30px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 2px 4px rgba(255, 255, 255, 0.3));
        }

        .header-title {
            margin: 0;
            padding: 0;
        }

        .title-text {
            display: inline-block;
            color: #ffffff;
            font-size: 42px;
            font-weight: 800;
            text-shadow: 
                0 2px 4px rgba(0, 0, 0, 0.3),
                0 4px 8px rgba(0, 0, 0, 0.2),
                0 0 20px rgba(255, 255, 255, 0.1);
            letter-spacing: 2px;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 50%, #ffffff 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: 0% center;
            }
            100% {
                background-position: 200% center;
            }
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 18px;
            margin-top: 15px;
            margin-bottom: 0;
            font-weight: 400;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header-decoration {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .decoration-line {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.6) 50%, 
                transparent 100%);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .decoration-dot {
            width: 8px;
            height: 8px;
            background: #ffffff;
            border-radius: 50%;
            box-shadow: 
                0 0 10px rgba(255, 255, 255, 0.6),
                0 0 20px rgba(255, 255, 255, 0.4);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.8;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Header */
        @media (max-width: 768px) {
            .page-header-section {
                padding: 35px 20px;
            }

            .header-main-icon {
                font-size: 48px;
            }

            .title-text {
                font-size: 28px;
            }

            .header-subtitle {
                font-size: 16px;
            }
        }

        .summary-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .action-section {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Enhanced Input Focus */
        .form-control:focus,
        .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
            outline: none;
        }

        /* Smooth Transitions */
        .btn, .summary-card, .action-section {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }


        .pagination .page-item {
            margin: 0 0px; /* Adjust the margin to reduce space */
        }
        .pagination .page-link {
            padding: 5px 10px; /* Adjust padding to control button size */
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover {
            border-color: #fff;
            background-color: #fff;
        }

        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color : #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }
        .entries-container {
    display: flex;
    align-items: center;
    gap: 0.5rem; /* Add spacing between elements */
}
.form-select {
    width: auto; /* Ensure dropdown adjusts based on content */
}

/* Family Member Modal Styling - Reduced Size (Half of original) */
.family-modal-xl {
    max-width: 45% !important;
    width: 45% !important;
}

.family-modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.family-modal-header {
    background: linear-gradient(135deg, #198754 0%, #145c32 100%);
    color: white;
    border-bottom: none;
    padding: 20px 25px;
}

.family-modal-header .modal-title {
    font-size: 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.family-modal-header .btn-close-white {
    filter: brightness(0) invert(1);
    opacity: 0.9;
}

.family-modal-header .btn-close-white:hover {
    opacity: 1;
}

.family-modal-body {
    padding: 30px;
    background: #f8f9fa;
    max-height: 70vh;
    overflow-y: auto;
}

.family-modal-body .form-group {
    margin-bottom: 20px;
}

.family-modal-body label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.family-modal-body label i {
    color: #198754;
    width: 20px;
}

.family-modal-body .form-control {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.family-modal-body .form-control:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
    outline: none;
}

.family-modal-body .form-check-group {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 8px;
}

.family-modal-body .form-check {
    margin: 0;
}

.family-modal-body .form-check-input {
    width: 18px;
    height: 18px;
    margin-top: 0.25rem;
    cursor: pointer;
}

.family-modal-body .form-check-input:checked {
    background-color: #198754;
    border-color: #198754;
}

.family-modal-body .form-check-label {
    margin-left: 8px;
    cursor: pointer;
    font-weight: 500;
}

.family-modal-footer {
    border-top: 2px solid #e0e0e0;
    padding: 20px 25px;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
}

.family-modal-footer .btn {
    padding: 10px 30px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.family-modal-footer .btn-success {
    background: linear-gradient(135deg, #198754 0%, #145c32 100%);
    border: none;
    color: white;
}

.family-modal-footer .btn-success:hover {
    background: linear-gradient(135deg, #145c32 0%, #0d3d1f 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
}

.family-modal-footer .btn-secondary {
    background: #6c757d;
    border: none;
    color: white;
}

.family-modal-footer .btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
}

@media (max-width: 768px) {
    .family-modal-xl {
        max-width: 50% !important;
        width: 50% !important;
    }
    
    .family-modal-body {
        padding: 20px;
        max-height: 60vh;
    }
    
    .family-modal-body .row {
        margin: 0;
    }
    
    .family-modal-body .col-md-6 {
        padding: 0 10px;
        margin-bottom: 15px;
    }
    
    .family-modal-footer {
        flex-direction: column;
        gap: 10px;
    }
    
    .family-modal-footer .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Duplicate NIC Display Styling */
.duplicate-nic {
    color: #dc3545 !important;
    font-weight: bold;
}

.duplicate-nic-new {
    color: #dc3545 !important;
    font-weight: bold;
    display: block;
    margin-top: 4px;
}

.old-nic-indicator {
    color: #6c757d;
    font-style: italic;
    font-size: 12px;
}

/* Show Only Duplicates Button Styling */
.btn-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: #ffffff;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}

.btn-outline-secondary {
    border: 2px solid #6c757d;
    color: #6c757d;
    background: transparent;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background: #6c757d;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
}

    </style>

<style>
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
}

</style>
</head>
<body>
@include('dashboard.header')
    {{-- <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;"> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

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


            <a href="{{ route('beneficiary.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

        </div>


    <div class="container-fluid">
        <!-- Enhanced Page Header with Beautiful Design -->
        <div class="page-header-section">
            <div class="header-background-overlay"></div>
            <div class="header-content">
                <div class="header-icon-wrapper">
                    <i class="fas fa-users header-main-icon"></i>
                </div>
                <h1 class="header-title">
                    <span class="title-text">Beneficiary Details</span>
                </h1>
                <p class="header-subtitle">Manage and view all beneficiary information</p>
                <div class="header-decoration">
                    <div class="decoration-line"></div>
                    <div class="decoration-dot"></div>
                    <div class="decoration-line"></div>
                </div>
            </div>
        </div>

        <!-- Enhanced Summary Cards -->
        <div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Total Beneficiaries Card -->
        <div class="col-md-4 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(102, 126, 234, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(102, 126, 234, 0.3)';">
                <div style="color: #ffffff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-user-friends" style="margin-right: 8px; font-size: 24px;"></i>Total Beneficiaries
                </div>
                <div style="color: #ffffff; font-size: 48px; font-weight: 700; margin: 20px 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                    {{ $beneficiaries->total() }}
                </div>
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin: 0;">Total Beneficiaries currently in the system</p>
            </div>
        </div>

        <!-- Crop Names Summary Card -->
        <div class="col-md-4 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(79, 172, 254, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(79, 172, 254, 0.3)';">
                <div style="color: #ffffff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-seedling" style="margin-right: 8px; font-size: 24px;"></i>Crop/Production Focus
                </div>
                <div style="color: #ffffff; font-size: 48px; font-weight: 700; margin: 20px 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                    {{ $input3Summary->count() ?? 0 }}
                </div>
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin-bottom: 20px;">Click below to view the summary</p>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#input3SummaryModal" style="border-radius: 25px; padding: 8px 20px; font-weight: 600; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                    <i class="fas fa-eye" style="margin-right: 5px;"></i>View Details
                </button>
            </div>
        </div>

        <!-- Tank Names Summary Card -->
        <div class="col-md-4 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(48, 207, 208, 0.3); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(48, 207, 208, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(48, 207, 208, 0.3)';">
                <div style="color: #ffffff; font-size: 18px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-water" style="margin-right: 8px; font-size: 24px;"></i>Tank Names
                </div>
                <div style="color: #ffffff; font-size: 48px; font-weight: 700; margin: 20px 0; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                    {{ $tankNameSummary->count() ?? 0 }}
                </div>
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin-bottom: 20px;">Click below to view the summary</p>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#tankNameSummaryModal" style="border-radius: 25px; padding: 8px 20px; font-weight: 600; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                    <i class="fas fa-eye" style="margin-right: 5px;"></i>View Details
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Crop Name Summary -->
<div class="modal fade" id="input3SummaryModal" tabindex="-1" aria-labelledby="input3SummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input3SummaryModalLabel">Summary of Beneficiaries by Crop Name/Production Focus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Crop Name/Production Focus</th>
                            <th>Count</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($input3Summary as $summary)
                            <tr>
                                <td>{{ $summary->input3 }}</td>
                                <td>{{ $summary->count }}</td>
                                <!-- <td><a href="" class="btn btn-info btn-sm">View</a></td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Tank Name Summary -->
<div class="modal fade" id="tankNameSummaryModal" tabindex="-1" aria-labelledby="tankNameSummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tankNameSummaryModalLabel">Summary of Beneficiaries by Tank Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tank Name</th>
                            <th>Count</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tankNameSummary as $summary)
                            <tr>
                                <td>{{ $summary->tank_name }}</td>
                                <td>{{ $summary->count }}</td>
                                <!-- <td><a href="" class="btn btn-info btn-sm">View</a></td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Input3 Summary (Crop Names) -->
<div class="modal fade" id="input3SummaryModal" tabindex="-1" aria-labelledby="input3SummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input3SummaryModalLabel">Summary of Beneficiaries by Crop Name/Production Focus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Crop Name/Production Focus</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($input3Summary as $summary)
                            <tr>
                                <td>{{ $summary->input3 }}</td>
                                <td>{{ $summary->count }}</td>
                                <td><a href="" class="btn btn-info btn-sm">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tankNameSummaryModal" tabindex="-1" aria-labelledby="tankNameSummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tankNameSummaryModalLabel">Summary of Beneficiaries by Tank Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tank Name</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tankNameSummary as $summary)
                            <tr>
                                <td>{{ $summary->tank_name }}</td>
                                <td>{{ $summary->count }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        <!-- Enhanced Filter Buttons -->
        <form method="GET" action="{{ route('beneficiary.index') }}" class="mb-3">
            <div class="d-flex justify-content-end mb-3" style="gap: 10px;">
                <a href="{{ route('beneficiary.index') }}" class="btn btn-outline-secondary" style="border-radius: 8px; padding: 10px 20px; font-weight: 600; border: 2px solid #6c757d; transition: all 0.3s ease;" onmouseover="this.style.background='#6c757d'; this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='transparent'; this.style.color='#6c757d'; this.style.transform='translateY(0)';">
                    <i class="fas fa-list" style="margin-right: 5px;"></i>Show All
                </a>
                <a href="{{ route('beneficiary.index', ['duplicates' => '1']) }}" class="btn btn-danger" style="border-radius: 8px; padding: 10px 20px; font-weight: 600; box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 18px rgba(220, 53, 69, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(220, 53, 69, 0.3)';">
                    <i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i>Show Only Duplicates
                </a>
            </div>
        </form>

@php
    $convertedNicMap = [];
    $nicMap = [];

    foreach ($allBeneficiaries as $b) {
        $nic = $b->nic;
        $converted = null;

        // Convert old NIC to new format
        if (preg_match('/^(\d{2})(\d{3})(\d{4})[VXvx]?$/', $nic, $matches)) {
            $converted = '19' . $matches[1] . $matches[2] . '0' . $matches[3];
        }

        $nicMap[$nic][] = $b->id;
        if ($converted) {
            $nicMap[$converted][] = $b->id;
            $convertedNicMap[$b->id] = $converted;
        }
    }

    $duplicateNics = [];
    foreach ($nicMap as $nic => $ids) {
        if (count($ids) > 1) {
            $duplicateNics[$nic] = true;
        }
    }

    $filteredBeneficiaries = $beneficiaries;

    if (request('duplicates')) {
        $filteredBeneficiaries = $beneficiaries->filter(function ($b) use ($duplicateNics, $convertedNicMap) {
            $nic = $b->nic;
            $converted = $convertedNicMap[$b->id] ?? null;
            return isset($duplicateNics[$nic]) || ($converted && isset($duplicateNics[$converted]));
        });
    }
@endphp





        <!-- Enhanced Action Section -->
        <div class="action-section" style="background: #ffffff; border-radius: 15px; padding: 25px; margin: 30px 0; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); border: 1px solid #e0e0e0;">
            <div class="row align-items-center">
                <!-- CSV Upload Form -->
                @if(auth()->user()->hasPermission('beneficiary', 'upload_csv'))
                <div class="col-md-4 mb-3">
                    <form action="{{ route('beneficiary.uploadCsv') }}" method="POST" enctype="multipart/form-data" class="csv-upload-form">
                        @csrf
                        <div class="input-group" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">
                            <input type="file" name="csv_file" class="form-control" required style="border: none; padding: 10px 15px;">
                            <button type="submit" class="btn btn-success" style="border-radius: 0; padding: 10px 20px; font-weight: 600;">
                                <i class="fas fa-upload" style="margin-right: 5px;"></i>Upload CSV
                            </button>
                        </div>
                    </form>
                </div>
                @endif

                <!-- Search form -->
                <div class="col-md-{{ auth()->user()->hasPermission('beneficiary', 'upload_csv') ? '5' : '8' }} mb-3">
                    <form method="GET" action="{{ route('beneficiary.index') }}" class="search-form">
                        <div class="input-group" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">
                            <input type="text" class="form-control" placeholder="Search beneficiaries..." name="search" value="{{ request('search','') }}" style="border: none; padding: 12px 20px; font-size: 14px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="border-radius: 0; padding: 12px 25px; font-weight: 600;">
                                    <i class="fas fa-search" style="margin-right: 5px;"></i>Search
                                </button>
                            </div>
                        </div>
                        @if(request('duplicates'))
                            <input type="hidden" name="duplicates" value="1">
                        @endif
                        @if(request('entries'))
                            <input type="hidden" name="entries" value="{{ request('entries') }}">
                        @endif
                    </form>
                </div>

                <!-- Action Buttons -->
                <div class="col-md-{{ auth()->user()->hasPermission('beneficiary', 'upload_csv') ? '3' : '4' }} mb-3">
                    <div class="d-flex gap-2 justify-content-end flex-wrap">
                        @if(auth()->user()->hasPermission('beneficiary', 'add'))
                        <a href="{{ route('beneficiary.create') }}" class="btn submitbtton" style="border-radius: 8px; padding: 12px 25px; font-weight: 600; box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 18px rgba(25, 135, 84, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(25, 135, 84, 0.3)';">
                            <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>Add New
                        </a>
                        @endif
                        <a href="{{route('download.csv')}}" class="btn submitbtton" style="border-radius: 8px; padding: 12px 25px; font-weight: 600; box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 18px rgba(25, 135, 84, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(25, 135, 84, 0.3)';">
                            <i class="fas fa-file-csv" style="margin-right: 5px;"></i>Generate CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>



        </div>

        <!-- Success Message Popup -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('{{ session('success') }}');
        });
    </script>
@endif

        <!-- Enhanced Entries Selector -->
        <div class="entries-container" style="background: #f8f9fa; padding: 15px 20px; border-radius: 10px; margin: 20px 0; display: flex; align-items: center; gap: 10px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
            <label for="entriesSelect" style="font-weight: 600; color: #495057; margin: 0;">Show</label>
            <select id="entriesSelect" class="form-select form-select-sm" style="width: auto; border-radius: 6px; border: 2px solid #dee2e6; padding: 6px 12px; font-weight: 500;">
                <option value="10" {{ $beneficiaries->perPage() == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ $beneficiaries->perPage() == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ $beneficiaries->perPage() == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $beneficiaries->perPage() == 100 ? 'selected' : '' }}>100</option>
            </select>
            <span style="font-weight: 600; color: #495057;">entries</span>
        </div>


<div class="row table-container">
    <div class="col">
        <table id="beneficiariesTable" class="table table-bordered table-sm">
            <thead class="thead-light">
                <!-- Table headers here -->
            </thead>
            <tbody>
                <!-- Table rows here -->
            </tbody>
        </table>
    </div>
</div>

        <div class="row table-container">
            <div class="col">
                <div class="table-responsive">
                <table id="beneficiariesTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col">NIC Number</th>
                            <th scope="col">Name with Initials</th>
                            <th scope="col">Gender</th>
                            <!-- <th scope="col">Date Of Birth</th> -->
                            <!-- <th scope="col">Age</th> -->
                            <th scope="col">Address</th>
                            <th scope="col">Phone Numbers</th>
                            <th scope="col">Crop Name/Production Focus
                            </th>
                            <th scope="col">Tank Name</th>
                            <!-- <th scope="col">Education</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Bank Branch</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Land Ownership (Total Extent)</th>
                            <th scope="col">Proposed Cultivation Area</th>
                            <th scope="col">Province</th>
                            <th scope="col">District</th>
                            <th scope="col">DS Division</th>
                            <th scope="col">GN Division</th>
                            <th scope="col">ASC</th>
                            <th scope="col">Tank Name</th>
                            <th scope="col">Cascade Name</th>
                            <th scope="col">AI Division</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Number of Family Members</th>
                            <th scope="col">Head of Householder Name</th>
                            <th scope="col">Householder Number</th>
                            <th scope="col">Income Source</th>
                            <th scope="col">Average Income</th>
                            <th scope="col">Monthly Household Expenses</th>
                            <th scope="col">Household Level Assets Description</th>
                            <th scope="col">Community-Based Organization</th>
                            <th scope="col">Type of Water Resource</th>
                            <th scope="col">Training Details Description</th> -->
                            <th scope="col">Actions</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filteredBeneficiaries as $beneficiary)
        @php
            $nic = $beneficiary->nic;
            $converted = $convertedNicMap[$beneficiary->id] ?? null;
            $isDuplicate = isset($duplicateNics[$nic]) || ($converted && isset($duplicateNics[$converted]));
            $isOldNic = preg_match('/^(\d{2})(\d{3})(\d{4})[VXvx]?$/', $nic);
            $showDuplicates = request('duplicates');
        @endphp
        <tr>
            <td>
                @if ($isDuplicate || $showDuplicates)
                    <div>
                        <span class="duplicate-nic">Old NIC: {{ $beneficiary->nic }}</span>
                        @if ($converted)
                            <span class="duplicate-nic-new">→ New NIC: {{ $converted }}</span>
                        @elseif ($isOldNic)
                            <span class="old-nic-indicator">(Old NIC format - can be converted)</span>
                        @endif
                    </div>
                @else
                    <span>{{ $beneficiary->nic }}</span>
                @endif
            </td>

                            <td>{{ $beneficiary->name_with_initials }}</td>
                            <td>{{ $beneficiary->gender }}</td>
                            <!-- <td>{{ $beneficiary->dob }}</td> -->
                            <!-- <td>{{ $beneficiary->age }}</td> -->
                            <td>{{ $beneficiary->address }}</td>
                            <td>{{ $beneficiary->phone }}</td>
                            <td>{{ $beneficiary->input3 }}</td>
                            <td>{{ $beneficiary->tank_name }}</td>
                            <!-- <td>{{ $beneficiary->education }}</td>
                            <td>{{ $beneficiary->bank_name }}</td>
                            <td>{{ $beneficiary->bank_branch }}</td>
                            <td>{{ $beneficiary->account_number }}</td>
                            <td>{{ $beneficiary->land_ownership_total_extent }}</td>
                            <td>{{ $beneficiary->land_ownership_proposed_cultivation_area }}</td>
                            <td>{{ $beneficiary->province_name }}</td>
                            <td>{{ $beneficiary->district_name }}</td>
                            <td>{{ $beneficiary->ds_division_name }}</td>
                            <td>{{ $beneficiary->gn_division_name }}</td>
                            <td>{{ $beneficiary->tank_name }}</td>
                            <td>{{ $beneficiary->as_center }}</td>
                            <td>{{ $beneficiary->cascade_name }}</td>
                            <td>{{ $beneficiary->ai_division }}</td>
                            <td>{{ $beneficiary->latitude }}</td>
                            <td>{{ $beneficiary->longitude }}</td>
                            <td>{{ $beneficiary->number_of_family_members }}</td>
                            <td>{{ $beneficiary->head_of_householder_name }}</td>
                            <td>{{ $beneficiary->householder_number }}</td>
                            <td>{{ $beneficiary->income_source }}</td>
                            <td>{{ $beneficiary->average_income }}</td>
                            <td>{{ $beneficiary->monthly_household_expenses }}</td>
                            <td>{{ $beneficiary->household_level_assets_description }}</td>
                            <td>{{ $beneficiary->community_based_organization }}</td>
                            <td>{{ $beneficiary->type_of_water_resource }}</td>
                            <td>{{ $beneficiary->training_details_description }}</td> -->
                            <td class="buttonline">
                                <a href="{{ route('beneficiary.show', $beneficiary->id) }}" class="btn btn-info btn-sm">View</a>
                                @if(auth()->user()->hasPermission('family', 'add'))
                                <button type="button" class="btn btn-primary btn-sm button-a" data-bs-toggle="modal" data-bs-target="#familyMemberModal{{ $beneficiary->id }}">
                                    <i class="fas fa-user-plus"></i> Add Members
                                </button>
                                @endif

                            </td>
                            <td class="button-group">
                            @if(auth()->user()->hasPermission('beneficiary', 'edit'))
                                <a href="beneficiary/{{ $beneficiary->id }}/edit" class="btn btn-primary btn-sm edit-beneficiary-btn" data-beneficiary-id="{{ $beneficiary->id }}" data-action="edit">
                                    <img src="{{ asset('assets/images/edit4.png') }}" alt="Edit Icon" style="width: 20px; height: 20px;">
                                </a>
                            @endif

                            @if(auth()->user()->hasPermission('beneficiary', 'delete'))
                                <form action="beneficiary/{{ $beneficiary->id }}" method="POST" style="display: inline;" class="delete-beneficiary-form" data-beneficiary-id="{{ $beneficiary->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-beneficiary-btn">
                                        <img src="{{ asset('assets/images/delete1.png') }}" alt="Delete Icon" style="width: 20px; height: 20px;">
                                    </button>
                                </form>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>




<!-- Pagination Section -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ $beneficiaries->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $beneficiaries->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>

        @php
                                    $currentPage = $beneficiaries->currentPage();
                                    $lastPage = $beneficiaries->lastPage();
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($currentPage + 2, $lastPage);
                                @endphp

                                @if ($startPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $beneficiaries->url(1) }}">1</a>
                                    </li>
                                    @if ($startPage > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $beneficiaries->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($endPage < $lastPage)
                                    @if ($endPage < $lastPage - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $beneficiaries->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $beneficiaries->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $beneficiaries->nextPageUrl() }}">Next</a>
                                </li>
    </ul>
</nav>

@php
                            $currentPage = $beneficiaries->currentPage();
                            $perPage = $beneficiaries->perPage();
                            $total = $beneficiaries->total();
                            $startingNumber = ($currentPage - 1) * $perPage + 1;
                            $endingNumber = min($total, $currentPage * $perPage);
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div id="tableInfo" class="text-right">
                                <p>Showing {{ $startingNumber }} to {{ $endingNumber }} of {{ $total }} entries</p>
                            </div>
                        </div>




    @foreach ($beneficiaries as $beneficiary)
    {{-- popup modal --}}
    <!-- Bootstrap modal code -->
{{-- <div class="modal fade" id="editBeneficiary" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true"> --}}
 <!-- Modal for editing beneficiary -->
 <div class="modal fade" id="editBeneficiary{{ $beneficiary->id }}" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBeneficiaryLabel">Edit Beneficiary Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit form goes here -->
                <form id="editBeneficiaryForm" method="POST" action="{{ route('beneficiary.update', $beneficiary->id) }}">
                    {{-- <form class="form-horizontal" id="editBeneficiaryForm" method="POST" action="/beneficiary/{{$beneficiary->id}}"> --}}
                    @csrf
                    @method('PUT')
                    <!-- Form fields for editing beneficiary details -->

                    <div class="form-group">
                        <label for="editNic">NIC</label>
                        <input type="text" class="form-control" name="nic">
                    </div>
                    <div class="form-group">
                        <label for="editFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="editlastName">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="editDob">Date Of Birth</label>
                        <input type="text" class="form-control" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="editGender">Gender</label>
                        <input type="text" class="form-control" name="gender">
                    </div>
                    <div class="form-group">
                        <label for="editAge">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="editIncome">Income</label>
                        <input type="text" class="form-control" name="income">
                    </div>
                    <div class="form-group">
                        <label for="editFamilyMembersCount">Family Members Count</label>
                        <input type="text" class="form-control" name="family_members_count">
                    </div>
                    <div class="form-group">
                        <label for="editEducation">Education Level</label>
                        <input type="text" class="form-control" name="education">
                    </div>
                    <div class="form-group">
                        <label for="editLandOwnership">Land Ownership </label>
                        <input type="text" class="form-control" name="land_ownership">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach









<!-- Family Member Registration Modals -->
@foreach ($filteredBeneficiaries as $beneficiary)
<div class="modal fade" id="familyMemberModal{{ $beneficiary->id }}" tabindex="-1" aria-labelledby="familyMemberModalLabel{{ $beneficiary->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl family-modal-xl">
        <div class="modal-content family-modal-content">
            <div class="modal-header family-modal-header">
                <h5 class="modal-title" id="familyMemberModalLabel{{ $beneficiary->id }}">
                    <i class="fas fa-users"></i> Family Member Registration - {{ $beneficiary->name_with_initials }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body family-modal-body">
                <form class="form-horizontal familyMemberForm" action="/family" method="POST" data-beneficiary-id="{{ $beneficiary->id }}">
                    @csrf
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_with_initials{{ $beneficiary->id }}"><i class="fas fa-user"></i> Name with Initials</label>
                                <input type="text" name="name_with_initials" id="name_with_initials{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nic{{ $beneficiary->id }}"><i class="fas fa-id-card"></i> Family Member NIC</label>
                                <input type="text" name="nic" id="nic{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone{{ $beneficiary->id }}"><i class="fas fa-phone"></i> Phone</label>
                                <input type="text" name="phone" id="phone{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-venus-mars"></i> Gender</label>
                                <div class="form-check-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male{{ $beneficiary->id }}" value="male" required>
                                        <label class="form-check-label" for="male{{ $beneficiary->id }}">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female{{ $beneficiary->id }}" value="female" required>
                                        <label class="form-check-label" for="female{{ $beneficiary->id }}">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other{{ $beneficiary->id }}" value="other" required>
                                        <label class="form-check-label" for="other{{ $beneficiary->id }}">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob{{ $beneficiary->id }}"><i class="fas fa-calendar"></i> Date Of Birth</label>
                                <input type="text" class="form-control dob-input" id="dob{{ $beneficiary->id }}" name="dob" placeholder="Select Date of Birth" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youth{{ $beneficiary->id }}"><i class="fas fa-child"></i> Youth Status</label>
                                <input type="text" name="youth" id="youth{{ $beneficiary->id }}" class="form-control youth-input" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="education{{ $beneficiary->id }}"><i class="fas fa-graduation-cap"></i> Education Level</label>
                                <select class="form-control" id="education{{ $beneficiary->id }}" name="education" required>
                                    <option value="">Select Education Level</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="Higher Secondary">Higher Secondary</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="income_source{{ $beneficiary->id }}"><i class="fas fa-briefcase"></i> Income Source</label>
                                <input type="text" name="income_source" id="income_source{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="income{{ $beneficiary->id }}"><i class="fas fa-dollar-sign"></i> Income</label>
                                <input type="text" name="income" id="income{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nutrition_level{{ $beneficiary->id }}"><i class="fas fa-apple-alt"></i> Nutrition Level</label>
                                <input type="text" name="nutrition_level" id="nutrition_level{{ $beneficiary->id }}" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer family-modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" name="button" class="btn btn-success">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Success Modal -->
<div class="modal fade" id="familySuccessModal" tabindex="-1" aria-labelledby="familySuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="familySuccessModalLabel">
                    <i class="fas fa-check-circle"></i> Success
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <p class="mb-0">Family member registered successfully!</p>
            </div>
        </div>
    </div>
</div>

<!-- Custom Alert Modal -->
<div id="customAlertOverlay" class="custom-alert-overlay">
    <div class="custom-alert-modal">
        <div class="custom-alert-header" id="alertHeader">Confirm Action</div>
        <div class="custom-alert-body" id="alertMessage">Are you sure you want to perform this action?</div>
        <div class="custom-alert-footer">
            <button class="custom-alert-btn custom-alert-btn-yes" id="alertYesBtn">Yes</button>
            <button class="custom-alert-btn custom-alert-btn-no" id="alertNoBtn">No</button>
        </div>
    </div>
</div>

<script>
// Custom Alert Function
let currentConfirmCallback = null;

function showCustomAlert(message, title, onConfirm) {
    const overlay = document.getElementById('customAlertOverlay');
    const alertMessage = document.getElementById('alertMessage');
    const alertHeader = document.getElementById('alertHeader');
    
    alertMessage.textContent = message;
    if (title) {
        alertHeader.textContent = title;
    }
    
    currentConfirmCallback = onConfirm;
    overlay.classList.add('show');
}

// Set up event listeners once when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('customAlertOverlay');
    const yesBtn = document.getElementById('alertYesBtn');
    const noBtn = document.getElementById('alertNoBtn');
    
    // Set up alert modal button handlers
    if (yesBtn) {
        yesBtn.addEventListener('click', function() {
            overlay.classList.remove('show');
            if (currentConfirmCallback) {
                currentConfirmCallback();
                currentConfirmCallback = null;
            }
        });
    }
    
    if (noBtn) {
        noBtn.addEventListener('click', function() {
            overlay.classList.remove('show');
            currentConfirmCallback = null;
        });
    }
    
    if (overlay) {
        // Close on overlay click
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
                currentConfirmCallback = null;
            }
        });
    }
    
    // Handle Edit Button Clicks
    document.querySelectorAll('.edit-beneficiary-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const editUrl = this.getAttribute('href');
            
            showCustomAlert(
                'Are you sure you want to edit this beneficiary?',
                'Confirm Edit',
                function() {
                    window.location.href = editUrl;
                }
            );
        });
    });
    
    // Handle Delete Button Clicks
    document.querySelectorAll('.delete-beneficiary-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('.delete-beneficiary-form');
            
            showCustomAlert(
                'Are you sure you want to delete this beneficiary? This action cannot be undone.',
                'Confirm Delete',
                function() {
                    form.submit();
                }
            );
        });
    });
});

document.getElementById('entriesSelect').addEventListener('change', function () {
    const perPage = this.value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('entries', perPage);

    // preserve current search value and duplicates flag
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput && searchInput.value) {
        urlParams.set('search', searchInput.value);
    }
    if ({{ request('duplicates') ? 'true' : 'false' }}) {
        urlParams.set('duplicates', '1');
    }

    // reset to first page when page size changes
    urlParams.delete('page');

    window.location = '{{ route('beneficiary.index') }}' + '?' + urlParams.toString();
});

</script>




<style>
    body {
        text-align: center;
        color: green;
    }

    h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 40px;
    }
</style>



</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


{{-- <script>



    let chart = bb.generate({
        data: {
            columns: [
                ["Male", {{ $maleCount }}],
                ["Female", {{ $femaleCount }}],
            ],
            type: "pie",
            onclick: function (d, i) {
                console.log("onclick", d, i);
            },
            onover: function (d, i) {
                console.log("onover", d, i);
            },
            onout: function (d, i) {
                console.log("onout", d, i);
            },
        },
        donut: {
            title: "Beneficiaries by Gender",
        },
        bindto: "#donut-chart",
    });
</script> --}}

            {{-- <a href="{{ route('beneficiary/create') }}" class="btn btn-primary">Add Beneficiary</a> --}}
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <!-- jQuery UI for datepicker -->
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            </div>
            </div>

            <script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });

        // Initialize datepicker for all family member modals
        $('[id^="familyMemberModal"]').on('shown.bs.modal', function () {
            var modalId = $(this).attr('id');
            var beneficiaryId = modalId.replace('familyMemberModal', '');
            var dobInput = $('#dob' + beneficiaryId);
            var youthInput = $('#youth' + beneficiaryId);

            // Initialize datepicker
            dobInput.datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: '0',
                changeYear: true,
                yearRange: '-100:+0',
                onSelect: function(selectedDate) {
                    calculateAge(selectedDate, youthInput);
                }
            });
        });

        // Reset form when modal is closed
        $('[id^="familyMemberModal"]').on('hidden.bs.modal', function () {
            var modalId = $(this).attr('id');
            var beneficiaryId = modalId.replace('familyMemberModal', '');
            var form = $(this).find('form');
            form[0].reset();
            $('#youth' + beneficiaryId).val('');
        });

        function calculateAge(selectedDate, youthInput) {
            var dob = new Date(selectedDate);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var month = today.getMonth() - dob.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 35) {
                youthInput.val("Youth");
            } else {
                youthInput.val("Not Youth");
            }
        }

        // Handle form submission
        $('.familyMemberForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var beneficiaryId = form.data('beneficiary-id');
            var modalId = '#familyMemberModal' + beneficiaryId;

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    // Close the family member modal
                    $(modalId).modal('hide');
                    
                    // Show success modal
                    $('#familySuccessModal').modal('show');

                    // Automatically close success modal and reload page after 2 seconds
                    setTimeout(function() {
                        $('#familySuccessModal').modal('hide');
                        window.location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>


        </body>
</html>
