<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery and Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Edit Youth Enterprise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .section-title {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            border-left: 5px solid #28a745;
        }
    </style>
</head>
<body>


<@include('dashboard.header')

    <div class="frame" style="padding-top: 50px;">
        <div class="left-column">
            @include('dashboard.dashboardC')
        </div>

        <div class="right-column" style="padding:70px;">
            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h2 style="font-size: 2.4rem; color: green;">Edit Youth Details</h2>
                </div>
            </div>

    <div class="container mt-5 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            
    <form id="editYouthForm" action="{{ route('youth.update', $youth->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

        <div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded border bg-light shadow-sm">
    <!-- Left side: Beneficiary Name -->
    <div style="font-size: 1.3rem; font-weight: 700; color:rgb(14, 99, 48);">
        <i class="fas fa-user me-2"></i> Beneficiary: {{ $beneficiary->name_with_initials ?? 'N/A' }}
    </div>

    
</div>

        <!-- 1. Enterprise Information -->
        <div class="card mb-3">
            <div class="card-header bg-success text-white font-weight-bold">Enterprise Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Enterprise Name</label>
                        <input type="text" name="enterprise_name" class="form-control" value="{{ $youth->enterprise_name }}">
                    </div>
                    <div class="col-md-4">
                        <label>Registration Number</label>
                        <input type="text" name="registration_number" class="form-control" value="{{ $youth->registration_number }}">
                    </div>
                    <div class="col-md-4">
                        <label>Institute of Registration</label>
                        <input type="text" name="institute_of_registration" class="form-control" value="{{ $youth->institute_of_registration }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $youth->address }}">
                    </div>
                    <div class="col-md-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $youth->email }}">
                    </div>
                    <div class="col-md-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $youth->phone_number }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Website</label>
                        <input type="text" name="website_name" class="form-control" value="{{ $youth->website_name }}">
                    </div>
                    <div class="col-md-6">
                        <label>Certificates Description</label>
                        <textarea name="description_of_certificates" class="form-control">{{ $youth->description_of_certificates }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nature of Business</label>
                        <input type="text" name="nature_of_business" class="form-control" value="{{ $youth->nature_of_business }}">
                    </div>
                    <div class="col-md-6">
                        <label>Products Available</label>
                        <textarea name="products_available" class="form-control">{{ $youth->products_available }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Yield Collection Details</label>
                        <textarea name="yield_collection_details" class="form-control">{{ $youth->yield_collection_details }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Marketing Information</label>
                        <textarea name="marketing_information" class="form-control">{{ $youth->marketing_information }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>List of Distributors</label>
                        <textarea name="list_of_distributors" class="form-control">{{ $youth->list_of_distributors }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Business Plan (PDF)</label>
                        <input type="file" name="business_plan" class="form-control">
                        @if ($youth->business_plan)
                            <a href="{{ asset('storage/' . $youth->business_plan) }}" target="_blank">View current</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Sections (reuse same as create for JS) -->
        <!-- Asset Details -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Asset Details</div>
    <div class="card-body">
        <div id="assetDetails">
            @php
                $assetDetails = is_array($youth->asset_details)
                    ? $youth->asset_details
                    : (is_string($youth->asset_details) ? json_decode($youth->asset_details, true) : []);
            @endphp

            @if(old('asset_details.asset_name') || !empty($assetDetails))
                @foreach($assetDetails as $detail)
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <input type="text" name="asset_details[asset_name][]" class="form-control" value="{{ $detail['asset_name'] ?? '' }}" placeholder="Asset Name">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="asset_details[asset_value][]" class="form-control" value="{{ $detail['asset_value'] ?? '' }}" placeholder="Value">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!-- Move the button inside here -->
        <button type="button" class="btn btn-outline-success mt-2" onclick="addAssetRow()">Add Asset</button>
    </div>
</div>


<!-- Youth Contributions -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Youth Contributions</div>
    <div class="card-body">
        <div id="youthContributions">
            @php
                $youthContributions = is_array($youth->youth_contributions)
                    ? $youth->youth_contributions
                    : (is_string($youth->youth_contributions) ? json_decode($youth->youth_contributions, true) : []);
            @endphp

            @foreach($youthContributions as $detail)
                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="date" name="youth_contributions[date][]" class="form-control" value="{{ $detail['date'] ?? '' }}" placeholder="Date">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="youth_contributions[description][]" class="form-control" value="{{ $detail['description'] ?? '' }}" placeholder="Description">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="youth_contributions[value][]" class="form-control" value="{{ $detail['value'] ?? '' }}" placeholder="Value">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-success mt-2" onclick="addYouthRow()">Add Contribution</button>
    </div>
</div>


<!-- Promoter Contributions -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Promoter Contributions</div>
    <div class="card-body">
        <div id="promoterContributions">
            @php
                $promoterContributions = is_array($youth->promoter_contributions)
                    ? $youth->promoter_contributions
                    : (is_string($youth->promoter_contributions) ? json_decode($youth->promoter_contributions, true) : []);
            @endphp

            @foreach($promoterContributions as $detail)
                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="date" name="promoter_contributions[date][]" class="form-control" value="{{ $detail['date'] ?? '' }}" placeholder="Date">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="promoter_contributions[description][]" class="form-control" value="{{ $detail['description'] ?? '' }}" placeholder="Description">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="promoter_contributions[value][]" class="form-control" value="{{ $detail['value'] ?? '' }}" placeholder="Value">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-success mt-2" onclick="addPromoterRow()">Add Contribution</button>
    </div>
</div>


<!-- Grant Details -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Grant Details</div>
    <div class="card-body">
        <div id="grantDetails">
            @php
                $grantDetails = is_array($youth->grant_details)
                    ? $youth->grant_details
                    : (is_string($youth->grant_details) ? json_decode($youth->grant_details, true) : []);
            @endphp

            @foreach($grantDetails as $detail)
                <div class="row mb-2">
                    <div class="col-md-2">
                        <input type="date" name="grant_details[date][]" class="form-control" value="{{ $detail['date'] ?? '' }}" placeholder="Date">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="grant_details[description][]" class="form-control" value="{{ $detail['description'] ?? '' }}" placeholder="Description">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="grant_details[value][]" class="form-control" value="{{ $detail['value'] ?? '' }}" placeholder="Value">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="grant_details[grant_issued_by][]" class="form-control" value="{{ $detail['grant_issued_by'] ?? '' }}" placeholder="Issued By">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-success mt-2" onclick="addGrantRow()">Add Grant</button>
    </div>
</div>




        


<!-- Credit Details -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Credit Details</div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $youth->bank_name) }}">
            </div>
            <div class="col-md-4">
                <label>Branch</label>
                <input type="text" name="branch" class="form-control" value="{{ old('branch', $youth->branch) }}">
            </div>
            <div class="col-md-4">
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control" value="{{ old('account_number', $youth->account_number) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label>Interest Rate (%)</label>
                <input type="number" step="0.01" name="interest_rate" class="form-control" value="{{ old('interest_rate', $youth->interest_rate) }}">
            </div>
            <div class="col-md-3">
                <label>Credit Issue Date</label>
                <input type="date" name="credit_issue_date" class="form-control" value="{{ old('credit_issue_date', $youth->credit_issue_date) }}">
            </div>
            <div class="col-md-3">
                <label>Loan Installment Date</label>
                <input type="date" name="loan_installment_date" class="form-control" value="{{ old('loan_installment_date', $youth->loan_installment_date) }}">
            </div>
            <div class="col-md-3">
                <label>Credit Amount</label>
                <input type="number" step="0.01" name="credit_amount" class="form-control" value="{{ old('credit_amount', $youth->credit_amount) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Number of Installments</label>
                <input type="number" name="number_of_installments" class="form-control" value="{{ old('number_of_installments', $youth->number_of_installments) }}">
            </div>
            <div class="col-md-6">
                <label>Installment Due Date</label>
                <input type="date" name="installment_due_date" class="form-control" value="{{ old('installment_due_date', $youth->installment_due_date) }}">
            </div>
        </div>
    </div>
</div>



<!-- Installment Payments -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Installment Payments</div>
    <div class="card-body">
        <div id="installmentPayments">
            @php
                $installmentPayments = is_array($youth->installment_payments)
                    ? $youth->installment_payments
                    : (is_string($youth->installment_payments) ? json_decode($youth->installment_payments, true) : []);
            @endphp

            @foreach($installmentPayments as $detail)
                <div class="row mb-2">
                    <div class="col-md-4">
                        <input type="date" name="installment_payments[installment_payment_date][]" class="form-control" value="{{ $detail['installment_payment_date'] ?? '' }}" placeholder="Payment Date">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="installment_payments[installment_payment_value][]" class="form-control" value="{{ $detail['installment_payment_value'] ?? '' }}" placeholder="Value">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-success mt-2" onclick="addInstallmentRow()">Add Installment</button>
    </div>
</div>



<!-- Credit Balance -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">Credit Balance Information</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>Credit Balance Date</label>
                <input type="date" name="credit_balance_date" class="form-control"
                       value="{{ old('credit_balance_date', $youth->credit_balance_date) }}">
            </div>
            <div class="col-md-6">
                <label>Credit Balance Value</label>
                <input type="number" step="0.01" name="credit_balance_value" class="form-control"
                       value="{{ old('credit_balance_value', $youth->credit_balance_value) }}">
            </div>
        </div>
    </div>
</div>

<!-- Update Button -->
<div class="text-center">
    <button type="button" class="btn btn-success mt-4 px-4" onclick="confirmEdit()">Update</button>
</div>




        
    </form>
    </div>   
</div>

<script>
    function addRow(containerId, namePrefix, fields) {
        const container = document.getElementById(containerId);
        const row = document.createElement('div');
        row.className = "row mb-2";
        let html = "";
        fields.forEach(field => {
            html += `
                <div class="col-md-3">
                    <input type="${field.type}" name="${namePrefix}[${field.name}][]" class="form-control" placeholder="${field.placeholder}" />
                </div>`;
        });
        html += `<div class="col-md-1"><button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">X</button></div>`;
        row.innerHTML = html;
        container.appendChild(row);
    }

    function addAssetRow() {
        addRow('assetDetails', 'asset_details', [
            { name: 'asset_name', placeholder: 'Asset Name', type: 'text' },
            { name: 'asset_value', placeholder: 'Value', type: 'number' },
        ]);
    }

    function addYouthRow() {
        addRow('youthContributions', 'youth_contributions', [
            { name: 'date', placeholder: 'Date', type: 'date' },
            { name: 'description', placeholder: 'Description', type: 'text' },
            { name: 'value', placeholder: 'Value', type: 'number' },
        ]);
    }

    function addPromoterRow() {
        addRow('promoterContributions', 'promoter_contributions', [
            { name: 'date', placeholder: 'Date', type: 'date' },
            { name: 'description', placeholder: 'Description', type: 'text' },
            { name: 'value', placeholder: 'Value', type: 'number' },
        ]);
    }

    function addGrantRow() {
    const container = document.getElementById('grantDetails');
    const row = document.createElement('div');
    row.className = "row mb-2 align-items-end";
    row.innerHTML = `
        <div class="col-md-2">
            <input type="date" name="grant_details[date][]" class="form-control" placeholder="Date">
        </div>
        <div class="col-md-3">
            <input type="text" name="grant_details[description][]" class="form-control" placeholder="Description">
        </div>
        <div class="col-md-2">
            <input type="number" name="grant_details[value][]" class="form-control" placeholder="Value">
        </div>
        <div class="col-md-3">
            <input type="text" name="grant_details[grant_issued_by][]" class="form-control" placeholder="Issued By">
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger" onclick="this.closest('.row').remove()">X</button>
        </div>
    `;
    container.appendChild(row);
}


    function addInstallmentRow() {
    const container = document.getElementById('installmentPayments');
    const row = document.createElement('div');
    row.className = "row mb-2 align-items-end";
    row.innerHTML = `
        <div class="col-md-4">
            <input type="date" name="installment_payments[installment_payment_date][]" class="form-control" placeholder="Payment Date">
        </div>
        <div class="col-md-4">
            <input type="number" name="installment_payments[installment_payment_value][]" class="form-control" placeholder="Value">
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger" onclick="this.closest('.row').remove()">X</button>
        </div>
    `;
    container.appendChild(row);
}

</script>


<script>
    function confirmEdit() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will update the youth enterprise record.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editYouthForm').submit();
            }
        });
    }
</script>
</body>
</html>