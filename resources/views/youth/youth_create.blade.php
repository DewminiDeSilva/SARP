<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Youth Enterprise</title>

    <!-- jQuery and Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
         
        
    </style>

    <style>
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
@include('dashboard.header')

    <div class="frame" style="padding-top: 70px;">
        <div class="left-column">
            @include('dashboard.dashboardC')
        </div>

        <div class="right-column" style="padding:70px;">
            <div class="container-fluid">
                <div class="center-heading text-center">
                    <h1 style="font-size: 2.5rem; color: green;">Youth Enterprise Registration</h1>
                </div>
            </div>
     
    <div class="container mt-5 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            

    <form action="{{ route('youth.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

        
        <!-- Enterprise Information -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Enterprise Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><label>Enterprise Name</label><input type="text" name="enterprise_name" class="form-control"></div>
                    <div class="col-md-4"><label>Registration Number</label><input type="text" name="registration_number" class="form-control"></div>
                    <div class="col-md-4"><label>Institute of Registration</label><input type="text" name="institute_of_registration" class="form-control"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Address</label><input type="text" name="address" class="form-control"></div>
                    <div class="col-md-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
                    <div class="col-md-3"><label>Phone Number</label><input type="text" name="phone_number" class="form-control"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Website</label><input type="text" name="website_name" class="form-control"></div>
                    <div class="col-md-6"><label>Certificates Description</label><textarea name="description_of_certificates" class="form-control"></textarea></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Nature of Business</label><input type="text" name="nature_of_business" class="form-control"></div>
                    <div class="col-md-6"><label>Products Available</label><textarea name="products_available" class="form-control"></textarea></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Yield Collection Details</label><textarea name="yield_collection_details" class="form-control"></textarea></div>
                    <div class="col-md-6"><label>Marketing Information</label><textarea name="marketing_information" class="form-control"></textarea></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>List of Distributors</label><textarea name="list_of_distributors" class="form-control"></textarea></div>
                    <div class="col-md-6"><label>Business Plan (PDF)</label><input type="file" name="business_plan" class="form-control"></div>
                </div>
            </div>
        </div>

        <!-- Asset Details -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Asset Details</div>
            <div class="card-body">
                <div id="assetDetails"></div>
                <button type="button" class="btn btn-outline-success mt-2" onclick="addAssetRow()">Add Asset</button>
            </div>
        </div>

        <!-- Youth Contributions -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Youth Contributions</div>
            <div class="card-body">
                <div id="youthContributions"></div>
                <button type="button" class="btn btn-outline-success mt-2" onclick="addYouthRow()">Add Contribution</button>
            </div>
        </div>

        <!-- Promoter Contributions -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Promoter Contributions</div>
            <div class="card-body">
                <div id="promoterContributions"></div>
                <button type="button" class="btn btn-outline-success mt-2" onclick="addPromoterRow()">Add Contribution</button>
            </div>
        </div>

        <!-- Grant Details -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Grant Details</div>
            <div class="card-body">
                <div id="grantDetails"></div>
                <button type="button" class="btn btn-outline-success mt-2" onclick="addGrantRow()">Add Grant</button>
            </div>
        </div>

        <!-- Credit Details -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Credit Details</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><label>Bank Name</label><input type="text" name="bank_name" class="form-control"></div>
                    <div class="col-md-4"><label>Branch</label><input type="text" name="branch" class="form-control"></div>
                    <div class="col-md-4"><label>Account Number</label><input type="text" name="account_number" class="form-control"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><label>Interest Rate (%)</label><input type="number" step="0.01" name="interest_rate" class="form-control"></div>
                    <div class="col-md-3"><label>Credit Issue Date</label><input type="date" name="credit_issue_date" class="form-control"></div>
                    <div class="col-md-3"><label>Loan Installment Date</label><input type="date" name="loan_installment_date" class="form-control"></div>
                    <div class="col-md-3"><label>Credit Amount</label><input type="number" step="0.01" name="credit_amount" class="form-control"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Number of Installments</label><input type="number" name="number_of_installments" class="form-control"></div>
                    <div class="col-md-6"><label>Installment Due Date</label><input type="date" name="installment_due_date" class="form-control"></div>
                </div>
            </div>
        </div>

        <!-- Installment Payments -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Installment Payments</div>
            <div class="card-body">
                <div id="installmentPayments"></div>
                <button type="button" class="btn btn-outline-success mt-2" onclick="addInstallmentRow()">Add Installment</button>
            </div>
        </div>

        <!-- Credit Balance -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Credit Balance Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><label>Credit Balance Date</label><input type="date" name="credit_balance_date" class="form-control"></div>
                    <div class="col-md-6"><label>Credit Balance Value</label><input type="number" step="0.01" name="credit_balance_value" class="form-control"></div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success px-5">Submit</button>
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
        html += `<div class='col-md-1'><button type='button' class='btn btn-danger' onclick='this.parentElement.parentElement.remove()'>X</button></div>`;
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
        addRow('grantDetails', 'grant_details', [
            { name: 'date', placeholder: 'Date', type: 'date' },
            { name: 'description', placeholder: 'Description', type: 'text' },
            { name: 'value', placeholder: 'Value', type: 'number' },
            { name: 'grant_issued_by', placeholder: 'Issued By', type: 'text' },
        ]);
    }

    function addInstallmentRow() {
        addRow('installmentPayments', 'installment_payments', [
            { name: 'installment_payment_date', placeholder: 'Payment Date', type: 'date' },
            { name: 'installment_payment_value', placeholder: 'Value', type: 'number' },
        ]);
    }
</script>


</body>
</html>
