<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Enterprise Details</title>

    <!-- jQuery and Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .entries-container {
            display: flex;
            align-items: center;
        }

        .entries-container label {
            margin-bottom: 0;
        }

        .entries-container select {
            display: inline-block;
            width: auto;
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

        .pagination .page-item {
            margin: 0 0px;
        }

        .pagination .page-link {
            padding: 5px 10px;
        }

        .page-item {
            background-color: white;
            padding: 0px;
        }

        .pagination:hover,
        .page-item:hover {
            border-color: #fff;
            background-color: #fff;
            cursor: pointer;
        }

        .page-link {
            color: #28a745;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #126926;
            border-color: #126926;
        }
         
        
    </style>

    <style>
        .section-title {
            background-color: #f8f9fa;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            border-left: 5px solid #28a745;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
@include('dashboard.header')

    <div class="frame" style="padding-top: 70px;">
        <div class="left-column">
            @include('dashboard.dashboardC')
        </div>

        <div class="right-column">
            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h2 style="font-size: 2.4rem; color: green;">Youth Enterprise Details</h2>
                </div>
            </div>
    
    


    <div class="container mt-4">
    <div class="border border-success p-3 rounded">

    


    <div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded border bg-light shadow-sm">
    <!-- Left side: Beneficiary Name -->
    <div style="font-size: 1.3rem; font-weight: 700; color:rgb(14, 99, 48);">
        <i class="fas fa-user me-2"></i> Beneficiary: {{ $beneficiary->name_with_initials ?? 'N/A' }}
    </div>

    <!-- Right side: Edit & Delete Buttons -->
    <div>
        <a href="{{ route('youth.edit', $youth->id) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit
        </a>

        <form action="{{ route('youth.destroy', $youth->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash-alt"></i> Delete
    </button>
</form>



    </div>
</div>


    
        <!-- Card 1: Enterprise Information -->
        <div class="card mb-4 mt-3">
    <div class="card-header bg-success text-white fw-bold">
        Enterprise Information
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Enterprise Name</th>
                    <td>{{ $youth->enterprise_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Registration Number</th>
                    <td>{{ $youth->registration_number ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Institute of Registration</th>
                    <td>{{ $youth->institute_of_registration ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $youth->address ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $youth->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $youth->phone_number ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ $youth->website_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Certificates Description</th>
                    <td>{{ $youth->description_of_certificates ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


        <!-- Card 2: Business Details -->
<div class="card mb-4 mt-5">
    <div class="card-header bg-success text-white fw-bold">
        Business Details
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nature of Business</th>
                    <td>{{ $youth->nature_of_business ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Products Available</th>
                    <td>{{ $youth->products_available ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Yield Collection Details</th>
                    <td>{{ $youth->yield_collection_details ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Marketing Information</th>
                    <td>{{ $youth->marketing_information ?? '-' }}</td>
                </tr>
                <tr>
                    <th>List of Distributors</th>
                    <td>{{ $youth->list_of_distributors ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Business Plan (PDF)</th>
                    <td>
                        @if ($youth->business_plan)
                            <a href="{{ asset('storage/' . $youth->business_plan) }}" target="_blank">Download Plan</a>
                        @else
                            Not Uploaded
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


        <!-- Card 3: Additional Details -->
        <div class="card mb-4 mt-5">
    <div class="card-header bg-success text-white fw-bold">
        Additional Details
    </div>
    <div class="card-body">

        {{-- Asset Details --}}
        <h5 class="fw-semibold mb-2">Asset Details</h5>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Asset Name</th>
                    <th>Asset Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($youth->asset_details ?? [] as $asset)
                    <tr>
                        <td>{{ $asset['asset_name'] ?? '-' }}</td>
                        <td>{{ $asset['asset_value'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2">No asset details provided.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{-- Youth Contributions --}}
        <h5 class="fw-semibold mb-2">Youth Contributions</h5>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($youth->youth_contributions ?? [] as $item)
                    <tr>
                        <td>{{ $item['date'] ?? '-' }}</td>
                        <td>{{ $item['description'] ?? '-' }}</td>
                        <td>{{ $item['value'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">No youth contributions recorded.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{-- Promoter Contributions --}}
        <h5 class="fw-semibold mb-2">Promoter Contributions</h5>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($youth->promoter_contributions ?? [] as $item)
                    <tr>
                        <td>{{ $item['date'] ?? '-' }}</td>
                        <td>{{ $item['description'] ?? '-' }}</td>
                        <td>{{ $item['value'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">No promoter contributions recorded.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{-- Grant Details --}}
        <h5 class="fw-semibold mb-2">Grant Details</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Issued By</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($youth->grant_details ?? [] as $item)
                    <tr>
                        <td>{{ $item['date'] ?? '-' }}</td>
                        <td>{{ $item['description'] ?? '-' }}</td>
                        <td>{{ $item['value'] ?? '-' }}</td>
                        <td>{{ $item['grant_issued_by'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">No grant details provided.</td></tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>


    <div class="card mb-4 mt-5">
    <div class="card-header bg-success text-white fw-bold">
        Financial Details
    </div>
    <div class="card-body">

        <!-- Credit Details -->
        <h5 class="mb-3">Credit Details</h5>
        <table class="table table-bordered">
            <tbody>
                <tr><th>Bank Name</th><td>{{ $youth->bank_name ?? '-' }}</td></tr>
                <tr><th>Branch</th><td>{{ $youth->branch ?? '-' }}</td></tr>
                <tr><th>Account Number</th><td>{{ $youth->account_number ?? '-' }}</td></tr>
                <tr><th>Interest Rate</th><td>{{ $youth->interest_rate ?? '-' }}</td></tr>
                <tr><th>Credit Issue Date</th><td>{{ $youth->credit_issue_date ?? '-' }}</td></tr>
                <tr><th>Loan Installment Date</th><td>{{ $youth->loan_installment_date ?? '-' }}</td></tr>
                <tr><th>Credit Amount</th><td>{{ $youth->credit_amount ?? '-' }}</td></tr>
                <tr><th>Number of Installments</th><td>{{ $youth->number_of_installments ?? '-' }}</td></tr>
                <tr><th>Installment Due Date</th><td>{{ $youth->installment_due_date ?? '-' }}</td></tr>
                <tr><th>Credit Balance Date</th><td>{{ $youth->credit_balance_date ?? '-' }}</td></tr>
                <tr><th>Credit Balance Value</th><td>{{ $youth->credit_balance_value ?? '-' }}</td></tr>
            </tbody>
        </table>

        <!-- Installment Payments -->
        <h5 class="mt-4 mb-3">Installment Payments</h5>
        <table class="table table-bordered">
            <thead>
                <tr><th>Payment Date</th><th>Payment Value</th></tr>
            </thead>
            <tbody>
                @forelse($youth->installment_payments ?? [] as $item)
                    <tr>
                        <td>{{ $item['installment_payment_date'] ?? '-' }}</td>
                        <td>{{ $item['installment_payment_value'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2">No installment payments recorded.</td></tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

        </div>
    </div>


</div>
</div>


</body>
</html>