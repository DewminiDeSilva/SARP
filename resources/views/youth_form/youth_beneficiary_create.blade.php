<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youth Data Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .custom-border { border: 2px solid green; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .bold-label { font-weight: bold; }
        .frame { display: flex; flex-direction: row; justify-content: space-between; width: 100%; }
        .right-column { flex: 0 0 80%; padding: 20px; }
        .left-column { flex: 0 0 20%; border-right: 1px solid #dee2e6; }
        .btn-primary { background-color: #198754; border-color: #198754; }
        .btn-primary:hover { background-color: #145c32; border-color: #145c32; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; color: #fff; border: none; padding: 10px 50px; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; position: relative; overflow: hidden; }
        .btn-back img { width: 45px; height: auto; margin-right: 5px; }
        .btn-back .btn-text { opacity: 0; visibility: hidden; position: absolute; right: 25px; background-color: #1e8e1e; color: #fff; padding: 4px 8px; border-radius: 4px; z-index: 0; }
        .btn-back:hover .btn-text { opacity: 1; visibility: visible; transform: translateX(-5px); padding: 10px 20px; border-radius: 20px; }
        .btn-back:hover img { transform: translateX(-50px); }
        #sidebarToggle { background-color: #126926; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        #sidebarToggle:hover { background-color: #0a4818; }
        .left-column.hidden { display: none; }
        .right-column { transition: flex 0.3s ease, padding 0.3s ease; }
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
            <button id="sidebarToggle" class="btn btn-secondary mr-2"><i class="fas fa-bars"></i></button>
            <a href="{{ route('youth-proposals.beneficiaries', $beneficiary->youth_proposal_id) }}" class="btn-back" style="background-color: #126926;">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>
        </div>
        <div class="container mt-5">
            <div class="center-heading text-center">
                <h1 style="font-size: 2.5rem; color: green;">Youth Data of {{ $beneficiary->name_with_initials }}</h1>
            </div>
            <br>
            <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
                <form action="{{ route('youth_form.store') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="youthCategory" class="form-label bold-label">Youth Category</label>
                            <input type="text" class="form-control" id="youthCategory" name="youth_category" value="{{ $youthCategory }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="youthBusinessTitle" class="form-label bold-label">Youth Business Title</label>
                            <input type="text" class="form-control" id="youthBusinessTitle" name="youth_business_title" value="{{ $youthBusinessTitle }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="youthPlantingDate" class="form-label bold-label">Youth Starting Date</label>
                            <input type="date" class="form-control" id="youthPlantingDate" name="planting_date" value="{{ old('planting_date', $planting_date ?? '') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="totalAcres" class="form-label bold-label">Youth Total Acres</label>
                            <input type="number" class="form-control" id="totalAcres" name="total_acres" step="0.01" min="0" value="{{ old('total_acres', $total_acres ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="totalLivestockArea" class="form-label bold-label">Youth Total Livestock Area</label>
                            <input type="number" class="form-control" id="totalLivestockArea" name="total_livestock_area" step="0.01" min="0" value="{{ old('total_livestock_area', $total_livestock_area ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="totalCost" class="form-label bold-label">Youth Total Cost</label>
                            <input type="number" class="form-control" id="totalCost" name="total_cost" step="0.01" min="0" value="{{ old('total_cost', $total_cost ?? '') }}">
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Farmer Contributions</div>
                        <div class="card-body">
                            <div id="farmer-fields">
                                <div class="row farmer-group align-items-center">
                                    <div class="col-md-3"><label>Contribution Date</label><input type="date" name="farmer_date[]" class="form-control"></div>
                                    <div class="col-md-5"><label>Contribution Description</label><input type="text" name="farmer_contribution[]" class="form-control"></div>
                                    <div class="col-md-3"><label>Cost (Rs.)</label><input type="number" step="0.01" name="cost[]" class="form-control"></div>
                                    <div class="col-md-1 d-flex align-items-center"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <button type="button" class="btn btn-success btn-sm" id="add-farmer">Add More Farmer Contributions</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Promoter Contributions</div>
                        <div class="card-body">
                            <div id="promoter-fields">
                                <div class="row promoter-group align-items-center">
                                    <div class="col-md-3"><label>Contribution Date</label><input type="date" name="promoter_date[]" class="form-control"></div>
                                    <div class="col-md-5"><label>Contribution Description</label><input type="text" name="promoter_description[]" class="form-control"></div>
                                    <div class="col-md-3"><label>Cost (Rs.)</label><input type="number" step="0.01" name="promoter_cost[]" class="form-control"></div>
                                    <div class="col-md-1 d-flex align-items-center"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <button type="button" class="btn btn-success btn-sm" id="add-promoter">Add More Promoter Contributions</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Grant Details</div>
                        <div class="card-body">
                            <div id="grant-fields">
                                <div class="row grant-group align-items-center">
                                    <div class="col-md-2"><label>Grant Date</label><input type="date" name="grant_date[]" class="form-control"></div>
                                    <div class="col-md-4"><label>Grant Description</label><input type="text" name="grant_description[]" class="form-control"></div>
                                    <div class="col-md-2"><label>Value</label><input type="number" step="0.01" name="grant_value[]" class="form-control"></div>
                                    <div class="col-md-4"><label>Issued by</label><input type="text" name="grant_issued_by[]" class="form-control"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <button type="button" class="btn btn-success btn-sm" id="add-grant">Add More Grant Details</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Credit Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><label>Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Bank Name"></div>
                                <div class="col-md-4"><label>Branch</label><input type="text" name="branch" class="form-control" placeholder="Branch"></div>
                                <div class="col-md-4"><label>Account Number</label><input type="text" name="account_number" class="form-control" placeholder="Account Number"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Interest Rate (%)</label><input type="number" step="0.01" name="interest_rate" class="form-control" placeholder="Interest Rate %"></div>
                                <div class="col-md-3"><label>Credit Issue Date</label><input type="date" name="credit_issue_date" class="form-control"></div>
                                <div class="col-md-3"><label>Loan Installment Date</label><input type="date" name="loan_installment_date" class="form-control"></div>
                                <div class="col-md-3"><label>Credit Amount (Rs.)</label><input type="number" step="0.01" name="credit_amount" class="form-control" placeholder="Credit Amount"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Number of Installments</label><input type="number" name="number_of_installments" class="form-control" placeholder="No. of Installments"></div>
                                <div class="col-md-3"><label>Installment Due Date</label><input type="date" name="installment_due_date" class="form-control"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Credit Payments</div>
                        <div class="card-body">
                            <div id="credit-payment-fields">
                                <div class="row credit-payment-group mb-2">
                                    <div class="col-md-6"><label>Payment Date</label><input type="date" name="payment_date[]" class="form-control"></div>
                                    <div class="col-md-6"><label>Installment Payment (Rs.)</label><input type="number" step="0.01" name="installment_payment[]" class="form-control"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <button type="button" class="btn btn-success btn-sm" id="add-credit-payment">Add More</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 card-custom">
                        <div class="card-header bg-success text-white">Credit Balance On</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><label>Credit Balance On Date</label><input type="date" name="credit_balance_on_date" class="form-control" id="balance-date" readonly></div>
                                <div class="col-md-4"><label>Credit Balance (Rs.)</label><input type="number" step="0.01" name="credit_balance" class="form-control" placeholder="Credit Balance"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-5 card-custom">
                        <div class="card-header bg-success text-white">Agriculture Products</div>
                        <div class="card-body">
                            <div id="product-fields">
                                <div class="row product-group mb-2">
                                    <div class="col-md-3"><label>Production Name</label><input type="text" name="product_name[]" class="form-control" placeholder="Product Name"></div>
                                    <div class="col-md-3"><label>Total Production</label><input type="number" step="0.01" name="total_production[]" class="form-control" placeholder="Total Production"></div>
                                    <div class="col-md-3"><label>Total Income (Rs.)</label><input type="number" step="0.01" name="total_income[]" class="form-control" placeholder="Total Income"></div>
                                    <div class="col-md-3"><label>Profit (Rs.)</label><input type="number" step="0.01" name="profit[]" class="form-control" placeholder="Profit"></div>
                                    <div class="col-md-3"><label>Buyer Details</label><input type="text" name="buyer_details[]" class="form-control" placeholder="Buyer Name / Company"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <button type="button" class="btn btn-success btn-sm" id="add-product">Add More</button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="gnDivisionName" name="gn_division_name">
                    <div class="row mt-4">
                        <div class="col text-center">
                            <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <script>
        function fetchGnDivisionName(beneficiaryId) {
            if (beneficiaryId) {
                $.ajax({
                    url: '/get-gn-division-name/' + beneficiaryId,
                    method: 'GET',
                    success: function (data) {
                        $('#gnDivisionName').val(data.gn_division_name);
                    },
                    error: function () {
                        $('#gnDivisionName').val('');
                    }
                });
            }
        }
        $(document).ready(function () {
            var beneficiaryId = $('input[name="beneficiary_id"]').val();
            fetchGnDivisionName(beneficiaryId);
        });
        </script>
        <script>
        $(document).on('click', '#add-farmer', function () {
            $('#farmer-fields').append(`
                <div class="row farmer-group mb-2">
                    <div class="col-md-3"><input type="date" name="farmer_date[]" class="form-control"></div>
                    <div class="col-md-5"><input type="text" name="farmer_contribution[]" class="form-control" placeholder="Contribution Description"></div>
                    <div class="col-md-3"><input type="number" step="0.01" name="cost[]" class="form-control" placeholder="Cost"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-farmer">Remove</button></div>
                </div>`);
        });
        $(document).on('click', '.remove-farmer', function () { $(this).closest('.farmer-group').remove(); });
        $(document).on('click', '#add-promoter', function () {
            $('#promoter-fields').append(`
                <div class="row promoter-group mb-2">
                    <div class="col-md-3"><input type="date" name="promoter_date[]" class="form-control"></div>
                    <div class="col-md-5"><input type="text" name="promoter_description[]" class="form-control"></div>
                    <div class="col-md-3"><input type="number" step="0.01" name="promoter_cost[]" class="form-control"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-promoter">Remove</button></div>
                </div>`);
        });
        $(document).on('click', '.remove-promoter', function () { $(this).closest('.promoter-group').remove(); });
        $(document).on('click', '#add-grant', function () {
            $('#grant-fields').append(`
                <div class="row grant-group mb-2">
                    <div class="col-md-2"><input type="date" name="grant_date[]" class="form-control"></div>
                    <div class="col-md-4"><input type="text" name="grant_description[]" class="form-control"></div>
                    <div class="col-md-2"><input type="number" step="0.01" name="grant_value[]" class="form-control"></div>
                    <div class="col-md-3"><input type="text" name="grant_issued_by[]" class="form-control"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-grant">Remove</button></div>
                </div>`);
        });
        $(document).on('click', '.remove-grant', function () { $(this).closest('.grant-group').remove(); });
        $(document).on('click', '#add-credit-payment', function () {
            $('#credit-payment-fields').append(`
                <div class="row credit-payment-group mb-2">
                    <div class="col-md-6"><input type="date" name="payment_date[]" class="form-control"></div>
                    <div class="col-md-5"><input type="number" step="0.01" name="installment_payment[]" class="form-control"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-credit-payment">Remove</button></div>
                </div>`);
        });
        $(document).on('click', '.remove-credit-payment', function () { $(this).closest('.credit-payment-group').remove(); });
        $(document).ready(function () {
            $('#add-product').click(function () {
                $('#product-fields').append(`
                    <div class="row product-group mb-2">
                        <div class="col-md-3"><input type="text" name="product_name[]" class="form-control" placeholder="Product Name"></div>
                        <div class="col-md-3"><input type="number" step="0.01" name="total_production[]" class="form-control" placeholder="Total Production"></div>
                        <div class="col-md-3"><input type="number" step="0.01" name="total_income[]" class="form-control" placeholder="Total Income"></div>
                        <div class="col-md-2"><input type="number" step="0.01" name="profit[]" class="form-control" placeholder="Profit"></div>
                        <div class="col-md-3"><input type="text" name="buyer_details[]" class="form-control" placeholder="Buyer Details"></div>
                        <div class="col-md-1 d-flex align-items-end"><button type="button" class="btn btn-danger btn-sm remove-product">Remove</button></div>
                    </div>`);
            });
            $(document).on('click', '.remove-product', function () { $(this).closest('.product-group').remove(); });
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var today = new Date().toISOString().split('T')[0];
            var el = document.getElementById('balance-date');
            if (el) el.value = today;
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebar = document.querySelector('.left-column');
            var content = document.querySelector('.right-column');
            var toggleButton = document.getElementById('sidebarToggle');
            if (toggleButton) {
                toggleButton.addEventListener('click', function () {
                    sidebar.classList.toggle('hidden');
                    content.style.flex = sidebar.classList.contains('hidden') ? '0 0 100%' : '0 0 80%';
                    content.style.padding = '20px';
                });
            }
        });
        </script>
    </div>
</div>
</body>
</html>
