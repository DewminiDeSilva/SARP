<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Datatables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inter — clear numerals for summary counts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&display=swap" rel="stylesheet">

    <style>
        .frame {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: stretch;
        width: 100%;
    }
    .right-column {
        flex: 1 1 80%;
        min-width: 0;
        max-width: 80%;
        padding: 20px;
    }

    .left-column {
        flex: 0 0 20%;
        max-width: 20%;
        border-right: 1px solid #dee2e6;
    }

    /* Sidebar locked hidden until hamburger clicked again (see partial sarp_sidebar_frame_toggle) */
    .frame.sidebar-collapsed .left-column {
        display: none !important;
    }
    .frame.sidebar-collapsed .right-column {
        flex: 1 1 100% !important;
        max-width: 100% !important;
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
        /* Page header title "Beneficiary Details" - same size as Agriculture List / Livestock List */
        .page-header-section .header-title,
        .page-header-section .title-text {
            font-size: 42px !important;
        }
        @media (max-width: 768px) {
            .page-header-section .header-title,
            .page-header-section .title-text {
                font-size: 28px !important;
            }
        }
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
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3), 0 4px 8px rgba(0, 0, 0, 0.2);
            letter-spacing: 2px;
            text-transform: uppercase;
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

/* Summary row: bold, readable numbers + labels (beneficiary dashboard cards) */
.sarp-ben-summary-font {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.sarp-summary-metric-lg {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 900;
    font-size: clamp(2.5rem, 5.5vw, 3.25rem);
    line-height: 1.05;
    letter-spacing: 0.04em;
    font-variant-numeric: tabular-nums lining-nums;
    color: #ffffff;
    text-shadow: 0 2px 0 rgba(0, 0, 0, 0.18), 0 4px 20px rgba(0, 0, 0, 0.25);
    -webkit-font-smoothing: antialiased;
}
.sarp-summary-metric-row {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 800;
    font-size: clamp(1.5rem, 3.5vw, 1.85rem);
    line-height: 1;
    letter-spacing: 0.03em;
    font-variant-numeric: tabular-nums lining-nums;
    color: #ffffff;
    min-width: 3.25rem;
    text-align: right;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2), 0 2px 12px rgba(0, 0, 0, 0.2);
    -webkit-font-smoothing: antialiased;
}
.sarp-summary-row-label {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 700;
    font-size: 0.9375rem;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.95);
}
.sarp-summary-card-title {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 800;
    font-size: 1rem;
    letter-spacing: 0.1em;
    line-height: 1.35;
    text-transform: uppercase;
    color: #ffffff;
    -webkit-font-smoothing: antialiased;
}

/* Programme-type mini cards (Tank / Youth Enterprise / 4P / Resilience) */
.sarp-programme-summary-row {
    margin-top: 0.15rem;
}
.sarp-programme-mini-card {
    border-radius: 14px;
    padding: 20px 12px 22px;
    text-align: center;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 6px 22px rgba(0, 0, 0, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.12);
}
.sarp-programme-mini-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
}
.sarp-programme-mini-card__label {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 700;
    font-size: 0.6875rem;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    color: #fff;
    line-height: 1.4;
    margin-bottom: 12px;
    -webkit-font-smoothing: antialiased;
}
.sarp-programme-mini-card__value {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-weight: 900;
    font-size: clamp(1.5rem, 3.5vw, 2.1rem);
    line-height: 1;
    color: #fff;
    font-variant-numeric: tabular-nums;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.22);
    -webkit-font-smoothing: antialiased;
}

/* Total Beneficiaries — modern hero summary card */
.sarp-total-ben-card {
    position: relative;
    overflow: hidden;
    height: 100%;
    min-height: 220px;
    border-radius: 22px;
    padding: 28px 22px 32px;
    text-align: center;
    isolation: isolate;
    background:
        radial-gradient(ellipse 120% 80% at 90% -10%, rgba(255, 255, 255, 0.28) 0%, transparent 52%),
        radial-gradient(ellipse 90% 70% at -5% 105%, rgba(129, 140, 248, 0.55) 0%, transparent 48%),
        linear-gradient(145deg, #1e1b4b 0%, #3730a3 28%, #5b21b6 55%, #7c3aed 88%, #8b5cf6 100%);
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow:
        0 4px 6px -1px rgba(15, 23, 42, 0.12),
        0 18px 38px -10px rgba(67, 56, 202, 0.55),
        0 0 0 1px rgba(0, 0, 0, 0.06) inset,
        inset 0 1px 0 rgba(255, 255, 255, 0.22);
    transition: transform 0.4s cubic-bezier(0.34, 1.3, 0.64, 1), box-shadow 0.4s ease;
    cursor: default;
}
.sarp-total-ben-card::before {
    content: '';
    position: absolute;
    inset: -40%;
    background: conic-gradient(from 210deg at 50% 50%, transparent 0deg, rgba(255, 255, 255, 0.06) 60deg, transparent 120deg);
    animation: sarp-total-ben-shimmer 14s linear infinite;
    z-index: 0;
    pointer-events: none;
    opacity: 0.9;
}
@keyframes sarp-total-ben-shimmer {
    to { transform: rotate(360deg); }
}
@media (prefers-reduced-motion: reduce) {
    .sarp-total-ben-card::before {
        animation: none;
    }
    .sarp-total-ben-card:hover {
        transform: none;
    }
}
.sarp-total-ben-card:hover {
    transform: translateY(-6px) scale(1.01);
    box-shadow:
        0 8px 12px -2px rgba(15, 23, 42, 0.15),
        0 28px 48px -12px rgba(79, 70, 229, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.28);
}
.sarp-total-ben-card__body {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    -webkit-font-smoothing: antialiased;
}
.sarp-total-ben-card__badge {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    font-size: 1.45rem;
    color: #fff;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.22);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}
.sarp-total-ben-card__label {
    margin: 0 0 10px;
    color: rgba(255, 255, 255, 0.96);
    font-size: 0.8125rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    line-height: 1.35;
}
.sarp-total-ben-card__count {
    margin: 6px 0 16px;
    padding: 8px 18px 12px;
    color: #ffffff;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    font-size: clamp(2.85rem, 7vw, 3.85rem);
    font-weight: 900;
    line-height: 1;
    letter-spacing: 0.05em;
    font-variant-numeric: tabular-nums lining-nums;
    text-shadow:
        0 2px 0 rgba(0, 0, 0, 0.22),
        0 6px 28px rgba(0, 0, 0, 0.35),
        0 0 1px rgba(0, 0, 0, 0.5);
}
.sarp-total-ben-card__hint {
    margin: 0;
    max-width: 240px;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.5;
    letter-spacing: 0.03em;
}
.sarp-total-ben-card__accent {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 48%;
    height: 3px;
    border-radius: 3px 3px 0 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.55), transparent);
    z-index: 2;
    pointer-events: none;
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

        /* Beneficiary table filters (above data table) */
        .beneficiary-filter-toolbar {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 0;
            margin: 20px 0 12px;
            box-shadow: none;
            text-align: left;
        }
        .beneficiary-filter-toolbar .filter-toolbar-top {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px 14px;
            margin-bottom: 2px;
        }
        .beneficiary-filter-toolbar .filter-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 18px;
            border: 2px solid #126926;
            background: #fff;
            color: #126926;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(18, 105, 38, 0.12);
        }
        .beneficiary-filter-toolbar .filter-toggle-btn:hover {
            background: #126926;
            color: #fff;
            box-shadow: 0 4px 14px rgba(18, 105, 38, 0.25);
        }
        .beneficiary-filter-toolbar .filter-badge {
            background: #126926;
            color: #fff;
            font-size: 11px;
            min-width: 22px;
            height: 22px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }
        .beneficiary-filter-toolbar .filter-toggle-btn:hover .filter-badge {
            background: #fff;
            color: #126926;
        }
        .beneficiary-filter-toolbar .filter-toolbar-hint {
            color: #64748b !important;
            font-size: 13px !important;
            font-weight: 500;
        }

        /* Inner card: all controls on one row */
        .beneficiary-filter-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow:
                0 4px 22px rgba(15, 23, 42, 0.07),
                0 1px 3px rgba(15, 23, 42, 0.04),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            padding: 14px 16px 12px;
            margin-top: 12px;
            position: relative;
            overflow: hidden;
        }
        .beneficiary-filter-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #126926 0%, #22c55e 45%, #0d9488 100%);
            opacity: 0.92;
        }
        .beneficiary-filter-panel .beneficiary-filter-row {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: flex-end;
            gap: 10px 12px;
            overflow-x: auto;
            overflow-y: visible;
            padding: 4px 2px 6px;
            margin: 0 -2px;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
        }
        .beneficiary-filter-panel .beneficiary-filter-row::-webkit-scrollbar {
            height: 6px;
        }
        .beneficiary-filter-panel .beneficiary-filter-row::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 6px;
        }
        .beneficiary-filter-panel .beneficiary-filter-row::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 6px;
        }
        .beneficiary-filter-field {
            flex: 1 1 0;
            min-width: 118px;
        }
        .beneficiary-filter-field--tank {
            min-width: 140px;
        }
        .beneficiary-filter-field--type {
            min-width: 168px;
            flex: 1.15 1 0;
        }
        .beneficiary-filter-panel label.beneficiary-filter-label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 5px;
            font-size: 10px !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            white-space: nowrap;
        }
        .beneficiary-filter-panel label.beneficiary-filter-label i {
            color: #126926;
            font-size: 11px;
            opacity: 0.9;
        }

        /* Modern styled dropdowns (native select + custom chevron & surface) */
        .beneficiary-filter-panel select.beneficiary-filter-select {
            display: block;
            width: 100%;
            max-width: 100%;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            min-height: 38px;
            border-radius: 11px;
            border: 1px solid rgba(15, 23, 42, 0.1);
            font-family: inherit;
            font-size: 12.5px !important;
            font-weight: 500 !important;
            line-height: 1.35;
            letter-spacing: 0.02em;
            color: #0f172a !important;
            padding: 8px 38px 8px 13px !important;
            height: auto !important;
            cursor: pointer;
            background-color: #f1f5f9;
            background-image:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%23126926' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"),
                linear-gradient(165deg, #ffffff 0%, #f8fafc 42%, #f1f5f9 100%);
            background-repeat: no-repeat, no-repeat;
            background-position: right 11px center, 0 0;
            background-size: 15px 15px, 100% 100%;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.9),
                0 1px 2px rgba(15, 23, 42, 0.05);
            transition:
                border-color 0.22s ease,
                box-shadow 0.22s ease,
                background-color 0.22s ease,
                background-image 0.22s ease,
                transform 0.18s ease;
        }
        .beneficiary-filter-panel select.beneficiary-filter-select:hover {
            border-color: rgba(18, 105, 38, 0.38);
            background-image:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%230f5c24' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"),
                linear-gradient(165deg, #ffffff 0%, #fafdfb 50%, #ecfdf5 100%);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 1),
                0 2px 10px rgba(18, 105, 38, 0.1);
            transform: translateY(-0.5px);
        }
        .beneficiary-filter-panel select.beneficiary-filter-select:focus {
            border-color: #126926;
            outline: none;
            background-image:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%23126926' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"),
                linear-gradient(165deg, #ffffff 0%, #f0fdf4 45%, #ecfdf3 100%);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 1),
                0 0 0 3px rgba(18, 105, 38, 0.22),
                0 6px 16px rgba(18, 105, 38, 0.12);
        }
        .beneficiary-filter-panel select.beneficiary-filter-select:active {
            transform: translateY(0);
        }
        @supports (-webkit-touch-callout: none) {
            .beneficiary-filter-panel select.beneficiary-filter-select {
                font-size: 16px !important;
            }
        }
        @media (min-width: 576px) {
            @supports (-webkit-touch-callout: none) {
                .beneficiary-filter-panel select.beneficiary-filter-select {
                    font-size: 12.5px !important;
                }
            }
        }
        .beneficiary-filter-actions {
            flex: 0 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 8px;
            padding-left: 4px;
            margin-left: 2px;
            border-left: 1px solid #e2e8f0;
        }
        .beneficiary-filter-actions .btn-filter-apply {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 9px;
            padding: 7px 16px;
            font-weight: 600;
            font-size: 12px !important;
            border: none;
            background: linear-gradient(135deg, #15803d 0%, #126926 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(18, 105, 38, 0.3);
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }
        .beneficiary-filter-actions .btn-filter-apply:hover {
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(18, 105, 38, 0.35);
        }
        .beneficiary-filter-actions .btn-filter-clear {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            padding: 7px 14px;
            font-weight: 600;
            font-size: 12px !important;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b !important;
            text-decoration: none;
            transition: border-color 0.2s ease, color 0.2s ease, background 0.2s ease;
        }
        .beneficiary-filter-actions .btn-filter-clear:hover {
            border-color: #cbd5e1;
            color: #126926;
            background: #f8fafc;
        }
        .beneficiary-filter-panel .filter-hint {
            font-size: 11px !important;
            color: #94a3b8 !important;
            margin: 8px 0 0;
            padding-top: 8px;
            border-top: 1px solid #f1f5f9;
            line-height: 1.45;
            text-align: left;
        }
        .beneficiary-filter-panel .filter-hint i {
            color: #126926;
            opacity: 0.75;
        }

        /* Bulk selection bar (delete selected) */
        .beneficiary-bulk-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            margin: 0 0 16px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.05);
        }
        .beneficiary-bulk-bar__count {
            font-weight: 600;
            color: #334155;
            font-size: 14px !important;
            min-width: 100px;
        }
        .beneficiary-bulk-delete {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #fff !important;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px !important;
            padding: 8px 18px;
            box-shadow: 0 2px 8px rgba(185, 28, 28, 0.25);
            transition: transform 0.15s ease, box-shadow 0.2s ease, opacity 0.2s ease;
        }
        .beneficiary-bulk-delete:hover:not(:disabled) {
            color: #fff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.35);
        }
        .beneficiary-bulk-delete:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        .beneficiary-row-check {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #126926;
        }
        #beneficiariesTable th.bulk-col,
        #beneficiariesTable td.bulk-col {
            width: 44px;
            text-align: center;
            vertical-align: middle;
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

    /* Fixed MIS header uses z-index ~99999; modals must sit above it or dialogs sit "under" the bar */
    .modal {
        z-index: 110000 !important;
    }
    .modal-backdrop.show {
        z-index: 109900 !important;
    }
</style>
</head>
<body>
@include('dashboard.header', ['headerTitleSmall' => true])
    {{-- <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;"> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <div class="frame" id="sarpAppFrame" style="padding-top: 70px;">
        <div class="left-column" id="sarpSidebar">
            @include('dashboard.dashboardC')
            @csrf
        </div>
        <div class="right-column">

        <div class="d-flex align-items-center mb-3">

            <!-- Sidebar Toggle Button -->
            <button type="button" id="sidebarToggle" class="btn btn-secondary mr-2" aria-controls="sarpSidebar" aria-expanded="true" title="Hide menu">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>


            @include('partials.sarp_history_back', ['fallback' => route('dashboard')])

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

        <!-- Enhanced Summary Cards — one row: Total, Crop, Tank Names, Male/Female/Youth -->
        <div class="container mt-4">
    <div class="row justify-content-center g-3">
        <!-- Total Beneficiaries Card (modern hero style) -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="sarp-total-ben-card summary-card" role="region" aria-label="Total beneficiaries summary">
                <div class="sarp-total-ben-card__accent" aria-hidden="true"></div>
                <div class="sarp-total-ben-card__body">
                    <div class="sarp-total-ben-card__badge" aria-hidden="true">
                        <i class="fas fa-user-group"></i>
                    </div>
                    <p class="sarp-total-ben-card__label">Total Beneficiaries</p>
                    <div class="sarp-total-ben-card__count">{{ number_format($beneficiaries->total()) }}</div>
                    <p class="sarp-total-ben-card__hint">Total beneficiaries currently in the system (filtered view).</p>
                </div>
            </div>
        </div>

        <!-- Crop Names Summary Card -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; height: 100%;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(79, 172, 254, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(79, 172, 254, 0.3)';">
                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                    <i class="fas fa-leaf" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i>Crop Name/Production Focus<br/>Youth Proposal
                </div>
                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                    {{ number_format($input3Summary->count() ?? 0) }}
                </div>
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin-bottom: 20px;">Click below to view the summary</p>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#input3SummaryModal" style="border-radius: 25px; padding: 8px 20px; font-weight: 600; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                    <i class="fas fa-eye" style="margin-right: 5px;"></i>View Details
                </button>
            </div>
        </div>

        <!-- Tank Names Summary Card -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 8px 25px rgba(48, 207, 208, 0.3); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; height: 100%;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(48, 207, 208, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(48, 207, 208, 0.3)';">
                <div class="sarp-summary-card-title" style="margin-bottom: 15px;">
                    <i class="fas fa-water" style="margin-right: 8px; font-size: 24px; vertical-align: -4px;"></i>Tank Names
                </div>
                <div class="sarp-summary-metric-lg" style="margin: 20px 0;">
                    {{ number_format($tankNameSummary->count() ?? 0) }}
                </div>
                <p style="color: rgba(255, 255, 255, 0.9); font-size: 14px; margin-bottom: 20px;">Click below to view the summary</p>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#tankNameSummaryModal" style="border-radius: 25px; padding: 8px 20px; font-weight: 600; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                    <i class="fas fa-eye" style="margin-right: 5px;"></i>View Details
                </button>
            </div>
        </div>

        <!-- Male, Female & Youth — single card (same large card style) -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="summary-card" style="background: linear-gradient(135deg, #7b4397 0%, #dc2430 50%, #f7971e 100%); border-radius: 15px; padding: 24px 20px 28px; text-align: center; box-shadow: 0 8px 25px rgba(123, 67, 151, 0.35); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: default; height: 100%;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 35px rgba(123, 67, 151, 0.45)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(123, 67, 151, 0.35)';">
                <div class="sarp-summary-card-title" style="font-size: 0.9rem; margin-bottom: 18px;">
                    <i class="fas fa-venus-mars" style="margin-right: 8px; font-size: 22px; vertical-align: -3px;"></i>Male, Female, Youth &amp; Not Youth
                </div>
                <div style="text-align: left; max-width: 260px; margin: 0 auto;">
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.28); padding-bottom: 10px;">
                        <span class="sarp-summary-row-label">Male -</span>
                        <span class="sarp-summary-metric-row">{{ number_format($maleBeneficiaryCount ?? 0) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.28); padding-bottom: 10px;">
                        <span class="sarp-summary-row-label">Female -</span>
                        <span class="sarp-summary-metric-row">{{ number_format($femaleBeneficiaryCount ?? 0) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.28); padding-bottom: 10px;">
                        <span class="sarp-summary-row-label">Youth -</span>
                        <span class="sarp-summary-metric-row">{{ number_format($youthBeneficiaryCount ?? 0) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px;">
                        <span class="sarp-summary-row-label">Not Youth -</span>
                        <span class="sarp-summary-metric-row">{{ number_format($notYouthBeneficiaryCount ?? 0) }}</span>
                    </div>
                </div>
                <p class="sarp-ben-summary-font" style="color: rgba(255, 255, 255, 0.9); font-size: 0.75rem; font-weight: 600; margin: 16px 0 0; line-height: 1.45; letter-spacing: 0.02em;">Filtered list (same as table). Youth / Not Youth: NIC birth year; age &lt;= 40 vs &gt; 40.</p>
            </div>
        </div>
    </div>
</div>

        <!-- Programme-type summary row (matches project_type breakdown; same filters as table) -->
        <div class="container sarp-programme-summary-row mb-4">
            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-3 row-cols-xxl-6 g-3 justify-content-center">
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #5b86e5 0%, #36d1dc 100%);">
                        <div class="sarp-programme-mini-card__label">Tank Beneficiaries</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($tankBeneficiaryCount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);">
                        <div class="sarp-programme-mini-card__label">Youth</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($youthProgrammeBeneficiaryCount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);">
                        <div class="sarp-programme-mini-card__label">4P</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($fourpBeneficiaryCount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);">
                        <div class="sarp-programme-mini-card__label">Nutrition Program</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($nutritionProgrammeBeneficiaryCount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);">
                        <div class="sarp-programme-mini-card__label">Resilience – Agriculture</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($resilienceAgricultureCount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="sarp-programme-mini-card summary-card" style="background: linear-gradient(135deg, #4776e6 0%, #8e54e9 100%);">
                        <div class="sarp-programme-mini-card__label">Resilience – Livestock</div>
                        <div class="sarp-programme-mini-card__value">{{ number_format($resilienceLivestockCount ?? 0) }}</div>
                    </div>
                </div>
            </div>
            <p class="text-center text-muted small mt-2 mb-0 sarp-ben-summary-font" style="font-size: 0.75rem;">Counts by <strong>project type</strong> (Youth = Youth Enterprise; Nutrition = Nutrition Programs). Same filters as the table. NIC-based Youth / Not Youth stay in the card above.</p>
        </div>

<!-- Modal for Crop Name Summary -->
<div class="modal fade" id="input3SummaryModal" tabindex="-1" aria-labelledby="input3SummaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input3SummaryModalLabel">Summary of Beneficiaries by Crop Name/Production Focus/<br/>Youth Proposal</h5>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
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


<!-- (Duplicate modals removed) -->
        <!-- Enhanced Filter Buttons -->
        @php
            $filterQueryBase = request()->only(['search', 'entries', 'filter_tank', 'filter_category', 'filter_district', 'filter_ds', 'filter_asc', 'filter_gn']);
        @endphp
        <form method="GET" action="{{ route('beneficiary.index') }}" class="mb-3">
            <div class="d-flex justify-content-end mb-3" style="gap: 10px;">
                <a href="{{ route('beneficiary.index', request()->only(['search', 'entries'])) }}" class="btn btn-outline-secondary" style="border-radius: 8px; padding: 10px 20px; font-weight: 600; border: 2px solid #6c757d; transition: all 0.3s ease;" onmouseover="this.style.background='#6c757d'; this.style.color='#fff'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='transparent'; this.style.color='#6c757d'; this.style.transform='translateY(0)';">
                    <i class="fas fa-list" style="margin-right: 5px;"></i>Show All
                </a>
                <a href="{{ route('beneficiary.index', array_merge($filterQueryBase, ['duplicates' => '1'])) }}" class="btn btn-danger" style="border-radius: 8px; padding: 10px 20px; font-weight: 600; box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 18px rgba(220, 53, 69, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(220, 53, 69, 0.3)';">
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
                        @foreach (['filter_tank', 'filter_category', 'filter_district', 'filter_ds', 'filter_asc', 'filter_gn'] as $fk)
                            @if (request()->filled($fk))
                                <input type="hidden" name="{{ $fk }}" value="{{ request($fk) }}">
                            @endif
                        @endforeach
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
                        @sarpMutate('beneficiary')
                        <a href="{{route('download.csv')}}" class="btn submitbtton" style="border-radius: 8px; padding: 12px 25px; font-weight: 600; box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 18px rgba(25, 135, 84, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(25, 135, 84, 0.3)';">
                            <i class="fas fa-file-csv" style="margin-right: 5px;"></i>Generate CSV
                        </a>
                        @endsarpMutate
                    </div>
                </div>
            </div>
        </div>



        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Upload CSV success / error messages (validation uses $errors; controller uses session('error')) -->
@if(session('success') || session('error') || $errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: @json(session('swal_title', 'Success')),
                text: @json(session('success')),
                confirmButtonColor: '#126926'
            });
            @endif
            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: @json(session('swal_title', 'Upload failed')),
                text: @json(session('error')),
                confirmButtonColor: '#126926'
            });
            @endif
            @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: @json(session('swal_title', 'Upload failed')),
                html: @json(implode('<br>', array_map('e', $errors->all()))),
                confirmButtonColor: '#126926'
            });
            @endif
        });
    </script>
@endif

        <!-- Table filters: tank, programme type, DSD → ASC → GN (single row in card) -->
        <div class="beneficiary-filter-toolbar">
            <div class="filter-toolbar-top">
                <button class="btn filter-toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#beneficiaryFilterCollapse" aria-expanded="{{ ($activeFilterCount ?? 0) > 0 ? 'true' : 'false' }}" aria-controls="beneficiaryFilterCollapse">
                    <i class="fas fa-filter"></i>
                    <span>Filters</span>
                    @if(($activeFilterCount ?? 0) > 0)
                        <span class="filter-badge">{{ $activeFilterCount }}</span>
                    @endif
                </button>
                <span class="filter-toolbar-hint d-none d-md-inline">Narrow the list and summaries by tank, programme type, district, and location.</span>
            </div>

            <div class="collapse {{ ($activeFilterCount ?? 0) > 0 ? 'show' : '' }}" id="beneficiaryFilterCollapse">
                <div class="beneficiary-filter-card">
                    <form method="GET" action="{{ route('beneficiary.index') }}" id="beneficiaryFilterForm" class="beneficiary-filter-panel">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if(request('duplicates'))
                            <input type="hidden" name="duplicates" value="1">
                        @endif
                        @if(request('entries'))
                            <input type="hidden" name="entries" value="{{ request('entries') }}">
                        @endif

                        <div class="beneficiary-filter-row">
                            <div class="beneficiary-filter-field beneficiary-filter-field--tank">
                                <label class="beneficiary-filter-label" for="filter_tank"><i class="fas fa-water" aria-hidden="true"></i> Tank</label>
                                <select name="filter_tank" id="filter_tank" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by tank">
                                    <option value="">All tanks</option>
                                    @foreach ($filterTankOptions ?? [] as $tname)
                                        <option value="{{ $tname }}" {{ request('filter_tank') === $tname ? 'selected' : '' }}>{{ $tname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="beneficiary-filter-field beneficiary-filter-field--type">
                                <label class="beneficiary-filter-label" for="filter_category"><i class="fas fa-layer-group" aria-hidden="true"></i> Programme type</label>
                                <select name="filter_category" id="filter_category" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by programme type">
                                    <option value="">All types</option>
                                    <option value="tank_beneficiary" {{ request('filter_category') === 'tank_beneficiary' ? 'selected' : '' }}>Tank Beneficiaries</option>
                                    <option value="youth" {{ request('filter_category') === 'youth' ? 'selected' : '' }}>Youth</option>
                                    <option value="4p" {{ request('filter_category') === '4p' ? 'selected' : '' }}>4P</option>
                                    <option value="nutrition_program" {{ request('filter_category') === 'nutrition_program' ? 'selected' : '' }}>Nutrition Program</option>
                                    <option value="resilience_agriculture" {{ request('filter_category') === 'resilience_agriculture' ? 'selected' : '' }}>Resilience – Agriculture</option>
                                    <option value="resilience_livestock" {{ request('filter_category') === 'resilience_livestock' ? 'selected' : '' }}>Resilience – Livestock</option>
                                </select>
                            </div>
                            <div class="beneficiary-filter-field">
                                <label class="beneficiary-filter-label" for="filter_district"><i class="fas fa-map" aria-hidden="true"></i> District</label>
                                <select name="filter_district" id="filter_district" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by district">
                                    <option value="">All districts</option>
                                    @foreach ($filterDistrictOptions ?? [] as $dist)
                                        <option value="{{ $dist }}" {{ request('filter_district') === $dist ? 'selected' : '' }}>{{ $dist }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="beneficiary-filter-field">
                                <label class="beneficiary-filter-label" for="filter_ds"><i class="fas fa-map-marked-alt" aria-hidden="true"></i> DSD</label>
                                <select name="filter_ds" id="filter_ds" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by DS division">
                                    <option value="">All DS</option>
                                    @foreach ($filterDsOptions ?? [] as $ds)
                                        <option value="{{ $ds }}" {{ request('filter_ds') === $ds ? 'selected' : '' }}>{{ $ds }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="beneficiary-filter-field">
                                <label class="beneficiary-filter-label" for="filter_asc"><i class="fas fa-building" aria-hidden="true"></i> ASC</label>
                                <select name="filter_asc" id="filter_asc" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by ASC">
                                    <option value="">All ASC</option>
                                    @foreach ($filterAscOptions ?? [] as $asc)
                                        <option value="{{ $asc }}" {{ request('filter_asc') === $asc ? 'selected' : '' }}>{{ $asc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="beneficiary-filter-field">
                                <label class="beneficiary-filter-label" for="filter_gn"><i class="fas fa-map-pin" aria-hidden="true"></i> GND</label>
                                <select name="filter_gn" id="filter_gn" class="form-select form-select-sm beneficiary-filter-select" aria-label="Filter by GN division">
                                    <option value="">All GN</option>
                                    @foreach ($filterGnOptions ?? [] as $gn)
                                        <option value="{{ $gn }}" {{ request('filter_gn') === $gn ? 'selected' : '' }}>{{ $gn }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="beneficiary-filter-actions">
                                <button type="submit" class="btn-filter-apply">
                                    <i class="fas fa-check me-1"></i>Apply
                                </button>
                                <a href="{{ route('beneficiary.index', request()->only(['search', 'entries', 'duplicates'])) }}" class="btn-filter-clear">
                                    <i class="fas fa-undo me-1"></i>Clear
                                </a>
                            </div>
                        </div>
                        <p class="filter-hint"><i class="fas fa-info-circle me-1"></i>Use <strong>District</strong> to limit DSD options, then <strong>DSD</strong> and <strong>Apply</strong> to refresh ASC; then <strong>ASC</strong> and <strong>Apply</strong> for GN. Filters combine (AND). Summary cards use the same filtered set.</p>
                    </form>
                </div>
            </div>
        </div>

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

        @if(auth()->user()->hasPermission('beneficiary', 'delete'))
        <div class="beneficiary-bulk-bar" id="beneficiaryBulkBar">
            <span class="beneficiary-bulk-bar__count" id="bulkSelectedCount">0 selected</span>
            <button type="button" class="btn btn-sm beneficiary-bulk-delete" id="bulkDeleteBtn" disabled aria-label="Delete selected beneficiaries">
                <i class="fas fa-trash-alt me-1"></i>Delete selected
            </button>
        </div>
        <form id="beneficiaryBulkDeleteForm" action="{{ route('beneficiary.bulkDestroy') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endif


        <div class="row table-container">
            <div class="col">
                <div class="table-responsive">
                <table id="beneficiariesTable" class="table">
                    <thead>
                        <tr>
                            @if(auth()->user()->hasPermission('beneficiary', 'delete'))
                            <th scope="col" class="bulk-col" title="Select visible rows">
                                <input type="checkbox" class="beneficiary-row-check" id="beneficiarySelectAll" aria-label="Select all visible beneficiaries">
                            </th>
                            @endif
                            <th scope="col">NIC Number</th>
                            <th scope="col">Name with Initials</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Numbers</th>
                            <th scope="col">Address</th>
                            <th scope="col">Type of Project</th>
                            <th scope="col">Crop Name/<br/>Production Focus/<br/>Youth Proposal/<br/>Nutrition Program Name</th>
                            <th scope="col">Tank Name</th>
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
            $projectTypeKey = strtolower(trim((string) ($beneficiary->project_type ?? '')));
            $projectTypeLabels = [
                'resilience' => 'Resilience',
                'youth' => 'Youth',
                '4p' => '4P',
                'nutrition' => 'Nutrition',
            ];
            $projectTypeDisplay = $projectTypeLabels[$projectTypeKey] ?? ($beneficiary->project_type ? ucfirst($beneficiary->project_type) : '—');
            $addrLines = array_values(array_filter([
                trim((string) ($beneficiary->gn_division_name ?? '')) !== '' ? 'GN Division: ' . $beneficiary->gn_division_name : null,
                trim((string) ($beneficiary->ds_division_name ?? '')) !== '' ? 'DS Division: ' . $beneficiary->ds_division_name : null,
                trim((string) ($beneficiary->district_name ?? '')) !== '' ? 'District: ' . $beneficiary->district_name : null,
                trim((string) ($beneficiary->province_name ?? '')) !== '' ? 'Province: ' . $beneficiary->province_name : null,
                trim((string) ($beneficiary->as_center ?? '')) !== '' ? 'ASC: ' . $beneficiary->as_center : null,
            ]));
            $hasStreet = trim((string) ($beneficiary->address ?? '')) !== '';
        @endphp
        <tr>
            @if(auth()->user()->hasPermission('beneficiary', 'delete'))
            <td class="bulk-col">
                <input type="checkbox" class="beneficiary-row-check" name="bulk_row_sel" value="{{ $beneficiary->id }}" aria-label="Select {{ $beneficiary->name_with_initials }}">
            </td>
            @endif
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
                            <td>{{ $beneficiary->phone ?: '—' }}</td>
                            <td class="text-start beneficiary-address-cell" style="white-space: normal; max-width: 280px;">
                                @if ($hasStreet)
                                    <div>{{ $beneficiary->address }}</div>
                                @endif
                                @foreach ($addrLines as $line)
                                    <div class="small text-muted" style="color: #4a5568 !important;">{{ $line }}</div>
                                @endforeach
                                @if (!$hasStreet && count($addrLines) === 0)
                                    —
                                @endif
                            </td>
                            <td>{{ $projectTypeDisplay }}</td>
                            <td>{{ $beneficiary->input3 ?: '—' }}</td>
                            <td>{{ $beneficiary->tank_name ?: '—' }}</td>
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

    const selectAll = document.getElementById('beneficiarySelectAll');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const bulkForm = document.getElementById('beneficiaryBulkDeleteForm');
    const countEl = document.getElementById('bulkSelectedCount');

    function getBeneficiaryRowChecks() {
        return document.querySelectorAll('.beneficiary-row-check:not(#beneficiarySelectAll)');
    }

    function updateBulkSelectedCount() {
        if (!countEl) return;
        var checks = getBeneficiaryRowChecks();
        var n = 0;
        checks.forEach(function (c) { if (c.checked) n++; });
        countEl.textContent = n + ' selected';
        if (bulkDeleteBtn) {
            bulkDeleteBtn.disabled = n === 0;
        }
        if (selectAll) {
            var all = checks.length;
            selectAll.checked = all > 0 && n === all;
            selectAll.indeterminate = n > 0 && n < all;
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            getBeneficiaryRowChecks().forEach(function (c) { c.checked = selectAll.checked; });
            updateBulkSelectedCount();
        });
    }
    getBeneficiaryRowChecks().forEach(function (c) {
        c.addEventListener('change', updateBulkSelectedCount);
    });
    updateBulkSelectedCount();

    if (bulkDeleteBtn && bulkForm) {
        bulkDeleteBtn.addEventListener('click', function () {
            var checked = Array.prototype.slice.call(getBeneficiaryRowChecks()).filter(function (c) { return c.checked; });
            if (!checked.length) return;
            var n = checked.length;
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Delete selected beneficiaries?',
                    html: 'Permanently delete <strong>' + n + '</strong> record(s) and their linked family member rows.<br><span style="color:#64748b;font-size:0.9em;">This cannot be undone.</span>',
                    icon: 'warning',
                    iconColor: '#b91c1c',
                    showCancelButton: true,
                    focusCancel: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    confirmButtonColor: '#b91c1c',
                    cancelButtonColor: '#64748b',
                    reverseButtons: true
                }).then(function (result) {
                    if (!result.isConfirmed) return;
                    bulkForm.querySelectorAll('input[name="ids[]"]').forEach(function (i) { i.remove(); });
                    checked.forEach(function (cb) {
                        var h = document.createElement('input');
                        h.type = 'hidden';
                        h.name = 'ids[]';
                        h.value = cb.value;
                        bulkForm.appendChild(h);
                    });
                    bulkForm.submit();
                });
            } else {
                showCustomAlert(
                    'Permanently delete ' + n + ' beneficiary record(s) and their linked family member rows? This cannot be undone.',
                    'Confirm bulk delete',
                    function () {
                        bulkForm.querySelectorAll('input[name="ids[]"]').forEach(function (i) { i.remove(); });
                        checked.forEach(function (cb) {
                            var h = document.createElement('input');
                            h.type = 'hidden';
                            h.name = 'ids[]';
                            h.value = cb.value;
                            bulkForm.appendChild(h);
                        });
                        bulkForm.submit();
                    }
                );
            }
        });
    }
});

var entriesEl = document.getElementById('entriesSelect');
if (entriesEl) entriesEl.addEventListener('change', function () {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('entries', this.value);
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

@include('partials.sarp_sidebar_frame_toggle')

        </body>
</html>

