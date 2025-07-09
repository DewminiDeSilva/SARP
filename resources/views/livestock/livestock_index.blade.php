<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livestock Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
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
            border-right: 1px solid #dee2e6;
        }

        /* Custom CSS */
        :root {
            --primary-color: #1e3a8a;
            --primary-light: #3b82f6;
            --primary-dark: #1e40af;
            --success-color: #10b981;
            --success-light: #34d399;
            --success-dark: #059669;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --bg-primary: #ffffff;
            --bg-secondary: #f9fafb;
            --bg-tertiary: #f3f4f6;
            --border-color: #e5e7eb;
            --border-light: #f3f4f6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }


         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        h2 {
            color: var(--primary-color);
            border-bottom: 3px solid var(--accent-color);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--header-bg) !important;
            color: #444;
            font-weight: 600;
            padding: 1rem;
            border-right: 1px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
            position: relative;
        }

        /* Add sort indicator space */

        .table thead th:last-child {
            border-right: none;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-right: 1px solid #dee2e6;
            background-color: white;
        }

        .table tbody td:last-child {
            border-right: none;
        }

        .table tbody tr:hover td {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        /* Alternating row colors */
        .table tbody tr:nth-child(even) td {
            background-color: #fafafa;
        }

        /* Detail box styling */
        .detail-box {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .detail-box:last-child {
            margin-bottom: 0;
        }

        /* Button Styling */
        .btn {
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            margin: 2px;
        }

        .btn-warning {
            background-color: #f1c40f;
            border-color: #f1c40f;
            color: var(--primary-color);
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Empty state styling */
        .empty-state {
            text-align: center;
            padding: 1rem;
            color: #666;
            background-color: #f8f9fa;
            border-radius: 6px;
            font-style: italic;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .table thead {
                display: none;
            }

            .table tbody td {
                display: block;
                padding: 0.5rem;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 0.5rem;
                color: #444;
            }

            .table tbody tr {
                border-bottom: 2px solid #dee2e6;
            }

            .btn {
                display: block;
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
        .section-card {
    border: 2px solid #28a745;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
    background-color: #f9fff9;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.1);
}

.section-header {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    font-weight: bold;
    font-size: 16px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    margin: -20px -20px 20px -20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-header i {
    margin-right: 8px;
}

.remove-btn {
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 12px;
    font-size: 14px;
    margin-top: 5px;
}

.remove-btn:hover {
    background-color: #c82333;
}

.add-more-btn {
    background-color: #198754;
    color: white;
    border: none;
    padding: 7px 15px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: 10px;
}

.add-more-btn:hover {
    background-color: #157347;
}
.section-card {
    border: 2px solid #28a745;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
    background-color: #f9fff9;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.1);
}

.section-header {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    font-weight: bold;
    font-size: 16px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    margin: -20px -20px 20px -20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-header i {
    margin-right: 8px;
}

.remove-btn {
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 12px;
    font-size: 14px;
    margin-top: 5px;
}

.remove-btn:hover {
    background-color: #c82333;
}

.add-more-btn {
    background-color: #198754;
    color: white;
    border: none;
    padding: 7px 15px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: 10px;
}

.add-more-btn:hover {
    background-color: #157347;
}

    </style>

    <style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>


    <a href="{{ route('infrastructure.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    </div>

    <!-- Rest of the HTML remains the same as in the previous version -->
   <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2 class="mb-0">Cultivation data of <span>{{ $beneficiary->name_with_initials }}</span></h2>
    </div>

    @foreach($livestocks as $livestock)
    <!-- WHITE ACTION BAR -->
    <div class="d-flex justify-content-end align-items-center bg-white p-2 rounded shadow-sm mb-1">

        {{-- EDIT BUTTON --}}
        @if(auth()->user()->hasPermission('livestocks', 'edit'))
            <button type="button" class="btn btn-warning me-2"
                    onclick="confirmEdit({{ $livestock->id }})">
                EDIT
            </button>
            <form id="edit-form-{{ $livestock->id }}"
                  action="{{ route('livestocks.edit', ['beneficiary_id' => $beneficiary->id, 'livestock' => $livestock->id]) }}"
                  method="GET" style="display:none;">
            </form>
        @endif
           @if(auth()->user()->hasPermission('livestocks', 'delete'))
    <form id="delete-form-{{ $livestock->id }}"
          action="{{ route('livestocks.destroy', ['beneficiary_id' => $beneficiary->id, 'livestock_id' => $livestock->id]) }}"
          method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger"
                onclick="confirmDelete({{ $livestock->id }})">
            DELETE
        </button>
    </form>
@endif

        </div>
       <div class="section-card">
    <div class="section-header"><i class="fas fa-seedling"></i> Basic info</div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4"><strong>Livestock Type:</strong> {{ $livestock->livestock_type ?? 'N/A' }}</div>
                <div class="col-md-4"><strong>Production Focus:</strong> {{ $livestock->production_focus ?? 'N/A' }}</div>
                <div class="col-md-4"><strong>Commencement Date:</strong> {{ $livestock->livestock_commencement_date ?? 'N/A' }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Number of Livestock:</strong> {{ $livestock->number_of_livestocks ?? 'N/A' }}</div>
                <div class="col-md-4"><strong>Area of the Cade:</strong> {{ $livestock->area_of_cade ?? 'N/A' }}</div>
                <div class="col-md-4"><strong>Value:</strong> Rs. {{ number_format($livestock->value ?? 0, 2) }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>GN Division:</strong> {{ $livestock->gn_division_name ?? 'N/A' }}</div>
            </div>
        </div>
    </div>


       <!-- Farmer Contributions -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-seedling"></i> Farmer Contributions</div>
    @if($livestock->farmerContributions->isNotEmpty())
        @foreach($livestock->farmerContributions as $item)
            <div class="detail-box">
                <strong>Date:</strong> {{ $item->date }}<br>
                <strong>Description:</strong> {{ $item->description }}<br>
                <strong>Value:</strong> Rs. {{ $item->value }}
            </div>
        @endforeach
    @else
        <div class="empty-state">No farmer contributions available.</div>
    @endif
</div>

<!-- Promoter Contributions -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-user-friends"></i> Promoter Contributions</div>
    @if($livestock->promoterContributions->isNotEmpty())
        @foreach($livestock->promoterContributions as $item)
            <div class="detail-box">
                <strong>Date:</strong> {{ $item->date }}<br>
                <strong>Description:</strong> {{ $item->description }}<br>
                <strong>Value:</strong> Rs. {{ $item->value }}
            </div>
        @endforeach
    @else
        <div class="empty-state">No promoter contributions available.</div>
    @endif
</div>

<!-- Grant Details -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-gift"></i> Grant Details</div>
    @if($livestock->grantDetails->isNotEmpty())
        @foreach($livestock->grantDetails as $item)
            <div class="detail-box">
                <strong>Date:</strong> {{ $item->date }}<br>
                <strong>Description:</strong> {{ $item->description }}<br>
                <strong>Value:</strong> Rs. {{ $item->value }}<br>
                <strong>Issued By:</strong> {{ $item->grant_issued_by }}
            </div>
        @endforeach
    @else
        <div class="empty-state">No grant details available.</div>
    @endif
</div>

<!-- Credit Details -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-university"></i> Credit Details</div>
    <div class="row">
        <div class="col-md-4"><strong>Bank:</strong> {{ $livestock->bank_name ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Branch:</strong> {{ $livestock->branch ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Account:</strong> {{ $livestock->account_number ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Amount:</strong> Rs. {{ $livestock->credit_amount ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Interest Rate:</strong> {{ $livestock->interest_rate ?? 'N/A' }}%</div>
        <div class="col-md-4"><strong>Credit Issue Date:</strong> {{ $livestock->credit_issue_date ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Loan Installment Date:</strong> {{ $livestock->loan_installment_date ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>No. of Installments:</strong> {{ $livestock->number_of_installments ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Installment Due Date:</strong> {{ $livestock->installment_due_date ?? 'N/A' }}</div>
    </div>
</div>

<!-- Installment Payments -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-calendar-check"></i> Installment Payments</div>
    @if($livestock->installmentPayments->isNotEmpty())
        @foreach($livestock->installmentPayments as $payment)
            <div class="detail-box">
                <strong>Payment Date:</strong> {{ $payment->installment_payment_date }}<br>
                <strong>Value:</strong> Rs. {{ $payment->installment_payment_value }}
            </div>
        @endforeach
    @else
        <div class="empty-state">No installment payments available.</div>
    @endif
</div>

<!-- Credit Balance -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-balance-scale"></i> Credit Balance</div>
    <div class="row">
        <div class="col-md-4"><strong>No:</strong> {{ $livestock->credit_balance_no ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Date:</strong> {{ $livestock->credit_balance_date ?? 'N/A' }}</div>
        <div class="col-md-4"><strong>Value:</strong> Rs. {{ $livestock->credit_balance_value ?? 'N/A' }}</div>
    </div>
</div>

<!-- Livestock Products -->
<div class="section-card">
    <div class="section-header"><i class="fas fa-cubes"></i> Livestock Products</div>
    @if($livestock->liveProducts->isNotEmpty())
        @foreach($livestock->liveProducts as $product)
            <div class="detail-box">
                <strong>Product:</strong> {{ $product->product_name }}<br>
                <strong>Total Production:</strong> {{ $product->total_production }} kg<br>
                <strong>Total Income:</strong> Rs. {{ $product->total_income }}<br>
                <strong>Profit:</strong> Rs. {{ $product->profit }}
            </div>
        @endforeach
    @else
        <div class="empty-state">No products available.</div>
    @endif
</div>

        
        </form>
    </tr>
    @endforeach
</tbody>

        </table>

        @if($livestocks->isEmpty())
            <div class="empty-state">
                <p>No livestock data found for this beneficiary.</p>
            </div>
        @endif
    </div>
    </div>
    </div>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
    });
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will permanently delete the livestock record.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will permanently delete the livestock record.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    function confirmEdit(id) {
        Swal.fire({
            title: 'Proceed to edit?',
            text: "You're about to edit this record.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, edit it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('edit-form-' + id).submit();
            }
        });
    }
</script>



</body>
</html>
