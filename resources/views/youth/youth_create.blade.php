<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Youth Enterprise</title>

    <!-- jQuery and Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: { DEFAULT: '#126926', dark: '#0d4d1f' } } } }
        }
    </script>
    <!-- CSS (for dashboard include) -->
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

        /* Youth form: input heading/label with green line */
        .youth-label {
            display: block;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            padding-left: 12px;
            border-left: 4px solid #126926;
            line-height: 1.4;
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
     
    <div class="max-w-5xl mx-auto mt-8 p-6 rounded-2xl border border-gray-200 bg-white shadow-lg">
    <form action="{{ route('youth.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

        <div class="flex justify-between items-center mb-6 p-4 rounded-xl border border-gray-200 bg-gray-50">
            <div class="text-xl font-bold text-primary">
                <i class="fas fa-user mr-2"></i> Beneficiary: {{ $beneficiary->name_with_initials ?? 'N/A' }}
            </div>
        </div>

        <!-- Enterprise Information -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Enterprise Information</div>
            <div class="p-5 bg-white space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="youth-label">Enterprise Name</label><input type="text" name="enterprise_name" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Registration Number</label><input type="text" name="registration_number" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Institute of Registration</label><input type="text" name="institute_of_registration" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2"><label class="youth-label">Address</label><input type="text" name="address" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Email</label><input type="email" name="email" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Phone Number</label><input type="text" name="phone_number" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">Website</label><input type="text" name="website_name" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Certificates Description</label><textarea name="description_of_certificates" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary" rows="2"></textarea></div>
                </div>
            </div>
        </div>

        <!-- Business Information -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Business Information</div>
            <div class="p-5 bg-white space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">Nature of Business</label><input type="text" name="nature_of_business" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Products Available</label><textarea name="products_available" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary" rows="2"></textarea></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">Yield Collection Details</label><textarea name="yield_collection_details" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary" rows="2"></textarea></div>
                    <div><label class="youth-label">Marketing Information</label><textarea name="marketing_information" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary" rows="2"></textarea></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">List of Distributors</label><textarea name="list_of_distributors" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary" rows="2"></textarea></div>
                    <div><label class="youth-label">Business Plan (PDF)</label><input type="file" name="business_plan" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
            </div>
        </div>

        <!-- Asset Details -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Asset Details</div>
            <div class="p-5 bg-white">
                <div id="assetDetails"></div>
                <button type="button" class="mt-3 px-4 py-2 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition" onclick="addAssetRow()">Add Asset</button>
            </div>
        </div>

        <!-- Youth Contributions -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Youth Contributions</div>
            <div class="p-5 bg-white">
                <div id="youthContributions"></div>
                <button type="button" class="mt-3 px-4 py-2 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition" onclick="addYouthRow()">Add Contribution</button>
            </div>
        </div>

        <!-- Promoter Contributions -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Promoter Contributions</div>
            <div class="p-5 bg-white">
                <div id="promoterContributions"></div>
                <button type="button" class="mt-3 px-4 py-2 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition" onclick="addPromoterRow()">Add Contribution</button>
            </div>
        </div>

        <!-- Grant Details -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Grant Details</div>
            <div class="p-5 bg-white">
                <div id="grantDetails"></div>
                <button type="button" class="mt-3 px-4 py-2 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition" onclick="addGrantRow()">Add Grant</button>
            </div>
        </div>

        <!-- Credit Details -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Credit Details</div>
            <div class="p-5 bg-white space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="youth-label">Bank Name</label><input type="text" name="bank_name" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Branch</label><input type="text" name="branch" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Account Number</label><input type="text" name="account_number" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div><label class="youth-label">Interest Rate (%)</label><input type="number" step="0.01" name="interest_rate" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Credit Issue Date</label><input type="date" name="credit_issue_date" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Loan Installment Date</label><input type="date" name="loan_installment_date" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Credit Amount</label><input type="number" step="0.01" name="credit_amount" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">Number of Installments</label><input type="number" name="number_of_installments" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Installment Due Date</label><input type="date" name="installment_due_date" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
            </div>
        </div>

        <!-- Installment Payments -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Installment Payments</div>
            <div class="p-5 bg-white">
                <div id="installmentPayments"></div>
                <button type="button" class="mt-3 px-4 py-2 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition" onclick="addInstallmentRow()">Add Installment</button>
            </div>
        </div>

        <!-- Credit Balance -->
        <div class="mb-6 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="bg-primary text-white px-5 py-3 font-semibold">Credit Balance Information</div>
            <div class="p-5 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="youth-label">Credit Balance Date</label><input type="date" name="credit_balance_date" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                    <div><label class="youth-label">Credit Balance Value</label><input type="number" step="0.01" name="credit_balance_value" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary"></div>
                </div>
            </div>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="px-8 py-3 rounded-xl bg-primary hover:bg-primary-dark text-white font-semibold shadow-md hover:shadow-lg transition">Submit</button>
        </div>
    </form>
    </div> 
</div>

<script>
    var twInput = 'w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary focus:border-primary';
    var twBtnDanger = 'px-3 py-1.5 rounded-lg bg-red-500 hover:bg-red-600 text-white font-medium';

    function addRow(containerId, namePrefix, fields) {
        const container = document.getElementById(containerId);
        const row = document.createElement('div');
        row.className = 'grid grid-cols-1 md:grid-cols-12 gap-2 mb-3 items-end';
        let html = '';
        fields.forEach(field => {
            html += `<div class="md:col-span-3"><input type="${field.type}" name="${namePrefix}[${field.name}][]" class="${twInput}" placeholder="${field.placeholder}" /></div>`;
        });
        html += `<div class="md:col-span-1"><button type="button" class="${twBtnDanger}" onclick="this.parentElement.parentElement.remove()">X</button></div>`;
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
        row.className = 'grid grid-cols-1 md:grid-cols-12 gap-2 mb-3 items-end';
        row.innerHTML = `
            <div class="md:col-span-2"><input type="date" name="grant_details[date][]" class="${twInput}" placeholder="Date"></div>
            <div class="md:col-span-3"><input type="text" name="grant_details[description][]" class="${twInput}" placeholder="Description"></div>
            <div class="md:col-span-2"><input type="number" name="grant_details[value][]" class="${twInput}" placeholder="Value"></div>
            <div class="md:col-span-3"><input type="text" name="grant_details[grant_issued_by][]" class="${twInput}" placeholder="Issued By"></div>
            <div class="md:col-span-1"><button type="button" class="${twBtnDanger}" onclick="this.closest('.grid').remove()">X</button></div>
        `;
        container.appendChild(row);
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
